# Gunakan image PHP 8.3 FPM
FROM php:8.3-fpm
# Install dependensi sistem yang diperlukan
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip libzip-dev \
    libjpeg-dev libfreetype6-dev libssl-dev libcurl4-openssl-dev \
    libicu-dev libmcrypt-dev libpq-dev libxslt-dev default-mysql-client \
    libsodium-dev && docker-php-ext-install pdo pdo_mysql zip gd sodium
# Install Composer (PHP dependency manager)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Set direktori kerja
WORKDIR /var/www
# Salin semua file project ke dalam container
COPY . .
# Install dependensi Laravel dengan Composer
RUN composer install --no-dev --optimize-autoloader
# Set izin yang sesuai untuk Laravel (storage dan cache)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
# Expose port 8000 untuk Laravel
EXPOSE 8000
# Jalankan perintah Laravel untuk memulai aplikasi
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]