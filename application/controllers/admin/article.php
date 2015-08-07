<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Article extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/article_model");
        $this->load->model("admin/tag_model");
    }

    public function index()
    {
    }


    public function search()
    {
        $keyword = $this->input->get('keyword');
        $result = $this->article_model->get_all_tags($keyword);

        echo json_encode($result);
    }

    public function post()
    {
        $title = htmlspecialchars($this->input->post('title'));
        $category_id = $this->input->post('categoryId');
        $str_tags = htmlspecialchars($this->input->post('tags'));//"人妖,鸟人"
        $content1 = htmlspecialchars($this->input->post('content1'));
        $time = $time=date('Y-m-d H-i-s',time());
        //必须要进行验证

        //图片上传
        $config['upload_path'] = './uploads/news';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5 * 1024;
        $config['file_name'] = date('YmdHis') . "_" . rand(10000, 99999);
//        $config['max_width']  = '1024';
//        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('imgSrc')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('admin/post-article', $error);
        } else {
            $upload_data = $this->upload->data();
            //保存数据库
            $all_tags = $this->tag_model->get_all();
            $arr_tags = explode(',', $str_tags);//['人妖','鸟人','哈哈']

            for ($i = 0; $i < count($all_tags); $i++) {
                for ($j = 0; $j < count($arr_tags); $j++) {
                    if ($all_tags[$i]->tag_name == $arr_tags[$j]) {
                        array_splice($arr_tags, $j, 1);
                    }
                }
            }
            if (count($arr_tags) > 0) {//['哈哈', '嘻嘻']
                $data = array();
                foreach ($arr_tags as $s_tag) {
                    array_push($data, array(
                        'tag_name' => $s_tag
                    ));
                }

                $this->tag_model->save($data);
            }

            $rows = $this->article_model->save(array(
                'title' => $title,
                'category_id' => $category_id,
                'content' => $content1,
                'img_src' => 'uploads/news/' . $upload_data['file_name'],
                'add_time'=>$time
            ));

            if ($rows > 0) {
                redirect('admin/list-article');
            } else {
                //redirect('admin/post-article');
                echo '<script>alert("添加新闻出错，请重试!");location.href="admin/post-article";</script>';
            }
        }


    }

    public function  delete()
    {
        $article_ids = $this->input->get('articleIds');//"1,2"
        $rows = $this->article_model->delete($article_ids);
        if ($rows > 0) {
            echo 'success';
        } else {
            echo 'fail';
        }
    }

    public function get_category_articles($category_id)
    {
        $this->load->model('admin/category_model');
        $categories = $this->category_model->get_all();

        $articles = $this->article_model->get_by_category_id($category_id);
        $this->load->view('admin/list-article', array(
            'categories' => $categories,
            'articles' => $articles
        ));
    }


    public function del_article()
    {
        $article_id = $this->input->get('id');
        $row = $this->article_model->del_article($article_id);

        if ($row > 0) {
            redirect('admin/list-article');
        } else {
            redirect('admin/list-article');
            echo '<script>alert("删除失败！");</script>';

        }
    }













}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
