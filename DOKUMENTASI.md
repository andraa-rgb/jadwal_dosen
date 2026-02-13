# 📚 Sistem Jadwal Dosen Lab WICIDA - Dokumentasi Lengkap

## 🎯 Ringkasan Implementasi

Sistem jadwal dosen Lab WICIDA telah berhasil diimplementasikan dengan fitur lengkap sesuai spesifikasi. Sistem ini menghubungkan mahasiswa dengan dosen melalui transparansi jadwal real-time dan booking konsultasi yang sederhana.

---

## 📋 Database Schema

### Tabel `users`
```sql
- id (Primary Key)
- name (string)
- email (unique)
- password (hashed)
- nip (nullable, unique) - Nomor Induk Pegawai
- photo (nullable) - Foto profil
- role (enum: 'kepala_lab', 'staf', 'admin')
- email_verified_at, remember_token, timestamps
```

### Tabel `jadwals`
```sql
- id (Primary Key)
- user_id (Foreign Key → users)
- hari (enum: Senin, Selasa, Rabu, Kamis, Jumat)
- jam_mulai (time)
- jam_selesai (time)
- ruangan (string, nullable)
- kegiatan (enum: Mengajar, Konsultasi, Rapat, Lainnya)
- keterangan (text, nullable)
- timestamps
```

### Tabel `statuses`
```sql
- id (Primary Key)
- user_id (Foreign Key → users, unique)
- status (enum: Ada, Mengajar, Konsultasi, Tidak Ada)
- updated_at_iot (timestamp) - Dari perangkat IoT
- timestamps
```

### Tabel `bookings`
```sql
- id (Primary Key)
- user_id (Foreign Key → users) - Dosen
- nama_mahasiswa (string)
- email_mahasiswa (email)
- nim_mahasiswa (string, nullable)
- tanggal_booking (date)
- jam_mulai (time)
- jam_selesai (time)
- keperluan (text)
- status (enum: pending, approved, rejected)
- alasan_reject (text, nullable)
- timestamps
```

---

## 🛣️ Routes & Endpoints

### PUBLIC ROUTES (Tidak perlu login)
```
GET  /                              → Halaman utama (home)
GET  /dosen/{id}                    → Detail jadwal dosen
POST /dosen/{id}/booking            → Submit booking konsultasi
GET  /api/jadwal/{dosenId}          → Get jadwal by hari (AJAX)
GET  /api/status/{dosenId}          → Get status real-time (AJAX)
```

### AUTH ROUTES (Perlu login)
```
GET  /dashboard                     → Dashboard dosen
GET  /profile                       → Edit profil

// Jadwal Management
GET  /jadwal                        → List jadwal
GET  /jadwal/create                 → Form create jadwal
POST /jadwal                        → Store jadwal
GET  /jadwal/{id}/edit              → Form edit jadwal
PUT  /jadwal/{id}                   → Update jadwal
DELETE /jadwal/{id}                 → Delete jadwal

// Booking Management
GET  /booking                       → List booking requests
POST /booking/{id}/approve          → Approve booking
POST /booking/{id}/reject           → Reject booking

// Status Update
POST /api/status/update             → Update status (dari IoT/manual)
```

---

## 👥 Model Relationships

```
User
├── hasMany Jadwal
├── hasOne Status
└── hasMany Booking

Jadwal
└── belongsTo User

Status
└── belongsTo User

Booking
└── belongsTo User
```

---

## 🎨 UI/UX - Halaman Publik

### 1. Halaman Utama (/)
**Fitur:**
- Grid 3 card dosen dengan status real-time (🟢🔴🟡⚪)
- Nama, NIP, dan role dosen
- Badge status dengan warna berbeda
- Tombol "Lihat Jadwal" dan "Booking Konsultasi"
- QR Code placeholder untuk akses cepat

**Styling:**
- Modern flat design dengan Tailwind CSS
- Soft colors: slate, blue, emerald, red, yellow
- Responsive: 1 kolom mobile, 3 kolom desktop

### 2. Halaman Detail Dosen (/dosen/{id})
**Fitur:**
- Header dengan nama dosen + status real-time
- Jadwal mingguan (Senin-Jumat)
- Setiap jadwal menampilkan:
  - Jam mulai-selesai
  - Jenis kegiatan (ikon berbeda)
  - Ruangan
  - Keterangan
- Form booking konsultasi dengan fields:
  - Nama, email, NIM mahasiswa
  - Tanggal booking (min: besok)
  - Jam mulai-selesai
  - Keperluan

---

## 🎨 UI/UX - Halaman Dosen (Login Required)

### 1. Dashboard (/dashboard)
**Fitur:**
- 3 cards ringkasan: Total Jadwal, Pending Booking, Status Real-Time
- Jadwal minggu ini dengan tombol Edit/Hapus
- Status real-time updater (radio buttons untuk 4 status)
- Quick links ke halaman lain

### 2. Kelola Jadwal (/jadwal)
**Fitur:**
- Tabel daftar jadwal dengan pagination
- Kolom: Hari, Jam, Kegiatan, Ruangan, Aksi
- Tombol "Edit" dan "Hapus" per jadwal
- Tombol "+ Tambah Jadwal"

### 3. Create/Edit Jadwal (/jadwal/create, /jadwal/{id}/edit)
**Form Fields:**
- Hari (select)
- Jam mulai-selesai (time input)
- Kegiatan (select)
- Ruangan (text input)
- Keterangan (textarea)
- Buttons: Simpan, Batal

### 4. Booking List (/booking)
**Fitur:**
- Filter tabs: Semua, Menunggu, Disetujui, Ditolak
- Card per booking dengan:
  - Nama & email mahasiswa
  - Status badge (dengan warna berbeda)
  - Tanggal, jam, keperluan
  - Tombol: Setujui, Tolak (untuk pending)
- Modal popup untuk input alasan reject
- Pagination

---

## 🔐 Authentication & Authorization

**Built-in dengan Laravel Breeze:**
- Register dosen baru
- Login dengan email/password
- Logout
- Profile edit (name, email, password)

**Role-Based Access:**
- **Public**: Lihat jadwal semua dosen, booking konsultasi
- **Staf/Kepala Lab**: Manage jadwal pribadi, approve/reject booking, update status
- **Admin**: Full access (optional, untuk management awal)

---

## 📊 Dummy Data

Sistem sudah pre-loaded dengan 3 dosen Lab WICIDA:

**1. Dr. Budi Santoso (Kepala Lab)**
- Email: budi@lab-wicida.ac.id
- NIP: 198501151990031001
- Password: password
- Status: Ada
- Jadwal: Pengajar, Konsultasi, Rapat

**2. Ir. Siti Nurhayati (Staf)**
- Email: siti@lab-wicida.ac.id
- NIP: 198703202015032004
- Password: password
- Status: Mengajar
- Jadwal: Pengajar, Konsultasi

**3. Andriana Kusuma (Staf)**
- Email: andriana@lab-wicida.ac.id
- NIP: 199005152018032002
- Password: password
- Status: Konsultasi
- Jadwal: Pengajar, Konsultasi

---

## 🚀 Cara Menggunakan Sistem

### Untuk Mahasiswa:
1. Buka halaman utama (/)
2. Lihat 3 dosen dengan status real-time
3. Pilih dosen → Lihat jadwal mingguan
4. Klik "Booking Konsultasi"
5. Isi form: nama, email, tanggal, jam, keperluan
6. Submit dan tunggu persetujuan dosen

### Untuk Dosen:
1. Login dengan email & password
2. Pergi ke Dashboard (/dashboard)
3. **Manage Jadwal:**
   - Lihat jadwal minggu ini
   - Tambah jadwal baru (/jadwal/create)
   - Edit/Hapus jadwal existing
4. **Update Status Real-Time:**
   - Di dashboard, pilih status (Ada/Mengajar/Konsultasi/Tidak Ada)
   - Status otomatis terupdate dan terlihat di halaman publik
5. **Manage Booking:**
   - Pergi ke /booking
   - Lihat daftar booking dari mahasiswa
   - Setujui atau tolak dengan alasan

---

## 🔄 Alur Booking Konsultasi

```
1. Mahasiswa lihat jadwal dosen di halaman publik
2. Mahasiswa submit booking dengan pilih tanggal & jam kosong
3. Booking masuk ke status PENDING
4. Dosen login → lihat booking di dashboard
5. Dosen review & approve/reject
6. Jika APPROVED → Mahasiswa bisa confirm
7. Jika REJECTED → Tampilkan alasan penolakan
```

---

## 🔌 Integrasi IoT (Future Enhancement)

**Endpoint untuk IoT Device (ESP32):**
```
POST /api/status/update
Headers: X-CSRF-TOKEN
Body: {
    "status": "Ada" | "Mengajar" | "Konsultasi" | "Tidak Ada"
}
```

**Workflow:**
1. Tombol fisik di meja dosen → ESP32 baca input
2. ESP32 send POST request ke server
3. Server update status di database
4. Status real-time terpancar ke halaman publik

---

## 📱 Responsive Design

- **Mobile (< 768px):** 1 kolom, font lebih kecil, spacing compact
- **Tablet (768px - 1024px):** 2 kolom pada beberapa section
- **Desktop (> 1024px):** Full 3 kolom, optimal spacing

---

## 🛠️ Technology Stack

- **Backend:** Laravel 11 (PHP)
- **Frontend:** Blade Templates + Tailwind CSS
- **Database:** MySQL 8.0
- **Authentication:** Laravel Breeze
- **Server:** PHP 8.2+

---

## 📝 Setup & Installation

```bash
# 1. Clone/Extract project
cd c:\laragon\www\jadwal-dosen

# 2. Install dependencies
composer install
npm install

# 3. Environment setup
cp .env.example .env
php artisan key:generate

# 4. Database
php artisan migrate
php artisan db:seed

# 5. Run server
php artisan serve
```

**Access Points:**
- Public: http://127.0.0.1:8000
- Login: http://127.0.0.1:8000/login
- Dashboard: http://127.0.0.1:8000/dashboard

---

## 🎯 Key Features Summary

✅ **Real-Time Status Display** - 4 status dengan emoji & warna berbeda
✅ **QR Code Integration** - Siap untuk integrasi QR per dosen
✅ **Jadwal Mingguan** - View & manage by hari
✅ **Booking Konsultasi** - Simple form dengan validasi
✅ **Approve/Reject** - Dosen kontrol full booking
✅ **IoT Ready** - Endpoint siap untuk ESP32/sensor
✅ **Mobile Responsive** - Mobile-first design
✅ **Modern UI/UX** - Flat design dengan Tailwind
✅ **Authentication** - Secure login with hashed passwords
✅ **Pagination** - Handle banyak booking

---

## 📞 Default Login Credentials

**Untuk testing:**
```
Email: budi@lab-wicida.ac.id
Password: password

Email: siti@lab-wicida.ac.id
Password: password

Email: andriana@lab-wicida.ac.id
Password: password
```

---

**Sistem siap digunakan! 🚀**
