# Tes Programmer - FastPrint Indonesia

Aplikasi manajemen produk berbasis web yang dibangun sebagai bagian dari tes seleksi Programmer di FastPrint Indonesia. Proyek ini mengimplementasikan integrasi API eksternal, manajemen database MySQL, dan operasi CRUD lengkap menggunakan Framework CodeIgniter 3.

## 🚀 Fitur Utama
- **Integrasi API**: Automasi pengambilan data produk dari API FastPrint menggunakan otentikasi dinamis (Username & MD5 Password berbasis waktu server).
- **Manajemen Data (CRUD)**: Fitur Tambah, Baca, Edit, dan Hapus produk secara *real-time*.
- **Filter Status**: Halaman utama secara default menampilkan produk dengan status "bisa dijual" sesuai instruksi.
- **Validasi Input**: Validasi sisi server untuk memastikan Nama Produk wajib diisi dan Harga wajib berupa angka.
- **UX Safety**: Implementasi konfirmasi JavaScript sebelum penghapusan data untuk mencegah kesalahan user.

## 🛠️ Teknologi yang Digunakan
- **Backend**: PHP 7.4+ dengan Framework CodeIgniter 3.
- **Database**: MySQL (Relational: Tabel Produk, Kategori, dan Status).
- **Frontend**: Bootstrap 4 (Responsive UI).
- **Tools**: cURL untuk konsumsi API.

## 📦 Cara Instalasi & Penggunaan
1. **Clone Repository**:
   ```bash
   git clone [https://github.com/username-anda/repository-anda.git](https://github.com/username-anda/repository-anda.git)