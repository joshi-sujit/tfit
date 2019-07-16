 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left');?>
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
                        <li class="active">Sliders</li>
                    </ol>
                </section>
				
				<?php 
					$this->load->view('admin/include/notification');
				?>
				<!-- Main content-->
				<section class="content">
                    <div class='row'>
                        <div class='col-md-12'>
							<div class="box">
							 
								<div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="2%">S.No</th>
                                                <th width="10%">Slider</th>
												<th width="10%">Status</th>
                                                <th width="2%">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$counter = 1;
										foreach($query->result() as $record){
											$id = $record->slider_id;
											$encrypted_id = base64_encode($id);
										?>
                                            <tr>
                                                <td><?=$counter?></td>
                                                <td>
												<?php
													$image_name = $record->slider_image;
													$name = explode(".",$image_name);
													$img_thumb = $name[0]."_thumb".".".$name[1];
												?>
								<img src="<?=base_url()?>image/slider/thumb/<?=@$img_thumb?>" />	
												</td>
												<td><?php
													$status =$record->status;
													if($status == 1){
														echo "Displayed";
													}else{
														echo "Undisplayed";
													}
													?></td>
                                                <td>
													<a href="<?=base_url()?>slider/getById/<?=$encrypted_id?>">
														<i class="fa fa-pencil-square-o"></i>
													</a>
													<a href="<?=base_url()?>slider/delete/<?=$encrypted_id?>">
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
								<div class="box-footer">
                        			<button type="submit" class="btn btn-primary" 
									onClick="javascript:location.replace('<?=base_url()?>slider/newSlider')">
									Add New</button>
                        		</div>
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