# Use the official PHP image with Apache
FROM php:8.2-apache

# Install mysqli extension for MySQL
RUN docker-php-ext-install mysqli

# Copy app source code to the container
COPY app/ /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80
