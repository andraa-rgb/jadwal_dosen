#!/bin/bash
set -e

echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader

echo "Running migrations..."
php artisan migrate --force --no-interaction

echo "Caching config and routes..."
php artisan config:cache
php artisan route:cache

echo "Starting application..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
