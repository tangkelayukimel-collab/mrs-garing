<?php
include '../config/koneksi.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM produk WHERE id='$id'");
    header("Location: produk.php");
    exit;
}

$data = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id DESC");
$cek = mysqli_num_rows($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:Arial; background:#FFF8C5; display:flex; }
        .sidebar { width:200px; background:#D90429; min-height:100vh; padding:15px; color:white; }
        .sidebar a { display:block; color:white; text-decoration:none; padding:8px; font-size:13px; border-radius:6px; margin-bottom:5px; }
        .sidebar a.active { background:#FFD60A; color:black; }
        .content { flex:1; padding:20px; }
        .box { background:white; padding:15px; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.1); }
        table { width:100%; border-collapse:collapse; margin-top:12px; font-size:13px; }
        th, td { border:1px solid #ddd; padding:8px; text-align:center; }
        th { background:#FFD60A; }
        .btn-tambah { display:inline-block; background:#D90429; color:white; padding:7px 14px; border-radius:6px; text-decoration:none; font-size:12px; font-weight:bold; }
        .btn-hapus { background:#ffe0e0; color:#D90429; padding:4px 8px; border-radius:4px; text-decoration:none; font-size:11px; border:1px solid #ffb3b3; }
        img.produk { width:50px; height:50px; object-fit:cover; border-radius:6px; }
        .kosong { text-align:center; padding:20px; color:#999; font-size:13px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>Admin</h3>
        <a href="index.php">Dashboard</a>
        <a class="active" href="produk.php">Kelola Produk</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content">
        <div class="box">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <h3>Daftar Produk (<?php echo $cek; ?>)</h3>
                <a href="tambah.php" class="btn-tambah">+ Tambah</a>
            </div>

            <?php if ($cek == 0) { ?>
                <div class="kosong">
                    Belum ada produk di database.<br>
                    Klik + Tambah untuk menambah produk baru.<br><br>
                    Cek tabel: <b>produk</b> di phpMyAdmin harus ada kolom id, nama, harga, foto
                </div>
            <?php } else { ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
                <?php $no=1; while ($d=mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><img class="produk" src="../assets/images/<?php echo $d['foto']; ?>" onerror="this.src='../assets/images/logo.png'"></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td>Rp <?php echo number_format($d['harga']); ?></td>
                    <td><a class="btn-hapus" href="?hapus=<?php echo $d['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a></td>
                </tr>
                <?php } ?>
            </table>
            <?php } ?>
        </div>
    </div>
</body>
</html>