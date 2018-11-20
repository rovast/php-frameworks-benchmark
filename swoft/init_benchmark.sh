#!/usr/bin/env bash

# init

echo "prepare for testing ...."

php bin/swoft restart -d

composer install --no-dev --classmap-authoritative

php bin/swoft restart -d

echo "prepare finish"
