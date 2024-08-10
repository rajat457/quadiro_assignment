FROM php:7.4-apache

# Install PHP extensions
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy your PHP files
COPY . /var/www/html/

# Expose port 80
EXPOSE 80

# Set the working directory
WORKDIR /var/www/html

# Start Apache
CMD ["apache2-foreground"]
