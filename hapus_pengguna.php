<?php
include 'koneksi.php';
$username = $_GET['username'];
mysqli_query($koneksi,"DELETE FROM customer WHERE username='$username'");
header("location:pengguna.php");
?>