 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left'); ?>
<!--END LEFT PANEL-->
            
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Testimonials
                        <small>Highlight customer's voice</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>admin/"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Testimonials</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class='row'>
                        <div class='col-md-12'>
							<?php
								if(isset($result)){
									foreach($result as $record){
							?>
							<div class='box'>
                                <h3 class="box-title">Edit Testimonial</h3>
                                <div class='box-body pad'>
                                    <?php echo form_open('testimonial/save');?>

									<input type="hidden" value="<?=$encrypt_id?>" name="id" />
									<div class="form-group">
										<label for="client_name">Client Name</label>
										<input type="text" class="form-control" id="client_name" 
										value="<?=$record->client_name?>" name="client_name" 
										required="required">
									</div>
									
									<div class="form-group">
										<label for="category">Testimonial</label>
										<textarea class="textarea" name="description" 
										style="width: 100%; height: 200px; font-size: 14px; line-height: 20px; border: 1px solid #dddddd; padding: 10px;"><?=$record->description?></textarea>
									</div>
									<div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
								   <?php echo form_close(); ?>
                                </div>
                            </div>
							<?php
									}
								}else{
							?>
                            <div class='box'>
                                <h3 class="box-title">New Testimonial</h3>
                                <div class='box-body pad'>
                                    <?php echo form_open('testimonial/save');?>
									
									<div class="form-group">
										<label for="client_name">Client Name</label>
										<input type="text" class="form-control" id="client_name" 
										placeholder="Enter Client Name" name="client_name" 
										required="required">
									</div>
									
								
									<div class="form-group">
										<label for="category">Testimonial</label>
										<textarea class="textarea" name="description" 
										style="width: 100%; height: 200px; font-size: 14px; line-height: 20px; border: 1px solid #dddddd; padding: 10px;" required="required"></textarea>
									</div>

									<div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
								   <?php echo form_close(); ?>
                                </div>
                            </div>
							<?php
								}
							?>
                        </div><!-- /.col-->
                    </div><!-- ./row -->
                </section><!-- /.content -->
            </aside>
            <!--right_panel-->
 </div>
        
        
        <!--footer-->
<?php $this->load->view('admin/include/footer'); ?>
         <!--footer-->   
</body>
</html>
