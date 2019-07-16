<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
			$this->no_cache();
            $loggedInUser=$this->session->userdata('username');
            if($loggedInUser==""){
      			$redirect=base_url()."_cpanel";
                redirect($redirect);
           	}
	}
	
	public function index(){
		$data['query'] = $this->db->query("SELECT * FROM tbl_upload");
        $this->load->view('admin/upload/index', $data);
	}
	
	public function save(){
		$this->load->model('Idgenerator');
		/*Generating Unique Id for tbl_upload*/
		$id = $this->Idgenerator->genId('tbl_upload','upload_id');

		if($file_name = $this->do_upload()){
			/*INSERTING DATA AFTER IMAGE UPLOAD*/
			$data = array(
				 'upload_id' => "$id" ,
				 'file_name' => "$file_name"
			);
			if($this->db->insert('tbl_upload', $data)){
				$redirect=base_url()."upload/index/"."success";
				redirect($redirect);
			}
		}
	}
	
	public function delete(){
		$value = $this->uri->segment(3);
		$id = base64_decode($value);
		$query = $this->db->get_where('tbl_upload', array('upload_id' => $id));
		foreach($query->result() as $record){
			$file_name = $record->file_name;
		}
		$file_name_path = './upload_file/'.$file_name;
		unlink($file_name_path);

		$this->db->delete('tbl_upload', array('upload_id' => $id));
		$redirect=base_url()."upload/index"."/delsuccess";
		redirect($redirect);	
	}
	
	/*File Upload Function + THUMBNAIL CREATION*/	
	public function do_upload()
	{
		$config['upload_path'] = 'upload_file/';
		$config['allowed_types'] = 'jpg|png|JPG|JPEG|jpeg|pdf|PDF|doc|docx';
		$config['max_size']	= '5120';
		
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = array('error' => $this->upload->display_errors());
			$data['query'] = $this->db->query("SELECT * FROM tbl_upload");
       		$this->load->view('admin/upload/index', $data);
		}
		else
		{
			$data = $this->upload->data(); // Data upload
			$name = $data['file_name'];
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