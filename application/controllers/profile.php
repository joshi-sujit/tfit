<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('email');
		$this->load->library('cart');
		$this->load->library('session');
	}
	
	public function register(){
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$meal_plan = $this->input->post('meal');
 		$query = $this->db->get_where('tbl_user',array('username' => $username));
		$number = $query->num_rows();
		if($number > 0){
			$data['flag'] = 2;
		}
		else{
			$random_no = rand(3333,99999999999999);
			$link = base_url()."profile/validate/".$random_no;
			$this->load->model('Idgenerator');
			/*Generating Unique Id for tbl_services*/
			$id = $this->Idgenerator->genId('tbl_user','user_id');
			$data = array(
						'user_id' => $id,
						'username' => $username,
						'email' => $email,
						'meal_plan' => $meal_plan,
						'random_no' => $random_no,
						'status' => '0'
					);

			$this->email->from('its.suzit@gmail.com');
			$this->email->to($email);

			$subject = "Account Details for ". $username. " at TFIT360";
			$this->email->subject($subject);
			
			$message = $username.
				"Thank you for signing up at TFIT360. 
				You may now log in by clicking this link or copying and pasting it to your browser:"
				.$link.
				
				"This link can only be used once to log in and will lead you to a page where you can set your password. 
				After setting your password, you will be able to log in at http://www.tfit360.com/user in the future using:".

				"username:" . $username.

				"password: Your password".

				"-- TFIT360 team";

			$this->email->message($message);

			$this->email->send();

			$this->db->insert('tbl_user',$data);
			$data['flag'] = 1;

		}
		$data['link'] = $link;
		$this->load->view('client/login',$data);
	}

	public function validate(){

		$key = $this->uri->segment(3);
		$query = $this->db->get_where('tbl_user',array('random_no' => $key));
		$count = $query->num_rows();
		if($count > 0){
			$record = $query->row();
			$user_id = $record->user_id;
			$status = $record->status;
			if($status == 1){
				$data['flag'] = "usedlink";
				$flag = 1;
			}
			else{
				$data['status'] = 1;
				$this->db->where('user_id', $user_id);
				$this->db->update('tbl_user', $data); 
				$flag = 2;
			}			
			if($flag == 1){
				$this->load->view('client/login',$data);
			}elseif($flag == 2){
				$user = $record->username;
				$redirect=base_url()."profile/loadProfile/"."success/".base64_encode($user_id);
				redirect($redirect);
			}
		}
		else{
			$this->load->view('client/login');
		}
	}

	public function loadProfile(){
		$this->load->view('client/profile');
	}

	public function firstUpdate(){
		$user_id = base64_decode($this->input->post('user_id'));
		$password = $this->input->post('password');
		$gender = $this->input->post('gender');
		$timezone = $this->input->post('timezone');

		$salt = "saf21122@admbvn74";
		$pwd = md5($password.$salt);

		$data = array(
					'password' => $pwd,
					'gender' => $gender,
					'time_zone' => $timezone
				);

		if($this->db->where('user_id',$user_id)->update('tbl_user',$data)){
			$sessiondata = array(
                   'user_id'  => $user_id,
                   'gender'     => $gender,
                   'logged_in_status' => TRUE,
                   'expire' => '2'
               );
			$this->session->set_userdata($sessiondata);
			$this->load->view('client/profile_workout');
			redirect($redirect);
		}else{
			echo "error";
		}
	}

	public function updateProfile(){
		$user_id = base64_decode($this->input->post('user_id'));
		$password = $this->input->post('password');
		$gender = $this->input->post('gender');
		$timezone = $this->input->post('timezone');

		$salt = "saf21122@admbvn74";
		$pwd = md5($password.$salt);

		$data = array(
					'password' => $pwd,
					'gender' => $gender,
					'time_zone' => $timezone
				);

		if($this->db->where('user_id',$user_id)->update('tbl_user',$data)){
			$redirect=base_url()."profile/loadProfile/"."editsuccess/".base64_encode($user_id);
			redirect($redirect);
		}else{
			echo "error";
		}
	}

	public function online(){
		$content = $this->db->get_where('tbl_content',array('content_id' => 'con_1'));
		$data['content_result'] = $content->result();

		$pricing_plan = $this->db->get('tbl_pricing_plan');
		$data['plan_result'] = $pricing_plan->result();

		$this->load->view('client/online',$data);
	}

	public function login(){
		$username =	mysql_real_escape_string($this->input->post('username'));
		$password = mysql_real_escape_string($this->input->post('password'));

		$salt = "saf21122@admbvn74";
		$pwd = md5($password.$salt);

		$condition = array('username' => $username, 'password' => $pwd);
		$this->db->where($condition); 

		$query = $this->db->get('tbl_user');
		if($query->num_rows() > 0){
			$result = $query->row();
			$gender = $result->gender;
			$user_id = $result->user_id;

			$sessiondata = array(
						'user_id'  => $user_id,
						'gender'     => $gender,
						'logged_in_status' => TRUE
						);
			$this->session->set_userdata($sessiondata);

			//CHECKING SUBSCRIPTIONS
			$subscription_query = $this->db->query("SELECT DATE_FORMAT(expiration_date,'%Y-%m-%d') AS 'expire' FROM tbl_bill_subscription WHERE user_id = '$user_id' ORDER BY expiration_date DESC LIMIT 1");
			if($subscription_query->num_rows() > 0){
				$subscription_result = $subscription_query->row();
				$expire_date = $subscription_result->expire;
				$today = date('Y-m-d');
				
				if(strtotime($expire_date) > strtotime($today)){
					$expire = 1;
					$sessiondata = array('expire' => $expire);
					$this->session->set_userdata($sessiondata);
					$this->load->view('client/profile_workout');
				}else{
					$expire = 2;
					$sessiondata = array('expire' => $expire);
					$this->session->set_userdata($sessiondata);
					$data['notification'] = "expired";
					$content = $this->db->get_where('tbl_content',array('content_id' => 'con_1'));
					$data['content_result'] = $content->result();

					$pricing_plan = $this->db->get('tbl_pricing_plan');
					$data['plan_result'] = $pricing_plan->result();
					$this->load->view('client/online',$data);
				}
			}else{
				$expire = 2;
				$sessiondata = array('expire' => $expire);
				$this->session->set_userdata($sessiondata);
				$data['notification'] = "new";
				$content = $this->db->get_where('tbl_content',array('content_id' => 'con_1'));
				$data['content_result'] = $content->result();

				$pricing_plan = $this->db->get('tbl_pricing_plan');
				$data['plan_result'] = $pricing_plan->result();
				$this->load->view('client/online',$data);
			}
		}else{
			$data['error'] = 1;
			$this->load->view('client/login',$data);
		}
	}

	public function newPassword(){
		$email = $this->input->post('email');

		$query = $this->db->get_where('tbl_user',array('email' => $email));
		if($query->num_rows() > 0){
			$result = $query->row();
			$user_id = $result->user_id;

			$newpassword = random_string('alnum', 5);

			$setpwd = $newpassword;
			$salt = "saf21122@admbvn74";
			$pwd = md5($newpassword.$salt);

			$data = array('password' => $pwd);
			if($this->db->where('user_id',$user_id)->update('tbl_user',$data)){
				
				$this->email->from('tomas@tfit360.com');
				$this->email->to($email);

				$this->email->subject('Tfit - Password Recovery Information ');
				$message = "PASSWORD RECOVERY	
				Your new password is".$newpassword.
				"Thank You,
				Please login with new credentials and change password upon login";
				$this->email->message($message);

				$this->email->send();
				$data['msg'] = 1;
				$data['pwd'] = $setpwd;

				$data['new'] = $pwd;
				$this->load->view('client/login',$data);
			}
		}
		else{
			$data['msg'] = 2;
			$this->load->view('client/login',$data);
		}
	}

}
