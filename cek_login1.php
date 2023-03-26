<?php 
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi,"select * from customer where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
if($cek > 0){
		$_SESSION['username'] = $username;
		header("location:halaman_pelanggan.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>