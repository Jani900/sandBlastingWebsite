#use php 8.1 with Apache

FROM php:8.1-apache

#Copy the application files to the container
COPY . /var/www/html

#Expose port 80
EXPOSE 3000

#Install the required packages
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    vim \
    nano \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip gd mbstring exif pcntl bcmath opcache \
    && a2enmod rewrite \
    && service apache2 restart