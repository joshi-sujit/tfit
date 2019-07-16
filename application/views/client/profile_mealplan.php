<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Meal Plan</title>
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
			<?php
				if($gender == 1){
			?>
			<div class="profile-content">
				<h1 class="profile-content-title">Meal Plan</h1>
				<h4 class="profile-content-subtitle">Your shred meal plan</h4>
				<p class="text-small">Follow these instructions</p>
				<p class="mealplan-desc">I want you to start on the shred male diet and then switch over to the carb cycle after week 4. I just want some clean eating the first weeks shock your system a little, the only difference I want you adding 1 tablespoon of almond butter per day!! If you notice the diet has 2 sheets switch the diet every day from sheet 1 to sheet 2.<br><br>Below is the download links for the your TFIT360 Diet Plan. Click on a link to save a copy of your program and don't worry we'll keep a copy for you just in case.</p>
				<a href="<?=base_url()?>files/TFiT SHRED MALE DIET.xls" target="_blank" class="btn btn-danger btn-login btn-download" title="Download TFIT Shred Meal Diet Chart"><i class="fa fa-download"></i> &nbsp; TFIT Shred Meal Diet Chart</a>
				<span class="mealplan-desc">Don't forget to check out the all the nutrition content under the Nutrition Center menu. This includes a <a href="<?=base_url()?>user/groceryList">grocery list</a> with all the foods used in the TFIT360 meal plan, a <a href="<?=base_url()?>user/carbChart">carb chart</a> to show you what carbs are good and which are bad, a <a href="<?=base_url()?>user/getSupplement">supplement guide</a> to help take your health and fitness to the next level , and a lot more health and <a href="<?=base_url()?>user/nutrition">nutrition information</a>.<br><br><strong>If you have any questions about the program please email me at <a href="mailto:Tomas@tfit360.com">Tomas@tfit360.com</a></strong>.
				</span>
			</div>
			<!--/.profile-content male-->
			<?php 
			}
			elseif($gender == 0){
			?>
			
			<div class="profile-content">
				<h1 class="profile-content-title">Meal Plan</h1>
				<h4 class="profile-content-subtitle">Your meal plan</h4>
				<p class="text-small">Follow these instructions</p>
				<p class="mealplan-desc">Remember don't be scared of food feed your body!! Just make sure your feeding it with the right foods keep it clean lots of vegetables in order to keep it alkalized allowing as much oxygen to your blood flow, do not deprive it from food! You'll notice how I have 3 sheets in the excel diet, I want you to go 2 days on the first sheet, 2 days on the 2nd sheet and 2 days on the 3rd sheet and keep repeating.<br><br>Below is the download links for the your TFIT360 Diet Plan. Click on a link to save a copy of your program and don't worry we'll keep a copy for you just in case.</p>

				<a href="<?=base_url()?>files/TFIT FEMALE DIET.xls" target="_blank" class="btn btn-danger btn-login btn-download" title="Download TFIT Shred Meal Diet Chart"><i class="fa fa-download"></i> &nbsp; TFIT Shred Meal Diet Chart</a>
				<span class="mealplan-desc">Don't forget to check out the all the nutrition content under the Nutrition Center menu. This includes a <a href="<?=base_url()?>user/groceryList">grocery list</a> with all the foods used in the TFIT360 meal plan, a <a href="<?=base_url()?>user/carbChart">carb chart</a> to show you what carbs are good and which are bad, a <a href="<?=base_url()?>user/getSupplement">supplement guide</a> to help take your health and fitness to the next level , and a lot more health and <a href="<?=base_url()?>user/nutrition">nutrition information</a>.<br><br><strong>If you have any questions about the program please email me at <a href="mailto:Tomas@tfit360.com">Tomas@tfit360.com</a></strong>.
				</span>
			</div>
			<!--/.profile-content female-->
			<?php
				}
			?>
		</div>
	</div>
</div>
<!--/.programs-->
<?php $this->load->view('client/include/footer'); ?>
</body>
</html>
