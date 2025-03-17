# Use an official PHP runtime as a parent image
FROM php:8.2-apache

# Set working directory
#create app directory
RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app

# Copy the rest of the application code
COPY composer.json .

# Install system dependencies
RUN apt-get update \
    && apt-get install -y \
        git \
        unzip \
		curl \
		unzip

# Install common system packages for PHP extensions recommended for Yii 2.0 Framework
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions \
	intl \
	pdo_mysql \
	pdo_pgsql \
	gd \
	pcntl \
	soap \
	zip \
	bcmath \
	exif \
	opcache

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN chmod +x /usr/local/bin/composer

# Install project dependencies
RUN composer install --no-scripts --no-autoloader

# Run Composer scripts, autoload, and other commands needed to start your application
RUN composer dump-autoload --optimize

# Expose the port Apache listens on
EXPOSE 8080

CMD ["php", "assignment/yii", "serve", "--port=8080"]
#CMD ["php", "-S", "localhost:80"]