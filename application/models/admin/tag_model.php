<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tag_model extends CI_Model
{


    public function get_all()
    {
        return $this->db->get('t_tag')->result();
    }

    public function save($tags)
    {
        $this -> db -> insert_batch('t_tag', $tags);
        return $this->db->affected_rows();
    }
}
