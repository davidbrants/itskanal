FROM wordpress:6.7-php8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libwebp-dev \
    && rm -rf /var/lib/apt/lists/*

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd zip exif

# Enable Apache modules
RUN a2enmod rewrite expires headers deflate

# Copy only our custom theme and plugins (WordPress core already exists in base image)
COPY --chown=www-data:www-data ./wp-content/themes/itskanal /var/www/html/wp-content/themes/itskanal
COPY --chown=www-data:www-data ./wp-content/plugins /var/www/html/wp-content/plugins

# Copy health check
COPY --chown=www-data:www-data ./health-check.php /var/www/html/health-check.php

# Create wp-config.php from template
COPY --chown=www-data:www-data <<'EOF' /var/www/html/wp-config-railway.php
<?php
$is_railway = getenv('RAILWAY_ENVIRONMENT') !== false;
$is_local = !$is_railway;

if ( $is_railway ) {
    $mysql_url = getenv('MYSQL_URL') ?: getenv('MYSQLURL') ?: getenv('DATABASE_URL');
    if ( $mysql_url ) {
        $db = parse_url( $mysql_url );
        define( 'DB_NAME', ltrim( $db['path'], '/' ) );
        define( 'DB_USER', $db['user'] );
        define( 'DB_PASSWORD', $db['pass'] );
        define( 'DB_HOST', $db['host'] . ':' . ( $db['port'] ?? 3306 ) );
    } else {
        define( 'DB_NAME', getenv('DB_NAME') ?: 'railway' );
        define( 'DB_USER', getenv('DB_USER') ?: 'root' );
        define( 'DB_PASSWORD', getenv('DB_PASSWORD') ?: '' );
        define( 'DB_HOST', getenv('DB_HOST') ?: 'mysql.railway.internal:3306' );
    }
} else {
    define( 'DB_NAME', 'itskanal_db' );
    define( 'DB_USER', 'itskanal_user' );
    define( 'DB_PASSWORD', 'itskanal_pass123' );
    define( 'DB_HOST', 'db:3306' );
}

define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

if ( $is_railway ) {
    define('AUTH_KEY',         getenv('AUTH_KEY') ?: 'put your unique phrase here');
    define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY') ?: 'put your unique phrase here');
    define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY') ?: 'put your unique phrase here');
    define('NONCE_KEY',        getenv('NONCE_KEY') ?: 'put your unique phrase here');
    define('AUTH_SALT',        getenv('AUTH_SALT') ?: 'put your unique phrase here');
    define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') ?: 'put your unique phrase here');
    define('LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT') ?: 'put your unique phrase here');
    define('NONCE_SALT',       getenv('NONCE_SALT') ?: 'put your unique phrase here');
}

$table_prefix = getenv('DB_TABLE_PREFIX') ?: 'wp_';

if ( $is_railway ) {
    $railway_domain = getenv('RAILWAY_PUBLIC_DOMAIN');
    if ( $railway_domain ) {
        $site_url = 'https://' . $railway_domain;
        define( 'WP_HOME', $site_url );
        define( 'WP_SITEURL', $site_url );
    }
}

define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_ENVIRONMENT_TYPE', 'production' );
define( 'DISALLOW_FILE_EDIT', true );
define( 'WP_POST_REVISIONS', 5 );
define( 'AUTOSAVE_INTERVAL', 160 );
define( 'WP_MEMORY_LIMIT', '256M' );

if ( $is_railway ) {
    define( 'FORCE_SSL_ADMIN', true );
    if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
        $_SERVER['HTTPS'] = 'on';
    }
}

define( 'WP_CACHE', true );
define( 'COMPRESS_CSS', true );
define( 'COMPRESS_SCRIPTS', true );

if ( $is_railway ) {
    define( 'AUTOMATIC_UPDATER_DISABLED', true );
    define( 'WP_AUTO_UPDATE_CORE', false );
}

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
EOF

# Rename to wp-config.php
RUN mv /var/www/html/wp-config-railway.php /var/www/html/wp-config.php

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \; \
    && chmod 600 /var/www/html/wp-config.php

# Configure PHP for production
RUN { \
    echo 'upload_max_filesize = 64M'; \
    echo 'post_max_size = 64M'; \
    echo 'memory_limit = 256M'; \
    echo 'max_execution_time = 300'; \
    echo 'max_input_time = 300'; \
    echo 'expose_php = Off'; \
    } > /usr/local/etc/php/conf.d/railway-wordpress.ini

# Copy custom entrypoint for Railway port handling
COPY --chmod=755 docker-entrypoint.sh /usr/local/bin/railway-entrypoint.sh

# Set working directory
WORKDIR /var/www/html

# Expose port (Railway will override with $PORT)
EXPOSE 80

# Health check
HEALTHCHECK --interval=30s --timeout=10s --start-period=60s --retries=3 \
    CMD curl -f http://localhost/health-check.php || exit 1

# Use custom entrypoint
ENTRYPOINT ["/usr/local/bin/railway-entrypoint.sh"]
