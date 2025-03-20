# Laravel için PHP 8.2 ve Composer içeren bir resmi imaj kullan
FROM php:8.2-fpm

# Çalışma dizinini belirle
WORKDIR /var/www

# Sistem bağımlılıklarını yükle
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Composer yükle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Laravel için gerekli izinleri ayarla
RUN usermod -u 1000 www-data

# PHP-FPM başlatıcıyı çalıştır
CMD ["php-fpm"]
