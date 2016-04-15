<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function goods()
    {
        //$dara = array to send data in the view
        $data['empty_data'] = 'change in the future';
        $data['header'] = $this->load->view('layout/header_layout', $data,true); //load view header and send some data to header (if needed in the future)
        $data['footer'] = $this->load->view('layout/footer_layout', $data,true); //load view footer and send some data to footer (if needed in the future)
        $this->load->view('order',$data);                                   //load page view
    }
}