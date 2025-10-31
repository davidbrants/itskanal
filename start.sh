#!/bin/bash

# iTS KANAL Docker Start Script

echo "🚀 Starting iTS KANAL WordPress Site..."
echo ""

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Docker is not running. Please start Docker Desktop first."
    exit 1
fi

# Stop any existing containers
echo "🛑 Stopping any existing containers..."
docker-compose down

# Start containers
echo "🔄 Starting Docker containers..."
docker-compose up -d

# Wait for containers to be healthy
echo "⏳ Waiting for services to start..."
sleep 10

# Check if containers are running
if [ "$(docker ps -q -f name=itskanal_wordpress)" ]; then
    echo ""
    echo "✅ WordPress is running!"
    echo "🌐 Website: http://localhost:8000"
    echo "🗄️  phpMyAdmin: http://localhost:8080"
    echo ""
    echo "📝 Database Credentials:"
    echo "   - Database: itskanal_db"
    echo "   - Username: itskanal_user"
    echo "   - Password: itskanal_pass123"
    echo ""
    echo "🔐 phpMyAdmin Login:"
    echo "   - Server: db"
    echo "   - Username: root"
    echo "   - Password: rootpassword123"
    echo ""
    echo "💡 To stop the site: ./stop.sh"
    echo "📊 To view logs: docker-compose logs -f"
    echo ""

    # Open browser automatically (macOS)
    if [[ "$OSTYPE" == "darwin"* ]]; then
        echo "🌍 Opening browser..."
        sleep 3
        open http://localhost:8000
    fi
else
    echo ""
    echo "❌ Failed to start WordPress container."
    echo "📋 Check logs with: docker-compose logs"
    exit 1
fi
