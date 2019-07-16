<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program extends CI_Controller{
	
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
		$query = $this->db->get('tbl_program');
		$data['result'] = $query->result();
        $this->load->view('admin/program/index', $data);
	}
	
	public function newProgram(){
		$this->load->view('admin/program/newprogram');
	}

	public function getById(){
		$value = $this->uri->segment(3);
		$id = base64_decode($value);
		$encrypt_id = $this->encryption->encrypt($id);
		$data['encrypt_id'] = $encrypt_id;
		$query = $this->db->get_where('tbl_program', array('program_id' => $id));
		$data['result'] = $query->result();
		$this->load->view('admin/program/newprogram',$data);
	}
	
	public function save(){
		$program_id = $this->input->post('id');
		$program_title = $this->input->post('program_title');
		$description = $this->input->post('description');	

		if($program_id == ""){
			$this->load->model('Idgenerator');
			/*Generating Unique Id for tbl_services*/
			$id = $this->Idgenerator->genId('tbl_program','program_id');

			if($image_name = $this->do_upload()){
				/*INSERTING DATA AFTER IMAGE UPLOAD*/
				$data = array(
					 'program_id' => $id,
					 'program_title' => $program_title,
					 'program_desc' => $description,
					 'image' => $image_name
				);
				if($this->db->insert('tbl_program', $data)){
					$redirect=base_url()."program/index/"."success";
					redirect($redirect);
				}
			}
		}/*End of If - FOR program_id*/
		else{
			$id = base64_decode($program_id);
			if($_FILES["userfile"]["name"] == ""){
				$data = array(
				   'program_title' => $program_title,
				   'program_desc' => $description
            	);

			}/*End-If-Condition to check image set*/
			else{
				$img_name = $this->input->post('image_name');
				$img_thumb = $this->input->post('image_thumb');
				$img_name_path = './image/program/'.$img_name;
				$img_thumb_path = './image/program/thumb/'.$img_thumb;
				unlink($img_name_path);
				unlink($img_thumb_path);
				if($image_name = $this->do_upload()){
				/*UPDATING DATA AFTER IMAGE UPLOAD*/
					$data = array(
						 'program_title' => $program_title,
						 'program_desc' => $description,
						 'image' => $image_name
					);
				}/*End-If-Condition to check image uploaded*/
			}
			
			/*Executing Update Statement after data fixing*/
			$this->db->where('program_id', $id);
			if($this->db->update('tbl_program', $data)){
				$redirect=base_url()."program/index/"."editsuccess";
				redirect($redirect);
			}
		}
	}

	/*Deleting the production activities*/
	public function delete(){
		$id = $this->uri->segment(3);
		$program_id = base64_decode($id);
		$query = $this->db->get_where('tbl_program', array('program_id' => $program_id));
		foreach($query->result() as $record){
			$image_name = $record->image;
			$name = explode(".",$image_name);
			$img_thumb = $name[0]."_thumb".".".$name[1];
		}
		$img_name_path = './image/program/'.$image_name;
		$img_thumb_path = './image/program/thumb/'.$img_thumb;

		unlink($img_name_path);
		unlink($img_thumb_path);

		$query_delete = $this->db->where('program_id',$program_id)->delete('tbl_program');
		$redirect=base_url()."program/index"."/delsuccess";
		redirect($redirect);
		/*End-If-Condition to validate data update*/
	}

	/*Image Upload Function + THUMBNAIL CREATION*/	
	//returns image_name
	public function do_upload()
	{
		$config['upload_path'] = 'image/program/';
		$config['allowed_types'] = 'jpg|png|JPG|JPEG|jpeg';
		$config['max_size']	= '5000';
		
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		if (!$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/program/newprogram', $error);
		}
		else
		{
			$data = $this->upload->data(); // Data upload
			$name = $data['file_name'];
		
			$config['image_library'] = 'gd2';
			$config['source_image']	= "image/program/$name";
			$config['new_image'] = "image/program/thumb/$name";
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 100;
			$config['height']	= 100;
			
			$this->load->library('image_lib'); 
			$this->image_lib->initialize($config);
			$error = $this->image_lib->resize();
			return $name;
		}
	}

	/** Clear the old cache (usage optional) **/ 
	protected function no_cache(){
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 
	}
}