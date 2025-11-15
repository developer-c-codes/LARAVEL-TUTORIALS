FROM node:20 as node_builder
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm install
COPY . .
RUN npm run build

FROM php:8.2-apache
LABEL maintainer="Your Name"

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

RUN rm -rf /var/www/html/*
COPY . /var/www/html

COPY --from=node_builder /app/public/build /var/www/html/public/build

RUN chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache


RUN composer install --no-dev --optimize-autoloader


RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache


COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite


EXPOSE 80