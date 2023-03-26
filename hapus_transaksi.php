<?php
include 'koneksi.php';
$id_beli = $_GET['id_beli'];
mysqli_query($koneksi,"DELETE FROM laporan WHERE id_beli='$id_beli'");
mysqli_query($koneksi,"DELETE FROM pesanan WHERE id_beli='$id_beli'");
header("location:transaksi.php");
?>