# YP Assessment - Portal System

Sistem Pengurusan Yang Dibina Menggunakan Laravel 11 Breeze

## Ciri-ciri Utama (Features)
- Role-based Access (Lecturer & Student)
- Pengurusan Kelas dan Subjek
- Assign Pelajar dan Subjek Dalam Kelas
- Jenis Soalan: Pilihan Jawapan & Jawapan Terbuka
- Sekatan Jawapan: Student hanya boleh jawab sekali sahaja
- Limit Masa 15 Minit

## Flow Lecturer
1. Bina Kelas
2. Bina Subjek
3. Daftarkan Pelajar dan Subjek di dalam "Manage Class"
4. Pergi ke Dashboard untuk Akses Kelas yang Tersedia dan Bina Peperiksaan
5. Tambah Soalan ke dalam Peperiksaan

## Flow Student
1. Akses Kelas yang Didaftarkan di Dashboard
2. Attend

## Cara Pemasangan (Setup Instructions)
1. Clone repository ini.
2. Jalankan `composer install`.
3. Jalankan `npm install`.
4. Salin `.env.example` ke `.env`.
5. Jalankan `php artisan key:generate`.
6. Jalankan `New-Item -Path database/database.sqlite -ItemType File` untuk windows (powershell) `touch database/database.sqlite` untuk Mac/Linux/Git Bash
7. Jalankan `php artisan migrate --seed`.
8. Jalankan `npm run dev`.
9. Jalankan `php artisan serve`.


## Demo Accounts
Use these credentials to test the system:

**Lecturer Account:**
- Email: `lecturer@peneraju.com`
- Password: `password123`

**Student Account:**
- Email: `student1@example.com`
- Password: `password123`

- Email: `student2@example.com`
- Password: `password123`

- Email: `student3@example.com`
- Password: `password123`

*Note: Please run `php artisan migrate --seed` to populate the database with these accounts.*