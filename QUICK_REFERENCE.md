# ⚡ Quick Reference Card

## 🌐 URLs & Access Points

| Purpose | URL | User Type |
|---------|-----|-----------|
| Homepage | `http://localhost:8000/` | Public |
| Login | `http://localhost:8000/login` | Everyone |
| Admin Dashboard | `http://localhost:8000/admin/dashboard` | Admin |
| Dosen Dashboard | `http://localhost:8000/dashboard` | Dosen |
| User Profile | `http://localhost:8000/profile` | Authenticated |

---

## 🔑 Demo Login Credentials

### Admin Account
```
Email: admin@lab-wicida.ac.id
Password: admin123
```

---

## 📚 Quick Commands

### Start Development Server
```bash
php artisan serve
# Server runs at http://127.0.0.1:8000
```

### Compile Assets
```bash
npm run dev    # Development mode (watch changes)
npm run build  # Production build
```

### Database Operations
```bash
php artisan migrate          # Run migrations
php artisan db:seed          # Seed sample data
php artisan migrate:refresh  # Reset database
php artisan tinker           # PHP interactive shell
```

### Cache Management
```bash
php artisan cache:clear      # Clear application cache
php artisan config:clear     # Clear config cache
php artisan route:clear      # Clear route cache
php artisan view:clear       # Clear view cache
```

### Route Listing
```bash
php artisan route:list                  # All routes
php artisan route:list --path=admin     # Admin routes only
```

---

## 👥 User Roles & Permissions

| Role | Can Do | Cannot Do |
|------|--------|-----------|
| **Admin** | Manage dosen accounts | Create schedules |
| **Staf** | Create schedules, manage bookings | Access admin panel |
| **Kepala Lab** | Create schedules, manage bookings | Access admin panel |
| **Public** | View schedules, book consultations | Login not required |

---

## 📋 Common Admin Tasks

### Add New Dosen
1. Go to `/admin/dashboard`
2. Click "➕ Tambah Dosen"
3. Fill form with:
   - Name
   - Email (unique)
   - NIP (optional)
   - Role (Staf or Kepala Lab)
   - Password (min 8 chars)
4. Click "✅ Tambah Dosen"

### Edit Dosen
1. Go to `/admin/dashboard`
2. Find dosen in table
3. Click "✏️ Edit"
4. Modify fields
5. Click "✅ Simpan Perubahan"

### Delete Dosen
1. Go to `/admin/dashboard`
2. Click "🗑️ Hapus"
3. Confirm in modal
4. ⚠️ All schedules & bookings deleted!

### Reset Dosen Password
1. Click "✏️ Edit" on dosen
2. Fill password fields
3. Click "✅ Simpan Perubahan"
4. Share new password

---

## 📊 Dashboard Stats

### Admin Dashboard (`/admin/dashboard`)
- 👥 Total dosens registered
- 📅 Total schedules created
- ⏳ Pending bookings awaiting approval
- 📋 Dosen list with actions

### Dosen Dashboard (`/dashboard`) - After Login
- 🟢 Current status display
- 📅 Schedule summary
- 📬 Pending bookings count
- Quick action buttons

---

## 🎨 Color Reference

| Purpose | Color | Hex |
|---------|-------|-----|
| Primary | Purple | #9333ea |
| Available | Green | #10b981 |
| Teaching | Red | #ef4444 |
| Consultation | Yellow | #eab308 |
| Unavailable | Gray | #6b7280 |
| Background | White | #ffffff |
| Border | Light Purple | #e9d5ff |

---

## 🛠️ File Locations

### Important Files
- **Routes:** `routes/web.php`
- **Config:** `config/app.php`
- **Database:** `database/migrations/`
- **Views:** `resources/views/`
- **Controllers:** `app/Http/Controllers/`
- **Models:** `app/Models/`
- **Styles:** `resources/css/app.css`
- **Environment:** `.env`

### Admin-Specific
- **Controller:** `app/Http/Controllers/AdminController.php`
- **Views:** `resources/views/admin/`
- **Routes:** `routes/web.php` (lines 24-30)

---

## 🐛 Troubleshooting

### Issue: 404 Not Found
**Solution:** 
```bash
php artisan cache:clear
php artisan route:clear
```

### Issue: Database Connection Error
**Solution:**
- Check `.env` database settings
- Ensure MySQL is running
- Run: `php artisan migrate`

### Issue: Assets Not Loading
**Solution:**
```bash
npm install
npm run dev
php artisan serve
```

### Issue: Admin Panel Access Denied
**Solution:**
- Verify you're logged in as admin
- Check user role in database
- Try clearing cache

---

## 📱 Responsive Breakpoints

| Device | Width | CSS Class |
|--------|-------|-----------|
| Mobile | <640px | default |
| Tablet | ≥640px | sm: |
| Desktop | ≥768px | md: |
| Large | ≥1024px | lg: |
| XL | ≥1280px | xl: |

---

## 🔐 Security Reminders

- [ ] Change default admin password
- [ ] Use strong passwords for all accounts
- [ ] Don't share admin credentials
- [ ] Backup database regularly
- [ ] Keep Laravel updated
- [ ] Use HTTPS in production
- [ ] Review logs regularly

---

## 📞 Quick Help

### Get PHP Version
```bash
php --version
```

### Check Route Status
```bash
php artisan route:list --path=/admin
```

### View Error Logs
```bash
tail -f storage/logs/laravel.log
```

### Database Status
```bash
php artisan tinker
# Then in tinker:
User::count()
Jadwal::count()
Booking::count()
```

---

## 🚀 Deployment Command Sequence

```bash
# 1. Clone/download files
# 2. Install dependencies
composer install
npm install

# 3. Configure environment
cp .env.example .env
php artisan key:generate

# 4. Setup database
php artisan migrate
php artisan db:seed

# 5. Compile assets
npm run build

# 6. Serve application
php artisan serve

# 7. Test access
# Visit http://127.0.0.1:8000
```

---

## 📚 Documentation Files

| File | Purpose |
|------|---------|
| SETUP.md | Installation guide |
| ADMIN_GUIDE.md | Admin panel tutorial |
| DESIGN_SYSTEM.md | Styling reference |
| ROUTES_AND_FILES.md | System architecture |
| COMPLETION_CHECKLIST.md | Feature verification |
| PROJECT_DELIVERY.md | Project summary |
| SESSION_CHANGES.md | What's new |

---

## 🎯 Feature Quick Links

- **Add Dosen:** `/admin/dosen/create` (admin only)
- **View Dosens:** `/admin/dashboard` (admin only)
- **Create Schedule:** `/jadwal/create` (dosen only)
- **View Schedule:** `/jadwal/` (dosen only)
- **Manage Bookings:** `/booking/` (dosen only)
- **Edit Profile:** `/profile` (authenticated)
- **Public Homepage:** `/` (no login required)

---

## ✅ Verification Checklist

Before going live:

- [ ] Admin can login
- [ ] Can add new dosen
- [ ] Can edit dosen
- [ ] Can delete dosen
- [ ] Dosen can login
- [ ] Dosen can create schedule
- [ ] Students can view schedules
- [ ] Students can book consultations
- [ ] All pages load without errors
- [ ] Mobile design looks good
- [ ] Form validations work
- [ ] Database is backed up

---

**Last Updated:** 2026-02-06  
**System:** Sistem Jadwal Dosen Lab WICIDA v1.0  
**Status:** ✅ Production Ready
