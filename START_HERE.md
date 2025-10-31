# 🚀 iTS KANAL WordPress - Start Here!

## Quick Start Guide

Your iTS KANAL WordPress site is ready! Here's how to get started:

### 1. Start Docker (Required)

```bash
# Open Docker Desktop
open -a Docker

# Wait for Docker to start (whale icon in menu bar)

# Then start your site
./start.sh
```

Your browser will automatically open to: **http://localhost:8000**

### 2. Complete WordPress Installation

When the page loads:
1. Select **"Deutsch"** (or your preferred language)
2. Fill in:
   - Site Title: `iTS KANAL SERVICES`
   - Username: Choose a secure username
   - Password: Generate a strong password
   - Email: your-email@example.com
3. Click **"Install WordPress"**
4. Log in with your credentials

### 3. Activate the Theme

1. Go to **Appearance → Themes**
2. Find **"iTS KANAL"**
3. Click **"Activate"**

### 4. Quick Configuration (5 minutes)

**Set Permalinks:**
```
Settings → Permalinks → "Post name" → Save
```

**Set Homepage:**
```
Pages → Add New → Title: "Home" → Publish
Settings → Reading → Static page → Homepage: "Home" → Save
```

**Add Contact Info:**
```
Appearance → Customize → Contact Information
  Phone: 056 300 00 78
  Email: info@itskanal.com
  Address: Wohlerstrasse 2, 5623 Boswil
→ Publish
```

## 🎯 What's Included

✅ **Complete WordPress Installation** (Latest version)
✅ **Custom iTS KANAL Theme** with Tailwind CSS
✅ **Partner Logo Section** ("Erfolg durch Partnerschaft")
✅ **Multiple Page Templates**:
   - Homepage (front-page.php)
   - Standorte - Locations (page-standorte.php)
   - Service Pages (page-services.php)
   - About Us (page-about.php)
   - Default pages (page.php, single.php)

✅ **WCAG 2.1 AA Compliant** (EAA ready)
✅ **Responsive Design** (Mobile, Tablet, Desktop)
✅ **Security Hardening** (Multiple layers)
✅ **Docker Setup** (Easy start/stop)

## 📋 Create These Pages

After installation, create pages for:

1. **Services** (Use "Service Page" template):
   - Rohrreinigung
   - Kanalreinigung
   - Kanalinspektion
   - Kanalsanierung
   - Flächenservices

2. **Company Pages**:
   - Standorte (Use "Standorte" template)
   - Über Uns (Use "About Us" template)
   - Kontakt (Default template)
   - Referenzen (Default template)
   - Geschäftskunden (Default template)

## 🗺️ Access Points

| Service | URL | Login |
|---------|-----|-------|
| **Website** | http://localhost:8000 | WP Admin account |
| **Admin Panel** | http://localhost:8000/wp-admin | WP Admin account |
| **phpMyAdmin** | http://localhost:8080 | root / rootpassword123 |

## 🎨 Design Features

✅ Exact color match to original (#0024BE)
✅ DM Sans & Jost typography
✅ Partner logos with hover effects
✅ Smooth animations
✅ Gradient backgrounds
✅ Service cards with icons
✅ 24/7 emergency section
✅ Customer testimonials
✅ Contact form section

## ♿ Accessibility Features

✅ **WCAG 2.1 AA Compliant**
✅ Color contrast exceeds AAA (10.33:1)
✅ Keyboard navigation
✅ Screen reader support
✅ Focus indicators
✅ Skip-to-main link
✅ Reduced motion support
✅ Semantic HTML
✅ Proper heading hierarchy

## 🛠️ Helpful Commands

```bash
# Start site
./start.sh

# Stop site
./stop.sh

# View logs
docker-compose logs -f

# Restart
./stop.sh && ./start.sh

# Fresh start (deletes data!)
./reset.sh
```

## 📚 Documentation

- **README.md** - Full project documentation
- **SETUP.md** - Detailed setup guide
- **DOCKER.md** - Docker-specific guide
- **ENHANCEMENTS.md** - All design improvements

## 🔧 Customization

All theme files are in:
```
wp-content/themes/itskanal/
```

**Rebuild CSS after changes:**
```bash
cd wp-content/themes/itskanal
npm run build
```

## 🎯 Next Steps

1. ✅ Start Docker
2. ✅ Run `./start.sh`
3. ✅ Complete WordPress installation
4. ✅ Activate iTS KANAL theme
5. ✅ Create pages
6. ✅ Configure menus
7. ✅ Add content
8. ✅ Test everything
9. ✅ Launch! 🚀

## ❓ Need Help?

- Check DOCKER.md for Docker issues
- Review SETUP.md for configuration
- See ENHANCEMENTS.md for features
- Read README.md for full docs

---

**Ready? Let's get started!**

```bash
./start.sh
```

Your site will be live at http://localhost:8000 in seconds! 🎉
