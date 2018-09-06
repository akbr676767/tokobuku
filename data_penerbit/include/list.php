<div class="container-fluid">
<div id="tableWrapper">
	<div class="row">
	
        <div class="col-lg-12">
		
            <div class="panel">
                        
				<div class="panel-heading" style="padding: 10px 20px;">
					<center><h3> Pengelolaan Data Penerbit Buku </h3> </center>
                   <a href="../dashboard"><button type="button" class="btn btn-danger">Kembali</button></a>
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdata">Tambah Data</button>
					 
                </div>
				<!-- /.panel-heading -->
                <div class="panel-body">
					<div style="overflow-x: auto;table-layout: fixed;">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID PENERBIT</th>
                                <th>NAMA PENERBIT</th>
								<th>KOTA PENERBIT</th>
								<th>NEGARA PENERBIT</th>
								
                                <th>PENGATURAN</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
								$i=1;
								$qryMem = "SELECT * from penerbit";
   								$memresult =  mysql_query($qryMem) or die(mysql_error());
								while ($row = mysql_fetch_assoc($memresult)):									
?>				
									
									<tr class="">
										<td><?php echo $i; ?></td>
										<td><?php echo $row['id_penerbit'];?> </td>
										<td><?php echo $row['nama_penerbit'];?> </td>
										<td><?php echo $row['kota_penerbit'];?> </td>
										<td><?php echo $row['negara_penerbit'];?> </td>
										
										<td>
                                        	<?php
												 echo '
												<a class="btn btn-small btn-warning"
												   data-toggle="modal"
												   data-target="#exampleModal"
												   data-whatever="'.$row['id_penerbit'].' ">Ubah</a>';
											?>
												<a href="include/submit.php?halaman=hapusdata&id_penerbit=<?php echo $row['id_penerbit'];?>" name="<?php echo $row['nama_penerbit'];  ?>" class="complexConfirm<?php echo $row['id_penerbit'];  ?>" ><button type="button" class="btn btn-danger ">Hapus</button></a>
												
										</td>
								
									</tr>
									 <script>
													 	$(".complexConfirm<?php echo $row['id_penerbit'];  ?>").confirm({
															title:"Konfirmasi Hapus Data",
															text:"Anda yakin menghapus data <strong> <?php echo $row['nama_penerbit'];  ?> </strong>ini ? ",
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
                <h4 class="modal-title" id="memberModalLabel">Tambah Data Penerbit Buku</h4>
            </div>
            <div class="dash">
				<div class="modal-body">
				<form role="form" action="include/submit.php?halaman=tambah" enctype="multipart/form-data" method="post">
					
<?php			$result1 = mysql_query("SELECT id_penerbit from penerbit ORDER BY id_penerbit desc  LIMIT 1");     
			while ($row1 = mysql_fetch_array($result1)) 
			{    
				$unik = substr($row1['id_penerbit'],2) . " ";
					$unik = $unik +1;
					if($unik <= 9 )
					{
						$unik = "0".$unik;
					}
			}    
				
				
				
				
?>
                               							
					<div class="form-group">
						<label>ID PENERBIT</label>
						<input class="form-control" name="id_penerbit" value="PN<?php echo $unik ; ?>" readonly>
					</div>
					<div class="form-group">
						<label>NAMA PENERBIT</label>
						<input class="form-control" name="nama_penerbit">
					</div>
					<div class="form-group">
						<label>KOTA PENERBIT</label>
						<input class="form-control" name="kota_penerbit">
					</div>
					<div class="form-group">
						<label>NEGARA PENERBIT</label>
						<input class="form-control" name="negara_penerbit">
					</div>
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
                <h4 class="modal-title" id="memberModalLabel">Ubah Data Penerbit Buku</h4>
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
 
 
