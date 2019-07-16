<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Nutrition Information</title>
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
				<h1 class="profile-content-title">Nutrition Information</h1>
				<div class="profile-posts">
					<h4 class="profile-content-subtitle"><a href="<?=base_url()?>user/getNutrition/1" class="posts">Keys To Eating Healthier</a></h4>
					<p>When beginning a diet, most will decrease caloric consumption in order to drop pounds. The body's natural response to fewer calories is to increase the hunger pangs to let you know that something has changed. There is also the deprivation mentality that can happen on a deeper level: we feel as though we cannot have certain foods or as much food as we are accustomed to and we naturally begin to crave or miss that way of living. Remember the body will do everything to maintain balance and change can be stressful.</p>
					<a href="<?=base_url()?>user/getNutrition/1" class="post-more">Read more...</a>
				</div>
				<div class="profile-posts">
					<h4 class="profile-content-subtitle"><a href="<?=base_url()?>user/getNutrition/2" class="posts">Simple Vs. Complex Carbohydrates</a></h4>
					<p>Many health experts recommend cutting down or eliminating sugar and other simple carbohydrates, and increasing the servings of complex carbohydrates in the diet. Yes, some carbohydrates are actually good for you. Carbohydrates are necessary to your health, because every cell in your body uses them for energy. In fact, your brain can only use carbohydrates for energy.</p>
					<a href="<?=base_url()?>user/getNutrition/2" class="post-more">Read more...</a>
				</div>
				<div class="profile-posts">
					<h4 class="profile-content-subtitle"><a href="<?=base_url()?>user/getNutrition/3" class="posts">Top 10 Mistakes Made By Active People</a></h4>
					<p>Here is a list of the top ten mistakes made by active people that I have come across during my career.</p>
					<a href="<?=base_url()?>user/getNutrition/3" class="post-more">Read more...</a>
				</div>
				<div class="profile-posts">
					<h4 class="profile-content-subtitle"><a href="<?=base_url()?>user/getNutrition/4" class="posts">My Personal Top Ten Foods</a></h4>
					<p>This is a list of my personal top ten favorite foods and the reasons why I eat them.</p>
					<a href="<?=base_url()?>user/getNutrition/4" class="post-more">Read more...</a>
				</div>
				<div class="profile-posts">
					<h4 class="profile-content-subtitle"><a href="<?=base_url()?>user/getNutrition/5" class="posts">12 Must Have Foods</a></h4>
					<p>This list of TFIT360 power-foods are foods every diet can benefit from.</p>
					<a href="<?=base_url()?>user/getNutrition/5" class="post-more">Read more...</a>
				</div>
				<div class="profile-posts">
					<h4 class="profile-content-subtitle"><a href="<?=base_url()?>user/getNutrition/6" class="posts">TFIT360 Snacks</a></h4>
					<p>Sometimes you need a quick snack to get you through to the next meal. Here is a list of good choices for situations like these.</p>
					<a href="<?=base_url()?>user/getNutrition/6" class="post-more">Read more...</a>
				</div>
				<div class="profile-posts">
					<h4 class="profile-content-subtitle"><a href="<?=base_url()?>user/getNutrition/7" class="posts">How To Read A Nutrition Label</a></h4>
					<p>Calories are made up of 3 Macronutrients FAT, CARBOHYDRATES, PROTEIN<br><br>1g of Fat = 9 Calorie<br><br>1g of Carbs = 4 Calories</p>
					<a href="<?=base_url()?>user/getNutrition/7" class="post-more">Read more...</a>
				</div>
			</div>
			<!--/.profile-content-->
		</div>
	</div>
</div>
<!--/.programs-->
<?php $this->load->view('client/include/footer'); ?>
</body>
</html>
