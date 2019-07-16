 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left');?>
<!--END LEFT PANEL-->
            
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Product
                        <small>Manage your items</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>/product/"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Product</li>
                    </ol>
                </section>
				
				<?php 
					@$flag = $this->uri->segment(3);
					@$error_no = $this->uri->segment(4);
					if(@$flag == "success"){ ?>
							<div class="alert alert-success alert-dismissable">
                            	<i class="fa fa-check"></i>
                                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Success!!</b> Changes have been saved successfully.
                            </div>
				<?php
				}elseif(@$flag == "delsuccess"){
				?>
					<div class="alert alert-info alert-dismissable">
                     	<i class="fa fa-info"></i>
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Success!</b> Record has been deleted successfully.
                    </div>
				<?php
				}
				?>
				<?php if(@$error_no>0){ ?>
							<div class="alert alert-info alert-dismissable">
                            	<i class="fa fa-info"></i>
                                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Error!!</b> <?=@$error_no?> could not be uploaded.
                            </div>
						<?php
						}
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
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th width="8%">Image</th>
                                                <th width="8%">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$counter = 1;
										foreach($query->result() as $record){
											$id = $record->product_id;
											//$encrypt_id = md5($id);

										?>
                                            <tr>
                                                <td><?=$counter?></td>
                                                <td><?=$record->product_name?></td>
                                                <td><?=$record->rate?></td>
                                                <td>
												<?php
													$query_image = $this->db->query("SELECT * FROM tbl_image_product WHERE product_id = '$id' LIMIT 1");
													foreach($query_image->result() as $image){
														$image_name = $image->image_name;
														$name = explode(".",$image_name);
														$img_thumb = $name[0]."_thumb".".".$name[1];
													}
												?>
								<img src="<?=base_url()?>image/product/<?=@$img_thumb?>" style="height:80px; width:auto;"/>	
												</td>
                                                <td>
													<a href="<?=base_url()?>product/newproduct/<?=$id?>">
														<i class="fa fa-pencil-square-o"></i>
													</a>
													<a href="<?=base_url()?>product/delete/<?=$id?>">
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
									onClick="javascript:location.replace('<?=base_url()?>product/newproduct')">Add New</button>
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