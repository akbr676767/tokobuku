<?php
	include "../koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Menu Utama Toko Buku</title>
		
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/menu-component.css" />
		<link rel="stylesheet" href="../css/menu-main.css">
		
		<script src="../js/menu-modernizr.custom.js"></script>
		<script type="text/javascript" src="../js/jquery-3.3.1.js"></script>	
		<script type="text/javascript" src="../js/menu-date_time.js"></script>
		<script type="text/javascript" src="../js/bootstrap.js"></script>
	</head>
	<body>
	
		<div class="topnav">
		  <a class="active" > TOKO <b> BUKU</b></a>
		  
		</div>
		<div style="position: relative;float: right;">
			Date: <span id="date_time"></span>
			<script type="text/javascript">window.onload = date_time('date_time');</script>
		</div>
		<div class="container">	
			<!-- Codrops top bar -->			
			<div class="main">
				<ul id="og-grid" class="og-grid">

					<li>
						<a href="../data_buku" style="color:white;text-decoration: none; ">
							<img src="images/thumbs/1.png"/>
							<h5>  Pengelolaan <br> Data Buku</h5>
						</a>
						
					</li>
					
					<li>
						<a href="../data_kategori" style="color:white;text-decoration: none; ">
							<img src="images/thumbs/2.png"/>
							<h5>  Pengelolaan <br> Data Kategori</h5>
						</a>
						
					</li>
					
					<li>
						<a href="../data_penerbit" style="color:white;text-decoration: none; ">
							<img src="images/thumbs/3.png"/>
							<h5>  Pengelolaan <br> Data Penerbit</h5>
						</a>
						
					</li>
					
					<li>
						<a href="" data-toggle="modal" data-target="#modaltransaksi" style="color:white;text-decoration: none; ">
							<img src="images/thumbs/4.png"/>
							<h5>  Pengelolaan <br> Transaksi</h5>
						</a>
						
					</li>
					
					<li>
						<a href="../data_pencarian" style="color:white;text-decoration: none; ">
							<img src="images/thumbs/5.png"/>
							<h5>  Pencarian <br> Buku</h5>
						</a>
						
					</li>
				</ul>

			</div>
		</div><!-- /container -->
		
		<div class="modal fade" id="modaltransaksi" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Konfirmasi Transaksi</h4>
            </div>
            <div class="modal-body">
			<p> anda Ingin melakukan transaksi ? </p>
                <form role="form"  action="../data_transaksi/include/submit.php?halaman=konfirmasi" enctype="multipart/form-data" method="POST">
<?php			$result1 = mysql_query("SELECT id_transaksi from transaksi ORDER BY id_transaksi desc  LIMIT 1");     
			while ($row1 = mysql_fetch_array($result1)) 
			{    
				$unik = substr($row1['id_transaksi'],3) . " ";
					 $unik = $unik +1;
					if($unik <= 99 )
					{
						if($unik <= 9 )
						{
							$unik = "00".$unik;
						}else
							$unik = "0".$unik;
					}
			}    
				
				
				
				
?>
	
			
						<input type="hidden" class="form-control" name="id_transaksi" value="TR<?php echo $unik ; ?>" readonly>
						<input type="hidden" class="form-control" name="tanggal_transaksi" value="<?php echo date("Y/m/d") ; ?>" readonly>
					
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ya</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
           
         </div>
    </div>
</div>
		
		<div style="position: fixed;right: 0;bottom: 0;left: 0; padding: 1rem; background-color: #000; color:white; text-align: center;">Copyright: <strong>akbr</strong>.</div>

<link rel="stylesheet" href="../css/jquery-ui.css">
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy/mm/dd' });
  } );
  </script>
		
	</body>
</html>

