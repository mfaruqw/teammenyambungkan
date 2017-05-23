
<!DOCTYPE html>
<html>
<head>



	<title>Hubungi</title>
</head>
<body>

		
		<h2>Balas Email</h2>




<!-- edit tempat-->
<?php
foreach ($balas as $hubungikami) {
//$a=$tempat->id_tempat;
//$this->model_fbar->edit_data($a,'tempat')->result();



?>

<div class="tab-content" id="edittem">
					
						<form action="<?php echo site_url ('anonymous/c_admin/balas_aksi'); ?>" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								<input type="hidden" name="id"  value="<?php echo $hubungikami->id_hubungi?>"/> 
						
								  <label>Kepada</label>
								<input class="text-input medium-input" type="text" name="email" value="<?php echo $hubungikami->email;?>" ><br><br>
								<label>Subjek</label>
								<input class="text-input medium-input" type="text"  name="subjek" value="Re: <?php echo $hubungikami->subjek;?>"> <br><br>
 								<label>Pesan</label>
								<textarea class="text-input textarea" name="pesan"   cols="79"  rows="15">                                                                                                            -------------------------------------------------------------------------------- <?php echo $hubungikami->pesan;?></textarea>
								<p>
									<input class="button" type="submit" value="Balas" />

								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>    
<?php } ?>
<!-- end edit tempat-->


</body></html>