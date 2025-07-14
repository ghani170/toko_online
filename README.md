# 🛍️ Toko Online Laravel

Ini adalah aplikasi web sederhana untuk **toko online** menggunakan **Laravel**.
Fitur utama mencakup login, dashboard admin, manajemen produk, dan tampilan toko untuk pengguna umum.

---

## 🔧 Fitur

* **Autentikasi**: Login & Register
* **Dashboard Admin**:

  * Tambah Produk
  * Edit Produk
  * Hapus Produk
  * Kelola Pesanan
  * Detail Pesanan
  * Total Penghasilan
  * Jumlah Pesanan
* **Toko Online**:

  * Tampilkan daftar produk
  * Gambar, harga, dan deskripsi
  * Fitur Keranjang
* **Proteksi Halaman**:

  * Harus login untuk mengakses dashboard dan toko
* **Upload Gambar Produk**

---

## 🛠️ Instalasi

### 1. Clone repository

```bash
git clone https://github.com/
cd toko-online
```

### 2. Install dependency

```bash
composer install
```

### 3. Copy .env dan generate key

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Buat database dan atur .env

Contoh pengaturan:

```
DB_DATABASE=toko_online
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migrasi database

```bash
php artisan migrate
```

### 6. Jalankan server

```bash
php artisan serve
```

Akses di browser: `http://127.0.0.1:8000`

---

## 📂 Struktur Folder Penting

| Folder                  | Deskripsi                    |
| ----------------------- | ---------------------------- |
| `app/Http/Controllers`  | Controller aplikasi          |
| `resources/views/admin` | Halaman dashboard admin      |
| `resources/views/toko`  | Halaman toko online pengguna |
| `routes/web.php`        | Routing utama aplikasi       |

---

## 🙋‍♂️ Admin

Untuk menjadikan user sebagai admin:

1. Register user terlebih dahulu
2. Ubah field `role` pada tabel `users` menjadi `admin`

---

## 📄 Catatan

*Belum tersedia payment gateway

---

## 🔧 Lisensi

Project ini bebas digunakan untuk pembelajaran atau pengembangan lebih lanjut.
