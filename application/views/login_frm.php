<html>
<head>
<title>Cpanel Login</title>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/login.css"/>
<!-- bootstrap 3.0.2 -->
<link href="<?=base_url()?>admin_files/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="<?=base_url()?>admin_files/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>
<style>

	.login{
		position: absolute;
		height: 389px;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		margin: auto;
		border: 1px solid #ddd;
		border-radius: 4px;
		padding: 25px;
		box-shadow: 0px 1px 1px rgba(0,0,0,0.2);
	}

</style>
<body>
	<div class="col-md-4 col-md-offset-4 login">
		<img src="<?=base_url()?>img/logo-black.png" style="margin:0 auto;display:block" class="img-responsive"/>
		<h3 style="font-size:9px; color:#F00;">
					<?=@$this->session->userdata('Errormsg')?>
				</h3>
				<?php $this->session->unset_userdata('Errormsg'); ?>
		<?php echo form_open('login'); ?>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" autocomplete="off" id="username" 
                                       placeholder="Username" name="username">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" placeholder="Password" name="password">
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
		<?php echo form_close() ?>
	</div>
</body>

<body>
</html>