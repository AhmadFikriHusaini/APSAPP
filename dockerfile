FROM php:8.2-apache

RUN docker-php-ext-install pdo_mysql

RUN a2enmod rewrite

WORKDIR /var/www/html
COPY ./ /var/www/html/app_perpus

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80/tcp