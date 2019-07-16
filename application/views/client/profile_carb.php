<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Carb Chart</title>
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
		<?php $this->load->view('client/include/profile_sidebar'); ?>
		<div class="col-md-9">
			<div class="profile-content">
				<h1 class="profile-content-title">Carb Chart</h1>
				<a href="#" class="printer-friendly" title="Display a printer friendly version of this page.">Printer-friendly version</a>
				<p class="mealplan-desc">Complex carbohydrates are high-fiber foods, which improve your digestion. They help stabilize the blood sugar, keep your energy at an even level, and help you feel satisfied longer after your meal.</p>
				<div class="table-responsive table-carb">
					<table class="table">
						<thead>
							<tr>
								<th colspan="5">Some examples of healthy foods containing complex carbohydrates:</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Spinach</td>
								<td>Greens</td>
								<td>Apples</td>
								<td>Lettuce</td>
								<td>Asparagus</td>
							</tr>
							<tr>
								<td>PrunesWater</td>
								<td>Apricots</td>
								<td>Dried Zucchini</td>
								<td>Pears</td>
								<td>Plums</td>
							</tr>
							<tr>
								<td>Artichokes</td>
								<td>Museli</td>
								<td>Strawberries</td>
								<td>Oranges</td>
								<td>Cabbage</td>
							</tr>
							<tr>
								<td>Brown Rice</td>
								<td>Yams</td>
								<td>Celery</td>
								<td>Multi-Grain Bread</td>
								<td>Carrots</td>
							</tr>
							<tr>
								<td>Cucumbers</td>
								<td>Pinto Beans</td>
								<td>Dill Pickles</td>
								<td>Soybeans</td>
								<td>Radishes</td>
							</tr>
							<tr>
								<td>Skim Milk</td>
								<td>Lentils</td>
								<td>Broccoli</td>
								<td>Beans</td>
								<td>Garbanzo Beans</td>
							</tr>
							<tr>
								<td>Brussels</td>
								<td>Sprouts</td>
								<td>Cauliflower</td>
								<td>Eggplant</td>
								<td>Soy Milk</td>
							</tr>
							<tr>
								<td>Lentils</td>
								<td>Onions</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				<p class="mealplan-desc">Simple carbohydrates are more refined, are usually found in foods with fewer nutrients, and tend to be less satisfying and more fattening.</p>
				<div class="table-responsive table-carb">
					<table class="table">
						<thead>
							<tr>
								<th colspan="5">Some examples of foods containing simple carbohydrates:</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Table Sugar</td>
								<td>Corn Syrup</td>
								<td>Fruit Juice</td>
								<td>Candy</td>
							</tr>
							<tr>
								<td>Bread made with white flour</td>
								<td>Pasta made with white flour</td>
								<td>All baked goods made with white flour</td>
								<td>Most packaged cereal</td>
							</tr>
							<tr>
								<td>Soda pop, such as Coke®, Pepsi®, Mountain Dew®, etc.</td>
								<td>Cake</td>
								<td></td>
								<td></td>
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
<?php $this->load->view('client/include/footer'); ?>
</body>
</html>
