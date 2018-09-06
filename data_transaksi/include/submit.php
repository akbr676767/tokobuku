
<?php
include "../../koneksi.php";
$halaman=trim(strip_tags($_GET['halaman']));
	if($halaman=='konfirmasi')
	{
	$id_transaksi = $_POST['id_transaksi'];
	$tanggal_transaksi = $_POST['tanggal_transaksi'];
	
	
	
	$data  = mysql_query("INSERT into transaksi (id_transaksi, tanggal_transaksi ) VALUE ('$id_transaksi','$tanggal_transaksi')");
		if($data)
		{
			echo "<script>
			window.location.replace('../?halaman=list&id_transaksi=$id_transaksi')</script>";
			echo mysql_error();
		}else
		{
			echo "
			<form method='post' action='../?halaman=list' id='myForm'>
			<input type='hidden' name='mssg' value='fail'>
			<input type='hidden' name='nilai' value='tambah'>
			</form>
			<script>
			document.getElementById('myForm').submit();
			</script>";
			echo mysql_error();
		}
		
	}
	?>