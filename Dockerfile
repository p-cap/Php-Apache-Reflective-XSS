#Pull an apache image to run php
FROM php:8.0-apache

# Set working directory  
WORKDIR /var/www/html

# Copy files
COPY site/ .

# Expose port to make it reachable
EXPOSE 80
 
