<!DOCTYPE html>
<html>
<head>
	<title>PENGGUNA</title>
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
      <center>
        <h2>Data Pembeli</h2>
      <table>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Nama Pengguna</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>No Hp</th>
          <th>Opsi</th>
        </tr>
        <?php 
        $no=1;
        $data = mysqli_query($koneksi,'SELECT * FROM customer') ;
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $d['username']; ?></td>
          <td><?php echo $d['nama']; ?></td>
          <td><?php echo $d['jk']; ?></td>
          <td><?php echo $d['alamat']; ?></td>
          <td><?php echo $d['no_hp']; ?></td>
          <td>
            <a href="hapus_pengguna.php?username=<?php echo $d['username']; ?>"><img src="images/delete.png"></a></td>
        </tr>
      <?php } ?>
      </table>  
      </center>
  	</div>
  	<div class="footer">&copyCopyright 2020</div>
  <?php } ?>
</body>
</html>