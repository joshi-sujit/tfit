<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Training for Individual Toughness</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>

<body>
<?php 
	$this->load->view('client/include/javascript_disabled'); 
	$this->load->view('client/include/navigation'); 
?>
<div class="parallax-intro" id="slide-1">
	<div class="branding" data-0="opacity: 1" data-300="opacity: 0"></div>
	<div class="glass g1" data-0="background-position: 100% 0px;" data-end="background-position: 100% -100px;"></div>
	<div class="glass g5" data-0="background-position: 70% -400px;" data-end="background-position: 70% -2000px;"></div>
	<div class="glass g2" data-0="background-position: 90% 0px;" data-end="background-position: 90% -200px;"></div>
	<div class="glass g3" data-0="background-position: 70% 100px;" data-end="background-position: 70% -800px;"></div>
	<div class="parallax-person" data-0="background-position: 90% 60px;" data-end="background-position: 90% -1000px;"></div>
	<div class="glass g4" data-0="background-position: 80% -200px;" data-end="background-position: 80% -1500px;"></div>
	<div class="glass g5" data-0="background-position: 90% 0px;" data-end="background-position: 90% -1200px;"></div>
	<div class="container">
		<div class="parallax-info col-md-6" data-0="opacity: 1" data-300="opacity: 0">
			<h1 class="parallax-text">Welcome to TFIT360 Fitness</h1>
			<p class="parallax-desc"><?php 
										foreach($intro_result as $row){ 
											echo $row->content_desc;
										}?></p>
			<a href="<?=base_url()?>home/online" class="btn btn-danger btn-readmore">Read more</a> </div>
	</div>
	<div class="scroll-down">
		<p>Scroll down</p>
		<span class="chevron"></span> </div>
</div>
<!--/.parallax-intro-->
<div class="hero-unit">
	<div class="hero-info">
		<h1 class="hero-text">TFIT360 Bootcamp</h1>
		<a href="<?=base_url()?>home/program" class="btn btn-danger btn-readmore">Read more</a> </div>
	<div id="hero-carousel" class="owl-carousel owl-theme">
		
			<?php foreach($slider as $row_slider){?>
				<div class="item">
					<img src="<?=base_url()?>image/slider/<?=$row_slider->slider_image?>" alt="Transformation">
				</div>
			<?php } ?>
	</div>
	<svg width="100%" height="50px" viewBox="0 0 20 10" preserveAspectRatio=none class="hero-triangle">
	<polygon fill=#ffffff stroke-width=0 points="0,10 20,10 10,0" />
	</svg> </div>
<!--/.hero-unit-->
<div class="programs">
	<div class="container">
		<h1 class="title">90 DAY TRANSFORMATION PROGRAM</h1>
		<h5 class="subtitle">Sign up Now and begin the journey to better health and the body you always wanted!</h5>
		<p class="text-center text-small">Membership includes all of the following products and services:</p>
		<ul>
			<?php foreach($program as $row_program){ ?>
			<li>
				<div class="shape"> <a href="#"  class="hexoverlay hexagon"></a>
					<div class="details"> 
						<a href="javascript:void();" class="view program-modal" program-id="<?=$row_program->program_id?>">VIEW</a> </div>
					<div class="bg"></div>
					<div class="base"> 
					<img src="<?=base_url()?>image/program/<?=$row_program->image?>" alt="" /> </div>
				</div>
				<h6 class="program-name text-center"><?=$row_program->program_title?></h6>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<!--/.programs-->
<div class="video-section"> 
	<!-- 16:9 aspect ratio -->
	<div class="embed-responsive embed-responsive-16by9">
		<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/7MWbRijsSbg?fs=1&rel=0&showinfo=0&iv_load_policy=3&enablejsapi=1" frameborder="0" allowfullscreen></iframe>
	</div>
</div>
<!--/.video-section-->
<div class="testimonials ss-style-zigzag">
	<div class="container">
		<h1 class="title">Client Testimonials</h1>
		<span class="title-divider quote">&ldquo; &rdquo;</span>
		<div class="row">
			<div class="col-lg-12 text-center">
				<div id="owl-client-reviews" class="owl-carousel owl-theme">
					<?php foreach($testimonial as $testimonial_record){ ?>
					<div class="review">
						<p> <?php 
								$description = $testimonial_record->description;
								$first = str_replace("<p>",'"',$description);
								echo str_replace("</p>", '"', $first);
							?>
						</p>
						<h4><span class="name"><?=$testimonial_record->client_name?></span> </h4>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<svg width="100%" height="50px" viewBox="0 0 20 10" preserveAspectRatio=none class="hero-triangle">
	<polygon fill=#ffffff stroke-width=0 points="0,10 20,10 10,0" />
	</svg> </div>
</div>
<!--/.testimonials-->
<div class="transformation">
	<div class="container">
		<h1 class="title">Client Transformations</h1>
		<div id="client-group" class="owl-carousel owl-theme transformation-carousel">
			<?php foreach($transformation as $transformation_record){ ?>
			<div class="client">
				<div class="img-container"> <a class="venobox" data-gall="myGallery" href="<?=base_url()?>image/transformation/<?=$transformation_record->image?>">
				<img src="<?=base_url()?>image/transformation/<?=$transformation_record->image?>" alt="Client Transformation" class="img-circle"></a></div>
				<h6 class="client-name"><?=$transformation_record->client_name?></h6>
			</div>
			<?php }
			?>
		</div>
		<!--/.client-group-->
	</div>
</div>
<!--/.transformation-->

<!--program-modal->
<!-Called on AJAX request-->
<div class="modal fade modal-program" id="program" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			
		</div>
		<!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 



<?php $this->load->view('client/include/footer'); ?>
<script type="text/javascript">
/****show product-detail-container on mouse click****/
	$('.program-modal').click(function(e){
		e.preventDefault();
		
		var id = $(this).attr('program-id');
		$.ajax({
	    		type: "POST",
	    		url: "<?=base_url()?>home/getprogram",
	    		data: { 
				  		arg:id,
						
					},
					success: function(data) {
						//alert(data);
						$('.modal-content').html(data);
					}
				});
		$('#program').modal();
		
	});
</script>
</body>
</html>
