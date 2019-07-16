<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider extends CI_Controller{
	
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
		$data['query'] = $this->db->query("SELECT * FROM tbl_slider");
        $this->load->view('admin/slider/index', $data);
	}
	
	public function newSlider(){
		$this->load->view('admin/slider/newslider');
	}
	
	/*Inserting and Updating Production Activities in database*/
	public function save(){
		$slider_id = $this->input->post('id');
		$featured = $this->input->post('featured');
		if($slider_id == ""){
			$this->load->model('Idgenerator');
			/*Generating Unique Id for tbl_slider*/
			$id = $this->Idgenerator->genId('tbl_slider','slider_id');

			if($image_name = $this->do_upload()){
				/*INSERTING DATA AFTER IMAGE UPLOAD*/
				$data = array(
					 'slider_id' => $id ,
					 'slider_image' => $image_name,
					 'status' => $featured
				);
				if($this->db->insert('tbl_slider', $data)){
					$redirect=base_url()."slider/index/"."success";
					redirect($redirect);
				}
					
			}
		}/*End of If - FOR activity_id*/
		else{
			$id = $this->encryption->decrypt($slider_id);
			if($_FILES["userfile"]["name"] == ""){
				$data['status']= $featured;
			}/*End-If-Condition to check image set*/
			else{
				
				$img_name = $this->input->post('image_name');
				$img_thumb = $this->input->post('image_thumb');
				$img_name_path = './image/slider/'.$img_name;
				$img_thumb_path = './image/slider/thumb/'.$img_thumb;
				unlink($img_name_path);
				unlink($img_thumb_path);
				if($image_name = $this->do_upload()){
				/*UPDATING DATA AFTER IMAGE UPLOAD*/
					$data = array(
						 'slider_image' => $image_name,
					 	 'status' => $featured
					);
				}/*End-If-Condition to check image uploaded*/
			}
			/*Executing Update Statement after data fixing*/
			if($this->db->where('slider_id',$id)->update('tbl_slider',$data)){
				$redirect=base_url()."slider/index/"."editsuccess";
				redirect($redirect);
			}
		}
	}
	
	public function getById(){
		$value = $this->uri->segment(3);
		$id = base64_decode($value);
		$encrypt_id = $this->encryption->encrypt($id);
		$data['encrypt_id'] = $encrypt_id;
		$data['query'] = $this->db->query("SELECT * FROM tbl_slider WHERE slider_id='$id'");
		$this->load->view('admin/slider/newslider',$data);
	}
	
	public function delete(){
		$value = $this->uri->segment(3);
		$id = base64_decode($value);
		$query = $this->db->get_where('tbl_slider', array('slider_id' => $id));
		foreach($query->result() as $record){
			$image_name = $record->slider_image;
			$name = explode(".",$image_name);
			$img_thumb = $name[0]."_thumb".".".$name[1];
		}
		$img_name_path = './image/slider/'.$image_name;
		$img_thumb_path = './image/slider/thumb/'.$img_thumb;
		unlink($img_name_path);
		unlink($img_thumb_path);
		$this->db->delete('tbl_slider', array('slider_id' => $id));
		$redirect=base_url()."slider/index"."/delsuccess";
		redirect($redirect);	
	}
	
		
	/*Image Upload Function + THUMBNAIL CREATION*/	
	public function do_upload()
	{
		$config['upload_path'] = 'image/slider/';
		$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
		$config['max_size']	= '5000';
		
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('admin/slider/newslider', $error);
		}
		else
		{
			$data = $this->upload->data(); // Data upload
			/*THUMBNAIL CREATION*/
			$name = $data['file_name'];
			
			$config['image_library'] = 'gd2';
			$config['source_image']	= "image/slider/$name";
			$config['new_image'] = "image/slider/thumb/$name";
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