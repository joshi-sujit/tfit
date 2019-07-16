 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left');?>
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
                                                <th width="20%">Client </th>
                                                <th>Testimonial</th>
                                                <th width="8%">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$counter = 1;
										foreach($result as $record){
											$id = $record->testimonial_id;
											$encrypted_id = base64_encode($id);
										?>
                                            <tr>
                                                <td><?=$counter?></td>
                                                <td><?=$record->client_name?></td>
                                                <td><?php echo substr($record->description,0,150)?></td>
                                                <td>
													<a href="<?=base_url()?>testimonial/getById/<?=$encrypted_id?>">
														<i class="fa fa-pencil-square-o"></i>
													</a>
                                                    <a href="<?=base_url()?>testimonial/delete/<?=$encrypted_id?>">
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
                                    onClick="javascript:location.replace('<?=base_url()?>testimonial/newTestimonial')">
                                    Add New</button>
                                </div><!--box-footer-->
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