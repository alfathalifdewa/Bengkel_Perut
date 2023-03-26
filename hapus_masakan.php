<?php
include 'koneksi.php';
$id_makanan = $_GET['id_makanan'];
mysqli_query($koneksi,"DELETE FROM makanan WHERE id_makanan='$id_makanan'");
header("location:masakan.php");
?>