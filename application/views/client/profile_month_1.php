<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | First Month</title>
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
				<h1 class="profile-content-title">First Month</h1>
				<div class="form-group">
					<label for="select-day">Select Day:</label>
					<select class="form-control workout-days" id="month-1" url-link="<?=base_url()?>">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
					</select>
				</div>
				<p>If your not sure how to follow the workout check out the <a href="<?=base_url()?>user/getWorkoutInstruction">Workout Instructions</a> page. If after reading the instructions, you have any questions please email me at <a href="mailto:Tomas@tfit360.com">Tomas@tfit360.com</a>.</p>
				<hr>
				<?php if($gender == 1){ ?>
				<div class="monthly-workout">
					<h4 class="text-center day-title">Day 1</h4>
					<a href="#" class="printer-friendly" title="Display a printer friendly version of this page.">Printer-friendly version</a>
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
									<td colspan="4" class="rest"><span class="workout-rest">30 Second Rest<br>
										After Superset</span></td>
									</tr>
									<tr>
										<td>Incline Dumbell Flys</td>
										<td>4</td>
										<td>12-15</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>Flat Bench Press</td>
										<td></td>
										<td>8-12</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td colspan="4" class="rest"><span class="workout-rest">30 Second Rest<br>
											After Superset</span></td>
										</tr>
										<tr>
											<td>Dips</td>
											<td>4</td>
											<td>15</td>
											<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
										</tr>
										<tr>
											<td>Pushups</td>
											<td></td>
											<td>20</td>
											<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
										</tr>
										<tr>
											<td colspan="4" class="rest"><span class="workout-rest">30 Second Rest<br>
												After Superset</span></td>
											</tr>
											<tr>
												<td>Barbell Curls</td>
												<td>5</td>
												<td>12</td>
												<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
											</tr>
											<tr>
												<td colspan="4" class="rest"><span class="workout-rest">Heavy/1 minute</span></td>
											</tr>
											<tr>
												<td>Static 90 Degree Hold</td>
												<td>4</td>
												<td>1 Min</td>
												<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
											</tr>
											<tr>
												<td>Open Palm Arm Curls</td>
												<td></td>
												<td>1 Min</td>
												<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
											</tr>
											<tr>
												<td colspan="4" class="rest"><span class="workout-rest">1 Minute Rest<br>
													After Superset</span></td>
												</tr>
												<tr>
													<td>Incline Bench Twist Curls</td>
													<td>4</td>
													<td>12 on each side</td>
													<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
												</tr>
												<tr>
													<td>Hammer Curls</td>
													<td></td>
													<td>15 on each side</td>
													<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
												</tr>
												<tr>
													<td colspan="4" class="rest"><span class="workout-rest">1 Minute Rest<br>
														After Superset</span></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<!--/.monthly-workout-->
				<?php 
				}else{
				?>
				
				<!--/.female-->
				<div class="monthly-workout">
					<h4 class="text-center day-title">Day 1</h4>
					<a href="#" class="printer-friendly" title="Display a printer friendly version of this page.">Printer-friendly version</a>
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
				<td>Standard Barbell Squats</td>
				<td>4</td>
				<td>30/25/20/15</td>
				<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
			</tr>
			<tr>
				<td>Jumping Lunges</td>
				<td></td>
				<td>40</td>
				<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
			</tr>
			<tr>
				<td colspan="4" class="rest"><span class="workout-rest">1 minute Rest<br>
					After Superset</span></td>
			</tr>
			<tr>
				<td>Walking DB Lunges</td>
				<td>4</td>
				<td>30 (15 each side)</td>
				<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
			</tr>
			<tr>
				<td>Leg Extension</td>
				<td></td>
				<td>30/25/20/15</td>
				<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
			</tr>
			<tr>
				<td colspan="4" class="rest"><span class="workout-rest">1 minute Rest<br>
					After Superset</span></td>
			</tr>
			<tr>
				<td>Step-Up Kickbacks (right)</td>
				<td>2</td>
				<td>40</td>
				<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
			</tr>
			<tr>
				<td>Step-Up Kickbacks (left)</td>
				<td></td>
				<td>40</td>
				<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
			</tr>
			<tr>
				<td colspan="4" class="rest"><span class="workout-rest">1 minute Rest<br>
					After Superset</span></td>
			</tr>
			<tr>
				<td>Kettlebell Sumo Squats</td>
				<td>4</td>
				<td>30</td>
				<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
			</tr>
			<tr>
				<td>Wall Squats Sits with Hammer Curls</td>
				<td></td>
				<td>30</td>
				<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
			</tr>
			<tr>
				<td colspan="4" class="rest"><span class="workout-rest">1 Minute Rest<br>
					After Superset</span></td>
			</tr>
		</tbody>
	</table>
					</div>
				</div>
				<!--/.monthly-workout-->
				<?php
			}
			?>
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
<?php $this->load->view('client/include/footer'); ?>
</body>
</html>
