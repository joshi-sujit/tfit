<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class _cpanel extends CI_Controller{
	
	public function index()
	{
		$this->load->view('login_frm');
	}
	
}