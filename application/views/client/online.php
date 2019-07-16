<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Online Training Programs</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
<?php 
	$this->load->view('client/include/javascript_disabled');
	$this->load->view('client/include/navigation');
	@$status = $this->session->userdata('logged_in_status');
	foreach($content_result as $row){
		$online_desc = $row->content_desc;
	}
?>
<?php
	if(@$notification == "new"){ ?>
<div class="alert alert-success alert-dismissible alert-fixed-top" role="alert">
  <button type="button" class="close" data-dismiss="alert"  style="font-size:14px;"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Thank you for registering!</strong> Please subscribe to the packages below to gain full access!
</div>
<?php
	}elseif (@$notification == "expired") {
?>
	<div class="alert alert-danger alert-dismissible alert-fixed-top" role="alert">
  <button type="button" class="close" data-dismiss="alert"  style="font-size:14px;"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Sorry!</strong> Your subscription has expired. Please subscribe again!
</div>
<?php
	}
	@$msg = $this->uri->segment(3);
	if(@$msg == "expired") {
?>
	<div class="alert alert-danger alert-dismissible alert-fixed-top" role="alert">
  <button type="button" class="close" data-dismiss="alert"  style="font-size:14px;"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Sorry!</strong> Your subscription has expired. Please subscribe again!
</div>
<?php
	}
	?>
<div class="online main-container">
	<div class="online-header main-header">
	<div class="glass g5" data-0="background-position: 40% -100px;" data-end="background-position: 40% -300px;"></div> <div class="glass g3" data-0="background-position: 60% 0px;" data-end="background-position: 60% -200px;"></div> <div class="glass g4" data-0="background-position: 55% -100px;" data-end="background-position: 55% -200px;"></div>
		<div class="container">
			<div class="parallax" data-200="opacity:1" data-300="opacity:0">
				<h1 class="title">WELCOME TO TFIT360</h1>
				<p class="text-center text-small">Start the journey to a new you with TFIT360 and its unique 6 Phase 90 Day Transformation Program that has changed over 1000s of lifestyle worldwide</p>
			</div>
		</div>
	</div>
	<!--/.bio-header-->
	<div class="ss-style-zigzag">
		<div class="container online-content main-content">
			<div class="online-text col-md-8 col-md-offset-2">
				<p class="text-small">What is TFIT360 Online?</p>
				<span class="paragraph">
				<p><?=$online_desc?></p>
				</span>
				<!--/.paragraph-->
				<p class="text-small">90 day transformation program includes:</p>
				<ul class="online-features">
					<li>
						<h4 class="feature-title">Customized Diet Plan</h4>
						<p class="feature-desc">Designed for your own needs and specific goals! Broken down by macros</p>
					</li>
					<li>
						<h4 class="feature-title">Carb Cycle Diet</h4>
						<p class="feature-desc">To give your diet an extra edge</p>
					</li>
					<li>
						<h4 class="feature-title">Customized workout Programs</h4>
						<p class="feature-desc">Designed for your own needs and specific goals</p>
					</li>
					<li>
						<h4 class="feature-title">AB Ripper Workouts</h4>
						<p class="feature-desc">For shredded deep-cutted abs</p>
					</li>
					<li>
						<h4 class="feature-title">Grocery List</h4>
						<p class="feature-desc">All the foods that are used in our Diet Plans</p>
					</li>
					<li>
						<h4 class="feature-title">Supplement Lists</h4>
						<p class="feature-desc">Information with my personal recomendations</p>
					</li>
					<li>
						<h4 class="feature-title">Snack Ideas/Lists</h4>
						<p class="feature-desc">To help guide you to healthier choices</p>
					</li>
					<li>
						<h4 class="feature-title">List of best fruits</h4>
						<p class="feature-desc">That will keep you fueled and feeling great</p>
					</li>
					<li>
						<h4 class="feature-title">Top Ten Best Foods</h4>
						<p class="feature-desc">My personal superfood recomendations</p>
					</li>
					<li>
						<h4 class="feature-title">Nutrition Guidelines</h4>
						<p class="feature-desc">With my tips and advice articles your gurarenteed a leg up</p>
					</li>
					<li>
						<h4 class="feature-title">Diet revaluation</h4>
						<p class="feature-desc">Just incase your diet needs to be spiced up</p>
					</li>
					<li>
						<h4 class="feature-title">Nutrition Labels broken down</h4>
						<p class="feature-desc">To help give you an idea of what exactly your eating</p>
					</li>
					<li>
						<h4 class="feature-title">AB tips year round</h4>
						<p class="feature-desc">To keep your beach body no matter the time of year</p>
					</li>
					<li>
						<h4 class="feature-title">And Much More!</h4>
					</li>
				</ul>
				<!--/.online-features-->
				<div class="row packages">
					<p class="text-center text-small">Membership Packages</p>
					<?php
						$formId = 1;
						foreach($plan_result as $plan_record){
					?>
					<div class="col-sm-4">
						<div class="pricing-table">
							<div class="pricing-header">
								<h4 class="pricing-title"><?=$plan_record->plan_title?></h4>
								<p class="price">$<?=$plan_record->price?></p>
							</div>
							
							<form class="form-inline" role="form" method="post" action="<?=base_url()?>home/login">

								<input type="hidden" class="plan-id" value="<?=$plan_record->plan_id?>">
								<input type="hidden" class="plan-price" value="<?=$plan_record->price?>">
								<input type="hidden" name="plan_title" value="<?=$plan_record->plan_title?>">
							<!--/.pricing-header-->
							<div class="pricing-body">
								<ul class="pricing-details">
									<li class="prod-detail"><?=$plan_record->description?></li>
									<li class="add-cart">
									<button type="<?php
										if(@$status){ echo "button"; } else{ echo "submit"; } ?>" formId="<?=$formId?>" 
									class="btn btn-danger btn-cart <?php if(@$status){ echo "btn-purchase"; } ?>"
									
									><?php if(@$status){
										echo "Purchase Now";
										}else{
											echo "Login to Purchase";
									}?>
									</button></li>
								</ul>
								<!--/.pricing-details-->
							</div>
							</form>
							<!--/.pricing-body-->
						</div>
						<!--/.pricing-table-->
					</div>
					<!--/.column-->
					<?php 
						$formId++;
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<!--/.ss-style-zigzag-->
</div>
<!--/.programs-->
 <div class="modal fade modal-datepicker" id="terms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Package Activation</h4>
			</div>
			<div class="modal-body">
			<form action="https://secure.bluepay.com/interfaces/shpf" method="POST" id="payment-form" target="_blank">
					<input type="hidden" name="SHPF_FORM_ID" value="mobileform01">
					<input type="hidden" name="SHPF_ACCOUNT_ID" value="100184048880">
					<input type="hidden" name="SHPF_TPS_DEF" value="SHPF_FORM_ID SHPF_ACCOUNT_ID DBA TAMPER_PROOF_SEAL AMEX_IMAGE DISCOVER_IMAGE TPS_DEF SHPF_TPS_DEF CUSTOM_HTML REBILLING REB_CYCLES REB_AMOUNT REB_EXPR REB_FIRST_DATE">
					<input type="hidden" name="SHPF_TPS" value="efd18e97407fdb01aebc2db8abe9a179">
					<input type="hidden" name="MODE" value="TEST">
					<input type="hidden" name="TRANSACTION_TYPE" value="SALE">
					<input type="hidden" name="DBA" value="test">
					<input type="hidden" name="TAMPER_PROOF_SEAL" value="5d085ff26d2bd0861e556450da6aa9ad">
					<input type="hidden" name="REBILLING" value="0">
					<input type="hidden" name="REB_CYCLES" value="">
					<input type="hidden" name="REB_AMOUNT" value="">
					<input type="hidden" name="REB_EXPR" value="">
					<input type="hidden" name="REB_FIRST_DATE" value="">
					<input type="hidden" name="AMEX_IMAGE" value="spacer.gif">
					<input type="hidden" name="DISCOVER_IMAGE" value="discvr.gif">
					<input type="hidden" name="REDIRECT_URL" value="http://localhost/tfit/pay/getStatus">
					<input type="hidden" name="TPS_DEF" value="MERCHANT APPROVED_URL DECLINED_URL MISSING_URL MODE TRANSACTION_TYPE TPS_DEF REBILLING REB_CYCLES REB_AMOUNT REB_EXPR REB_FIRST_DATE">
					<input type="hidden" name="CUSTOM_HTML" value="">
					<input type="hidden" name="CUSTOM_ID" value="">
					<input type="hidden" name="CUSTOM_ID2" value="">
					<input type="hidden" name="CARD_TYPES" value="vi-mc-di">
					<input type="hidden" name="AMOUNT" length="10" id="modal-price">		
					<div class="form-group">
						<label for="date-picker">Activation Date</label>
						<input type="text" class="form-control" id="date-picker">
					</div>
					<button type="submit" id="btn-pay" class="btn btn-danger btn-cart"><strong>Pay Now</strong></button>
			</form>
			</div>
		</div>
		<!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>
<!-- /.modal datepicker--> 

<?php $this->load->view('client/include/footer'); ?>
<script>
	/*$(document).on('click','.btn-cart',function(e){
		e.preventDefault();
		var formId = "#frm_"+$(this).attr("formId");
		
		var plan_id = $(formId+' .plan-id').val();
		var plan_title = $(formId+' .plan-title').val();
		var plan_price = $(formId+' .plan-price').val();
		var qty = $(formId+' .form-qty').val();

		$.ajax({
			type: "POST",
			url: "<?=base_url()?>cart/addPackage",
			data: { 
				plan_id : plan_id,
				plan_title : plan_title,
				qty : qty,
				rate : plan_price
			},
			success: function(data) {
				if(data == "error"){
					alert("Membership plan could not be added to cart!");
				}
				else{
					$.growl({ title: "Success!", message: "Plan has been added to cart!" });
					$('#nav-cart').html(data);
				}
			}
		});

	});*/
	
	$('#date-picker').pickadate({
		format: 'yyyy-mm-dd',
		formatSubmit: 'yyyy-mm-dd',
		hiddenSuffix: '--submit',
		min: new Date(),
	})

	var planId;

	$('.btn-purchase').on('click',function(e){
		$('.modal-datepicker').modal();
		planPrice = $(this).parents('form').find('.plan-price').val();
		planID = $(this).parents('form').find('.plan-id').val();
		$('#modal-price').val(planPrice);
	});


	$('#btn-pay').on('click',function(e){
		e.preventDefault();
		var actDate = $('#date-picker').val();
		if(actDate != ""){
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>pay/addData",
				data: { 
					plan_id : planID,
					activation_date : actDate,
					type : 'plan'
				},
				success: function(data) {
					$('#payment-form').submit();
				}
			});
		}else{
			alert('date not selected');
		}
	});
</script>

</body>
</html>
