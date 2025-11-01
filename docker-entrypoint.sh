#!/bin/bash
set -e

# Use Railway's PORT or default to 80
PORT=${PORT:-80}

echo "Configuring Apache to listen on port $PORT..."

# Update Apache ports configuration
sed -i "s/Listen 80/Listen $PORT/g" /etc/apache2/ports.conf
sed -i "s/:80>/:$PORT>/g" /etc/apache2/sites-available/000-default.conf

echo "Starting Apache on port $PORT..."

# Execute the original WordPress entrypoint
exec docker-entrypoint.sh apache2-foreground
