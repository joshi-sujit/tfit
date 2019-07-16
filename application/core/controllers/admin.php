<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	
	    public function __construct(){
		        parent::__construct();
					$this->load->library('session');
					$this->no_cache();
            		$loggedInUser=$this->session->userdata('username');
            		if($loggedInUser==""){
      		            $redirect=base_url()."_cpanel";
                		redirect($redirect);
            		}
		}
		
		
		
		
		
function fckeditorform(){
    
   $fckeditorConfig = array(
          'instanceName' => 'content',
          'BasePath' => base_url().'system/plugins/fckeditor/',
          'ToolbarSet' => 'Basic',
          'Width' => '100%',
          'Height' => '200',
          'Value' => ''
            );
   $this->load->library('fckeditor', $fckeditorConfig);
   $this->load->view('fcktest');
        
}
function fckeditorshowpost(){
    
     echo $this->input->post('content');
        
} 
		
		
		

		
		
		
		//file-upload--///
public function do_upload($path)
{
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']	= '10000000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error ="error";
			$error2="";
			return array($error,$error2);
		}
		else
		{
			
			$data = array('upload_data' => $this->upload->data());
			$msg= "success";
			return array($this->upload->data(), $msg);
		}
}//file-upload--///
			
		
		
		
		

	public function index()
	{
		$this->load->view('admin/index');
		
	}
	
	public function home()
	{
				$this->load->view('admin/home/index');
	}
	
	
	
	
	public function slider() {
        $data['query'] = $this->db->query("SELECT * FROM slider ORDER BY post_date DESC");
        $this->load->view('admin/slider/index', $data);
    }
	public function gallery_slider() {
        $data['query'] = $this->db->query("SELECT * FROM gallery_slider ORDER BY Id DESC");
        $this->load->view('admin/gallery_slider/index', $data);
    }
	
	public function booked()
	{
		$this->load->view('admin/home/book');
	}
	 public function news() {
        $data['query'] = $this->db->query("SELECT * FROM news ORDER BY post_date DESC");
        $this->load->view('admin/news/index', $data);
    }
	    public function about() {
        $data['query'] = $this->db->query("SELECT * FROM about WHERE cat='abt' ORDER BY post_date DESC");
        $this->load->view('admin/about/index', $data);
    }
	
	public function services()
    {
        $data['query'] = $this->db->query("SELECT * FROM services ORDER BY post_date DESC");
        $this->load->view('admin/services/index', $data);
    }
   public function acc()
    {
        $data['query'] = $this->db->query("SELECT * FROM about WHERE cat='acc' ORDER BY post_date DESC");
        $this->load->view('admin/acc/index', $data);
    }
	
	
	 public function meeting()
    {
        $data['query'] = $this->db->query("SELECT * FROM about WHERE cat='meet' ORDER BY post_date DESC");
        $this->load->view('admin/meet/index', $data);
    }
	 public function dining()
    {
        $data['query'] = $this->db->query("SELECT * FROM about WHERE cat='dining' ORDER BY post_date DESC");
        $this->load->view('admin/dining/index', $data);
    }
	 public function health()
    {
        $data['query'] = $this->db->query("SELECT * FROM about WHERE cat='health' ORDER BY post_date DESC");
        $this->load->view('admin/health/index', $data);
    }
	
	
	 public function offers()
    {
        $data['query'] = $this->db->query("SELECT * FROM about WHERE cat='offers' ORDER BY post_date DESC");
        $this->load->view('admin/offers/index', $data);
    }
	
	
	
	public function logout(){
			
            $this->session->sess_destroy();
            $redirectLog = base_url()."_cpanel";
			redirect($redirectLog);
           
        }
		

		
	

		/** Clear the old cache (usage optional) **/ 
protected function no_cache(){
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache'); 
}
	
}