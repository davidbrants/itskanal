# Railway Deployment Guide - iTS KANAL WordPress

Complete guide to deploying the iTS KANAL WordPress website to Railway.

---

## Table of Contents

1. [Overview](#overview)
2. [Prerequisites](#prerequisites)
3. [Quick Deployment](#quick-deployment)
4. [Manual Deployment](#manual-deployment)
5. [Environment Variables](#environment-variables)
6. [Database Setup](#database-setup)
7. [Post-Deployment Configuration](#post-deployment-configuration)
8. [Monitoring & Maintenance](#monitoring--maintenance)
9. [Troubleshooting](#troubleshooting)
10. [Cost Estimation](#cost-estimation)

---

## Overview

Railway is a modern Platform-as-a-Service (PaaS) that makes deploying WordPress easy with:

✓ **One-click MySQL database**
✓ **Automatic HTTPS certificates**
✓ **Git-based deployments**
✓ **Environment variable management**
✓ **Automatic scaling**
✓ **Built-in monitoring**

**Deployment Time:** ~15 minutes
**Monthly Cost:** Starting at $5-20/month (includes database)

---

## Prerequisites

### Required

- **Railway Account**: Sign up at [railway.app](https://railway.app)
- **Railway CLI**: For deployment automation
- **Git**: For version control (optional but recommended)
- **Node.js 16+**: For building CSS assets

### Installation

```bash
# Install Railway CLI globally
npm install -g @railway/cli

# Verify installation
railway --version

# Login to Railway
railway login
```

---

## Quick Deployment

The fastest way to deploy using our automated script:

### Step 1: Prepare Your Project

```bash
# Navigate to project directory
cd /Users/hem/Documents/websites/itskanal

# Build production CSS
cd wp-content/themes/itskanal
npm install
npm run build
cd ../../..
```

### Step 2: Run Deployment Script

```bash
# Make script executable (if needed)
chmod +x deploy-railway.sh

# Run automated deployment
./deploy-railway.sh
```

The script will:
- ✓ Check prerequisites
- ✓ Build production assets
- ✓ Link/create Railway project
- ✓ Prompt for database setup
- ✓ Guide you through environment variables
- ✓ Deploy to Railway
- ✓ Provide deployment URL

### Step 3: Complete WordPress Installation

1. Visit your Railway deployment URL
2. Select language (German/Deutsch)
3. Fill in site information:
   - **Site Title**: iTS KANAL SERVICES
   - **Username**: Choose secure username (not "admin")
   - **Password**: Generate strong password
   - **Email**: Your admin email
4. Click "Install WordPress"

### Step 4: Activate Theme

1. Login to WordPress admin (`/wp-admin`)
2. Go to **Appearance → Themes**
3. Activate **"iTS KANAL"** theme
4. Go to **Settings → Permalinks** → Select "Post name"
5. Go to **Settings → Reading** → Set static homepage

**Done! Your site is live! 🎉**

---

## Manual Deployment

For more control over the deployment process:

### Step 1: Create Railway Project

```bash
# Initialize new Railway project
railway init

# Or link to existing project
railway link
```

### Step 2: Add MySQL Database

**Via Railway Dashboard:**

1. Go to https://railway.app/dashboard
2. Click your project
3. Click **"New"** → **"Database"** → **"Add MySQL"**
4. Railway automatically creates `MYSQLURL` environment variable

**Via CLI:**

```bash
railway add
# Select: MySQL
```

### Step 3: Set Environment Variables

Generate WordPress security keys:

```bash
# Get security keys from WordPress API
curl https://api.wordpress.org/secret-key/1.1/salt/
```

Set in Railway dashboard or via CLI:

```bash
# Via CLI
railway variables set AUTH_KEY="your-key-here"
railway variables set SECURE_AUTH_KEY="your-key-here"
railway variables set LOGGED_IN_KEY="your-key-here"
railway variables set NONCE_KEY="your-key-here"
railway variables set AUTH_SALT="your-key-here"
railway variables set SECURE_AUTH_SALT="your-key-here"
railway variables set LOGGED_IN_SALT="your-key-here"
railway variables set NONCE_SALT="your-key-here"
```

Or copy from `.env.railway.example` and set via dashboard.

### Step 4: Build Production Assets

```bash
cd wp-content/themes/itskanal
npm install
npm run build
cd ../../..
```

### Step 5: Deploy

```bash
# Deploy to Railway
railway up

# Follow deployment progress
railway logs
```

### Step 6: Get Your Domain

```bash
# Generate Railway domain
railway domain

# Your site will be at: https://your-project.up.railway.app
```

---

## Environment Variables

### Required Variables

Railway MySQL plugin automatically provides:

| Variable | Description | Provided By |
|----------|-------------|-------------|
| `MYSQLURL` | Complete MySQL connection string | Railway MySQL Plugin |
| `RAILWAY_ENVIRONMENT` | Environment name (production/staging) | Railway |
| `RAILWAY_PUBLIC_DOMAIN` | Your app's public URL | Railway |

### WordPress Security Keys (REQUIRED)

Generate at: https://api.wordpress.org/secret-key/1.1/salt/

| Variable | Example |
|----------|---------|
| `AUTH_KEY` | `'put your unique phrase here'` |
| `SECURE_AUTH_KEY` | `'put your unique phrase here'` |
| `LOGGED_IN_KEY` | `'put your unique phrase here'` |
| `NONCE_KEY` | `'put your unique phrase here'` |
| `AUTH_SALT` | `'put your unique phrase here'` |
| `SECURE_AUTH_SALT` | `'put your unique phrase here'` |
| `LOGGED_IN_SALT` | `'put your unique phrase here'` |
| `NONCE_SALT` | `'put your unique phrase here'` |

### Optional Variables

| Variable | Default | Description |
|----------|---------|-------------|
| `WP_DEBUG` | `false` | Enable WordPress debugging |
| `WP_DEBUG_LOG` | `false` | Log errors to file |
| `WP_MEMORY_LIMIT` | `256M` | PHP memory limit |
| `WP_POST_REVISIONS` | `5` | Number of post revisions |

### Setting Variables

**Via Railway Dashboard:**

1. Go to https://railway.app/dashboard
2. Select your project
3. Click **Variables** tab
4. Add/edit variables
5. Click **Save**

**Via CLI:**

```bash
# Set single variable
railway variables set KEY="value"

# View all variables
railway variables

# Delete variable
railway variables delete KEY
```

---

## Database Setup

### Automatic Setup (Recommended)

Railway MySQL plugin automatically:
- ✓ Creates database
- ✓ Sets up credentials
- ✓ Provides `MYSQLURL` connection string
- ✓ Configures backups

### Manual Connection Details

If you need individual connection details:

```bash
# Get MySQL connection URL
railway variables | grep MYSQLURL

# Format: mysql://user:password@host:port/database
```

Parse the URL:
- **Host**: `mysql.railway.internal`
- **Port**: `3306`
- **Database**: `railway` (default)
- **User**: From `MYSQLURL`
- **Password**: From `MYSQLURL`

### Database Management

**Connect via CLI:**

```bash
railway connect mysql
```

**Export Database:**

```bash
# Using Railway CLI
railway connect mysql -- mysqldump railway > backup.sql
```

**Import Database:**

```bash
# Import from local
railway connect mysql -- mysql railway < backup.sql
```

### Database Backups

Railway provides automatic backups:
- **Frequency**: Daily
- **Retention**: 7 days (Hobby plan)
- **Location**: Railway infrastructure

For additional backups, use WordPress plugins:
- UpdraftPlus
- BackWPup
- All-in-One WP Migration

---

## Post-Deployment Configuration

### 1. WordPress Installation

Visit your Railway URL and complete WordPress setup:

```
https://your-project.up.railway.app
```

### 2. Theme Activation

**Appearance → Themes** → Activate "iTS KANAL"

### 3. Permalinks

**Settings → Permalinks** → Select "Post name" → Save

### 4. Homepage Setup

**Settings → Reading:**
- Your homepage displays: **A static page**
- Homepage: Create/select "Home" page
- Posts page: Create/select "Blog" page

### 5. Menu Configuration

**Appearance → Menus:**

Create these menus:
- **Primary Menu** (main navigation)
- **Top Menu** (header top bar)
- **Footer Menus** (4 columns)

### 6. Customizer Settings

**Appearance → Customize:**
- **Site Identity**: Upload logo, set title
- **Contact Information**: Phone, email, address
- **Social Media**: LinkedIn, Instagram links
- **Partner Logos**: Upload partner company logos

### 7. Install Recommended Plugins

Essential plugins:
- **Advanced Custom Fields Pro**: Content management
- **WPML / Polylang**: Multilingual (DE, FR, IT, EN)
- **Contact Form 7**: Contact forms
- **Yoast SEO**: SEO optimization
- **Wordfence Security**: Security hardening
- **WP Rocket**: Caching & performance

### 8. Create Pages

Create these pages:
- Home (set as front page)
- Über uns (About)
- Dienstleistungen (Services)
  - Rohrreinigung
  - Kanalreinigung
  - Kanalinspektion
  - Kanalsanierung
- Standorte (Locations)
- Kontakt (Contact)
- Datenschutz (Privacy Policy)
- Impressum (Imprint)

### 9. SSL Configuration

Railway automatically provides HTTPS:
- ✓ SSL certificate auto-generated
- ✓ HTTP → HTTPS redirect enabled
- ✓ Force SSL in admin (configured in wp-config.php)

### 10. Custom Domain (Optional)

**Add your own domain:**

1. **Via Railway Dashboard:**
   - Click **Settings** → **Domains**
   - Click **Custom Domain**
   - Enter your domain: `www.itskanal.com`

2. **Update DNS Records:**

   Add CNAME record at your domain provider:
   ```
   Type: CNAME
   Name: www
   Value: your-project.up.railway.app
   TTL: 3600
   ```

3. **Wait for propagation** (5-60 minutes)

4. **Update WordPress URLs:**
   ```bash
   railway variables set RAILWAY_PUBLIC_DOMAIN="www.itskanal.com"
   ```

---

## Monitoring & Maintenance

### Viewing Logs

**Real-time logs:**

```bash
railway logs
```

**Filter logs:**

```bash
railway logs --filter error
```

**Via Dashboard:**
- https://railway.app/dashboard → Your Project → **Deployments** → View Logs

### Health Checks

Railway automatically monitors:
- **Endpoint**: `/health-check.php`
- **Interval**: 30 seconds
- **Timeout**: 10 seconds
- **Retries**: 3

**Manual health check:**

```bash
curl https://your-project.up.railway.app/health-check.php
```

### Performance Monitoring

**Check deployment metrics:**

```bash
railway status
```

**View resource usage:**
- Dashboard → Project → **Metrics**
- CPU usage
- Memory usage
- Network traffic

### Scaling

**Vertical Scaling (Resources):**
- Railway automatically scales resources
- Upgrade plan for more CPU/RAM

**Horizontal Scaling (Instances):**
- Available on Team plans
- Configure in `railway.json`

### Redeployment

**Redeploy after changes:**

```bash
# Build CSS
cd wp-content/themes/itskanal
npm run build
cd ../../..

# Deploy
railway up
```

**Rollback to previous deployment:**
- Dashboard → **Deployments** → Select previous → **Redeploy**

### Backup Strategy

**Database Backups:**

```bash
# Export database
railway connect mysql -- mysqldump railway > backup-$(date +%Y%m%d).sql

# Compress backup
gzip backup-$(date +%Y%m%d).sql
```

**WordPress Files:**

Use WordPress plugins:
- UpdraftPlus (recommended)
- BackWPup
- All-in-One WP Migration

**Automated Backups:**

Set up cron job or use Railway cron plugin:
```bash
# Weekly database backup
0 0 * * 0 railway connect mysql -- mysqldump railway | gzip > weekly-backup.sql.gz
```

---

## Troubleshooting

### Common Issues

#### 1. White Screen of Death

**Symptoms:** Blank white page

**Solutions:**

```bash
# Enable debug mode temporarily
railway variables set WP_DEBUG="true"
railway variables set WP_DEBUG_LOG="true"

# Check logs
railway logs

# Disable after fixing
railway variables set WP_DEBUG="false"
```

#### 2. Database Connection Error

**Symptoms:** "Error establishing database connection"

**Check:**

```bash
# Verify MySQL is running
railway status

# Check MYSQLURL variable exists
railway variables | grep MYSQLURL

# Test database connection
railway connect mysql
```

**Fix:**

```bash
# Restart MySQL service
# Via dashboard: Services → MySQL → Restart
```

#### 3. CSS Not Loading

**Symptoms:** Unstyled website

**Fix:**

```bash
# Rebuild CSS locally
cd wp-content/themes/itskanal
npm run build
cd ../../..

# Redeploy
railway up

# Clear browser cache
# Hard refresh: Cmd+Shift+R (Mac) or Ctrl+Shift+R (Windows)
```

#### 4. Images Not Displaying

**Symptoms:** Broken image links

**Check:**

```bash
# Verify uploads directory exists and is writable
railway logs | grep "uploads"
```

**Fix:**

Make sure images are uploaded after deployment or migrate from local database.

#### 5. 502 Bad Gateway

**Symptoms:** 502 error page

**Causes:**
- Application crashed
- Out of memory
- Deployment in progress

**Fix:**

```bash
# Check deployment status
railway status

# View error logs
railway logs --filter error

# Restart service (via dashboard)
```

#### 6. Slow Performance

**Symptoms:** Pages load slowly

**Optimize:**

```bash
# Install caching plugin (WP Rocket, W3 Total Cache)
# Optimize images (Smush, ShortPixel)
# Enable CDN (Cloudflare)
# Check database queries (Query Monitor plugin)
```

#### 7. Environment Variables Not Working

**Symptoms:** Using default values instead of Railway variables

**Debug:**

```bash
# View all variables
railway variables

# Check wp-config.php is reading env vars
railway logs | grep "Railway environment"
```

**Fix:**

```bash
# Ensure variables are set correctly
railway variables set AUTH_KEY="your-key"

# Redeploy
railway up
```

### Getting Help

**Railway Documentation:**
- https://docs.railway.app

**Railway Discord:**
- https://discord.gg/railway

**WordPress Support:**
- https://wordpress.org/support

**View Logs:**

```bash
# All logs
railway logs

# Error logs only
railway logs --filter error

# Follow logs (real-time)
railway logs --follow
```

---

## Cost Estimation

### Railway Pricing

**Hobby Plan** (Starting at $5/month):
- $5/month base fee
- $0.000231/GB of disk storage/hour
- $10 credit included monthly
- Good for small to medium sites

**Pro Plan** ($20/month):
- $20 included usage credit
- Same usage rates
- Priority support
- Team features

### Estimated Monthly Costs

**Small Site** (< 10,000 visits/month):
- **Total**: ~$5-10/month
- WordPress + MySQL: ~$5
- Bandwidth: ~$0-2
- Storage: ~$1-3

**Medium Site** (10,000-100,000 visits/month):
- **Total**: ~$10-20/month
- WordPress + MySQL: ~$8
- Bandwidth: ~$5-10
- Storage: ~$2-5

**Large Site** (100,000+ visits/month):
- **Total**: ~$20-50/month
- Consider upgrading to Pro plan
- May need CDN (Cloudflare is free)

### Cost Optimization Tips

1. **Use CDN**: Offload static assets (Cloudflare free)
2. **Optimize Images**: Compress before upload (WebP format)
3. **Enable Caching**: Reduce database queries
4. **Limit Plugins**: Remove unused plugins
5. **Clean Database**: Regular optimization

---

## Best Practices

### Security

✓ Use strong passwords for WordPress admin
✓ Enable two-factor authentication
✓ Keep WordPress & plugins updated
✓ Install Wordfence Security plugin
✓ Regenerate security keys quarterly
✓ Regular database backups
✓ Monitor error logs

### Performance

✓ Use caching plugin (WP Rocket)
✓ Optimize images (WebP format)
✓ Enable Cloudflare CDN
✓ Minimize plugin usage
✓ Use lazy loading for images
✓ Optimize database regularly

### Maintenance

✓ Weekly: Check backups, review logs
✓ Monthly: Update plugins, optimize database
✓ Quarterly: Security audit, regenerate keys
✓ Monitor uptime and performance

---

## Quick Reference

### Useful Commands

```bash
# Login to Railway
railway login

# View project status
railway status

# View logs (real-time)
railway logs --follow

# View environment variables
railway variables

# Set environment variable
railway variables set KEY="value"

# Connect to MySQL
railway connect mysql

# Deploy
railway up

# Open Railway dashboard
railway open

# Get deployment URL
railway domain

# View recent deployments
railway deployments
```

### Important URLs

- **Railway Dashboard**: https://railway.app/dashboard
- **Documentation**: https://docs.railway.app
- **Status Page**: https://status.railway.app
- **Discord Support**: https://discord.gg/railway
- **WordPress Salts**: https://api.wordpress.org/secret-key/1.1/salt/

### Files Reference

| File | Purpose |
|------|---------|
| `railway.dockerfile` | Docker build configuration |
| `railway.json` | Railway deployment config |
| `.railwayignore` | Files to exclude from deployment |
| `.env.railway.example` | Environment variables template |
| `deploy-railway.sh` | Automated deployment script |
| `health-check.php` | Health monitoring endpoint |
| `wp-config.php` | WordPress configuration (Railway-ready) |

---

## Next Steps After Deployment

1. ✅ Complete WordPress installation
2. ✅ Activate iTS KANAL theme
3. ✅ Configure permalinks
4. ✅ Set static homepage
5. ✅ Install recommended plugins
6. ✅ Create pages and menus
7. ✅ Add content
8. ✅ Configure customizer settings
9. ✅ Set up contact form
10. ✅ Enable caching
11. ✅ Test on all devices
12. ✅ Set up regular backups
13. ✅ Configure custom domain (optional)
14. ✅ Enable Cloudflare CDN (optional)
15. ✅ Launch! 🚀

---

**Need Help?**

Check the logs: `railway logs`
View status: `railway status`
Railway Discord: https://discord.gg/railway

**Happy deploying! 🎉**
