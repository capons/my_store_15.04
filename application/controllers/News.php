<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
    public function data(){
        if (!isset($_SESSION['user'])){        //has access to only the role == 2
            redirect('','refresh');
        }
        if($_SESSION['user']['role'] == 1){    //has access to only the role == 2
            redirect('','refresh');
        }
        if(isset($_POST['admin_logout'])){    //logout condition
            $this->session->sess_destroy();   //destroy session
            redirect('','refresh');
        }
        //$dara = array to send data in the view
        $data['empty_data'] = 'change in the future';
        $this->load->model('news_model');            //load model (with database work)

        //pagination config
        $config['base_url'] = 'http://localhost/bogdan/STORE/news/data';
        $config['total_rows'] = $this->db->count_all('authorization'); // all database table count
        $config['per_page'] = '10';                                    //rows in one page
        $config['full_tag_open'] = '<nav><ul style="margin: 0px;padding-right:10px;float: right " class="pagination">'; //start teg
        $config['full_tag_close'] = '</ul></nav>';                                                                      //end teg
        $config['prev_link'] = '&lt; Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next &gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['uri_segment'] = 3;
        $page = ($this->uri->segment(3,0)) ? $this->uri->segment(3,0) : 0;
        $this->pagination->initialize($config);                                        //load pagination
        $data['news_data'] = $this->news_model->all_news($config['per_page'], $page);  //send data to method all_news
        $data['links'] = $this->pagination->create_links();                            //variable 'links' send pagination config
        $data['all_news_rows'] = $this->db->count_all('im_news');                      //send to view count of all users records
        $data['admin_header'] = $this->load->view('layout/admin_header_layout', $data,true); //load view header and send some data to header (if needed in the future)
        $data['admin_footer'] = $this->load->view('layout/admin_footer_layout', $data,true); //load admin view footer
        $data['admin_control_sidebar'] = $this->load->view('layout/admin_control_sidebar_layout', $data,true); //load admin control sidebar
        $this->load->view('news/news',$data);             //load page view
    }
    public function add(){
        if(isset($_POST['modal_news_title'])){
            $this->load->model('rules_model');
            $this->form_validation->set_rules($this->rules_model->news_add_data); //load validation ruls
            $check = $this->form_validation->run();  //validate form data
            if($check == true){
                $title = $this->input->post('modal_news_title');
                $desc = $this->input->post('modal_news_desc');
                $keywords = $this->input->post('modal_news_keywords');
                $date = $this->input->post('modal_news_date');
                $this->load->model('news_model');     //load model (with database work)
                $data = $this->news_model->add_news($title,$desc,$keywords,$date);
                if ($data == true) {
                    echo 'Successfully edited';       //response to ajax  js/admin_users.js
                } else {
                    echo 'Please try again';          //response to ajax  js/admin_users.js
                }
            }else{
                echo 'Please try again';              //response to ajax  js/admin_news.js
            }
        }else{
            redirect('','refresh');
        }
    }
    public function edit(){
        if (!isset($_SESSION['user'])){        //has access to only the role == 2
            redirect('','refresh');
        }
        if($_SESSION['user']['role'] == 1){    //has access to only the role == 2
            redirect('','refresh');
        }
        if(isset($_POST['admin_logout'])){     //logout condition
            unset($_SESSION['user']);
            redirect('','refresh');
        }
        if(isset($_POST['modal_news_edit_title'])){
            $this->load->model('rules_model');
            $this->form_validation->set_rules($this->rules_model->news_edit_data); //load validation ruls
            $check = $this->form_validation->run();
            if($check == true){
                $id = $this->input->post('modal_news_id');
                $title = $this->input->post('modal_news_edit_title');
                $desc = $this->input->post('modal_news_edit_desc');
                $keywords = $this->input->post('modal_news_edit_keywords');
                $edit_date = $this->input->post('modal_news_edit_date');
                $this->load->model('news_model');     //load model (with database work)
                $data = $this->news_model->edit_news($id,$title,$desc,$keywords,$edit_date);
                if ($data == true) {
                    echo 'Successfully edited';       //response to ajax  js/admin_users.js
                } else {
                    echo 'Please try again';          //response to ajax  js/admin_users.js
                }
            }else{
                echo 'Please try again';              //response to ajax  js/admin_news.js
            }
        }else{
            redirect('','refresh');
        }
    }
    public function delete(){
        if (!isset($_SESSION['user'])){        //has access to only the role == 2
            redirect('','refresh');
        }
        if($_SESSION['user']['role'] == 1){    //has access to only the role == 2
            redirect('','refresh');
        }
        if(isset($_POST['admin_logout'])){     //logout condition
            unset($_SESSION['user']);
            redirect('','refresh');
        }
        if(isset($_POST['delete_news_id'])){
            $_POST['delete_news_id'] = (int)$_POST['delete_news_id'];
            $this->load->model('news_model');
            $delete_news =$this->news_model->delete_news($_POST['delete_news_id']);
            if($delete_news == true){
                echo 'Successfully delete';
            }else{
                echo 'Delete error';
            }
        }else{
            redirect('','refresh');
        }
    }
}