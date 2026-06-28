FROM php:8.2-apache

# Install Node (for Vite build)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && apt-get install -y nodejs

# Install system dependencies + PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql exif

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Build frontend assets
RUN npm install && npm run build

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Cache configs for performance
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Give permissions to storage & bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 80
EXPOSE 80

# Create production .env
RUN echo "APP_ENV=production" > /var/www/html/.env && \
    echo "APP_DEBUG=false" >> /var/www/html/.env && \
    echo "DB_CONNECTION=pgsql" >> /var/www/html/.env && \
    echo "LOG_CHANNEL=stack" >> /var/www/html/.env

# Apache should serve public folder
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Enable error logging to stdout
RUN echo "log_errors = On" >> /usr/local/etc/php/php.ini-production && \
    echo "error_log = /dev/stderr" >> /usr/local/etc/php/php.ini-production && \
    echo "display_errors = Off" >> /usr/local/etc/php/php.ini-production