# iTS KANAL Docker Setup Guide

Complete Docker setup for local WordPress development.

## What's Included

This Docker setup includes:

- **MySQL 8.0** - Database server
- **WordPress (latest)** - CMS with iTS KANAL theme pre-installed
- **phpMyAdmin** - Database management interface

## Prerequisites

1. **Install Docker Desktop**
   - Download: https://www.docker.com/products/docker-desktop
   - Install and start Docker Desktop
   - Verify installation: `docker --version`

## Quick Start (3 Commands)

```bash
# 1. Make sure you're in the project directory
cd /Users/hem/Documents/websites/itskanal

# 2. Start the site
./start.sh

# 3. Open your browser to http://localhost:8000
```

That's it! 🎉

## Manual Commands

If you prefer manual control:

```bash
# Start containers
docker-compose up -d

# Stop containers
docker-compose down

# View logs
docker-compose logs -f

# Restart containers
docker-compose restart

# Rebuild containers
docker-compose up -d --build
```

## Access Points

After starting with `./start.sh`:

| Service | URL | Credentials |
|---------|-----|-------------|
| **WordPress Site** | http://localhost:8000 | Set during installation |
| **phpMyAdmin** | http://localhost:8080 | root / rootpassword123 |
| **MySQL** | localhost:3306 | itskanal_user / itskanal_pass123 |

## First Time Setup

### Step 1: Start Docker

```bash
./start.sh
```

Your browser should open automatically to http://localhost:8000

### Step 2: WordPress Installation

When you first visit the site, you'll see the WordPress installation wizard:

1. **Select Language**: Choose "Deutsch" or "English"

2. **Site Information**:
   - Site Title: `iTS KANAL SERVICES`
   - Username: `admin` (or your choice)
   - Password: Generate a strong one
   - Email: your-email@example.com
   - Search Engines: ✅ Check this for local development

3. Click **"Install WordPress"**

4. **Log in** with your credentials

### Step 3: Activate Theme

1. Go to **Appearance → Themes**
2. Find **"iTS KANAL"**
3. Click **"Activate"**

### Step 4: Configure Settings

**Set Permalinks:**
1. Go to **Settings → Permalinks**
2. Select **"Post name"**
3. Click **"Save Changes"**

**Set Homepage:**
1. Create a new page: **Pages → Add New**
   - Title: "Home"
   - Publish it
2. Go to **Settings → Reading**
3. Select **"A static page"**
4. Homepage: Select "Home"
5. Click **"Save Changes"**

**Customize Contact Info:**
1. **Appearance → Customize**
2. **Contact Information**:
   - Phone: `056 300 00 78`
   - Email: `info@itskanal.com`
   - Address: `Wohlerstrasse 2, 5623 Boswil`
3. Click **"Publish"**

## Helper Scripts

### start.sh
Starts all Docker containers and opens the site in your browser.

```bash
./start.sh
```

### stop.sh
Stops all containers (data is preserved).

```bash
./stop.sh
```

### reset.sh
**⚠️ WARNING**: Deletes ALL data including database!

```bash
./reset.sh
```

Use this to start completely fresh.

## Working with the Theme

### Rebuild Tailwind CSS

If you make changes to Tailwind styles:

```bash
cd wp-content/themes/itskanal
npm run build
```

Or for development with auto-rebuild:

```bash
npm run dev
```

### Theme Files Location

All theme files are in:
```
wp-content/themes/itskanal/
```

Changes to PHP, CSS, or JS files are reflected immediately.

## Database Access

### Via phpMyAdmin

1. Open: http://localhost:8080
2. Login:
   - Server: `db`
   - Username: `root`
   - Password: `rootpassword123`

### Via Command Line

```bash
# Connect to MySQL container
docker exec -it itskanal_mysql mysql -u itskanal_user -pitskanal_pass123 itskanal_db

# Backup database
docker exec itskanal_mysql mysqldump -u root -prootpassword123 itskanal_db > backup.sql

# Restore database
docker exec -i itskanal_mysql mysql -u root -prootpassword123 itskanal_db < backup.sql
```

## Troubleshooting

### Port Already in Use

If you get "port already allocated" error:

```bash
# Check what's using port 8000
lsof -i :8000

# Kill the process or change port in docker-compose.yml
# Edit ports under wordpress service:
#   - "8001:80"  # Changed from 8000 to 8001
```

### Docker Desktop Not Running

```bash
# Start Docker Desktop app first
open -a Docker

# Wait for it to start, then run:
./start.sh
```

### Containers Won't Start

```bash
# Check logs
docker-compose logs

# Remove and rebuild
docker-compose down -v
docker-compose up -d --build
```

### Database Connection Error

```bash
# Restart database container
docker-compose restart db

# Wait 10 seconds
sleep 10

# Restart WordPress
docker-compose restart wordpress
```

### Theme Not Showing

```bash
# Rebuild theme CSS
cd wp-content/themes/itskanal
npm run build

# Check file permissions
ls -la wp-content/themes/itskanal/

# Restart WordPress container
docker-compose restart wordpress
```

### Clean Slate

To completely remove everything and start fresh:

```bash
./reset.sh
# or manually:
docker-compose down -v
docker system prune -a
./start.sh
```

## Container Management

### View Running Containers

```bash
docker ps
```

### Access Container Shell

```bash
# WordPress container
docker exec -it itskanal_wordpress bash

# MySQL container
docker exec -it itskanal_mysql bash
```

### View Container Logs

```bash
# All containers
docker-compose logs -f

# Specific container
docker-compose logs -f wordpress
docker-compose logs -f db
```

### Resource Usage

```bash
# Check Docker resource usage
docker stats

# Check disk usage
docker system df
```

## File Structure

```
itskanal/
├── docker-compose.yml    # Docker configuration
├── .env                  # Environment variables
├── wp-config.php         # WordPress config
├── start.sh             # Start script
├── stop.sh              # Stop script
├── reset.sh             # Reset script
├── wp-content/          # WordPress content
│   └── themes/
│       └── itskanal/    # Your custom theme
└── [WordPress core files]
```

## Environment Variables

Edit `.env` file to change:

- Database name
- Database credentials
- Ports
- Passwords

After changing `.env`:

```bash
docker-compose down
docker-compose up -d
```

## Backup Strategy

### Quick Backup

```bash
# Backup database
docker exec itskanal_mysql mysqldump -u root -prootpassword123 itskanal_db > backup-$(date +%Y%m%d).sql

# Backup wp-content
tar -czf wp-content-backup-$(date +%Y%m%d).tar.gz wp-content/
```

### Restore Backup

```bash
# Restore database
docker exec -i itskanal_mysql mysql -u root -prootpassword123 itskanal_db < backup-20251031.sql

# Restore wp-content
tar -xzf wp-content-backup-20251031.tar.gz
```

## Performance Tips

1. **Allocate More Resources to Docker**
   - Docker Desktop → Settings → Resources
   - Increase CPUs and Memory

2. **Use Volumes for Better Performance**
   - Already configured in docker-compose.yml

3. **Enable BuildKit**
   ```bash
   export DOCKER_BUILDKIT=1
   ```

## Production Deployment

This Docker setup is for **local development only**.

For production:
1. Use managed hosting or proper production Docker setup
2. Change all passwords
3. Enable SSL
4. Use environment variables for secrets
5. Set proper file permissions
6. Enable security plugins

## Common Commands Cheat Sheet

```bash
# Start everything
./start.sh

# Stop everything
./stop.sh

# View logs
docker-compose logs -f

# Restart WordPress
docker-compose restart wordpress

# Rebuild CSS
cd wp-content/themes/itskanal && npm run build

# Access database
docker exec -it itskanal_mysql mysql -u root -prootpassword123 itskanal_db

# Fresh start
./reset.sh && ./start.sh
```

## Support

If you encounter issues:

1. Check Docker Desktop is running
2. Review logs: `docker-compose logs`
3. Try restarting: `./stop.sh && ./start.sh`
4. Try reset: `./reset.sh && ./start.sh`

---

**Happy coding!** 🚀

Your site should now be running at:
- **Website**: http://localhost:8000
- **Database**: http://localhost:8080
