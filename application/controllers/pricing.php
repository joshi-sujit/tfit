<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pricing extends CI_Controller {
	
	public function __construct(){
			parent::__construct();
				$this->no_cache();
				$loggedInUser=$this->session->userdata('tfit_user');
				if($loggedInUser==""){
					$redirect=base_url()."_cpanel";
					redirect($redirect);
				}
	}

	//@author Sujit 
	//@Params None
	//@Returns None
	//Redirect to the list of testimonials
	public function index(){
		$query = $this->db->get('tbl_pricing_plan');
		$data['result'] = $query->result();
        $this->load->view('admin/pricing_plan/index', $data);
		
	}

	//@author Sujit 
	//@Params None
	//@Returns None
	//Redirect to the new of testimonials
	public function newPricing(){
		$this->load->view('admin/pricing_plan/newplan');
	}

	//@author Sujit 
	//@Params None
	//@Returns None
	//Inserting and Updating pricing_plan 
	public function save(){
		$id = $this->input->post('id');

		$plan_name = $this->input->post('plan_name');
		$plan_desc = $this->input->post('description');
		$price = $this->input->post('price');

		$data = array('plan_title' => $plan_name,
					  'description' => $plan_desc,
					  'price' => $price
					 );

		if($id == ""){
			/*Generating Unique Id for tbl_plan*/
			$this->load->model('Idgenerator');
			$id = $this->Idgenerator->genId('tbl_pricing_plan','plan_id');
            $data['plan_id'] = $id;

			if($this->db->insert('tbl_pricing_plan', $data)){
				$redirect=base_url()."pricing/index/"."success";
				redirect($redirect);
			}
		}/*End of If - FOR id*/
		else{
			$plan_id = $this->encryption->decrypt($id);//decrypting the id supplied from for
		
			/*Executing Update Statement after data fixing*/
			$this->db->where('plan_id', $plan_id);
			if($this->db->update('tbl_pricing_plan', $data)){
				$redirect=base_url()."pricing/index/"."editsuccess";
				redirect($redirect);
			}
		}
	}
	
	public function getById(){
		$value = $this->uri->segment(3);
		$id = base64_decode($value);
		$encrypt_id = $this->encryption->encrypt($id);
		$data['encrypt_id'] = $encrypt_id;
		$query = $this->db->get_where('tbl_pricing_plan',array('plan_id' => $id));
		$data['result'] = $query->result();
		$this->load->view('admin/pricing_plan/newplan',$data);
	}
	
	public function delete(){
		$value = $this->uri->segment(3);
		$id = base64_decode($value);
		$this->db->delete('tbl_pricing_plan', array('plan_id' => $id));
		$redirect=base_url()."pricing/index/"."delsuccess";
		redirect($redirect);	
	}
	
	

	/** Clear the old cache (usage optional) **/ 
	protected function no_cache(){
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0',false);
	header('Pragma: no-cache'); 
	}
	
}