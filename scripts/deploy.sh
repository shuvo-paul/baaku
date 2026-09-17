#!/usr/bin/env bash
set -euo pipefail

# ── Parse flags ──────────────────────────────────────────────────────────────
PRODUCTION=false
for arg in "$@"; do
    case "$arg" in
    --production) PRODUCTION=true ;;
    esac
done

# ── Load env file ────────────────────────────────────────────────────────────
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
if [ "$PRODUCTION" = true ]; then
    ENV_FILE="${SCRIPT_DIR}/.env.prod"
else
    ENV_FILE="${SCRIPT_DIR}/.env"
fi

if [ ! -f "${ENV_FILE}" ]; then
    echo "Error: Environment file ${ENV_FILE} not found."
    exit 1
fi

set -a
# shellcheck disable=SC1090
source "${ENV_FILE}"
set +a

: "${SSH_USER:?Set SSH_USER in${ENV_FILE}}"
: "${SSH_SERVER:?Set SSH_SERVER in${ENV_FILE}}"
: "${SSH_PORT:?Set SSH_PORT in${ENV_FILE}}"
: "${APP_PATH:?Set APP_PATH in${ENV_FILE}}"

REMOTE="ssh -p ${SSH_PORT} ${SSH_USER}@${SSH_SERVER}"
RELEASE_NAME="$(date +%Y%m%d_%H%M%S)"
RELEASE_DIR="${APP_PATH}/releases/${RELEASE_NAME}"
SHARED_DIR="${APP_PATH}/shared"
KEEP_RELEASES=5

# ── Build frontend locally ───────────────────────────────────────────────────
echo "Building frontend assets locally..."
npm ci && npm run build

# ── Ensure release & shared directories exist ────────────────────────────────
echo "Preparing release ${RELEASE_NAME} on remote..."
${REMOTE} "mkdir -p '${RELEASE_DIR}' \
    '${SHARED_DIR}/storage/app/public' \
    '${SHARED_DIR}/storage/framework/cache/data' \
    '${SHARED_DIR}/storage/framework/sessions' \
    '${SHARED_DIR}/storage/framework/views' \
    '${SHARED_DIR}/storage/logs' \
    '${SHARED_DIR}/bootstrap/cache'"

# ── Sync fresh build BEFORE symlinking ───────────────────────────────────────
echo "Syncing files to new release..."
rsync -avzO --delete --no-perms --no-owner --no-group --chmod=ug+rwX \
    -e "ssh -p ${SSH_PORT}" \
    --exclude='.git' \
    --exclude='node_modules' \
    --exclude='.env*' \
    --exclude='storage/' \
    --exclude='bootstrap/cache/' \
    --exclude='database/database.sqlite' \
    --exclude='.DS_Store' \
    ./ "${SSH_USER}@${SSH_SERVER}:${RELEASE_DIR}/"

# ── Wire shared resources ────────────────────────────────────────────────────
echo "Wiring shared resources..."
${REMOTE} "rm -rf '${RELEASE_DIR}/storage' '${RELEASE_DIR}/bootstrap/cache' '${RELEASE_DIR}/.env' \
    && ln -sfn '${SHARED_DIR}/storage' '${RELEASE_DIR}/storage' \
    && ln -sfn '${SHARED_DIR}/.env' '${RELEASE_DIR}/.env' \
    && ln -sfn '${SHARED_DIR}/bootstrap/cache' '${RELEASE_DIR}/bootstrap/cache'"

# ── Install, cache, migrate ──────────────────────────────────────────────────
echo "Installing dependencies and preparing new release..."
${REMOTE} "cd '${RELEASE_DIR}' && \
    composer install --no-dev --optimize-autoloader && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan migrate --force"

# ── Atomic symlink swap ──────────────────────────────────────────────────────
echo "Swapping symlink to new release..."
${REMOTE} "ln -sfn '${RELEASE_DIR}' '${APP_PATH}/current.tmp' \
    && mv -Tf '${APP_PATH}/current.tmp' '${APP_PATH}/current'"

# ── Server / OPcache Reload ──────────────────────────────────────────────────
echo "Reloading server to clear OPcache..."
# Note: If running FrankenPHP or Octane, replace this block with your specific
# reload command (e.g., `sudo systemctl reload frankenphp` or `php artisan octane:reload`).
${REMOTE} "[ -x /usr/sbin/php-fpm* ] && \
    sudo systemctl reload php*-fpm 2>/dev/null || \
    sudo service php*-fpm reload 2>/dev/null || \
    echo '⚠ PHP-FPM reload skipped'" || true

# ── Restart queue workers ────────────────────────────────────────────────────
echo "Restarting queue workers..."
${REMOTE} "cd '${APP_PATH}/current' && php artisan queue:restart" || true

# ── Prune old releases ───────────────────────────────────────────────────────
echo "Keeping last ${KEEP_RELEASES} releases..."
${REMOTE} "cd '${APP_PATH}/releases' && \
    ls -1t | tail -n +$((KEEP_RELEASES + 1)) | \
    xargs -r rm -rf"

echo "✓ Deployed to ${SSH_USER}@${SSH_SERVER}:${APP_PATH} (port${SSH_PORT}) successfully."
