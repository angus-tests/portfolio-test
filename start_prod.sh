#!/bin/sh


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

# Finally, start PHP-FPM and nginx
php-fpm -D &&  nginx -g "daemon off;"
