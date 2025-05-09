FROM php:8.4-fpm AS zadanie-testowe-php

COPY composer.lock composer.json /var/www/app/

WORKDIR /var/www/app/
RUN apt-get update && \
apt-get -y upgrade && \
apt-get install -y aptitude && \
apt-get install -y --no-install-recommends nginx supervisor cron && \
apt-get install -y build-essential software-properties-common byobu curl ca-certificates git htop man unzip vim wget libcurl4 libcurl4-gnutls-dev libpcre3 libpcre3-dev libxml2 libxml2-dev liblua5.3-0 liblua5.3-0-dbg liblua5.3-dev \
libxml2-dev libxslt-dev libgd-dev libiconv-hook-dev libicu-dev libonig-dev zlib1g-dev libzip-dev libpq-dev \
libbz2-dev openssl libssl-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libmemcached-dev libmemcached11

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN update-ca-certificates && \
docker-php-ext-install bcmath ctype curl dom fileinfo && \
docker-php-ext-configure gd --with-freetype --with-jpeg --with-xpm --enable-gd-jis-conv && \
docker-php-ext-install -j$(nproc) gd && \
docker-php-ext-install iconv && \
docker-php-ext-configure intl && \
docker-php-ext-install intl && \
docker-php-ext-install mbstring xml simplexml xsl soap zip sockets
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install exif

ADD .docker/php/supervisord.conf /etc/supervisor/supervisord.conf

RUN pecl install redis && docker-php-ext-enable redis

RUN mkdir -p /var/run && chmod 777 /var/run

RUN docker-php-ext-configure exif
RUN docker-php-ext-install exif
RUN docker-php-ext-enable exif

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/app

RUN rm /etc/nginx/sites-enabled/default
ADD .docker/nginx/app.conf /etc/nginx/sites-available/default
RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/

RUN chown -R www-data:www-data \
        /var/www -R

EXPOSE 80
COPY .docker/php/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh
CMD ["/usr/local/bin/start.sh"]

