# Railway Deployment Checklist

Quick reference checklist for deploying iTS KANAL WordPress to Railway.

---

## Pre-Deployment

- [ ] Railway account created at [railway.app](https://railway.app)
- [ ] Railway CLI installed (`npm install -g @railway/cli`)
- [ ] Logged into Railway CLI (`railway login`)
- [ ] Node.js 16+ installed
- [ ] Project files ready

---

## Build & Preparation

- [ ] Navigate to project directory
  ```bash
  cd /Users/hem/Documents/websites/itskanal
  ```

- [ ] Install npm dependencies
  ```bash
  cd wp-content/themes/itskanal
  npm install
  ```

- [ ] Build production CSS
  ```bash
  npm run build
  cd ../../..
  ```

- [ ] Verify CSS file exists: `wp-content/themes/itskanal/assets/css/style.css`

---

## Railway Setup

- [ ] Initialize Railway project
  ```bash
  railway init
  # OR
  railway link  # if project exists
  ```

- [ ] Add MySQL database
  - Via CLI: `railway add` → Select MySQL
  - OR via Dashboard: New → Database → Add MySQL

- [ ] Verify MySQL variable set
  ```bash
  railway variables | grep MYSQLURL
  ```

---

## Environment Variables

- [ ] Generate WordPress security keys
  ```bash
  curl https://api.wordpress.org/secret-key/1.1/salt/
  ```

- [ ] Set security keys in Railway
  ```bash
  railway variables set AUTH_KEY="..."
  railway variables set SECURE_AUTH_KEY="..."
  railway variables set LOGGED_IN_KEY="..."
  railway variables set NONCE_KEY="..."
  railway variables set AUTH_SALT="..."
  railway variables set SECURE_AUTH_SALT="..."
  railway variables set LOGGED_IN_SALT="..."
  railway variables set NONCE_SALT="..."
  ```

  OR set via Railway Dashboard → Variables tab

- [ ] Verify all variables set
  ```bash
  railway variables
  ```

---

## Deployment

- [ ] Deploy to Railway
  ```bash
  railway up
  ```

- [ ] Monitor deployment
  ```bash
  railway logs
  ```

- [ ] Get deployment URL
  ```bash
  railway domain
  ```

- [ ] Test health check
  ```bash
  curl https://your-project.up.railway.app/health-check.php
  ```

---

## WordPress Installation

- [ ] Visit Railway URL in browser
- [ ] Select language: **Deutsch (German)**
- [ ] Fill in WordPress installation:
  - Site Title: **iTS KANAL SERVICES**
  - Username: _(secure username, not "admin")_
  - Password: _(strong password)_
  - Email: _(your admin email)_
- [ ] Click "Install WordPress"
- [ ] Login to WordPress admin

---

## Theme Configuration

- [ ] Activate theme
  - Appearance → Themes → Activate **"iTS KANAL"**

- [ ] Configure permalinks
  - Settings → Permalinks → Select **"Post name"** → Save

- [ ] Set static homepage
  - Settings → Reading → "A static page"
  - Homepage: Create/select **"Home"**
  - Save changes

---

## Content Setup

- [ ] Create pages:
  - [ ] Home (set as front page)
  - [ ] Über uns (About)
  - [ ] Dienstleistungen (Services)
  - [ ] Standorte (Locations)
  - [ ] Kontakt (Contact)
  - [ ] Datenschutz (Privacy Policy)
  - [ ] Impressum (Imprint)

- [ ] Create menus:
  - [ ] Primary Menu (main navigation)
  - [ ] Top Menu (header top bar)
  - [ ] Footer Menus

- [ ] Configure customizer:
  - [ ] Site Identity (logo, title)
  - [ ] Contact Information
  - [ ] Social Media Links
  - [ ] Partner Logos

---

## Plugin Installation

### Essential Plugins

- [ ] **Advanced Custom Fields Pro**
  - For content management
  - Configure custom fields for homepage

- [ ] **WPML** or **Polylang**
  - For multilingual support (DE, FR, IT, EN)
  - Set German as default language

- [ ] **Contact Form 7** or **WPForms**
  - For contact forms
  - Replace static form in front-page.php

### Recommended Plugins

- [ ] **Yoast SEO**
  - Configure meta descriptions
  - Generate XML sitemap

- [ ] **Wordfence Security**
  - Enable firewall
  - Enable malware scanning
  - Enable 2FA for admin

- [ ] **WP Rocket** or **W3 Total Cache**
  - Enable page caching
  - Enable file optimization
  - Configure CDN if available

- [ ] **Smush** or **ShortPixel**
  - Optimize images
  - Enable WebP conversion

- [ ] **UpdraftPlus**
  - Configure automated backups
  - Set backup to cloud storage

---

## Performance Optimization

- [ ] Enable caching plugin
- [ ] Optimize all images
- [ ] Configure CDN (Cloudflare recommended)
- [ ] Test page speed (PageSpeed Insights)
- [ ] Optimize database

---

## Security Hardening

- [ ] Change default "admin" username
- [ ] Use strong passwords
- [ ] Enable two-factor authentication
- [ ] Install Wordfence
- [ ] Limit login attempts
- [ ] Regular security scans
- [ ] Keep WordPress & plugins updated

---

## Testing

- [ ] Test on desktop browsers:
  - [ ] Chrome
  - [ ] Firefox
  - [ ] Safari
  - [ ] Edge

- [ ] Test on mobile devices:
  - [ ] iPhone/iOS Safari
  - [ ] Android Chrome

- [ ] Test functionality:
  - [ ] Navigation menus work
  - [ ] Contact form submits
  - [ ] Images load properly
  - [ ] Responsive design works
  - [ ] All pages accessible

- [ ] Test performance:
  - [ ] PageSpeed Insights
  - [ ] GTmetrix
  - [ ] WebPageTest

---

## Custom Domain (Optional)

- [ ] Add custom domain in Railway
  - Dashboard → Settings → Domains → Custom Domain

- [ ] Update DNS records at domain registrar:
  ```
  Type: CNAME
  Name: www
  Value: your-project.up.railway.app
  ```

- [ ] Update environment variable:
  ```bash
  railway variables set RAILWAY_PUBLIC_DOMAIN="www.itskanal.com"
  ```

- [ ] Wait for DNS propagation (5-60 minutes)

- [ ] Test custom domain

- [ ] Update WordPress site URL if needed

---

## Monitoring & Maintenance

- [ ] Set up monitoring:
  - [ ] Enable uptime monitoring (UptimeRobot)
  - [ ] Configure email alerts
  - [ ] Monitor Railway metrics

- [ ] Schedule regular tasks:
  - [ ] Weekly: Review logs, check backups
  - [ ] Monthly: Update plugins, optimize database
  - [ ] Quarterly: Security audit, regenerate keys

- [ ] Document credentials:
  - [ ] WordPress admin login
  - [ ] Railway project URL
  - [ ] Database credentials
  - [ ] Plugin license keys

---

## Backup Strategy

- [ ] Configure automated backups (UpdraftPlus)
  - Schedule: Daily database, Weekly files
  - Storage: Cloud (Dropbox, Google Drive, etc.)

- [ ] Test backup restoration

- [ ] Document backup location

- [ ] Create manual backup before major changes

---

## Launch Checklist

- [ ] All content added and reviewed
- [ ] All images optimized
- [ ] All links tested
- [ ] Contact form tested
- [ ] SEO configured (meta descriptions, sitemaps)
- [ ] Analytics installed (Google Analytics)
- [ ] Privacy policy and cookie notice
- [ ] SSL certificate active (automatic on Railway)
- [ ] Performance optimized
- [ ] Security hardened
- [ ] Backups configured
- [ ] Monitoring set up
- [ ] Team trained on WordPress admin
- [ ] Documentation complete

---

## Post-Launch

- [ ] Monitor logs for first 24 hours
  ```bash
  railway logs --follow
  ```

- [ ] Check health status
  ```bash
  curl https://your-domain.com/health-check.php
  ```

- [ ] Monitor performance metrics

- [ ] Review analytics setup

- [ ] Announce launch! 🎉

---

## Quick Commands Reference

```bash
# View logs
railway logs

# View status
railway status

# View variables
railway variables

# Redeploy
railway up

# Connect to database
railway connect mysql

# Open dashboard
railway open
```

---

## Troubleshooting

If issues occur, refer to:
- [ ] Check `RAILWAY_DEPLOYMENT.md` troubleshooting section
- [ ] View Railway logs: `railway logs`
- [ ] Check health endpoint: `curl https://your-url/health-check.php`
- [ ] Railway Discord: https://discord.gg/railway
- [ ] WordPress support: https://wordpress.org/support

---

**Deployment Complete! ✅**

Your iTS KANAL WordPress site is now live on Railway!

🌐 Site URL: `https://your-project.up.railway.app`
📊 Dashboard: `https://railway.app/dashboard`
📝 Logs: `railway logs`

**Next Steps:**
1. Add content
2. Install recommended plugins
3. Configure SEO
4. Set up analytics
5. Test thoroughly
6. Launch! 🚀
