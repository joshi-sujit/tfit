<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Ab Ripper WorkOut</title>
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
				<h1 class="profile-content-title">Ab Ripper Workout</h1>
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
								<td>Russian Twist</td>
								<td>1</td>
								<td>100</td>
								<td><a href="#" class="watch-vid" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4" title="Watch Video Demo"><i class="fa fa-play-circle"></i></a></td>
							</tr>
							<tr>
								<td>V-UPS</td>
								<td></td>
								<td>1 Min</td>
								<td><a href="#" class="watch-vid" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"  title="Watch Video Demo"><i class="fa fa-play-circle"></i></a></td>
							</tr>
							<tr>
								<td>Leg Lifts</td>
								<td></td>
								<td>1 Min</td>
								<td><a href="#" class="watch-vid" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4"  title="Watch Video Demo"><i class="fa fa-play-circle"></i></a></td>
							</tr>
							<tr>
								<td>Suit Cases</td>
								<td></td>
								<td>1 Min</td>
								<td><a href="#" class="watch-vid" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4" title="Watch Video Demo"><i class="fa fa-play-circle"></i></a></td>
							</tr>
							<tr>
								<td>Bicycle Kicks</td>
								<td></td>
								<td>1 Min</td>
								<td><a href="#" class="watch-vid" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4" title="Watch Video Demo"><i class="fa fa-play-circle"></i></a></td>
							</tr>
							<tr>
								<td>Toe Touches</td>
								<td></td>
								<td>1 Min</td>
								<td><a href="#" class="watch-vid" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4" title="Watch Video Demo"><i class="fa fa-play-circle"></i></a></td>
							</tr>
							<tr>
								<td>Stabalizers</td>
								<td></td>
								<td>1 Min</td>
								<td><a href="#" class="watch-vid" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4" title="Watch Video Demo"><i class="fa fa-play-circle"></i></a></td>
							</tr>
							<tr>
								<td>Scissor Kicks</td>
								<td></td>
								<td>1 Min</td>
								<td><a href="#" class="watch-vid" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4" title="Watch Video Demo"><i class="fa fa-play-circle"></i></a></td>
							</tr>
							<tr>
								<td>Knee Tucks</td>
								<td></td>
								<td>1 Min</td>
								<td><a href="#" class="watch-vid" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4" title="Watch Video Demo"><i class="fa fa-play-circle"></i></a></td>
							</tr>
							<tr>
								<td>Mountain Climbers</td>
								<td></td>
								<td>1 Min</td>
								<td><a href="#" class="watch-vid" data-src="http://www.tfit360.com/sites/default/files/exerciselib/vids/inclinebarbellbenchpress.mp4" title="Watch Video Demo"><i class="fa fa-play-circle"></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
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
				<h4 class="modal- title">Video Demo</h4>
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
