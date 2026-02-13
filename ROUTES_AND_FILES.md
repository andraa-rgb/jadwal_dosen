# 🗺️ System Routes & File Structure

## Public Routes (No Authentication Required)

| Route | Method | Controller Method | Description |
|-------|--------|------------------|-------------|
| `/` | GET | JadwalController@home | Homepage with dosen list |
| `/dosen/{id}` | GET | JadwalController@show | View dosen schedule & booking form |
| `/dosen/{id}/booking` | POST | JadwalController@storeBooking | Submit consultation booking |
| `/api/jadwal/{dosenId}` | GET | JadwalController@getJadwalByDay | Get schedule by day (API) |
| `/api/status/{dosenId}` | GET | JadwalController@getStatus | Get dosen status (API) |

## Admin Routes (/admin/*)

**ALL require authentication + admin role**

| Route | Method | Controller Method | Name | Description |
|-------|--------|------------------|------|-------------|
| `/admin/dashboard` | GET | AdminController@dashboard | admin.dashboard | Admin dashboard with stats |
| `/admin/dosen/create` | GET | AdminController@createDosen | admin.dosen.create | Show form to add dosen |
| `/admin/dosen` | POST | AdminController@storeDosen | admin.dosen.store | Save new dosen account |
| `/admin/dosen/{id}/edit` | GET | AdminController@editDosen | admin.dosen.edit | Show form to edit dosen |
| `/admin/dosen/{id}` | PUT | AdminController@updateDosen | admin.dosen.update | Update dosen details |
| `/admin/dosen/{id}` | DELETE | AdminController@deleteDosen | admin.dosen.delete | Delete dosen (cascade) |

## Dosen Routes (/dashboard, /jadwal/*, /booking/*)

**ALL require authentication**

| Route | Method | Controller Method | Name | Description |
|-------|--------|------------------|------|-------------|
| `/dashboard` | GET | JadwalController@dashboard | dashboard | Dosen dashboard |
| `/jadwal/` | GET | JadwalController@indexJadwal | dosen.jadwal.index | List schedules |
| `/jadwal/create` | GET | JadwalController@createJadwal | dosen.jadwal.create | Show create form |
| `/jadwal` | POST | JadwalController@storeJadwal | dosen.jadwal.store | Save new schedule |
| `/jadwal/{id}/edit` | GET | JadwalController@editJadwal | dosen.jadwal.edit | Show edit form |
| `/jadwal/{id}` | PUT | JadwalController@updateJadwal | dosen.jadwal.update | Update schedule |
| `/jadwal/{id}` | DELETE | JadwalController@destroyJadwal | dosen.jadwal.destroy | Delete schedule |
| `/booking/` | GET | JadwalController@indexBooking | dosen.booking.index | List bookings |
| `/booking/{id}/approve` | POST | JadwalController@approveBooking | dosen.booking.approve | Approve booking |
| `/booking/{id}/reject` | POST | JadwalController@rejectBooking | dosen.booking.reject | Reject booking |
| `/api/status/update` | POST | JadwalController@updateStatus | status.update | Update dosen status |

## Profile Routes (/profile/*)

**ALL require authentication**

| Route | Method | Controller Method | Name | Description |
|-------|--------|------------------|------|-------------|
| `/profile` | GET | ProfileController@edit | profile.edit | Show profile form |
| `/profile` | PATCH | ProfileController@update | profile.update | Update profile |
| `/profile` | DELETE | ProfileController@destroy | profile.destroy | Delete account |

## Auth Routes (/auth/*)

From `routes/auth.php`:
- `/register` - Register (DISABLED - admin creates accounts)
- `/login` - Login form
- `/logout` - Logout
- `/forgot-password` - Password reset request
- `/reset-password/{token}` - Password reset form

---

## Key Files & Locations

### Controllers
- `app/Http/Controllers/AdminController.php` - Admin (dosen management)
- `app/Http/Controllers/JadwalController.php` - Main logic (schedules, bookings, status)
- `app/Http/Controllers/ProfileController.php` - User profile
- `app/Http/Controllers/Auth/` - Authentication controllers

### Models
- `app/Models/User.php` - User model (admin, staf, kepala_lab)
- `app/Models/Jadwal.php` - Schedule model
- `app/Models/Booking.php` - Consultation booking model
- `app/Models/Status.php` - Dosen status model

### Views
- **Layouts:**
  - `resources/views/layouts/app.blade.php` - Main app layout
  - `resources/views/layouts/guest.blade.php` - Guest layout (login, etc)
  - `resources/views/layouts/navigation.blade.php` - Header/navbar (UPDATED)

- **Public Pages:**
  - `resources/views/home.blade.php` - Homepage with dosen cards
  - `resources/views/jadwal/detail.blade.php` - Dosen detail & booking form

- **Admin Pages:**
  - `resources/views/admin/dashboard.blade.php` - Admin dashboard
  - `resources/views/admin/create-dosen.blade.php` - Add dosen form
  - `resources/views/admin/edit-dosen.blade.php` - Edit dosen form

- **Dosen Pages:**
  - `resources/views/dosen/dashboard.blade.php` - Dosen dashboard
  - `resources/views/dosen/jadwal/` - Schedule management
  - `resources/views/dosen/booking/` - Booking management

- **Auth Pages:**
  - `resources/views/auth/login.blade.php` - Login form
  - `resources/views/auth/register.blade.php` - Registration (disabled)
  - `resources/views/auth/passwords/` - Password reset pages

### Styling
- `resources/css/app.css` - Custom Tailwind styles (200+ lines)
- `tailwind.config.js` - Tailwind configuration (purple theme)
- `postcss.config.js` - PostCSS configuration

### Database
- `database/migrations/` - All migration files
- `database/seeders/` - Seed files with sample data
- `database/factories/` - Factories for testing

### Configuration
- `config/app.php` - App config
- `config/database.php` - Database config
- `config/auth.php` - Auth config
- `.env` - Environment variables

---

## Database Structure

### users table
```
id (int, primary)
name (string)
email (string, unique)
nip (string, unique, nullable)
role (enum: admin, staf, kepala_lab)
email_verified_at (timestamp, nullable)
password (string)
remember_token (string, nullable)
created_at, updated_at (timestamp)
```

### jadwals table
```
id (int, primary)
user_id (int, FK → users)
hari (string: Senin-Jumat)
jam_mulai (time)
jam_selesai (time)
kegiatan (string: Mengajar, Konsultasi, Rapat, Tidak Ada)
tempat (string)
keterangan (text, nullable)
created_at, updated_at (timestamp)
```

### statuses table
```
id (int, primary)
user_id (int, FK → users)
status (string: Ada, Mengajar, Konsultasi, Tidak Ada)
created_at, updated_at (timestamp)
```

### bookings table
```
id (int, primary)
jadwal_id (int, FK → jadwals)
nama_mahasiswa (string)
nim (string)
topik (string)
status (enum: pending, approved, rejected)
created_at, updated_at (timestamp)
```

---

## Key Implementation Notes

### Admin Middleware
- Checks `Auth::user()->role === 'admin'`
- Redirects to `/` if not admin
- Prevents non-admin users from accessing `/admin/*`

### Dosen Management
- Admin can ONLY manage dosen accounts (CRUD)
- Admin CANNOT create schedules (only dosens can)
- Cascade delete removes all schedules/bookings when dosen is deleted

### Status System
- Real-time status update via POST `/api/status/update`
- Affects display on home page and schedule details
- Used by students to know if dosen is available

### Booking System
- Students can book consultations without login
- Dosens approve/reject in their dashboard
- Email notifications (if configured)

### Design System
- All views use Tailwind CSS
- Custom component classes in app.css
- Purple-white color scheme
- Responsive on all devices
- Smooth animations and transitions

---

## Environment Variables (.env)

```
APP_NAME="Lab WICIDA"
APP_ENV=production
APP_DEBUG=false
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jadwal_dosen
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS=admin@lab-wicida.ac.id
```

---

**Created:** 2026-02-06
**System:** Sistem Jadwal Dosen Lab WICIDA v1.0
