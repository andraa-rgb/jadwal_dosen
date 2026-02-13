# 🎯 Admin Panel Quick Start Guide

## 📋 Overview

The Admin Panel is designed EXCLUSIVELY for managing dosen (lecturer) accounts. Admins do NOT create schedules - that's done by the dosens themselves.

### Admin Responsibilities:
1. ✅ Create new dosen accounts
2. ✅ Edit existing dosen details (name, email, NIP, role)
3. ✅ Delete dosen accounts
4. ❌ NOT responsible for creating schedules
5. ❌ NOT responsible for managing bookings

---

## 🔑 Login

1. Go to: `http://localhost:8000/login`
2. Enter credentials:
   - **Email:** `admin@lab-wicida.ac.id`
   - **Password:** `admin123`
3. Click **Login**
4. You'll be redirected to `/admin/dashboard`

---

## 📊 Admin Dashboard (/admin/dashboard)

### Overview Stats
At the top, you'll see 3 cards showing:
- 👥 **Total Dosen** - Number of registered lecturers
- 📅 **Total Jadwal** - Total number of schedules across all dosens
- ⏳ **Booking Pending** - Number of pending student consultation bookings

### Dosen List
Below the stats is a table showing all registered dosens with columns:
- **Nama** - Lecturer name
- **Email** - Email address
- **NIP** - Employee ID
- **Peran** - Role (Staf or Kepala Lab)
- **Jadwal** - Number of schedules for this dosen
- **Aksi** - Action buttons (Edit, Delete)

---

## ➕ Adding a New Dosen

### Steps:

1. **Click "➕ Tambah Dosen"** button at top-right of dashboard

2. **Fill in the form:**
   - **Nama Lengkap** - Full name (required)
   - **Email** - Must be unique and valid (required)
   - **NIP** - Employee ID (optional)
   - **Peran** - Select role:
     - Staf (regular lecturer)
     - Kepala Lab (lab head/senior lecturer)
   - **Password** - Minimum 8 characters (required)
   - **Konfirmasi Password** - Must match password above

3. **Click "✅ Tambah Dosen"** to save

4. **Success!** You'll see a message and be redirected to dashboard

### Default Credentials for New Dosen:
- **Email:** Whatever you entered in the form
- **Password:** Whatever you set in the form
- **Role:** Staf or Kepala Lab (your choice)

⚠️ **Note:** The new dosen should login and change their password immediately!

---

## ✏️ Editing Dosen Details

### Steps:

1. **Find the dosen** in the table on dashboard

2. **Click "✏️ Edit"** button in the Aksi column

3. **Update the form:**
   - All fields except email are directly editable
   - **Password:** Leave blank to keep current password
   - **Password:** Fill to change password (must be 8+ chars)

4. **Click "✅ Simpan Perubahan"** to save

5. **Success!** Changes are applied immediately

### What You Can Edit:
- ✅ Name (Nama Lengkap)
- ✅ Email (must remain unique)
- ✅ NIP (optional, must be unique)
- ✅ Role (Staf or Kepala Lab)
- ✅ Password (optional)

---

## 🗑️ Deleting a Dosen

### Steps:

1. **Find the dosen** in the table

2. **Click "🗑️ Hapus"** button

3. **Confirmation dialog appears** asking to confirm deletion

4. **Click "Ya, Hapus"** to confirm

### ⚠️ Important - Cascade Delete:
When you delete a dosen, the system AUTOMATICALLY deletes:
- All schedules (jadwals) created by that dosen
- All consultation bookings for that dosen
- Status records for that dosen

**This cannot be undone!** Be careful when deleting.

---

## 👥 Dosen Roles Explained

### Staf (Staff)
- Regular lecturer
- Can create and manage schedules
- Can approve/reject student consultations
- Can update their status (Available, Teaching, etc)

### Kepala Lab (Lab Head)
- Senior lecturer / lab director
- Same permissions as Staf
- Used to identify leadership roles

**Note:** Both roles have identical system permissions. The role is mainly for organizational purposes.

---

## 📈 Dashboard Stats Explained

### Total Dosen
- Count of all lecturers (both Staf and Kepala Lab)
- Excludes admin accounts

### Total Jadwal
- Sum of all schedules across all dosens
- Includes teaching, consultation, meetings, and unavailable times

### Booking Pending
- Consultations awaiting dosen approval
- Students submit → Dosens approve/reject
- Admin just monitors this count

---

## ⚙️ Common Admin Tasks

### Task: Add Multiple Dosens
1. Click "➕ Tambah Dosen"
2. Fill form and save
3. Repeat for each dosen
4. Share login credentials with each dosen

### Task: Update Dosen Email
1. Click "✏️ Edit" on the dosen
2. Change email to new one
3. Click "✅ Simpan Perubahan"
4. ⚠️ Make sure new email is valid!

### Task: Reset Dosen Password
1. Click "✏️ Edit" on the dosen
2. Enter new password in the password field
3. Confirm password
4. Click "✅ Simpan Perubahan"
5. Share new password with dosen (they should change it after login)

### Task: Promote Staf to Kepala Lab
1. Click "✏️ Edit" on the dosen
2. Change role from "Staf" to "Kepala Lab"
3. Click "✅ Simpan Perubahan"

### Task: Remove a Dosen
1. Find dosen in table
2. Click "🗑️ Hapus"
3. Confirm deletion
4. ⚠️ All their schedules and bookings are deleted!

---

## 🔒 Important Security Notes

### Best Practices:
1. **Change default password** - Don't keep admin123 in production
   - Login as admin
   - Go to /profile
   - Click "Ubah Password"

2. **Share dosen credentials securely** - Don't email passwords
   - Verbally provide or through secure channel
   - Dosen should change password immediately after login

3. **Regular backups** - Before deleting dosens
   - Backup database just in case
   - Deletes are permanent

4. **Keep admin account safe**
   - Only one admin account should exist
   - Use strong password
   - Don't share admin credentials

---

## 🆘 Troubleshooting

### Issue: Can't access admin panel
- **Solution:** Check that you're logged in as admin
- **Check:** URL should be `/admin/dashboard`
- **Login as:** admin@lab-wicida.ac.id

### Issue: Email already exists error
- **Solution:** Each dosen needs unique email
- **Try:** Add number or department to email (dosen2@lab-wicida.ac.id)

### Issue: Form validation error
- **Check:** 
  - Name is filled
  - Email is valid format
  - NIP is unique (if filled)
  - Password is 8+ characters
  - Password confirmation matches

### Issue: Deleted dosen by mistake
- **Solution:** Check database backups
- **Prevention:** Always confirm before deleting

### Issue: Can't login after password reset
- **Solution:** Check that password matches confirmation
- **Try:** Reset password again

---

## 📱 Responsive Design

The admin panel works on:
- 📱 Mobile phones (320px+)
- 📱 Tablets (768px+)
- 💻 Desktop computers (1024px+)

All forms and tables are mobile-friendly!

---

## 🎓 Next Steps for Dosens

After you create a dosen account, they should:

1. **Login** at `/login` with their new credentials
2. **Change password** at `/profile`
3. **Create schedules** at `/jadwal/create`
4. **Set status** at `/dashboard`
5. **Start accepting bookings** from students

---

## 📞 Need Help?

If something doesn't work:
1. Check the browser console (F12) for errors
2. Check Laravel logs in `storage/logs/`
3. Clear cache: `php artisan cache:clear`
4. Restart the server

---

**Last Updated:** 2026-02-06
**Status:** ✅ Production Ready
