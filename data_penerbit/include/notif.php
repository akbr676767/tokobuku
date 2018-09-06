
   
 
 
<div id="successmodal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"  style="color:green;"><center>Pemberitahuan</center></h4>
      </div>
      <div class="modal-body">
<?php 
if($_POST['nilai'] == 'tambah')
{ 
?>
        <center><p>Tambah Data Penerbit <b>Berhasil</b></p></center>
<?php
}else
if($_POST['nilai'] == 'ubah')
{
?>
		<center><p>Ubah Data Penerbit <b>Berhasil</b></p></center>
<?php
}else
if($_POST['nilai'] == 'hapus')
{
?>
		<center><p>Hapus Data Penerbit <b>Berhasil</b></p></center>
<?php
}
?>
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  
  
  
  <div id="failmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"  style="color:red;"><center>Pemberitahuan</center></h4>
      </div>
      <div class="modal-body">
<?php 
if($_POST['nilai'] == 'tambah')
{ 
?>
        <center><p>Terjadi <b>Error</b>, Tambah Data Gagal!</p></center>
<?php
}else
if($_POST['nilai'] == 'ubah')
{
?>
		<center><p>Terjadi <b>Error</b>, Ubah Data Gagal!</p></center>
<?php
}else
if($_POST['nilai'] == 'hapus')
{
?>
		<center><p>Terjadi <b>Error</b>, Hapus Data Gagal!</p></center>
<?php
}
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
 </div>
  
  
 <?php

    if($_POST['mssg'] == 'success'){ ?>
        <script>
                 $(function(){
                     $('#successmodal').modal('show');

                 });
        </script>
<?php         
    }else
	if($_POST['mssg'] == 'fail')
	{
?>
	<script>
		$(function(){
			$('#failmodal').modal('show');
		});
    </script>
<?php
	} 
?>
<SCRIPT>
$('#successmodal').on('hidden.bs.modal', function () {
 location.replace('?halaman=list');
});
$('#failmodal').on('hidden.bs.modal', function () {
 location.replace('?halaman=list');
});

	</SCRIPT>