FROM php:5.6-fpm

# Установка системных зависимостей
#RUN apt-get update && apt-get install -y \
#    git \
#    libicu-dev \
#    libzip-dev \
#    && rm -rf /var/lib/apt/lists/*

# Установка PHP-расширений
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html
