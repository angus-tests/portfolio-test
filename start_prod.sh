#!/bin/sh

# Create .env file from environment variables
printenv | awk -F "=" 'NF==2 && $2 !~ /[\n\t ]/' > .env

# Set php-fpm permissions
sed -i 's/^user =.*/user = www-data/' /usr/local/etc/php-fpm.d/www.conf
sed -i 's/^group =.*/group = web/' /usr/local/etc/php-fpm.d/www.conf

# Run our artisan commands
php artisan route:clear
php artisan config:clear
php artisan view:clear

php artisan storage:link

php artisan migrate --force

# Set the desired umask
umask 0002

# Finally, start PHP-FPM and nginx
php-fpm -D &&  nginx -g "daemon off;"
