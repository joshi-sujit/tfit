<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->library('session');
	}
	
	public function index(){
		$intro_query = $this->db->get_where('tbl_content',array('content_id' => 'con_2'));
		$data['intro_result'] = $intro_query->result();	
		

		$slider_query = $this->db->get_where('tbl_slider',array('status' => '1'));
		$data['slider'] = $slider_query->result();

		$testimonial_query = $this->db->get('tbl_testimonial');
		$data['testimonial'] = $testimonial_query->result();

		$transformation_query = $this->db->get('tbl_transformation');
		$data['transformation'] = $transformation_query->result();

		$program_query = $this->db->get('tbl_program');
		$data['program'] = $program_query->result();

		$this->load->view('client/index', $data);
	}
	
	public function store(){
		$product_query = $this->db->get('tbl_product');
		$data['product_result'] = $product_query->result();
		$this->load->view('client/store',$data);
	}

	public function online(){
		$content = $this->db->get_where('tbl_content',array('content_id' => 'con_1'));
		$data['content_result'] = $content->result();

		$pricing_plan = $this->db->get('tbl_pricing_plan');
		$data['plan_result'] = $pricing_plan->result();

		$this->load->view('client/online',$data);
	}

	public function login(){
		$this->load->view('client/login');
	}
	public function bio(){
		$query = $this->db->get_where('tbl_team',array('team_id' => 'tea_1'));
		$data['bio_result'] = $query->result();
		$this->load->view('client/bio',$data);
	}
	
	public function getprogram(){
		$id = $this->input->post('arg');
		$query = $this->db->get_where('tbl_program',array('program_id' => $id));
		$data['result'] = $query->result();
		$this->load->view('client/ajax',$data);
	}
	
	public function program(){
		$query = $this->db->get_where('tbl_bootcamp_content',array('content_id' => 'con_1'));
		$query_2 = $this->db->get_where('tbl_bootcamp_content',array('content_id' => 'con_2'));
		$data['what_bootcamp'] = $query->result();
		$data['why_bootcamp'] = $query->result();
		$this->load->view('client/program',$data);
	}
	
	public function schedule(){
		$this->load->view('client/schedule');
	}
	
	public function team(){
		$query = $this->db->get('tbl_team');
		$data['count'] = $query->num_rows();
		$data['team_result'] = $query->result();
		$this->load->view('client/team',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
		$redirect = base_url().'home';
		redirect($redirect);
	}

	public function broken(){
		$this->load->view('client/404');
	}
}
