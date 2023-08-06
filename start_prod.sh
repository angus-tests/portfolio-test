#!/bin/sh


# Create .env file from environment variables
printenv | awk -F "=" 'NF==2 && $2 !~ /[\n\t ]/' > .env

# Run our artisan commands
php artisan route:clear
php artisan config:clear
php artisan view:clear

php artisan storage:link

php artisan migrate --force


# Set umask and start PHP-FPM in the background
umask 002 && php-fpm -D

# Start nginx in the foreground
nginx -g "daemon off;"
