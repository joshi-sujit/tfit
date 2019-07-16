-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2014 at 01:32 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tfit`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('70d0262a597cc98422eda0d567284726', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.104 Safari/537.36', 1415336384, 'a:5:{s:9:"user_data";s:0:"";s:7:"user_id";s:5:"use_1";s:6:"gender";s:1:"1";s:16:"logged_in_status";b:1;s:6:"expire";i:1;}'),
('7d1eba2f8fc33dc87b37634268c66c62', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:33.0) Gecko/20100101 Firefox/33.0', 1416817467, 'a:1:{s:9:"user_data";s:0:"";}'),
('8355d5252cb012b11ec688f8dcd7e60b', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:34.0) Gecko/20100101 Firefox/34.0', 1418890520, 'a:5:{s:9:"user_data";s:0:"";s:7:"user_id";s:5:"use_1";s:6:"gender";s:1:"1";s:16:"logged_in_status";b:1;s:6:"expire";i:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`) VALUES
('adm_1', 'admin', 'bb08bec40dcadddc426bb1426a0cd74a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill`
--

CREATE TABLE IF NOT EXISTS `tbl_bill` (
  `bill_no` varchar(255) NOT NULL,
  `payment_account` varchar(255) NOT NULL,
  `auth_code` varchar(255) NOT NULL,
  `card_type` varchar(255) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bill_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bill`
--

INSERT INTO `tbl_bill` (`bill_no`, `payment_account`, `auth_code`, `card_type`, `amount`, `status`, `user_id`, `type`, `payment_date`) VALUES
('100203170733', 'xxxxxxxxxxxx1111', 'VGSFT', 'VISA', '75.00', 'APPROVED', 'N/A', 'product', '2014-09-30 22:27:13'),
('100203171108', 'xxxxxxxxxxxx1111', 'NXSXK', 'VISA', '199.00', 'APPROVED', 'N/A', 'bootcamp', '2014-10-06 00:38:34'),
('100203171474', 'xxxxxxxxxxxx1111', 'FLVPC', 'VISA', '59.99', 'APPROVED', 'use_1', 'subscription', '2014-10-07 04:15:00'),
('100203171758', 'xxxxxxxxxxxx1111', 'XLRVY', 'VISA', '25.00', 'APPROVED', 'use_1', 'product', '2014-10-13 18:15:00'),
('100203173542', 'xxxxxxxxxxxx1111', 'FFBNJ', 'VISA', '149.99', 'APPROVED', 'use_3', 'subscription', '2014-10-31 05:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill_subscription`
--

CREATE TABLE IF NOT EXISTS `tbl_bill_subscription` (
  `subscription_id` varchar(255) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `plan_id` varchar(255) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subscription_start_date` datetime NOT NULL,
  `expiration_date` datetime NOT NULL,
  PRIMARY KEY (`subscription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bill_subscription`
--

INSERT INTO `tbl_bill_subscription` (`subscription_id`, `bill_no`, `user_id`, `plan_id`, `payment_date`, `subscription_start_date`, `expiration_date`) VALUES
('bil_1', '100203171474', 'use_1', 'pri_1', '2014-10-31 05:05:34', '2014-11-07 00:00:00', '2015-01-21 00:00:00'),
('bil_2', '100203173542', 'use_3', 'pri_3', '2014-10-31 05:10:59', '2014-11-05 00:00:00', '2015-11-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bootcamp_bill`
--

CREATE TABLE IF NOT EXISTS `tbl_bootcamp_bill` (
  `order_id` varchar(255) NOT NULL,
  `camp_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bootcamp_bill`
--

INSERT INTO `tbl_bootcamp_bill` (`order_id`, `camp_id`, `name`, `price`, `bill_no`) VALUES
('boo_1', 'cam_1', 'bootcamp', '100.00', '100203171108');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bootcamp_content`
--

CREATE TABLE IF NOT EXISTS `tbl_bootcamp_content` (
  `content_id` varchar(255) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_desc` mediumtext NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bootcamp_content`
--

INSERT INTO `tbl_bootcamp_content` (`content_id`, `content_title`, `content_desc`) VALUES
('con_1', 'What is Bootcamp?', 'T-Fit 360 is an innovative personal training company that specializes in\n "boot camp" style training sessions. Held in various outdoor settings, \nthese dynamic classes offer clients a challenging and fun way to improve\n their physical health. The energetic staff at T-fit create a unique \nenvironment that is motivational to push clients, but also friendly to \nensure participants stay in their comfort zone. In addition to expertise\n guidance, T-fit customers also have access to an extensive selection of\n cutting edge physical training equipment. No matter what fitness goals \nclients wish to achieve by attending T-Fit, the friendly staff will be \nwith them every step if the way to provide the drive and motivation \nnecessary to ensure their goals are reached.<br>'),
('con_2', 'Why join bootcamp?', 'To ensure that every T-Fit training session delivers the same intense, \nmotivational, and rewarding (result orientated) workout that the company\n was built on, every T-Fit trainer is personally trained by Founder and \nCEO, Tomas Echavarria. Mr. Echavarria provides a unique combination of \nphysical fitness expertise and personal skills that is seldom found in \nthe industry. His rare skill set allows him to push clients physically \nto get the most out of their training and at the same time develop a \ntrusting rapport with his clients. T-Fit differentiates itself from \ncompetitors by providing more than just an intense physical workout.  \nThe environment created is ideal for any level of training. T-Fit''s \ndynamic sessions are demanding enough for the most advanced participant,\n but allows beginners to develop at their own pace.<br>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE IF NOT EXISTS `tbl_content` (
  `content_id` varchar(255) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_desc` mediumtext NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`content_id`, `content_title`, `content_desc`) VALUES
('con_1', 'What is TFIT360 Online?', 'TFIT360 Online is a new way to experience the TFIT360 program. Now for \nthe first time you can receive our workout and meal plan programs from \nanywhere in the world! Our fast paced, high intensity programs are \ncustomized design to meet your individual goals! Whether your looking to\n bulk up, get shredded, tone up (female program) or anything in-between.\n Our diet plan is personalized based upon your bodies specific \nMarco-nutrient needs and are guaranteed to show results!<br>'),
('con_2', 'Home Page Introduction Message', 'T-Fit 360 is an innovative personal training company that specializes in\n “boot camp” style training sessions. Held in various outdoor settings, \nthese dynamic classes offer clients a challenging and fun way to improve\n their physical health.<br><br><br><br>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image_product`
--

CREATE TABLE IF NOT EXISTS `tbl_image_product` (
  `image_id` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_image_product`
--

INSERT INTO `tbl_image_product` (`image_id`, `image_name`, `product_id`) VALUES
('ima_10', 'pink-front.png', 'pro_4'),
('ima_11', 'pink-side.png', 'pro_4'),
('ima_12', 'gray-back.png', 'pro_5'),
('ima_13', 'gray-front.png', 'pro_5'),
('ima_14', 'gray-side.png', 'pro_5'),
('ima_15', 'blue-back.png', 'pro_6'),
('ima_16', 'blue-front.png', 'pro_6'),
('ima_17', 'blue-side.png', 'pro_6'),
('ima_9', 'pink-back.png', 'pro_4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item_bill`
--

CREATE TABLE IF NOT EXISTS `tbl_order_item_bill` (
  `order_id` varchar(255) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `quantity` varchar(5) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_item_bill`
--

INSERT INTO `tbl_order_item_bill` (`order_id`, `bill_no`, `product_id`, `rate`, `quantity`) VALUES
('ord_1', '100203170733', 'pro_4', '25', '1'),
('ord_2', '100203170733', 'pro_5', '25', '1'),
('ord_3', '100203170733', 'pro_6', '25', '1'),
('ord_4', '100203171758', 'pro_5', '25', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pricing_plan`
--

CREATE TABLE IF NOT EXISTS `tbl_pricing_plan` (
  `plan_id` varchar(255) NOT NULL,
  `plan_title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` varchar(255) NOT NULL,
  `duration` int(3) NOT NULL,
  PRIMARY KEY (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pricing_plan`
--

INSERT INTO `tbl_pricing_plan` (`plan_id`, `plan_title`, `description`, `price`, `duration`) VALUES
('pri_1', '3 Month ', '<div><div><div> <p>Three month membership for TFIT360 Training and Diet Program</p>\n </div></div></div><div>SKU: membership/3month</div><br>', '59.99', 3),
('pri_2', '6 Month Membership', '<div><div><div> <p>Six months membership for TFIT369 Training and Diet Program</p>\n </div></div></div><div>SKU: membership/6months</div><br>', '99.99', 6),
('pri_3', '1 Year Membership', '<div><div><div> <p>One year membership for TFIT369 Training and Diet Program</p>\n </div></div></div><div>SKU: membership/1year</div><br>', '149.99', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `rate`, `status`) VALUES
('pro_4', 'Pink T-Shirt', '25', 1),
('pro_5', 'Gray T-Shirt', '25', 1),
('pro_6', 'Blue T-shirt', '25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE IF NOT EXISTS `tbl_program` (
  `program_id` varchar(255) NOT NULL,
  `program_title` varchar(255) NOT NULL,
  `program_desc` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`program_id`, `program_title`, `program_desc`, `image`) VALUES
('pro_1', 'Personalized Workouts', '<div><div><div> <p>TFIT360 membership includes,<b> a personalized workout program based on your goals! </b>Our\n programs are design to meet you individual goals, whether you want to \ngain muscle, slim down or tone up(female program). Every TFIT360 workout\n is guaranteed to build muscle and burn fat!</p>\n </div></div></div> <p>Through\n our TFIT360 questionnaire we obtain the necessary information to create\n a personalized workout program bases your specific goals. This process \nensures the best possible results are reached with TFIT360 Online \nTraining, no matter what objective you wish to accomplish!</p>\n<p><b>Our personalized workouts include all of the following:</b></p>\n<ul><li>Both male and female programs available!</li><li>Easy to follow and detailed workouts. Everything is already set up for you, saving you time and hassle!</li><li>Perfectly designed with the most effective exercises, rep ranges, sets and rest times to reach an optimal level of results during your workouts!</li><li>Guaranteed to build muscle and burn fat!</li><li>You tell us your goals and objectives and we deliver a workout program that will accomplish the best results possible!</li><li>One free revaluation with each program cycle (3 months).</li><li>Continuous support! \nIf at any time you have questions about your program, please feel free \nto ask away. We are here to guide you every step of the way!&nbsp;</li></ul>\n\n<p><b>*And remember TFIT360 Online Training delivers a total package!</b>\n This means your membership includes a personalized meal plan built for \nyou, TFIT360 personalized workouts designed with your goals in mind, \nTFIT360 AB Ripper workouts, nutrition advice with health and diet \narticles and daily diet tips, Fitness advice with articles and daily \ntips, and an exercise library with video demonstrations of all our \nexercises.&nbsp;</p>\n<p><span>*<b>After joining TFIT360 will will be asked to fill out the TFIT360 questionnaire,</b></span>\n this information is vital to creating your customized program. Please \nallow up to 2 business days for us to process your questionnaire \nsubmission and design your program.</p>\n<p><span>*<b>We offer 100% money back guarantee.</b></span> If i don''t deliver what I promised then you get fully refunded what you paid!</p><br>', 'fitness.png'),
('pro_2', 'Personalized Meal Plans', '<div><div><div> <p>TFIT360 membership includes,<b> a customized meal plan just for YOU!</b>\n This means our plans are designed from the ground up to meet your \nspecific needs and goals. Let us help you start your diet off right!</p>\n </div></div></div> <p>\n	Through our TFIT360 questionnaire we obtain the necessary information \nto create a perfectly structured plan around your bodies calories and \nmacro-nutrient needs. This keeps you at optimal levels and ensures the \nbest results possible are being reached when using the TFIT360 program!</p>\n<p>	<b>Our customized meal plans include all of the following:</b></p>\n<ul><li>Both male and female plans available!</li><li>Easy to follow and detailed meal plan. Everything is already set up for you, saving you time and hassle!</li><li>Three unique meal plans per program cycle(3 months). To Keep your diet from getting stale!</li><li>Plans designed for optimal calorie and macro-nutrient (fats, carbs and proteins) levels based on your bodies needs. This way the best results possible are reached with the TFIT360 program!</li><li>Completely customizable. You tell us what you like and dislike and we fine tune your plan to meet your requirements!</li><li>One free revaluation with each program cycle (3 months).</li><li>Continuous support! \nIf at any time you have questions about your program, please feel free \nto ask away. We are here to guide you every step of the way!&nbsp;</li></ul>\n\n<p><b>*And remember TFIT360 Online Training delivers a total package!</b>\n This means your membership includes a personalized meal plan built for \nyou, TFIT360 personalized workouts designed with your goals in mind, \nTFIT360 AB Ripper workouts, nutrition advice with health and diet \narticles and daily diet tips, Fitness advice with articles and daily \ntips, and an exercise library with video demonstrations of all our \nexercises.&nbsp;</p>\n<p><span>*<b>After joining TFIT360 will will be asked to fill out the TFIT360 questionnaire,</b></span>\n this information is vital to creating your customized program. Please \nallow up to 2 business days for us to process your questionnaire \nsubmission and design your program.</p>\n<p>*<b>We offer 100% money back guarantee.</b> If i don''t deliver what I promised then you get fully refunded what you paid!</p><br>', 'meal-plan.jpeg'),
('pro_3', 'Ab-ripper', '<div><div><div> <p>TFIT360 membership includes,<b> access to our AB Ripper workouts designed to build you the best set of abs possible!</b>\n We have programs to deliver both shredded, deep cut abs for men and \nflat toned abs for women. The AB Ripper program is crafted to deliver \nthe best ab results!</p>\n </div></div></div> <p><b>Our AB Ripper workouts include all of the following:</b></p>\n<ul><li>Both male and female programs available!</li><li>Easy to follow and detailed workouts. Everything is already set up for you, saving you time and hassle!</li><li>Perfectly designed with the most effective exercises, rep ranges, sets and rest times to reach an optimal level of results during your workouts!</li><li>Guaranteed to build and strengthen your abdominals!</li><li>Continuous support! \nIf at any time you have questions about your program, please feel free \nto ask away. We are here to guide you every step of the way!&nbsp;</li></ul>\n\n<p><b>*And remember TFIT360 Online Training delivers a total package!</b>\n This means your membership includes a personalized meal plan built for \nyou, TFIT360 personalized workouts designed with your goals in mind, \nTFIT360 AB Ripper workouts, nutrition advice with health and diet \narticles and daily diet tips, Fitness advice with articles and daily \ntips, and an exercise library with video demonstrations of all our \nexercises.&nbsp;</p>\n<p><span>*<b>We offer 100% money back guarantee.</b></span> If i don''t deliver what I promised then you get fully refunded what you paid!</p><br>', 'ab-ripper.png'),
('pro_4', 'Nutrition Tips', '<div><div><div> <p><span>TFIT360 membership includes,<b> access to our Nutrition Library. A continuously growing collection of all the knowledge and experience TFIT360 has to offer!</b>\n This includes our daily diet tips, grocery list ideas, charb charts, \nsupplement guides, and much more, with new content added weekly.</span></p>\n </div></div></div> <p><b>The Nutrition Library includes:</b></p>\n<ul><li>Carb Charts, to show what carbs are better than others!</li><li>Supplement Guides, I only recommend what I personally use!</li><li>Grocery ideas and tips to complement your meal plan!</li><li>New content added all the time!</li><li>Continuous support! \nIf at any time you have questions about information posted, please feel \nfree to ask away. We are here to help you any way we can!</li></ul>\n\n<p><b>*And remember TFIT360 Online Training delivers a total package!</b>\n This means your membership includes a personalized meal plan built for \nyou, TFIT360 personalized workouts designed with your goals in mind, \nTFIT360 AB Ripper workouts, nutrition advice with health and diet \narticles and daily diet tips, Fitness advice with articles and daily \ntips, and an exercise library with video demonstrations of all our \nexercises.&nbsp;</p>\n<p><span>*<b>We offer 100% money back guarantee.</b></span> If i don''t deliver what I promised then you get fully refunded what you paid!</p><br>', 'nutrition.png'),
('pro_5', 'Fitness Tips', '<div><div><div> <p><span>TFIT360 membership includes, <b>access to our Nutrition Library. A continuously growing collection of all the knowledge and experience TFIT360 has to offer!</b></span> With the help of the tips and advice from our Fitness Library your transformation to better fitness is guaranteed a new edge!</p>\n </div></div></div> <div><b>The Fitness Library includes:</b></div>\n<div>&nbsp;</div>\n<ul><li>TFIT360 Workout tips.</li><li>TFIT360 Workout advice.</li><li>New content added regularly!</li><li>Continuous support! \nIf at any time you have questions about information posted, please feel \nfree to ask away. We are here to help you any way we can!</li></ul>\n\n<p><b>*And remember TFIT360 Online Training delivers a total package!</b>\n This means your membership includes a personalized meal plan built for \nyou, TFIT360 personalized workouts designed with your goals in mind, \nTFIT360 AB Ripper workouts, nutrition advice with health and diet \narticles and daily diet tips, Fitness advice with articles and daily \ntips, and an exercise library with video demonstrations of all our \nexercises.&nbsp;</p>\n<p><span>*<b>We offer 100% money back guarantee.</b></span> If i don''t deliver what I promised then you get fully refunded what you paid!</p><br>', 'fitness-tips.jpeg'),
('pro_6', 'Exercise Library', '<div><div><div> <p>TFIT360 membership includes,<b> access to the TFIT360 Exercise Library. A collection of video demonstrations of all the exercises used in the TFIT360 workouts.</b> These videos will help ensure that your form is correct and that your not putting yourself at risk of injury.</p>\n </div></div></div> <p><b>The Exercise Library includes:</b></p>\n<ul><li>Video demos of all the exercises used in the TFIT360 Program.</li><li>Continuous support! If at any time you have questions about our exercises, please feel free to ask away. We are here to help you any way we can!</li></ul>\n\n<p><b>*And remember TFIT360 Online Training delivers a total package!</b>\n This means your membership includes a personalized meal plan built for \nyou, TFIT360 personalized workouts designed with your goals in mind, \nTFIT360 AB Ripper workouts, nutrition advice with health and diet \narticles and daily diet tips, Fitness advice with articles and daily \ntips, and an exercise library with video demonstrations of all our \nexercises.&nbsp;</p>\n<p><span>*<b>We offer 100% money back guarantee.</b></span> If i don''t deliver what I promised then you get fully refunded what you paid!</p><br>', 'exerlib.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `slider_id` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `status`) VALUES
('sli_1', '2.JPG', 1),
('sli_2', '3.JPG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE IF NOT EXISTS `tbl_team` (
  `team_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`team_id`, `name`, `position`, `description`, `image`) VALUES
('tea_1', 'Tomas Echavarria', 'Founder & CEO', '<p>My name is Tomas Echavarria and I am the founder and CEO of TFIT360. I\n began TFIT360 in 2009 with one goal in mind, to leverage my knowledge \nof health and fitness to improve the lives of as many of my clients as I\n could. At first this was accomplished by offering my services as a \nprivate one-on-one trainer but, my desire to help more people better \ntheir lives continued to grow as well. This forced me to brainstorm \ndifferent approaches in order to meet my goal, which lead to TFIT360 \nBOOTCAMP. Bootcamp allowed me for the first time to deliver my fast \npaced, high intensity workouts in a group setting. The first Bootcamp \nsession was held in 2010, on Key Biscayne, Fl and since that time has \ngrown into several other locations. And were not done yet, we are \nconstantly on the look out for our next Bootcamp location.</p>\n<p>Throughout the whole Bootcamp experience I have had the privilege to \nhelp transform many lives. However, once again I found the desire \ngrowing inside me&nbsp; to assist more people in reaching their health goals.\n So it was back to the drawing board, which lead to the next chapter in \nTFIT360. In 2013, I took my services online in order to try to touch the\n greatest amount of lives possible. I began to offer my meal plans, \nworkouts, advice and tips that I had developed over the previous years.</p>\n<p>My mission is to improve the lives of my clients through a \ncombination of physical fitness and proper diet. I leverage my \ncombination of personal skills and physical fitness expertise to push \nclients physically to get the most out of their training, while at the \nsame time developing a trusting rapport. I always make myself available \nfor anyone who took the chance and believed in me. This is a lifestyle, \nnot a job!</p>\n<p>Born in 1989. I am young, hungry, disciplined, dedicated, and \naspiring to reach the pinnacle of my craft. I studied at Florida \nInternational University with a Degree in Exercise Kinesiology. I am \nlicensed as a National Association of Sports Medicine (NASM) certified \npersonal trainer, and also fluently speak both English and Spanish. My \nmotivation comes through my clients and I am continuously pushing \nforward to improve on myself each day, the only way to lead is by \nexample.</p><br>', 'tomasbio.jpg'),
('tea_2', 'Brad Plaza', 'Trainer', 'My name is Brad Plaza, I have been a part of the TFiT360 family for over\n a year now. Health and fitness have always been a part of my life. \nSince I could remember I was always involved in sports such as football,\n track and field, and working out regularly. These hobbies later grew \ninto a passion of mine as I got older. Not only has this lifestyle had a\n positive impact on me, but also my family and friends as well. I have \nencouraged myself and those around me to live a healthy life. A life \nthat promotes eating well, pushing your body to its limit, achieving \ngoals, self-discipline, and overall confidence. Now that these values \nhave become a part of my everyday life I look forward to sharing my \nknowledge and experience in the field of fitness and health with others.<br>', 'Brad.jpg'),
('tea_3', 'Melissa Gomez', 'Trainer', 'My name is Melissa Gomez and I am an exercise enthusiast, full of \nenergy! prior to TFiT360 I played softball and volleyball. When I \nstopped playing, my physical activity began to decrease while my weight \nbegan to increase. The summer before my senior year in college I joined \nTFiT360 Key Biscayne . With both hard work and dedication I lost 35lbs. \nWhile I lost weight, I also gained muscle, and built endurance. I \nrecently graduated with a bachelors in Health, from the University of \nFlorida. Due to the many positive results I have experienced at TFiT360,\n I have dedicated my life working with others and sharing my passion for\n staying in shape and maintaining a healthy and strong body.<br>', 'Melissa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE IF NOT EXISTS `tbl_testimonial` (
  `testimonial_id` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`testimonial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`testimonial_id`, `client_name`, `description`) VALUES
('tes_1', 'Francisco E, Brazil', 'Im so glad I purchased the 90 day transformation program when I did! I have lost 24 lbs so far and feeling better than ever!<br>'),
('tes_2', 'Katie S, Australia', 'GIRLS if you want results you have to try TFIT360''s 90 DAY TRANSFORMATION PROGRAM! Its absolutely AMAZING! I cannot believe the results I''m getting! THANK YOU!!<br>'),
('tes_3', 'Simion T, United States', 'I signed up to the 90 DAY TRANSFORMATION PROGRAM and within the first week I noticed a HUGE difference! By week 2 I had abs for the first time in my life! TFIT360''s plans and programs are legit!<br>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transformation`
--

CREATE TABLE IF NOT EXISTS `tbl_transformation` (
  `transformation_id` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`transformation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transformation`
--

INSERT INTO `tbl_transformation` (`transformation_id`, `client_name`, `description`, `image`) VALUES
('tra_1', 'Tomas', 'Tomas', 'tom.jpeg'),
('tra_2', 'Melissa', 'Melissa', 'melissa.jpeg'),
('tra_3', 'Alex', 'Alex', 'alex.jpeg'),
('tra_4', 'Brad', 'Brad', 'brad.jpeg'),
('tra_5', 'Chris', 'Chris', 'chris.jpeg'),
('tra_6', 'Chuck', 'Chuck', 'chuck.jpeg'),
('tra_7', 'Gabby', 'Gabby', 'gaby.jpeg'),
('tra_8', 'Jimmy', 'Jimmy', 'jimmy.jpeg'),
('tra_9', 'Mary', 'Mary', 'mary.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `meal_plan` varchar(255) NOT NULL,
  `time_zone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `random_no` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `email`, `password`, `meal_plan`, `time_zone`, `gender`, `random_no`, `status`) VALUES
('use_1', 'maleuser1', 'its.suzit@gmail.com', 'f3628aa35c8fb029404da218c5892990', 'male bulk', 'Asia/Kathmandu', 1, '3490253913638', 1),
('use_2', 'maleuser2', 'sujan_khadgi2000@yahoo.com', 'f3628aa35c8fb029404da218c5892990', 'male bulk', 'Asia/Kathmandu', 1, '27728670884469', 1),
('use_3', 'femaleuser', 'abc@gmail.com', 'f3628aa35c8fb029404da218c5892990', 'standard female mealplan', 'Asia/Kathmandu', 0, '89429171616563', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venue_bootcamp`
--

CREATE TABLE IF NOT EXISTS `tbl_venue_bootcamp` (
  `venue_id` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `local_address` varchar(255) NOT NULL,
  PRIMARY KEY (`venue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venue_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_venue_schedule` (
  `schedule_id` varchar(255) NOT NULL,
  `venue_id` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE IF NOT EXISTS `tbl_video` (
  `video_id` varchar(255) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`video_id`, `video_link`) VALUES
('vid_1', 'http://www.youtube.com/embed/7MWbRijsSbg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
