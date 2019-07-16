<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Third Month</title>
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
				<h1 class="profile-content-title">Third Month</h1>
				<div class="form-group">
					<label for="select-day">Select Day:</label>
					<select class="form-control workout-days" id="month-3" url-link="<?=base_url()?>">
						<option value="57">57</option>
						<option value="58">58</option>
						<option value="59">59</option>
						<option value="60">60</option>
						<option value="61">61</option>
						<option value="62">62</option>
						<option value="63">63</option>
						<option value="64">64</option>
						<option value="65">65</option>
						<option value="66">66</option>
						<option value="67">67</option>
						<option value="68">68</option>
						<option value="69">69</option>
						<option value="70">70</option>
						<option value="71">71</option>
						<option value="72">72</option>
						<option value="73">73</option>
						<option value="74">74</option>
						<option value="75">75</option>
						<option value="76">76</option>
						<option value="77">77</option>
						<option value="78">78</option>
						<option value="79">79</option>
						<option value="80">80</option>
						<option value="81">81</option>
						<option value="82">82</option>
						<option value="83">83</option>
						<option value="84">84</option>
						<option value="85">85</option>
						<option value="86">86</option>
						<option value="87">87</option>
						<option value="88">88</option>
						<option value="89">89</option>
						<option value="90">90</option>
					</select>
				</div>
				<p>If your not sure how to follow the workout check out the <a href="<?=base_url()?>user/getWorkoutInstruction">Workout Instructions</a> page. If after reading the instructions, you have any questions please email me at <a href="mailto:Tomas@tfit360.com">Tomas@tfit360.com</a>.</p>
				<hr>
				<?php if($gender == 1){ ?>
				<div class="monthly-workout">
					<h4 class="text-center day-title">Day 57</h4>
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
									<td>Incline Treadmill</td>
									<td>1</td>
									<td>5 min</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td>Barbell Lunges</td>
									<td>5</td>
									<td>24 (12 each side)</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td>Wall Squat Holds (Weighted)</td>
									<td></td>
									<td>30 sec</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td colspan="4" class="rest"><span class="workout-rest">1 minute Rest<br>
										After Superset</span></td>
									</tr>
									<tr>
										<td>DB Step Ups (Right)</td>
										<td>4</td>
										<td>15</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td>DB Step Ups (Left)</td>
										<td></td>
										<td>15</td>
										<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
									</tr>
									<tr>
										<td colspan="4" class="rest"><span class="workout-rest">1 minute Rest<br>
											After Superset</span></td>
										</tr>
										<tr>
											<td>Squats</td>
											<td>4</td>
											<td>20</td>
											<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
										</tr>
										<tr>
											<td>Barbell Straight Leg Dead Lifts</td>
											<td></td>
											<td>10</td>
											<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
										</tr>
										<tr>
											<td colspan="4" class="rest"><span class="workout-rest">1 minute Rest<br>
												After Superset</span></td>
											</tr>
											<tr>
												<td>Hack Squats</td>
												<td>5</td>
												<td>15</td>
												<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
											</tr>
											<tr>
												<td>Leg Extension</td>
												<td></td>
												<td>25</td>
												<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
				<!--/.monthly-workout-->
				<?php
				}else{ ?>
				
				<!--female-->
				<div class="monthly-workout">
					<h4 class="text-center day-title">Day 57</h4>
					<a href="#" class="printer-friendly" title="Display a printer friendly version of this page.">Printer-friendly version</a>
					<div class="table-responsive table-workout">
						<p class="text-center"><strong>No rest between set!</strong></p>
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
									<td>3</td>
									<td>21/15/9</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td>Barbell Curls</td>
									<td></td>
									<td>21/15/9</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td>Bench Press</td>
									<td>3</td>
									<td>21/15/9</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td>Hammer Curls</td>
									<td></td>
									<td>21/15/9</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td>Dips</td>
									<td>3</td>
									<td>21/15/9</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td>Pushups</td>
									<td></td>
									<td>21/15/9</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td>Inside Preacher Bar Curls</td>
									<td></td>
									<td>21/15/9</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td>Incline DB Press</td>
									<td>3</td>
									<td>21/15/9</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td>Burpee Hammer Curls</td>
									<td></td>
									<td>21/15/9</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td>Incline Bench Twist Curls</td>
									<td>3</td>
									<td>21/15/9</td>
									<td><a href="#" class="watch-vid" title="Watch Video Demo" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"><i class="fa fa-play-circle"></i></a></td>
								</tr>
								<tr>
									<td>Decline Bench Press</td>
									<td></td>
									<td>21/15/9</td>
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
