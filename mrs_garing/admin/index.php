<?php
include '../config/koneksi.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$jml_produk = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:Arial; background:#FFF8C5; display:flex; }
        .sidebar { width:200px; background:#D90429; min-height:100vh; padding:15px; color:white; }
        .sidebar h3 { margin-bottom:20px; }
        .sidebar a { display:block; color:white; text-decoration:none; padding:8px; font-size:13px; border-radius:6px; margin-bottom:5px; }
        .sidebar a.active { background:#FFD60A; color:black; }
        .content { flex:1; padding:20px; }
        .cards { display:grid; grid-template-columns:repeat(2,1fr); gap:15px; max-width:500px; }
        .card { background:white; padding:20px; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.1); text-align:center; }
        .card h2 { color:#D90429; font-size:28px; }
        .card p { font-size:13px; margin-top:5px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>Mrs Garing</h3>
        <a class="active" href="index.php">Dashboard</a>
        <a href="produk.php">Kelola Produk</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content">
        <h3 style="margin-bottom:15px;">Dashboard</h3>
        <div class="cards">
            <div class="card">
                <h2><?php echo $jml_produk; ?></h2>
                <p>Total Produk</p>
            </div>
            <div class="card">
                <h2>OK</h2>
                <p>Status Toko Aktif</p>
            </div>
        </div>
        <div style="background:white; padding:15px; border-radius:12px; margin-top:20px; box-shadow:0 2px 8px rgba(0,0,0,0.1); max-width:500px;">
            <p style="font-size:13px;">Selamat datang admin <b><?php echo $_SESSION['admin']; ?></b>, silakan kelola produk di menu Kelola Produk.</p>
        </div>
    </div>
</body>
</html>