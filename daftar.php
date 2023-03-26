<!DOCTYPE html>
<html>
<head>
	<title>Halaman Daftar</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'koneksi.php'; session_start(); ?>
	<a href="?page=home"><img style="padding-left: 10%"src="images/logo.png"></a>	
	<div class="navigasi">
  		<a href="index.php">Home</a>
  	</div>
  	<div class="daftar">
    <form method="POST" action="simpandaftar.php">
    <h2>Tambah Pengguna</h2><hr>
      Username
      <input type="text" name="username" placeholder="Masukkan Username" required>
      Nama Pengguna
      <input type="text" name="nama" placeholder="Masukkan Nama Pengguna" required>
      Password
      <input type="password" name="password" placeholder="Masukkan Password" required>
      Jenis Kelamin<br>
      <input type="radio" name="jk" value="Laki-laki" style="margin: 20px 8px 20px 0px; ">Laki-laki<br>
      <input type="radio" name="jk" value="Perempuan" style="margin: 3px 8px 20px 0px; ">Perempuan<br>
      Email
      <input type="email" name="email" placeholder="example@gmail.com">
      Alamat
      <textarea name="alamat"></textarea>
      No Hp
      <input type="number" name="no_hp" placeholder="08123456789">
      <input type="submit" value="Tambah" name="submit">
      <a href="index.php"><< Kembali</a>
    </form>
  	</div>
</body>
</html>