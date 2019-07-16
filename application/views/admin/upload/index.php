 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left');?>
<!--END LEFT PANEL-->
            
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Brochures and Leaflets
                        <small>Upload your contents</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>admin/"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Brochures and Leaflets</li>
                    </ol>
                </section>
				
				<?php 
					$this->load->view('admin/include/notification');
				?>
				<?php
					if(isset($error)){
				?>
					<div class="alert alert-info alert-dismissable">
						<i class="fa fa-info"></i>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<b>Warning!!</b> <?php echo $error['error']; ?>
					</div>
				<?php
					}
				?>
								<!-- Main content-->
				<section class="content">
                    <div class='row'>
						<div class="col-md-12">
							<?php echo form_open_multipart('upload/save') ?>
							<div class="form-group">
                            	<label for="file_upload">Upload Brochures</label>
								<input type="file" id="file_upload" name="userfile">
								<p class="help-block">Please upload file (less than 5 MB)</p>
							</div>
							<div class="box-footer">
                            	<button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
							</form>
							<br />
						</div>
					
                        <div class='col-md-12'>
							<div class="box">
							 
								<div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="2%">S.No</th>
                                                <th width="20%">File Name</th>
                                                <th width="2%">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$counter = 1;
										foreach($query->result() as $record){
											$id = $record->upload_id;
											$encrypted_id = base64_encode($id);
										?>
                                            <tr>
                                                <td><?=$counter?></td>
                                                <td><?=$record->file_name?></td>
												<td align="center">
												<a href="<?=base_url()?>upload/delete/<?=base64_encode($id)?>">
														<i class="fa fa-trash-o" onclick="return confirmDelete();">
													</i>
												</a>
												</td>
                                            </tr>
                                         <?php
										 	$counter+=1;
											}
										?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
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