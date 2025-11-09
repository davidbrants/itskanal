# iTS KANAL WordPress Theme

Custom WordPress theme built with Tailwind CSS for iTS KANAL Services AG.

## 🚀 Development Setup

### Prerequisites
- Docker (for local WordPress)
- Node.js 18+ (for CSS compilation)

### Getting Started

1. **Install dependencies:**
   ```bash
   npm install
   ```

2. **Start automatic development mode:**
   ```bash
   npm run watch
   ```

   This will:
   - ✅ Watch for file changes and rebuild CSS automatically
   - ✅ Auto-refresh your browser when files change
   - ✅ Open browser at http://localhost:3000 (proxies localhost:8000)

3. **Or use simple watch mode (no browser refresh):**
   ```bash
   npm run dev
   ```

## 📝 Development Workflow

### Option 1: Full Auto-Reload (Recommended)
```bash
npm run watch
```
- Opens http://localhost:3000
- Edit any PHP/CSS file → Browser refreshes automatically
- **No manual refresh needed!**

### Option 2: Manual Refresh
```bash
npm run dev
```
- Keep this terminal running
- Edit files
- Refresh browser manually (Cmd+R)

## 🎨 Working with Styles

### Tailwind CSS
All styles use Tailwind utility classes in PHP templates:

```php
<div class="bg-its-blue text-white p-8 rounded-lg">
  Content here
</div>
```

### Custom Colors
Defined in `tailwind.config.js`:
- `its-blue` - #0024BE
- `its-blue-light` - #597FDE
- `its-blue-dark` - #001a8f
- `its-cyan` - #00BCD4

### Component Classes
For reusable components, use `@apply` in `assets/css/tailwind.css`:

```css
.btn-primary {
  @apply bg-its-blue text-white px-8 py-4 rounded-lg;
}
```

## 🏗️ Building for Production

```bash
npm run build
```

This creates minified CSS (~26KB) in `assets/css/style.css`.

**Note:** Railway automatically runs this during deployment.

## 📁 File Structure

```
itskanal/
├── assets/
│   ├── css/
│   │   ├── tailwind.css    # Source file (edit this)
│   │   └── style.css       # Compiled (auto-generated)
│   ├── images/
│   └── js/
├── inc/                    # Theme functions
├── template-parts/         # Reusable template parts
├── *.php                   # Template files
├── style.css              # WordPress theme header
├── tailwind.config.js     # Tailwind configuration
└── package.json           # npm dependencies
```

## 🚢 Deployment

### Railway (Production)

1. **Commit your changes:**
   ```bash
   git add .
   git commit -m "Your changes"
   git push origin main
   ```

2. **Wait for Railway:**
   - Auto-detects push
   - Builds Docker image (installs Node.js, runs npm build)
   - Deploys (~3-5 minutes total)

3. **View live site:**
   - https://itskanal-production-d6ca.up.railway.app
   - Hard refresh: `Cmd+Shift+R` to clear cache

### Environment Variables (Railway)

Required variables in Railway dashboard:
```
MYSQL_URL          (auto-provided by MySQL plugin)
AUTH_KEY
SECURE_AUTH_KEY
LOGGED_IN_KEY
NONCE_KEY
AUTH_SALT
SECURE_AUTH_SALT
LOGGED_IN_SALT
NONCE_SALT
```

## 🔧 Troubleshooting

### Changes not showing on localhost?
1. Check if `npm run watch` or `npm run dev` is running
2. Hard refresh: `Cmd+Shift+R`
3. Check CSS timestamp: `ls -lh assets/css/style.css`

### Changes not showing on Railway?
1. Verify files are committed: `git status`
2. Verify pushed: `git log origin/main`
3. Wait 3-5 minutes for deployment
4. Hard refresh: `Cmd+Shift+R`
5. Check Railway deployment logs

### Browser-sync not working?
- Verify Docker WordPress is at http://localhost:8000
- Check no other process is using port 3000
- Try `npm run dev` (simple watch without browser-sync)

## 📚 Useful Commands

```bash
# Development
npm run watch          # Auto-rebuild CSS + browser refresh
npm run dev            # Auto-rebuild CSS only
npm run build          # Build minified production CSS

# Package management
npm install            # Install all dependencies
npm update             # Update packages
npm audit fix          # Fix security issues

# Docker (from project root)
docker-compose up -d   # Start WordPress locally
docker-compose down    # Stop WordPress
docker-compose logs -f # View logs
```

## 🎯 Tips

- **Keep `npm run watch` running** in a terminal while developing
- **Use utility classes** in templates instead of custom CSS when possible
- **Hard refresh** (`Cmd+Shift+R`) after deploying to clear cache
- **Commit compiled CSS** to git if deployment fails (uncomment in .gitignore)

## 📖 Documentation

- [Tailwind CSS Docs](https://tailwindcss.com/docs)
- [WordPress Theme Development](https://developer.wordpress.org/themes/)
- [Railway Docs](https://docs.railway.app/)
