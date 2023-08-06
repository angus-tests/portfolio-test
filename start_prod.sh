#!/bin/sh


# Create .env file from environment variables
printenv | awk -F "=" 'NF==2 && $2 !~ /[\n\t ]/' > .env

# Run our artisan commands
php artisan route:clear
php artisan config:clear
php artisan view:clear

php artisan storage:link

php artisan migrate --force


# Add nginx user to www-data group
usermod -aG www-data nginx

# Set folder permission
chown -R www-data:www-data /var/www/html/storage
chmod g+s /var/www/html/storage
chmod 775 /var/www/html/storage

# Finally, start PHP-FPM and nginx
php-fpm -D &&  nginx -g "daemon off;"
