FROM php:8.3-fpm

RUN apt update && apt install -y unzip && pecl install xdebug && docker-php-ext-enable xdebug

COPY ./php-cli/conf.d /usr/local/etc/php/conf.d

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

RUN apt -y update \
    && apt install -y libmcrypt-dev libpq-dev libicu-dev libonig-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo_pgsql pgsql pdo_mysql \
    && pecl install mcrypt-1.0.7 \
    && docker-php-ext-enable mcrypt intl \
    && apt clean \

WORKDIR /yii2-start/backend
