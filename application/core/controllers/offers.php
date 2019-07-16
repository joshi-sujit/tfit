<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offers extends CI_Controller{
	public function index()
	{
	$this->load->view('offers');
	}
	public function others()
	{
		$this->load->view('offers');
	}
	
}