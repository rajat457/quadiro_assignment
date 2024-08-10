# Use the official PHP image from the Docker Hub
FROM php:7.4-apache

# Copy your PHP files into the container
COPY . /var/www/html/

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
