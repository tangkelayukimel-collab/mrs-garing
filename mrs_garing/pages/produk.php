<?php
include '../config/koneksi.php';
session_start();

// Tambah keranjang
if (isset($_POST['pesan'])) {
    $id    = $_POST['id'];
    $bubuk = $_POST['bubuk'];

    if ($bubuk == "") {
        echo "<script>alert('Pilih bubuk dulu!'); window.location='produk.php';</script>";
        exit;
    }

    $key = $id . "_" . $bubuk;

    if (isset($_SESSION['cart'][$key])) {
        $_SESSION['cart'][$key]['qty']++;
    } else {
        $_SESSION['cart'][$key] = [
            'id'    => $id,
            'bubuk' => $bubuk,
            'qty'   => 1
        ];
    }

    header("Location: produk.php");
    exit;
}

// Tombol +
if (isset($_GET['plus'])) {
    $_SESSION['cart'][$_GET['plus']]['qty']++;
    header("Location: produk.php");
    exit;
}

// Tombol -
if (isset($_GET['minus'])) {
    $key = $_GET['minus'];

    if ($_SESSION['cart'][$key]['qty'] > 1) {
        $_SESSION['cart'][$key]['qty']--;
    } else {
        unset($_SESSION['cart'][$key]);
    }

    header("Location: produk.php");
    exit;
}

// Tombol hapus
if (isset($_GET['hapus'])) {
    unset($_SESSION['cart'][$_GET['hapus']]);
    header("Location: produk.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Produk - Mrs Garing</title>
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

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 15px;
        }

        .grid-produk {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
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

        .card h4 {
            font-size: 13px;
            margin: 8px 0;
        }

        .harga {
            color: #D90429;
            font-weight: bold;
            font-size: 13px;
        }

        select,
        textarea {
            width: 100%;
            padding: 6px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 12px;
        }

        .btn-beli {
            background: #D90429;
            color: white;
            border: none;
            width: 100%;
            padding: 8px;
            margin-top: 8px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .keranjang-card {
            background: white;
            max-width: 580px;
            margin: 30px auto;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .keranjang-header {
            background: #D90429;
            color: white;
            padding: 12px 16px;
            display: flex;
            justify-content: space-between;
            font-weight: bold;
        }

        .keranjang-body {
            padding: 10px 16px;
        }

        .cart-item {
            display: flex;
            gap: 12px;
            padding: 14px 0;
            border-bottom: 1px dashed #ddd;
        }

        .cart-item img {
            width: 55px;
            height: 55px;
            border-radius: 8px;
        }

        .cart-info {
            flex: 1;
        }

        .cart-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 8px;
        }

        .qty-control {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #FFF8C5;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .qty-control a {
            background: #FFD60A;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .btn-hapus {
            background: #ffe0e0;
            color: #D90429;
            font-size: 11px;
            padding: 6px 14px;
            border-radius: 20px;
            text-decoration: none;
            border: 1px solid #ffb3b3;
            margin-left: 30px;
        }

        .keranjang-footer {
            background: #FFF8C5;
            padding: 14px 16px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .btn-wa {
            background: #25D366;
            color: white;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
        }

        @media (max-width: 600px) {
            .grid-produk {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">
            <img src="../assets/images/logo.png" style="width:45px; height:45px; border-radius:50%; background:white;">
            Mrs Garing
        </div>
        <div class="menu">
            <a href="../index.php">Beranda</a>
            <a href="tentang.php">Tentang</a>
            <a href="produk.php">Produk</a>
            <a class="btn-pesan" href="produk.php">Pesan</a>
        </div>
    </div>

    <div class="container">
        <h3 style="text-align:center; margin:15px 0;">Semua Produk</h3>

        <div class="grid-produk">
            <?php
            $sql = mysqli_query($koneksi, "SELECT * FROM produk");
            while ($d = mysqli_fetch_assoc($sql)) {
            ?>
            <div class="card">
                <img src="../assets/images/<?php echo $d['foto']; ?>">
                <h4><?php echo $d['nama']; ?></h4>
                <div class="harga">Rp <?php echo number_format($d['harga']); ?></div>

                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">

                    <select name="bubuk" required>
                        <option value="" disabled selected>Pilih Bubuk</option>
                        <option value="Keju">Keju</option>
                        <option value="Balado">Balado</option>
                        <option value="Jagung Bakar">Jagung Bakar</option>
                        <option value="Barbeque">Barbeque</option>
                        <option value="Original">Original</option>
                    </select>

                    <button type="submit" name="pesan" class="btn-beli">Tambah</button>
                </form>
            </div>
            <?php } ?>
        </div>

        <div class="keranjang-card">
            <div class="keranjang-header">
                <span>Keranjang Belanja</span>
                <span>🛒 <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?> Item</span>
            </div>

            <div class="keranjang-body">
                <?php
                $total = 0;
                $pesan_produk = "";

                if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $val) {
                        $ambil = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM produk WHERE id='".$val['id']."'"));
                        $sub = $ambil['harga'] * $val['qty'];
                        $total += $sub;
                        $pesan_produk .= $ambil['nama'] . " bubuk tabur " . $val['bubuk'] . ", ";
                ?>
                <div class="cart-item">
                    <img src="../assets/images/<?php echo $ambil['foto']; ?>">
                    <div class="cart-info">
                        <b><?php echo $ambil['nama']; ?></b><br>
                        <small>Bubuk : <?php echo $val['bubuk']; ?></small>
                        <div style="font-size:12px; color:#D90429; font-weight:bold; margin-top:3px;">
                            Rp <?php echo number_format($sub); ?>
                        </div>
                        <div class="cart-actions">
                            <div class="qty-control">
                                <a href="?minus=<?php echo $key; ?>">-</a>
                                <span><?php echo $val['qty']; ?></span>
                                <a href="?plus=<?php echo $key; ?>">+</a>
                            </div>
                            <a class="btn-hapus" href="?hapus=<?php echo $key; ?>">Hapus</a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } else {
                    echo "<p style='text-align:center; padding:20px; color:#999;'>Keranjang masih kosong</p>";
                }
                ?>
            </div>

            <?php if (!empty($_SESSION['cart'])) { ?>
            <div class="keranjang-footer">
                <textarea id="catatan" rows="2" placeholder="Catatan : jangan disatukan bubuknya"></textarea>

                <div class="total-row">
                    <span>Total :</span>
                    <span>Rp <?php echo number_format($total); ?></span>
                </div>

                <button class="btn-wa" onclick="kirimWA()">Pesan via WhatsApp</button>
            </div>
            <?php } ?>
        </div>
    </div>

<script>
function kirimWA() {
    let catatan = document.getElementById('catatan').value;
    if (catatan == "") {
        catatan = "-";
    }

    let produk = "<?php echo $pesan_produk; ?>";
    let total  = "<?php echo number_format($total); ?>";
    let pesan  = "Hallo Mrs Garing saya pesan " + produk + " dengan catatan " + catatan + " trus totalnya " + total;

    let url = "https://wa.me/6281222527522?text=" + encodeURIComponent(pesan);
    window.open(url, "_blank");
}
</script>

</body>
</html>