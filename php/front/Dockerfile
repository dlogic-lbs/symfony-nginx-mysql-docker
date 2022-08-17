FROM php:8.1-fpm

ENV DEBIAN_FRONTEND noninteractive

RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

COPY ./php/front/php.ini /usr/local/etc/php/conf.d/docker-php-config.ini
COPY ./apps/front/composer.json /var/www/project/

WORKDIR /var/www/project

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -sS https://get.symfony.com/cli/installer | bash

RUN git config --global user.email "your@git-email.com" \
    && git config --global user.name "YOUR GIT NAME"

RUN composer install -n
