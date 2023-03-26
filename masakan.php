<!DOCTYPE html>
<html>
<head>
	<title>MENU MAKANAN</title>
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
      <h2 align="center">Menu Makanan</h2>
      <h5><a href="tambah_masakan.php">+Tambah Menu Masakan</a></h5>
        <?php 
        $no=1;
        $data = mysqli_query($koneksi,'SELECT * FROM makanan') ;
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <div class="box-produk">
          <center>
          <img src="produk/<?php echo $d['gambar']; ?>" style='width:220px; height:150px; padding:6px;'>
          <p style="color: red;"><?php echo $d['harga']; ?></p>
          <p><?php echo $d['nama_makanan']; ?><br></p>
          <a class="btn-edit" href="edit_masakan.php?id_makanan=<?php echo $d['id_makanan']; ?>">Edit</a>
          <a class="btn-logout" href="hapus_masakan.php?id_makanan=<?php echo $d['id_makanan']; ?>">Hapus</a>
          </center>
        </div>
      <?php } ?>
  	</div>
  	<div class="footer">&copyCopyright 2020</div>
  <?php } ?>
</body>
</html>