#!/usr/bin/env bash

# from https://github.com/phpbenchmarks/laravel/blob/laravel_5.6_hello-world/init_benchmark.sh

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
