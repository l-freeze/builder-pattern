FROM php:8.3-fpm-alpine3.20
ARG APP_NAME
ARG APP_ROOT
ARG MYSQL_DATABASE
ARG MYSQL_USER
ARG MYSQL_PASSWORD
ARG MYSQL_ROOT_PASSWORD
ARG MAIL_FROM_ADDRESS

#composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME "/opt/composer"
ENV PATH "$PATH:/opt/composer/vendor/bin"
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

RUN apk update && apk add \
        zip \
        unzip \
        freetype-dev \
        libjpeg-turbo-dev \
        zlib-dev \
        openssl-dev \
        bzip2-dev \
        readline-dev \
        sqlite-dev \
        libffi-dev \
        mlocate \
        autoconf \
        bison \
        alpine-sdk \
        re2c \
        libxml2-dev \
        pkgconf \
        curl-dev openssl-dev \
        libpng-dev \
        oniguruma-dev \
        postgresql-dev \
        libzip-dev \
        jpeg-dev \
        zstd \
        zstd-dev \
        vim \
        git \
        openssh \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql opcache \
    && pecl install zstd \
    && pecl install igbinary \
    && printf "yes\nno\nyes\n" | pecl install redis \
    && pecl install xdebug \
    && docker-php-ext-enable zstd igbinary redis xdebug

RUN mkdir /var/command
#WORKDIR /var/command
WORKDIR $APP_ROOT
COPY ./files/laravel.gitignore ./
