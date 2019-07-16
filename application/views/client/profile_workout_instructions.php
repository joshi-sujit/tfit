<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | WorkOut Instruction</title>
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
				<h1 class="profile-content-title">Workout Instructions</h1>
				<p class="mealplan-desc">The exercises are grouped into supersets. This mean the two exercises grouped together are completed one after the one and repeated for the number of set.</p>
				<p class="text-small">Example</p>
				<div class="table-responsive table-workout">
					<table class="table">
						<thead>
							<tr>
								<th>Exercise</th>
								<th>Sets</th>
								<th>Reps</th>
								<th width="10%">Video</th>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td>Incline Bench Press</td>
								<td>4</td>
								<td>30/15/12/10</td>
								<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
							</tr>
							<tr>
								<td>Cable Crossovers</td>
								<td></td>
								<td>20</td>
								<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
							</tr>
							<tr>
								<td colspan="4" class="rest"><span class="workout-rest">30 Second Rest<br>After Superset</span></td>
							</tr>
						</tbody>
					</table>
				</div>
				<!--/.table-workout-->
				<ul class="stretching-list">
					<li>The first exercise would be Incline Bench Press for 30 reps, followed by Cable Crossovers for 20 reps.</li>
					<li>Then Jump right back into Incline Bench Press for 15 reps, followed by Cable Crossovers for 20 reps.</li>
					<li>Repeat this process for the amount of given sets, in this case 4.</li>
				</ul>
				<p>After you complete the super set then you can rest for the amount of time given, in this case 30 secoinds.<br><i>Note: Some exercises are not grouped together. In that case repeated the same exercise for the amount of sets given.</i><br><br><strong>REST TIMES ARE KEY!! DO NOT PASS THE ALLOWED REST TIME.<br><br>Reps and Weight Range Breakdown:</strong></p>
				<ul class="stretching-list">
					<li>First and Foremost I want to tell you I like heavy lifting  I want a weight  that is going to challenge you and push you with proper form and technique!!</li>
					<li>Some of the rep ranges might seem high...correct!? Well yes exactly, I want high reps that doesn't mean I want you using some bullshit light weight from Babies R Us</li>
					<li>For Example if you are doing the high intensity and the Reps are (21/15/9) for Incline Bench & Barbell Curls.</li>
				</ul>
				<p>I will use me as an example.<br><br>I will start on the incline bench with 225 lbs I cannot perform 21 straight reps on incline of 225 reps I might knock out anywhere from 14 to 16 so I rerack it give myself a couple mins and go right back to finish my set of 21 reps  that doesn't mean I rest. I just hit muscle failure and regrouped with as least rest as possible wether it takes you 2 or 3<br><br>Goes to perform all 21 reps that is fine!! As soon as you finish that you move on to the barbell curls for 21 same exact thing pertains to that a heavy challenging weight!! No rest in between as soon as you finish that you go right into 15 incline presses with the same weight you started trust me you will be fatigued!! And back to the barbell curls for 15 and back to the round of 9 I don't want a designated rest period your only testing due to muscle failure not cus your tired become a machine and train like a fucking animal</p>
			</div>
			<!--/.profile-content-->
		</div>
	</div>
</div>
<!--/.programs-->
<div class="modal fade modal-vid" id="modal-vid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Video Demo</h4>
			</div>
			<div class="modal-body">
				<video id="fitness-vid" class="" controls preload="none" <source="" src="" type="video/mp4"></video>
			</div>
		</div>
		<!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>
<!-- /.modal video player--> 
<?php $this->load->view('client/include/footer') ?>
</body>
</html>
