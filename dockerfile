# Usa una imagen oficial de PHP con Apache
FROM php:8.0-apache

# Instala las extensiones necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    apache2 \
    nano \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd \
    && a2enmod rewrite

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configura Apache
RUN a2enmod rewrite

# Copia los archivos de la aplicación
COPY . /var/www/html/

# Establece el directorio de trabajo
WORKDIR /var/www/html/

# Permitir que Composer se ejecute como superusuario
ENV COMPOSER_ALLOW_SUPERUSER=1

# Instala las dependencias de Composer
RUN composer install

# Instalar anotaciones
RUN composer require annotations

# Ajusta los permisos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html

# Configurar Apache
COPY ./docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Exponer el puerto 80
EXPOSE 80

CMD ["apache2-foreground"]