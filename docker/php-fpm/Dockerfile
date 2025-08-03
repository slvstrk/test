FROM php:8.2-fpm

WORKDIR /var/www/laravel

RUN chown -R www-data:www-data .

RUN apt-get update

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get install nano libzip-dev zip libicu-dev -y

RUN docker-php-ext-install pdo pdo_mysql

#RUN pecl install xdebug && docker-php-ext-enable xdebug