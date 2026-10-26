<?php include '../config/koneksi.php'; ?>
<html>
<head><title>Tentang Kami</title></head>
<style>
body{margin:0;font-family:Arial;background:#FFF8C5}
.header{background:#FFD60A;padding:10px;display:flex;justify-content:space-between;border-bottom:3px solid #D90429}
.menu a{font-size:12px;color:black;text-decoration:none;margin-left:7px}
.box{background:white;padding:15px;max-width:600px;margin:15px auto;border-radius:10px}
</style>
<body>

<div class="header">
  <div style="display:flex;align-items:center;gap:5px;color:#D90429;font-weight:bold">
    <img src="../assets/images/logo.png" style="width:60px;height:60px;border-radius:50%;background:white">
    Mrs Garing
  </div>
  <div class="menu">
    <a href="../index.php">Beranda</a>
    <a href="tentang.php">Tentang Kami</a>
    <a href="produk.php">Produk</a>
  </div>
</div>

<div class="box">
<h3 style="text-align:center;color:#D90429">Tentang Mrs Garing</h3>
<div style="text-align:center">
<img src="../assets/images/logo.png" style="width:85px;height:85px;border-radius:50%;border:3px solid #FFD60A">
</div>
<p style="font-size:12px;text-align:justify">
<b>Mrs Garing</b> adalah usaha snack crispy asli <b>Palopo</b> yang berdiri sejak 2022. Awalnya jualan kecil-kecilan dari dapur rumah, sekarang sudah banyak pelanggan di Palopo. 
</p>
<p style="font-size:12px;text-align:justify">
Nama Garing itu dari bahasa bugis artinya renyah. Kita buat tanpa pengawet, digoreng fresh tiap hari jadi masih anget pas diantar.
</p>
<p style="font-size:12px">
Visi: Jadi snack favorit anak muda Palopo<br>
Misi: Enak, murah, pelayanan cepat
</p>
<p style="font-size:11px;color:gray;text-align:center;margin-top:15px">Alamat: Jl. Andi Kambo No.10 Palopo | WA: 0822-xxxx-xxxx</p>
<center><a href="produk.php" style="background:#D90429;color:white;padding:7px 15px;border-radius:15px;text-decoration:none;font-size:12px">Lihat Produk</a></center>
</div>

</body>
</html>