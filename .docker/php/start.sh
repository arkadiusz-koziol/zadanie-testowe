#!/bin/sh

if [ ! -d "/var/www/app/vendor" ]; then
  echo "Running composer install..."
  composer install --no-interaction --prefer-dist --optimize-autoloader
else
  echo "Vendor directory exists. Running composer update..."
  composer update --no-interaction --prefer-dist --optimize-autoloader
fi

exec supervisord -c /etc/supervisor/supervisord.conf
