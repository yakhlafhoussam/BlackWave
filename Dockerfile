# Base image
FROM php:8.4-fpm-alpine

RUN apk add --no-cache \
    bash \
    curl \
    git \
    unzip \
    zip \
    postgresql-dev \
    nodejs \
    npm \
    build-base \
    autoconf \
    re2c \
    libtool \
    make \
    pkgconfig \
    zlib-dev \
    oniguruma-dev \
    libxml2-dev

RUN docker-php-ext-install pdo pdo_pgsql pgsql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html