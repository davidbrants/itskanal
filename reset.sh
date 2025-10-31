#!/bin/bash

# iTS KANAL Docker Reset Script
# WARNING: This will delete all database data!

echo "⚠️  WARNING: This will delete ALL data including the database!"
echo "Are you sure you want to continue? (yes/no)"
read -r response

if [[ "$response" != "yes" ]]; then
    echo "❌ Reset cancelled."
    exit 0
fi

echo "🗑️  Stopping and removing containers..."
docker-compose down -v

echo "🧹 Cleaning up..."
rm -rf wp-content/uploads/*
rm -rf wp-content/cache/*

echo "✅ Reset complete!"
echo ""
echo "💡 Run ./start.sh to start fresh"
