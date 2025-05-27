# Kosme

Platform Manajemen Kos Modern berbasis Web

## Tentang Kosme

Kosme adalah platform manajemen kos modern yang dirancang untuk memudahkan pengelolaan properti kos. Dibangun dengan teknologi terkini, Kosme menyediakan solusi komprehensif untuk pemilik kos dan penghuni dalam mengelola transaksi, pembayaran, dan komunikasi.

### Fitur Utama

#### Untuk Pemilik Kos

-   📊 Dashboard analitik untuk monitoring pendapatan dan okupansi
-   👥 Manajemen penghuni kos yang terintegrasi
-   💰 Sistem pembayaran dan tagihan otomatis
-   📝 Pencatatan pemeliharaan dan perbaikan
-   📱 Notifikasi real-time untuk pembayaran dan masalah
-   📈 Laporan keuangan dan statistik

#### Untuk Penghuni Kos

-   📱 Aplikasi mobile-friendly untuk akses mudah
-   💳 Pembayaran online yang aman
-   📢 Sistem pengaduan dan komunikasi
-   📅 Jadwal pembayaran dan riwayat transaksi
-   🔔 Notifikasi pembayaran dan pengumuman

### Teknologi yang Digunakan

-   **Backend**: Laravel 12 - Framework PHP modern untuk performa tinggi
-   **Admin Panel**: Filament 3 - Panel admin yang elegan dan mudah digunakan
-   **Frontend**:
    -   Tailwind CSS - Framework CSS modern untuk desain responsif
    -   Alpine.js - Library JavaScript ringan untuk interaktivitas
-   **Database**: SQLite (dapat dikonfigurasi ke MySQL/PostgreSQL)
-   **Testing**: Pest PHP - Framework testing modern

## Persyaratan Sistem

-   PHP 8.2 atau lebih tinggi
-   Node.js dan NPM
-   Composer
-   SQLite (atau database lain yang didukung)
-   Web server (Apache/Nginx)

## Panduan Instalasi

1. Clone repository:

```bash
git clone [repository-url]
cd kosme
```

2. Install dependensi PHP:

```bash
composer install
```

3. Install dependensi Node.js:

```bash
npm install
```

4. Siapkan environment:

```bash
cp .env.example .env
php artisan key:generate
```

5. Konfigurasi database di file `.env`:

```env
DB_CONNECTION=sqlite
# atau
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kosme
DB_USERNAME=root
DB_PASSWORD=
```

6. Jalankan migrasi dan seeder:

```bash
php artisan migrate --seed
```

7. Jalankan server development:

```bash
composer dev
```

Server akan menjalankan:

-   Server Laravel (http://localhost:8000)
-   Server Vite untuk asset
-   Queue worker untuk proses background

## Pengembangan

### Perintah Umum

-   Jalankan tes: `composer test`
-   Build aset: `npm run build`
-   Jalankan linter: `composer lint`
-   Jalankan formatter: `composer format`

### Struktur Proyek

```
kosme/
├── app/              # Kode aplikasi utama
├── config/           # File konfigurasi
├── database/         # Migrasi dan seeder
├── resources/        # Asset frontend
├── routes/           # Definisi rute
├── tests/            # File pengujian
└── vendor/           # Dependensi PHP
```

## Kontribusi

Kami menerima kontribusi untuk pengembangan Kosme. Silakan buat pull request atau buka issue untuk diskusi lebih lanjut.

## Lisensi

Kosme adalah perangkat lunak open source yang dilisensikan di bawah [MIT License](LICENSE.md).

## Dukungan

Untuk bantuan dan dukungan, silakan:

-   Buka issue di repository
-   Hubungi tim pengembang di [email@kosme.com]
-   Kunjungi dokumentasi di [docs.kosme.com]
