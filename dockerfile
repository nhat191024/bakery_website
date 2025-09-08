# Sử dụng image php-fpm thay cho php-apache
FROM php:8.4-fpm

# Đặt thư mục làm việc
WORKDIR /var/www/html

# Cài đặt các extension PHP và dependencies cần thiết
RUN apt-get update && apt-get install -y --no-install-recommends \
    libzip-dev \
    libpng-dev \
    libpq-dev \
    nodejs \
    npm \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libicu-dev \
    supervisor \
    procps \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install zip pdo_mysql gd bcmath intl pcntl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy các file của dự án
COPY composer.json composer.lock package.json ./
RUN composer install --optimize-autoloader --no-scripts
RUN npm install

# Copy entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Tạo các thư mục cần thiết
RUN mkdir -p /var/www/html/storage/logs \
    && mkdir -p /var/www/html/storage/framework/cache \
    && mkdir -p /var/www/html/storage/framework/sessions \
    && mkdir -p /var/www/html/storage/framework/views \
    && mkdir -p /var/www/html/bootstrap/cache

# Gán quyền
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port mặc định của PHP-FPM (9000)
EXPOSE 9000

# Sử dụng entrypoint script để khởi động dịch vụ
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
