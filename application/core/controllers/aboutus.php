<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class aboutus extends CI_Controller{
	public function index()
	{
	$this->load->view('aboutus');
	}
	public function others()
	{
		$this->load->view('aboutus');
	}
	
}