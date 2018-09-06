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
    	$id_kategori = $_POST['id_kategori'];
		$kategori = $_POST['kategori'];
		
    	$data  = mysql_query("update kategori SET kategori = '$kategori' WHERE id_kategori = '$id_kategori'");
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

    $qryMem = "SELECT * from kategori WHERE id_kategori = '$_GET[id]'";
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
             <label>ID KATEGORI</label>
             <input class="form-control" name="id_kategori" value="<?php echo $row['id_kategori'];?>" readonly>
        </div>
		<div class="form-group">
             <label>KATEGORI</label>
             <input class="form-control" name="kategori" value="<?php echo $row['kategori'];?>">
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

