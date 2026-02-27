# YP Assessment - Portal System

Sistem Pengurusan Yang Dibina Menggunakan Laravel 11 Breeze

## Ciri-ciri Utama (Features)
- Role-based Access (Lecturer & Student)
- Pengurusan Kelas dan Subjek
- Assign Pelajar dan Subjek Dalam Kelas
- Jenis Soalan: Pilihan Jawapan & Jawapan Terbuka
- Sekatan Jawapan: Student hanya boleh jawab sekali sahaja

## Cara Pemasangan (Setup Instructions)
1. Clone repository ini.
2. Jalankan `composer install`.
3. Jalankan `npm install`.
4. Salin `.env.example` ke `.env`.
5. Jalankan `php artisan key:generate`.
6. Jalankan `php artisan migrate --seed`.
7. Jalankan `npm run dev`.
8. Jalankan `php artisan serve`.


## Demo Accounts
Use these credentials to test the system:

**Lecturer Account:**
- Email: `test@example.com`
- Password: `password123`

**Student Account:**
- Email: `student1@example.com`
- Password: `password123`

- Email: `student2@example.com`
- Password: `password123`

- Email: `student3@example.com`
- Password: `password123`

*Note: Please run `php artisan migrate --seed` to populate the database with these accounts.*