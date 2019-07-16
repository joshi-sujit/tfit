<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Supplement</title>
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
				<?php
					if($gender == 1){
				?>
				<h1 class="profile-content-title">Supplement Guide</h1>
				<h4 class="profile-content-subtitle">Supplements Shred Male</h4>
				<p class="text-small">Buy the His FAT LOSS Stack from 1 up nutrition</p>
				<ul class="supplement-list">
					<li class="supplement-title">CLA/L-Carnitine - Together in one softgel
						<div class="supplement-details">
						<p>CLA - Supports metabolic rate, lean muscle mass. Promotes recovery & fat loss. Also supports the breakdown of body fat & promotes healthy body composition.<br><br>
L Carnitine - Help convert fat into usable energy for the body. Supports increased metabolism</p>
						<span class="instruction-text">Instructions take 1 serving 3 times daily with each meal.</span>
						</div>
					</li>
					<li class="supplement-title">Pro Test
						<div class="supplement-details">
						<p>Increase free testosterone in conjunction with strength training. Promotes strength and performance in all aspects.</p>
						<span class="instruction-text">Instructions take first thing in the AM and 6 hours later you take the 2nd dose.</span>
						</div>
					</li>
					<li class="supplement-title">Pro Ripped
						<div class="supplement-details">
						<p>Promotes fat metabolism, energy, mood, & focus. Also helps fat use through sympathetic pathways. improves your tryglicerides hydrolysis (which means a carb is broken into its sugar molecules).</p>
						<span class="instruction-text">Instructions take first thing in the AM and 6 hours later you take the 2nd dose.</span>
						</div>
					</li>
					<span class="visit-link">The 3 mentioned above are all in the Fat Loss Stack<br>Visit <a href="http://www.1upnutrition.com" target="_blank">www.1upnurition.com</a> and use code "TFiT10" to get a big discount</span>
					<li class="supplement-title">Protein - Gifted Nutrition ULTIMATE ISO WHEY
						<div class="supplement-details">
						<p>By far the best protein in the market. After all my year in the fitness industry most complete and nutrition friendly, includes all of the following in one!
							<ul class="whey-list">
								<li>A 100% absorption rate</li>
								<li>30G of isolate protein</li>
								<li>Promotes supreme recovery and reconstruction of torn muscle fibers.</li>
								<li>Maintains a positive nitrogen balance, which is vital for muscle tissue growth.</li>
								<li>Supports healthy blood sugar levels, which curbs appetite.</li>
								<li>BCAAs (Leucine, Isoleucine, and Valine) are a unique group of amino acids that are metabolized directly in the muscle, so they are immediately utilized. They build new proteins and detoxify muscles, reducing cramping, fatigue and soreness.</li>
								<li>L-Glutamine increases protein synthesis, balances nitrogen levels, and prevents muscle breakdown during intense training.</li>
							</ul>
						</p>
						<span class="instruction-text">Instructions take 1 or 2 scoop immediately after working out.</span>
						</div>
					</li>
					<span class="visit-link">Visit <a href="http://www.giftednutrition.com" target="_blank">www.giftednutrition.com</a> and use code "TFiT10"</span>
				</ul>
				<!--/.male supplement guide-->
				<?php
					}
					elseif ($gender == 0) {
				?>
				<h1 class="profile-content-title">Supplement Guide</h1>
				<h4 class="profile-content-subtitle">Supplements Shred Female</h4>
				<p class="text-small">Buy the Her FAT LOSS Stack from 1 up nutrition</p>
				<ul class="supplement-list">
					<li class="supplement-title">CLA/L-Carnitine - Together in one softgel
						<div class="supplement-details">
						<p>CLA - Supports metabolic rate, lean muscle mass. Promotes recovery & fat loss. Also supports the breakdown of body fat & promotes healthy body composition.<br><br>
L Carnitine - Help convert fat into usable energy for the body. Supports increased metabolism</p>
						<span class="instruction-text">Instructions take first thing in the AM and 6 hours later you take the 2nd dose.</span>
						</div>
					</li>
					<li class="supplement-title">Her Daily Cleanse (Cleanse)
						<div class="supplement-details">
						<p>Promotes anti-bloating. Supports digestive health, & overall weight loss. May help detoxify your body.</p>
						<span class="instruction-text">Instructions take first thing in the AM.</span>
						</div>
					</li>
					<li class="supplement-title">Make Her Lean (Fat Burner)
						<div class="supplement-details">
						<p>Promotes fat metabolism, energy, mood, & focus. Also helps fat use through sympathetic pathways. improves your tryglicerides hydrolysis (which means a carb is broken into its sugar molecules).</p>
						<span class="instruction-text">Instructions take first thing in the AM and 6 hours later you take the 2nd dose.</span>
						</div>
					</li>
					<span class="visit-link">The 3 mentioned above are all in the Fat Loss Stack<br>Visit <a href="http://www.1upnutrition.com" target="_blank">www.1upnurition.com</a> and use code "TFiT10" to get a big discount</span>
					<li class="supplement-title">Protein - Gifted Nutrition ULTIMATE ISO WHEY
						<div class="supplement-details">
						<p>By far the best protein in the market. After all my year in the fitness industry most complete and nutrition friendly, includes all of the following in one!
							<ul class="whey-list">
								<li>A 100% absorption rate</li>
								<li>30G of isolate protein</li>
								<li>Promotes supreme recovery and reconstruction of torn muscle fibers.</li>
								<li>Maintains a positive nitrogen balance, which is vital for muscle tissue growth.</li>
								<li>Supports healthy blood sugar levels, which curbs appetite.</li>
								<li>BCAAs (Leucine, Isoleucine, and Valine) are a unique group of amino acids that are metabolized directly in the muscle, so they are immediately utilized. They build new proteins and detoxify muscles, reducing cramping, fatigue and soreness.</li>
								<li>L-Glutamine increases protein synthesis, balances nitrogen levels, and prevents muscle breakdown during intense training.</li>
							</ul>
						</p>
						<span class="instruction-text">Instructions take 1 scoop immediately after working out.</span>
						</div>
					</li>
					<span class="visit-link">Visit <a href="http://www.giftednutrition.com" target="_blank">www.giftednutrition.com</a> and use code "TFiT10"</span>
				</ul>
				<!--/.female supplement guide-->
				<?php
					}
				?>
			</div>
			<!--/.profile-content-->
		</div>
	</div>
</div>
<!--/.programs-->
<?php $this->load->view('client/include/footer') ?>
</body>
</html>
