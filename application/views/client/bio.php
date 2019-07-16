<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | About TOMAS ECHAVARRIA</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>

<body>
<?php $this->load->view('client/include/javascript_disabled');
$this->load->view('client/include/navigation');  ?>
			<?php foreach($bio_result as $row){
				$description = $row->description;
				$position = $row->position;
				$name = strtoupper($row->name);
			}
			?>

<div class="bio main-container">
	<div class="bio-header main-header">
	<div class="glass g5" data-0="background-position: 40% -100px;" data-end="background-position: 40% -300px;"></div> <div class="glass g3" data-0="background-position: 60% 0px;" data-end="background-position: 60% -200px;"></div> <div class="glass g4" data-0="background-position: 55% -100px;" data-end="background-position: 55% -200px;"></div>
		<div class="container">
			<div class="parallax" data-200="opacity:1" data-300="opacity:0">
				<h1 class="title"><?=$name?></h1>
				<p class="text-center text-small"><?=$position?></p>
			</div>
		</div>
	</div>
	<!--/.bio-header-->
	<div class="ss-style-zigzag">
		<div class="container bio-container">
		<div class="bio-text col-md-8 col-md-offset-2">
			<?=$description?>
		</div>
		</div>
	</div>
	<!--/.ss-style-zigzag-->
</div>
<!--/.programs-->
<?php $this->load->view('client/include/footer'); ?>
</body>
</html>
