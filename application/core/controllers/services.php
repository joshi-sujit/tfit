<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller{
	public function index()
	{
	$this->load->view('services');
	}
	public function others()
	{
		$this->load->view('services');
	}
	
}