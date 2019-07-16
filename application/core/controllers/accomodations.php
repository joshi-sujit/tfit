<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accomodations extends CI_Controller{
	public function index()
	{
	$this->load->view('accomodations');
	}
	public function others()
	{
		$this->load->view('accomodations');
		
	}
	
}