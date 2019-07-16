<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Fitness Information</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>

<body>
<?php 
	$this->load->view('client/include/javascript_disabled'); 
	$this->load->view('client/include/navigation');
?>
<div class="main-container">
	<div class="container">
		<?php $this->load->view('client/include/profile_sidebar'); ?>

		<div class="col-md-9">
			<div class="profile-content">
				<h1 class="profile-content-title">Fitness Information</h1>
				<div class="profile-posts">
					<h4 class="profile-content-subtitle"><a href="<?=base_url()?>user/stretching" class="posts">TFIT360 Stretching and Cooling Down</a></h4>
					<p>TFIT360 Stretching Routine for pre-workout stretching and post-workout cool down.</p>
					<a href="<?=base_url()?>user/stretching" class="post-more">Read more...</a>
				</div>
				<div class="profile-posts">
					<h4 class="profile-content-subtitle"><a href="<?=base_url()?>user/getFitness/1" class="posts">Tips For Better ABs</a></h4>
					<p>If your following the ab routine and still not seeing the result you want, try out these tips to help put your ab workouts into overdrive.</p>
					<a href="<?=base_url()?>user/getFitness/1" class="post-more">Read more...</a>
				</div>
			</div>
			<!--/.profile-content-->
		</div>
	</div>
</div>
<!--/.programs-->
<?php $this->load->view('client/include/footer'); ?>
</body>
</html>
