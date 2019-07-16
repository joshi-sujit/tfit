<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->no_cache();
		$loggedInUser=$this->session->userdata('tfit_user');
		if($loggedInUser==""){
			$redirect=base_url()."_cpanel";
			redirect($redirect);
		}
	}
	
	/*Index Function - Directs towards list of purchases*/
	public function index(){
		$query = $this->db->query('SELECT * FROM tbl_bill ORDER BY payment_date DESC');
		$data['result'] = $query->result();
		$this->load->view('admin/purchase/index',$data);
	}
	
	/** Clear the old cache (usage optional) **/ 
	protected function no_cache(){
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 
	}
}