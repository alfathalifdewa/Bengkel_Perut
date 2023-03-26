<!DOCTYPE html>
<html>
<head>
	<title>HALAMAN ADMIN</title>
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
      <h3 style="color: green;">Tanggal : <?php echo $tgl ?></h3>
  	</div>
  	<div class="isi">
  		<div class="header">
  			<h4>Selamat Datang,Admin</h4>
        <hr>
        <p style="margin-top: 120px;">Tampilkan</p>
        <table style="margin-top: 30px;">
          <tr>
            <td style="background-color: black; border-radius: 40px;"><a style="color: white; " href="transaksi.php">Data Transaksi</a></td>
            <td style="background-color: #ded5e6; border-radius: 40px; "><a style="color: black;" href="masakan.php">Menu Masakan</a></td>
            <td style="background-color: #f4f0f0; border-radius: 40px;"><a style="color: black;" href="pengguna.php">Data Pelanggan</a></td>
          </tr>
        </table>
  		</div>
  	</div>
  	<div class="footer">&copyCopyright 2020</div>
  <?php } ?>
</body>
</html>