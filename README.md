# Aplikasi Pengajuan Surat Mahasiswa

Aplikasi ini merupakan sistem berbasis web untuk pengajuan surat keterangan oleh mahasiswa di tiga program studi:
- Teknik Informatika
- Sistem Informasi
- Magister Ilmu Komputer

## 🔑 Fitur Utama
- Login multi-role (Mahasiswa, Ketua Program Studi, Tata Usaha)
- Pengajuan surat oleh mahasiswa
- Persetujuan surat oleh Ketua Program Studi
- Upload surat final oleh Tata Usaha
- Download dan preview surat oleh mahasiswa
- Notifikasi email setelah status berubah

## 👨‍💻 Teknologi
- Laravel 10
- KaiAdmin Template (UI)
- MySQL
- Bootstrap 5

## 📸 Tampilan
(Lampirkan screenshot jika ada)

## 🚀 Cara Menjalankan Proyek

```bash
git clone https://github.com/Kuroyukihime00/project_capstone_1.git
cd project_capstone_1
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
