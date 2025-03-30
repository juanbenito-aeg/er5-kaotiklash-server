# Usa la imagen oficial de PHP con Apache
FROM php:8.4.5-apache

# Instala dependencias necesarias, incluyendo el driver de PostgreSQL
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia los archivos del proyecto al contenedor
COPY . /var/www/html

# Instala dependencias de Laravel
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Configura permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Expone el puerto 80
EXPOSE 80

# Define el comando de inicio
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]