FROM php:8.3-fpm-alpine

ARG XDEBUG_CLIENT_HOST=host.docker.internal
RUN echo "XDEBUG_CLIENT_HOST = ${XDEBUG_CLIENT_HOST}"

LABEL maintainer="WelcomeToDubai"

ARG ENVIRONMENT=Dev

RUN apk add --update \
    zip \
    curl \
    bash \
    make \
    git \
    wget \
    php-intl \
    gmp-dev \
    icu-dev \
    libzip-dev \
    libpng-dev \
    libxslt-dev \
    libpq-dev

# Enable libs
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql

RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

RUN docker-php-ext-install bcmath
RUN docker-php-ext-install gd
RUN docker-php-ext-install gmp

# Install amqp
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync && install-php-extensions amqp

# Install APCu
RUN apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted php-pecl-apcu
RUN docker-php-ext-enable opcache

# Install Node
RUN apk add --update \
    nodejs \
    npm \
    yarn

# Install and configure Redis
RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \
  && pecl install redis \
  && docker-php-ext-enable redis \
  && apk del pcre-dev ${PHPIZE_DEPS} \
  && rm -rf /tmp/pear

WORKDIR /var/www/html/welcome-to-dubai/app
COPY ./ .

# Install and configure Xdebug
RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \
    && pecl config-set php_ini /etc/php.ini \
    && apk add --no-cache --update linux-headers \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apk del pcre-dev ${PHPIZE_DEPS}
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.max_nesting_level=-1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=${XDEBUG_CLIENT_HOST}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install Composer
RUN curl -o /usr/local/bin/composer https://getcomposer.org/download/latest-stable/composer.phar \
  && chmod +x /usr/local/bin/composer
