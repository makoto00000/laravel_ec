FROM php:fpm-buster

COPY ./docker/php/php.ini /usr/local/etx/php/php.ini

RUN apt-get update \
  && apt-get -y install git zip unzip vim

RUN docker-php-ext-install pdo_mysql

RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

COPY ./src/. /var/www/html
WORKDIR /var/www/html

RUN if [ -f "./composer.json" ]; then \
      composer install; \
    fi
