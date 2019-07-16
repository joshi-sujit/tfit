<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Fitness and Nutrition Information</title>
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
			if($type == "nutrition"){
				switch($value){
					case 1:
			?>
			<div class="profile-content">
				<h1 class="profile-content-title">Keys To Eating Healthier</h1>
				<p>When beginning a diet, most will decrease caloric consumption in order to drop pounds. The body's natural response to fewer calories is to increase the hunger pangs to let you know that something has changed. There is also the deprivation mentality that can happen on a deeper level: we feel as though we cannot have certain foods or as much food as we are accustomed to and we naturally begin to crave or miss that way of living. Remember the body will do everything to maintain balance and change can be stressful.<br><br>In order to succeed at the weight loss / restriction calorie diet, the body will have to adjust to a new set point and deal with the associated hunger. There are ways that you can naturally suppress the appetite and remain true to the dietary meal plan.</p>
				<ul class="stretching-list">
					<li>Anything that is opened in a wrapper has bad news written all over it. No chocolate, candy, granola bars none of that at any time cut that out of your eating plans.</li>
					<li>Cut down on SIMPLE carbohydrates such as rice, pasta, bread none of that!! Carbs you should eat them during lunch time or breakfast no carbs at night because they will be stored while your at rest and will turn into fat. Focus on your carbs being whole grain or wheat gives you a lot more nutrients and takes longer to digest in that sense those carbs will be utilized for energy a lot longer.</li>
					<li>The way your food is COOKED is extremely important, no fried food at any time. Just because your on a diet, does not mean you cant eat good, just focus on lean muscle mass. Go WHITE LEAN PROTEIN So make sure you eat your chicken, turkey, or fish and make sure it is grilled, broiled, or boiled.</li>
					<li>Five to six meals a day, just smaller meals throughout the day. Every 2 to 3 hours have a small meal, the key to being able to do this is having pre made snacks maybe slices of turkey, ham, protein shake or fruit. This is for the fact of the feeling of satiety so your hunger mechanism does not trigger & you don't reach over for that cheat.</li>
					<li>Eat your vegetables these are the carbs you should be eating, eat them as green as possible. They are very low calorie dense and full of fiber and nutrients, try to stay away from carrots and corn which are normally a little high in sugar content.</li>
					<li>Talking about fruits, fruits are essential in the human body have a lot of different nutrients that the body requires. Though a lot of people don’t know fruits is the ONLY thing that is 100% carbs but these are the type of carbs that I recommend you to be consuming, In small doses everything is good to a certain degree just because I say you can eat this don’t overload. Small portions is the key because fruits are made up of vitamins, water & sugar so keep to a minimum if trying to lose weight.</li>
					<li>Liquid is a huge variable in a diet, a lot of people tend to be very strict and on point with their diet but mess it up by drinking their calories. No sodas or any fountain drinks, try to stay away from those sugary drinks those calories will catch up to you and add up, go heavy on water. Though I know a lot of people don’t like drinking water with their meals, so try to stay on low calorie drinks that don't consist of calories. Even a diet coke once in a while isn’t that bad and doesn’t carry calories but water is preferred, but don’t over load on these natural juices either because juices do carry a lot of sugar.</li>
					<li>Condiments this is were a lot of people tend to bite themselves in the butt!! Healthy grilled chicken with a salad & then you go and add curry mustard and ranch dressing and just ruin your healthy meal. No people don't be that person if your going to sacrifice the foods you love do it correct, Mustard, Low Sodium Ketchup, natural herbs, Vinegar the list goes on in the Grocery List.</li>
					<li>Don't be scared of failure. Live your life to the full potential.</li>
				</ul>
			</div>
			<!--/.keys to eating healthy-->
			<?php break; 
				case 2:
			?>
			<div class="profile-content">
				<h1 class="profile-content-title">Simple Vs Complex Carbohydrates</h1>
				<p>Many health experts recommend cutting down or eliminating sugar and other simple carbohydrates, and increasing the servings of complex carbohydrates in the diet. Yes, some carbohydrates are actually good for you. Carbohydrates are necessary to your health, because every cell in your body uses them for energy. In fact, your brain can only use carbohydrates for energy.<br><br>Unfortunately, over-consumption of sugar and other highly refined carbohydrates has been associated with a higher incidence of diabetes, cardiovascular disease, and even breast cancer. And eating refined carbs can, over time, result in almost uncontrollable sugar cravings. Sugars and other simple carbohydrates are a leading factor in the worldwide obesity epidemic.<br><br>With the popularity of low-carb diets, many people are afraid to eat any carbohydrates, but it is important to distinguish between the health-robbing effects of simple sugars and other carbs, and the health-giving properties of complex carbohydrates.<br><br>Complex carbohydrates are high-fiber foods, which improve your digestion. They help stabilize the blood sugar, keep your energy at an even level, and help you feel satisfied longer after your meal 50% more than regular white bread<br><br>On the other hand, sugar and simple carbohydrates can alter your mood, lead to cravings and compulsive eating, cause swings in your blood-sugar levels, and cause weight gain in most people.<br><br>If you are trying to eliminate simple sugars and carbohydrates from your diet, but you don’t want to refer to a list all the time, here are some suggestions:<br><br>Read the labels. If the label lists sugar, sucrose, fructose, corn syrup, white or “wheat” flour, they contain simple carbohydrates. If these ingredients are at the top of the list, they may contain mostly simple carbohydrates, and little else. They should be avoided. Look for foods that have not been highly processed or refined. Choose a piece of fruit instead of fruit juice, which is very high in naturally occurring simple sugars. Choose whole grain breads instead of white bread. Choose whole grain oatmeal instead of packaged cold cereals.<br><br><strong>The closer you get to nature, the closer you get to health.</strong></p>
			</div>
			<!--/.simple vs complex carbs-->
			<?php break; 
				case 3:
			?>
			<div class="profile-content">
				<h1 class="profile-content-title">Top 10 Mistakes Made By Active People</h1>
				<p>Here is a list of the top ten mistakes made by active people that I have come across during my career.<br><br><strong>Top 10 nutritional mistakes by active people</strong></p>
				<ul class="stretching-list">
					<li>Skipping breakfast-not eating breakfast is like asking your car to start without any gas. Skipping breakfast just means you'll be hungrier later which can make it difficult to control your diet and body fat.</li>
					<li>Not eating before a workout- providing the body with food for energy allows for a better more productive exercise session.</li>
					<li>Waiting too long after exercise to eat- within two hours of your post workout. carbs help replenish muscle glycogen stores and the protein facilitates the repair of damaged muscle tissue.</li>
					<li>Replacing meals with energy bars or replacement drinks- sure they're convenient, but too often energy bars offer little more nutrition than your avg. candy bar. and replacement drinks may lack adequate fiber. When it comes to eating nutritiously theres really no substitute for healthy whole foods.</li>
					<li>Not consuming the right amount of calories for the amount of activity you do- your caloric intake should be sufficient to support your active lifestyle, but not so abundant that you are not allowing yourself to reach your goals.</li>
					<li>Believing that exercise means you can eat whatever you want- most of us have to learn this lesson the hard way. whether you exercise a little or a lot, you still need to follow a healthy, balanced diet and watch your portion sizes.</li>
					<li>Not drinking the right amount of fluids- dehydration can be a serious problem, especially if you exercise in hot humid environments. drinking fluids before during and after exercise will help you maintain adequate hydration levels.</li>
					<li>Drinking juice drinks people think that because say orange juice for example is a fruit is healthy that its not fattening and that's one of the main problems most people are undereducated with.</li>
					<li>Way you cook your food.</li>
					<li>Jumping on the latest diet craze in search of that elusive edge- its tempting to believe that there is some magic formula out there but honestly that only last so long you will be right back to your old ways once you learn that your losing it the wrong way.</li>
				</ul>
			</div>
			<!--/.top 10 mistakes-->
			<?php break; 
				case 4:
			?>
			<div class="profile-content">
				<h1 class="profile-content-title">My Personal Top Ten Foods</h1>
				<ol class="stretching-list">
					<li><strong class="text-uppercase">Wild Salmon</strong><br>A great source of omega-3 fatty acids coupled with great taste.</li>
					<li><strong class="text-uppercase">Chicken Breast</strong><br>A standard low-fat protein that goes with anything.</li>
					<li><strong class="text-uppercase">Egg Whites</strong><br>A convenient source of low-fat protein that can be added to any meal to balance carbohydrates. A great snack is a couple of hard boiled eggs in which the egg yolk has been removed and replaced with hummus.</li>
					<li><strong class="text-uppercase">Broccoli/Cauliflower</strong><br>Both are rich in fiber, vitamins, and minerals, with the least amount of carbohydrates. Cooking Cauliflower, then mashing it up & baking, makes a great substitute for mashed potatoes.</li>
					<li><strong class="text-uppercase">Spinach</strong><br>A powerhouse of vitamins and minerals. Makes a great source of carbohydrates.</li>
					<li><strong class="text-uppercase">Red Peppers</strong><br>There is no better way to add color to a plate than red peppers. They're loaded with antioxidants and protective phytochemicals, not to mention fiber.</li>
					<li><strong class="text-uppercase">Barley/Oatmeal</strong><br>These are two great grains, since they are rich in soluble fiber that slows the entry of any carbohydrate into the bloodstream.</li>
					<li><strong class="text-uppercase">Black Beans</strong><br>Another great source of soluble fiber.</li>
					<li><strong class="text-uppercase">Berries</strong><br>The best dessert known. Rich in antioxidants and taste great too.</li>
					<li><strong class="text-uppercase">Extra Virgin Olive Oil</strong><br>My number one favorite fat, as it contains powerful antioxidants known as polyphenols.</li>
				</ol>
			</div>
			<!--/.top 10 foods-->
			<?php break; 
				case 5:
			?>
			<div class="profile-content">
				<h1 class="profile-content-title">12 Must Have Foods</h1>
				<ol class="stretching-list">
					<li><strong class="text-uppercase">ASPARAGUS</strong><br>Loaded with folic acid, vitamin C, glutathione precursors.</li>
					<li><strong class="text-uppercase">AVOCADO</strong><br>Contains a lot of Vitamin E, glutathione, and monounsaturated fat that doesn't require an insulin response.</li>
					<li><strong class="text-uppercase">ONIONS</strong><br>Slice raw onions on salad. Contains many important flavonoids, especially quercetin, which supports the immune system, improves prostate health, and is perhaps the major nutrient responsible for the “French Paradox”.</li>
					<li><strong class="text-uppercase">SPINACH</strong><br>Contains lutein, which helps prevent macular degeneration and is instrumental in both lung and heart health. It is also one of the best sources of calcium.</li>
					<li><strong class="text-uppercase">WILD BLUEBERRIES</strong><br> Contain flavonoids that not only improve the macula and retina of the eye, but also help the neurons in the brain communicate with one another.</li>
					<li><strong class="text-uppercase">POMEGRANATE JUICE</strong><br>Is a powerful antioxidant that has been shown to assist in plaque regression in both the carotid arteries and the heart.</li>
					<li><strong class="text-uppercase">FREE-RANGE BUFFALO</strong><br>An outstanding source of protein with minimal saturated fat. No hormones, antibiotics, or chemicals are added. Grass-Fed Buffalo also contains precious omega-3s.</li>
					<li><strong class="text-uppercase">WILD ALASKAN SALMON</strong><br>Outstanding protein source with the vital carotenoid called astaxanthin. This carotenoid prevents lipid peroxidation and assists in mending DNA breakdown products. It is seventeen times more powerful than  pycnogenol and fifty times more powerful than Vitamin E. It is the carotenoid that gives the orange color to salmon flesh.</li>
					<li><strong class="text-uppercase">BROCCOLI</strong><br>Contains sulfur compounds that assist in detoxifying the body. A major source of cancer-preventing compounds such as sulforaphane and indole-3-carbinol. Steamed with fresh garlic and olive oil, broccoli is a heart saver.</li>
					<li><strong class="text-uppercase">ALMONDS</strong><br>Great Monounsaturated fat containing precious gamma tocopherol, a vital nutrient that neutralizes the perioxynitrite radical, a dangerous free radical that causes destruction to cellular endothelial membranes.</li>
					<li><strong class="text-uppercase">SEAWEED</strong><br>Contains all fifty six minerals and especially natural iodine, which are needed for the thyroid gland. Magnesium, chlorophyll, and alginates are also vital for optimum health.</li>
					<li><strong class="text-uppercase">GARLIC</strong><br>Whole baked garlic cloves will not only help blood pressure and cholesterol but will help detoxify the body from heavy metals, especially mercury and cadmium. Garlic was used during WW2 as Russian Penicillin, as it also neutralizes dozens of bacteria, viruses, and fungi. It is a perfect nutraceutical./li>
				</ol>
			</div>
			<!--/.12 must have foods-->
			<?php break; 
				case 6:
			?>
			<div class="profile-content">
				<h1 class="profile-content-title">TFIT360 Snacks</h1>
				<ul class="stretching-list">
					<li>Almonds 7</li>
					<li>Sugar Free Jello</li>
					<li>Protein Shakes (make sure low in fat 7 carbs)</li>
					<li>PB2 (powdered peanut butter)</li>
					<li>Blueberries</li>
					<li>Raspberries</li>
					<li>Grapefruit 1/2</li>
					<li>Turkey Slices</li>
					<li>Herbalife Protein Mix (wild berry)</li>
					<li>Sugar Free Gum</li>
					<li>Protein Bars</li>
					<li>Crystal Light (Raspberry Lemonade)</li>
					<li>*Quest (cookies & cream) healthier than the Atkins lower in almost every aspect plus extremely high in fiber.</li>
				</ul>
			</div>
			<!--/.tfit snacks-->
			<?php break; 
				case 7:
			?>
			<div class="profile-content">
				<h1 class="profile-content-title">How To Read A Nutrition Label</h1>
				<p>Calories are made up of 3 Macronutrients <strong>FAT, CARBOHYDRATES, PROTEIN</strong><br><br>1g of Fat = 9 Calories<br>1g of Carbs = 4 Calories<br>1g of Protein = 4 Calories<br><br><strong>FIBER</strong> - Very important in the diet<br><br><strong>SODIUM</strong> - Increases blood pressure because it holds excess fluid in the body<br><br><strong>POTTASIUM</strong> - controlling blood pressure because potassium lessens the effects of sodium. The recommended daily intake of potassium 4,700 milligrams per day.<br><br><strong>SUGAR</strong> - Falls under Carbohydrates its definitely something you want to stay away from.<br><br><strong>FATS</strong> - Not all FAT is the same you have good fats & bad fats the good ones you want to look for when looking at a nutrition label. Monounsaturated and Polyunsaturated fats are the good ones the ones you want to avoid TRANS fat is a NoNo and saturated Fat is one to stay away from also.</p>
			</div>
			<!--/.read nutrition level-->
			<?php break; 
				default:
			?>
			<div class="profile-content">
				<h1 class="profile-content-title">NO INFORMATION FOUND</h1>
			</div>
			<?php
				}
			}elseif($type == "fitness"){
				switch($value){
				case 1:
			?>				
			<div class="profile-content">
				<h1 class="profile-content-title">Tips For Better ABs</h1>
				<h4 class="profile-content-subtitle">STOP DRINKING CARBONATED DRINKS</h4>
				<p>Carbonated soft drinks or the so called soda pop cause the stomach to bulge, which is a serious precondition for developing distended stomach, since the food stays in the stomach for a long period of time.</p>
				<h4 class="profile-content-subtitle">DO HIGH INTENSITY EXERCISE</h4>
				<p>Since fat needs oxygen to dilute, HIIT is the best way to burn the unneeded fat. The best period of the day is early morning or after weight training, since in these periods glycogen depots are depleted and fat is used for main source of energy.</p>
				<h4 class="profile-content-subtitle">DECREASE CARBS IN THE EVENING</h4>
				<p>Carbohydrates are the main energy source for human body, we need them to have strength and to be active during the day, but their increased intake, especially late at night leads to deposition of fat mainly in the waist and hip area. when we take carbohydrates during the day, when we are awake and performing different physical activities, we have the chance to burn them, but when taking them in the evening before going to bed there is no way to burn them, since the metabolism is much slower during sleep and the extra carbs don't get utilized and turn into fat.</p>
				<h4 class="profile-content-subtitle">NO BIG MEALS</h4>
				<p>Big meals lead to distended stomach. In order to have a good physique you not only need defined abs, but also a flat stomach. Maybe you have noticed the stomachs of most bodybuilders in loose state. In order to avoid distended stomach the food intake must be in smaller meals, but in shorter periods of times. The small intake is digested fast and when you eat more often that leads to metabolism acceleration.</p>
				<h4 class="profile-content-subtitle">USE L-CARNITINE</h4>
				<p>L-Carnitine is the only absolutely harmless supplement, which helps for diluting the fat. Not only is it absolutely harmless, but it even plays the role of heart protector. Actually its main function is to transport the fat cells through the cell membrane in order for them to be used as energy. l- Carnitine's effect is not as visible as of the thermogen fat burners, but unlike them it will not do any harm to the organism. The fluid form is recommended, since it is assimilate much faster. Recommended dosage is 2.5 gr (0.1oz) before training and before going to bed.</p>
				<h4 class="profile-content-subtitle">DRINK ALOT OF WATER</h4>
				<p>Drink a lot of water, but just like with food, don't drink too much at once, since you will overtax the heart and distend the stomach. Also you should not drink water at least 30 mins before eating because it dilutes stomach fluids and that obstructs digestion. Recommended water intake is 3 to 5 liters (0.8 to 1.3gal) per day.</p>
			</div><!--/.better abs-->

			<?php
				break;
				default:
			?>
			<div class="profile-content">
				<h1 class="profile-content-title">NO INFORMATION FOUND</h1>
			</div
			<?php		
				}
			}
			?>

		</div>
	</div>
</div>
<!--/.programs-->
<?php $this->load->view('client/include/footer'); ?>
</body>
</html>
