FROM php:8.0-apache
WORKDIR /var/www/html
RUN apt-get update -y && apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli && docker-php-ext-install pdo pdo_mysql
RUN docker-php/docker-php-api