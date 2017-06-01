<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>F-bar Admin</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/reset.css'); ?>" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/style.css'); ?>" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/invalid.css'); ?>" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="<?php echo base_url('assets/admin/scripts/jquery-1.3.2.min.js'); ?>"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="<?php echo base_url('assets/admin/scripts/simpla.jquery.configuration.js'); ?>"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="<?php echo base_url('assets/admin/scripts/facebox.js') ; ?>"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="<?php echo base_url('assets/admin/scripts/jquery.wysiwyg.js'); ?>"></script>
		
		<!-- jQuery Datepicker Plugin -->
		<script type="text/javascript" src="<?php echo base_url('assets/admin/scripts/jquery.datePicker.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/admin/scripts/jquery.date.js'); ?>"></script>
				
		<!--[if IE]><script type="text/javascript" src="resources/scripts/jquery.bgiframe.js"></script><![endif]-->

		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Fbar Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="<?php echo base_url('assets/admin/images/logo.png'); ?>" alt="Fbar Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile"><?php echo $username ?></a><br />
				<br />
				<a href="<?php echo site_url('/awal');?>" title="View the Site" target="_blank">View the Site</a> | <a href="<?php echo site_url('anonymous/c_admin/logout'); ?>" title="Sign Out">Sign Out</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="#" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>
				


				<li> 
					<a href="#" class="nav-top-item current"> <!-- Add the class "current" to current menu item -->
					Entri
					</a>
					<ul>
						<li><a href="#tambahtem" rel="modal">Tambah Tempat Futsal</a></li>
						
					</ul>
				</li>	
				<li>
					<a href="#" class="nav-top-item">
					Laporan
					</a>
					<ul>
						<li><a href="<?php echo base_url('index.php/anonymous/c_admin/cetak') ?>">Data Pemain</a></li>
						<li><a href="<?php echo base_url('index.php/anonymous/c_admin/cetak_pertandingan') ?>">Data Pertandingan</a></li>
					
						
					</ul>
				</li>
				
			</ul> <!-- End #main-nav -->
			
		
			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			
			
			<!-- Page Head -->
			<h2>Welcome <?php echo $username; ?></h2>
			
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Data Lapangan</h3>
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tampiltem"> <!-- This is the target div. id must match the href of this div's tab -->
						
						
						
						<table>
							
							<thead>
								<tr>
								  
								   <th><center>No</center></th>
								   <th><center>Nama Tempat</center></th>
								   <th><center>Alamat</center></th>
								   <th><center>No Tlp</center></th>
								   <th><center>Gambar</center></th>
								   <th><center>Aksi</center></th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									
								</tr>
							</tfoot>
						 
							<tbody>
							<?php
							$no=0;
							foreach ($anonymous as $tempat) {
							 	# code...
						 

							?>
								<tr>
									
									<td> <center> <?php $no++; echo $no; ?> </center></td>
									<td> <center> <?php echo $tempat->nama_tempat; ?> </center></td>
									<td><center><?php echo $tempat->alamat; ?></center></td>
									<td><center><?php echo $tempat->no_tlp; ?></center></td>
									<td>

									 <center> <a href="<?php echo base_url('assets/img/tempat/'.$tempat->gambar); ?>" data-rel="prettyPhoto" title=""><?php echo base_url('assets/img/tempat/'.$tempat->gambar); ?>"</a></center></td>

									<td><center>
										<!-- Icons -->
										




										 <a rel="modal" href="<?php echo site_url('anonymous/c_admin/edittempat/'.$tempat->id_tempat); ?>" title="Edit">
										 <img src="<?php echo base_url('assets/admin/images/icons/pencil.png'); ?>" alt="Edit" /></a>
										 <a href="<?php echo base_url('index.php/anonymous/c_admin/hapus/'.$tempat->gambar); ?> " title="Delete"><img src="<?php echo base_url('assets/admin/images/icons/cross.png'); ?>" alt="Delete" /></a> 
										 </center>
									</td>
								</tr>
								
								<?php } ?>
								
								
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					

<!-- Tambah tempat -->

					<div class="tab-content" id="tambahtem">
					<center>
		
		<h2>TAMBAH DATA</h2>
	</center>
		<?php
        foreach ($a as $id) {
	# code...

	// $id_kode= $pemain->id_pemain ;
	
    $urut=  substr($id->kode, 3,3);
 
    $urut++ ;
//echo $urut;
 

    $id_baru="T".date('d').sprintf("%03s", $urut);
       }
    // echo $id_baru;

     ?>     
						<form action="<?php echo site_url ('anonymous/c_admin/tambahtempat_aksi'); ?>" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							<input type="hidden" name="id" value="<?php echo $id_baru ?>"></input>

								  <label>Nama Tempat</label>
								<input class="text-input medium-input datepicker" type="text" name="nama" /> 
								<br><br>
								  <label>Alamat Tempat</label>
								<input class="text-input medium-input datepicker" type="text" name="alamat" /> 
								<br><br>
								  <label>No Telp</label>
								<input class="text-input medium-input datepicker" type="text" name="no" /> 
								<br><br>
								  <label>Gambar</label>
								<input type="file" class="file" name="filefoto"> </input>

								<br><br>
									<label>Deskripsi</label>

									<textarea class="text-input textarea" name="desk" cols="79" rows="15"></textarea>
							
								
								<p>
									<input class="button" type="submit" value="Input" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>      
					<!-- end tambah tempat-->






				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<!-- Tambah Tempat -->

			<div class="content-box-header">
					
					<h3>Data Hubungi Kami</h3>
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tampilhub"> <!-- This is the target div. id must match the href of this div's tab -->
						
						
						
						<table>
							
							<thead>
								<tr>
								  
								   <th><center>No</center></th>
								   <th><center>Nama Pengirim</center></th>
								   <th><center>Email</center></th>
								   <th><center>Subjek</center></th>
								   <th><center>Tangal</center></th>
								   <th><center>Aksi</center></th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									
								</tr>
							</tfoot>
						 
							<tbody>
							<?php
							$no=0;
							foreach ($ans as $hubungi) {
							 	# code...
						 

							?>
								<tr>
									<td> <center> <?php $no++; echo $no; ?> </center></td>
									<td> <center> <?php echo $hubungi->nama_pengirim; ?> </center></td>
									<td><center><a rel="modal" href="<?php echo site_url('anonymous/c_admin/balasemail/'.$hubungi->id_hubungi); ?>"><?php echo $hubungi->email; ?></center></td>
									<td><center><?php echo $hubungi->subjek; ?></center></td>
									<td><center><?php echo $hubungi->tanggal; ?></center></td>

									<td><center>
										<!-- Icons -->
										
									<a href="<?php echo base_url('index.php/anonymous/c_admin/hapus_hubungi/'.$hubungi->id_hubungi); ?>" title="Delete"><img src="<?php echo base_url('assets/admin/images/icons/cross.png'); ?>" alt="Delete" /></a> 
										 </center>
									</td>
								</tr>
								
								<?php } ?>
								
								
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					</div>


			<!-- end Tambah Tempat -->
			
		
			
			<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 2017 F-Bar | Powered by Team Menyambungkan
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
  

<!-- Download From www.exet.tk-->
</html>
