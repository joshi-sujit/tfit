 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left'); ?>
<!--END LEFT PANEL-->
            
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Bootcamp Content Management
                        <small>Manage your bootcamp contents</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>admin/"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Bootcamp Contents</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class='row'>
                        <div class='col-md-12'>
						
						<?php
							foreach($query->result() as $record){
						?>
                            <div class='box'>
                                <div class="box-header">
                                    <h3 class="box-title"><?=$record->content_title?></h3>
                                </div>
                                <div class='box-body pad'>
                                    <?php echo form_open('bootcamp/save');?>
										<input type="hidden" value="<?=$encrypt_id?>" name="id"  />
                                        <textarea class="textarea" name="description" 
										style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$record->content_desc?></textarea>
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
