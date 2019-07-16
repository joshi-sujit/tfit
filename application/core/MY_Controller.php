<?php

/**
 * The base controller which is used by the Front and the Admin controllers
 */
class Base_Controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
}

class Admin_Controller extends Base_Controller 
{
	function __construct()
	{
               
		parent::__construct();
                $this->load->helper('My_admin');
                $admin_id=$this->session->userdata('admin_user_id');
		 if(!$admin_id || empty($admin_id)){
                    redirect(site_url('_cpanel'));
                }
                if($this->session->userdata('group')!=1){
                     redirect(site_url('blog_management'));
                }
	}
}
class Blog_Controller extends Base_Controller 
{
	function __construct()
	{
               
		parent::__construct();
                $this->load->helper('My_admin');
               $admin_id=$this->session->userdata('admin_user_id');
		 if(!$admin_id || empty($admin_id)){
                    redirect(site_url('_cpanel'));
                }
             
	}
}