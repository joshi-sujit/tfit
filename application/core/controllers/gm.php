<?php

class Gm extends Admin_Controller {

    var $v = 'admin/gallery/index';

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->categories();
    }

    function categories() {
        $data['main'] = 'categories_list';
        $data['list'] = $this->db->order_by('position')->get_where('gallery_categories', array('parent_id' => 0))->result();
        $this->load->view('admin/gallery/index', $data);
    }

    function add_new_category() {
        error_reporting(0);
        $data['categories'] = $this->db->get_where('gallery_categories', array('parent_id' => 0))->result();
        $data['main'] = 'categories_form';
        $this->load->view('admin/gallery/index', $data);
    }
 function edit_cat($id) {
        $data['categories'] = $this->db->get_where('gallery_categories', array('parent_id' => 0))->result();
        $data['detail'] = $this->db->get_where('gallery_categories', array('id' => $id))->row();
        $data['main'] = 'categories_form';
        $data['edit'] = true;
        $this->load->view('admin/gallery/index', $data);
    }
     function edit_cat_save($id) {
        $this->db->where('id', $id);
        $_POST['parent_id'] = $this->input->post('parent');
        unset($_POST['parent']);

        $this->db->update('gallery_categories', $_POST);
        redirect(site_url('gm'));
    }
    function save_cat() {
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['parent_id'] = $this->input->post('parent');
        $this->db->insert('gallery_categories', $data);
        $this->session->set_flashdata('message', 'Gallery Category saves successfully');
        redirect('gm/categories');
    }

    function photos($cat_id) {
        $data['cat_id'] = $cat_id;
        $data['main'] = 'photos';
        $data['photos'] = $this->db->order_by('id','desc')->get_where('gallery',array('cat_id'=>$cat_id))->result();
        $cat_detail= $this->db->from('gallery_categories')->where('id', $cat_id)->get()->row();
        if($cat_detail->parent_id!=0){
            $data['sub_cat_title']=$cat_detail->title;
            $data['parent_cat_title']=$this->db->from('gallery_categories')->where('id', $cat_detail->parent_id)->get()->row()->title;
        }else{
             $data['parent_cat_title']=$cat_detail->title;
        }
        
        $this->load->view('admin/gallery/index', $data);
    }

    function upload_save($cat_id) {
//        $this->load->library('image_lib');
        $this->load->helper('text');
        if (!$_POST) {
            die('0');
        }

        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            $file_name = $_FILES['image']['name'];
            $ext = array_pop(explode('.', $file_name));

            if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG' || $ext == 'GIF') {
                $data['caption'] = $this->input->post('caption');
                $rs = random_string();
                $new_file_name = $rs . '_nepathya.' . $ext;
                $thumb_file_name = $rs . '_nepathya_thumb.' . $ext;

                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/full_size/' . $new_file_name);
                $config['quality'] = '100%';
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/full_size/' . $new_file_name;
                $config['create_thumb'] = TRUE;
//                $config['maintain_ratio'] = TRUE;
                $config['width'] = 150;
                $config['height'] = 150;
                $config['new_image'] = 'uploads/thumb/' . $new_file_name;
                $this->load->library('image_lib', $config);

                if (!$d = $this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                $data['image'] = $new_file_name;
                $data['thumb'] = $thumb_file_name;
                $data['cat_id'] = $cat_id;
                $data['published'] = 1;
                $this->db->insert('gallery', $data);

                $this->session->set_flashdata('message', 'Image uploaded successfully.');
            } else {
                $this->session->set_flashdata('message', 'Invalid Image, Please upload a valid image file.');
            }

            redirect(site_url('gm/photos/' . $cat_id));
        }
    }

    function change_status($status, $id, $cat_id) {
        if ($status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $this->db->where('id', $id);
        $this->db->update('gallery', array('published' => $status));
        $this->session->set_flashdata('message', 'Invalid Image, Please upload a valid image file.');
        redirect(site_url('gm/photos/' . $cat_id));
    }

    function delete_photo($id, $cat_id) {
        $this->db->where('id', $id);
        $this->db->delete('gallery');
        $this->session->set_flashdata('message', 'Photo deleted successfully');
        redirect(site_url('gm/photos/' . $cat_id));
    }

    function delete_cat() {

        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('gallery_categories');
        $this->db->where('parent_id', $this->input->post('id'));
        $this->db->delete('gallery_categories');
        echo '#item-' . $this->input->post('id');
    }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
