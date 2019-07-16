<!doctype html>
<html class="no-js">
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Bootstrap Program</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
<?php 
$this->load->view('client/include/javascript_disabled');
$this->load->view('client/include/navigation'); ?>

<div class="bootcamp main-container">
	<div class="bootcamp-header main-header">
		<div class="container">
			<div>
				<h1 class="title">Bootcamp Program</h1>
				<p class="text-center text-small">Learn more about our bootcamp training program</p>
			</div>
		</div>
	</div>
	<!--/.bio-header-->
	<div class="bootcamp-wrapper">
		<div class="row bootcamp-what">
			<div class="container">
				<div class="bootcamp-text col-sm-6">
					<h1 class="title">What is Bootcamp?</h1>
					<p><?php foreach($what_bootcamp as $row)
					{
						echo $row->content_desc;
					}
					?></p>
				</div>
			</div>
		</div>
		<!--/.bootcamp-what-->
		<div class="row bootcamp-why">
			<div class="container">
				<div class="bootcamp-text col-sm-6 col-sm-offset-6">
					<h1 class="title">Why join Bootcamp?</h1>
			<p><?php foreach($why_bootcamp as $row_2)
					{
						echo $row_2->content_desc;
					}
					?></p>
				</div>
			</div>
		</div>
		<!--/.bootcamp-why-->
	</div>
	<!--/.bootcamp-wrapper-->
</div>
<!--/.programs-->
<?php $this->load->view('client/include/footer'); ?>
</body>
</html>
