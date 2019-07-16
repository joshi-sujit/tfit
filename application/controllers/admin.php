<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	
	public function __construct(){
			parent::__construct();
				$this->no_cache();
				$loggedInUser=$this->session->userdata('tfit_user');
				if($loggedInUser==""){
					$redirect=base_url()."_cpanel";
					redirect($redirect);
				}
	}

	public function index(){
		$this->load->view('admin/index');
		
	}
	
	public function home()
	{
		$this->load->view('admin/home/index');
	}

	public function editVideo(){
		$video_link = $this->input->post('video_link');
		$query = $this->db->query("UPDATE tbl_video 
								   SET video_link ='$video_link'");
		if($query){
			echo "1";
		}else{
			echo "0";
		}
	}

	public function logout(){
            $this->session->sess_destroy();
            $redirectLog = base_url()."_cpanel";
            redirect($redirectLog);
           
    }
		

	/** Clear the old cache (usage optional) **/ 
	protected function no_cache(){
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0',false);
	header('Pragma: no-cache'); 
	}
	
}