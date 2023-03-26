<!DOCTYPE html>
<html>
<head>
  <title>CHECKOUT</title>
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
    <form method="POST" action="aksi_pesan.php">
    <?php
      function acak($panjang){
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $string = '';
        for($i = 0; $i< $panjang ; $i++){
          $pos = rand(0,strlen($char)-1);
          $string .= $char{$pos};
        }
        return $string;
      }
    $data = mysqli_query($koneksi,"select * from customer where username='$username'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
      <input type="hidden" name="id_beli" value="<?php echo acak(11); ?>">
      Nama Pembeli
      <input type="text" name="nama" placeholder="Masukkan Nama Pengguna" value="<?php echo $d['nama'];?>" required>
      No Hp
      <input type="number" name="no_hp" placeholder="+628123456789" value="<?php echo $d['no_hp'] ?>" required>
      Jasa Pengiriman
      <select name="jasa" required>
        <option selected disabled>--Pilih Pengiriman--</option>
        <option value="BPEXPRESS">BPEXPRESS</option>
        <option value="BPREG">BPREG</option>
        <option value="BPYES">BPYES</option>
      </select>
      Alamat
      <textarea name="alamat"><?php echo $d['alamat'];?></textarea>
    <?php }
    $ongkir = 6000;
    $data = mysqli_query($koneksi,"SELECT SUM(subtotal) FROM keranjang");
    while ($d = mysqli_fetch_array($data)) {
      $total_pesan = $d['SUM(subtotal)'];
      $total_bayar = $ongkir+$total_pesan;
    ?>
      <input type="hidden" name="total" value="<?php echo $total_bayar; ?>">
      <p class="ket">Total Pesanan : Rp <?php echo $total_pesan; ?></p>
      <p class="ket" style="float: left;">Ongkos Kirim : Rp <?php echo $ongkir ?></p>
      <p class="ket" style="float: right; padding-right: 40px;">Total Bayar : <?php echo $total_bayar; ?></p>
    <?php } ?>
      <center>
      <table>
        <tr>
          <th>No</th>
          <th>Nama Makanan</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
        </tr>
        <?php 
        $no=1;
        $data = mysqli_query($koneksi,'SELECT * FROM keranjang');
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $d['nama_makanan']; ?></td>
          <td><?php echo $d['harga']; ?></td>
          <td><?php echo $d['jumlah']; ?></td>
          <td><?php echo $d['subtotal']; ?></td>
        </tr>
      <?php } ?>
      </table>  
      </center>
      <br>
      <input type="submit" style="float: right; width: 115px;" value="Buat Pesanan">
    </form>
    </div>
    <div class="footer">&copyCopyright 2020</div>
  <?php } ?>
</body>
</html>