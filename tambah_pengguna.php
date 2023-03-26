<!DOCTYPE html>
<html>
<head>
  <title>Halaman Admin</title>
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
    <form method="POST">
    <h2>Tambah Pengguna</h2><hr>
      Username
      <input type="text" name="username" placeholder="Masukkan Username" required>
      Nama Pengguna
      <input type="text" name="nama_user" placeholder="Masukkan Nama Pengguna" required>
      Password
      <input type="password" name="password" placeholder="Masukkan Password" required>
      Jenis Kelamin<br>
      <input type="radio" name="jk" value="Laki-laki" style="margin: 20px 8px 20px 0px; ">Laki-laki<br>
      <input type="radio" name="jk" value="Perempuan" style="margin: 3px 8px 20px 0px; ">Perempuan<br>
      Email
      <input type="email" name="email" placeholder="example@gmail.com">
      <input type="submit" value="Tambah" name="submit">
      <a href="pengguna.php"><< Kembali</a>
    </div>
  <?php } ?>
    <div class="footer">&copyCopyright 2020</div>
    <?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $nama_user = $_POST['nama_user'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $save = mysqli_query($koneksi,"INSERT INTO user(username,nama_user,password,level) VALUES('$username','$nama_user','$password','$level')");
    if ($save) {
      echo "<script>alert('Daftar Berhasil!'); document.location.href = 'pengguna.php';</script>";
    }
    else {
      echo "Data Gagal Disimpan!!";
    }
    }
    ?>
</body>
</html>