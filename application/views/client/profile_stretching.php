<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Stretching</title>
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
		<?php $this->load->view('client/include/profile_sidebar'); ?>

		<div class="col-md-9">
			<div class="profile-content">
				<h1 class="profile-content-title">Stretching Routine</h1>
				<h4 class="profile-content-subtitle">TFIT360 Stretching and Cooling Down</h4>
				<p class="text-small">Do each exercise for 30 seconds</p>
				<ul class="stretching-list">
					<li>Feet together reach down touch your toes (don't bend knees!).</li>
					<li>Right foot over your left foot reach down touch your toes.</li>
					<li>Left foot over your right foot reach down touch your toes.</li>
					<li>Spread your feet out wide, touch your right foot with both hands (don't bend your knees).</li>
					<li>Spread your feet out wide, touch your left foot with both hands (don't bend your knees).</li>
					<li>Flamingo Stretch hold right foot behind.</li>
					<li>Flamingo Stretch hold left foot behind.</li>
					<li>Adductor Lean Stretch, keep both feet flat on the ground, lean over to your right side as both toes are still pointing in straight direction and your left foot is completely straight, till you feel the stretch in the inside part of leg (adductor muscle group).</li>
					<li>Adductor Lean Stretch, keep both feet flat on the ground, lean over to your left side as both toes are still pointing in straight direction and your right foot is completely straight, till you feel the stretch in the inside part of leg (adductor muscle group).</li>
				</ul>
			</div>
			<!--/.profile-content-->
		</div>
	</div>
</div>
<!--/.programs-->
<?php $this->load->view('client/include/footer'); ?>
</body>
</html>
