<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

    public function login()
    {
        if(isset($_POST['admin_email'])){
            $this->load->model('rules_model');                                          //load model 'rules_model'
            $this->form_validation->set_rules($this->rules_model->admin_author_rules);  //load method 'admin_author_rules'
            $check = $this->form_validation->run();                                     //run form validation
            if($check == TRUE) {                                                        //if $check == TRUE check input data with database data
                $email = $this->input->post('admin_email');
                $pass = $this->input->post('admin_pass');
                $pass = md5($pass);                                                     //md5 input 'password' for compare in database
                $this->load->model('users_model');                                      //load model 'admin_model'
                $data = $this->users_model->check_admin($email,$pass);                  //load method 'check_admin' model 'admin_model' (check isset data in DB or no)
                if(!empty($data)){
                    $_SESSION['user'] = $data[0];                       //$_SESSION['user'] - contains administrator database information
                    redirect('gotoadmin');                              //redirect to admin panel
                } else {
                    $admin_info = 'Неверный логин или пароль';
                }
            }
        }
        //$dara = array to send data in the view
        $data['empty_data'] = 'change in the future';
        if(isset($admin_info)){
            $data['admin_info'] = $admin_info;         //$data['admin_info'] - send admin login info to view
        }
        $this->load->view('author',$data);             //load page view
    }
}