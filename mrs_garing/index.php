<?php
include 'config/koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mrs Garing - Beranda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            background: #FFF8C5;
        }

        .header {
            background: #FFD60A;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #D90429;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #D90429;
            font-weight: bold;
        }

        .menu a {
            font-size: 13px;
            color: black;
            text-decoration: none;
            margin-left: 12px;
            font-weight: bold;
        }

        .btn-pesan {
            background: #D90429;
            color: white !important;
            padding: 6px 14px;
            border-radius: 20px;
        }

        .banner {
            background: #D90429;
            color: white;
            text-align: center;
            padding: 30px 15px;
        }

        .banner span {
            color: #FFD60A;
        }

        .btn-banner {
            display: inline-block;
            margin-top: 12px;
            background: #FFD60A;
            color: black;
            padding: 8px 18px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            font-size: 13px;
        }

        .welcome {
            max-width: 700px;
            margin: 25px auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .container {
            max-width: 900px;
            margin: auto;
            padding: 15px;
        }

        .grid-favorit {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            max-width: 600px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 10px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .card img {
            width: 100%;
            height: 110px;
            object-fit: cover;
            border-radius: 8px;
        }

        .harga {
            color: #D90429;
            font-weight: bold;
            font-size: 13px;
            margin-top: 5px;
        }

        .btn-beli {
            background: #D90429;
            color: white;
            padding: 6px;
            display: block;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            margin-top: 6px;
        }

        @media (max-width: 600px) {
            .grid-favorit {
                grid-template-columns: repeat(1, 1fr);
                max-width: 320px;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">
            <img src="assets/images/logo.png" style="width:45px; height:45px; border-radius:50%; background:white;">
            Mrs Garing
        </div>
        <div class="menu">
            <a href="index.php">Beranda</a>
            <a href="pages/tentang.php">Tentang</a>
            <a href="pages/produk.php">Produk</a>
            <a class="btn-pesan" href="pages/produk.php">Pesan</a>
        </div>
    </div>

    <div class="banner">
        <h3>Snack Crispy Favorit <span>Anak Palopo!</span></h3>
        <a class="btn-banner" href="pages/produk.php">Pesan Sekarang</a>
    </div>

    <div class="welcome">
        <h2>Selamat Datang di Mrs Garing</h2>
        <p style="margin-top:8px; font-size:14px;">Snack crispy asli Palopo, dibuat fresh setiap hari tanpa pengawet.</p>
    </div>

    <div class="container">
        <h3 style="text-align:center; margin:15px 0;">Menu Favorit</h3>

        <div class="grid-favorit">
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM produk LIMIT 3");
            while ($d = mysqli_fetch_assoc($query)) {
            ?>
            <div class="card">
                <img src="assets/images/<?php echo $d['foto']; ?>">
                <h4 style="font-size:13px; margin-top:6px;"><?php echo $d['nama']; ?></h4>
                <div class="harga">Rp <?php echo number_format($d['harga']); ?></div>
                <a href="pages/produk.php" class="btn-beli">Beli</a>
            </div>
            <?php } ?>
        </div>
    </div>

</body>
</html>