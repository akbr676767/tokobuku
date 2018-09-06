
<?php
include "../../koneksi.php";
$halaman=trim(strip_tags($_GET['halaman']));
	if($halaman=='tambah')
	{
	$id_penerbit = $_POST['id_penerbit'];
	$nama_penerbit = $_POST['nama_penerbit'];
	$kota_penerbit = $_POST['kota_penerbit'];
	$negara_penerbit = $_POST['negara_penerbit'];
	
	$data  = mysql_query("INSERT into penerbit (id_penerbit, nama_penerbit, kota_penerbit, negara_penerbit ) VALUE ('$id_penerbit','$nama_penerbit','$kota_penerbit','$negara_penerbit')");
		if($data)
		{
			echo "
			<form method='post' action='../?halaman=list' id='myForm'>
			<input type='hidden' name='mssg' value='success'>
			<input type='hidden' name='nilai' value='tambah'>
			</form>
			<script>
			document.getElementById('myForm').submit();
			</script>";
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
		
	}else
	if($halaman=='hapusdata')
	{
		$data  = mysql_query("DELETE from penerbit WHERE id_penerbit= '$_GET[id_penerbit]'");

	
		if($data)
		{
			echo "
			<form method='post' action='../?halaman=list' id='myForm'>
			<input type='hidden' name='mssg' value='success'>
			<input type='hidden' name='nilai' value='hapus'>
			</form>
			<script>
			document.getElementById('myForm').submit();
			</script>";
			echo mysql_error();
		}else
		{
			echo "
			<form method='post' action='../?halaman=list' id='myForm'>
			<input type='hidden' name='mssg' value='fail'>
			<input type='hidden' name='nilai' value='hapus'>
			</form>
			<script>
			document.getElementById('myForm').submit();
			</script>";
			echo mysql_error();
		}
		
	}
	
?>