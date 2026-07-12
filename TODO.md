# TODO - RinjaniTrail.id perbaikan

## Done
- **Fix Login Redirects**: Memastikan login user mengarah ke `/profile` dan login admin ke `/admin/dashboard`.
- **Fix Admin Login**: Memperbaiki logika `showLoginForm` untuk admin agar tidak menampilkan halaman login jika sudah terautentikasi.
- **Connect Socialite Buttons**: Menambahkan rute dan memperbaiki logika untuk login via Google/Facebook baik untuk user maupun admin.
- **Fix Dashboard Links**: Memperbaiki tautan "Tambah Artikel Baru" di dashboard admin.

## Next steps (sesuai plan)
1. Ubah password default dari seeders (Keamanan)
   - user: `user123`
   - admin: `admin123`
2. Buat halaman CRUD untuk seluruh menu di My Profile user
   - Personal Information (profile update)
   - Hiking Profile (CRUD)
   - Saved Articles (CRUD)
   - Trip History (CRUD)
   - Profile Overview (dashboard ringkasan)
3. Lengkapi Dashboard Admin
   - Ganti semua tombol `href="#"` menjadi route admin CRUD yang fungsional.
   - Pastikan semua menu/fitur di dashboard punya halaman list + create + edit + delete
   - Jadikan data statistik di dashboard dinamis (ambil dari database).
4. Buat Register Admin (jika diperlukan)
   - Halaman register admin yang aman (mungkin hanya bisa diakses oleh super-admin).
   - Pastikan role admin terset sebagai `admin`

## Testing checklist
- Test login user biasa → harus landing ke `/profile`
- Test login admin → harus landing ke `/admin/dashboard`
- Test tombol Google/Facebook pada login user → berhasil redirect/callback
- Test tombol Google/Facebook pada login admin → berhasil (hanya untuk email admin yang sudah ada)
- Test CRUD menu profile user bekerja dan hanya milik user tersebut
- Test CRUD pada dashboard admin bekerja
