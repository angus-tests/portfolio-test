#!/bin/sh

# Create .env file from environment variables
# RUN printenv | grep -v "no_proxy" > .env # - Uncomment to load .env from env variables passed into container at runtime


# Run our artisan commands
php artisan route:clear

php artisan route:cache

php artisan config:clear

php artisan config:cache

php artisan view:clear

php artisan view:cache

php artisan storage:link

php artisan migrate --force

php artisan optimize

chmod -R 777 storage

php artisan db:seed --force

php artisan test
