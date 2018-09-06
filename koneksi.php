<?php
	$server="localhost"; 
	$connect="root"; 
	$password="";
	$db="database_toko_buku";
	$connect = mysql_connect($server,$connect,$password) or die (mysql_error());
	$database = mysql_select_db($db);
?>
