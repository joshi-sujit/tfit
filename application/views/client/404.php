<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>404 - Page not found</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
<?php $this->load->view('client/include/javascript_disabled'); ?>
<div class="container">
	<div class="error-404">
		<h1 class="title">Sorry , the page you're looking for could not be found!</h1>
		<img src="<?=base_url()?>img/404.png" alt="404" class="img-404">
		<div class="btn-row">
			<a href="#" class="btn btn-danger" onclick="history.back()">Go to Previous Page</a>
			<a href="<?=base_url()?>home" class="btn btn-default">Go to Home Page</a>
		</div>
	</div>
</div>

</body>
<script>
$(window).load(function(){
	$('body').delay(1000).queue(function(){
		$(this).addClass('loaded').clearQueue;
	});
});

</script>
</html>
