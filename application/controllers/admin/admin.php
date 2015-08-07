<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this -> load -> model("admin/admin_model");
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('admin/admin-index');
	}
	
	public function check_login()
	{
		$username = $this -> input -> post('username');
		$password = $this -> input -> post('password');
		
		$result = $this -> admin_model -> get_by_name_pwd($username, $password);
		if($result){
			echo 'success';
		}else{
			echo 'fail';
		}
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */