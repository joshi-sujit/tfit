<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transformation extends CI_Controller{
	
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
		$query = $this->db->get('tbl_transformation');
		$data['result'] = $query->result();
        $this->load->view('admin/transformation/index', $data);
	}
	
	public function newTransformation(){
		$this->load->view('admin/transformation/newtransformation');
	}

	public function getById(){
		$value = $this->uri->segment(3);
		$id = base64_decode($value);
		$encrypt_id = $this->encryption->encrypt($id);
		$data['encrypt_id'] = $encrypt_id;
		$query = $this->db->get_where('tbl_transformation', array('transformation_id' => $id));
		$data['result'] = $query->result();
		$this->load->view('admin/transformation/newtransformation',$data);
	}
	
	public function save(){
		$transformation_id = $this->input->post('id');
		$client_name = $this->input->post('client_name');
		$description = $this->input->post('description');	

		if($transformation_id == ""){
			$this->load->model('Idgenerator');
			/*Generating Unique Id for tbl_services*/
			$id = $this->Idgenerator->genId('tbl_transformation','transformation_id');

			if($image_name = $this->do_upload()){
				/*INSERTING DATA AFTER IMAGE UPLOAD*/
				$data = array(
					 'transformation_id' => $id,
					 'client_name' => $client_name,
					 'description' => $description,
					 'image' => $image_name
				);
				if($this->db->insert('tbl_transformation', $data)){
					$redirect=base_url()."transformation/index/"."success";
					redirect($redirect);
				}
			}
		}/*End of If - FOR transformation_id*/
		else{
			$id = base64_decode($transformation_id);
			if($_FILES["userfile"]["name"] == ""){
				$data = array(
				   'client_name' => $client_name,
				   'description' => $description
            	);

			}/*End-If-Condition to check image set*/
			else{
				$img_name = $this->input->post('image_name');
				$img_thumb = $this->input->post('image_thumb');
				$img_name_path = './image/transformation/'.$img_name;
				$img_thumb_path = './image/transformation/thumb/'.$img_thumb;
				unlink($img_name_path);
				unlink($img_thumb_path);
				if($image_name = $this->do_upload()){
				/*UPDATING DATA AFTER IMAGE UPLOAD*/
					$data = array(
						 'client_name' => $client_name,
						 'description' => $description,
						 'image' => $image_name
					);
				}/*End-If-Condition to check image uploaded*/
			}
			
			/*Executing Update Statement after data fixing*/
			$this->db->where('transformation_id', $id);
			if($this->db->update('tbl_transformation', $data)){
				$redirect=base_url()."transformation/index/"."editsuccess";
				redirect($redirect);
			}
		}
	}

	/*Deleting the production activities*/
	public function delete(){
		$id = $this->uri->segment(3);
		$transformation_id = base64_decode($id);
		$query = $this->db->get_where('tbl_transformation', array('transformation_id' => $transformation_id));
		foreach($query->result() as $record){
			$image_name = $record->image;
			$name = explode(".",$image_name);
			$img_thumb = $name[0]."_thumb".".".$name[1];
		}
		$img_name_path = './image/transformation/'.$image_name;
		$img_thumb_path = './image/transformation/thumb/'.$img_thumb;

		unlink($img_name_path);
		unlink($img_thumb_path);

		$query_delete = $this->db->where('transformation_id',$transformation_id)->delete('tbl_transformation');
		$redirect=base_url()."transformation/index"."/delsuccess";
		redirect($redirect);
		/*End-If-Condition to validate data update*/
	}

	/*Image Upload Function + THUMBNAIL CREATION*/	
	//returns image_name
	public function do_upload()
	{
		$config['upload_path'] = 'image/transformation/';
		$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
		$config['max_size']	= '1000';
		
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		if (!$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/transformation/newtransformation', $error);
		}
		else
		{
			$data = $this->upload->data(); // Data upload
			$name = $data['file_name'];
		
			$config['image_library'] = 'gd2';
			$config['source_image']	= "image/transformation/$name";
			$config['new_image'] = "image/transformation/thumb/$name";
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