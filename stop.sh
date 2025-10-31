#!/bin/bash

# iTS KANAL Docker Stop Script

echo "🛑 Stopping iTS KANAL WordPress Site..."

docker-compose down

echo "✅ All containers stopped."
echo ""
echo "💡 To start again: ./start.sh"
echo "🗑️  To remove all data: docker-compose down -v"
