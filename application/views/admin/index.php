<style>
.clear{
	clear:both;
}
</style>
<?php $this->load->view('admin/include/header'); ?>

<div class="wrapper row-offcanvas row-offcanvas-left"> 
	<!---left_panel-->
	<?php $this->load->view('admin/include/left'); ?>
	<!--END LEFT PANEL-->
	
	<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1> Dashboard <small>Control panel</small> </h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>
	
	<!-- Main content -->
	<section class="content">
	<div class="row"> <div class="col-md-6">
							
		<p> Welcome, to the dashboard panel.</p>
		<p> Please navigate throught the navigation pane to your left. </p>
	</div>
</div>
</section>
<!-- /.content -->
</aside>
<!--right_panel-->
</div>
<div class="clear"></div>

<!--footer-->
<?php $this->load->view('admin/include/footer'); ?>
<!--footer-->

</body></html>