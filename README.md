# Point of Sale (POS) Frontend — Laravel (Web)

Ini adalah proyek frontend untuk aplikasi Point of Sale (POS) berbasis Laravel. Proyek ini mengonsumsi REST API dari backend yang tersedia di: [https://github.com/putra28/Ujikom-API](https://github.com/putra28/Ujikom-API).

![Screenshot](public/images/screenshot.png)

---

## 🚀 Fitur Aplikasi

### 👨‍💼 Admin

#### Dashboard
- Menampilkan tanggal realtime, ringkasan penjualan dan pendapatan bulanan, serta total produk
- Menampilkan informasi pengguna
- Menampilkan riwayat transaksi terakhir (semua pengguna)

#### Master Data
- Produk: CRUD produk dan detail
- Kategori: CRUD kategori
- Petugas/Karyawan: CRUD data petugas
- Supplier: CRUD supplier
- Member: CRUD member

#### Manajemen Toko
- Data Pembelian:
  - Melihat data dan detail pembelian
  - Filter berdasarkan periode
  - Tambah pembelian produk dari supplier
  - Ubah status pembelian
  - Hapus data pembelian
- Data Pengeluaran:
  - Melihat dan filter data pengeluaran
  - Tambah dan ubah data pengeluaran
  - Hapus data pengeluaran tidak valid

#### Karyawan
- Shift: CRUD jadwal shift karyawan
- Kehadiran: Lihat dan hapus data absensi
- Izin: CRUD pengajuan izin dan ubah statusnya

#### Data Transaksi
- Riwayat transaksi per bulan dan detail transaksi

#### Laporan
- Stok: Riwayat perubahan stok produk
- Penjualan:
  - Ringkasan penjualan tahunan
  - Produk terlaris
  - Grafik penjualan bulanan
  - Karyawan dengan penjualan terbanyak
- Pembelian:
  - Ringkasan pembelian tahunan
  - Supplier aktif
  - Produk paling sering dibeli
  - Grafik pembelian bulanan
- Pengeluaran:
  - Ringkasan keuangan tahunan (pendapatan, HPP, laba bersih)
  - Perbandingan grafik pendapatan vs pengeluaran

---

### 🧾 Kasir

#### Dashboard
- Ringkasan penjualan dan pendapatan bulanan
- Transaksi terakhir (khusus kasir login)

#### Transaksi
- Penjualan produk

#### Member
- Tambah dan lihat data member beserta detail

#### Produk
- Lihat semua produk dan detailnya

#### Riwayat Transaksi
- Riwayat transaksi per kasir dan berdasarkan periode

#### Pengajuan Izin
- Ajukan, lihat, dan batalkan pengajuan izin absensi

---

## 📦 Cara Install

### 1. Clone Repositori Ini

```bash
git clone https://github.com/putra28/Ujikom-POS
cd Ujikom-POS
```

### 2. Install & Jalankan API Backend
Proyek ini membutuhkan backend API yang tersedia di:
👉 https://github.com/putra28/Ujikom-API

Silakan ikuti petunjuk instalasi di sana terlebih dahulu.

Pastikan backend ini berjalan di http://localhost:1111 (atau sesuaikan dengan .env frontend).

### 3. Install Laravel Frontend (Versi Web)
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## 📁 Struktur Folder
```bash
/ujikom-pos
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── .env.example
├── artisan
└── composer.json
```

## 📄 Catatan
Akun Login:
```bash
Username:081210295730
Password:admin

Username:08123456789
Password:kasir
```
- Proyek ini dikembangkan untuk keperluan internal/UKK dan tidak untuk produksi langsung.
- Silakan modifikasi config/api.php dengan URL API yang kamu jalankan secara lokal.
