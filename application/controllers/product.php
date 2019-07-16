<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller{
	
	public function __construct(){
			parent::__construct();
				$this->no_cache();
				$loggedInUser=$this->session->userdata('tfit_user');
				if($loggedInUser==""){
					$redirect=base_url()."_cpanel";
					redirect($redirect);
				}
	}
	
	/*Index Function - Directs towards list of product*/
	public function index(){
		$data['query'] = $this->db->query("SELECT * FROM tbl_product WHERE status = 1");
        $this->load->view('admin/product/index', $data);
		$this->load->helper(array('form', 'url'));
	}
	
	/*Triggering View for new activity and edit*/
	public function newproduct(){
		$id = $this->uri->segment(3);
		if($id == ""){
			$this->load->view('admin/product/newproduct');
		}
		else{
			$data['query'] = $this->db->query("SELECT * FROM tbl_product 
												WHERE product_id='$id' AND status = 1");
			$data['error'] = 1;
			$this->load->view('admin/product/editproduct',$data);		
		}
	}
	
	/*Inserting and Updating Products in database*/
	public function save(){
		$this->load->model('Idgenerator');
		
		$product_name = $this->input->post('product_name');
		$rate = $this->input->post('rate');
		
		/*Generating Unique Id for tbl_product*/
		$id = $this->Idgenerator->genId('tbl_product','product_id');
		$error_no = $this->do_upload($id);
			$data = array(
					 'product_id' => $id ,
					 'product_name' => $product_name ,
					 'rate' => $rate,
					 'status' => '1'
					);
		if($this->db->insert('tbl_product', $data)){
			$redirect=base_url()."product/index/"."success"."/$error_no";
			redirect($redirect);	 
		}
			
	}
	
	
	/*Editing the product content only*/
	public function editsave(){
		$product_id = $this->input->post('product_id');
		$product_name = $this->input->post('product_name');
		$rate = $this->input->post('rate');
		
		$query = $this->db->query("UPDATE tbl_product SET 
								   product_name='$product_name',
								   rate = '$rate'
								   WHERE product_id = '$product_id'");
		
		if($query){
			$redirect=base_url()."product/index/"."success";
			redirect($redirect);
		}
	}
	
	/*Deleting the product*/
	public function delete(){
		$product_id = $this->uri->segment(3);
		
		/*Image Deletion*/
		$query_image = $this->db->get_where('tbl_image_product', array('product_id' => $product_id));
		foreach($query_image->result() as $image){
			$image_name = $image->image_name;
			$name = explode(".",$image_name);
			$img_thumb = $name[0]."_thumb".".".$name[1];
			$img_name_path = './image/product/'.$image_name;
			$img_thumb_path = './image/product/thumb/'.$img_thumb;
			/*Deleting Image Files*/
			unlink($img_name_path);
			unlink($img_thumb_path);
		}
		//Deleteing image record from database
		$query_delete_image_record=$this->db->query("DELETE FROM tbl_image_product WHERE product_id = '$product_id'");
				
		//Updating status of product for deleted product
		$delete_query = $this->db->query("DELETE FROM tbl_product WHERE product_id = '$product_id'");
		$redirect=base_url()."product/index/"."delsuccess";
		redirect($redirect);
	}
	
	/*Adding more images*/
	public function moreimage(){
		$id = $this->uri->segment(3);
		$error_no = $this->do_upload($id);
		$redirect=base_url()."product/index/"."success"."/$error_no";
		redirect($redirect);
	}
	
	/*Multiple Image Upload Function + THUMBNAIL CREATION*/	
	public function do_upload($id){
		
		$product_id = $id;
		$error_no = 0;
		$config = array();
		$config['upload_path'] = './image/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|JPG|JPEG';
		$config['max_size']      = '1000000';
		$config['overwrite']     = FALSE;

    	$this->load->library('upload');
		$this->load->model('idgenerator');
		
		$this->upload->initialize($config);

   		$files = $_FILES;
    	$cpt = count($_FILES['userfile']['name']);
    	for($i=0; $i<$cpt; $i++)
    	{
        	$_FILES['userfile']['name']= $files['userfile']['name'][$i];
        	$_FILES['userfile']['type']= $files['userfile']['type'][$i];
        	$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        	$_FILES['userfile']['error']= $files['userfile']['error'][$i];
        	$_FILES['userfile']['size']= $files['userfile']['size'][$i];    
			
			
			if($this->upload->do_upload()){
				$data = $this->upload->data();
				$name = $data['file_name'];
				$image_id = $this->idgenerator->genId('tbl_image_product','image_id');
				$data = array(
					 'image_id' => $image_id,
					 'image_name' => $name,
					 'product_id' => $product_id
				);
				$this->db->insert('tbl_image_product', $data);
				
				/*THUMBNAIL CREATION*/
				$config['image_library'] = 'gd2';
				$config['source_image']	= "image/product/$name";
				$config['new_image'] = "image/product/$name";
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']	= 600;
				$config['height']	= 600;
				
				$this->load->library('image_lib'); 
				$this->image_lib->initialize($config);
				$error = $this->image_lib->resize();
				$remove_image_link = "image/product/$name";
				unlink($remove_image_link);
			}else{
				$error_no = $error_no + 1;
			}
		}
		return $error_no;
	}
	
	/*DELETE IMAGE*/
	public function delImage(){
		$image_id = $this->input->post('image_id');
		$image_name = $this->input->post('image_name');
		$name = explode(".",$image_name);
		$img_thumb = $name[0]."_thumb".".".$name[1];
		$img_thumb_path = './image/product/'.$img_thumb;
		/*Deleting Image Files*/
		unlink($img_thumb_path);
		$image_del = $this->db->query("DELETE FROM tbl_image_product WHERE image_id = '$image_id'");
		
	}

	/** Clear the old cache (usage optional) **/ 
	protected function no_cache(){
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 
	}
}