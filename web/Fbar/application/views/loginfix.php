
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>F-bar Admin | Sign In</title>
		
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
		<script type="text/javascript" src="<?php echo base_url('assets/admin/scripts/facebox.js'); ?>"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="<?php echo base_url('assets/admin/scripts/jquery.wysiwyg.js'); ?>"></script>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>F-bar Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="<?php echo base_url('assets/admin/images/logo.png'); ?>" alt="F-bar Admin logo" height= 'Fbar'/>
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
			<?php echo form_open("anonymous/auth/cek_login"); ?>
				
					
					
					<p>
						<label>Username</label>
						<input class="text-input" type="text" name="username" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="password"  />
					</p>
					
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Sign In" />
					</p>
					
				<?php echo form_close(); ?>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  </html>
