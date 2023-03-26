<!DOCTYPE html>
<html>
<head>
	<title>CETAK NOTA</title>
</head>
<body>
	<center>
		<h2>BENGKEL PERUT RESTORAN</h2>
		<h4>Jln Deret 4 No 7 Perumahan Bogor Asri</h4>
			<?php 
			include'koneksi.php';
			$id = $_GET['id_beli'];
			$data = mysqli_query($koneksi,"SELECT * FROM laporan WHERE id_beli = '$id'") ;
			while($d = mysqli_fetch_array($data)){
			?>
				<h5><?php echo $d['id_beli']; ?> <?php echo $d['tgl_beli'] ?></h5>
			<?php } ?>
		<hr width="620px">
		<table width="620px">
			<?php 
			$id = $_GET['id_beli'];
			$data = mysqli_query($koneksi,"SELECT * FROM laporan WHERE id_beli='$id'") ;
			while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td>Nama Pembeli : <?php echo $d['nama'] ?></td>
			</tr>
			<tr>
				<td>Kode Pembayaran : <?php echo $d['id_beli'] ?></td>
			</tr>
			<tr>
				<td style="padding-bottom: 10px;">Alamat : <?php echo $d['alamat'] ?></td>
			</tr>
			<tr>
				<td colspan="2" style="padding-bottom: 30px"><hr></td>
			</tr>
			<?php } ?>
			<tr>
				<th align="left" style="padding-bottom: 15px">Nama Makanan</th>
				<th style="padding-bottom: 15px">Harga</th>
			</tr>
			<?php 
			$id = $_GET['id_beli'];
			$data = mysqli_query($koneksi,"SELECT * FROM pesanan RIGHT JOIN makanan ON pesanan.id_makanan = makanan.id_makanan WHERE id_beli = '$id'") ;
			while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $d['nama_makanan']; ?></td>
				<td align="center"><?php echo $d['harga']; ?></td>
			</tr>
			<?php } ?>
			<tr>
				<td style="padding-top: 40px;" colspan="2"><hr></td>
			</tr>
			<tr>
			<?php
			$id=$_GET['id_beli'];
    		$ongkir = 6000;
    		$data = mysqli_query($koneksi,"SELECT SUM(subtotal) FROM pesanan WHERE id_beli='$id'");
    		while ($d = mysqli_fetch_array($data)) {
      		$total_pesan = $d['SUM(subtotal)'];
			?>
			<tr>
				<td width="900" align="right">Total Pesanan : </td>
				<td><?php echo $total_pesan ?></td>
			</tr>
			<?php } ?>
				<td align="right">Harga Ongkir : </td>
				<td>6000</td>
			</tr>
			<?php 
			$id = $_GET['id_beli'];
			$data = mysqli_query($koneksi,"SELECT * FROM laporan WHERE id_beli='$id'");
			while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td align="right">Total Bayar : </td>
				<td><?php echo $d['total_pesanan']; ?></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
			<tr>
				<td colspan="2" align="center">Anda Kenyang Kami Pun Senang</td>
			</tr>
			<tr>
				<td colspan="2" align="center">Layanan Konsumen SMS : 0821-9822-2991</td>	
			</tr>
			<tr>
				<td colspan="2" align="center">Call : 0852-3322-0912</td>
			</tr>
		</table>
	</center>

	<script>
		window.print();
	</script>
	<?php 
	include'koneksi.php';
	$id = $_GET['id_beli'];
	$data = mysqli_query($koneksi,"SELECT * FROM laporan WHERE id_beli = '$id'") ;
	while($d = mysqli_fetch_array($data)){
	?>
	<script type="text/javascript">
		document.location.href = 'view-nota.php?id_beli=<?php echo $d['id_beli'] ?>';
	</script>
	<?php } ?>
</body>
</html>