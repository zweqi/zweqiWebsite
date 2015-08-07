<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
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
		$this->load->view('index.php');
	}

	public function to_blog()
	{
		$this->load->library('pagination');

		$categories = $this->blog_model->get_all_categories();
		$tags = $this->blog_model->get_all_tags();
		$perPage = 5;
		if($this->uri->segment(3)==NULL){
			$start = 0;
		}else{
			$start = $this->uri->segment(3);
		}
		$config['base_url'] = 'welcome/to_blog';
		$config['total_rows'] = $this->db->count_all_results('t_article');
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;
		$config['next_tag_open'] = '<a class="next page-numbers">';
		$config['next_tag_close'] = '</a>';
		$config['cur_tag_open'] = '<span class="page-numbers current">';
		$config['cur_tag_close'] = '</span>';
//		$config['num_tag_open'] = '<a class="page-numbers">';
//		$config['num_tag_open'] = '</li>';
//		$config['prev_tag_open'] = '<a class="next page-numbers">';
//		$config['anchor_class'] = "page-numbers";
		$config['next_link'] = 'NEXT';
		$this->pagination->initialize($config);
		$result = $this->blog_model->get_by_page($start,$perPage);
		$data = array(
			'categories'=> $categories,
			'tags'=>$tags,
			'blogs'=>$result
		);
		$this->load->view('Blog.php',$data);
	}

	public function to_resume()
	{
		$this->load->view('Resume.php');
	}

	public function to_profile()
	{
		$this->load->view('Profile.php');
	}

	public function to_portfolio()
	{
		$this->load->view('Portfolio.php');
	}

	public function to_contact()
	{
		$this->load->view('Contact.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */