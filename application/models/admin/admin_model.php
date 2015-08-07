<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	
	public function get_by_name_pwd($name, $pwd)
	{
		return $this -> db -> get_where('t_admin', array('admin_name'=>$name, 'admin_pwd' => $pwd)) -> row();
	}
}
