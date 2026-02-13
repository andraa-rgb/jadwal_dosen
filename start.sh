#!/bin/bash
set -e

echo "--- Preparing application for production ---"

# 1. Clear all caches to ensure fresh configuration
echo "Clearing all caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# 2. Run database migrations and seeding
echo "Running migrations and seeding..."
php artisan migrate --force
php artisan db:seed --force

# 3. Cache everything for production performance
echo "Caching configuration for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "--- Starting application server ---"
php artisan serve --host=0.0.0.0 --port=$PORT
