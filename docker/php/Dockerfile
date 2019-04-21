FROM php:7.1-fpm-alpine

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Update packages
RUN apk update && apk upgrade

# Install mysqli
RUN apk add php7-mysqli

# Install pdo mysql
RUN docker-php-ext-install pdo_mysql

# Set timezone
RUN printf '[PHP]\ndate.timezone = "Europe/Berlin"\n' > /usr/local/etc/php/conf.d/tzone.ini

# Set memory to unlimited
RUN printf 'memory_limit = -1' > /usr/local/etc/php/conf.d/memory-limit-php.ini

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Expose port 9000
EXPOSE 9000

# start php-fpm server
CMD ["php-fpm"]