<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    public function get_com_by_id($blog_id){
//        return $this->db->get_where('t_comment',array('article_id'=>$blog_id))->result();
        $this->db->select('t_comment.*,t_user.username');
        $this->db->from('t_comment');
        $this->db->where('article_id',$blog_id);
        $this->db->join('t_user','t_comment.user_id=t_user.user_id');
        return $query = $this->db->get()->result();
    }

    public function add_comm($data){
        $this->db->insert('t_comment',$data);
        return $this->db->affected_rows();
    }












}