FROM php:8.1.0-apache
RUN apt-get update && apt-get install -y zip unzip
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY . /var/www/html
RUN composer update