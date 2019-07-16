<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Password_manage extends CI_Controller {
	
	    public function __construct(){
		        parent::__construct();
					$this->load->library('session');
					$this->no_cache();
            		$loggedInUser=$this->session->userdata('username');
            		if($loggedInUser==""){
      		            $redirect=base_url()."_cpanel";
                		redirect($redirect);
            		}
		}
		
		
    function index()
	{
		$this->load->view('admin/password/index');
	}
	
	
	
	function  update_login()
	{
	$new_pass= $this->input->post('new_pass');
	$con_pass=$this->input->post('con_pass');
	
				if($new_pass == '')
				{
					$data['error_new']= "This feild can't be empty";
					$this->load->view('admin/password/index',$data);
					
				}
				elseif($con_pass == '')
				{
					$data['error_con']= "This feild can't be empty";
					$this->load->view('admin/password/index',$data);
					
				}
				elseif($new_pass != $con_pass)
				{
					$data['error_match']= "password didn't match";
					$this->load->view('admin/password/index',$data);
				}
	
				else
				{
				
		$password = mysql_real_escape_string($new_pass);
        $salt = "oijahsfdapsf80efdjnsdjp";
        $salt .= $password;
        $password = $salt;
        $password = md5($password);
		$user=$this->session->userdata('username');

		$data = array(
												              'password' => $password
															);
																	$this->db->where('username', $user);
																	$result=$this->db->update('super_user', $data); 
																	if($result)
																	{
				
					$this->session->set_flashdata('sucess', 'Password updated successfully');
					$redirect=base_url()."password_manage";
					redirect($redirect);
					}
				}
				
	
	
	
	}
	

		/** Clear the old cache (usage optional) **/ 
protected function no_cache(){
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache'); 
}
	
}