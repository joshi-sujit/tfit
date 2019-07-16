<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Meet the team</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
<?php 
$this->load->view('client/include/javascript_disabled');
$this->load->view('client/include/navigation'); ?>
<div class="team main-container">
	<div class="team-header main-header">
		<div class="container">
			<div>
				<h1 class="title">Meet the team</h1>
				<p class="text-center text-small">Click on members to view details</p>
			</div>
			<div class="team-group"> 
				<div class="team-wrapper active">
					<img src="<?=base_url()?>img/team/tom.png" alt="team_member" class="team-member active" target="#tom"> 
					<span class="arrow"></span>
				</div>
				<div class="team-wrapper">
					<img src="<?=base_url()?>img/team/silhouette-1.png" alt="team_member" class="team-member" target="#melissa">
				</div>
				<div class="team-wrapper">
					<img src="<?=base_url()?>img/team/silhouette-2.png" alt="team_member" class="team-member" target="#brad">
				</div>
			</div>
			<!--/.team-group-->
		</div>
	</div>
	<!--/.bio-header-->
	<?php
		$i = 1;
		foreach($team_result as $row){
			for($i=1;$i<=$count;$i++){
				$check = "tea_".$i;
				if($row->team_id == $check){
					$mem_name[$i] = $row->name;
					$mem_position[$i] = $row->position;
					$mem_desc[$i] = $row->description;
				}	
			}
		}
	?>
	<div class="container team-container">
		<div class="team-text col-md-8 col-md-offset-2">
			<div class="member-info active" id="tom">
				<h3 class="member-name"><?php echo $mem_name[1]; ?></h3>
				<p class="text-small member-position"><?php echo $mem_position[1]; ?></p>
				<p><?php echo $mem_desc[1]; ?></p>
			</div>
			<!--/.member-info--> 
			<div class="member-info" id="melissa">
				<h3 class="member-name"><?php echo $mem_name[3]; ?></h3>
				<p class="text-small member-position"><?php echo $mem_position[2]; ?></p>
				<p><?php echo $mem_desc[3]; ?></p>
			</div>
			<!--/.member-info--> 
			<div class="member-info" id="brad">
				<h3 class="member-name"><?php echo $mem_name[2]; ?></h3>
				<p class="text-small member-position"><?php echo $mem_position[2]; ?></p>
				<p><?php echo $mem_desc[2]; ?></p>
			</div>
			<!--/.member-info--> 
		</div>
		<!--/.team-text--> 
	</div>
	<!--/.team-container-->
</div>
<!--/.team-->
<?php $this->load->view('client/include/footer'); ?>
</body>
</html>
