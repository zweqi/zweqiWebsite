<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->model('comment_model');
    }

    public function blog_detail(){
       $blog_id =  $this->input->get('id');
        $categories = $this->blog_model->get_all_categories();
        $tags = $this->blog_model->get_all_tags();
        $row = $this->blog_model->get_by_id($blog_id);
        $result = $this->comment_model->get_com_by_id($blog_id);
        $data = array(
            'row' =>$row,
            'categories'=> $categories,
            'tags'=>$tags,
            'comms'=>$result
        );
        $this->load->view('Blog_detail',$data);
    }

    public function category_blog(){
        $this->load->library('pagination');
        $category_id = $this->input->get('id');

        $categories = $this->blog_model->get_all_categories();
        $tags = $this->blog_model->get_all_tags();
        $perPage = 5;
        if($this->uri->segment(3)==NULL){
            $start = 0;
        }else{
            $start = $this->uri->segment(3);
        }
        $config['base_url'] = 'blog/category_blog?id='+$category_id;
        $config['total_rows'] = $this->db->count_all_results('t_article');
        $config['per_page'] = $perPage;
        $config['uri_segment'] = 3;
        $config['next_link'] = 'NEXT';
//        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);
        $result = $this->blog_model->get_by_category_id($category_id,$start,$perPage);
        $data = array(
            'blogs' => $result,
            'categories'=> $categories,
            'tags'=>$tags
        );
        $this->load->view('Blog.php',$data);
    }

    public function tag_blog(){
        $tag_id = $this->input->get('id');
        $result =  $this->blog_model->get_by_tag_id($tag_id);
        $categories = $this->blog_model->get_all_categories();
        $tags = $this->blog_model->get_all_tags();
        $data = array(
            'blogs' => $result,
            'categories'=> $categories,
            'tags'=>$tags
        );
        $this->load->view('Blog.php',$data);
    }



}