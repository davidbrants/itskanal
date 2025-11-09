# Railway MySQL Connection Setup

## Problem
The WordPress service can't connect to MySQL because the MYSQL_URL variable is empty.

## Solution: Set MySQL Variables via Railway Dashboard

### Step 1: Go to Railway Dashboard
Visit: https://railway.app/dashboard

### Step 2: Select Your Project
Click on "iTS Kanal Nov" project

### Step 3: Get MySQL Connection String

1. Click on the **MySQL** service
2. Go to **Variables** tab
3. Find and copy the **MYSQL_URL** value (it should look like):
   ```
   mysql://root:password@host.railway.internal:3306/railway
   ```
4. Also note these individual variables (in case MYSQL_URL doesn't work):
   - `MYSQLHOST`
   - `MYSQLUSER`
   - `MYSQLPASSWORD`
   - `MYSQLDATABASE`

### Step 4: Set Variables in WordPress Service

1. Go back and click on the **itskanal** service
2. Go to **Variables** tab
3. Click **+ New Variable**

**Option A: Use Service Reference (Recommended)**
Add this variable:
```
Name: MYSQL_URL
Value: ${{MySQL.MYSQL_URL}}
```

**Option B: Use Individual Variables**
If Option A doesn't work, add these:
```
Name: MYSQL_HOST
Value: ${{MySQL.MYSQLHOST}}

Name: MYSQL_USER
Value: ${{MySQL.MYSQLUSER}}

Name: MYSQL_PASSWORD
Value: ${{MySQL.MYSQLPASSWORD}}

Name: MYSQL_DATABASE
Value: ${{MySQL.MYSQLDATABASE}}
```

### Step 5: Redeploy
After setting variables, redeploy:
```bash
railway up
```

## Verification
After deployment, check:
```bash
railway logs
```

You should see WordPress connecting successfully instead of "Error establishing database connection".
