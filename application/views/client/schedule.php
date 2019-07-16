<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Schedule</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
<?php 
$this->load->view('client/include/javascript_disabled');
$this->load->view('client/include/navigation'); ?>
<!--/.nav-->
<div class="schedule main-container">
	<div class="container">
		<h1 class="title">Bootcamp Schedule</h1>
		<p class="text-center text-small">Time and location for TFIT360 Bootcamp</p>
		<div class="row">
		<div class="col-md-12 table-responsive">
			<h1 class="schedule-title">Key Biscayne</h1>
			<p class="text-center text-small">Village Green</p>
			<table class="table schedule-table">
				<thead>
				<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
					<th>Saturday</th>
					<th>Sunday</th>
				</thead>
				<tbody>
					<tr>
						<td>-</td>
						<td>6:00AM</td>
						<td>-</td>
						<td>-</td>
						<td>6:00AM</td>
						<td>-</td>
						<td>-</td>
					</tr>
					<tr>
						<td>8:30AM</td>
						<td>8:30AM</td>
						<td>8:30AM</td>
						<td>8:30AM</td>
						<td>8:30AM</td>
						<td>-</td>
						<td>-</td>
					</tr>
					<tr>
						<td>9:30AM</td>
						<td>-</td>
						<td>9:30AM</td>
						<td>-</td>
						<td>9:30AM</td>
						<td>9:30AM</td>
						<td>9:30AM</td>
					</tr>
					<tr>
						<td>6:00PM</td>
						<td>6:00PM</td>
						<td>6:00PM</td>
						<td>6:00PM</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
					<tr>
						<td>7:00PM</td>
						<td>7:00PM</td>
						<td>7:00PM</td>
						<td>7:00PM</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!--/.table-responsive--> 
		<div class="col-md-12 table-responsive">
			<h1 class="schedule-title">Brickell</h1>
			<p class="text-center text-small">SoccerCage Miami</p>
			<table class="table schedule-table">
				<thead>
				<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
					<th>Saturday</th>
					<th>Sunday</th>
				</thead>
				<tbody>
					<tr>
						<td>6:00AM</td>
						<td>6:00AM</td>
						<td>6:00AM</td>
						<td>6:00AM</td>
						<td>6:00AM</td>
						<td>-</td>
						<td>-</td>
					</tr>
					<tr>
						<td>7:00AM</td>
						<td>7:00AM</td>
						<td>7:00AM</td>
						<td>7:00AM</td>
						<td>7:00AM</td>
						<td>-</td>
						<td>-</td>
					</tr>
					<tr>
						<td>7:00PM</td>
						<td>7:00PM</td>
						<td>7:00PM</td>
						<td>7:00PM</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!--/.table-responsive--> 
		</div>
		<!--/.row-->
	</div>
	<div class="row session-price">
		<div class="container">
			<form action="https://secure.bluepay.com/interfaces/shpf"  class="form-inline" role="form" method="post" id="frm_1">
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
				<input type="hidden" name="AMOUNT" length="10" value="100.00">

			<input type="hidden" class="session-id" value="session_1">
			<input type="hidden" class="session-price" value="10">
			<input type="hidden" class="session-title" value="Single Session">

			<p class="session-type">Single Session</p>
			<p class="price">$10.00</p>
			<hr>
			<p class="session-type">1 month Unlimited Bootcamp Session</p>
			<p class="price">$100.00</p>
			<p><input type="hidden" class="form-control form-qty" value="1"></p>
			<span>
			<button type="submit" class="btn btn-danger btn-cart btn-pay">Buy 1 Month Package</button></span>
			</form>
		</div>
	</div>
</div>
<!--/.programs-->
<?php $this->load->view('client/include/footer'); ?>
</body>
<script>
	/*$(document).on('click','.btn-cart',function(e){
		e.preventDefault();
		var formId = "#frm_1";
		
		var session_id = $(formId+' .session-id').val();
		var session_title = $(formId+' .session-title').val();
		var session_price = $(formId+' .session-price').val();
		var qty = $(formId+' .form-qty').val();

		$.ajax({
			type: "POST",
			url: "<?=base_url()?>cart/addSession",
			data: { 
				session_id : session_id,
				session_title : session_title,
				qty : qty,
				rate : session_price
			},
			success: function(data) {
				if(data == "error"){
					alert("Bootcamp session could not be added to cart!");
				}
				else{
					$.growl({ title: "Success!", message: "Bootcamp session has been added to cart!" });
					$('#nav-cart').html(data);
				}
			}
		});

	});*/

	$('.btn-pay').on('click',function(e){

		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>pay/addBootcampData",
			data: { 
				bootcamp_id : 'cam_1',
				price : '100.00',
				name : 'bootcamp',
				type : 'bootcamp'
			},
			success: function(data) {
				$('#frm_1').submit();
			}
		});

	});
 </script>
</html>
