<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Content extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->no_cache();
        $loggedInUser = $this->session->userdata('username');
        if ($loggedInUser == "") {
            $redirect = base_url() . "_cpanel";
            redirect($redirect);
        }
    }

  public function index()
  {
	  $this->load->view('admin/content/index');
  }
	
	

			public function upload_content()
			{
				 $main_heading=$this->input->post('mark');
				 $sub_head= $this->input->post('series');
				 $description=$this->input->post('description');
				 $heading=$this->input->post('heading');
				 			 
				 	$catMain =str_replace('cat','',$main_heading);
				
			
						
						$pic=$_FILES['image']['name'];
						
					
						if (!empty($pic))
							{
								$config['upload_path'] = 'content_img/';
								$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
								$config['max_size'] = '10000000';
								
								$this->upload->initialize($config);		
				
				
							if ($this->upload->do_upload('image'))
								{
									$data = $this->upload->data();
								}
								else
								{
									echo $this->upload->display_errors();
								}
								
															
							}
							
			
						
				 
				 
				 
								$data = array(
																	 
																	   'sub_category_id' => $sub_head,
																	   'category_id'=> $catMain,
																	   'heading' => $heading,
																	   'description' => $description,
																	   'image' =>$pic
																	  
																	  
																	   	);
																	
																	$result=$this->db->insert('content', $data); 
																		
																		$redirect=base_url()."content/all";
																			redirect($redirect);
																			}
																	
					   			
			
	
				
  
	  public function  all()
  {
	  
	 
  			
		
	  
	  $this->load->view('admin/content/all');
  }
  
  
  
  
   
  public function delete_content()
			{
				
				$id=$this->uri->segment('3');
				
				
$sql2="delete from content where id='$id'";
$query2= mysql_query($sql2) or die (mysql_error());

$redirect= base_url()."content/all";
					redirect($redirect);
			}



  
  
  
	
	public function edit()
	 {
		
		 
		 $id=$this->uri->segment('3');
		 $data['query']=$this->db->query("SELECT * FROM content WHERE id='$id'");
		 $this->load->view('admin/content/edit',$data);
		 
	 }
	 
	 
	 
	 
	 
	  public function update_content()
	 {

		 $id= $this->uri->segment('3');
		 
		// $heading=$this->input->post('mark');
				 $sub_head= $this->input->post('series');
				 $description=$this->input->post('description');
				 $heading=$this->input->post('heading');
				 
				 
				 $pic=$_FILES['image']['name'];
				if (!empty($pic))
							{
								$config['upload_path'] = 'content_img/';
								$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
								$config['max_size'] = '10000000';
								
								$this->upload->initialize($config);		
				
				
							if ($this->upload->do_upload('image'))
								{
									$data = $this->upload->data();
								}
								else
								{
									echo $this->upload->display_errors();
								}
								
								$data1 = array(
																   
									'sub_category_id' => $sub_head,
									'image' =>$pic,
									   'heading' => $heading,
									   'description' => $description
								   
								   );
								
								
								
				}
				else{
					
					
								$data1 = array(
																   
									'sub_category_id' => $sub_head,
									   'heading' => $heading,
									   'description' => $description
								   
								   );
				}
					 $this->db->where('id', $id);
					   $result1=$this->db->update('content', $data1);			
						if($result1)
							{
								
				   $redirect= base_url()."content/all";
				   redirect($redirect);
								
							}
		 
		 
		 
	 }		
	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
    /** Clear the old cache (usage optional) * */
    protected function no_cache() {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

}