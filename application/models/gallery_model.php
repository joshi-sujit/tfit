<?php
class Gallery_model extends CI_Model{
    
    function get_thumb($cat){
        
        $this->db->where('cat_id', $cat);
        $data= $this->db->order_by('id','desc')->limit(1,0)->get('gallery')->row()->thumb;
        echo $this->db->last_query();
    }
    function get_parent_cat(){
        $query="SELECT c.* , (select image from gallery where cat_id =c.id order by id desc limit 1) as image ,
(select cat_id from gallery where cat_id =c.id order by id desc limit 1) as cat_id,
(select thumb from gallery where cat_id =c.id order by id desc limit 1) as thumb
from gallery_categories c where c.parent_id =0";
        $res=$this->db->query($query);
        return $res->result();
        
    }
     function get_sub_cat($parent_id){
        $query="SELECT c.* , (select image from gallery where cat_id =c.id order by id desc limit 1) as image ,
(select cat_id from gallery where cat_id =c.id order by id desc limit 1) as cat_id,
(select thumb from gallery where cat_id =c.id order by id desc limit 1) as thumb
from gallery_categories c where c.parent_id =?";
        $res=$this->db->query($query,array($parent_id));
        return $res->result();
        
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
