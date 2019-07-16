<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller{
	
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
		$query = $this->db->get('tbl_content');
		$data['result'] = $query->result();
        $this->load->view('admin/content/index', $data);
	}
	
	public function getById(){
		$value = $this->uri->segment(3);
		$id = base64_decode($value);
		$encrypt_id = $this->encryption->encrypt($id);
		$data['encrypt_id'] = $encrypt_id;
		$data['query'] = $this->db->query("SELECT * FROM tbl_content WHERE content_id='$id'");
		$this->load->view('admin/content/manageContent',$data);
	}
	
	public function save(){
		$encrypted_id = $this->input->post('id');
		$id = $this->encryption->decrypt($encrypted_id);
		$description = $this->input->post('description');
		$data = array(
				'content_desc' => "$description"
				);
		$this->db->where('content_id', $id);
		$this->db->update('tbl_content', $data); 
		$redirect=base_url()."content/index/"."editsuccess";
		redirect($redirect);
	}


	/** Clear the old cache (usage optional) **/ 
	protected function no_cache(){
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 
	}
}