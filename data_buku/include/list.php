<div class="container-fluid">
<div id="tableWrapper">
	<div class="row">
	
        <div class="col-lg-12">
		
            <div class="panel">
                        
				<div class="panel-heading" style="padding: 10px 20px;">
					<center><h3> Pengelolaan Data Buku </h3> </center>
                  
					
				<form role="form" target="_blank" action="../print/laporan" enctype="multipart/form-data" method="GET">
					<input type="hidden" id="jenis" name="jenis" value="data_buku">
					<a href="../dashboard"><button type="button" class="btn btn-danger">Kembali</button></a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdata">Tambah Data</button>
                    <button type="submit" class="btn btn-success">Cetak Laporan</button>
                </form>


					
                </div>
				<!-- /.panel-heading -->
                <div class="panel-body">
					<div style="overflow-x: auto;table-layout: fixed;">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
								
								
                                <th>PENGATURAN</th>
                            </tr>
                        </thead>
                        <tbody>
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
										
										
										<td>
                                        	<?php
												 echo '
												<a class="btn btn-small btn-warning"
												   data-toggle="modal"
												   data-target="#exampleModal"
												   data-whatever="'.$row['id_buku'].' ">Ubah</a>';
											?>
												<a href="include/submit.php?halaman=hapusdata&id_buku=<?php echo $row['id_buku'];?>" name="<?php echo $row['id_buku'];  ?>" class="complexConfirm<?php echo $row['id_buku'];  ?>" ><button type="button" class="btn btn-danger ">Hapus</button></a>
												
										</td>
								
									</tr>
									 <script>
													 	$(".complexConfirm<?php echo $row['id_buku'];  ?>").confirm({
															title:"Konfirmasi Hapus Data",
															text:"Anda yakin menghapus data <strong> <?php echo $row['nama_buku'];  ?> </strong>ini ? ",
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
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Tambah Data Buku</h4>
            </div>
            <div class="dash">
				<div class="modal-body">
				<form role="form" action="include/submit.php?halaman=tambah" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<label>ID BUKU</label>
						<input class="form-control" name="id_buku">
					</div>
					
					<fieldset>
                        <div class="form-group col-md-6 col-sm-6">
                              <label>ID KATEGORI:</label>
                              <?php
                                	$result2 = mysql_query("select * from kategori");     
                                    $jsArray2 = "var prdName2 = new Array();\n";    
                                    echo '<select class="form-control" name="id_kategori" onChange="changeValue2(this.value)">';    
                                    echo '<option>-ID KATEGORI-</option>';    
                                    while ($row2 = mysql_fetch_array($result2)) {    
                                        echo "<option value='$row2[id_kategori]'>$row2[id_kategori]</option>";    
                                         $jsArray2 .= "prdName2['" . $row2['id_kategori'] . "'] = {kategori:'" . addslashes($row2['kategori']) . "'};\n";    
                                    }
                                    echo "</select></td>";    
                                   ?>
                          </div>

						  <div class="form-group col-md-6 col-sm-6">
                              <label>KATEGORI:</label>
                              <input class="form-control" name="kategori" id="kategori" readonly>
                          </div>
						  
						  
						<script type="text/javascript">    
								<?php echo $jsArray2; ?> 
								function changeValue2(id){  
								document.getElementById('kategori').value = prdName2[id].kategori;  
								
								};  
						</script>  	
					</fieldset>
					
				
					<div class="form-group">
						<label>NAMA BUKU</label>
						<input class="form-control" name="nama_buku">
					</div>
					<div class="form-group">
						<label>PENGARANG BUKU</label>
						<input class="form-control" name="pengarang_buku">
					</div>
					<div class="form-group">
						<label>HARGA BUKU</label>
						<input class="form-control" name="harga_buku">
					</div>
					<div class="form-group">
						<label>STOCK BUKU</label>
						<input class="form-control" name="stock_buku">
					</div>
					<fieldset>
                        <div class="form-group">
                              <label>ID PENERBIT:</label>
                              <?php
                                	$result3 = mysql_query("select * from penerbit");     
                                    $jsArray3 = "var prdName3 = new Array();\n";    
                                    echo '<select class="form-control" name="id_penerbit" onChange="changeValue3(this.value)">';    
                                    echo '<option>-ID PENERBIT-</option>';    
                                    while ($row3 = mysql_fetch_array($result3)) {    
                                        echo "<option value='$row3[id_penerbit]'>$row3[id_penerbit]</option>";    
                                         $jsArray3 .= "prdName3['" . $row3['id_penerbit'] . "'] = {nama_penerbit:'" . addslashes($row3['nama_penerbit']) . "',kota_penerbit:'" . addslashes($row3['kota_penerbit']) . "',negara_penerbit:'".addslashes($row3['negara_penerbit']). "'};\n";    
                                    }
                                    echo "</select></td>";    
                                   ?>
                          </div>

						  <div class="form-group col-md-12 col-sm-12">
                              <label>NAMA PENERBIT:</label>
                              <input class="form-control" name="nama_penerbit" id="nama_penerbit" readonly>
                          </div>
						  <div class="form-group col-md-6 col-sm-6">
                              <label>KOTA PENERBIT:</label>
                              <input class="form-control" name="kota_penerbit" id="kota_penerbit" readonly>
                          </div>
						  <div class="form-group col-md-6 col-sm-6">
                              <label>NEGARA PENERBIT:</label>
                              <input class="form-control" name="negara_penerbit" id="negara_penerbit" readonly>
                          </div>
						  
						  
						<script type="text/javascript">    
								<?php echo $jsArray3; ?> 
								function changeValue3(id){  
								document.getElementById('nama_penerbit').value = prdName3[id].nama_penerbit;  
								document.getElementById('kota_penerbit').value = prdName3[id].kota_penerbit;  
								document.getElementById('negara_penerbit').value = prdName3[id].negara_penerbit;  
								
								};  
						</script>  	
					</fieldset>
					</div>
					<div class="modal-footer">
					<button type="submit" class="btn btn-success">SAVE</button>
					<button type="reset" class="btn btn-default">RESET</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Ubah Data Kategori</h4>
            </div>
            <div class="dash">
             <!-- Content goes in here -->
            </div>
        </div>
    </div>
</div>




<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "include/update.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
 </script>
 
 
