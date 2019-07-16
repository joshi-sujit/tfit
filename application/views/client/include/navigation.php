<?php 
	$page = $this->uri->segment(2);
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid container"> 
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a class="navbar-brand navlink" href="
			<?php
				@$status = $this->session->userdata('logged_in_status');
				if($status){
					echo base_url()."user/workout";
				}else{
					echo base_url()."home";
				}
			?>
			"><img src="<?=base_url()?>img/logo.png" alt="TFIT360"></a> </div>
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li <?php if($page == "bio"){ echo "class='active'";}?>><a href="<?=base_url()?>home/bio">Bio</a></li>
				<li <?php if($page == "online"){ echo "class='active'";}?>>
					<a href="<?=base_url()?>home/online">Online Training
				</a></li>
				<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bootcamp <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?=base_url()?>home/program">Bootcamp Program</a></li>
						<li><a href="<?=base_url()?>home/team">Meet the team</a></li>
						<li><a href="<?=base_url()?>home/schedule">Schedule</a></li>
					</ul>
				</li>
				<li <?php if($page == "store"){ echo "class='active'";}?>><a href="<?=base_url()?>home/store">Store</a></li>
				<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php
							@$status = $this->session->userdata('logged_in_status');
							if(@$status){
						?>
						<li><a href="<?=base_url()?>profile/loadProfile/edit/<?php echo base64_encode($this->session->userdata('user_id')); ?>">My Profile</a></li>
						<li><a href="<?=base_url()?>home/logout">Logout</a></li>
						<?php
							}else{
						?>
						<li><a href="<?=base_url()?>home/login">Login/Register</a></li>
						<?php
							}
						?>
						<li><a href="<?=base_url()?>cart/view">Cart (<span id="nav-cart">
							<?php 
								@$value = count($this->cart->contents());
								//$value = 2;
								if(!is_null(@$value)){
									echo @$value;
								}else{
									echo "0";
								}									
							?></span>
						)</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse --> 
	</div>
	<!-- /.container-fluid -->
	</div>
</nav><!--/.nav-->