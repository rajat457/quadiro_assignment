FROM php:7.4-apache

# Install PHP extensions
RUN docker-php-ext-install mysqli

# Copy your PHP files
COPY . /var/www/html/

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
