<!DOCTYPE html>
<html>
<head>
  <title>Checkout Succes</title>
  <link rel="stylesheet" type="text/css" href="style.css">
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
  <a href="halaman_pelanggan.php"><img style="padding-left: 10%"src="images/logo.png"></a>  
  <div class="navigasi">
      <a href="halaman_pelanggan.php">Home</a>
      <a href="keranjang.php">Keranjang</a>
    </div>
    <div class="profile">
    <center>
      <img src="images/account.png">
      <?php
      $username = $_SESSION['username'];
      $tgl = date("d-m-Y");
      $sql = mysqli_query($koneksi,"select * from customer where username='$username'");
      while($data = mysqli_fetch_array($sql)){
      ?>
      <h2><?php echo $data['nama']; ?></h2>
      <h3>Customer</h3>
      <a href="edit_user.php?username=<?php echo $data['username']; ?>" class="btn-edit">Edit</a>
      <a href="logout.php" class="btn-logout">Logout</a>
    <?php } ?>
      <hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl; ?></h3>
    </div>
    <div class="isi">
    <?php
    $id = $_GET['id_beli'];
    $data = mysqli_query($koneksi,"SELECT * FROM laporan WHERE id_beli = '$id'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
    <table class="succes" border="0">
    <tr>
      <td style="text-align: left;">
      <h4 style="color: grey;">Id Pembelian</h4>
      <h2><?php echo $d['id_beli'] ?></h2>
      <h4 style="color: grey;">Tanggal Pembelian</h4>
      <h2><?php echo $d['tgl_beli'] ?></h2>
      <h4 style="color: grey;">Nama Pembeli</h4>
      <h2><?php echo $d['nama'] ?></h2>
    </td>
    <td style="text-align: left;">
      <h4 style="color: grey;">No Hp</h4>
      <h2><?php echo $d['no_hp'] ?></h2>
      <h4 style="color: grey;">Alamat Pembeli</h4>
      <h2><?php echo $d['alamat'] ?></h2>
    </td>
    </tr>
    </table>
    <?php } ?>
      <center>
      <table class="record">
        <tr>
          <th>No</th>
          <th>Nama Makanan</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
        </tr>
        <?php 
        $no=1;
        $id = $_GET['id_beli'];
        $data = mysqli_query($koneksi,"SELECT * FROM pesanan RIGHT JOIN makanan ON pesanan.id_makanan = makanan.id_makanan WHERE id_beli = '$id'") ;
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $d['nama_makanan']; ?></td>
          <td><?php echo $d['harga']; ?></td>
          <td><?php echo $d['jumlah']; ?></td>
          <td><?php echo $d['subtotal'] ?></td>
        </tr>
      <?php } ?>
      </table>
      </center> 
      <?php
    $ongkir = 6000;
    $id = $_GET['id_beli'];
    $data = mysqli_query($koneksi,"SELECT * FROM laporan WHERE id_beli = '$id'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
    <h4 align="right">Total Bayar : </h4>
    <h2 align="right"><?php echo $d['total_pesanan']; ?></h2>
    <?php } ?>
      <br>
      <a href="halaman_pelanggan.php">Back To Home</a>
    </div>
    <div class="footer">&copyCopyright 2020</div>
  <?php } ?>
</body>
</html>