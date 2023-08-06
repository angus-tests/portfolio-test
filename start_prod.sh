#!/bin/sh


# Create .env file from environment variables
printenv | awk -F "=" 'NF==2 && $2 !~ /[\n\t ]/' > .env


# Add nginx user to www-data group
addgroup nginx www-data

# Change the owner group of the directories to www-data
chown -R :www-data /var/www/html && chmod -R g+rwxs /var/www/html

# Set group permissions
chmod -R 775 /var/www/html

# Run our artisan commands
php artisan route:clear
php artisan config:clear
php artisan view:clear

php artisan storage:link

php artisan migrate --force

# Finally, start PHP-FPM and nginx
php-fpm -D &&  nginx -g "daemon off;"
