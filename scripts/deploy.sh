#!/usr/bin/env bash
set -euo pipefail

# Parse flags
PRODUCTION=false
for arg in "$@"; do
    case "$arg" in
    --production) PRODUCTION=true ;;
    esac
done

# Load env file
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
if [ "$PRODUCTION" = true ]; then
    ENV_FILE="${SCRIPT_DIR}/.env.prod"
else
    ENV_FILE="${SCRIPT_DIR}/.env"
fi

# 1. Added file existence check to prevent abrupt crashes
if [ ! -f "${ENV_FILE}" ]; then
    echo "Error: Environment file ${ENV_FILE} not found."
    exit 1
fi

set -a
# shellcheck disable=SC1090
source "${ENV_FILE}"
set +a

: "${SSH_USER:?Set SSH_USER in ${ENV_FILE} (e.g. user)}"
: "${SSH_SERVER:?Set SSH_SERVER in ${ENV_FILE} (e.g. server)}"
: "${SSH_PORT:?Set SSH_PORT in ${ENV_FILE} (e.g. 2222)}"
: "${APP_PATH:?Set APP_PATH in ${ENV_FILE} (e.g. /var/www/edaaku)}"

echo "Syncing files to remote server..."
rsync -avzO --delete --no-perms --no-owner --no-group --chmod=ug+rwX -e "ssh -p ${SSH_PORT}" \
    --exclude='.git' \
    --exclude='node_modules' \
    --exclude='.env' \
    --exclude='.env.prod' \
    --exclude='storage/app/*' \
    --exclude='storage/logs/*' \
    --exclude='storage/framework/cache/*' \
    --exclude='storage/framework/sessions/*' \
    --exclude='storage/framework/views/*' \
    --exclude='database/database.sqlite' \
    --exclude='.DS_Store' \
    ./ "${SSH_USER}@${SSH_SERVER}:${APP_PATH}/"

# 3. Composer install and npm build to the remote server
echo "Running build and post-deployment commands on the server..."
ssh -p "${SSH_PORT}" "${SSH_USER}@${SSH_SERVER}" "cd ${APP_PATH} && \
    composer install --no-dev --optimize-autoloader && \
    npm install && npm run build && \
    php artisan optimize:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan migrate --force"

echo "Deployed to ${SSH_USER}@${SSH_SERVER}:${APP_PATH} (port ${SSH_PORT}) successfully."
