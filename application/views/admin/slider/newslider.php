 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left'); ?>
<!--END LEFT PANEL-->
            
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Sliders
                        <small>Upload banner images</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>admin/"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Slider</li>
                    </ol>
                </section>

                <?php
                    if(@$error != ""){
                ?>
                    <div class="alert alert-info alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Warning!!</b> <?=$error?>
                    </div>
                <?php
                    }
                ?>
                <!-- Main content -->
                <?php
					if(isset($query)){
						foreach($query->result() as $record){
				?>
					<section class="content">
                    <div class='row'>
                        <div class='col-md-12'>
						<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Edit Slider</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php echo form_open_multipart('slider/save') ?>
								<?php
									/*Generating a thumbnail name of the image*/
									$image_name = $record->slider_image;
									$name = explode(".",$image_name);
									$img_thumb = $name[0]."_thumb".".".$name[1];
								?>
                                   <input type="hidden" value="<?=$encrypt_id?>" name="id">
								    <input type="hidden" value="<?=$image_name?>" name="image_name">
									 <input type="hidden" value="<?=$img_thumb?>" name="image_thumb">
								    <div class="box-body">
                                                                               
                                        <div class="form-group">
										<img src="<?=base_url()?>image/slider/thumb/<?=@$img_thumb?>" />
                                         <br />   
											<label for="image_upload">Edit Image</label>
                                            <input type="file" id="image_upload" name="userfile">
                                            <p class="help-block">Please upload image</p>
                                        </div>
										
                                        <div class="form-group">
                                        <label for="featured">Set Display Option</label>
                                            <input type="checkbox" id="featured" name="featured" value="1"
											<?php if($record->status == 1){ echo "checked"; }?>/>
										</div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
					
                            
                        </div><!-- /.col-->
                    </div><!-- ./row -->
                </section>
				<?php
						}
					}else{ ?>
					<section class="content">
                    <div class='row'>
                        <div class='col-md-12'>
						<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">New Slider Image</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php echo form_open_multipart('slider/save') ?>
                                    <div class="box-body">
                                       
                                        <div class="form-group">
                                            <label for="image_upload">Upload Image</label>
                                            <input type="file" id="image_upload" name="userfile">
                                            <p class="help-block">Please upload image</p>
                                        </div>
										
										<div class="form-group">
                                        <label for="featured">Set Display Option</label>
                                            <input type="checkbox" id="featured" name="featured" value="1"/>
										</div>
										
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
					
                            
                        </div><!-- /.col-->
                    </div><!-- ./row -->
                </section>
				<?php
				}
				?><!-- /.content -->
            </aside>
            <!--right_panel-->
 </div>
        
        
        <!--footer-->
<?php $this->load->view('admin/include/footer'); ?>
         <!--footer-->   
</body>
</html>
