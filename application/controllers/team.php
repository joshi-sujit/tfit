<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller{
	
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
		$query = $this->db->get('tbl_team');
		$data['result'] = $query->result();
        $this->load->view('admin/team/index', $data);
	}
	
	public function newTeam(){
		$this->load->view('admin/team/newteam');
	}
	public function getById(){
		$value = $this->uri->segment(3);
		$id = base64_decode($value);
		$encrypt_id = $this->encryption->encrypt($id);
		$data['encrypt_id'] = $encrypt_id;
		$query = $this->db->get_where('tbl_team', array('team_id' => $id));
		$data['result'] = $query->result();
		$this->load->view('admin/team/newteam',$data);
	}
	
	public function save(){
		$team_id = $this->input->post('id');
		$member_name = $this->input->post('member_name');
		$position = $this->input->post('position');
		$description = $this->input->post('description');	

		if($team_id == ""){
			$this->load->model('Idgenerator');
			/*Generating Unique Id for tbl_services*/
			$id = $this->Idgenerator->genId('tbl_team','team_id');

			if($image_name = $this->do_upload()){
				/*INSERTING DATA AFTER IMAGE UPLOAD*/
				$data = array(
					 'team_id' => $id,
					 'name' => $member_name,
					 'position' => $position,
					 'description' => $description,
					 'image' => $image_name
				);
				if($this->db->insert('tbl_team', $data)){
					$redirect=base_url()."team/index/"."success";
					redirect($redirect);
				}
			}
		}/*End of If - FOR team_id*/
		else{
			$id = base64_decode($team_id);
			if($_FILES["userfile"]["name"] == ""){
				$data = array(
				   'name' => $member_name,
				   'position' => $position,
				   'description' => $description
            	);

			}/*End-If-Condition to check image set*/
			else{
				$img_name = $this->input->post('image_name');
				$img_thumb = $this->input->post('image_thumb');
				$img_name_path = './image/team/'.$img_name;
				$img_thumb_path = './image/team/thumb/'.$img_thumb;
				unlink($img_name_path);
				unlink($img_thumb_path);
				if($image_name = $this->do_upload()){
				/*UPDATING DATA AFTER IMAGE UPLOAD*/
					$data = array(
						 'name' => $member_name,
						 'position' => $position,
						 'description' => $description,
						 'image' => $image_name
					);
				}/*End-If-Condition to check image uploaded*/
			}
			
			/*Executing Update Statement after data fixing*/
			$this->db->where('team_id', $id);
			if($this->db->update('tbl_team', $data)){
				$redirect=base_url()."team/index/"."editsuccess";
				redirect($redirect);
			}
		}
	}

	/*Deleting the production activities*/
	public function delete(){
		$id = $this->uri->segment(3);
		$team_id = base64_decode($id);
		$query = $this->db->get_where('tbl_team', array('team_id' => $team_id));
		foreach($query->result() as $record){
			$image_name = $record->image;
			$name = explode(".",$image_name);
			$img_thumb = $name[0]."_thumb".".".$name[1];
		}
		$img_name_path = './image/team/'.$image_name;
		$img_thumb_path = './image/team/thumb/'.$img_thumb;

		unlink($img_name_path);
		unlink($img_thumb_path);

		$query_delete = $this->db->where('team_id',$team_id)->delete('tbl_team');
		$redirect=base_url()."team/index"."/delsuccess";
		redirect($redirect);
		/*End-If-Condition to validate data update*/
	}

	/*Image Upload Function + THUMBNAIL CREATION*/	
	//returns image_name
	public function do_upload()
	{
		$config['upload_path'] = 'image/team/';
		$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
		$config['max_size']	= '1000';
		
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		if (!$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/team/newteam', $error);
		}
		else
		{
			$data = $this->upload->data(); // Data upload
			$name = $data['file_name'];
		
			$config['image_library'] = 'gd2';
			$config['source_image']	= "image/team/$name";
			$config['new_image'] = "image/team/thumb/$name";
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