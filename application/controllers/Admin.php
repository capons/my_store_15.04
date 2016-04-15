<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function panel(){
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
        $data['admin_header'] = $this->load->view('layout/admin_header_layout', $data,true); //load admin view header and send some data to header (if needed in the future)
        $data['admin_footer'] = $this->load->view('layout/admin_footer_layout', $data,true); //load admin view footer
        $data['admin_control_sidebar'] = $this->load->view('layout/admin_control_sidebar_layout', $data,true); //load admin control sidebar
        $this->load->view('admin',$data);             //load page view
    }
}