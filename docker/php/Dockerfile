FROM php:8.4-fpm-alpine

WORKDIR /var/www

# Dependências
RUN apk add --no-cache \
    bash \
    git \
    curl \
    unzip \
    icu-dev \
    oniguruma-dev \
    libzip-dev \
    mysql-client \
    $PHPIZE_DEPS

# Extensões PHP
RUN docker-php-ext-configure intl \
 && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    zip \
    intl \
    opcache

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Usuário
RUN addgroup -g 1000 -S www \
 && adduser -u 1000 -S www -G www

# Permissões
RUN chown -R www:www /var/www

USER www
