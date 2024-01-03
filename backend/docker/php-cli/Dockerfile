FROM php:8.3-cli

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

RUN addgroup --gid 1000 yii2 && adduser --uid 1000 --ingroup yii2 -shell /bin/bash --disabled-password yii2

RUN apt update && apt install -y unzip && pecl install xdebug && docker-php-ext-enable xdebug && docker-php-ext-install opcache

RUN apt -y update \
    && apt install -y libmcrypt-dev libpq-dev libicu-dev libonig-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo_pgsql pgsql pdo_mysql \
    && pecl install mcrypt-1.0.7 \
    && docker-php-ext-enable mcrypt intl \
    && apt clean \

COPY ./php-cli/conf.d /usr/local/etc/php/conf.d

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /yii2-start/backend

USER yii2
