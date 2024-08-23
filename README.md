Perancangan Sistem
Komponen Utama:
Landing Page: Menampilkan daftar produk dengan tombol untuk memesan.
Dashboard Admin: Mengelola produk, termasuk menambah, mengedit, dan menghapus produk serta memantau stok.
Pesanan: Memungkinkan pengguna untuk memesan produk, yang secara otomatis mengurangi stok.
Arsitektur:
Frontend: Menggunakan Blade templating untuk rendering halaman.
Backend: Mengandalkan Laravel untuk pengelolaan data dan logika bisnis.
Database: Model untuk produk dan kategori, dengan relasi yang jelas untuk pengelolaan data yang efisien.
Fitur Utama:
Viewing Products: Pengguna dapat melihat semua produk dengan informasi lengkap.
Order Management: Pengguna dapat memesan produk, dan sistem akan mengurangi stok secara otomatis.
Admin Dashboard: Admin dapat mengelola produk dan melihat status stok.
Teknologi yang Digunakan:
Laravel: Framework PHP yang efisien untuk pengembangan aplikasi.
Blade: Templating engine untuk membangun antarmuka pengguna.
Bootstrap: Untuk styling dan responsivitas antarmuka.
Diagram Alur
Pengguna mengunjungi Landing Page.
Melihat daftar produk dan memilih untuk memesan.
Sistem memproses pesanan dan mengurangi stok produk.
Admin mengelola produk melalui Dashboard.
