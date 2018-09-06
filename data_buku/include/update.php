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
    	$id_buku = $_POST['id_buku'];
		$nama_buku = $_POST['nama_buku'];
		$pengarang_buku = $_POST['pengarang_buku'];
		$harga_buku = $_POST['harga_buku'];
		$stock_buku = $_POST['stock_buku'];
		$id_penerbit = $_POST['id_penerbit'];
		$id_kategori = $_POST['id_kategori'];
		
    	$data  = mysql_query("update buku SET nama_buku = '$nama_buku', pengarang_buku = '$pengarang_buku', harga_buku = '$harga_buku', stock_buku = '$stock_buku', id_penerbit = '$id_penerbit', id_kategori = '$id_kategori' WHERE id_buku = '$id_buku'");
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

    $qryMem = "SELECT * from buku,kategori,penerbit WHERE buku.id_kategori = kategori.id_kategori AND buku.id_penerbit = penerbit.id_penerbit AND buku.id_buku = '$_GET[id]'";
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
			<label>ID BUKU</label>
			<input class="form-control" name="id_buku" value="<?php echo $row['id_buku'];?>">
		</div>
		
		<fieldset>
            <div class="form-group col-md-6 col-sm-6">
                  <label>ID KATEGORI:</label>
                  <?php
                    	$result4 = mysql_query("select * from kategori");     
                        $jsArray4 = "var prdName4 = new Array();\n";    
                        echo '<select class="form-control" name="id_kategori" onChange="changeValue4(this.value)">';    
                        while ($row4 = mysql_fetch_array($result4)) { 
							if($row['id_kategori'] ==  $row4['id_kategori'] )
							{
								echo "<option selected value='$row4[id_kategori]'>$row4[id_kategori]</option>";  
							}else
							{
								echo "<option value='$row4[id_kategori]'>$row4[id_kategori]</option>";  
							}
                             $jsArray4 .= "prdName4['" . $row4['id_kategori'] . "'] = {kategori:'" . addslashes($row4['kategori']) . "'};\n";    
                        }
                        echo "</select></td>";    
                       ?>
              </div>

			  <div class="form-group col-md-6 col-sm-6">
                  <label>KATEGORI:</label>
                  <input class="form-control" name="kategori" id="kategori1" value="<?php echo $row['kategori'];?>" readonly>
              </div>
			  
			  
			<script type="text/javascript">    
					<?php echo $jsArray4; ?> 
					function changeValue4(id){  
					document.getElementById('kategori1').value = prdName4[id].kategori;  
					
					};  
			</script>  	
		</fieldset>
		
		
		<div class="form-group">
			<label>NAMA BUKU</label>
			<input class="form-control" name="nama_buku" value="<?php echo $row['nama_buku'];?>">
		</div>
		<div class="form-group">
			<label>PENGARANG BUKU</label>
			<input class="form-control" name="pengarang_buku" value="<?php echo $row['pengarang_buku'];?>">
		</div>
		<div class="form-group">
			<label>HARGA BUKU</label>
			<input class="form-control" name="harga_buku" value="<?php echo $row['harga_buku'];?>">
		</div>
		<div class="form-group">
			<label>STOCK BUKU</label>
			<input class="form-control" name="stock_buku" value="<?php echo $row['stock_buku'];?>">
		</div>
		<fieldset>
            <div class="form-group">
                  <label>ID PENERBIT:</label>
                  <?php
                    	$result5 = mysql_query("select * from penerbit");     
                        $jsArray5 = "var prdName5 = new Array();\n";    
                        echo '<select class="form-control" name="id_penerbit" onChange="changeValue5(this.value)">';    

                        while ($row5 = mysql_fetch_array($result5)) 
						{ 
							if($row['id_penerbit'] ==  $row5['id_penerbit'] )
							{
								echo "<option selected value='$row5[id_penerbit]'>$row5[id_penerbit]</option>";  
							}else
							{
								echo "<option value='$row5[id_penerbit]'>$row5[id_penerbit]</option>";  
							}  
                             $jsArray5 .= "prdName5['" . $row5['id_penerbit'] . "'] = {nama_penerbit:'" . addslashes($row5['nama_penerbit']) . "',kota_penerbit:'" . addslashes($row5['kota_penerbit']) . "',negara_penerbit:'".addslashes($row5['negara_penerbit']). "'};\n";    
                        }
                        echo "</select></td>";    
                       ?>
              </div>

			  <div class="form-group col-md-12 col-sm-12">
                  <label>NAMA PENERBIT:</label>
                  <input class="form-control" name="nama_penerbit" id="nama_penerbit1" value="<?php echo $row['nama_penerbit'];?>" readonly>
              </div>
			  <div class="form-group col-md-6 col-sm-6">
                  <label>KOTA PENERBIT:</label>
                  <input class="form-control" name="kota_penerbit" id="kota_penerbit1" value="<?php echo $row['kota_penerbit'];?>" readonly>
              </div>
			  <div class="form-group col-md-6 col-sm-6">
                  <label>NEGARA PENERBIT:</label>
                  <input class="form-control" name="negara_penerbit" id="negara_penerbit1" value="<?php echo $row['negara_penerbit'];?>" readonly>
              </div>
			  
			  
			<script type="text/javascript">    
					<?php echo $jsArray5; ?> 
					function changeValue5(id){  
					document.getElementById('nama_penerbit1').value = prdName5[id].nama_penerbit;  
					document.getElementById('kota_penerbit1').value = prdName5[id].kota_penerbit;  
					document.getElementById('negara_penerbit1').value = prdName5[id].negara_penerbit;  
					
					};  
			</script>  	
		</fieldset>
		
		
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

