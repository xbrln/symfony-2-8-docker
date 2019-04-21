FROM php:7.1-fpm-alpine

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# update and install required packages
RUN apk update && apk upgrade \
    php7-gd \
    php7-mysqli \
    php7-zlib \
    php7-curl

# install pdo mysql
RUN docker-php-ext-install pdo_mysql

# Set timezone
RUN printf '[PHP]\ndate.timezone = "Europe/Berlin"\n' > /usr/local/etc/php/conf.d/tzone.ini

# set memory to unlimited
RUN printf 'memory_limit = -1' > /usr/local/etc/php/conf.d/memory-limit-php.ini

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]