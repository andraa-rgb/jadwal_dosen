# 📚 Sistem Jadwal Dosen Lab WICIDA - Setup & Usage Guide

## ✅ Installation Status

Semua fitur telah berhasil diimplementasikan dan siap untuk production!

### Features Completed:
- ✅ Complete lecturer schedule system
- ✅ Modern purple-white design theme
- ✅ Admin panel untuk manage dosen accounts
- ✅ Real-time status management
- ✅ Student booking system
- ✅ Responsive design (mobile & desktop)
- ✅ Authentication system (Admin & Dosen)

---

## 🔧 Setup Instructions

### Prerequisites
- PHP 8.2+
- MySQL 8.0+
- Composer
- Node.js 18+

### 1. Database Setup

```bash
php artisan migrate
php artisan db:seed
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Compile Assets

```bash
npm run dev    # Development mode
npm run build  # Production mode
```

### 5. Run Development Server

```bash
php artisan serve
# Server runs at http://127.0.0.1:8000

# In another terminal:
npm run dev    # Vite hot reload
```

---

## 👥 Demo Accounts

### Admin Account (Manage Dosen)
- **Email:** admin@lab-wicida.ac.id
- **Password:** admin123
- **Role:** Admin (Teknisi - manages dosen accounts ONLY)

### Sample Dosen Accounts
Created automatically during migration with these roles:
- **Staf** - Regular lecturer
- **Kepala Lab** - Lab head/senior lecturer

---

## 🎯 Main Features

### 1. **Public Homepage** (/)
- View all registered lecturers
- See real-time status (Available, Teaching, Consultation, Unavailable)
- Quick access to lecturer schedules
- Link to consultation booking

### 2. **Lecturer Schedule Details** (/dosen/{id})
- Full weekly schedule view
- Schedule grouped by days (Senin-Jumat)
- Activity types: Teaching, Consultation, Meeting, Unavailable
- Student consultation booking form
- Status indicator with emoji

### 3. **Admin Dashboard** (/admin/dashboard)
- Stats: Total dosens, Total schedules, Pending bookings
- List of all registered lecturers
- Edit/Delete dosen accounts
- Add new dosen with auto-generated password
- Cascade delete (removes all related schedules and bookings)

### 4. **Admin Dosen Management**

#### Add New Dosen (/admin/dosen/create)
- Form fields:
  - Nama Lengkap (Full Name)
  - Email (must be unique)
  - NIP (Employee ID - optional)
  - Peran (Role: Staf or Kepala Lab)
  - Password (min 8 characters)
  - Confirm Password

#### Edit Dosen (/admin/dosen/{id}/edit)
- Update all account details
- Optional password change
- Delete button with confirmation

#### Delete Dosen
- Confirmation modal to prevent accidental deletion
- Cascades delete all:
  - Associated schedules
  - Associated bookings
  - Status records

### 5. **Dosen Dashboard** (/dashboard) - After Login
- Schedule management
- Status update (Available/Teaching/Consultation/Unavailable)
- View incoming consultation bookings
- Approve or reject bookings

### 6. **Schedule Management** (/jadwal/*)
- Create new schedule entries
- Edit existing schedules
- Delete schedules
- Filter by day of week

### 7. **Booking Management** (/booking/*)
- View all consultation requests
- Approve/reject bookings
- See booking status

---

## 🎨 Design System

### Color Theme: Purple & White
- **Primary Purple:** #9333ea (with 9 shade variations)
- **Background:** White with subtle purple accents
- **Borders:** Purple-200 (#e9d5ff)
- **Gradients:** Purple-to-white transitions

### Custom Components
- `card-modern` - Modern card with shadow & border
- `card-gradient` - Card with gradient background
- `btn-primary` - Primary button (purple with white text)
- `btn-outline` - Outline button
- `badge-purple` - Purple badge
- `status-ada`, `status-mengajar`, etc. - Status indicators

### Animations
- `animate-blob` - Floating blob animation
- `animate-fade-in` - Fade in animation
- `hover-lift` - Hover lifting effect
- `transition` - Smooth transitions

### Typography
- **Font:** Poppins (Google Fonts)
- **Weights:** 300, 400, 600, 700, 900

---

## 📱 Responsive Design

- **Mobile:** Full responsive layout (320px+)
- **Tablet:** Optimized for tablets (768px+)
- **Desktop:** Full features on desktop (1024px+)
- **Touch-friendly:** Larger buttons and spacing for touch devices

---

## 🔒 Authentication & Authorization

### Role-Based Access Control
- **Admin:** Can only manage dosen accounts (add/edit/delete)
- **Staf/Kepala Lab:** Can manage their schedules and view bookings
- **Guest:** Can view schedules and make bookings (no login required)

### Admin Middleware
- Admin panel is protected with middleware
- Only users with `role === 'admin'` can access
- Automatic redirect if unauthorized

---

## 📊 Database Schema

### Tables
1. **users** - User accounts (admin, staf, kepala_lab)
2. **jadwals** - Schedule entries (day, time, activity)
3. **statuses** - Current status of each dosen
4. **bookings** - Student consultation bookings
5. **cache, jobs, sessions** - Laravel internals

### Relationships
- User → hasMany Jadwal
- User → hasMany Booking
- User → hasOne Status

---

## 🚀 Deployment Checklist

Before going to production, ensure:

- [ ] `.env` is properly configured
- [ ] `APP_DEBUG=false` in .env
- [ ] `APP_KEY` is generated
- [ ] Database migrations are run
- [ ] Assets are built (`npm run build`)
- [ ] Logs directory is writable
- [ ] Storage directory is writable
- [ ] All routes are tested
- [ ] HTTPS is configured (if using production domain)
- [ ] Email/SMTP is configured (if needed)
- [ ] Admin account is created with secure password

---

## 🐛 Troubleshooting

### Server Won't Start
```bash
php artisan serve --port=8000
# or use Laragon which handles this automatically
```

### Database Connection Error
```bash
php artisan migrate
# Ensure MySQL is running
```

### Assets Not Loading
```bash
npm run build
# or npm run dev for development
```

### 404 Errors on Routes
```bash
php artisan route:clear
php artisan route:cache
```

---

## 📞 Support

For issues or questions:
1. Check the logs in `storage/logs/`
2. Run `php artisan tinker` to debug
3. Clear cache: `php artisan cache:clear`
4. Clear config: `php artisan config:clear`

---

## 🎓 Usage Examples

### Login as Admin
1. Go to `/login`
2. Enter: admin@lab-wicida.ac.id / admin123
3. Redirect to `/admin/dashboard`
4. Manage dosen accounts

### Add New Dosen
1. From admin dashboard
2. Click "➕ Tambah Dosen"
3. Fill form and submit
4. New account created with temp password
5. Dosen can login and change password

### View Lecturer Schedule
1. Go to homepage `/`
2. Click "📅 Lihat Jadwal" on any dosen card
3. View full weekly schedule
4. Scroll down to book consultation

### Update Dosen Status
1. Login as dosen
2. Go to `/dashboard`
3. Click status buttons
4. Select: Available (🟢), Teaching (🔴), Consultation (🟡), Unavailable (⚪)
5. Status updates in real-time across system

---

**Last Updated:** 2026-02-06
**System Version:** 1.0 Production Ready
**Status:** ✅ Siap Dipublis (Ready for Publication)
