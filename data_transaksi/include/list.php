<body>
<div class="container-fluid">
<div id="tableWrapper">
	<div class="row">
	
        <div class="col-lg-12">
		
            <div class="panel">
                        
				<div class="panel-heading" style="padding: 10px 20px;">
					<center><h3> TRANSAKSI BUKU </h3> </center>
					
                </div>
				
				<center><p> Detail Transaksi</p><center>
				<table class="table table-bordered table-striped">
						
						<tbody>
 <?php
								$i=1;
								$qryMem = "SELECT * from transaksi WHERE id_transaksi = '$_GET[id_transaksi]'";
   								$memresult =  mysql_query($qryMem) or die(mysql_error());
								while ($row = mysql_fetch_assoc($memresult)):									
?>				
									
									<tr class="">
										<td><b><center>ID Transaksi: <?php echo $row['id_transaksi'];?> </center></b></td>
									</tr>
									<tr>
										<td><b><center>Tanggal Transaksi: <?php echo $row['tanggal_transaksi'];?> </center></b></td>

									</tr>

<?php
									$i++;
								endwhile;
                
?>
						</tbody>
				</table>
						
                


        </div>
		
		<center><button> Pilih Item Buku</button><center>
		
		<div class="panel">
					<div style="overflow-x: auto;table-layout: fixed;">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID BUKU</th>
                                <th>JUMLAH BUKU</th>
								
 
                            </tr>
                        </thead>
                        <tbody>
                          <?php
								$i=1;
								$qryMem = "SELECT * from transaksi, transaksi_detail,buku WHERE transaksi.id_transaksi = transaksi_detail.id_transaksi AND buku.id_buku = transaksi_detail.id_buku";
   								$memresult =  mysql_query($qryMem) or die(mysql_error());
								while ($row = mysql_fetch_assoc($memresult)):									
?>				
									
									<tr class="">
										<td><?php echo $i; ?></td>
										<td><?php echo $row['id_buku'];?> </td>
										<td><?php echo $row['jumlah'];?> </td>
										
										<td>
                                        	<?php
												 echo '
												<a class="btn btn-small btn-warning"
												   data-toggle="modal"
												   data-target="#exampleModal"
												   data-whatever="'.$row['id_kategori'].' ">Ubah</a>';
											?>
												<a href="include/submit.php?halaman=hapusdata&id_kategori=<?php echo $row['id_kategori'];?>" name="<?php echo $row['kategori'];  ?>" class="complexConfirm<?php echo $row['id_kategori'];  ?>" ><button type="button" class="btn btn-danger ">Hapus</button></a>
												
										</td>
								
									</tr>
									 <script>
													 	$(".complexConfirm<?php echo $row['id_kategori'];  ?>").confirm({
															title:"Konfirmasi Hapus Data",
															text:"Anda yakin menghapus data <strong> <?php echo $row['kategori'];  ?> </strong>ini ? ",
															confirmButton: "Ya",
															cancelButton: "Tidak"
														});
                                     </script>
<?php
									$i++;
								endwhile;
                
?>
                            
                        </tbody>
                    </table>
					</div>

                    
                </div>

    </div>
</div>
</div>
					
					
					
			

</body>