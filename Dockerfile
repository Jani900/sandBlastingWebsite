# Use the official PHP 8.1 image as the base image
FROM php:8.1

# Set the working directory
WORKDIR /var/www/html

# Copy project files to the working directory
COPY . /var/www/html

# Expose port 3002
EXPOSE 3002

# Use the php -S command to start the project, listening on 0.0.0.0:3002
CMD ["php", "-S", "0.0.0.0:3002", "-t", "/var/www/html"]