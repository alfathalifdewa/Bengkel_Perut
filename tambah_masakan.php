<!DOCTYPE html>
<html>
<head>
  <title>TAMBAH MENU MAKANAN</title>
  <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
  <?php include 'koneksi.php'; session_start(); ?>
  <?php 
  if(!isset($_SESSION['username'])){
    echo "<script>alert('Anda Belum Login!');
    document.location.href = 'index.php';</script>";
  }
  else{
  ?>
  <a href="halaman_admin.php"><img style="padding-left: 10%"src="images/logo.png"></a>  
  <div class="navigasi">
      <a href="halaman_admin.php">Home</a>
      <a href="transaksi.php">Transaksi</a>
      <a href="masakan.php">Masakan</a>
      <a href="pengguna.php">Data Pelanggan</a>
    </div>
    <div class="profile">
    <center>
      <img src="images/account.png">
      <?php
      $tgl = date("d-m-Y");
      $username = $_SESSION['username'];
      $sql = mysqli_query($koneksi,"select * from admin where username='$username'");
      while($data = mysqli_fetch_array($sql)){
      ?>
      <h2><?php echo $data['nama']; ?></h2>
      <h3>Admin</h3>
      <a href="edit_pengguna.php?username=<?php echo $data['username']; ?>" class="btn-edit">Edit</a>
      <a href="logout.php" class="btn-logout">Logout</a>
      <?php } ?>
      <hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl ?></h3>
    </div>
    <div class="isi">
    <form method="POST" enctype="multipart/form-data">
    <h2>Tambah Menu masakan</h2><hr>
      ID Masakan
      <input type="number" name="id_makanan" placeholder="Masukkan ID Masakan" required>
      Nama Masakan
      <input type="text" name="nama_makanan" placeholder="Masukkan Nama Masakan" required>
      Harga
      <input type="number" name="harga" placeholder="Masukkan Harga" required>
      Deskripsi
      <textarea name="deskripsi"></textarea>
      Gambar
      <input type="file" name="gambar" accept="image/*">
      <input type="submit" value="Tambah" name="submit">
      <a href="masakan.php"><< Kembali</a>
    </div>
  <?php } ?>
    <div class="footer">&copyCopyright 2020</div>
    <?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
    $id_makanan = $_POST['id_makanan'];
    $nama_makanan = $_POST['nama_makanan'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $nama_gambar = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './produk/';

    move_uploaded_file($source, $folder.$nama_gambar);
    $save = mysqli_query($koneksi,"INSERT INTO makanan(id_makanan,nama_makanan,harga,deskripsi,gambar) VALUES('$id_makanan','$nama_makanan','$harga','$deskripsi','$nama_gambar')");
    if ($save) {
      echo "<script>alert('Berhasil Menambahkan!'); document.location.href = 'masakan.php';</script>";
    }
    else {
      echo "Data Gagal Disimpan!!";
    }
    }
    ?>
</body>
</html>