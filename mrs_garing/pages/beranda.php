<?php
// koneksi database
include '../config/koneksi.php';
session_start();

// proses beli
if(isset($_GET['beli'])){
  $id_produk = $_GET['beli'];
  if(isset($_SESSION['cart'][$id_produk])){
    $_SESSION['cart'][$id_produk]++;
  } else {
    $_SESSION['cart'][$id_produk] = 1;
  }
  header("location:produk.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Beranda - Mrs Garing</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

  <header>
    <div class="logo">Mrs Garing</div>
    <nav>
      <a href="beranda.php">Beranda</a>
      <a href="produk.php">Produk</a>
      <a href="tentang.php">Tentang</a>
    </nav>
  </header>

  <div class="hero">
    <h3>Snack <span>Mrs Garing</span></h3>
    <p style="font-size:11px; margin-top:5px;">Crispy Outside, Juicy Inside</p>
  </div>

  <div class="container">
    <h4>Produk Terlaris</h4>

    <div class="produk-wrapper">
      <?php
      // ambil 6 produk saja
      $query = mysqli_query($koneksi, "select * from produk limit 6");
      while($row = mysqli_fetch_array($query)){
      ?>
        <div class="card">
          <img src="../assets/images/<?php echo $row['foto']; ?>">
          <h4><?php echo $row['nama']; ?></h4>
          <div class="harga">Rp <?php echo $row['harga']/1000; ?>K</div>
          <a class="btn-beli" href="?beli=<?php echo $row['id']; ?>">Beli</a>
        </div>
      <?php } ?>
    </div>

  </div>

</body>
</html>