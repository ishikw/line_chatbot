FROM php:7.3

MAINTAINER "" <>

WORKDIR /tmp

RUN apt-get update -y
RUN apt-get install -y git libzip-dev
RUN apt-get install -y libxrender1 libfontconfig1 libxext6 fonts-ipafont
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install zip
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN composer self-update
RUN composer global require hirak/prestissimo

RUN mkdir -p /data/laravel
VOLUME ["/data"]
WORKDIR /data/laravel

ENTRYPOINT ["composer"]
CMD ["--help"]
