# alpine
FROM php:7.4-fpm-alpine3.12

ENV PS1="\u@\h:\w\\$ "

RUN apk update \
 && apk add --no-cache $PHPIZE_DEPS \
    bash \
    wget \
    git \
    zip \
    unzip \
    yarn
#    libxslt-dev \
#    libgcrypt-dev \
#    libsodium-dev \
#    libmcrypt-dev \
#    libpng-dev \
#    libicu-dev

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
# PHP extensions
RUN install-php-extensions opcache redis pdo_mysql bcmath xsl session intl gd xdebug zip amqp apcu
#RUN config-php-ext-install opcache pdo_mysql mysqli xsl session gd intl
RUN docker-php-ext-enable opcache xdebug apcu

# Composer
RUN wget -O - https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#

# Test ext
RUN ls
RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony
#RUN symfony book:check-requirements | echo
#RUN php -m
#RUN php --ini

# Composer parallel install plugin
WORKDIR /app
#COPY app /app
#RUN composer install
#RUN composer fund
#VOLUME app
#
RUN mkdir -p /app/var/log /app/var/cache
RUN chmod +w /app/var /app/var/log /app/var/cache
RUN rm -rf /var/cache/apk/*
CMD ["php-fpm", "--nodaemonize"]