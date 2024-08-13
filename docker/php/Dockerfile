FROM php:8.3.10-fpm

WORKDIR /opt/app/

RUN usermod -u 1000 www-data

RUN apt update && apt install -y git unzip zip

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY /docker/php/conf.d/php.ini /usr/local/etc/php/conf.d/custom.ini
COPY /docker/php/scripts/startapp.sh /

RUN chmod +x /startapp.sh

RUN mkdir /var/www/.cache && chown www-data:www-data /var/www/.cache
