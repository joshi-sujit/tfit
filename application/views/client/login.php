<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Login to your account</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>

<body class="login-register">
<?php $this->load->view('client/include/javascript_disabled'); ?>
<div class="container">
	<div class="row">
		<img src="<?=base_url()?>img/logo-white.png" alt="Logo" class="login-logo">
	</div>
	<!--/.row-->
	<div class="row">
		<div class="login col-sm-6">
			<p><?=@$link?></p>
			<h1 class="title">Welcome back!</h1>
			<h5 class="subtitle">Good to see you again.</h5>
			<?php
				if(@$error == 1){
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>Oops!</strong> You've made a tiny mistake typing your username/password.
			</div>
			<?php
				}
			?>
			<?php if(@$msg == 1){?>
				<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>Success!</strong> An email has been sent to your account with further instructions.<?=$pwd?><br />
				<?=$new?>
			</div>
			<?php
				}elseif(@$msg == 2){
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>Error!</strong> The email account doesnot exist.
			</div>
			<?php
			}
			?>
			<form role="form" method="post" action="<?=base_url()?>profile/login">
				<div class="form-group">
					<input type="text" class="form-control" id="login-username" placeholder="Username" name="username">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="login-password" placeholder="Password" name="password">
					<a href="#" class="help-block forgot-pass" data-toggle="modal" data-target="#newPass">Forgot your password?</a>
				</div>
				<button type="submit" class="btn btn-danger btn-login" id="btn-login">Login</button>
			</form>
		</div>
		<!--/.login-->
		<div class="register col-sm-6">
			<h1 class="title">New to TFIT360?</h1>
			<h5 class="subtitle">Sign up Now</h5>

			<?php if(@$flag == 1){?>
				<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>Success!</strong> An email has been sent to you with further instructions on using the site.
			</div>
			<!--/.alert-success-->
			<?php
				}elseif(@$flag == 2){
			?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>Oh snap!</strong> The username exists already. Please try again with different username.
			</div>
			<!--/.alert-warning-->
			<?php
				}elseif (@$flag == "usedlink") {
			?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>Oh snap!</strong> The account has been activated earlier. Please try to enter with login credentials.
				</div>
			<?php
				}
			?>

			<form role="form" method="post" action="<?=base_url()?>profile/register">
				<div class="form-group">
					<input type="text" class="form-control" id="register-username" placeholder="Username" name="username" required="required">
				</div>
				<div class="form-group">
					<input type="email" class="form-control" id="register-password" placeholder="Email" name="email" 
					required="required">
				</div>
				<div class="form-group">
					<select class="form-control" id="register-meal" name="meal" required="required">
						<option value="none">--Select a Meal Plan--</option>
						<option value="standard male mealplan">Standard Male Mealplan</option>
						<option value="male bulk">Male Bulk</option>
						<option value="male shred">Male shred</option>
						<option value="standard female mealplan">Standard Female Mealplan</option>
						<option value="customized mealplan">Customized Mealplan</option>
					</select>
				</div>
				<button type="submit" class="btn btn-success btn-signup" id="btn-signup">Sign up</button>
			</form>
		</div>
		<!--/.register-->
	</div>
	<!--/.row-->
	<div class="row">
		<span class="go-back"><a href="<?=base_url()?>home" class="text-center"><i class="fa fa-reply"></i><p>Go back to homepage</p></a></span>
	</div>
</div>
<div class="modal fade modal-newpass" id="newPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Request New Password</h4>
      </div>
      <div class="modal-body">
	  	<form role="form" action="<?=base_url()?>profile/newPassword" method="post">
			<div class="form-group">
				<input type="email" class="form-control" id="login-username" placeholder="Email" name="email" required>
			</div>
			<button type="submit" class="btn btn-danger btn-login" id="btn-login">E-mail new password</button>
		</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
$(document).ready(function(e) {
	outdatedBrowser({
		bgColor: '#f25648',
		color: '#ffffff',
		lowerThan: 'boxShadow',
		languagePath: ''
	})             
});            
</script> 
<script src="<?=base_url()?>client_files/js/jquery-easing.js"></script> 
<script src="<?=base_url()?>client_files/assets/skrollr/skrollr.min.js"></script> 
<script src="<?=base_url()?>client_files/assets/jquery-dotdotdot/jquery.dotdotdot.js"></script> 
<script src="<?=base_url()?>client_files/assets/owl-carousel/owl.carousel.min.js"></script> 
<script src="<?=base_url()?>client_files/assets/bootstrap-3.2.0/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>client_files/js/custom.js"></script>
</body>
</html>
