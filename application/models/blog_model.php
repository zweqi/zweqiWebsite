<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model
{
    public function get_all_categories(){
       return  $this->db->get('t_category')->result();
    }

    public function get_all_tags(){
        return $this->db->get('t_tag')->result();
    }

//    public function get_all_blogs(){
//        $this->db->order_by('add_time','desc');
//        return $this->db->get('t_article')->result();
//    }

    public function get_by_id($blog_id){
        return $this->db->get_where('t_article',array('article_id'=>$blog_id))->row();
    }

    public function get_by_category_id($category_id,$offset,$limit){
//        $this->db->order_by('add_time','desc');
//        $this->db->get_where('t_article',array('category_id'=>$category_id));
//        return $this->db->limit($limit,$offset)->result();
        $this->db->select('*')->from('t_article')->where('category_id',$category_id)->limit($limit,$offset);
        $this->db->order_by('add_time','desc');
        $query = $this->db->get();
        return $query ->result();
    }

    public function get_by_tag_id($tag_id){
        $this->db->select('t_a.*');
        $this->db->from('t_article t_a');
        $this->db->join('t_article_tag t_a_t','t_a_t.article_id = t_a.article_id');
        $this->db->where('t_a_t.tag_id',$tag_id);
        $query = $this->db->get();
        return $query -> result();
    }

    public function get_by_page($offset,$limit){
        $this->db->order_by('add_time','desc');
        $this->db->select('*')->from('t_article')->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result();
    }











}