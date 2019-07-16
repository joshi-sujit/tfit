<?php
$user=$this->session->userdata('tfit_user');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
	    <title>TFIT-360 - Online Store</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?=base_url()?>admin_files/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?=base_url()?>admin_files/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Ionicons -->
        <link href="<?=base_url()?>admin_files/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?=base_url()?>admin_files/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" 
		type="text/css" />
		<!-- Theme style -->
        <link href="<?=base_url()?>admin_files/css/AdminLTE.css" rel="stylesheet" type="text/css" />
		 <!-- DATA TABLES -->
        <link href="<?=base_url()?>admin_files/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_files/css/jQueryUI/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_files/js/bootstrap-timepicker-gh-pages/css/bootstrap-timepicker.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_files/css/jquery.chosen.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_files/css/custom.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>plugin/nailthumb/jquery.nailthumb.1.1.css">
    </head>
	
	<body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
            	<img src="<?=base_url()?>img/logo-white.png" style="width:50%; height:auto; margin-top:6px; vertical-align:top;" /> 
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                       <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?=$user?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?=base_url()?>admin/logout" class="btn btn-default btn-flat">Log out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>		
