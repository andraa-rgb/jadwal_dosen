#!/bin/bash
set -e

echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "Running migrations..."
php artisan migrate --force --no-interaction

echo "Clearing and caching config..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting application..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
