FROM php:8.1-fpm-alpine

# Arguments defined in docker-compose.yml
ARG user
ARG uid

LABEL Description="Base setup for IAmsterdam survey portal development."

RUN apk add --update --no-cache \
    $PHPIZE_DEPS \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    libpq-dev \
    imagemagick-dev \
    pcre-dev \
    npm \
    nodejs \
    && docker-php-ext-install pdo_mysql bcmath zip exif mysqli \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install -j "$(nproc)" gd \
    && pecl install redis xdebug-3.1.6 \
    && docker-php-ext-enable redis xdebug \
    && apk del $PHPIZE_DEPS

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && chmod +x /usr/bin/composer

RUN addgroup -S -g $uid $user \
    && adduser -S -D -u $uid -h /home/$user -G www-data $user

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

WORKDIR /var/www/html

USER $user
