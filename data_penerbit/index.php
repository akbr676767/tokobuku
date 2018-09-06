<?php
	include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>PENGELOAAN DATA PENERBIT BUKU</title>
		
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/menu-main.css">
		<link rel="stylesheet" href="../css/dataTables.bootstrap.css">
		
		
		<script type="text/javascript" src="../js/menu-date_time.js"></script>
		
		<script type="text/javascript" src="../js/jquery-3.3.1.js"></script>	
		<script type="text/javascript" src="../js/jquery.dataTables.js"></script>	
		<script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>			
		<script type="text/javascript" src="../js/bootstrap.js"></script>
		
		<script type="text/javascript" src="../js/jquery.confirm.js"></script>
		

	</head>
	<body>
		<div class="topnav">
		  <a class="active" > TOKO <b> BUKU</b></a>
		  
		</div>
		<div style="position: relative;float: right;">
			Date: <span id="date_time"></span>
			<script type="text/javascript">window.onload = date_time('date_time');</script>
		</div>
		
		
		

<?php

		include "include/list.php";
		include "include/notif.php";
?>

			</div>
		</div><!-- /container -->
		<div style="position: fixed;right: 0;bottom: 0;left: 0; padding: 1rem; background-color: #000; color:white; text-align: center;">Copyright: <strong>akbr</strong>.</div>

	<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({

			ordering: false,	
        });
    });
    </script>
	
	
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy/mm/dd' });
  } );
  </script>
	
	</body>
</html>