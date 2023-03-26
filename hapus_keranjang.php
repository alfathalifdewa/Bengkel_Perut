<?php
include 'koneksi.php';
$id_makanan = $_GET['id_makanan'];
mysqli_query($koneksi,"DELETE FROM keranjang WHERE id_makanan='$id_makanan'");
header("location:keranjang.php");
?>