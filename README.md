# iTS KANAL WordPress Website

A professional WordPress replica of itskanal.com built with Tailwind CSS.

## Features

- **Modern Design**: Clean, professional design matching the original itskanal.com
- **Tailwind CSS**: Utility-first CSS framework for rapid development
- **Responsive**: Mobile-first responsive design
- **Security Hardened**: Multiple security enhancements implemented
- **SEO Optimized**: Semantic HTML and optimized structure
- **Fast Performance**: Optimized assets and caching
- **Easy Content Management**: WordPress block editor support with ACF fields
- **Multilingual Ready**: Structure prepared for WPML or Polylang integration
- **Railway Deployment**: Full support for Railway PaaS deployment

## Tech Stack

- WordPress 6.7+ (latest version)
- Tailwind CSS 3.4+
- Custom Theme: "iTS KANAL"
- PHP 8.0+
- MySQL 5.7+ or MariaDB 10.3+
- Docker support (local development)
- Railway deployment ready

## Quick Start

### Railway Deployment (Recommended for Production)

Deploy to Railway in ~15 minutes:

```bash
# Install Railway CLI
npm install -g @railway/cli

# Login to Railway
railway login

# Run automated deployment 
./deploy-railway.sh
```

See **[RAILWAY_DEPLOYMENT.md](RAILWAY_DEPLOYMENT.md)** for complete guide.

### Local Development (Docker)

```bash
# Start local environment
./start.sh

# Visit: http://localhost:8000
```

See **[DOCKER.md](DOCKER.md)** for Docker setup.

## Installation

### Prerequisites

- Web server (Apache/Nginx)
- PHP 8.0 or higher
- MySQL 5.7+ or MariaDB 10.3+
- Node.js 16+ (for development)

### Setup Steps

1. **Database Configuration**
   ```bash
   # Create a MySQL database
   mysql -u root -p
   CREATE DATABASE itskanal_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   CREATE USER 'itskanal_user'@'localhost' IDENTIFIED BY 'your_password';
   GRANT ALL PRIVILEGES ON itskanal_db.* TO 'itskanal_user'@'localhost';
   FLUSH PRIVILEGES;
   EXIT;
   ```

2. **WordPress Configuration**
   ```bash
   # Copy the sample config
   cp wp-config-sample.php wp-config.php

   # Edit wp-config.php with your database credentials
   # Generate security keys at: https://api.wordpress.org/secret-key/1.1/salt/
   ```

3. **File Permissions**
   ```bash
   # Set proper permissions
   find . -type d -exec chmod 755 {} \;
   find . -type f -exec chmod 644 {} \;
   chmod 600 wp-config.php
   ```

4. **Install WordPress**
   - Navigate to your domain in a browser
   - Follow the WordPress installation wizard
   - Create admin account with strong credentials

5. **Activate Theme**
   - Go to WordPress Admin → Appearance → Themes
   - Activate "iTS KANAL" theme

6. **Recommended Plugins**
   - **Advanced Custom Fields Pro**: For easy content editing
   - **WPML** or **Polylang**: For multilingual support (DE/FR/IT/EN)
   - **Contact Form 7** or **WPForms**: For contact forms
   - **Yoast SEO**: For SEO optimization
   - **Wordfence Security**: Additional security layer
   - **WP Rocket** or **W3 Total Cache**: For caching

## Development

### Build Tailwind CSS

```bash
# Navigate to theme directory
cd wp-content/themes/itskanal

# Install dependencies
npm install

# Development (watch mode)
npm run dev

# Production build
npm run build
```

### Theme Structure

```
wp-content/themes/itskanal/
├── assets/
│   ├── css/
│   │   ├── tailwind.css (source)
│   │   └── style.css (compiled)
│   ├── js/
│   │   ├── main.js
│   │   └── customizer.js
│   ├── images/
│   └── fonts/
├── inc/
│   ├── template-tags.php
│   ├── customizer.php
│   └── acf-fields.php
├── template-parts/
│   ├── header/
│   ├── footer/
│   └── sections/
├── functions.php
├── header.php
├── footer.php
├── front-page.php
├── page.php
├── single.php
├── index.php
└── style.css
```

## Content Management

### Customizer Options

Go to **Appearance → Customize** to edit:
- Contact Information (phone, email, address)
- Social Media Links (LinkedIn, Instagram)
- Site Identity (logo, site title)

### Homepage Sections

The homepage includes:
1. **Hero Section**: Main banner with CTA buttons
2. **Services Overview**: 4 service cards
3. **Company Mission**: About section with image
4. **24/7 Emergency Service**: Highlight emergency availability
5. **Testimonials**: Customer reviews
6. **Contact Form**: Lead generation form

### Using ACF Fields (Optional)

If ACF Pro is installed, you can edit:
- Hero section content
- Service items
- Testimonials
- Contact information

Navigate to **Pages → Front Page** to edit these fields.

## Security Features

### Implemented Security Measures

1. **WordPress Core**
   - Disabled file editing in dashboard
   - Limited post revisions
   - Removed version information
   - Disabled XML-RPC

2. **HTTP Security Headers**
   - X-Frame-Options: SAMEORIGIN
   - X-Content-Type-Options: nosniff
   - X-XSS-Protection enabled
   - Referrer-Policy configured

3. **.htaccess Protection**
   - Directory browsing disabled
   - wp-config.php protected
   - xmlrpc.php blocked
   - Bad bot blocking
   - File upload restrictions

4. **Theme Security**
   - All outputs escaped
   - Nonces for forms
   - Input sanitization
   - SQL injection prevention

### Additional Security Recommendations

1. **SSL Certificate**: Always use HTTPS
2. **Strong Passwords**: Use unique, complex passwords
3. **Two-Factor Authentication**: Enable for admin accounts
4. **Regular Updates**: Keep WordPress, themes, and plugins updated
5. **Backups**: Regular automated backups
6. **Firewall**: Web application firewall (Cloudflare, Sucuri)
7. **Monitoring**: Security monitoring (Wordfence, Sucuri)

## Performance Optimization

### Implemented Optimizations

1. **Asset Optimization**
   - Minified CSS (Tailwind production build)
   - Optimized images (WebP format)
   - Browser caching headers
   - Gzip compression

2. **Code Optimization**
   - Minimal plugin usage
   - Optimized database queries
   - Lazy loading images
   - Conditional script loading

### Additional Recommendations

1. **CDN**: Use a CDN (Cloudflare, StackPath)
2. **Caching**: Install caching plugin
3. **Image Optimization**: Use image optimization plugin
4. **Database**: Regular database optimization
5. **PHP**: Use PHP 8.0+ with OPcache

## Customization

### Colors

Edit colors in `tailwind.config.js`:
```javascript
colors: {
  'its-blue': '#0024BE',
  'its-blue-light': '#597FDE',
  'its-blue-dark': '#001a8f',
}
```

### Fonts

Current fonts (Google Fonts):
- DM Sans (body text)
- Jost (headings)

To change, edit in `assets/css/tailwind.css`

### Navigation Menus

Configure in **Appearance → Menus**:
- Primary Menu (main navigation)
- Top Menu (top bar)
- Footer Menus (4 footer columns)

## Multilingual Setup

### Using WPML

1. Install WPML plugin
2. Configure languages: DE, FR, IT, EN
3. Set German (DE) as default
4. Translate pages and content
5. Language switcher automatically appears in header

### Using Polylang

1. Install Polylang plugin
2. Add languages: DE, FR, IT, EN
3. Translate content
4. Update header.php to use Polylang language switcher

## Support

For issues or questions:
- Check WordPress documentation
- Review theme code comments
- Test on local environment first

## License

This theme is built for itskanal.com. All rights reserved.

## Credits

- **WordPress**: https://wordpress.org
- **Tailwind CSS**: https://tailwindcss.com
- **Original Design**: https://itskanal.com
- **Images & Assets**: Provided by iTS KANAL

---

**Version**: 1.0.0
**Last Updated**: October 2025
