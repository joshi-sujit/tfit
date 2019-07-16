 <?php $this->load->view('admin/include/header'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
 <!---left_panel-->
 	<?php $this->load->view('admin/include/left');?>
<!--END LEFT PANEL-->
            
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Purchase Record
                        <small>List of Purchases</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>admin/"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Purchase Record</li>
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
                                                <th>Invoice No</th>
                                                <th>Date Time</th>
                                                <th>Card Type</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>User</th>
                                                <th>Sold Item</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$counter = 1;
										foreach($result as $record){
                                            $bill_no = $record->bill_no;
										?>
                                            <tr>
                                                <td><?=$counter?></td>
                                                <td><?=$bill_no?></td>
                                                <td><?=$record->payment_date?>
                                                <td><?=$record->card_type?></td>
                                                <td><?php echo "$".$record->amount?></td>
                                                <td><?=$record->status?></td>
                                                <td>
                                                    <?php
                                                    $user_id = $record->user_id;
                                                    if($user_id == "N/A"){
                                                        echo "N/A";
                                                    }else{
                                                        $user_query = $this->db->get_where('tbl_user',array('user_id' => $user_id));
                                                        $user_result = $user_query->row();
                                                        echo $user_result->username;
                                                    }
                                                    ?>
                                                </td>

                                                <td>
                                                <?php
                                                $type = $record->type;
                                                if($type == "subscription"){
                                                   $this->db->select('*')->from('tbl_bill_subscription')->where('bill_no',$bill_no)->join('tbl_pricing_plan','tbl_pricing_plan.plan_id = tbl_bill_subscription.plan_id');
                                                    $subscription_query = $this->db->get();
                                                    $subscription_result = $subscription_query->row();
                                                    echo $subscription_result->plan_title;
                                                }elseif($type == "bootcamp"){
                                                    $bootcamp_query = $this->db->get_where('tbl_bootcamp_bill',array('bill_no' => $bill_no));
                                                    $bootcamp_result = $bootcamp_query->row();
                                                    echo $bootcamp_result->name;
                                                }elseif($type == "product"){
                                                    $this->db->select('*')->from('tbl_order_item_bill')->where('bill_no',$bill_no)->join('tbl_product','tbl_product.product_id = tbl_order_item_bill.product_id');
                                                    $product_query = $this->db->get();
                                                    $product_result = $product_query->result();
                                                    foreach ($product_result as $product) {
                                                        echo "- ". $product->product_name ."<br />";
                                                    }
                                                }
                                                ?>
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