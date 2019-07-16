 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left'); ?>
<!--END LEFT PANEL-->
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Fitness Programs
                        <small>Manage multiple programs</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>admin/"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active"> Fitness Programs</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class='row'>
                        <div class='col-md-12'>
                        	<?php 
								if(isset($error)){
							?>
								<div class="alert alert-info alert-dismissable">
							    	<i class="fa fa-info"></i>
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							        <b>Warning!!</b> <?php echo @$error; ?>
							    </div>
							<?php
								}
							?>
							<?php
								if(isset($result)){
									foreach($result as $record){
							?>
							<?php
									/*Generating a thumbnail name of the image*/
									$image_name = $record->image;
									$name = explode(".",$image_name);
									$img_thumb = $name[0]."_thumb".".".$name[1];
									$program_id = $record->program_id;
								?>
						
							<div class='box'>
								<div class="box-header">
                                	<h3 class="box-title">Edit Fitness Program </h3>
                                </div>
                                <div class='box-body pad'>
                                    <?php echo form_open_multipart('program/save');?>
									
									<input type="hidden" value="<?=base64_encode($program_id)?>" name="id">								   
								    <input type="hidden" value="<?=$image_name?>" name="image_name">
									<input type="hidden" value="<?=$img_thumb?>" name="image_thumb">

									<div class="form-group">
										<label for="program_title">Program Title</label>
										<input type="text" class="form-control" id="program_title" 
										value="<?=$record->program_title?>" name="program_title" 
										required="required">
									</div>

									<div class="form-group">
										<label for="image_upload">Edit Image</label><br>
										<img src="<?=base_url()?>image/program/thumb/<?=@$img_thumb?>" /><br /> 
                                        
                                        <input type="file" id="image_upload" name="userfile">
                                        <p class="help-block">Upload image</p>
                                    </div>

									
									<div class="form-group">
										<label for="category">Description</label>
										<textarea class="textarea" name="description" 
										style="width: 100%; height: 200px; font-size: 14px; line-height: 20px; border: 1px solid #dddddd; padding: 10px;" required="required"><?=$record->program_desc?></textarea>
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
                            	<div class="box-header">
                                	<h3 class="box-title">New Fitness Program</h3>
                                </div>
                                <div class='box-body pad'>
                                    <?php echo form_open_multipart('program/save');?>
									
									<div class="form-group">
										<label for="program_title">Program Title</label>
										<input type="text" class="form-control" id="program_title" 
										placeholder="Enter Program Title" name="program_title" 
										required="required">
									</div>

									<div class="form-group">
                                        <label for="image_upload">Program Image</label>
                                        <input type="file" id="image_upload" name="userfile" required="required">
                                        <p class="help-block">Upload image</p>
                                    </div>

									
									<div class="form-group">
										<label for="category">Description</label>
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
