#!/usr/bin/env bash

function clearCacheAndLogs() {
    php bin/console cache:warmup
}

export APP_ENV='prod'

clearCacheAndLogs

# composer install --no-dev --classmap-authoritative

clearCacheAndLogs
