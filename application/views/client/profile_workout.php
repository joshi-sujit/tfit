<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Workout Routines</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>

<body>
<?php 
	$this->load->view('client/include/javascript_disabled'); 
	$this->load->view('client/include/navigation');
?>
<!--/.nav-->
<div class="main-container">
	<div class="container">
		<?php $this->load->view('client/include/profile_sidebar');?>
		<div class="col-md-9">
			<div class="profile-content">
				<h1 class="profile-content-title">TFIT360 Workout Program</h1>
				<p class="text-small">Follow these instructions</p>
				<p class="mealplan-desc">Change from phase to phase every two weeks. For example, Start with phase 1 and then after two weeks switch over to phase 2, two more weeks go to phase 3.<br><br> <strong>Click on the buttons below to go to the month's workouts.</strong></p>
				<a href="<?=base_url()?>user/getWorkout/1" class="btn btn-danger btn-login btn-download" title="First Month Workout">1<sup>st</sup> Month</a> <a href="<?=base_url()?>user/getWorkout/2" class="btn btn-danger btn-login btn-download" title="Second Month Workout">2<sup>nd</sup> Month</a> <a href="<?=base_url()?>user/getWorkout/3" class="btn btn-danger btn-login btn-download" title="Third Month Workout">3<sup>rd</sup> Month</a>

				<span class="mealplan-desc">Don't forget to check out the all the fitness content under the Fitness Center menu. This includes the <a href="<?=base_url()?>user/abripper">AB Ripper Workout</a> to take your ABs to the next level, a <a href="<?=base_url()?>user/stretching">Stretching Routine</a> to get you ready to go before workouts and to cool down after workouts, and <a href="<?=base_url()?>user/getFitness/1">AB Tips</a> to help keep your ABs in top shape.<br><br><strong>If you have any questions about the program please email me at <a href="mailto:Tomas@tfit360.com">Tomas@tfit360.com</a></strong>.
				</span>
			</div>
			<!--/.profile-content-->
		</div>
	</div>
</div>
<!--/.programs-->
<?php $this->load->view('client/include/footer'); ?>
</body>
</html>
