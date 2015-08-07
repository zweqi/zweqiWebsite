<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{

    public function insert_user($username,$password){
        $data = array(
            'username'=>$username,
            'password'=>$password
        );
        return $this->db->insert('t_user', $data)->row();

    }

    public function get_by_name_pwd($username,$password){
        $data = array(
            'username'=>$username,
            'password'=>$password
        );
        return $this->db->get_where('t_user',$data)->row();
    }





}