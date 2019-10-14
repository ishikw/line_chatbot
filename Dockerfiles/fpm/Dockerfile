FROM php:7.2.2-fpm

MAINTAINER "" <>

RUN apt-get update -y \
    && apt-get install -y libpq-dev libzip-dev\
    && apt-get install -y libmcrypt-dev mysql-client libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install zip \
    && docker-php-ext-install sockets \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

# clean fpm conf
# RUN rm /usr/local/etc/php-fpm.d/*
COPY php-fpm.d /usr/local/etc/php-fpm.d
COPY php.ini 	/usr/local/etc/php/conf.d/php.ini

RUN mkdir -p /data
RUN mkdir -p /data/logs
VOLUME ["/data"]
