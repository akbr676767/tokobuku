
<?php
include "../../koneksi.php";
$halaman=trim(strip_tags($_GET['halaman']));
	if($halaman=='tambah')
	{
	$id_kategori = $_POST['id_kategori'];
	$kategori = $_POST['kategori'];
	
	$data  = mysql_query("INSERT into kategori (id_kategori, kategori) VALUE ('$id_kategori','$kategori')");
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
		$data  = mysql_query("DELETE from kategori WHERE id_kategori = '$_GET[id_kategori]'");

	
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