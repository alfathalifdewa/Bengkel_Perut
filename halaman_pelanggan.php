<!DOCTYPE html>
<html>
<head>
  <title>MENU MAKANAN</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
  .cart input[type=submit] {
    width: 40px;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
  </style>
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
  <a href="?page=home"><img style="padding-left: 10%"src="images/logo.png"></a> 
  <div class="navigasi">
      <a href="halaman_pelanggan.php">Home</a>
      <a href="keranjang.php">Keranjang</a>
    </div>
    <div class="profile">
    <center>
      <img src="images/account.png">
      <?php
      $tgl = date("d-m-Y");
      $username = $_SESSION['username'];
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
    <div class="isia">
      <div class="header">
        <h4>Selamat Datang, Customer</h4>
        <?php } ?>
        <hr>
        <div class="tutup">
          <?php 
          $no=1;
          $data = mysqli_query($koneksi,'SELECT * FROM makanan') ;
          while ($d = mysqli_fetch_array($data)) {
          ?>
          <form method="POST">
          <div class="box-produk">
            <center>
              <img src="produk/<?php echo $d['gambar']; ?>" style='width:220px; height:150px; padding:6px;'>
              <input type="hidden" name="id_makanan" value="<?php echo $d['id_makanan'] ?>">
              <p style="color: red;"><?php echo $d['harga']; ?></p>
              <input type="hidden" name="harga" value="<?php echo $d['harga'] ?>">
              <p style="color: black;"><?php echo $d['nama_makanan']; ?><br></p>
              <input type="hidden" name="nama_makanan" value="<?php echo $d['nama_makanan'] ?>">
              <input type="submit" name="submit" value="Add To Cart">
              <a style="float: left; margin: 10px; margin-left: 30px; text-decoration: none; color: blue;" href="detail.php?id_makanan=<?php echo $d['id_makanan']; ?>">Detail</a>
            </center>
          </div>
          </form>
        <?php } ?>
        </div>
    </div>
    <div class="footer">&copyCopyright 2020</div>
<?php 
if (isset($_POST['submit'])) {
  $username = $_SESSION['username'];
  $id = mysql_escape_string($_POST['id_makanan']);
  $nama = mysql_escape_string($_POST['nama_makanan']);
  $harga = mysql_escape_string($_POST['harga']);
  $p=1;
  $sql = mysqli_query($koneksi,"SELECT id_makanan FROM keranjang WHERE id_makanan='$id'");
  $h = mysqli_num_rows($sql);
  if($h == 0){
  $query = mysqli_query($koneksi,"INSERT INTO keranjang(username,id_makanan,nama_makanan,harga,jumlah,subtotal) VALUES ('$username','$id','$nama','$harga','$p',$p*$harga)");
    if ($query) {
      echo "<script>alert('Berhasil Menambahkan')</script>";
    }
    else{
      echo "Error1";
    }
  }
  else{
    $update = mysqli_query($koneksi,"UPDATE keranjang SET jumlah=$p+jumlah,subtotal=harga*jumlah WHERE id_makanan = '$id'");
    if ($update) {
      echo "<script>alert('Berhasil Menambahkan')</script>";
    }
    else{
      echo "Error1";
    }
  }
}
?>
</body>
</html>