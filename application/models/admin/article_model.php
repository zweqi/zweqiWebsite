<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('t_article')->result();
    }

    public function get_all_tags($keyword)
    {
        $this->db->like('tag_name', $keyword);
        return $this->db->get('t_tag')->result();
    }

    public function save($article)
    {
        $this->db->insert('t_article', $article);
        return $this->db->affected_rows();
    }

    public function delete($ids)//1,2
    {
        $this->db->query("delete from t_article where article_id in ($ids)");
        return $this->db->affected_rows();
    }

    public function del_article($article_id){
        $this->db->delete('t_article',array('article_id'=>$article_id));
        return $this->db->affected_rows();
    }

    public function get_by_category_id($category_id)
    {
        return $this->db->get_where('t_article', array('category_id' => $category_id))->result();
    }
}
