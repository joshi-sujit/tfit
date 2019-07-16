<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | Cart</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>

<body>
<?php 
	$this->load->view('client/include/javascript_disabled'); 
	$this->load->view('client/include/navigation');
?>
<div class="products main-container">
	<div class="container">
		<h1 class="title">Shopping Cart</h1>
		<p class="text-center text-small">View or update items in your cart.</p>
		<div class="row margin-reset">
		<div class="col-md-12 table-responsive padding-reset">
			<?php echo form_open(base_url().'cart/update'); ?>
			<table class="table cart-table">
				<thead>
				<th class="prod">Product</th>
					<th>Description</th>
					<th>Size</th>
					<th>Color</th>
					<th class="qty">Qty.</th>
					<th>Remove</th>
					<th>Price</th>
					<th>Subtotal</th>
						</thead>
				<tbody>
				<?php 
					if(count($this->cart->contents()) == 0){
						echo "<tr><td colspan='8'>No Items added in your cart</td></tr>";
					}
					else{
				?>
				<?php $i = 1; ?>
					<?php 
						/*echo "<pre>";
						var_dump($this->cart->contents());
						echo "</pre>";
						die();*/
						?>

					<?php foreach ($this->cart->contents() as $items): ?>

						<?php echo form_hidden($i.'id', $items['rowid']); ?>
					<tr>
						<td>
							<?php 
								if($items['options']['type'] == "product"){
									$product_id = $items['id'];
									$query_image = $this->db->query("SELECT * FROM tbl_image_product WHERE product_id = '$product_id' LIMIT 1");
									foreach($query_image->result() as $image){
										$image_name = $image->image_name;
										$name = explode(".",$image_name);
										$img_thumb = $name[0]."_thumb".".".$name[1];
									}
									$size =  $items['options']['Size'];
									$color = $items['name'];
								}else{
									$img_thumb = "bag.png";
									$size = "N/A";
									$color = "N/A";
								}
							?>

						<img src="<?=base_url()?>image/product/<?=$img_thumb?>" alt="product" class="cart-image"></td>
						<td><?php echo $items['name']; ?></td>
						<td><?php echo $size; ?></td>
						<td><?php echo $color ?></td>
						<td><?php echo form_input(array('name' => $i.'qty', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5', 'class' => 'form-control form-qty')); ?>
						</td>


						<td><a href="#" class="remove-prod" title="Remove this item from cart">Remove</a></td>
						<td>$<?php echo $this->cart->format_number($items['price']); ?></td>
						<td>$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
						
					</tr>
					<?php $i++; ?>

					<?php endforeach; 
					}
					?>


				</tbody>
				<tfoot>
					<tr>
						<td colspan="7" class="gTotal">Grand Total</td>
						<td class="gTotalAmt">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
					</tr>
				</tfoot>
			</table>
			
		</div>
		<!--/.table-responsive--> 
		</div>
		<!--/.row-->
		<div class="row cart-btn">
			<div class="col-sm-2 col-xs-6"><button type="submit" class="btn btn-default btn-block btn-update">Update Cart</button></div>
		</form>	
			<!--FORM TO redirect the update cart to bluepay account for online money transfer-->
			<form action="https://secure.bluepay.com/interfaces/shpf" method="POST">
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
			<input type="hidden" name="CUSTOM_ID" value="abcd">
			<input type="hidden" name="CUSTOM_ID2" value="">
			<input type="hidden" name="CARD_TYPES" value="vi-mc-di">
			<input type="hidden" name="AMOUNT" value="<?php echo $this->cart->format_number($this->cart->total()); ?>" length="10">			
			<div class="col-sm-2 col-xs-6"><button type="submit" class="btn btn-danger btn-block">Checkout</button></div>
			</form>
			<!--END OF FORM TO REDIRECT-->
		</div>
	</div>
</div>
<!--/.programs-->
<?php $this->load->view('client/include/footer'); ?>
<script>
$(document).on('click','.remove-prod',function (e){
	e.preventDefault();
	$(this).parents('tr').hide();
	$(this).parents('tr').find('.form-qty').val(0);
	$('.btn-update').trigger('click');

})
</script>
</body>
</html>