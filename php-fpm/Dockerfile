FROM php:7.2-fpm
MAINTAINER niko.afv <niko.afv@gmail.com>
WORKDIR /usr/share/nginx/html
RUN chown -R www-data:www-data /usr/share/nginx/html

RUN rm /etc/apt/preferences.d/no-debian-php

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libcurl3-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        git \
        vim \
        libxml2-dev \
        php-soap  \
        cron \
        coreutils \
        rsyslog \
        parallel \
        unzip \
        sudo \
        nodejs \
    && docker-php-ext-install -j$(nproc) iconv pdo_mysql curl zip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd  \
    && docker-php-ext-install soap \
    && docker-php-ext-install pcntl

RUN curl -L https://npmjs.org/install.sh | sudo sh

RUN curl -s https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer global require "laravel/installer" \
    && composer install


ENV  PATH="$PATH:/root/.composer/vendor/bin"
