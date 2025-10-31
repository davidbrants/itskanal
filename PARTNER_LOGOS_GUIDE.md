# Partner Logos Setup Guide

## Issue: Logos Not Showing

The partner logos section currently shows placeholders because the actual logo files need to be uploaded.

## Quick Fix Option 1: Upload Logos via WordPress Media Library

### Step 1: Get the Actual Logo Files

You have the rights to these images. Get the actual partner logo files:
- ALPE Kanal-Service logo
- Arelt logo
- Feucht GmbH logo
- Kanal Grabner logo
- Groupe Künzli logo

### Step 2: Upload to WordPress

1. **Log into WordPress Admin**: http://localhost:8000/wp-admin

2. **Go to Media Library**:
   - Click "Media" → "Add New"
   - Upload all 5 partner logos
   - Note the file names

3. **Upload to Theme Folder** (Alternative):
   ```bash
   # Copy your actual logo files to:
   wp-content/themes/itskanal/assets/images/partners/

   # Files should be named:
   # - alpe.png (or .jpg, .svg)
   # - arelt.png
   # - feucht.png
   # - grabner.png
   # - kuenzli.png
   ```

## Quick Fix Option 2: Use ACF for Easy Management

### Enable ACF Partner Logos (Recommended)

I'll create a version that uses Advanced Custom Fields for easy logo management:

1. **Install ACF Plugin**:
   - Plugins → Add New
   - Search "Advanced Custom Fields"
   - Install & Activate

2. **Upload Logos**:
   - Go to Appearance → Customize
   - Find "Partner Logos" section
   - Upload each logo image
   - Save & Publish

## Quick Fix Option 3: Simple Text-Based Partners

If you don't have the logo files yet, we can show partner names instead:

```php
<!-- Text-based partner section -->
<div class="partner-name">ALPE Kanal-Service</div>
<div class="partner-name">Arelt</div>
<div class="partner-name">Feucht GmbH</div>
<div class="partner-name">Kanal Grabner</div>
<div class="partner-name">Groupe Künzli</div>
```

## Current File Locations

The theme is looking for logos at:
```
wp-content/themes/itskanal/assets/images/partners/
├── alpe.png
├── arelt.png
├── feucht.png
├── grabner.png
└── kuenzli.png
```

## Troubleshooting

### Logos Still Not Showing?

**Check File Permissions**:
```bash
chmod 644 wp-content/themes/itskanal/assets/images/partners/*.png
```

**Clear Browser Cache**:
- Hard refresh: Cmd+Shift+R (Mac) or Ctrl+Shift+R (Windows)

**Check File Format**:
- Supported: .png, .jpg, .jpeg, .svg, .webp
- Recommended: .png or .svg for logos

**Verify Docker is Running**:
```bash
docker ps
# Should show itskanal_wordpress container running
```

## Getting the Actual Logos

Since you have rights to the images, you can:

1. **Export from original site** (if you have access)
2. **Request from iTS KANAL** marketing team
3. **Download from brand guidelines** if available
4. **Use high-res versions** from company shared drive

## Recommended Logo Specifications

For best quality:
- **Format**: PNG with transparent background or SVG
- **Size**: At least 400px wide
- **Resolution**: 72 DPI minimum (for web)
- **File Size**: Under 100KB each
- **Background**: Transparent preferred

## Alternative: Hide Section Temporarily

To hide the partner section until you have logos:

Edit `front-page.php` and add `hidden` class:
```php
<section class="partners-section hidden bg-white py-12 md:py-16">
```

Or remove the entire section (lines 45-71 in front-page.php).

## Need Help?

1. Check that Docker is running: `docker ps`
2. Restart containers: `./stop.sh && ./start.sh`
3. View browser console for errors: F12 → Console tab
4. Check WordPress admin for uploaded media

---

**Quick Solution**: For now, you can hide this section or use text-based partner names until you have the actual logo files.
