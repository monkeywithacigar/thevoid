FROM php:7-apache

RUN apt-get update -y && apt-get install -y libpng-dev libjpeg-dev && \
    a2enmod rewrite && \
    a2enmod headers && \
    docker-php-ext-install mysqli session  tokenizer pdo_mysql mbstring zip gd

COPY ./ /var/www/data

RUN chown -R www-data:www-data /var/www/html