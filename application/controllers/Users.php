<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function data()                     //user main view
    {
        if (!isset($_SESSION['user'])){        //has access to only the role == 2
            redirect('','refresh');
        }
        if($_SESSION['user']['role'] == 1){    //has access to only the role == 2
            redirect('','refresh');
        }
        if(isset($_POST['admin_logout'])){     //logout condition
            $this->session->sess_destroy();   //destroy session
            redirect('','refresh');
        }
        //$dara = array to send data in the view
        $data['empty_data'] = 'change in the future';
        $this->load->model('users_model');     //load model 'users_model'
        //pagination config
        $config['base_url'] = 'http://localhost/bogdan/STORE/users/data';
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
        $this->pagination->initialize($config);                                          //load pagination
        $data['users_data'] = $this->users_model->all_users($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();                              //variable 'links' send pagination config
        $data['all_users_rows'] = $this->db->count_all('authorization');                 //send to view count of all users records
        $data['admin_header'] = $this->load->view('layout/admin_header_layout', $data,true); //load view header and send some data to header (if needed in the future)
        $data['admin_footer'] = $this->load->view('layout/admin_footer_layout', $data,true); //load admin view footer
        $data['admin_control_sidebar'] = $this->load->view('layout/admin_control_sidebar_layout', $data,true); //load admin control sidebar

        $this->load->view('users/users',$data);      //load page view
    }
    public function edit(){                    //edit user data
        if(isset($_POST['modal_edit_user_id'])){
            $this->load->model('rules_model');
            $this->form_validation->set_rules($this->rules_model->users_edit_data);
            $check = $this->form_validation->run();
            if($check == true){
                $edit_id = $this->input->post('modal_edit_user_id');
                $edit_name = $this->input->post('modal_edit_user_name');
                $edit_pass = $this->input->post('modal_edit_user_pass');
                $edit_email = $this->input->post('modal_edit_user_email');
                $edit_tell = $this->input->post('modal_edit_user_tell');
                $edit_role = $this->input->post('modal_edit_user_role');
                $this->load->model('users_model');
                $check_pass = $this->users_model->check_pass($edit_pass);
                if(empty($check_pass)){           //if change password - md5 new password
                    $edit_pass = md5($edit_pass);
                }
                $data = $this->users_model->edit_user_data($edit_id,$edit_name,$edit_pass,$edit_email,$edit_tell,$edit_role);
                if($data == true){
                    echo 'Successfully edited';   //response to ajax  js/admin_users.js
                }else{
                    echo 'Please try again';      //response to ajax  js/admin_users.js
                }
            }else{
                echo validation_errors();         //response to ajax  js/admin_users.js
            }
        }else{
            redirect('','refresh');
        }
    }
    public function add(){                        //add user data
        if(isset($_POST['modal_add_user_name'])){
            $this->load->model('rules_model');
            $this->form_validation->set_rules($this->rules_model->users_add_data);
            $check = $this->form_validation->run();
            if($check == true){
                $edit_name = $this->input->post('modal_add_user_name');
                $edit_pass = $this->input->post('modal_add_user_pass');
                $edit_email = $this->input->post('modal_add_user_email');
                $edit_tell = $this->input->post('modal_add_user_tell');
                $edit_role = $this->input->post('modal_add_user_role');
                $this->load->model('users_model');
                $check_email = $this->users_model->check_email($edit_email);
                $check_name = $this->users_model->check_name($edit_name);
                if(empty($check_name)) {
                    if (empty($check_email)) {             //if email is unique
                        $data = $this->users_model->add_new_data($edit_name, $edit_pass, $edit_email, $edit_tell, $edit_role); //save user data
                        if ($data == true) {
                            echo 'Successfully edited';   //response to ajax  js/admin_users.js
                        } else {
                            echo 'Please try again';      //response to ajax  js/admin_users.js
                        }
                    } else {
                        echo 'Email already exists';      //response to ajax  js/admin_users.js
                    }
                }else{
                    echo 'Name already exisrs';          //response to ajax  js/admin_users.js
                }
            }else{
                echo validation_errors();                //response to ajax  js/admin_users.js
            }
        }else{
            redirect('','refresh');
        }
    }
    public function delete(){                           //delete user data
        if(isset($_POST['delete_user_id'])){
            $_POST['delete_user_id'] = (int)$_POST['delete_user_id'];
            $this->load->model('users_model');
            $delete_user =$this->users_model->delete_user($_POST['delete_user_id']);
            if($delete_user == true){
                echo 'Successfully delete';
            }else{
                echo 'Delete error';
            }
        }else{
            redirect('','refresh');
        }
    }
}