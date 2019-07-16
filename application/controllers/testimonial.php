<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Testimonial extends CI_Controller {
	
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
		$query = $this->db->get('tbl_testimonial');
		$data['result'] = $query->result();
        $this->load->view('admin/testimonial/index', $data);
		
	}

	//@author Sujit 
	//@Params None
	//@Returns None
	//Redirect to the new of testimonials
	public function newTestimonial(){
		$this->load->view('admin/testimonial/newtestimonial');
	}

	//@author Sujit 
	//@Params None
	//@Returns None
	//Inserting and Updating testimonial 
	public function save(){
		$id = $this->input->post('id');
		$client_name = $this->input->post('client_name');
		$client_desc = $this->input->post('description');

		$data = array('client_name' => $client_name,
					  'description' => $client_desc,
					 );

		if($id == ""){
			/*Generating Unique Id for tbl_testimonials*/
			$this->load->model('Idgenerator');
			$id = $this->Idgenerator->genId('tbl_testimonial','testimonial_id');
            $data['testimonial_id'] = $id;

			if($this->db->insert('tbl_testimonial', $data)){
				$redirect=base_url()."testimonial/index/"."success";
				redirect($redirect);
			}
		}/*End of If - FOR id*/
		else{
			$testimonial_id = $this->encryption->decrypt($id);//decrypting the id supplied from for
		
			/*Executing Update Statement after data fixing*/
			$this->db->where('testimonial_id', $testimonial_id);
			if($this->db->update('tbl_testimonial', $data)){
				$redirect=base_url()."testimonial/index/"."editsuccess";
				redirect($redirect);
			}
		}
	}
	
	public function getById(){
		$value = $this->uri->segment(3);
		$id = base64_decode($value);
		$encrypt_id = $this->encryption->encrypt($id);
		$data['encrypt_id'] = $encrypt_id;
		$query = $this->db->get_where('tbl_testimonial',array('testimonial_id' => $id));
		$data['result'] = $query->result();
		$this->load->view('admin/testimonial/newtestimonial',$data);
	}
	
	public function delete(){
		$value = $this->uri->segment(3);
		$id = base64_decode($value);
		$this->db->delete('tbl_testimonial', array('testimonial_id' => $id));
		$redirect=base_url()."testimonial/index/"."delsuccess";
		redirect($redirect);	
	}
	
	

	/** Clear the old cache (usage optional) **/ 
	protected function no_cache(){
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0',false);
	header('Pragma: no-cache'); 
	}
	
}