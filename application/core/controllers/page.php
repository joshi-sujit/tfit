<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller{
	
	
		public function index()
	{
		
		@$data['sub_page_id'] = $sub_id = $this->uri->segment(4);
		$data['page_id'] = $id = $this->uri->segment(3);
		
		
		$query_cat = $this->db->query("SELECT * FROM sub_category WHERE id='$sub_id'");
		
			foreach($query_cat->result() as $row_cat){
				$name_sub_cat=$row_cat->name;
				$data['sub_cat_small']=ucwords(strtolower($row_cat->name));
				
				
				}

		
		
		$query_cat = $this->db->query("SELECT * FROM category WHERE id='$id'");
		if($query_cat->num_rows()>0){
			foreach($query_cat->result() as $row_cat){
				//$data['nav']=$row_cat->name;
				$data['h2_cat']=ucwords(strtoupper($row_cat->name));
				$data['cat_small']=ucwords(strtolower($row_cat->name));
				// for manpower
				
				
				}
		}

	$data['query_sub_cat'] = $this->db->query("SELECT * FROM sub_category WHERE category_id='$id' order by orders desc");
		
		
		$this->load->view('page', $data);
	}
	
	

	
	/*
	public function index()
	{
		$data['pageId'] = $id = $this->uri->segment(3);
		$breadcumCategory = $this->db->query("SELECT * FROM category WHERE id='$id'");
		if($breadcumCategory->num_rows()>0){
			foreach($breadcumCategory->result() as $rowBreadcum){
				$data['breadcumCategory']=ucwords(strtolower($rowBreadcum->name));
			}
		}

		$query = $this->db->query("SELECT * FROM content WHERE category = $id");
		

		foreach($query->result() as $rowPage){
			$data['pageHeading'] = $rowPage->heading;
			$data['pageContent'] = $rowPage->description;
		}
		$this->load->view('pageCat',$data);
	}
	
	public function view()
	{
		$data['pageId'] = $pageId = $this->uri->segment(3);
		$data['pageSubId'] = $pageSubId = $this->uri->segment(4);
		$breadcumCategory = $this->db->query("SELECT * FROM category WHERE id='$pageId'");
		if($breadcumCategory->num_rows()>0){
			foreach($breadcumCategory->result() as $rowBreadcum){
				$data['breadcumCategory']=ucwords(strtolower($rowBreadcum->name));
			}
		}
		$query = $this->db->query("SELECT * FROM content WHERE sub_category_id = $pageSubId");
		

		foreach($query->result() as $rowPage){
			$data['pageHeading'] = $rowPage->heading;
			$data['pageContent'] = $rowPage->description;
		}

		$this->load->view('page',$data);
	}*/
	
}