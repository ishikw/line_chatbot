FROM debian:stretch

MAINTAINER "" <>

RUN apt-get update -y
RUN apt-get install -y curl git
RUN curl -sL https://deb.nodesource.com/setup | bash --
RUN apt-get install -y nodejs
RUN npm update -g npm
RUN npm cache clean
RUN npm i -g n
RUN n stable
RUN apt-get purge -y nodejs npm
RUN npm i -g gulp-cli

RUN mkdir -p /data/laravel
VOLUME ["/data"]
WORKDIR /data/laravel

ENTRYPOINT ["npm"]
CMD ["-h"]
