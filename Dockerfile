FROM php:7.0-apache

RUN docker-php-ext-install pdo pdo_mysql
COPY . /var/www/html
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80
