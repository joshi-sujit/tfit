<?php 
	$page = $this->uri->segment(2);
	if($page != "login"){
?>
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="footer-links">
					<li><a href="<?=base_url()?>home">Home</a></li>
					<li><a href="<?=base_url()?>home/bio">Bio</a></li>
					<li><a href="<?=base_url()?>home/online">TFIT360 Online</a></li>
					<li><a href="<?=base_url()?>home/program">Bootcamp</a></li>
					<li><a href="#" data-toggle="modal" data-target="#terms">Terms & conditions</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>&copy; 2014 TFIT360. All rights reserved</p>
				<span class="pull-right"><a href="#" title="Like us on facebook" target="_blank"><i class="fa fa-facebook"></i></a> <a href="#" title="Follow us on twitter" target="_blank"><i class="fa fa-twitter"></i></a> <a href="#" title="Subscribe to us on YouTube" target="_blank"><i class="fa fa-youtube-play"></i></a> <a href="#" title="Follow us on G+" target="_blank"><i class="fa  fa-google-plus"></i></a> <a href="#" title="Follow us on Instagram" target="_blank"><i class="fa fa-instagram"></i></a></span> </div>
		</div>
	</div>
</div>
<!--/.footer-->

<div class="modal fade modal-terms" id="terms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Terms & Conditions</h4>
			</div>
			<div class="modal-body">
				<ul>
					<li>Tomas Echavarria is not a licensed practitioner of dietetics and nutrition and does not provide dietetics or nutrition counseling.</li>
					<li>Tomas Echavarria provides customized fitness programs based on personal experiences. Accordingly, your personal results may vary.</li>
					<li>Tomas Echavarria strongly encourages anyone intending to begin a new exercise or diet program to first consult a physician, and Tomas Echavarria explicitly disclaims any and all liability that may result from following our program.</li>
				</ul>
			</div>
		</div>
		<!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 
<?php
	}
?>

<script>
$(document).ready(function(e) {
	outdatedBrowser({
		bgColor: '#f25648',
		color: '#ffffff',
		lowerThan: 'boxShadow',
		languagePath: ''
	})             
});            
</script> 
<script src="<?=base_url()?>client_files/js/jquery-easing.js"></script> 
<script src="<?=base_url()?>client_files/assets/skrollr/skrollr.min.js"></script> 
<script src="<?=base_url()?>client_files/assets/jquery-dotdotdot/jquery.dotdotdot.js"></script> 
<script src="<?=base_url()?>client_files/assets/owl-carousel/owl.carousel.min.js"></script> 
<script src="<?=base_url()?>client_files/assets/bootstrap-3.2.0/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>client_files/assets/venobox/venobox.js"></script>
<script src="<?=base_url()?>client_files/assets/jquery.growl/javascripts/jquery.growl.js"></script>
<script src="<?=base_url()?>client_files/assets/pickadate/js/picker.js"></script>
<script src="<?=base_url()?>client_files/assets/pickadate/js/picker.date.js"></script>
<script src="<?=base_url()?>client_files/js/custom.js"></script>