# Mrs Garing - Website Pemesanan Camilan Khas Palopo

**Mata Kuliah:** Project Mandiri - Tugas 6: Project Directory Architecture
**Nama:** Imel Tangkelayuk
**NIM:** 24404148
**Mitra:** Mrs Garing Palopo

### Deskripsi Proyek
Website pemesanan Garing untuk UMKM Mrs Garing Palopo untuk memudahkan pelanggan memesan secara online dan memudahkan admin mengelola produk & pesanan.

### Tech Stack
- **Backend:** PHP Native 8.2
- **Database:** MySQL (MariaDB)
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript
- **Server Lokal:** XAMPP
- **Editor:** Visual Studio Code

### Struktur Direktori
```
mrs_garing/
├── admin/
├── assets/
│   ├── css/
│   ├── js/
│   └── img/
├── config/
│   └── koneksi.php
├── database/
│   └── mrs_garing.sql
├── includes/
│   ├── header.php
│   ├── navbar.php
│   └── footer.php
├── index.php
└── README.md
 ```
### Cara Instalasi di Lokal
1. Clone repo ini atau extract ZIP ke `C:/xampp/htdocs/`
2. Buka XAMPP, Start Apache & MySQL
3. Buka `http://localhost/phpmyadmin`
4. Buat database `mrs_garing` dan Import file `database/mrs_garing.sql`
5. Buka `http://localhost/mrs_garing/` di browser
6. Login Admin: `http://localhost/mrs_garing/admin/login.php`
   - User: admin
   - Pass: admin123

### Link Pengumpulan
- GitHub: https://github.com/tangkelayukimel-collab/mrs-garing
- Google Drive ZIP: https://drive.google.com/xxx
