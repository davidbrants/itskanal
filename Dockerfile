# Use official WordPress image
FROM wordpress:latest

# Install PostgreSQL support
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copy custom theme
COPY ./wp-content/themes/itskanal /var/www/html/wp-content/themes/itskanal

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html/wp-content/themes/itskanal

# Expose port 80
EXPOSE 80
