
<!DOCTYPE html>
<html>
<head>



	<title>Edit</title>
</head>
<body>
	<center>
		
		<h2>EDIT DATA</h2>
	</center>



<!-- edit tempat-->
<?php
foreach ($edit as $tempat) {
//$a=$tempat->id_tempat;
//$this->model_fbar->edit_data($a,'tempat')->result();



?>
<div class="tab-content" id="edittem">
					
						<form action="<?php echo site_url ('anonymous/c_admin/edit_aksi'); ?>" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								<input type="text" name="id"  value="<?php echo $tempat->id_tempat?>"/> 
								<input type="hidden" name="idgam"  value="<?php echo $tempat->gambar?>"/>				
								  <label>Nama Tempat</label>
								<input class="text-input medium-input" type="text" name="nama" value="<?php echo $tempat->nama_tempat;?>" ><br><br>
								<label>Alamat Tempat</label>
								<input class="text-input medium-input" type="text"  name="alamat" value="<?php echo $tempat->alamat;?>"> 
 								<br><br>
								<label>No Telp</label>
								<input class="text-input medium-input" type="text" name="no" value="<?php echo $tempat->no_tlp;?>"> 
								<br><br>
								 <label>Gambar</label>
								<input type="file" class="file" name="filefoto"> 
								 <br><br>
								<label>Deskripsi</label>
								<textarea class="text-input textarea" name="desk"   cols="79"  rows="15"><?php echo $tempat->deskripsi;?></textarea>
								<p>
									<input class="button" type="submit" value="Edit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>    
<?php } ?>
<!-- end edit tempat-->


</body></html>