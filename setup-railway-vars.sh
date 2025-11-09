#!/bin/bash

# Setup Railway MySQL connection for WordPress
# This script helps configure the MySQL connection variables

echo "Setting up Railway MySQL connection variables..."
echo ""

echo "Step 1: Get MySQL connection details"
echo "Run this command to see MySQL service variables:"
echo "  railway variables --service MySQL"
echo ""
echo "Step 2: Copy the MYSQL_URL value from MySQL service"
echo ""
echo "Step 3: Set it in the itskanal service:"
echo "  railway variables --set MYSQL_URL='<paste-mysql-url-here>'"
echo ""
echo "Alternative: Use Railway Service References"
echo "In Railway dashboard:"
echo "1. Go to itskanal service → Variables"
echo "2. Add variable: MYSQL_URL"
echo "3. Set value to: \${{MySQL.MYSQL_URL}}"
echo ""
echo "Or set individual variables:"
echo "  MYSQL_HOST = \${{MySQL.MYSQLHOST}}"
echo "  MYSQL_USER = \${{MySQL.MYSQLUSER}}"
echo "  MYSQL_PASSWORD = \${{MySQL.MYSQLPASSWORD}}"
echo "  MYSQL_DATABASE = \${{MySQL.MYSQLDATABASE}}"
echo ""
