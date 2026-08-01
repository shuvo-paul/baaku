#!/usr/bin/env bash
set -euo pipefail

# Load .env from the same directory as this script
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
set -a
. "${SCRIPT_DIR}/.env"
set +a

: "${DEPLOY_HOST:?Set DEPLOY_HOST in .env (e.g. user@server)}"
: "${DEPLOY_PATH:?Set DEPLOY_PATH in .env (e.g. /var/www/edaaku)}"
: "${DEPLOY_PORT:?Set DEPLOY_PORT in .env (e.g. 2222)}"

composer install --no-dev --optimize-autoloader
npm run build

rsync -avz --delete -e "ssh -p ${DEPLOY_PORT}" \
  --exclude='.git' \
  --exclude='node_modules' \
  --exclude='.env' \
  --exclude='storage/logs/*' \
  --exclude='storage/framework/cache/*' \
  --exclude='storage/framework/sessions/*' \
  --exclude='storage/framework/views/*' \
  --exclude='bootstrap/cache/*' \
  --exclude='.DS_Store' \
  ./ "${DEPLOY_HOST}:${DEPLOY_PATH}/"

composer install

echo "Deployed to ${DEPLOY_HOST}:${DEPLOY_PATH} (port ${DEPLOY_PORT})"
