# 🏠 KosMe, Choose Me!

<div align="center">
  <h3>Platform Manajemen Kos Modern berbasis Website</h3>
  <p>Solusi Terpadu untuk Pengelolaan Kos yang Efisien</p>
  <p>Website: <a href="https://kosme.my.id">https://kosme.my.id</a></p>
</div>

## 📋 Tentang KosMe

KosMe adalah platform manajemen kos modern yang dirancang untuk memudahkan pengelolaan properti kos. Dibangun dengan teknologi terkini, Kosme menyediakan solusi komprehensif untuk pemilik kos dan penghuni dalam mengelola transaksi, pembayaran, dan komunikasi.

### ✨ Fitur Utama

#### 👨‍💼 Admin (https://kosme.my.id/admin)

-   📊 Dashboard analitik untuk monitoring seluruh kos
-   👥 Manajemen User
-   📈 Laporan keuangan keseluruhan
-   ⚙️ Konfigurasi sistem
-   🔐 Manajemen role dan permission
-   📝 Verifikasi kos dan pemilik
-   📊 Statistik dan analitik platform

#### 👨‍💻 Owner (https://kosme.my.id/owner)

-   📊 Dashboard analitik untuk monitoring kos sendiri
-   👥 Manajemen penghuni kos
-   💰 Sistem pembayaran terintegrasi
-   📝 Pencatatan pemeliharaan dan perbaikan
-   📈 Laporan keuangan kos
-   🏠 Manajemen kamar dan fasilitas
-   💳 Manajemen metode pembayaran

#### 👤 User/Penghuni (https://kosme.my.id)

-   📱 Aplikasi mobile-friendly untuk akses mudah
-   💳 Pembayaran online yang aman dengan multiple payment gateway
-   📅 Riwayat transaksi dan pembayaran
-   🏠 Informasi kamar dan fasilitas
-   👥 Profil dan pengaturan akun
-   📊 Status pembayaran dan tagihan
-   💳 Pilihan metode pembayaran yang fleksibel

### 🛠️ Teknologi yang Digunakan

-   **Backend**: Laravel 12 - Framework PHP modern untuk performa tinggi
-   **Admin Panel**: Filament 3 - Panel admin yang elegan dan mudah digunakan
-   **Frontend**:
    -   Tailwind CSS - Framework CSS modern untuk desain responsif
    -   Alpine.js - Library JavaScript ringan untuk interaktivitas
-   **Database**: MySQL
-   **Testing**: Pest PHP - Framework testing modern
-   **Payment Gateway**: Midtrans - Payment gateway terpercaya

## ⚙️ Persyaratan Sistem

-   🐘 PHP 8.2 atau lebih tinggi
-   📦 Node.js dan NPM
-   🎵 Composer
-   💾 MySql (atau database lain yang didukung)
-   🌐 Web server (Apache/Nginx)

## 🚀 Panduan Instalasi

### 1️⃣ Persiapan Awal

1. Pastikan semua persyaratan sistem terpenuhi:

```bash
# Cek versi PHP
php -v

# Cek versi Node.js
node -v

# Cek versi Composer
composer -V
```

2. Clone repository:

```bash
git clone [repository-url]
```

### 2️⃣ Instalasi Dependensi

1. Install dependensi PHP:

```bash
composer install
```

2. Install dependensi Node.js:

```bash
npm install
```

### 3️⃣ Konfigurasi Aplikasi

1. Siapkan environment:

```bash
cp .env.example .env
php artisan key:generate
```

2. Konfigurasi database di file `.env`:

```env
# Konfigurasi Database
DB_CONNECTION=sqlite
# atau
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kosme_database
DB_USERNAME=root
DB_PASSWORD=

# Konfigurasi Aplikasi
APP_NAME=Kosme
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
```

### 4️⃣ Setup Database

1. Jalankan migrasi dan seeder:

```bash
php artisan migrate --seed
```

2. Buat symbolic link untuk storage:

```bash
php artisan storage:link
```

Setelah menjalankan seeder, Anda dapat login dengan kredensial berikut:

#### Admin

-   Email: admin@example.com
-   Password: password
-   URL: https://kosme.my.id/admin

### 5️⃣ Menjalankan Aplikasi

#### Development

Untuk menjalankan aplikasi dalam mode development:

```bash
composer dev
```

Perintah ini akan menjalankan:

-   🌐 Server Laravel (http://localhost:8000)
-   🎨 Server Vite untuk asset
-   ⚡ Queue worker untuk proses background

#### Production

Untuk menjalankan aplikasi dalam mode production:

1. Build aset frontend:

```bash
npm run build
```

2. Optimize Laravel:

```bash
php artisan optimize
```

3. Jalankan server:

```bash
php artisan serve
```

Akses aplikasi:

-   Panel Admin: https://kosme.my.id/admin
-   Aplikasi: https://kosme.my.id

## 💻 Pengembangan

### 🔧 Perintah Umum

-   🧪 Jalankan tes: `composer test`
-   📦 Build aset: `npm run build`
-   🔍 Jalankan linter: `composer lint`
-   ✨ Jalankan formatter: `composer format`

### 📁 Struktur Proyek

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

## 👥 Tim Pengembang

### Backend Developer

-   [Dea Primatama] - [23051204016]

### Frontend Developer

-   [Dinara Aulia Safina] - [23051204009]
-   [Masyita Ika Sahara] - [23051204035]

### UI/UX Designer

-   [Yanti Aisyah] - [23051204019]

## 🆘 Dukungan

Untuk bantuan dan dukungan, silakan:

-   📝 Buka issue di repository
-   📧 Hubungi tim pengembang di [deaprima209@gmail.com]

## 🎉 Selamat Menggunakan Kosme!

Jika Anda menemukan bug atau memiliki saran, jangan ragu untuk membuka issue di repository kami. Terima kasih telah menggunakan KosMe! 🙏
