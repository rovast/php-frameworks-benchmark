#!/usr/bin/env bash

function clearCache() {
    sudo /bin/chmod -R 777 storage

    rm storage/logs/lumen*.log
}

# init

echo "prepare for testing ...."

clearCache
composer install --no-dev --classmap-authoritative
clearCache

echo "prepare finish"
