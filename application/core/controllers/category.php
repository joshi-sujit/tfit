<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Controller{
    public function __construct() {
        parent::__construct();
		// $this->load->helper('json');
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
	  $this->load->view('admin/category/index');
  }
	
public function save($array, $dir = NULL)
{
	/**
	 * param passed?
	 * set default dir path
	 */
	if(empty($dir))
	{
		$dir = APPPATH;
		$config_path = config_item('cache_path');		
		$dir = (!empty($config_path)) ? $dir.$config_path : $dir.'cache/score.cache';
	}
 
	/**
	 * file exist?
	 */
	if(file_exists($dir))
	{
		$json = file_get_contents($dir);
		$json = (array)json_decode($json);
	
		foreach ($json as $key => $value) 
		{
			if($key == $array['name'])
			{
				unset($json[$key]);
				$sjson[$key]['name'] = $array['name'];
				$sjson[$key]['score'] = $array['score'];
				$sjson[$key]['comment'] = $array['comment'];			
				break;
			}
			else
			{
				$sjson[$array['name']]['name'] = $array['name'];
				$sjson[$array['name']]['score'] = $array['score'];
				$sjson[$array['name']]['comment'] = $array['comment'];
				break;
			}
		}
 
		$json = array_merge($json, $sjson);
		$json = json_encode($json);
		file_put_contents($dir, $json);
	}
	else
	{
		$json = json_encode(array($array['name'] => $array));
		file_put_contents($dir, $json);
	}
	return $json;
}

/* End of file json.php */
/* Location: ./application/helpers/json.php */
	

  public function add_category()
  {

				
				$name= $this->input->post('name');
				
				$link= $this->input->post('link');
				$status="hide";
				
				
				$data = array(
																	   'name' => $name,
																	   'orders' => $link,
																	   'status' => $status
																	   
																	   	   
																	);
																	$this->save($data);
																	$result=$this->db->insert('category', $data); 
																		
																		$redirect=base_url()."category";
																			redirect($redirect);
								
						
				
			}
			
				
  
  
  
  
	
   public function edit_category()
	{				
			
			$id=$this->uri->segment('3');
					
			$name= $this->input->post('name');
			$link= $this->input->post('link');
			$status= $this->input->post('status');
			
			
								   
		$sql="update category set name='$name', orders='$link', status='$status'  where id='$id'";
		$query= mysql_query($sql) or die (mysql_error());
		$redirect= base_url()."category";
					redirect($redirect);
							
					
					
			
			
		}
	
		
 public function delete_category()
			{
				
				$id=$this->uri->segment('3');
				
$sql2="delete from category where id='$id'";
$query2= mysql_query($sql2) or die (mysql_error());

$redirect= base_url()."category";
					redirect($redirect);
			}

		
		
		
 	
		 public function add_sub_category()
  {
	  $this->load->view('admin/category/add_sub_category');
  }
	
	
	 public function upload_sub_category()
  {
	  
	  
	  
	  
				$category=  $this->input->post('category');
				$name= $this->input->post('name');
				$orders= $this->input->post('orders');
							
						
						
						
						$pic=$_FILES['logo']['name'];
						
					
						if (!empty($pic))
							{
								$config['upload_path'] = 'subcat_logo/';
								$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
								$config['max_size'] = '10000000';
								
								$this->upload->initialize($config);		
				
				
							if ($this->upload->do_upload('logo'))
								{
									$data = $this->upload->data();
								}
								else
								{
									echo $this->upload->display_errors();
								}
								
															
							}
							
			
						
						
							$data = array(
																	 
																	   'category_id' => $category,
																	   'name' => $name,
																	   'logo' => $pic,
																	   'orders' => $orders
																	   
																	);
																	
																	$result=$this->db->insert('sub_category', $data); 
																		
																		$redirect=base_url()."category/add_sub_category";
																			redirect($redirect);
								
			
	
  }
  
  
  
  
  
  
  public function delete_sub_category()
			{
				
				$id=$this->uri->segment('3');
				
				
$sql2="delete from sub_category where id='$id'";
$query2= mysql_query($sql2) or die (mysql_error());

$redirect= base_url()."category/add_sub_category";
					redirect($redirect);
			}






	 public function edit_sub_category()
			{
				
				$id=$this->uri->segment('3');
				
				$name= $this->input->post('name');
				$category=  $this->input->post('category');
				$orders=  $this->input->post('orders');
				 $pic=$_FILES['image']['name'];
				if (!empty($pic))
							{
								$config['upload_path'] = 'subcat_logo/';
								$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
								$config['max_size'] = '10000000';
								
								$this->upload->initialize($config);		
				
				
								if ($this->upload->do_upload('image'))
									{
										$data = array(
										'category_id' => $category,
										'logo' => $pic,
										'name' => $name,
										'orders' => $orders
									   
									);

								}
								else
								{
									echo $this->upload->display_errors();
								}
							}
				else{
								   $data = array(
								    'category_id' => $category,
									'name' => $name,
									'orders' => $orders
								   
								);
				}
							   
				$this->db->where('id' ,$id);
				 $result=$this->db->update('sub_category', $data);
				
				
				
					$redirect=base_url()."category/add_sub_category";
								redirect($redirect);
							
							   				
				
			}
		
 
 



  
	


    public function logout() {

        $this->session->sess_destroy();
        $redirectLog = base_url() . "_cpanel";
        redirect($redirectLog);
    }

    /** Clear the old cache (usage optional) * */
    protected function no_cache() {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

}