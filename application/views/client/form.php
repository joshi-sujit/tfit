<?php 
	$this->load->view('client/include/header'); 
?>
<form role="form" action="<?=base_url()?>cart/add" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Product ID</label>
    <input type="text" class="form-control" name="product_id">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Quantity</label>
    <input type="text" class="form-control" name="qty">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Rate</label>
    <input type="text" class="form-control" name="rate">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php $this->load->view('client/include/footer'); ?>
