<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Gallery_model');
    }
	public function index()
	{       
                $data['categories']=$this->Gallery_model->get_parent_cat();
              $data['main']='photo';
		$this->load->view('gallery',$data);
	}
        function sub_cat($cat_id){
        $data['categories'] = $this->Gallery_model->get_sub_cat($cat_id);
        $data['cat_title']=$this->db->get_where('gallery_categories',array('id'=>$cat_id))->row()->title;
        $data['main'] = 'photo_cat';
         $data['photos']=$this->db->get_where('gallery',array('cat_id'=>$cat_id))->result();
        $this->load->view('gallery', $data);
        }
        
        function view(){
            $cat_id=$this->uri->segment(4);
             $row=$this->db->get_where('gallery_categories',array('id'=>$cat_id))->row();
             $data['cat_title']=$row->title;
             $data['parent_title']=$this->db->get_where('gallery_categories',array('id'=>$row->parent_id))->row()->title;
            $data['desc']=$row->description;
             $this->db->where('cat_id',$cat_id);
            $data['photos']=$this->db->get_where('gallery',array('cat_id'=>$cat_id))->result();
             $data['main']='photo_list';
            $this->load->view('gallery',$data);
        }
        
	
}