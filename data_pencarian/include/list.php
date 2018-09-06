<body>
<div class="container-fluid">
<div id="tableWrapper">
	<div class="row">
	
        <div class="col-lg-12">
		
            <div class="panel">
                        
				<div class="panel-heading" style="padding: 10px 20px;">
					<center><h3> Pencarian Buku </h3> </center>
					<a href="../dashboard"><button type="button" class="btn btn-danger">Kembali</button></a>
                </div>
				
					<div class="container">
					  <input class="form-control" id="myInput" type="text" placeholder="Search..">
					  <br>
					  <table class="table table-bordered table-striped">
						<thead>
                            <tr>
                                <th>NO</th>
                                <th>ID BUKU</th>
                                <th>KATEGORI</th>
								<th>NAMA BUKU</th>
								<th>PENGARANG BUKU</th>
								<th>HARGA</th>
								<th>STOCK</th>
								<th>PENERBIT</th>
                              
                            </tr>
                        </thead>
						<tbody id="myTable">
						                          <?php
								$i=1;
								$qryMem = "SELECT * from buku,kategori,penerbit WHERE buku.id_kategori = kategori.id_kategori AND buku.id_penerbit = penerbit.id_penerbit";
   								$memresult =  mysql_query($qryMem) or die(mysql_error());
								while ($row = mysql_fetch_assoc($memresult)):									
?>				
									
									<tr class="">
										<td><?php echo $i; ?></td>
										<td><?php echo $row['id_buku'];?> </td>
										<td><?php echo $row['kategori'];?> </td>
										<td><?php echo $row['nama_buku'];?> </td>
										<td><?php echo $row['pengarang_buku'];?> </td>
										<td><?php echo $row['harga_buku'];?> </td>
										<td><?php echo $row['stock_buku'];?> </td>
										<td><?php echo $row['nama_penerbit'];?> </td>

										
									</tr>

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
</div>
					
					
					
					
					<script>
					$(document).ready(function(){
					  $("#myInput").on("keyup", function() {
						var value = $(this).val().toLowerCase();
						$("#myTable tr").filter(function() {
						  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						});
					  });
					});
					</script>

</body>