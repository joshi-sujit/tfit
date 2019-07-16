 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left'); ?>
<!--END LEFT PANEL-->
            
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Our Team
                        <small>Manage your team members</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>admin/"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Our Team</li>
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
							<?php
									/*Generating a thumbnail name of the image*/
									$image_name = $record->image;
									$name = explode(".",$image_name);
									$img_thumb = $name[0]."_thumb".".".$name[1];
									$team_id = $record->team_id;
								?>
							<div class='box'>
                                <h3 class="box-title">Edit Team Member</h3>
                                <div class='box-body pad'>
                                    <?php echo form_open_multipart('team/save');?>
									
									<input type="hidden" value="<?=base64_encode($team_id)?>" name="id">								   
								    <input type="hidden" value="<?=$image_name?>" name="image_name">
									<input type="hidden" value="<?=$img_thumb?>" name="image_thumb">

									<div class="form-group">
										<label for="member_name">Member Name</label>
										<input type="text" class="form-control" id="member_name" 
										value="<?=$record->name?>" name="member_name" 
										required="required">
									</div>

									<div class="form-group">
										<label for="position">Position</label>
										<input type="text" class="form-control" id="position" 
										value="<?=$record->position?>" name="position" 
										required="required">
									</div>

									<div class="form-group">
										<label for="image_upload">Edit Image</label><br>
										<img src="<?=base_url()?>image/team/thumb/<?=@$img_thumb?>" /><br /> 
                                        
                                        <input type="file" id="image_upload" name="userfile">
                                        <p class="help-block">Member profile image</p>
                                    </div>

									
									<div class="form-group">
										<label for="category">Description</label>
										<textarea class="textarea" name="description" 
										style="width: 100%; height: 200px; font-size: 14px; line-height: 20px; border: 1px solid #dddddd; padding: 10px;" required="required"><?=$record->description?></textarea>
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
                                <h3 class="box-title">New Team Member</h3>
                                <div class='box-body pad'>
                                    <?php echo form_open_multipart('team/save');?>
									
									<div class="form-group">
										<label for="member_name">Member Name</label>
										<input type="text" class="form-control" id="member_name" 
										placeholder="Enter Member Name" name="member_name" 
										required="required">
									</div>

									<div class="form-group">
										<label for="position">Position</label>
										<input type="text" class="form-control" id="position" 
										placeholder="Enter position" name="position" 
										required="required">
									</div>

									<div class="form-group">
                                        <label for="image_upload">Upload Image</label>
                                        <input type="file" id="image_upload" name="userfile">
                                        <p class="help-block">Member profile image</p>
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
