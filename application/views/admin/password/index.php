 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left'); ?>
<!--END LEFT PANEL-->
            
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Password Management
                        <small>Secure your system</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>admin/"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Password Management</li>
                    </ol>
                </section>
				 <?php
					 @$flag = $this->uri->segment(3);
				 	if($flag == "pwdwrong"){
				?>
				 <div class="alert alert-warning alert-dismissable">
                 	<i class="fa fa-warning"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Warning!</b> Old Password Mismatch
                  </div>
				<?php
					}elseif($flag == "pwdmismatch"){
				?>
				 <div class="alert alert-warning alert-dismissable">
                 	<i class="fa fa-warning"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Warning!</b> Re Entered Password Mismatch.
                  </div>
				
				<?php 
					}elseif($flag=="pwdsuccess"){ 
				?>
					<div class="alert alert-success alert-dismissable">
                    	<i class="fa fa-check"></i>
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <b>Success!!</b> Password Changed Successfully.
                            </div>
				<?php
					}
				?>
                <!-- Main content-->
					<section class="content">
                    <div class='row'>
                        <div class='col-md-12'>
						<div class="box box-primary">
                                <!-- form start -->
                                <?php echo form_open_multipart('password_mgmt/change') ?>
								
                                      <div class="box-body">
                                        <div class="form-group">
                                            <label for="old_pwd">Old Password</label>
                                            <input type="password" class="form-control" id="old_pwd" 
											placeholder="Enter Old Password" name="old_pwd" 
											required="required">
                                        </div>
										
										<div class="form-group">
                                            <label for="new_pwd">New Password</label>
                                            <input type="password" class="form-control" id="new_pwd" 
											placeholder="Enter new password" name="new_pwd" 
											required="required">
                                        </div>
										
                                        <div class="form-group">
                                            <label for="new_pwd">Re-enter New Password</label>
                                            <input type="password" class="form-control" id="re_new_pwd" 
											placeholder="Re-Enter New Password" name="re_new_pwd" 
											required="required">
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
            </aside>
            <!--right_panel-->
 </div>
        
        
        <!--footer-->
<?php $this->load->view('admin/include/footer'); ?>
         <!--footer-->   
</body>
</html>