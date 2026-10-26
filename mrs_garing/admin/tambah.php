<?php
include '../config/koneksi.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $foto  = $_POST['foto']; // isi nama file, contoh: cheese.jpg

    $query = "INSERT INTO produk (nama, harga, foto) VALUES ('$nama', '$harga', '$foto')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: produk.php");
        exit;
    } else {
        $error = "Gagal tambah: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:Arial; background:#FFF8C5; display:flex; }
        .sidebar { width:200px; background:#D90429; min-height:100vh; padding:15px; color:white; }
        .sidebar a { display:block; color:white; text-decoration:none; padding:8px; font-size:13px; border-radius:6px; margin-bottom:5px; }
        .sidebar a:hover { background:#b00321; }
        .content { flex:1; padding:20px; }
        .box { background:white; padding:15px; border-radius:12px; max-width:400px; box-shadow:0 2px 8px rgba(0,0,0,0.1); }
        .box h3 { color:#D90429; margin-bottom:10px; }
        input { width:100%; padding:8px; margin-top:8px; border:1px solid #ccc; border-radius:6px; font-size:13px; }
        .btn-simpan { width:100%; background:#D90429; color:white; border:none; padding:9px; margin-top:12px; border-radius:6px; font-weight:bold; cursor:pointer; }
        .error { background:#ffe0e0; color:#D90429; padding:6px; border-radius:6px; font-size:12px; margin-top:10px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>Admin</h3>
        <a href="index.php">Dashboard</a>
        <a href="produk.php">Kelola Produk</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content">
        <div class="box">
            <h3>Tambah Produk</h3>
            <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
            <form method="POST">
                <input type="text" name="nama" placeholder="Nama produk, contoh: Cheese Prawn" required>
                <input type="number" name="harga" placeholder="Harga, contoh: 15000" required>
                <input type="text" name="foto" placeholder="Nama foto, contoh: logo.png" value="logo.png" required>
                <button type="submit" name="simpan" class="btn-simpan">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>