# alpine
FROM php:7.4-fpm-alpine3.12

ENV PS1="\u@\h:\w\\$ "

RUN apk update \
 && apk add --no-cache $PHPIZE_DEPS \
    bash \
    git \
    zip \
    unzip

# PHP extensions
RUN docker-php-ext-install opcache pdo_mysql mysqli
RUN docker-php-ext-enable opcache
#

# xdebug extensions
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
#

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#

# Composer parallel install plugin
WORKDIR /app
COPY trad_app /app
RUN composer install
#

RUN rm -rf /var/cache/apk/*

CMD ["php-fpm", "--nodaemonize"]