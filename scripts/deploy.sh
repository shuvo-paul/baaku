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

set -a
. "${ENV_FILE}"
set +a

: "${DEPLOY_HOST:?Set DEPLOY_HOST in ${ENV_FILE} (e.g. user@server)}"
: "${DEPLOY_PATH:?Set DEPLOY_PATH in ${ENV_FILE} (e.g. /var/www/edaaku)}"
: "${DEPLOY_PORT:?Set DEPLOY_PORT in ${ENV_FILE} (e.g. 2222)}"

composer install --no-dev --optimize-autoloader
npm run build

rsync -avzO --delete --no-perms --no-owner --no-group --chmod=ug+rwX -e "ssh -p ${DEPLOY_PORT}" \
  --exclude='.git' \
  --exclude='node_modules' \
  --exclude='.env' \
  --exclude='.env.prod' \
  --exclude='storage/logs/*' \
  --exclude='storage/framework/cache/*' \
  --exclude='storage/framework/sessions/*' \
  --exclude='storage/framework/views/*' \
  --exclude='database/database.sqlite' \
  --exclude='.DS_Store' \
  ./ "${DEPLOY_HOST}:${DEPLOY_PATH}/"

composer install

echo "Deployed to ${DEPLOY_HOST}:${DEPLOY_PATH} (port ${DEPLOY_PORT})"
