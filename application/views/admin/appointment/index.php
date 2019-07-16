 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left');?>
<!--END LEFT PANEL-->

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Appointment
                        <small>List of appointments</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>admin/"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Appointment</li>
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
												<th width="5%">Booked Date</th>
                                                <th width="5%">Appointment Date</th>
												<th width="5%">Appointment Time</th>
												<th width="10%">Doctor</th>
												<th width="10%">Patient</th>
												<th width="10%">Contact</th>
												<th width="10%">Email</th>
                                                <th width="2%">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$counter = 1;
										foreach($query->result() as $record){
											$id = $record->appointment_id;
											$encrypted_id = base64_encode($id);
										?>
                                            <tr <?php if($record->status == 0){echo "class='new'";} ?>>
                                                <td><?=$counter?></td>
												<td><?=$record->booked_date?></td>
                                                <td><?=$record->appointment_date?></td>
												<td><?=$record->appointment_time?></td>
												<td><?=$record->doctor_name?></td>
												<td><?=$record->name?></td>
												<td><?php echo $record->phone.",". $record->mobile?></td>
												<td><?=$record->email?></td>
                                                <td align="center">
													<a href="<?=base_url()?>appointment/getById/<?=$encrypted_id?>" 
													title="View">
														<i class="fa fa-folder-open green"></i>
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
<script>
$(document).ready(function(e) {
	var flag = $('tr').attr('status').text();
});
</script>
         <!--footer-->   
</body>
</html>