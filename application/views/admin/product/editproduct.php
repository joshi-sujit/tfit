 <?php $this->load->view('admin/include/header'); ?>
<style type="text/css">
.wrapper.row-offcanvas.row-offcanvas-left .right-side .content .row .col-md-8 .box.box-primary .box-body .form-group #mark {
	color: #000;
}

.img-wrapper{
	display:inline;
	position:relative;
}

.img-wrapper:hover .btn-img{
	opacity:1;
}

.btn-img{
	position:absolute;
	right:0;
	padding: 0px 6px;
	margin-top: 5px;
	opacity:0;
}

</style>

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
                        <div class='col-md-8'>
						<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Edit Product</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php echo form_open_multipart('product/editsave') ?>
								<?php
									foreach($query->result() as $record){
										$product_id = $record->product_id;
								?>
								<input type="hidden" value="<?=$product_id?>" name="product_id" />
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="product">Product Name</label>
                                            <input type="text" class="form-control" id="product" 
											value="<?=$record->product_name?>" name="product_name" 
											required="required">
                                        </div>
										
										<div class="form-group">
                                            <label for="rate">Rate</label>
                                            <input type="text" class="form-control" id="rate" 
											value="<?=$record->rate?>" name="rate" 
											required="required">
                                        </div>
										
										<?php
									}
									?>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
					
                            
                        </div><!-- /.col-->
    					<div class='col-md-4'>
						<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Images</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                   <div class="box-body">
                                        <?php
											$query_image = $this->db->query("SELECT * FROM tbl_image_product
																			WHERE product_id = '$product_id'");
											foreach($query_image->result() as $singleimage){
												$image_name = $singleimage->image_name;
												$name = explode(".",$image_name);
												$img_thumb = $name[0]."_thumb".".".$name[1];
										?>
								<div class="img-wrapper" img-id="<?=$singleimage->image_id?>"
								img-name="<?=$image_name?>"><img src="<?=base_url()?>image/product/<?=@$img_thumb?>" /></div>
										<?php
											}
										?>
                            </div><!-- /.box-body -->
									<div class="box-footer">
                        			<form method="post" enctype="multipart/form-data" action="<?=base_url()?>product/moreimage/<?=$product_id?>">
									 	<div class="form-group">
                                            <label for="image_upload">Upload Image</label>
                                          <input type="file" id="image_upload" name="userfile[]" multiple="multiple"
										  required>
                                            <p class="help-block">Please upload image relevant to product</p>
                                        </div>
									<button type="submit" class="btn btn-primary">Add More</button>
									</form>
                        	</div>
                            </div>
					
                            
                        </div>
					</div>
                </section>
     </aside>
            <!--right_panel-->
</div>
        
        
        <!--footer-->
<?php $this->load->view('admin/include/footer'); ?>
         <!--footer--> 
		 <script>
		 	$(document).ready(function(e) {
				sniffImg();
			});
			
			function sniffImg(){
				$('.btn-img').remove();
				var imgCounter = $('.img-wrapper').length;
				if(imgCounter > 1){
					$('.img-wrapper').each(function(index, element) {
						$(this).append('<button type="button" class="btn btn-default btn-img">x</button>');
					});
				}
			}
			
			$(document).on('click','.btn-img',function(e){
				e.preventDefault();
				if (confirm("Are you sure you want to delete?")){
					var selector = $(this).parents('.img-wrapper');
   					var id = selector.attr('img-id');
					var name = selector.attr('img-name');
					$.ajax({
						type: "POST",
						url: "<?=base_url()?>product/delImage",
						data: { 
							image_id : id,
							image_name : name
						},
						success: function(data) {
							selector.remove();
							alert("Image successfully deleted!");
							sniffImg();
						}
					});
				}
				else{
					return false;	
				}
				
			});
		 </script>  
</body>
</html>