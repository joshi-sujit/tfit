<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dining extends CI_Controller{
	public function index()
	{
	$this->load->view('dining');
	}
	public function others()
	{
		$this->load->view('dining');
	}
}