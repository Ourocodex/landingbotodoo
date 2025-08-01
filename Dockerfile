FROM php:8.3-fpm-alpine
WORKDIR /var/www

# Install system dependencies
RUN apk add --no-cache \
    build-base \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    nodejs npm \
    git \
    sqlite-dev \
    autoconf

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_sqlite bcmath exif pcntl gd zip
RUN pecl install redis && docker-php-ext-enable redis

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create non-root user
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node.js dependencies and build assets
RUN npm install && npm run build

# Set permissions
RUN chown -R appuser:appgroup /var/www

# Copy PHP configuration
COPY docker/php/local.ini /usr/local/etc/php/conf.d/local.ini

# Switch to non-root user
USER appuser

# Cache configuration
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Expose port
EXPOSE 8069
CMD ["php-fpm"]