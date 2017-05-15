<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="<?php echo base_url('assets/js/login.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css') ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>

<?php echo form_open("anonymous/auth/cek_login"); ?>
 <div class="form">
		<center><h1>Login</h1></center>
		<input class="form-control input-sm" type="text" name="username" placeholder="Username">
		<input class="form-control input-sm" type="password" name="password" placeholder="Password">
		<button class="btn btn-primary" type="submit">Login</button>
		<?php echo form_close(); ?>
		
</div>


</html>