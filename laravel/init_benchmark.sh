#!/usr/bin/env bash

# from https://github.com/phpbenchmarks/laravel/blob/laravel_5.6_hello-world/init_benchmark.sh

function clearCache() {
    sudo /bin/rm -rf bootstrap/cache/*
    sudo /bin/chmod -R 777 bootstrap/cache

    php artisan clear-compiled
    php artisan view:clear
    php artisan route:clear
    php artisan config:clear
    php artisan cache:clear

    rm -rf storage/framework/sessions
    mkdir storage/framework/sessions
    touch storage/framework/sessions/.gitkeep

    rm storage/logs/laravel.log
}

function init() {
    clearCache
    composer install --no-dev --classmap-authoritative
    clearCache
    php artisan config:cache
    php artisan route:cache

    return 0;
}
