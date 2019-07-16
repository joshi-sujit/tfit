<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Second Month</title>
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
				<h1 class="profile-content-title">Second Month</h1>
				<div class="form-group">
					<label for="select-day">Select Day:</label>
					<select class="form-control workout-days" id="month-2" url-link="<?=base_url()?>">
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						<option value="32">32</option>
						<option value="33">33</option>
						<option value="34">34</option>
						<option value="35">35</option>
						<option value="36">36</option>
						<option value="37">37</option>
						<option value="38">38</option>
						<option value="39">39</option>
						<option value="40">40</option>
						<option value="41">41</option>
						<option value="42">42</option>
						<option value="43">43</option>
						<option value="44">44</option>
						<option value="45">45</option>
						<option value="46">46</option>
						<option value="47">47</option>
						<option value="48">48</option>
						<option value="49">49</option>
						<option value="50">50</option>
						<option value="51">51</option>
						<option value="52">52</option>
						<option value="53">53</option>
						<option value="54">54</option>
						<option value="55">55</option>
						<option value="56">56</option>
					</select>
				</div>
				<p>If your not sure how to follow the workout check out the <a href="<?=base_url()?>user/getWorkoutInstruction">Workout Instructions</a> page. If after reading the instructions, you have any questions please email me at <a href="mailto:Tomas@tfit360.com">Tomas@tfit360.com</a>.</p>
				<hr>
				<?php if($gender == 1){ ?>
				<div class="monthly-workout">
					<h4 class="text-center day-title">Day 29</h4>
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
										<td>Squat Jumps</td>
										<td>1</td>
										<td>100</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>Squats</td>
										<td>5</td>
										<td>12</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>Stationary Lunges Barbell</td>
										<td></td>
										<td>20 (10 on each side)</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td colspan="4" class="rest"><span class="workout-rest">30 Second Rest<br>
											After Superset</span></td>
									</tr>
									<tr>
										<td>Leg Press</td>
										<td>4</td>
										<td>15</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>Leg Extensions</td>
										<td></td>
										<td>20</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td colspan="4" class="rest"><span class="workout-rest">30 Second Rest<br>
											After Superset</span></td>
									</tr>
									<tr>
										<td>Romanian Deadlifts Dumbbell</td>
										<td>4</td>
										<td>12</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>Hamstring Curls</td>
										<td></td>
										<td>15</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td colspan="4" class="rest"><span class="workout-rest">30 Second Rest<br>
											After Superset</span></td>
									</tr>
									<tr>
										<td>Walking Dumbbell Lunges</td>
										<td>6</td>
										<td>30 (15 on each side)</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td colspan="4" class="rest"><span class="workout-rest">1 minute Rest<br>
											After Superset</span></td>
									</tr>
									<tr>
										<td>Jumping Lunges</td>
										<td>1</td>
										<td>100</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
								</tbody>
							</table>
						</div>
				</div>
				<!--/.monthly-workout-->
				<?php } 
				else{
				?>
				
				<!--/female-->
				<div class="monthly-workout">
					<h4 class="text-center day-title">Day 29</h4>
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
										<td>DB Thrusters</td>
										<td>3</td>
										<td>30/25/20</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>Wall Squat Hold Hammer Curls</td>
										<td></td>
										<td>30/25/20</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>Squat Jumps</td>
										<td></td>
										<td>30/25/20</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>One Dumbbell Right Hand Overhead Right Side Lunge</td>
										<td>3</td>
										<td>30/25/20</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>One Dumbbell Right Hand Overhead Left Side Lunge</td>
										<td></td>
										<td>30/25/20</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>Jumping Lunges</td>
										<td></td>
										<td>30/25/20</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>One Hand DB Squat Overhead Snatch Right Side</td>
										<td>3</td>
										<td>30/25/20</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>One Hand DB Squat Overhead Snatch Left Side</td>
										<td></td>
										<td>30/25/20</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>Crusty Lunges</td>
										<td></td>
										<td>30/25/20</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
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
