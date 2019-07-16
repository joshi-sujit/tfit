<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Clothing Store</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>

<body>
<?php 
	$this->load->view('client/include/javascript_disabled'); 
	$this->load->view('client/include/navigation'); 
?>
<?php
	if(@$notification == "success"){ ?>
<div class="alert alert-success alert-dismissible" role="alert" style="margin-top:60px; text-align:center">
  <button type="button" class="close" data-dismiss="alert"  style="font-size:14px;"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Thank you for purchasing!</strong> Please check your inbox.!
</div>
<?php
	}elseif (@$notification == "payment_declined") {
?>
	<div class="alert alert-danger alert-dismissible" role="alert" style="margin-top:60px; text-align:center">
  <button type="button" class="close" data-dismiss="alert"  style="font-size:14px;"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Sorry!</strong> The payment could not be made. Please try again later	!
</div>
<?php
	}
	?>
<div class="products main-container">
	<div class="container">
		<h1 class="title">TFIT360 Clothing</h1>
		<p class="text-center text-small">Buy custom TFIT360 Tshirts</p>
		<div class="row">

			<?php
				$formId = 1;
				foreach($product_result as $record){
					$product_id = $record->product_id;
					$product_name = $record->product_name;
					$rate = $record->rate;
					
					$query = $this->db->query("SELECT * FROM tbl_image_product WHERE product_id = '$product_id' LIMIT 1");
					$ret = $query->row();
					$name = explode(".",$ret->image_name);
					$img_thumb = $name[0]."_thumb".".".$name[1];
			?>
			<div class="col-sm-4 col-xs-6 item">
				<div class="img-container"> 
				<img src="<?=base_url()?>image/product/<?=$img_thumb?>" alt="product" class="store-product active">
					<div class="thumb-view">
					<?php	
										
						//Generating Images
						$query_image = $this->db->query("SELECT * FROM tbl_image_product WHERE product_id = '$product_id' LIMIT 3");
						foreach($query_image->result() as $image){
							$image_name = $image->image_name;
							$name = explode(".",$image_name);
							$img_thumb = $name[0]."_thumb".".".$name[1];
					?>
						<img src="<?=base_url()?>image/product/<?=$img_thumb?>" 
							alt="product" class="store-product thumb">
					<?php
					}
					?>
					</div>
					<!--/.thumb-view-->
				</div>
				<h6 class="product-name"><?=$product_name?></h6>
				<p class="product-price">$<?=$rate?></p>
				<div class="cart-bar">
					<form class="form-inline" role="form" method="post" action="<?=base_url()?>cart/add" id="frm_<?=$formId?>">
						<div class="form-group">
							<input type="hidden" class="prod-id" value="<?=$product_id?>">
							<input type="hidden" class="prod-name" value="<?=$product_name?>">
							<input type="hidden" class="prod-rate" value="<?=$rate?>">
							<input type="hidden" class="prod-image" value="<?=$img_thumb?>">
							<input type="text" class="form-control prod-qty" value="1"  placeholder="Qty." name="qty">
						</div>
						<div class="form-group">
							<select class="form-control size">
								<option value="XL">XL</option>
								<option value="L">L</option>
								<option value="M">M</option>
								<option value="S">S</option>
							</select>
						</div>
						<button type="button" formId="<?=$formId?>" class="btn btn-danger btn-cart"><i class="fa fa-shopping-cart"></i></button>
					</form>
				</div>
				<!--/.cart-bar-->
			</div>
			<?php
				$formId++;}
			?>
		</div>
	</div>
</div>

<!--/.programs-->
<?php $this->load->view('client/include/footer'); ?>


<script>
	$(document).on('click','.btn-cart',function(e){
		e.preventDefault();
		var formId = "#frm_"+$(this).attr("formId");
		
		var product_name = $(formId+' .prod-name').val();
		var rate = $(formId+' .prod-rate').val();
		var qty = $(formId+' .prod-qty').val();
		var size = $(formId+' .size  option:selected').val();
		var product_id = $(formId+' .prod-id').val();
		var product_image = $(formId+' .prod-image').val();

		$.ajax({
			type: "POST",
			url: "<?=base_url()?>cart/add",
			data: { 
				product_id : product_id,
				size : size,
				qty : qty,
				rate : rate,
				product_name : product_name,
				product_image : product_image
			},
			success: function(data) {
				if(data == "error"){
					alert("Product could not be added to cart!");
				}
				else{
					$.growl({ title: "Success!", message: "Product has been added to cart!" });
					$('#nav-cart').html(data);
				}
			}
		});

	});
 </script>
</body>
</html>
