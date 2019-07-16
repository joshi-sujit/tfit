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
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <?php
										foreach($query->result() as $record){
										?>
											<tr>
                                                <td width="20%">Booked Date</td>
												<td><?=$record->booked_date?></td>
											</tr>
											<tr>
                                                <td width="20%">Appointment Date</td>
												<td><?=$record->appointment_date?></td>
											</td>
											<tr>												
												<td width="20%">Appointment Time</td>
												<td><?=$record->appointment_time?></td>
											</tr>
											<tr>												
												<td width="20%">Doctor</td>
												<td><?=$record->doctor_name?></td>
											</tr>
											<tr>
												<td width="20%">Patient</th>
												<td><?=$record->name?></td>
											</tr>
											<tr>
												<td width="10%">Contact</td>
												<td><?php echo $record->phone.",". $record->mobile?></td>
											</tr>
											<tr>
												<td width="10%">Email</td>
												<td><?=$record->email?></td>
											</tr>
                                                <td width="10%">General Description</td>
												<td><?=$record->description?></td>
                                            </tr>
											<?php
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