<?php 
	$url = $this->uri->segment(1);
?>

<aside class="left-side sidebar-offcanvas"> 
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar"> 
		<!-- sidebar menu: : style can be found in sidebar.less -->
		
		<ul class="sidebar-menu">
			<li> <a href="#">Navigation Pane </a> </li>

			<li <?php $x = ($url == "admin") ? "active": ""; echo "class = ".$x;?>> 
			<a href="<?=base_url()?>admin"><i class="fa fa-home"></i> Dashboard </a> </li>

			<li class="treeview <?php if($url == "pricing" || $url == "program"){ echo " active";}?> "> 
			<a href="#"> <i class="fa fa-folder"></i> <span>Fitness Plans</span> <i class="fa fa-angle-left pull-right"></i> </a>
				<ul class="treeview-menu">
					<li <?php $x = ($url == "pricing") ? "active": ""; echo "class = ".$x;?>>
					<a href="<?=base_url()?>pricing"> <i class="fa fa-angle-double-right"></i>
					 <i class="fa fa-book"></i> Pricing Plan</a> </li>

					<li <?php $x = ($url == "program") ? "active": ""; echo "class = ".$x;?>>
					<a href="<?=base_url()?>program"> <i class="fa fa-angle-double-right"></i> <i class="fa fa-calendar"></i> Fitness Programs</a> </li>
				</ul>
			</li>

			<li class="treeview <?php if($url == "testimonial" || $url == "transformation" || $url == "client"){ echo " active";}?> "> 
			<a href="#"> <i class="fa fa-male"></i> <span>Client Informations</span> <i class="fa fa-angle-left pull-right"></i> </a>
				<ul class="treeview-menu">
					<li <?php $x = ($url == "#") ? "active": ""; echo "class = ".$x;?>>
					<a href="<?=base_url()?>client"> <i class="fa fa-angle-double-right"></i>
					 <i class="fa fa-list-ul"></i> Client Records</a> </li>

					<li <?php $x = ($url == "transformation") ? "active": ""; echo "class = ".$x;?>>
					<a href="<?=base_url()?>transformation"> <i class="fa fa-angle-double-right"></i>
					<i class="fa fa-arrow-circle-right"></i> Transformation </a> </li>

					<li <?php $x = ($url == "testimonial") ? "active": ""; echo "class = ".$x;?>>
					<a href="<?=base_url()?>testimonial"> <i class="fa fa-angle-double-right"></i> <i class="fa fa-comment"></i> Testimonials </a> </li>
				</ul>
			</li>

			<li  <?php $x = ($url == "purchase") ? "active": ""; echo "class = ".$x;?>> 
			<a href="<?=base_url()?>purchase"> <i class="fa fa-dollar"></i> Purchases </a></li>

			<li  <?php $x = ($url == "product") ? "active": ""; echo "class = ".$x;?>> 
			<a href="<?=base_url()?>product"> <i class="fa fa-archive"></i> Product </a></li>

			<li <?php $x = ($url == "team") ? "active": ""; echo "class = ".$x;?>> 
			<a href="<?=base_url()?>team"> <i class="fa fa-users"></i> Our Team </a></li>

			<li <?php $x = ($url == "content") ? "active": ""; echo "class = ".$x;?>> 
				<a href="<?=base_url()?>content"> <i class="fa fa-plus-square"></i>General Contents</a> 
			</li>
				
			<li class="treeview <?php if($url == "bootcamp"){ echo " active";}?>"> <a href="#"> <i class="fa fa-suitcase"></i> <span>Bootcamp Section</span> <i class="fa fa-angle-left pull-right"></i> </a>
				<ul class="treeview-menu">
					<li <?php $x = ($url == "bootcamp") ? "active": ""; echo "class = ".$x;?>>
					<a href="<?=base_url()?>bootcamp"> <i class="fa fa-angle-double-right"></i> <i class="fa fa-building-o"></i> About bootcamp</a> </li>
					<li <?php $x = ($url == "#") ? "active": ""; echo "class = ".$x;?>>
					<a href="#"> <i class="fa fa-angle-double-right"></i> <i class="fa fa-sign-in"></i> Bootcamp Schedule</a> </li>
				</ul>
			</li>

			<li> 
				<a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-youtube-play"></i>Video</a> 
			</li>

			<li <?php $x = ($url == "slider") ? "active": ""; echo "class = ".$x;?>> 
				<a href="<?=base_url()?>slider"> <i class="fa fa-sign-in"></i>Slider</a> 
			</li>

			<li <?php $x = ($url == "password_mgmt") ? "active": ""; echo "class = ".$x;?>> 
			<a href="<?=base_url()?>password_mgmt"> <i class="fa fa-gear"></i>Change Password</a></li>
		</ul>
	</section>
	<!-- /.sidebar --> 
</aside>
