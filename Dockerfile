# Etapa 1: Constructor de Dependencias de PHP (Composer)
FROM composer:2.8 as builder
WORKDIR /app
COPY database/ composer.json composer.lock./
RUN composer install --no-dev --no-interaction --optimize-autoloader --no-progress --prefer-dist
COPY . .
RUN php artisan key:generate --force
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Etapa 2: Constructor de Activos Frontend (Node.js)
FROM node:22-alpine as frontend
WORKDIR /app
COPY package.json package-lock.json./
RUN npm install
COPY . .
RUN npm run build

# Etapa 3: Imagen Final de Producción
FROM php:8.3-fpm-alpine
WORKDIR /var/www

# Crear un usuario y grupo no-root para la aplicación por seguridad
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

# Instalar el instalador de extensiones de PHP para una gestión más limpia
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# Instalar dependencias del sistema y extensiones de PHP necesarias para Laravel
# bcmath, exif, pcntl, gd, zip son comunes en proyectos Laravel
# pdo_sqlite para la base de datos y redis para el caché/colas
RUN install-php-extensions pdo_sqlite redis bcmath exif pcntl gd zip

# Copiar configuración personalizada de PHP
COPY docker/php/php.local.ini /usr/local/etc/php/conf.d/local.ini

# Copiar artefactos de las etapas anteriores
COPY --from=builder /app /var/www
COPY --from=frontend /app/public/build /var/www/public/build

# Establecer permisos correctos para el usuario de la aplicación
RUN chown -R appuser:appgroup /var/www

# Cambiar al usuario no-root
USER appuser

# Exponer el puerto de PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]