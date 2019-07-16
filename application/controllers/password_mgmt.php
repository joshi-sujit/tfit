<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Password_mgmt extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->no_cache();
		$loggedInUser=$this->session->userdata('tfit_user');
		if($loggedInUser==""){
			$redirect=base_url()."_cpanel";
			redirect($redirect);
		}
	}

    function index()
	{
		$this->load->view('admin/password/index');
	}
	
	public function change(){
		$entered_pwd = mysql_real_escape_string($this->input->post('old_pwd'));
		$salt = "ewu$%9@sf8@$&^sxrq2";
		$pwd = $salt.$entered_pwd;
		$encrypted_pwd = md5($pwd);

		//echo "01b15aae1ae372ef54f4eb59460daa8b"."<br />";
		//echo $encrypted_pwd;
		//die;
		
		$new_pwd = mysql_real_escape_string($this->input->post('new_pwd'));
		$re_new_pwd = mysql_real_escape_string($this->input->post('re_new_pwd'));
		
		/*Extracting Old Password for comparison*/
		$query = $this->db->query("SELECT * FROM tbl_admin");
		foreach($query->result() as $record){
			$actual_pwd = $record->password;
		}
		
		if($re_new_pwd != $new_pwd){
			//$data['error'] = "Re-Entered password mismatch";
			//$this->load->view('admin/password/index',$data);
			$redirect=base_url()."password_mgmt/index"."/pwdmismatch";
		}
		elseif($encrypted_pwd != $actual_pwd){
			//$data['error'] = "Old password did not match";
			//$this->load->view('admin/password/index',$data);
			$redirect=base_url()."password_mgmt/index"."/pwdwrong";
		}else{
			$salt = "ewu$%9@sf8@$&^sxrq2";
			$password = $salt.$new_pwd;
			$set_pwd = md5($password);
			
			$data = array(
					'password' => $set_pwd );
			if($this->db->update('tbl_admin', $data)){
				//$data['success'] = "Password changed successfully";
				$redirect=base_url()."password_mgmt/index"."/pwdsuccess";
			}
		}
		redirect($redirect);

	}
	

		/** Clear the old cache (usage optional) **/ 
protected function no_cache(){
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache'); 
}
	
}