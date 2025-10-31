# iTS KANAL WordPress Setup Guide

Quick start guide to get your iTS KANAL WordPress site up and running.

## Quick Setup (5 Minutes)

### 1. Database Setup

```bash
# Create MySQL database
mysql -u root -p
```

```sql
CREATE DATABASE itskanal_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'itskanal_user'@'localhost' IDENTIFIED BY 'YourStrongPassword123!';
GRANT ALL PRIVILEGES ON itskanal_db.* TO 'itskanal_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 2. WordPress Configuration

```bash
# Navigate to your WordPress directory
cd /Users/hem/Documents/websites/itskanal

# Copy the configuration file
cp wp-config-sample.php wp-config.php

# Edit the configuration
nano wp-config.php  # or use your preferred editor
```

Update these lines in `wp-config.php`:
```php
define( 'DB_NAME', 'itskanal_db' );
define( 'DB_USER', 'itskanal_user' );
define( 'DB_PASSWORD', 'YourStrongPassword123!' );
define( 'DB_HOST', 'localhost' );
```

### 3. Generate Security Keys

Visit https://api.wordpress.org/secret-key/1.1/salt/ and copy the generated keys.

Replace the placeholder keys in `wp-config.php` with the generated ones.

### 4. Set File Permissions

```bash
# Set directory permissions
find . -type d -exec chmod 755 {} \;

# Set file permissions
find . -type f -exec chmod 644 {} \;

# Secure wp-config.php
chmod 600 wp-config.php

# Make .htaccess writable (WordPress needs this during setup)
chmod 644 .htaccess
```

### 5. Web Server Setup

#### Option A: Using Built-in PHP Server (Development Only)

```bash
# Start PHP server
php -S localhost:8000
```

Then visit: http://localhost:8000

#### Option B: Using MAMP/XAMPP/Local

1. Point document root to: `/Users/hem/Documents/websites/itskanal`
2. Start Apache and MySQL
3. Visit: http://localhost

#### Option C: Production Server

Configure your Apache/Nginx virtual host to point to the installation directory.

### 6. WordPress Installation

1. Open your browser and navigate to your site URL
2. Select language (German recommended)
3. Fill in site information:
   - **Site Title**: iTS KANAL SERVICES
   - **Username**: admin (use something more secure)
   - **Password**: Generate a strong password
   - **Email**: your-email@domain.com
4. Click "Install WordPress"

### 7. Activate Theme

1. Log in to WordPress Admin
2. Go to **Appearance → Themes**
3. Find "iTS KANAL" theme
4. Click "Activate"

### 8. Configure Basic Settings

#### Permalinks
1. Go to **Settings → Permalinks**
2. Select "Post name"
3. Click "Save Changes"

#### Reading Settings
1. Go to **Settings → Reading**
2. Set "Your homepage displays" to "A static page"
3. Homepage: Select or create "Home" page
4. Click "Save Changes"

#### Menus
1. Go to **Appearance → Menus**
2. Create "Primary Menu" and assign to "Primary Menu" location
3. Create "Top Menu" and assign to "Top Menu" location
4. Add menu items

### 9. Customize Site

1. Go to **Appearance → Customize**
2. Update **Site Identity** (logo, title, tagline)
3. Update **Contact Information**:
   - Phone: 056 300 00 78
   - Email: info@itskanal.com
   - Address: Wohlerstrasse 2, 5623 Boswil
4. Update **Social Media Links**
5. Click "Publish"

## Recommended Plugins

Install these plugins for full functionality:

### Essential Plugins

1. **Advanced Custom Fields Pro** (ACF Pro)
   - For easy content editing
   - Homepage customization fields
   - Download: https://www.advancedcustomfields.com/pro/

2. **Contact Form 7** or **WPForms**
   - For contact form functionality
   - Replace static form in front-page.php

3. **WPML** or **Polylang**
   - For multilingual support (DE, FR, IT, EN)
   - Required for language switcher

### Recommended Plugins

4. **Yoast SEO**
   - SEO optimization
   - Meta tags and sitemaps

5. **Wordfence Security**
   - Additional security layer
   - Firewall and malware scanning

6. **WP Rocket** or **W3 Total Cache**
   - Caching for performance
   - Speed optimization

7. **Smush** or **ShortPixel**
   - Image optimization
   - Automatic WebP conversion

8. **UpdraftPlus**
   - Automated backups
   - Easy restoration

## Content Setup

### Homepage Setup

1. Create a new page called "Home"
2. Use "Default Template"
3. The content will be controlled by `front-page.php`
4. If ACF Pro is installed, you'll see custom fields to edit:
   - Hero section
   - Services
   - Testimonials
   - Contact info

### Create Additional Pages

Create these standard pages:
- **About Us** (Über uns)
- **Services** (Dienstleistungen)
  - Rohrreinigung
  - Kanalreinigung
  - Kanalinspektion
  - Kanalsanierung
  - Flächenreinigung
- **Contact** (Kontakt)
- **Privacy Policy** (Datenschutz)
- **Imprint** (Impressum)
- **Terms & Conditions** (AGB)

### Menu Structure

**Primary Menu:**
- Rohrreinigung
- Kanalreinigung
- Kanalinspektion
- Kanalsanierung
- Spezialservices
  - Flächenreinigung
  - Notfall-Service
  - Weitere...

**Top Menu:**
- Standorte
- Referenzen
- News
- Über uns
- Kontakt
- Geschäftskunden

**Footer Menus:**
- Footer 1: Services
- Footer 2: Company links
- Footer 3: Additional links

## Multilingual Setup

### Using WPML

1. Install and activate WPML
2. Go to **WPML → Languages**
3. Add languages:
   - German (Deutsch) - Default
   - French (Français)
   - Italian (Italiano)
   - English
4. Go to **WPML → Theme and plugins localization**
5. Scan theme for strings
6. Translate content via **WPML → Translation Management**

### Using Polylang

1. Install and activate Polylang
2. Go to **Languages**
3. Add languages (same as above)
4. Translate pages and posts
5. Update header.php to integrate Polylang language switcher

## Contact Form Setup

### Using Contact Form 7

1. Install Contact Form 7
2. Create new form with these fields:
   - Name (text, required)
   - Email (email, required)
   - Phone (tel)
   - Subject (select: Rohrreinigung, Kanalinspektion, etc.)
   - Message (textarea, required)
   - Privacy checkbox (acceptance, required)
3. Copy shortcode
4. Edit `front-page.php` line ~640
5. Replace the static form with: `<?php echo do_shortcode('[contact-form-7 id="123"]'); ?>`

## Performance Optimization

### Enable Caching

If using WP Rocket:
1. Install WP Rocket
2. Enable file optimization
3. Enable page caching
4. Enable LazyLoad
5. Configure CDN if available

### Image Optimization

1. Install Smush or ShortPixel
2. Bulk optimize existing images
3. Enable automatic optimization
4. Enable WebP conversion

### Database Optimization

```sql
# Optimize database tables
mysqlcheck -u itskanal_user -p --optimize itskanal_db
```

## Security Hardening

### Additional Security Measures

1. **Install Wordfence**
   ```
   - Enable firewall
   - Enable malware scanning
   - Enable login security
   - Enable two-factor authentication
   ```

2. **SSL Certificate**
   ```bash
   # If using Let's Encrypt
   sudo certbot --apache -d yourdomain.com -d www.yourdomain.com
   ```

3. **Update .htaccess**
   - Already configured with security headers
   - Review and adjust as needed

4. **Change WordPress Salts Regularly**
   - Generate new salts every 3-6 months
   - Forces re-login for all users

5. **Limit Login Attempts**
   - Use Wordfence or Limit Login Attempts Reloaded
   - Block after 3 failed attempts

### Backup Strategy

1. **Automated Daily Backups**
   - Use UpdraftPlus
   - Configure to backup to cloud (Dropbox, Google Drive)
   - Schedule: Daily database, Weekly files

2. **Manual Backup Before Updates**
   ```bash
   # Database backup
   mysqldump -u itskanal_user -p itskanal_db > backup-$(date +%Y%m%d).sql

   # Files backup
   tar -czf backup-files-$(date +%Y%m%d).tar.gz wp-content/
   ```

## Troubleshooting

### White Screen of Death

```bash
# Enable debug mode
nano wp-config.php
```

Add:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

Check error log: `wp-content/debug.log`

### Theme Not Showing

1. Check theme is in `wp-content/themes/itskanal/`
2. Verify `style.css` has theme headers
3. Check file permissions
4. Try re-uploading theme

### CSS Not Loading

```bash
# Rebuild Tailwind CSS
cd wp-content/themes/itskanal
npm run build
```

### Images Not Displaying

1. Check file paths in theme
2. Verify images are in `wp-content/themes/itskanal/assets/images/`
3. Check file permissions (644 for files, 755 for directories)

### Contact Form Not Working

1. Check mail server configuration
2. Install WP Mail SMTP plugin
3. Configure SMTP settings
4. Test email delivery

## Maintenance

### Regular Tasks

**Daily:**
- Monitor security alerts
- Check error logs

**Weekly:**
- Review backup status
- Check for plugin updates
- Review analytics

**Monthly:**
- Update WordPress core
- Update plugins and themes
- Database optimization
- Review security logs

**Quarterly:**
- Full security audit
- Performance review
- Content review
- Regenerate salts

## Support Resources

- **WordPress Documentation**: https://wordpress.org/documentation/
- **Tailwind CSS Docs**: https://tailwindcss.com/docs
- **ACF Documentation**: https://www.advancedcustomfields.com/resources/
- **WPML Documentation**: https://wpml.org/documentation/
- **WordPress Support Forums**: https://wordpress.org/support/

## Next Steps

After basic setup:

1. ✅ Install and configure recommended plugins
2. ✅ Set up multilingual support
3. ✅ Create all pages and menu structure
4. ✅ Add real content (text, images)
5. ✅ Set up contact form integration
6. ✅ Configure SEO (meta descriptions, sitemaps)
7. ✅ Test on all devices and browsers
8. ✅ Set up SSL certificate
9. ✅ Configure CDN (optional)
10. ✅ Launch and monitor!

---

**Need Help?**
- Review README.md for detailed documentation
- Check WordPress documentation
- Test changes on staging environment first

Good luck with your iTS KANAL website! 🚀
