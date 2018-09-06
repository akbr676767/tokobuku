
<?php
include "../../koneksi.php";
$halaman=trim(strip_tags($_GET['halaman']));
	if($halaman=='tambah')
	{
	$id_buku = $_POST['id_buku'];
	$nama_buku = $_POST['nama_buku'];
	$pengarang_buku = $_POST['pengarang_buku'];
	$harga_buku = $_POST['harga_buku'];
	$stock_buku = $_POST['stock_buku'];
	$id_penerbit = $_POST['id_penerbit'];
	$id_kategori = $_POST['id_kategori'];
	
	
	$data  = mysql_query("INSERT into buku (id_buku, nama_buku, pengarang_buku,harga_buku, stock_buku, id_penerbit, id_kategori ) VALUE ('$id_buku','$nama_buku','$pengarang_buku','$harga_buku','$stock_buku','$id_penerbit','$id_kategori')");
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
		$data  = mysql_query("DELETE from buku WHERE id_buku = '$_GET[id_buku]'");

	
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