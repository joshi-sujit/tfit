<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->no_cache();
		$this->load->library('email');
		$this->load->library('cart');
		$this->load->library('session');
		$loggedInStatus=$this->session->userdata('logged_in_status');
		$expiry_notification = $this->session->userdata('expire');
		if(!$loggedInStatus){
			$redirect=base_url()."home";
			redirect($redirect);
		}elseif($expiry_notification == 2){
			$redirect=base_url()."home/online/expired";
			redirect($redirect);;
		}
		
	}

	public function workout(){
		$this->load->view('client/profile_workout');
	}

	public function carbChart(){
		$this->load->view('client/profile_carb');
	}

	public function groceryList(){
		$this->load->view('client/profile_grocery');
	}

	public function stretching(){
		$this->load->view('client/profile_stretching');
	}

	public function nutrition(){
		$this->load->view('client/profile_nutrition');
	}

	public function getNutrition(){
		$data['value'] = $this->uri->segment(3);
		$data['type'] = "nutrition";
		$this->load->view('client/posts',$data);
	}

	public function fitness(){
		$this->load->view('client/profile_fitness');
	}

	public function getFitness(){
		$data['value'] = $this->uri->segment(3);
		$data['type'] = "fitness";
		$this->load->view('client/posts',$data);
	}

	public function getMealPlan(){
		$data['gender'] = $this->session->userdata('gender');
		$this->load->view('client/profile_mealplan',$data);
	}

	public function abripper(){
		$this->load->view('client/profile_abripper');
	}

	public function getSupplement(){
		$data['gender'] = $this->session->userdata('gender');
		$this->load->view('client/profile_supplement',$data);
	}

	public function getWorkout(){
		$value = $this->uri->segment(3);
		$data['gender'] = $this->session->userdata('gender');
		if($value == 1){
			$this->load->view('client/profile_month_1',$data);
		}elseif($value == 2){
			$this->load->view('client/profile_month_2',$data);
		}elseif ($value == 3) {
			$this->load->view('client/profile_month_3',$data);
		}else{
			$this->load->view('client/404');
		}
	}

	public function getWorkoutInstruction(){
		$this->load->view('client/profile_workout_instructions');
	}

	public function getDailyRoutine(){
		$month = $this->input->post('month');
		$data['day'] = $this->input->post('day');
		$data['gender'] = $this->session->userdata('gender');
		if($month == "month-1"){
			$this->load->view('client/month_1',$data);
		}elseif($month == "month-2"){
			$this->load->view('client/month_2',$data);
		}elseif ($month == "month-3") {
			$this->load->view('client/month_3',$data);
		}
	}


	/** Clear the old cache (usage optional) **/ 
	protected function no_cache(){
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0',false);
	header('Pragma: no-cache'); 
	}

}