#!/bin/bash

# ============================================
# iTS KANAL WordPress - Railway Deployment Script
# ============================================

set -e  # Exit on error

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${BLUE}"
echo "╔════════════════════════════════════════╗"
echo "║  iTS KANAL - Railway Deployment       ║"
echo "╔════════════════════════════════════════╗"
echo -e "${NC}"

# ============================================
# 1. Prerequisites Check
# ============================================
echo -e "${YELLOW}[1/7] Checking prerequisites...${NC}"

# Check if Railway CLI is installed
if ! command -v railway &> /dev/null; then
    echo -e "${RED}❌ Railway CLI is not installed.${NC}"
    echo -e "${YELLOW}Installing Railway CLI...${NC}"
    npm install -g @railway/cli

    if [ $? -ne 0 ]; then
        echo -e "${RED}Failed to install Railway CLI. Install manually:${NC}"
        echo "npm install -g @railway/cli"
        exit 1
    fi
fi

echo -e "${GREEN}✓ Railway CLI is installed${NC}"

# Check if user is logged in to Railway
if ! railway whoami &> /dev/null; then
    echo -e "${YELLOW}⚠️  Not logged in to Railway${NC}"
    echo "Please login to Railway..."
    railway login

    if [ $? -ne 0 ]; then
        echo -e "${RED}❌ Railway login failed${NC}"
        exit 1
    fi
fi

echo -e "${GREEN}✓ Logged in to Railway${NC}"

# ============================================
# 2. Build Production Assets
# ============================================
echo -e "\n${YELLOW}[2/7] Building production assets...${NC}"

cd wp-content/themes/itskanal

# Check if node_modules exists
if [ ! -d "node_modules" ]; then
    echo "Installing npm dependencies..."
    npm install
fi

# Build Tailwind CSS for production
echo "Building Tailwind CSS..."
npm run build

if [ $? -ne 0 ]; then
    echo -e "${RED}❌ Failed to build CSS${NC}"
    exit 1
fi

echo -e "${GREEN}✓ Production CSS built successfully${NC}"

cd ../../..

# ============================================
# 3. Check Railway Project
# ============================================
echo -e "\n${YELLOW}[3/7] Checking Railway project...${NC}"

# Check if .railway directory exists (linked project)
if [ ! -d ".railway" ]; then
    echo -e "${YELLOW}⚠️  No Railway project linked${NC}"
    echo "Do you want to:"
    echo "  1) Link to existing Railway project"
    echo "  2) Create new Railway project"
    read -p "Enter choice (1 or 2): " choice

    case $choice in
        1)
            railway link
            ;;
        2)
            echo "Creating new Railway project..."
            railway init
            ;;
        *)
            echo -e "${RED}Invalid choice${NC}"
            exit 1
            ;;
    esac
fi

echo -e "${GREEN}✓ Railway project configured${NC}"

# ============================================
# 4. Database Setup
# ============================================
echo -e "\n${YELLOW}[4/7] Checking database setup...${NC}"

echo "Checking for MySQL plugin..."
if ! railway variables | grep -q "MYSQLURL"; then
    echo -e "${YELLOW}⚠️  MySQL plugin not detected${NC}"
    echo "Please add MySQL plugin to your Railway project:"
    echo "1. Go to your Railway dashboard"
    echo "2. Click 'New' → 'Database' → 'Add MySQL'"
    echo "3. Railway will automatically set MYSQL_URL environment variable"
    echo ""
    read -p "Press Enter once you've added MySQL plugin..."
fi

echo -e "${GREEN}✓ Database configuration ready${NC}"

# ============================================
# 5. Environment Variables
# ============================================
echo -e "\n${YELLOW}[5/7] Setting up environment variables...${NC}"

# Check if environment variables are set
REQUIRED_VARS=("AUTH_KEY" "SECURE_AUTH_KEY" "LOGGED_IN_KEY" "NONCE_KEY")
MISSING_VARS=()

for var in "${REQUIRED_VARS[@]}"; do
    if ! railway variables | grep -q "$var"; then
        MISSING_VARS+=("$var")
    fi
done

if [ ${#MISSING_VARS[@]} -gt 0 ]; then
    echo -e "${YELLOW}⚠️  Missing WordPress security keys${NC}"
    echo "Generating WordPress security keys..."

    # Generate keys using WordPress API
    KEYS=$(curl -s https://api.wordpress.org/secret-key/1.1/salt/)

    echo "$KEYS" > /tmp/wp-keys.txt

    echo "Please set these environment variables in Railway dashboard:"
    echo "Visit: https://railway.app/dashboard"
    echo ""
    cat /tmp/wp-keys.txt
    echo ""
    echo "Or copy from .env.railway.example and set manually"

    read -p "Press Enter once you've set the environment variables..."
    rm /tmp/wp-keys.txt
fi

echo -e "${GREEN}✓ Environment variables configured${NC}"

# ============================================
# 6. Pre-deployment Checks
# ============================================
echo -e "\n${YELLOW}[6/7] Running pre-deployment checks...${NC}"

# Check if wp-config.php exists
if [ ! -f "wp-config.php" ]; then
    echo -e "${RED}❌ wp-config.php not found${NC}"
    exit 1
fi

# Check if railway.dockerfile exists
if [ ! -f "railway.dockerfile" ]; then
    echo -e "${RED}❌ railway.dockerfile not found${NC}"
    exit 1
fi

# Check if theme CSS is built
if [ ! -f "wp-content/themes/itskanal/assets/css/style.css" ]; then
    echo -e "${RED}❌ Theme CSS not built${NC}"
    exit 1
fi

echo -e "${GREEN}✓ Pre-deployment checks passed${NC}"

# ============================================
# 7. Deploy to Railway
# ============================================
echo -e "\n${YELLOW}[7/7] Deploying to Railway...${NC}"

echo "Starting deployment..."
railway up --detach

if [ $? -eq 0 ]; then
    echo ""
    echo -e "${GREEN}╔════════════════════════════════════════╗${NC}"
    echo -e "${GREEN}║     ✓ Deployment Successful!          ║${NC}"
    echo -e "${GREEN}╔════════════════════════════════════════╗${NC}"
    echo ""

    # Get deployment URL
    echo "Fetching deployment URL..."
    DEPLOY_URL=$(railway domain 2>/dev/null || echo "Check Railway dashboard")

    echo -e "${BLUE}Deployment Details:${NC}"
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
    echo -e "🌐 URL: ${GREEN}${DEPLOY_URL}${NC}"
    echo "📊 Dashboard: https://railway.app/dashboard"
    echo "📝 Logs: railway logs"
    echo "🔧 Variables: railway variables"
    echo ""

    echo -e "${YELLOW}Next Steps:${NC}"
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
    echo "1. Visit your site and complete WordPress installation"
    echo "2. Activate the 'iTS KANAL' theme"
    echo "3. Configure permalinks (Settings → Permalinks → Post name)"
    echo "4. Set up homepage (Settings → Reading → Static page)"
    echo "5. Install recommended plugins (ACF Pro, WPML, etc.)"
    echo ""

    echo -e "${BLUE}Useful Commands:${NC}"
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
    echo "• View logs:        railway logs"
    echo "• View variables:   railway variables"
    echo "• Open dashboard:   railway open"
    echo "• Check status:     railway status"
    echo "• Redeploy:         railway up"
    echo ""

else
    echo -e "${RED}╔════════════════════════════════════════╗${NC}"
    echo -e "${RED}║     ✗ Deployment Failed!              ║${NC}"
    echo -e "${RED}╔════════════════════════════════════════╗${NC}"
    echo ""
    echo "Check the logs with: railway logs"
    exit 1
fi
