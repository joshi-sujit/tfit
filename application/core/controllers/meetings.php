<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meetings extends CI_Controller{
	public function index()
	{
	$this->load->view('meetings');
	}
	public function others()
	{
		$this->load->view('meetings');
	}
	
}