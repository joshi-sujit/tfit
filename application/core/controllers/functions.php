<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Functions extends CI_Controller {
	
	    public function __construct(){
		        parent::__construct();
					$this->load->library('session');
					$this->no_cache();
            		$loggedInUser=$this->session->userdata('username');
            		if($loggedInUser==""){
      		            $redirect=base_url()."_cpanel";
                		redirect($redirect);
            		}
		}
	
	
		//file-upload--///
public function do_upload($path)
{
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']	= '10000000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';

		$this->upload->initialize($config);		

		if ( ! $this->upload->do_upload())
		{
			$error ="error";
			$error2="";
			return array($error,$error2);
		}
		else
		{
			
			$data = array('upload_data' => $this->upload->data());
			$msg= "success";
			return array($this->upload->data(), $msg);
		}
}//file-upload--///
			
///change_state///
		public function change_state()
		{
			$table = $this->uri->segment(3);
			$id = $this->uri->segment(4);
			$state= $this->uri->segment(5);
			$data = array(
               'state' => $state
            );

			$this->db->where('id', $id);
			$update_state = $this->db->update($table, $data); 
			if($update_state)
			{
				$data['msg'] = "State changed !!!";	
			}
			else{
				$data['msg'] = "Database error !!!";	
			}
		$this->session->set_userdata('sucess','State changed !!!');
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location'); 
			
		}
///chage_state///

///delete row///
public function dlt_row()
	{
		$table = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$flag=0;
			
		$this->db->where('Id',$id);
		$query_dlt = $this->db->get($table);
		foreach($query_dlt->result() as $row)
		{
			
			if(isset($row->di_image))
			{
				$link = "file/di_image/".$row->di_image;
				$flag=1;
			}
		    if(isset($row->ser_image))
			{
				$link = "file/ser_image/".$row->ser_image;
				$flag=1;
			}
			if(isset($row->title_image))
			{
				$link = "file/title/".$row->title_image;
				$flag=1;
			}
           if(isset($row->slider_image))
			{
				$link = "file/slider/".$row->slider_image;
				$flag=1;
			}
			
					}
		$query = $this->db->delete($table,array('Id'=>$id));
		if($query)
		{
			$sMsg = "Slider image deleted from database !!!";
			if($flag==1){
			unlink(@$link);
			$this->session->set_userdata('sucess','Slider image deleted from database !!!');
			}
		}
		else{
			$data['msg'] = "Error in database !!!";
		}
		
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location'); 
		
	}
		///delete_row///
	
	
	
	public function add_image()
	{
		$this->load->view('admin/home/add_image');
	}
	public function insertimage()
	{
		$cat=$this->uri->segment('3');
		$path='file/di_image/';
											$data['upload']=$this->do_upload($path);
											$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
												$image=$data['upload'][0]['file_name'];
												 $data = array(
												                       'Id' => NULL,
																	   'di_image' => $image,
																	   'cat' => $cat,
																	   'state'  => '1'
																	);
																	$result=$this->db->insert('home', $data); 
																		if($result)
																			{
																	$redirect=base_url()."admin/$cat";
																    redirect($redirect);
																				}
											}
	}
	public function edit_image()
	{
		$id=$this->uri->segment('3');
		$data['query']=$this->db->query("SELECT * FROM home WHERE Id='$id'");
		$this->load->view('admin/home/edit_image',$data);
	}
	public function updateimage()
	{
	
		$id=$this->uri->segment('3');
		$cat=$this->uri->segment('4');
		$name=$_FILES["userfile"]["name"];
				if($name == NULL)
				{
				$redirect=base_url()."admin/$cat";
				redirect($redirect);
				}
				else
				{
					
					                $flag=0;
									$table="home";
									$this->db->where('Id',$id);
									$query_dlt = $this->db->get($table);
									foreach($query_dlt->result() as $row)
									{
										if(isset($row->di_image ))
										{
										$link = "file/di_image/".$row->di_image;
										$flag=1;
										}
									
									}
										if($flag==1)
										{
										unlink(@$link);
									   $path='file/di_image/';
									$data['upload']=$this->do_upload($path);
											$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
												$image=$data['upload'][0]['file_name'];
												 $data = array(
												              'di_image' => $image
															);
																	$this->db->where('Id', $id);
																	$result=$this->db->update('home', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/$cat";
																			 redirect($redirect);
																        }
											}
									
										
										}
									}
					
		
		
	
	}
	
	
	public function add_content()
	{
		$this->load->view('admin/home/add_content');
	}
	
	public function insertcontent()
	{
		$cont= $this->input->post('cont');
		$cat=$this->uri->segment('3');
		$data = array(                                        'Id'     => NULL,
												              'content' => $cont,
															  'cat'    => $cat
															);
																	$result=$this->db->insert('content', $data); 
																     if($result)
																			{
																			 $redirect=base_url()."admin/$cat";
																			 redirect($redirect);
																        }
	}
	
	
	
	
	
	public function edit_content()
	{
		$id=$this->uri->segment('3');
		$data['query']=$this->db->query("SELECT * FROM content WHERE Id='$id'");
		$this->load->view('admin/home/edit_content',$data);
		
	}
	public function updatecontent()
	{
		$id=$this->uri->segment('3');
		$cat=$this->uri->segment('4');
		 $cont= $this->input->post('cont');
		 $data = array(
												              'content' => $cont
															);
																	$this->db->where('Id', $id);
																	$result=$this->db->update('content', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/$cat";
																			 redirect($redirect);
																        }
		
	}
	
	
	
	
	
	//news//
	public function addnews()
	{
		$this->load->view('admin/news/addform');
	}
	public function insertnews()
	{
	$head=$this->input->post('head');
	$pre_news=$this->input->post('pre_news');
	$news=$this->input->post('news');
	$date=$this->input->post('date');
	$post_by =$this->input->post('post_by');
	
		
	$data = array(
																	   'Id' => NULL,
																	   'heading' => $head,
																	   'news_pre' => $pre_news,
																	   'content'  =>   $news,
																	   'date'  => $date,
																	   'post_by' => $post_by
																	);
																	
																	$result=$this->db->insert('news', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/news";
																			 redirect($redirect);
																				}
	
	}
	
	
	public function newsEdit()
	{
		$id= $this->uri->segment('3');
		$data['query']=$this->db->query("SELECT * FROM news WHERE Id='$id'");
		$this->load->view('admin/news/Editform',$data);
	}
	
	public function updatenews()
	{
	$id=$this->uri->segment('3');
	$head=$this->input->post('head');
	$pre_news=$this->input->post('pre_news');
	$news=$this->input->post('news');
	$date=$this->input->post('date');
	$post_by =$this->input->post('post_by');
	
	$data = array(
																	   'heading' => $head,
																	   'news_pre' => $pre_news,
																	   'content'  =>   $news,
																	   'date'  => $date,
																	   'post_by' => $post_by
																	);
																	$this->db->where('Id', $id);
																	$result=$this->db->update('news', $data); 
																		if($result)
																			{
																	 $redirect=base_url()."admin/news";
																	 redirect($redirect);
																				}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//news//
	
	
	
	
	
	
	
	
	//about//
	public function add_about()
	{
		$this->load->view('admin/about/add_about_band');
	}
	public function insert_about()
	{
		$head= $this->input->post('head');
		$cont= $this->input->post('cont');
		$path='file/title/';
				$data['upload']=$this->do_upload($path);
				$data['msg']=$data['upload'][1];
				if($data['upload'])
						{
				$image=$data['upload'][0]['file_name'];
		        $data = array(
	            'Id' => NULL,
				'heading'=> $head,
				'content' => $cont,
			    'title_image' => $image,
				'cat'     =>  'abt'
				);
			  $result=$this->db->insert('about', $data); 
			  if($result)
			{
	        $redirect=base_url()."admin/about";
		   redirect($redirect);
																				}
	}
	}
	public function edit_about()
	{
		$id=$this->uri->segment('3');
		$data['query']=$this->db->query("SELECT * FROM about WHERE Id='$id'");
		$this->load->view('admin/about/edit_about_band',$data);
	}
	
	public function update_about()
	{
		
		$id=$this->uri->segment('3');
		$head= $this->input->post('head');
		$cont= $this->input->post('abt_band');
		
		
		
			
		
		$name=$_FILES["userfile"]["name"];
				if($name == NULL)
				{
		
		
		$data = array(                                              'heading' => $head,
																	   'content' => $cont
																	);
																	$this->db->where('Id', $id);
																	$result=$this->db->update('about', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/about";
																			 redirect($redirect);
																				}
	}
	
	
	
	        else
				{
					
					                $flag=0;
									$table="about";
									$this->db->where('Id',$id);
									$query_dlt = $this->db->get($table);
									foreach($query_dlt->result() as $row)
									{
										if(isset($row->title_image ))
										{
										$link = "file/title/".$row->title_image;
										$flag=1;
										}
									
									}
										if($flag==1)
										{
										@unlink(@$link);
									   $path='file/title/';
									$data['upload']=$this->do_upload($path);
											$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
												$image=$data['upload'][0]['file_name'];
												$data = array(
												'heading' => $head,
									            'content' => $cont,
										        'title_image' => $image
																	);
																	$this->db->where('Id', $id);
																	$result=$this->db->update('about', $data);  
																		if($result)
																			{
																			 $redirect=base_url()."admin/about";
																			 redirect($redirect);
																        }
											}
									
										
										}
									}
		
	}
	
	//about//
	
	
	
	
	
	//services//
	
	
	
	
	
	
	public function add_ser()
	{
		$this->load->view('admin/services/add_ser');
	}
	public function insert_ser()
	{
		$name= $this->input->post('name');
		$desc= $this->input->post('abt_mem');
		$state= $this->input->post('state');
		$path='file/service/';
	    $data['upload']=$this->do_upload($path);
	    $data['msg']=$data['upload'][1];
	    if($data['upload'])
			{
	    $image=$data['upload'][0]['file_name'];
												 $data = array(
												                       'Id' => NULL,
																	   'service' => $name,
																	   'content' => $desc,
																	   'ser_image' => $image,
																	   'state'   => $state
																	);
										$result=$this->db->insert('services', $data); 
										if($result)
																			{
										 $redirect=base_url()."admin/services";
												 redirect($redirect);
																        }
											}
	}
	public function edit_ser()
	{
		$id=$this->uri->segment('3');
		$data['query']=$this->db->query("SELECT * FROM services WHERE Id='$id'");
		$this->load->view('admin/services/edit_ser',$data);
	}
	public function update_ser()
	{
		$id=$this->uri->segment('3');
		$mem_name= $this->input->post('name');
		$desc= $this->input->post('abt_mem');
		$state= $this->input->post('state');
		
		
		$name=$_FILES["userfile"]["name"];
				if($name == NULL)
				{
				
							  $data = array(
																	   'service' => $mem_name,
																	   'content' => $desc,
																	   'state'   => $state
																	);
																	$this->db->where('Id', $id);
																	$result=$this->db->update('services', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/services";
																			 redirect($redirect);
																        }
                                          
				
					
				}
				else
				{
					
					                $flag=0;
									$table="services";
									$this->db->where('Id',$id);
									$query_dlt = $this->db->get($table);
									foreach($query_dlt->result() as $row)
									{
										if(isset($row->ser_image ))
										{
										$link = "file/service/".$row->ser_image;
										$flag=1;
										}
									
									}
										if($flag==1)
										{
										@unlink(@$link);
									   $path='file/service/';
									$data['upload']=$this->do_upload($path);
											$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
												$image=$data['upload'][0]['file_name'];
												 $data = array(
																	   'service' => $mem_name,
																	   'content' => $desc,
																	   'ser_image' => $image,
																	   'state'   => $state
																	);
																	$this->db->where('Id', $id);
																	$result=$this->db->update('services', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/services";
																			 redirect($redirect);
																        }
											}
									
										
										}
									}
					
		
		
	}
	
	//services//
	
	
	
	
	
	
	
	//accomodation//
	
	
	public function add_acc()
	{
		$this->load->view('admin/acc/add_acc');
	}
	public function insert_acc()
	{
		$head= $this->input->post('head');
		$cont= $this->input->post('acc');
		$path='file/title/';
											$data['upload']=$this->do_upload($path);
											$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
												$image=$data['upload'][0]['file_name'];

		$data = array(
												         'Id' => NULL,
														 'heading'=> $head,
														 'content' => $cont,
														'title_image' => $image,
																	   'cat' => 'acc',
																	);
																	$result=$this->db->insert('about', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/acc";
																			 redirect($redirect);
																				}
											}
	}
	public function edit_acc()
	{
		$id=$this->uri->segment('3');
		$data['query']=$this->db->query("SELECT * FROM about WHERE Id='$id'");
		$this->load->view('admin/acc/edit_acc',$data);
	}
	
	public function update_acc()
	{
		
		$id=$this->uri->segment('3');
		$head= $this->input->post('head');
		$cont= $this->input->post('acc');
		
		
		
		$name=$_FILES["userfile"]["name"];
				if($name == NULL)
				{
		
		
		$data = array(
		                                                   'heading' => $head,
																	   'content' => $cont
																	);
																	$this->db->where('Id', $id);
																	$result=$this->db->update('about', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/acc";
																			 redirect($redirect);
																				}
	}
	
	
	
	        else
				{
					
					                $flag=0;
									$table="about";
									$this->db->where('Id',$id);
									$query_dlt = $this->db->get($table);
									foreach($query_dlt->result() as $row)
									{
										if(isset($row->title_image ))
										{
										$link = "file/title/".$row->title_image;
										$flag=1;
										}
									
									}
										if($flag==1)
										{
										@unlink(@$link);
									   $path='file/title/';
									$data['upload']=$this->do_upload($path);
											$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
												$image=$data['upload'][0]['file_name'];
												$data = array(
												'heading' => $head,
												'content' => $cont,
											    'title_image' => $image
																	);
																	$this->db->where('Id', $id);
																	$result=$this->db->update('about', $data);  
																		if($result)
																			{
																			 $redirect=base_url()."admin/acc";
																			 redirect($redirect);
																        }
											}
									
										
										}
									}
	}
	
	
	
	
	
	//accomodation//
	
	//slider//
	
	public function addslider()
	{
		$this->load->view('admin/slider/addform');
	}
	public function insertslider()
	{
      $path='file/slider/';
	  $data['upload']=$this->do_upload($path);
	  $data['msg']=$data['upload'][1];
	  $title=$this->input->post('title');
	  if($data['upload'])
			{
	 $image=$data['upload'][0]['file_name'];
	 $data = array(
	 'Id' => NULL,
	 'slider_image' => $image,
	 'title' =>$title,
	 'state' => '1'
	);
	$result=$this->db->insert('slider', $data); 
			if($result)
	{
	$redirect=base_url()."admin/slider";
   redirect($redirect);
																				}
											}
	}
	//slider//
	
	//gallery-slider//
	
	public function addgalleryslider()
	{
		$this->load->view('admin/gallery_slider/addform');
	}
	public function insert_galleryslider()
	{
      $path='file/gallery_slider/';
	  $data['upload']=$this->do_upload($path);
	  $data['msg']=$data['upload'][1];
	  $title=$this->input->post('title');
	  if($data['upload'])
			{
	 $image=$data['upload'][0]['file_name'];
	 $data = array(
	 'Id' => NULL,
	 'image' => $image,
	 'title' => $title,
	 'state' => '1'
	);
	$result=$this->db->insert('gallery_slider', $data); 
			if($result)
	{
	$redirect=base_url()."admin/gallery_slider";
   redirect($redirect);
																				}
											}
	}
	//gallery-slider//
	
	
	//meeting//
		
	public function add_meet()
	{
		$this->load->view('admin/meet/add_meet');
	}
	public function insert_meet()
	{
		$head= $this->input->post('head');
		$cont= $this->input->post('cont');
		$path='file/title/';
											$data['upload']=$this->do_upload($path);
											$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
												$image=$data['upload'][0]['file_name'];

		$data = array(
												                       'Id' => NULL,
																	   'heading'=> $head,
																	   'content' => $cont,
																	   'title_image' => $image,
																	   'cat' => 'meet',
																	);
																	$result=$this->db->insert('about', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/meeting";
																			 redirect($redirect);
																				}
											}
	}
	public function edit_meet()
	{
		$id=$this->uri->segment('3');
		$data['query']=$this->db->query("SELECT * FROM about WHERE Id='$id'");
		$this->load->view('admin/meet/edit_meet',$data);
	}
	
	public function update_meet()
	{
		
		$id=$this->uri->segment('3');
		$cont= $this->input->post('cont');
		$head= $this->input->post('head');
		
		
		
		$name=$_FILES["userfile"]["name"];
				if($name == NULL)
				{
		
		
		$data = array(
		            'heading' => $head,
					'content' => $cont
					);
					$this->db->where('Id', $id);
				$result=$this->db->update('about', $data); 
				if($result)
					{
				$redirect=base_url()."admin/meeting";
			   redirect($redirect);
			}
	}
	
	
	
	        else
				{
					
					                $flag=0;
									$table="about";
									$this->db->where('Id',$id);
									$query_dlt = $this->db->get($table);
									foreach($query_dlt->result() as $row)
									{
										if(isset($row->title_image ))
										{
										$link = "file/title/".$row->title_image;
										$flag=1;
										}
									
									}
										if($flag==1)
										{
										@unlink(@$link);
									   $path='file/title/';
									$data['upload']=$this->do_upload($path);
									 		$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
												$image=$data['upload'][0]['file_name'];
												$data = array(
												                 'heading'=> $head,
																 'content' => $cont,
																 'title_image' => $image
																	);
																	$this->db->where('Id', $id);
																	$result=$this->db->update('about', $data);  
																		if($result)
																			{
																			 $redirect=base_url()."admin/meeting";
																			 redirect($redirect);
																        }
											}
									
										
										}
									}
	}
	
	
	
	
	//end meeting//
	//dining//
	
	public function add_dining()
	{
		$this->load->view('admin/dining/add_dining');
	}
	public function insert_dining()
	{
		$head= $this->input->post('head');
		$cont= $this->input->post('cont');
		$path='file/title/';
											$data['upload']=$this->do_upload($path);
											$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
								$image=$data['upload'][0]['file_name'];

		$data = array(
												                       'Id' => NULL,
																	   'heading'=> $head,
																	   'content' => $cont,
																	'title_image' => $image,
																	   'cat' => 'dining',
																	);
																	$result=$this->db->insert('about', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/dining";
																			 redirect($redirect);
																				}
											}
	}
	public function edit_dining()
	{
		$id=$this->uri->segment('3');
		$data['query']=$this->db->query("SELECT * FROM about WHERE Id='$id'");
		$this->load->view('admin/dining/edit_dining',$data);
	}
	
	public function update_dining()
	{
		
		$id=$this->uri->segment('3');
		$cont= $this->input->post('cont');
		$head= $this->input->post('head');
		
		
		
		$name=$_FILES["userfile"]["name"];
				if($name == NULL)
				{
		
		
		$data = array(
		            'heading' => $head,
					'content' => $cont
					);
					$this->db->where('Id', $id);
				$result=$this->db->update('about', $data); 
				if($result)
					{
				$redirect=base_url()."admin/dining";
			   redirect($redirect);
			}
	}
	
	
	
	        else
				{
					
					                $flag=0;
									$table="about";
									$this->db->where('Id',$id);
									$query_dlt = $this->db->get($table);
									foreach($query_dlt->result() as $row)
									{
										if(isset($row->title_image ))
										{
										$link = "file/title/".$row->title_image;
										$flag=1;
										}
									
									}
										if($flag==1)
										{
										@unlink(@$link);
									   $path='file/title/';
									$data['upload']=$this->do_upload($path);
									 		$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
												$image=$data['upload'][0]['file_name'];
												$data = array(
												                 'heading'=> $head,
																 'content' => $cont,
																 'title_image' => $image
																	);
												$this->db->where('Id', $id);
												$result=$this->db->update('about', $data);  
																		if($result)
																			{
										$redirect=base_url()."admin/dining";
										redirect($redirect);
																        }
											}
									
										
										}
									}
	}
	
	
	//dining//
	
	
	//health//
	
	
	public function add_health()
	{
		$this->load->view('admin/health/add_health');
	}
	public function insert_health()
	{
		$head= $this->input->post('head');
		$cont= $this->input->post('cont');
		$path='file/title/';
											$data['upload']=$this->do_upload($path);
											$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
								$image=$data['upload'][0]['file_name'];

		$data = array(
												                       'Id' => NULL,
																	   'heading'=> $head,
																	   'content' => $cont,
																	'title_image' => $image,
																	   'cat' => 'health',
																	);
																	$result=$this->db->insert('about', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/health";
																			 redirect($redirect);
																				}
											}
	}
	public function edit_health()
	{
		$id=$this->uri->segment('3');
		$data['query']=$this->db->query("SELECT * FROM about WHERE Id='$id'");
		$this->load->view('admin/health/edit_health',$data);
	}
	
	public function update_health()
	{
		
		$id=$this->uri->segment('3');
		$cont= $this->input->post('cont');
		$head= $this->input->post('head');
		
		
		
		$name=$_FILES["userfile"]["name"];
				if($name == NULL)
				{
		
		
		$data = array(
		            'heading' => $head,
					'content' => $cont
					);
					$this->db->where('Id', $id);
				$result=$this->db->update('about', $data); 
				if($result)
					{
				$redirect=base_url()."admin/health";
			   redirect($redirect);
			}
	}
	
	
	
	        else
				{
					
					                $flag=0;
									$table="about";
									$this->db->where('Id',$id);
									$query_dlt = $this->db->get($table);
									foreach($query_dlt->result() as $row)
									{
										if(isset($row->title_image ))
										{
										$link = "file/title/".$row->title_image;
										$flag=1;
										}
									
									}
										if($flag==1)
										{
										@unlink(@$link);
									   $path='file/title/';
									$data['upload']=$this->do_upload($path);
									 		$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
												$image=$data['upload'][0]['file_name'];
												$data = array(
												                 'heading'=> $head,
																 'content' => $cont,
																 'title_image' => $image
																	);
												$this->db->where('Id', $id);
												$result=$this->db->update('about', $data);  
																		if($result)
																			{
										$redirect=base_url()."admin/health";
										redirect($redirect);
																        }
											}
									
										
										}
									}
	}
	
	
	
	
	
	
	//end health//
	
	
	//offers//
		
	
	public function add_offers()
	{
		$this->load->view('admin/offers/add_offers');
	}
	public function insert_offers()
	{
		$head= $this->input->post('head');
		$cont= $this->input->post('cont');
		$path='file/title/';
											$data['upload']=$this->do_upload($path);
											$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
								$image=$data['upload'][0]['file_name'];

		$data = array(
												                       'Id' => NULL,
																	   'heading'=> $head,
																	   'content' => $cont,
																	'title_image' => $image,
																	   'cat' => 'offers',
																	);
																	$result=$this->db->insert('about', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/offers";
																			 redirect($redirect);
																				}
											}
	}
	public function edit_offers()
	{
		$id=$this->uri->segment('3');
		$data['query']=$this->db->query("SELECT * FROM about WHERE Id='$id'");
		$this->load->view('admin/offers/edit_offers',$data);
	}
	
	public function update_offers()
	{
		
		$id=$this->uri->segment('3');
		$cont= $this->input->post('cont');
		$head= $this->input->post('head');
		
		
		
		$name=$_FILES["userfile"]["name"];
				if($name == NULL)
				{
		
		
		$data = array(
		            'heading' => $head,
					'content' => $cont
					);
					$this->db->where('Id', $id);
				$result=$this->db->update('about', $data); 
				if($result)
					{
				$redirect=base_url()."admin/offers";
			   redirect($redirect);
			}
	}
	
	
	
	        else
				{
					
					                $flag=0;
									$table="about";
									$this->db->where('Id',$id);
									$query_dlt = $this->db->get($table);
									foreach($query_dlt->result() as $row)
									{
										if(isset($row->title_image ))
										{
										$link = "file/title/".$row->title_image;
										$flag=1;
										}
									
									}
										if($flag==1)
										{
										@unlink(@$link);
									   $path='file/title/';
									$data['upload']=$this->do_upload($path);
									 		$data['msg']=$data['upload'][1];
											if($data['upload'])
											{
												$image=$data['upload'][0]['file_name'];
												$data = array(
												                 'heading'=> $head,
																 'content' => $cont,
																 'title_image' => $image
																	);
												$this->db->where('Id', $id);
												$result=$this->db->update('about', $data);  
																		if($result)
																			{
										$redirect=base_url()."admin/offers";
										redirect($redirect);
																        }
											}
									
										
										}
									}
	}
	
	
	//offers
	
	
	
	
	
	
	
			/** Clear the old cache (usage optional) **/ 
protected function no_cache(){
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache'); 
}

}
		?>