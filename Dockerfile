# Base image for both stages
FROM php:8.3-fpm as base

WORKDIR /var/www

# Install base dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl redis
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# ---------------------------------------
# Development stage
# ---------------------------------------
FROM base as dev

USER www

# ---------------------------------------
# Production stage
# ---------------------------------------
FROM base as php

COPY --chown=www:www . /var/www

USER www

EXPOSE 8070
CMD ["php-fpm"]