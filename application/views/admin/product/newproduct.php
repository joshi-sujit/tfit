 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left'); ?>
<!--END LEFT PANEL-->
	
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Product
                        <small>Manage your items</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>/admin/"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Product</li>
                    </ol>
                </section>
				
                <!-- Main content-->
					<section class="content">
                    <div class='row'>
                        <div class='col-md-12'>
						<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">New Product</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php echo form_open_multipart('product/save') ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="product">Product Name</label>
                                            <input type="text" class="form-control" id="product" 
											placeholder="Enter product name" name="product_name" 
											required="required">
                                        </div>
										
										<div class="form-group">
                                            <label for="rate">Rate</label>
                                            <input type="text" class="form-control" id="rate" 
											placeholder="Enter rate" name="rate" 
											required="required">
                                        </div>
										
										
                                        <div class="form-group">
                                            <label for="image_upload">Upload Image</label>
                                          <input type="file" id="image_upload" name="userfile[]" 
										  required="required" multiple="multiple">
                                            <p class="help-block">Please upload image relevant to product</p>
                                        </div>
										
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary submit">Save Changes</button>
                                    </div>
                                </form>
                            </div>
					
                            
                        </div><!-- /.col-->
                    </div><!-- ./row -->
                </section>
            </aside>
            <!--right_panel-->
 </div>
        <!--footer-->
<?php $this->load->view('admin/include/footer'); ?>
         <!--footer-->   
		 
</body>
</html>