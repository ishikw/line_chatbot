FROM nginx

MAINTAINER "" <>

COPY config/nginx.conf /etc/nginx/nginx.conf
COPY config/laravel.conf /etc/nginx/conf.d/laravel.conf
RUN rm /etc/nginx/conf.d/default.conf

RUN mkdir -p /data
VOLUME ["/data"]
