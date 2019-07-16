<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Grocery List</title>
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
				<h1 class="profile-content-title">Grocery List</h1>
				<a href="#" class="printer-friendly" title="Display a printer friendly version of this page.">Printer-friendly version</a>
				<div class="table-responsive table-grocery">
					<table class="table">
						<tbody>
							<tr>
								<td><div class="grocery-card">
										<h5 class="grocery-type">PROTEIN (Type 1)</h5>
										<h5 class="grocery-title">Fast Digestive Protein</h5>
										<ul>
											<li>Whey Protein</li>
											<li>Chicken Breast</li>
											<li>Tilapia</li>
											<li>Turkey Breast</li>
											<li>Lean Ground Turkey</li>
											<li>Lean Ground Chicken</li>
											<li>Egg Whites</li>
											<li>Tuna</li>
											<li>Haddock</li>
											<li>Orange Roughy</li>
										</ul>
									</div></td>
								<td><div class="grocery-card">
										<h5 class="grocery-type">PROTEIN (Type 2)</h5>
										<h5 class="grocery-title">Slow Digestive Protein</h5>
										<ul>
											<li>Casein Protein</li>
											<li>Lean Ground Beef</li>
											<li>Chicken Thigh</li>
											<li>Filet Mignon</li>
											<li>Fat Free Cottage Cheese</li>
											<li>Fat Free Greek Yogurt</li>
											<li>Salmon</li>
										</ul>
									</div></td>
							</tr>
							<tr>
								<td><div class="grocery-card">
										<h5 class="grocery-type">CARBOHYDRATES</h5>
										<ul>
											<li>Sweet Potato</li>
											<li>Oatmeal</li>
											<li>Yams</li>
											<li>Quinoa</li>
											<li>Rice Cakes</li>
										</ul>
									</div></td>
								<td><div class="grocery-card">
										<h5 class="grocery-type">POSTWORKOUT CARBOHYDRATES</h5>
										<ul>
											<li>Bannana</li>
											<li>Dried Apricot</li>
											<li>Sweet Potatoe</li>
											<li>Cantaloupe</li>
											<li>Low Fat Popcorn</li>
										</ul>
									</div></td>
							</tr>
							<tr>
								<td><div class="grocery-card">
										<h5 class="grocery-type">FRUITS</h5>
										<ul>
											<li>Grapefruit</li>
											<li>BlueBerries</li>
											<li>Rasberries</li>
											<li>Apple</li>
											<li>Pear</li>
											<li>Cantaloupe</li>
										</ul>
									</div></td>
								<td><div class="grocery-card">
										<h5 class="grocery-type">VEGETABLES</h5>
										<ul>
											<li>Kale</li>
											<li>Broccoli</li>
											<li>Asparagus</li>
											<li>Baby Spinach</li>
											<li>Green Beans</li>
											<li>Cucumbers</li>
											<li>Onion</li>
											<li>Snow Peas</li>
											<li>Bell Peppers</li>
											<li>Mushrooms</li>
										</ul>
									</div></td>
							</tr>
							<tr>
								<td><div class="grocery-card">
										<h5 class="grocery-type">GOOD FATS</h5>
										<ul>
											<li>Omega 3 Fish Oil</li>
											<li>Almonds (All 3 Raw and limit only to 7 max a day)</li>
											<li>Cashews</li>
											<li>Walnuts</li>
											<li>Olive Oil</li>
											<li>Flax Seed Oil</li>
											<li>Hemp Chia</li>
										</ul>
									</div></td>
								<td><div class="grocery-card">
										<h5 class="grocery-type">CONDIMENTS</h5>
										<h5 class="grocery-title">Use Low Sodium</h5>
										<ul>
											<li>Low Carb Ketchup</li>
											<li>Tobasco</li>
											<li>Cholula Hot Sauce</li>
											<li>Mustard</li>
											<li>Dijon Mustard</li>
											<li>Fat Free Dressings</li>
											<li>Garlic</li>
											<li>Black Pepper Cinnamon</li>
											<li>Cajun Spices</li>
											<li>Low Carb Salsa</li>
										</ul>
									</div></td>
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
