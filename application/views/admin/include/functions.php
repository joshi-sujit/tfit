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

//file upload//

public function do_upload($path)
{
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']	= '10000000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';

		$this->load->library('upload', $config);

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
		public function change_strike()
		{ 
	   $game_id_mix=$this->uri->segment('3');
	   $game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
	
	      $query_inning=$this->db->query("SELECT *FROM temp_game WHERE Id='$game_id'");
         foreach($query_inning->result() as $chk)
         {
             $inning=$chk->inning_end;
         }
         if($inning=='enable')
         {
            $current_ing='2';
         }
         else
         {
         $current_ing='1';
         }
	    
		    $table='current_player';
			 $id = $this->uri->segment(5);
			$state= $this->uri->segment(6);
			
			
			if($state == '1'){
				$other_state='0';
			}
			else
			{
				$other_state='1';
			}
			
			
			$game_id_mix=$this->uri->segment('3');
		   $game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
$other_batsman=$this->db->query("SELECT batsman,Id,strike FROM current_player WHERE state !='out' and batsman !='' and game_id='$game_id' and inning='$current_ing' and  Id !='$id' ");
			foreach($other_batsman->result() as $row)
			{
		  $id_bats =$row->Id;
			
			
			
			$data = array(
               'strike' => $state
            );

			$this->db->where('Id', $id);
			$update_state = $this->db->update($table, $data); 
			
			if($update_state)
			{
				
				
										$data1 = array(
										 'strike' => $other_state
										);
							
										$this->db->where('Id', $id_bats);
										$update_state1 = $this->db->update($table, $data1); 
											if($update_state1)
											
										{
					$this->session->set_userdata('sucess','State changed !!!');
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
										}
										
										
										
			}
			
				
			}
			
			
			
	
			
			
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
			
			if(isset($row->flag))
			{
				$link = "file/photo/flag/".$row->flag;
				$flag=1;
			}
			
			
			if(isset($row->news_image))
			{
				$link = "file/photo/news/".$row->news_image;
				$flag=1;
			}
			if(isset($row->article_image))
			{
				$link = "file/photo/article/".$row->article_image;
				$flag=1;
			}
			
			if(isset($row->w_image))
			{
				$link = "file/photo/w_image/".$row->w_image;
				$flag=1;
			}
			if(isset($row->w_logo))
			{
				$link = "file/photo/w_image/".$row->w_logo;
				$flag=1;
			}
			
			
			
					}
		$query = $this->db->delete($table,array('Id'=>$id));
		if($query)
		{
			$sMsg = "Slider image deleted from database !!!";
			if($flag==1){
			@unlink(@$link);
			$this->session->set_userdata('sucess','Slider image deleted from database !!!');
			}
		}
		else{
			$data['msg'] = "Error in database !!!";
		}
		
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location'); 
		
	}
///delete writer row///

public function dlt_wri_row()
	{
		$table = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$flag=0;
			
		$this->db->where('Id',$id);
		$query_dlt = $this->db->get($table);
		foreach($query_dlt->result() as $row)
		{
		
						if(isset($row->w_image))
						{
							$link = "file/photo/w_image/".$row->w_image;
							@unlink(@$link);
							$flag=1;
						}
						if(isset($row->w_logo))
						{
							$link = "file/photo/w_image/".$row->w_logo;
							@unlink(@$link);
							$flag=1;
						}
						
					}
		$query = $this->db->delete($table,array('Id'=>$id));
		if($query)
		{
			$sMsg = "Slider image deleted from database !!!";
			if($flag==1){
			
			$this->session->set_userdata('sucess','Slider image deleted from database !!!');
			}
		}
		else{
			$data['msg'] = "Error in database !!!";
		}
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		     redirect($ref, 'location'); 
	}
///delete Writer row///



// delete player//
public function dlt_ply_row()
	{
		$table = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$flag=0;
			
		$this->db->where('Id',$id);
		$query_dlt = $this->db->get($table);
		foreach($query_dlt->result() as $row)
		{
		
						if(isset($row->p_right_image))
						{
							$link = "file/photo/p_image/".$row->p_right_image;
							@unlink(@$link);
							$flag=1;
						}
						if(isset($row->p_image))
						{
							$link = "file/photo/p_image/".$row->p_image;
							@unlink(@$link);
							$flag=1;
						}
						
					}
		$query = $this->db->delete($table,array('Id'=>$id));
		if($query)
		{
			$sMsg = "Slider image deleted from database !!!";
			if($flag==1){
			
			$this->session->set_userdata('sucess','Slider image deleted from database !!!');
			}
		}
		else{
			$data['msg'] = "Error in database !!!";
		}
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		     redirect($ref, 'location'); 
	}
	//delete player//
		//cric//
					
					
					public function select_game()
					{
						$this->load->view('admin/game/select_game');
					}
					
					public function game_select()
					{
			$game=$this->input->post('game');
			if($game=='0')
			{
	$this->session->set_userdata('error', 'Game cannot be empty,please select the  game ');
				$ref = $this->input->server('HTTP_REFERER', TRUE);
			redirect($ref, 'location');
			}
			
			else
			{
				
				$game_id=$this->db->query("SELECT Id FROM temp_game WHERE heading='$game'");	
				foreach($game_id->result() as $gameid)
				{
					 $id=$gameid->Id;}
					 
					 
		    $sql=mysql_query("SELECT *FROM total_score WHERE  game_id='$id'");
            $num= mysql_num_rows($sql);
		    if($num<1)
				{
			
				
				                                                    $data = array(
																	   'Id' => NULL,
																	   'game_id'  =>   $id
																	 );
																	
																	$result=$this->db->insert('total_score', $data); 
																		if($result)
																			{
																			$sql=mysql_query("SELECT *FROM current_over WHERE                                                                            game_id='$id'");
																		    $num= mysql_num_rows($sql);
																				if($num<1)
																					{
																						$data = array(
																	   'Id' => NULL,
																	   'game_id'  =>   $id
																	 );
																	
																	$result=$this->db->insert('current_over', $data);
																				 if($result)
																				 {
																		    $new_game=str_replace(' ', '_', $game );
																			$redirect=base_url()."admin/score/game$id/$new_game";
																			redirect($redirect); 
																				 }
																				 else
																				 {
																					 echo "database error  select again game";
																				 }
																				 
																					}
																					else
																					{
																			$new_game=str_replace(' ', '_', $game );
																			$redirect=base_url()."admin/score/game$id/$new_game";
																			redirect($redirect);
																					}
																			}

				}
				
				else
				{
													
																		    $new_game=str_replace(' ', '_', $game );
																			$redirect=base_url()."admin/score/game$id/$new_game";
																			redirect($redirect);
				}
				
				
			}
		
		
		}
					
					
					
					public function addteam()
					{
						$this->load->view('admin/team/addform');
					}
					public function insertteam()
					{
						$name= $this->input->post('team');
						$cat=  $this->input->post('cat');
						if (!empty($_FILES['userfile']['name']))
							{
								// Specify configuration for File 1
								$config['upload_path'] = 'file/photo/flag';
								$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
								$config['max_size'] = '10000000';
								//$config['max_width']  = '1024';
								//$config['max_height']  = '768';       
								// Initialize config for File 1
								$this->upload->initialize($config);
					 
								// Upload file 1
								if ($this->upload->do_upload('userfile'))
								{
									$data = $this->upload->data();
								}
								else
								{
									echo $this->upload->display_errors();
								}
					   			$image= $data['file_name'];
					 
							}
																	$data = array(
																	   'Id' => NULL,
																	   'team' => $name,
																	   'cat'  => $cat,
																	   'flag' => $image
																	);
																	
																	$result=$this->db->insert('team', $data); 
																		if($result)
																			{
																				
											$sql=$this->db->query("SELECT * FROM team ORDER BY Id DESC LIMIT 1");	
																 foreach($sql->result() as $row)
											   {
										
																			 $redirect=base_url()."functions/addplayer/$row->Id";
																			 redirect($redirect);
											   
																			}
											}
														
					}
					
					public  function addplayer()
					{
						$this->load->view('admin/team/player_add');
					}
					
					
					
					public  function insertplayer()
					{
						$cat=$this->uri->segment('3');
						
						$name= $this->input->post('name');
						$status= $this->input->post('status');
						$born= $this->input->post('born');
						$bat_style= $this->input->post('bat_style');
						$bow_style= $this->input->post('bow_style');
						$role= $this->input->post('role');
						$overview= $this->input->post('overview');
						$play_for= $this->input->post('play_for');
						$Careers= $this->input->post('careers');
						$achiev= $this->input->post('achiev');
						$get_con= $this->input->post('get_con');
						
						if (!empty($_FILES['userfile']['name']))
							{
								// Specify configuration for File 1
								$config['upload_path'] = 'file/photo/p_image';
								$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
								$config['max_size'] = '10000000';
								//$config['max_width']  = '1024';
								//$config['max_height']  = '768';       
								// Initialize config for File 1
								$this->upload->initialize($config);
					 
								// Upload file 1
								if ($this->upload->do_upload('userfile'))
								{
									$data = $this->upload->data();
								}
								else
								{
									echo $this->upload->display_errors();
								}
					   			$p_image= $data['file_name'];
					 
							}
							
							// Do we have a second file?
					if (!empty($_FILES['userfile1']['name']))
					{// Specify configuration for File 1
						$config['upload_path'] = 'file/photo/p_image';
					    $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
					    $config['max_size'] = '10000000';
						//$config['max_width']  = '1024';
						//$config['max_height']  = '768';       
			 
						// Initialize config for File 1
						$this->upload->initialize($config);
			 
						// Upload file 1
									if ($this->upload->do_upload('userfile1'))
									{
										$data = $this->upload->data();
									}
									else
									{
										echo $this->upload->display_errors();
									}
								
			             $logo= $data['file_name'];
					}
						
						
						
						
						
						
						
																	$data = array(
																	   'Id' => NULL,
																	   'name' => $name,
																	   'status' => $status,
																	   'born'  =>   $born,
																	   'bat_style'  => $bat_style,
																	   'bowl_style' => $bow_style,
																	   'role'       => $role,
																	   'overview'    =>   $overview,
																	   'play_for'   =>  $play_for,
																	   'careers'   =>  $Careers,
																	   'achiev'   => $achiev,
																	   'get_con'  => $get_con,
																	   'p_image' => $p_image,
																	   'p_right_image' => $logo,
																	   'team'  => $cat
																	);
																	
																	$result=$this->db->insert('player', $data); 
																		if($result)
																			{
																			 $redirect=base_url()."admin/player/$cat";
																			 redirect($redirect);
																				}
														
					}
					
					public function creategame()
					{
						$this->load->view('admin/game/creategame');
					}
					
					
					
					
					
					public function insertgame()
					{
						
						$team1=$this->input->post('team1');
						$team2=$this->input->post('team2');
						$umpire=$this->input->post('ump');
						$over=$this->input->post('over');
						$stadium=$this->input->post('std');
						$state=$this->input->post('state');
						
						$m_date=date('d F Y');
						
						
						$select_to=$this->input->post('Select_to');
						$toss=$this->input->post('toss_win');
						
						
						
						
						
						$tour = $this->input->post('Tournament');
						
						$match_date = $this->input->post('match_date');
						$arr_date=explode("-",$match_date);
						$monthNum = $arr_date[1];
						
						
						
						$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
						
						$full_date = $arr_date[2]." ".$monthName." ".$arr_date[0];
						
						$head="$team1 Vs $team2";
						$data = array(
																	   'Id' => NULL,
																	   'heading' => $head,
																	   'team1' => $team1,
																	   'team2'  => $team2,
																	   'over'  => $over,
																	   'stadium'  =>  $stadium,
																	   'umpire'  =>   $umpire,
																	   'toss_result' => $toss,
																	   'select'     =>  $select_to,
																	   'match_date'  => $full_date,
																	   'tournament'  => $tour,
																	   'state'  => $state
																	);
																	
																	$result=$this->db->insert('temp_game', $data); 
																		if($result)
																			{
																			
                            $game_det=$this->db->query("SELECT *FROM temp_game ORDER BY date DESC LIMIT 1");
                            foreach($game_det->result() as $game_info)
                            {
								$game_id = $game_info->Id;
                                $team1 = $game_info->team1;
                                $team2 = $game_info->team2;
                                $select = $game_info->select;
                                $toss_result = $game_info->toss_result;
								
								
								
                                
										if($team1 == $toss_result and $select == 'bat')
										{
											 $team_bat = $team1;
											 $team_field = $team2;
										 
										}
										elseif($team1 != $toss_result and $select == 'field')
										{
											 $team_bat = $team1;
											 $team_field = $team2;
											 
										}
										else
										{
											$team_bat = $team2;
											 $team_field = $team1;
										}
										
										
								                            $data_index = array(
																	   'Id' => NULL,
																	   'bating_team' => $team_bat,
																	   'bowling_team' =>  $team_field,
																	   'match_date'  => $full_date,
																	   'game_id'  => $game_id,
																	);
																$result_1=$this->db->insert('inning_index', $data_index);
																if($result_1)
																{
																	
																	
																	
																	$dataover= array(
																	   'Id' => NULL,
																	   'game_id'  => $game_id,
																	   'inning'  => '1'
																	);
																	$result_2=$this->db->insert('current_over',$dataover);
																	if($result_2)
																	{
																	
																	
																	$datascore = array(
																	   'Id' => NULL,
																	   'game_id'  => $game_id,
																	   'inning'  => '1'
																	);
																	$result_3=$this->db->insert('total_score',$datascore);
																	if($result_3)
																	{
																			 $redirect=base_url()."admin/game";
																			 redirect($redirect);
																	}
																	}
						        											
																 
							} 
							}
						}
					}




                   public function game_edit()
				   {
					   $id=$this->uri->segment('3');
					   $data['query']=$this->db->query("SELECT * FROM temp_game WHERE Id='$id'");
					   $this->load->view('admin/game/game_edit',$data);
				   }
				   public function updategame()
				   {
					    $game_uri=$this->uri->segment('3');
						$umpire=$this->input->post('ump');
						$over=$this->input->post('over');
						$stadium=$this->input->post('std');
						$state=$this->input->post('state');
						$select_to=$this->input->post('Select_to');
						$toss=$this->input->post('toss_win');
						$match_date = $this->input->post('match_date');
						$arr_date=explode("-",$match_date);
						$monthNum = $arr_date[1];
						$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
						$full_date = $arr_date[2]." ".$monthName." ".$arr_date[0];
						if($full_date == ' December ')
						{
							$full_date = date('d F Y');
						}
						
						$data = array(
																	  
																	   'over'  => $over,
																	   'stadium'  =>  $stadium,
																	   'umpire'  =>   $umpire,
																	   'toss_result' => $toss,
																	   'select'     =>  $select_to,
																	   'match_date'  => $full_date,
																	   'state'  => $state
																	);
																	
																	$this->db->where('Id',$game_uri);
																    $result=$this->db->update('temp_game', $data); 
																		if($result)
																			{
																				
					      $game_index=$this->db->query("SELECT *FROM inning_index WHERE game_id='$game_uri'");
                            foreach($game_index->result() as $game_index)
                            {															
								$index= $game_index->Id;												
																				
																				
							$game_det=$this->db->query("SELECT *FROM temp_game WHERE Id='$game_uri'");
                            foreach($game_det->result() as $game_info)
                            {
								$game_id = $game_info->Id;
                                $team1 = $game_info->team1;
                                $team2 = $game_info->team2;
                                $select = $game_info->select;
                                $toss_result = $game_info->toss_result;
								
								
								
                                
										if($team1 == $toss_result and $select == 'bat')
										{
											 $team_bat = $team1;
											 $team_field = $team2;
										 
										}
										elseif($team1 != $toss_result and $select == 'field')
										{
											 $team_bat = $team1;
											 $team_field = $team2;
											 
										}
										else
										{
											$team_bat = $team2;
											 $team_field = $team1;
										}
										
										
								                            $data_index = array(
																	   'bating_team' => $team_bat,
																	   'bowling_team' =>  $team_field,
																	   'match_date'  => $full_date
																	);
																$this->db->where('Id',$index);
																$result_1=$this->db->update('inning_index', $data_index);
																if($result_1)
																			{
													$redirect=base_url()."admin/game_det/$game_uri";
													redirect($redirect);		
																				
																			}
																												
																				
																				
							}
																				
					}
					}
				   }
				  
					public function insertbatsman()
					{
						$batsman1=$this->input->post('batsman1');
						$batsman2=$this->input->post('batsman');
						 $game_id_mix=$this->uri->segment('3');
						 $game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
						 $new_game=$this->uri->segment('4');
						 
						 
						 $game_id_mix=$this->uri->segment('3');
						 $game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
						  $query_inning=$this->db->query("SELECT *FROM temp_game WHERE Id='$game_id'");
						 foreach($query_inning->result() as $chk)
						 {
							 $inning=$chk->inning_end;
						 }
						 if($inning=='enable')
						 {
							$current_ing='2';
						 }
						 else
						 {
							$current_ing='1';
						 }
						 
		$query=$this->db->query("SELECT batsman,Id,strike FROM current_player WHERE state !='out' and batsman !='' and game_id='$game_id' and inning='$current_ing' ORDER BY Id DESC");
							
							 foreach($query->result() as $row)
						   {
							   
							   
							   if($row->strike==0)
							   
									{
										$strike='1';
									}
							  else
								  {
									  $strike='0';
									  
									  }
						   }
						
						   $query_inning=$this->db->query("SELECT *FROM temp_game WHERE Id='$game_id'");
						 foreach($query_inning->result() as $chk)
						 {
							 $inning=$chk->inning_end;
						 }
						 if($inning=='enable')
						 {
							$current_ing='2';
						 }
						 else
						 {
							$current_ing='1';
						 }
						 
						 
 
						
						if ($batsman1=='')
						{ 
						  
																	$data = array(
																	   'Id' => NULL,
																	   'batsman' => $batsman2,
																	   'strike' =>   $strike,
																	   'game_id' => $game_id,
																	   'inning'   => $current_ing
																	);
																	$result=$this->db->insert('current_player', $data); 
																		if($result)
																			{
																			
																$data1 = array(
																   'Id' => NULL,
																   'name' => $batsman2,
																   'game_id' => $game_id,
																   'inning'   => $current_ing
																   );
																   $result1=$this->db->insert('batsman_det', $data1);			
																	if($result1)
																		{	
																		$game_id_url =  $this->uri->segment('3');
						 												$new_game_url=$this->uri->segment('4');
						                                          $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
																		 redirect($redirect);
																		}
														}
						}
						else
						{
			
															  $data = array(
																	array(
																	   'Id' => NULL,
																	   'batsman' => $batsman1,
																	   'strike' =>   '1',
																	   'game_id' => $game_id,
																	   'inning'   => $current_ing
																		),
																	   array(
																	   'Id' => NULL,
																	   'batsman' => $batsman2,
																	   'strike' =>   '0',
																	   'game_id' => $game_id,
																	   'inning'   => $current_ing
																		)
																		);
								
					
															  $result=$this->db->insert_batch('current_player', $data); 
																		if($result)
																			{
																			
																 $data1 = array(
																   array(
																	   'Id' => NULL,
																	   'name' => $batsman1,
																	   'game_id' => $game_id,
																	   'inning'   => $current_ing
																		),
																	   array(
																	   'Id' => NULL,
																	   'name' => $batsman2,
																	   'game_id' => $game_id,
																	   'inning'   => $current_ing
																		)
																   );
																   $result1=$this->db->insert_batch('batsman_det', $data1);			
																	if($result1)
																		{		
							                                            $game_id_url =  $this->uri->segment('3');
						 												$new_game_url=$this->uri->segment('4');
						                                          $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
																		 redirect($redirect);;
																		}
														}
														}
						
					}
				public function insertbowler()
				{
					 $game_id_mix=$this->uri->segment('3');
				     $game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
					 $query_inning=$this->db->query("SELECT *FROM temp_game WHERE Id='$game_id'");
						 foreach($query_inning->result() as $chk)
						 {
							 $inning=$chk->inning_end;
						 }
						 if($inning=='enable')
						 {
							$current_ing='2';
						 }
						 else
						 {
							$current_ing='1';
						 }
						 
					$bowl=$this->input->post('bowler');
					
				$sql=mysql_query("SELECT *FROM current_player WHERE  bowler='$bowl' and game_id='$game_id' and inning='$current_ing'");
				 $num= mysql_num_rows($sql);
				  if($num<1)
				  {
					
					$data = array(
																   'Id' => NULL,
																   'bowler' => $bowl,
																	'game_id' => $game_id,
																	'inning'   => $current_ing
																   );
															$result=$this->db->insert('current_player', $data); 
															if($result)
																		{
																			
																$data1 = array(
																   'Id' => NULL,
																   'name' => $bowl,
																	'game_id' => $game_id,
																	'inning'   => $current_ing
																   );
																   $result1=$this->db->insert('bowlers_det', $data1);			
																	if($result1)
																		{		
														 $ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location'); 
																		}
														}
				  }
				  else
				  {
					  $sql=$this->db->query("SELECT *FROM current_player WHERE  bowler='$bowl'");
					  foreach($sql->result() as $row)
					  {
						 $id= $row->Id;
					  }
					  
					  		
																			
																$data1 = array(
																   'date' => NULL
																   );
																   $this->db->where('Id', $id);
															       $result1=$this->db->update('current_player', $data1);			
																	if($result1)
																		{		
													     $ref = $this->input->server('HTTP_REFERER', TRUE);
		                                                  redirect($ref, 'location'); 
																		}
														
					  
				  }
					
				
				}
				public function updateover()
				{
					 $game_id_mix=$this->uri->segment('3');
				     $game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
					
					$query_inning=$this->db->query("SELECT *FROM temp_game WHERE Id='$game_id'");
						 foreach($query_inning->result() as $chk)
						 {
							 $inning=$chk->inning_end;
						 }
						 if($inning=='enable')
						 {
							$current_ing='2';
						 }
						 else
						 {
							$current_ing='1';
						 }
					
					
					
					
					
					$game_id_mix=$this->uri->segment('3');
					$game_name_mix=$this->uri->segment('4');
                    $game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
					$ball=$this->uri->segment('5');
					
					
					if($ball=='endover')
					{
						$sql=$this->db->query("SELECT *FROM current_over WHERE  game_id='$game_id' ORDER BY date DESC LIMIT 1");
					 foreach($sql->result() as $row)
					  {
						 $id= $row->Id;
						  $curr_over=$row->over;
					  }
					  $update_over=$curr_over+1;
					  $data1 = array(
																   'over' => $update_over,
																   'ball' => 0
																   
																   );
																   $this->db->where('Id', $id);
															       $result1=$this->db->update('current_over', $data1);			
																	if($result1)
																		{
																			
	$query1=$this->db->query("SELECT *FROM batsman_det WHERE name IN (SELECT batsman FROM current_player WHERE state !='out' and batsman !='' and strike='1' and game_id='$game_id' and inning='$current_ing')"); 
 foreach($query1->result() as $row)
 {
	 $bat_id=$row->Id;
	 $bat_ball= $row->ball;
 } 
    $up_bat_ball=$bat_ball+1;
	$data1 = array(
																   'ball' => $up_bat_ball
																   );
																   $this->db->where('Id', $bat_id);
															       $result1=$this->db->update('batsman_det', $data1);
																   
							$query1=$this->db->query("SELECT bowler,Id FROM current_player WHERE bowler !='' and game_id='$game_id' and inning='$current_ing' ORDER BY date DESC LIMIT 1");
						   foreach($query1->result() as $row1)
						   {
							   
					$bowlername=$row1->bowler;
						  
				$query2=$this->db->query("SELECT *FROM bowlers_det WHERE name='$bowlername' and inning='$current_ing' ORDER BY date desc LIMIT 1");
					 foreach($query2->result() as $row2)
					 {
						 $bowl_id=$row2->Id;
						 $curr_over=$row2->over;
						 
					 }
					  }
					 $update_over=$curr_over+1;
					  $data1 = array(
																   'over' => $update_over,
																   'ball' => 0
																   
																   );
																   $this->db->where('Id', $bowl_id);
															       $result1=$this->db->update('bowlers_det', $data1);
																   
																   
																   if($result1)
																   
																   {
																	    $ref = $this->input->server('HTTP_REFERER', TRUE);
																	    redirect($ref, 'location'); 
																   }
					  
  
																		}
																		
																		
						
					}
					else
					{
					$sql=$this->db->query("SELECT *FROM current_over WHERE  game_id='$game_id' and inning='$current_ing' ORDER BY date DESC LIMIT 1");
					 foreach($sql->result() as $row)
					  {
						 $id= $row->Id;
						 $curr_ball=$row->ball;
					  }
					  $update_ball=$curr_ball+1;
					  $data1 = array(
																   'ball' => $update_ball
																   );
																   $this->db->where('Id', $id);
															       $result1=$this->db->update('current_over', $data1);			
																	if($result1)
																		{		
													    	$query1=$this->db->query("SELECT *FROM batsman_det WHERE name IN (SELECT batsman FROM current_player WHERE state !='out' and batsman !='' and strike='1' and game_id='$game_id' and inning='$current_ing')"); 
 foreach($query1->result() as $row)
 {
	 $bat_id=$row->Id;
	 $bat_ball= $row->ball;
 } 
    $up_bat_ball=$bat_ball+1;
	$data1 = array(
																   'ball' => $up_bat_ball
																   );
																   $this->db->where('Id', $bat_id);
															       $result1=$this->db->update('batsman_det', $data1);
																   
																   
																   
																   

   $query1=$this->db->query("SELECT bowler,Id FROM current_player WHERE bowler !='' and game_id='$game_id' and inning='$current_ing' ORDER BY date DESC LIMIT 1");
						   foreach($query1->result() as $row1)
						   {
							   
					$bowlername=$row1->bowler;
						  
				$query2=$this->db->query("SELECT *FROM bowlers_det WHERE name='$bowlername' and  game_id='$game_id' and inning='$current_ing'  ORDER BY date desc LIMIT 1");
					 foreach($query2->result() as $row2)
					 {
						 $bowl_id=$row2->Id;
						 $curr_ball=$row2->ball;
						 
					 }
					  }
					 $update_ball=$curr_ball+1;
					  $data1 = array(
																  
																   'ball' => $update_ball
																   
																   );
																   $this->db->where('Id', $bowl_id);
															       $result1=$this->db->update('bowlers_det', $data1);
																   
																   
																   
																   
																   if($result1)
																   
																   {
																	    $ref = $this->input->server('HTTP_REFERER', TRUE);
																	    redirect($ref, 'location'); 
																   }
																		}
					
					}
					
					
					
					
				}
				public function out()
				{
					$id=$this->uri->segment('5');
					$data = array(
																   'state' => 'out'
																   );
														    $this->db->where('Id', $id);
															$result=$this->db->update('current_player', $data); 
															if($result)
																		{
												$ref = $this->input->server('HTTP_REFERER', TRUE);
											    redirect($ref, 'location'); 
																		}
					
				}
				
				
public function runupdate(){
	$cat= $this->uri->segment('3');
	$id=$this->uri->segment('4');
	
		$this->load->view('admin/score/b_runupdate');
	
	
	
}




public function updateBrun()
{
	
	$game_id_mix=$this->uri->segment('3');
		$game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
			
	 $query_inning=$this->db->query("SELECT *FROM temp_game WHERE Id='$game_id'");
						 foreach($query_inning->result() as $chk)
						 {
							 $inning=$chk->inning_end;
						 }
						 if($inning=='enable')
						 {
							$current_ing='2';
						 }
						 else
						 {
							$current_ing='1';
						 }
	
	
	
	$cat= $this->uri->segment('5');
	$id=$this->uri->segment('6');
	$curr=$this->input->post('curr');
    $update=$this->input->post('update');
	$upres=$curr+$update;
	$data = array(
																   $cat => $upres
																   );
	$this->db->where('Id', $id);
	$result=$this->db->update('bowlers_det', $data); 
	if($result)
	{
				   /*if($cat=='over')
				   {
							$query=$this->db->query("SELECT over,Id FROM current_over");
							foreach($query->result() as $row)
							{
								$over=$row->over;
								$over_id=$row->Id;
							}
								$update_over=$over+$update;   
								   
								   
								$data1 = array(
								$cat => $update_over
								 );
							 $this->db->where('Id',$over_id);
							 $result1=$this->db->update('current_over', $data1); 
							 if($result1)
							 {
								  $game_id_url =  $this->uri->segment('3');
							  $new_game_url=$this->uri->segment('4');
							  $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
							  redirect($redirect);
							 }
				   }*/
	   if($cat=='median')
	   {
		   $data = array(
		  $cat => $upres
        );
		$this->db->where('Id', $id);
		$result=$this->db->update('bowlers_det', $data); 
		if($result)
		{
		  $game_id_url =  $this->uri->segment('3');
		  $new_game_url=$this->uri->segment('4');
		  $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
		  redirect($redirect);
	   }
	   }
	   
	   elseif($cat=='wicket')
	   {
		          $data = array(
		  $cat => $upres
        );
		$this->db->where('Id', $id);
		$result=$this->db->update('bowlers_det', $data); 
		if($result)
		{
		  $game_id_url =  $this->uri->segment('3');
		  $new_game_url=$this->uri->segment('4');
		  $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
		  redirect($redirect);
	   }
	   
	   }
	   elseif($cat=='er')
	   {
		  $data4 = array(
		     $cat => $update
																   );
			$this->db->where('Id', $id);
			$result4=$this->db->update('bowlers_det', $data4); 
			
				 if($result4)
				 {
					 $game_id_url =  $this->uri->segment('3');
				  $new_game_url=$this->uri->segment('4');
                  $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
				  redirect($redirect);
				 }
	   }
	   
	   
	   else
	   {
		   
		   
		   
		   
		  	    $query1=$this->db->query("SELECT *FROM total_score WHERE inning='$current_ing' ORDER BY Id desc LIMIT 1");
				foreach($query1->result() as $row3)
				{
					$score=$row3->$cat;
					$score_id=$row3->Id;
				}
					$update_score=$score+$update;   
					   
					   
					$data3 = array(
					$cat => $update_score
					 );
				 $this->db->where('Id',$score_id);
				 $result3=$this->db->update('total_score', $data3); 
				 if($result3)
				 {
					  $game_id_url =  $this->uri->segment('3');
				  $new_game_url=$this->uri->segment('4');
                  $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
				  redirect($redirect);
				 }
	   }
	   
	   
	   
	   
	   
	}
	
}
public function Extraupdate()
{
	$this->load->view('admin/score/Extraupdate');
}
public function updateErun()
{
	
	
	
	$game_id_mix=$this->uri->segment('3');
 $game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);

	
	
	
	 $query_inning=$this->db->query("SELECT *FROM temp_game WHERE Id='$game_id'");
						 foreach($query_inning->result() as $chk)
						 {
							 $inning=$chk->inning_end;
						 }
						 if($inning=='enable')
						 {
							$current_ing='2';
						 }
						 else
						 {
							$current_ing='1';
						 }
	$cat= $this->uri->segment('5');
	$id=$this->uri->segment('6');
	$value=$this->input->post('Erun');
	if($cat=='lb')
	   {
				$query=$this->db->query("SELECT lb,Id FROM total_score WHERE Id='$id'");
				foreach($query->result() as $row)
				{
					$lb=$row->lb;
					$lb_id=$row->Id;
				}
					$update_lb=$lb+$value;   
					   
					   
					$data1 = array(
					$cat => $update_lb
					 );
				 $this->db->where('Id',$lb_id);
				 $result1=$this->db->update('total_score', $data1); 
				 if($result1)
				 {
				  $game_id_url =  $this->uri->segment('3');
				  $new_game_url=$this->uri->segment('4');
                  $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
				  redirect($redirect);
				 }
	   }
	   elseif($cat=='b')
	   {
		   $query=$this->db->query("SELECT b,Id FROM total_score WHERE Id='$id'");
				foreach($query->result() as $row)
				{
					$lb=$row->b;
					$lb_id=$row->Id;
				}
					$update_lb=$lb+$value;   
					   
					   
					$data1 = array(
					$cat => $update_lb
					 );
				 $this->db->where('Id',$lb_id);
				 $result1=$this->db->update('total_score', $data1); 
				 if($result1)
				 {
				  $game_id_url =  $this->uri->segment('3');
				  $new_game_url=$this->uri->segment('4');
                  $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
				  redirect($redirect);
				 }
	   }
	   else
	   {
		  $game_id_url =  $this->uri->segment('3');
				  $new_game_url=$this->uri->segment('4');
                  $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
				  redirect($redirect);
	   }
	
}

public function b_runupdate()
{
	$this->load->view('admin/score/batsman_runupdate');
}
public function updatebatsmanrun()
		{
			$game_id_mix=$this->uri->segment('3');
		     $game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
			
			 $query_inning=$this->db->query("SELECT *FROM temp_game WHERE Id='$game_id'");
						 
						 
						 foreach($query_inning->result() as $chk)
						 {
							 $inning=$chk->inning_end;
						 }
						 if($inning=='enable')
						 {
							 $current_ing='2';
						 }
						 else
						 {
							 $current_ing='1';
						 }
			
	 	$game_id= $this->uri->segment('3');
	 	$game_name=$this->uri->segment('4');
	    $cat=     $this->uri->segment('5');
	    $id=      $this->uri->segment('6');
	 	$update=$this->input->post('update');
	 	$cur=$this->input->post('curr');
		
		
		if($cat=='run')
		{
			     
				    $update_run=$cur+$update;
					 $data1 = array(
					 'run' => $update_run
					 );
				    $this->db->where('Id',$id);
				    $result1=$this->db->update('batsman_det', $data1);
					if($result1)
					{
						
						
						
				$game_id_mix=$this->uri->segment('3');
		$game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
			
			 $query_inning=$this->db->query("SELECT *FROM temp_game WHERE Id='$game_id'");
						 foreach($query_inning->result() as $chk)
						 {
							 $inning=$chk->inning_end;
						 }
						 if($inning=='enable')
						 {
							$current_ing='2';
						 }
						 else
						 {
						$current_ing='1';
						 }		
						
						
						
			$query_bowl=$this->db->query("SELECT bowler,Id FROM current_player WHERE bowler !='' and game_id='$game_id' and inning='$current_ing' ORDER BY date DESC LIMIT 1");
						   foreach($query_bowl->result() as $row_bowl)
						   {
							   
				 	 $bowlername = $row_bowl->bowler;
                    
                   
				$query2=$this->db->query("SELECT *FROM bowlers_det WHERE name='$bowlername' and game_id='$game_id' and inning='$current_ing' ORDER BY date desc LIMIT 1");
					 foreach($query2->result() as $row2)
					 {
						 $bowl_id=$row2->Id;
						 $curr_run=$row2->run;
						 
					 
					 $update_b_run=$curr_run+$update;
					  $data1 = array(
																  
																   'run' => $update_b_run
																   
																   );
																   $this->db->where('Id', $bowl_id);
															       $result1=$this->db->update('bowlers_det', $data1);
																   if($result1)
																   
																   {
																	  $game_id_url =  $this->uri->segment('3');
						 										     $new_game_url=$this->uri->segment('4');
						                                         $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
																redirect($redirect);
																   }
						
					
					}
					}
				}
					
					
					
		}
		if($cat=='four')
		{
			
$query1=$this->db->query("SELECT *FROM batsman_det WHERE Id='$id'"); 
 foreach($query1->result() as $row)
 {
	  $cur_four=$row->four;
 }
  $update_four=$cur_four+1;
					 $data1 = array(
					 'four' => $update_four
					 );
				    $this->db->where('Id',$id);
				    $result1=$this->db->update('batsman_det', $data1);
					if($result1)
					{
$game_id_mix=$this->uri->segment('3');
		$game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
			
			 $query_inning=$this->db->query("SELECT *FROM temp_game WHERE Id='$game_id'");
						 foreach($query_inning->result() as $chk)
						 {
							 $inning=$chk->inning_end;
						 }
						 if($inning=='enable')
						 {
							$current_ing='2';
						 }
						 else
						 {
						$current_ing='1';
						 }		
						
						
						
			$query_bowl=$this->db->query("SELECT bowler,Id FROM current_player WHERE bowler !='' and game_id='$game_id' and inning='$current_ing' ORDER BY date DESC LIMIT 1");
						   foreach($query_bowl->result() as $row_bowl)
						   {
							   
				 	 $bowlername = $row_bowl->bowler;
                    
                   
				$query2=$this->db->query("SELECT *FROM bowlers_det WHERE name='$bowlername' and game_id='$game_id' and inning='$current_ing' ORDER BY date desc LIMIT 1");
					 foreach($query2->result() as $row2)
					 {
						 $bowl_id=$row2->Id;
						 $curr_run=$row2->run;
						 
					 }
					  }
					 $update_b_run=$curr_run+4;
					  $data1 = array(
																  
																   'run' => $update_b_run
																   
																   );
																   $this->db->where('Id', $bowl_id);
															       $result1=$this->db->update('bowlers_det', $data1);
																   if($result1)
																   
																   {
																	  $game_id_url =  $this->uri->segment('3');
						 										     $new_game_url=$this->uri->segment('4');
						                                         $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
																redirect($redirect);
																   }
						
					}
			
			
			        
					
		}
		if($cat=='six')
		{
			
$query1=$this->db->query("SELECT *FROM batsman_det WHERE Id='$id'"); 
 foreach($query1->result() as $row)
 {
	  $cur_six=$row->six;
 }
  $update_six=$cur_six+1;
					 $data1 = array(
					 'six' => $update_six
					 );
				    $this->db->where('Id',$id);
				    $result1=$this->db->update('batsman_det', $data1);
					if($result1)
					{
						$game_id_mix=$this->uri->segment('3');
		$game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
			
			 $query_inning=$this->db->query("SELECT *FROM temp_game WHERE Id='$game_id'");
						 foreach($query_inning->result() as $chk)
						 {
							 $inning=$chk->inning_end;
						 }
						 if($inning=='enable')
						 {
							$current_ing='2';
						 }
						 else
						 {
						$current_ing='1';
						 }		
						
						
						
			$query_bowl=$this->db->query("SELECT bowler,Id FROM current_player WHERE bowler !='' and game_id='$game_id' and inning='$current_ing' ORDER BY date DESC LIMIT 1");
						   foreach($query_bowl->result() as $row_bowl)
						   {
							   
				 	 $bowlername = $row_bowl->bowler;
                    
                   
				$query2=$this->db->query("SELECT *FROM bowlers_det WHERE name='$bowlername' and game_id='$game_id' and inning='$current_ing' ORDER BY date desc LIMIT 1");
					 foreach($query2->result() as $row2)
					 {
						 $bowl_id=$row2->Id;
						 $curr_run=$row2->run;
						 
					 }
					  }
					 $update_b_run=$curr_run+6;
					  $data1 = array(
																  
																   'run' => $update_b_run
																   
																   );
																   $this->db->where('Id', $bowl_id);
															       $result1=$this->db->update('bowlers_det', $data1);
																   if($result1)
																   
																   {
																	  $game_id_url =  $this->uri->segment('3');
						 										     $new_game_url=$this->uri->segment('4');
						                                         $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
																redirect($redirect);
																   }
						
					}
			
			
			        
					
		}
		if($cat=='sr')
		{
			         $data1 = array(
					 'sr' => $update
					 );
				    $this->db->where('Id',$id);
				    $result1=$this->db->update('batsman_det', $data1);
					if($result1)
					{
						$game_id_url =  $this->uri->segment('3');
						 										     $new_game_url=$this->uri->segment('4');
						                                         $redirect=base_url()."admin/score/$game_id_url/$new_game_url";
																redirect($redirect);
																   }
		}
		
		
		

		}
//cric//


		public function insertcomment()
		{
		 $overend=$this->uri->segment('5');
		$game_id_mix=$this->uri->segment('3');
		$game_name_mix=$this->uri->segment('4');
		$game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
		$new_game=str_replace('_', ' ', $this->uri->segment('4'));
	    $curr_ing=$this->input->post('ing_chk');
		$array=array('<p>','</p>');
        $cont=str_replace( $array, '', $this->input->post('cont'));
		if($overend=='overend')
		{
			 $data1 = array(
																   'Id' => NULL,
																   'comment' => $cont,
																   'overend' => 'overend',
																   'inning' => $curr_ing,
																   'game_id' => $game_id
																   );
																   $result1=$this->db->insert('comment', $data1);
																   if($result1)
																    {
															$this->session->set_userdata('sucess','comment updated !!!');																	   $ref = $this->input->server('HTTP_REFERER', TRUE);
																	   redirect($ref, 'location'); 
																	   
																   }
		}
		
		else
		{
			$ball=$this->input->post('ball');
			
			$data1 = array(
																   'Id' => NULL,
																   'over' => $ball,
																   'comment' => $cont,
																   'inning' => $curr_ing,
																   'game_id' => $game_id
																   );
																   $result1=$this->db->insert('comment', $data1);
																   if($result1)
																   {
																	   $this->session->set_userdata('sucess','comment updated !!!');																	   $ref = $this->input->server('HTTP_REFERER', TRUE);
																	   redirect($ref, 'location'); 
																	   
																   }
			
			
			
			
			
		}
		
		
		
		}
		

//comment
//end of enning//
public function end_of_enning()
{
	$target=$this->input->post('target');
	$game_id_mix=$this->uri->segment('3');
$game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
	$data1 = array(
															'inning_end' => 'enable',
															'target'  => $target
																   );
																   $this->db->where('Id', $game_id);
																   $result1=$this->db->update('temp_game', $data1);
																   if($result1)
																   {
																	
																	
																	
																	$dataover= array(
																	   'Id' => NULL,
																	   'game_id'  => $game_id,
																	   'inning'  => '2'
																	);
																	
																	
																	
																	
																	
																	$result=$this->db->insert('current_over',$dataover);
																	
																	$datascore = array(
																	   'Id' => NULL,
																	   'game_id'  => $game_id,
																	   'inning'  => '2'
																	);
																$result=$this->db->insert('total_score',$datascore);   
																	  if($result)
																   {
																	   
																	   
															 $this->session->set_userdata('sucess','comment updated !!!');																	                                                             $ref = $this->input->server('HTTP_REFERER', TRUE);
																	   redirect($ref, 'location'); 
																	   
																   }
										}
}

//end of enning//

//end of game//
public function end_of_game()
{
	$sum=$this->input->post('sum');
	$game_id_mix=$this->uri->segment('3');
   $game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
	$data1 = array(
															'state' => 'finished',
															'summary'  => $sum
																   );
																   $this->db->where('Id', $game_id);
																   $result1=$this->db->update('temp_game', $data1);
																   if($result1)
																   {
															$this->session->set_userdata('sucess','comment updated !!!');																	                                                             $ref = $this->input->server('HTTP_REFERER', TRUE);
																	   redirect($ref, 'location'); 
																	   
																   }
}
	//end of game//




//full score board//
public function addscoreboard()
	{
		$this->load->view('admin/scoreboard/addform');
	}
	public function insertscoreboard()
	{
$game_id_mix=$this->uri->segment('3');
$cat=$this->uri->segment('5');
$game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
		 $cont=$this->input->post('cont');
		$data = array(
												   'Id' => NULL,
												   'scoreboard'  => $cont,
												   'game_id'    =>  $game_id,
												   'cat'       => $cat
												);
												
												$result=$this->db->insert('scoreboard', $data); 
													if($result){
														$game_id_url =  $this->uri->segment('3');
						 										     $new_game_url=$this->uri->segment('4');
																	 $cat=$this->uri->segment('5');
						                              $redirect=base_url()."admin/scoreboard/$game_id_url/$new_game_url/$cat";
																redirect($redirect);
															}
							
	}
	public function Editscoreboard()
	{
		$game_id_mix=$this->uri->segment('3');
						 $game_id = filter_var($game_id_mix, FILTER_SANITIZE_NUMBER_INT);
						 $id=$this->uri->segment('6');
			$data['query']=$this->db->query("SELECT * FROM scoreboard WHERE game_id='$game_id' and Id='$id'");
							$this->load->view('admin/scoreboard/Editform',$data);
	}
	public function updatescoreboard()
	{
		$id=$this->uri->segment('6');
		$cat=$this->uri->segment('5');
		$cont=$this->input->post('cont');
		if(strlen($cont)<22)
		{
			$this->Editscoreboard();
		}
		else{
		$data = array(
												   'scoreboard'  => $cont
												);
												$this->db->where('Id',$id);
												$result=$this->db->update('scoreboard', $data); 
													if($result){
														$game_id_url =  $this->uri->segment('3');
						 										     $new_game_url=$this->uri->segment('4');
																	 $cat=$this->uri->segment('5');
						                                     //$redirect=base_url()."admin/scoreboard/$game_id_url/$new_game_url/$cat";
																//redirect($redirect);
																$this->Editscoreboard();
															}
															
		}
	}
	
	
	
	
				//region//
				public function new_reg()
				{
					$this->load->view('admin/region/addform');
				}
				
				public function insert_reg()
				
				{
				$reg=	$this->input->post('reg');
				$cont=	$this->input->post('cont');
				$cat=	$this->input->post('cat');
				$data = array(
												   'Id' => NULL,
												   'region'  => $reg,
												   'country'    =>  $cont,
												   'cat'       => $cat
												);
												
												$result=$this->db->insert('region', $data); 
													if($result){
														
						                              $redirect=base_url()."admin/region";
													  redirect($redirect);
															}
					
					
				}
				
				
				public function new_cont()
				{
					$this->load->view('admin/region/cont_addform');
				}
				public function insert_cont()
				
				{
			
				$cont=	$this->input->post('cont');
				$cat=	$this->input->post('cat');
				$data = array(
												   'Id' => NULL,
												   'country'    =>  $cont,
												   'cat'       => $cat
												);
												
												$result=$this->db->insert('country', $data); 
													if($result){
														
						                              $redirect=base_url()."admin/country";
													  redirect($redirect);
															}
					
					
				}
				
				
				
				//region//
				
				//writer//
				public function new_writer()
				{
					$this->load->view('admin/region/writer_addform');
				}
				
				public function insert_writer()
				{
			    $cat= $this->input->post('cat');
				$abt= $this->input->post('abt');
				$cont =	$this->input->post('cont');
				$reg=	$this->input->post('reg');
				$name= $this->input->post('name');
				
				
						  if (!empty($_FILES['userfile']['name']))
							{
								// Specify configuration for File 1
								$config['upload_path'] = 'file/photo/w_image';
								$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
								$config['max_size'] = '10000000';
								//$config['max_width']  = '1024';
								//$config['max_height']  = '768';       
								// Initialize config for File 1
								$this->upload->initialize($config);
					 
								// Upload file 1
								if ($this->upload->do_upload('userfile'))
								{
									$data = $this->upload->data();
								}
								else
								{
									echo $this->upload->display_errors();
								}
					   			$image= $data['file_name'];
					 
							}
							else
							{
								$image= "";
							}
							// Do we have a second file?
					if (!empty($_FILES['userfile1']['name']))
					{// Specify configuration for File 1
						$config['upload_path'] = 'file/photo/w_image';
					    $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
					    $config['max_size'] = '10000000';
						//$config['max_width']  = '1024';
						//$config['max_height']  = '768';       
			 
						// Initialize config for File 1
						$this->upload->initialize($config);
			 
						// Upload file 1
									if ($this->upload->do_upload('userfile1'))
									{
										$data = $this->upload->data();
									}
									else
									{
										echo $this->upload->display_errors();
									}
								
			             $logo= $data['file_name'];
					}
					else
					{
						$logo= "";
					}
				
				
				
				
				
				
				
				
				
				$data = array(
												   'Id' => NULL,
												   'name' => $name,
												   'about' => $abt,
												   'cat'       => $cat,
												   'country'    =>  $cont,
												   'region'       =>  $reg,
												   'w_image'     => $image,
												   'w_logo'    => $logo
												);
												
												$result=$this->db->insert('writer', $data); 
													if($result){
														
						                              $redirect=base_url()."admin/writer";
													  redirect($redirect);
															}
				}
				//writer//
	
	
	//tournament//
	public function addtour()
	{
		$this->load->view('admin/tour/add');
	}
	public function inserttour()
	{
		$name=$this->input->post('name');
		$type=$this->input->post('type');
		$cont=$this->input->post('cont');
		$s_date=$this->input->post('s_date');
		$e_date=$this->input->post('e_date');
		$place=$this->input->post('place');
		
		$arr_s_date=explode("-",$s_date);
		$monthNum_s = $arr_s_date[1];
		$monthName_s = date("F", mktime(0, 0, 0, $monthNum_s, 10));
		$full_date_s = $arr_s_date[2]." ".$monthName_s." ".$arr_s_date[0];
		
		
		
		$arr_e_date=explode("-",$e_date);
		$monthNum_e = $arr_e_date[1];
		$monthName_e = date("F", mktime(0, 0, 0, $monthNum_e, 10));
		$full_date_e = $arr_e_date[2]." ".$monthName_e." ".$arr_e_date[0];
		
		
		
		
		
		
		
		
		$data = array(
												   'Id' => NULL,
												   'name' => $name,
												   'type'       => $type,
												   'content'    =>  $cont,
												   'start_date'       =>  $full_date_s,
												   'end_date'     => $full_date_e,
												   'place'    => $place
												);
												
												$result=$this->db->insert('tournament', $data); 
													if($result){
														
						                              $redirect=base_url()."admin/tour";
													  redirect($redirect);
															}
		
		
	}
	public function addtour_team()
	{
		$this->load->view('admin/tour/addtour_team');
	}
	
	public function inserttour_team()
	{
	$tour= $this->uri->segment('3');
	$team= $this->input->post('team');
	$data = array(
												   'Id' => NULL,
												   'team' => $team,
												   'for_key'       => $tour
												);
												
												$result=$this->db->insert('tour_team', $data); 
													if($result){
														
						                              $redirect=base_url()."admin/tour_team/$tour";
													  redirect($redirect);
															}
	
	
	
	
	}
	
	public function addtour_news()
	{
		$this->load->view('admin/tour/addtour_news');
	}
	public function inserttour_news()
	{
	$tour= $this->uri->segment('3');	
   $cont= $this->input->post('cont');
	$data = array(
												   'Id' => NULL,
												   'content' => $cont,
												   'for_key'       => $tour
												);
												
												$result=$this->db->insert('tour_news', $data); 
													if($result){
														
						                              $redirect=base_url()."admin/tour_content/$tour";
													  redirect($redirect);
															}
	
	
	
		
	}
	public function addtour_player()
	{
		$this->load->view('admin/tour/addtour_player');
	}
	
	public function inserttour_player()
	{
		$tour=$this->uri->segment('3');
	    $team=$this->uri->segment('4');
		$player=$this->input->post('player');
		$data = array(
												   'Id' => NULL,
												   'player' => $player,
												   'team'       => $team,
												   'tour'   => $tour
												);
												
												  $result=$this->db->insert('tour_player', $data); 
													if($result){
														
						                              $redirect=base_url()."admin/tour_player/$tour/$team";
													  redirect($redirect);
															}
	
		
	}
	
	
	//tournament//
	
	


	
		/** Clear the old cache (usage optional) **/ 
protected function no_cache(){
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache'); 
}
	
}