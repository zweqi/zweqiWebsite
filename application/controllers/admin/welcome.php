<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/admin-index');
	}

	public function login()
	{
		$this->load->view('admin/login');
	}


	public function list_article()
	{
		$this -> load -> model('admin/article_model');
		$articles = $this -> article_model -> get_all();

		$this -> load -> model('admin/category_model');
		$categories = $this -> category_model -> get_all();

		$this->load->view('admin/list-article', array('articles' => $articles, 'categories' => $categories));
	}

	public function post()
	{
		$this -> load -> model('admin/category_model');
		$categories = $this -> category_model -> get_all();
		$this->load->view('admin/post-article', array(
			'categories' => $categories
		));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */