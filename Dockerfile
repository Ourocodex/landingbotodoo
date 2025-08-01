# Stage 1: PHP Dependencies Builder (Composer)
FROM composer:2.8 as builder
WORKDIR /app
COPY database/ composer.json composer.lock./
RUN composer install --no-dev --no-interaction --optimize-autoloader --no-progress --prefer-dist
COPY . .
RUN php artisan key:generate --force
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Stage 2: Frontend Assets Builder (Node.js)
FROM node:22-alpine as frontend
WORKDIR /app
COPY package.json package-lock.json./
RUN npm install
COPY . .
RUN npm run build

# Stage 3: Final Production Image
FROM php:8.3-fpm-alpine
WORKDIR /var/www

# Create non-root user/group for security
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

# Install PHP extension installer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# Install system dependencies and PHP extensions
RUN install-php-extensions pdo_sqlite redis bcmath exif pcntl gd zip

# Copy custom PHP configuration
COPY docker/php/php.local.ini /usr/local/etc/php/conf.d/local.ini

# Copy artifacts from previous stages
COPY --from=builder /app /var/www
COPY --from=frontend /app/public/build /var/www/public/build

# Set proper permissions
RUN chown -R appuser:appgroup /var/www

# Switch to non-root user
USER appuser

# Expose port for Cloudflare tunnel
EXPOSE 8069
CMD ["php-fpm"]