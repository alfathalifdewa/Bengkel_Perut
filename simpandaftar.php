<?php
include 'koneksi.php';

$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$jk = $_POST['jk'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$no = $_POST['no_hp'];

$save = mysqli_query($koneksi,"INSERT INTO customer(username,nama,password,jk,email,alamat,no_hp) VALUES('$username','$nama','$password','$jk','$email','$alamat','$no')");
if ($save) {
	echo "<script>alert('Daftar Berhasil!'); document.location.href = 'index.php';</script>";
}
else {
	echo "Data Gagal Disimpan!!";
}
?>