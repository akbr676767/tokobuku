	<link rel="stylesheet" href="../../css/jquery-ui.css">
	<script type="text/javascript" src="../../js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy/mm/dd' });
  } );
  </script>
  
<?php
    require('../../koneksi.php');

    if (isset($_POST['submit'])) {
    	$id_penerbit = $_POST['id_penerbit'];
		$nama_penerbit = $_POST['nama_penerbit'];
		$kota_penerbit = $_POST['kota_penerbit'];
		$negara_penerbit = $_POST['negara_penerbit'];
		
    	$data  = mysql_query("update penerbit SET nama_penerbit = '$nama_penerbit', kota_penerbit = '$kota_penerbit', negara_penerbit = '$negara_penerbit' WHERE id_penerbit = '$id_penerbit'");
		if($data)
		{
			echo "
			<form method='post' action='../?halaman=list' id='myForm'>
			<input type='hidden' name='mssg' value='success'>
			<input type='hidden' name='nilai' value='ubah'>
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
			<input type='hidden' name='nilai' value='ubah'>
			</form>
			<script>
			document.getElementById('myForm').submit();
			</script>";
		}
		
		//header("location:index.php");
    }

    $qryMem = "SELECT * from penerbit WHERE id_penerbit = '$_GET[id]'";
   	$memresult =  mysql_query($qryMem) or die(mysql_error());
	while ($row = mysql_fetch_assoc($memresult)):

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form method="post" action="include/update.php" role="form">
	<div class="modal-body">
		<div class="form-group">
             <label>ID PENERBIT</label>
             <input class="form-control" name="id_penerbit" value="<?php echo $row['id_penerbit'];?>" readonly>
        </div>
		<div class="form-group">
             <label>NAMA PENERBIT</label>
             <input class="form-control" name="nama_penerbit" value="<?php echo $row['nama_penerbit'];?>">
        </div>
		<div class="form-group">
             <label>KOTA PENERBIT</label>
             <input class="form-control" name="kota_penerbit" value="<?php echo $row['kota_penerbit'];?>">
        </div>
		<div class="form-group">
             <label>NEGARA PENERBIT</label>
             <input class="form-control" name="negara_penerbit" value="<?php echo $row['negara_penerbit'];?>">
        </div>
		
		<div class="modal-footer">
		     <input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
		     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>
</body>
</html>
<?php
$i++;
endwhile;
                    
?>

