<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('comment_model');
    }


    public function register(){
        $this->load->view('register');
    }

    public function do_register(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $row = $this->user_model->insert_user($username,$password);
        if($row){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function login(){
        $this->load->view('user_login');
    }

    public function check_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $row = $this->user_model->get_by_name_pwd($username,$password);
        if($row){
            $this->session->set_userdata('login_user',$row);
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function logout(){
        $this->session->unset_userdata('login_user');
        $this->load->view('index');
    }

    public function post_comm(){
        $content = $this->input->post('message');
        $article_id = $this->input->get('id');
        $login_user = $this->session->userdata('login_user');
        $user_id = $login_user->user_id;
        $time=date('Y-m-d H-i-s',time());
        $data = array(
            'content'=> $content,
            'user_id'=>$user_id,
            'article_id'=>$article_id,
            'add_time'=>$time
        );
        $row =  $this->comment_model->add_comm($data);
        if($row&&$row=1){
           redirect('/blog/blog_detail?id=',$article_id);
            //$this->load->view('Blog.php');
        }else{
            echo '∆¿¬€ ß∞‹£°';
        }
    }




















}