<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller
{
    public function append()                   //admin/goods controller
    {
        if (!isset($_SESSION['user'])){        //has access to only the role == 2
            redirect('','refresh');
        }
        if($_SESSION['user']['role'] == 1){    //has access to only the role == 2
            redirect('','refresh');
        }
        if(isset($_POST['admin_logout'])){     //logout condition
            $this->session->sess_destroy();    //destroy session
            redirect('','refresh');
        }
        //$dara = array to send data in the view
        $data['empty_data'] = 'change in the future';
        $this->load->model('categories_model'); //load goods categories model
        $data['goods_categories'] = $this->categories_model->all_categories(); //all category name send to view
        if (isset($_POST['new_goods_model'])){
            $this->load->model('rules_model');
            $this->form_validation->set_error_delimiters('<div class="form_error">','</div>'); //set rules to div show error
            $this->form_validation->set_rules($this->rules_model->append_goods); //load validation ruls
            if(empty($_FILES['uf']['name'][0])) {
                $this->form_validation->set_rules('uf', 'Goods images', 'required'); //field name/Label name/rules
            }
            $check = $this->form_validation->run();  //validate form data
            if($check == true){
                //start upload file  (input upload image manipulate)
                $config['upload_path'] = './stock_image/';          //image upload directory
                $config['allowed_types'] = 'gif|jpg|png';           //image format
                $config['max_size'] = '500';                        //0.5 м MAX file size
                $config['encrypt_name'] = true;                     //change image name
                $this->load->library('upload',$config);             //Load library upload
                //create $files variable for upload all photo in the loop (for)
                $files = $_FILES;
                $cpt = count($_FILES['uf']['name']);
                $all_imgname = array();
                for($i=0; $i<$cpt; $i++) {
                    //with each iteration cycle equate the new value of the global array FILE
                    $_FILES['uf']['name']= $files['uf']['name'][$i];
                    $_FILES['uf']['type']= $files['uf']['type'][$i];
                    $_FILES['uf']['tmp_name']= $files['uf']['tmp_name'][$i];
                    $_FILES['uf']['error']= $files['uf']['error'][$i];
                    $_FILES['uf']['size']= $files['uf']['size'][$i];
                    if(!$this->upload->do_upload('uf')){  //if do_upload return FALSE - send errors to view
                        $this->session->set_flashdata('stock_save_info', $this->upload->display_errors('<div class="form_error_img">','</div>'));
                        redirect(base_url('catalog/append'));
                    }
                    $imgname = $this->upload->data('file_name');
                    $tmp = $this->upload->data(); //variable with temp file data
                    $all_imgname[] = $imgname; //add all image name to array (then write from a array into a string and store in the database)
                    $config = array( //image manipulation config set rules
                        'image_library' => 'gd2', //library name
                        //path and name of resize foto
                        'source_image' => $tmp['file_path'].$tmp['file_name'],//$_SERVER['DOCUMENT_ROOT'].'/bogdan/cilessons/upload/'.$_FILES['uf']['name'],    //путь к файлу
                        //path to save new resize foto
                        'new_image' => './stock_image/thumbs/', //path to image new thumbs
                        'maintain_ratio' =>TRUE,                //save proportion
                        'width' =>1000,                         //thumbs width
                        'height' =>750
                    );
                    //load resize library
                    //library emage_lib autoload
                    $this->image_lib->initialize($config);      //load library
                    //resize foto
                    $this->image_lib->resize();                 //load method to resize image
                }
                //end image upload manipulation $all_imgname[] (array containes all image name)
                $goods_name = $this->input->post('new_goods_model');
                $goods_model = $this->input->post('new_goods_model_model');
                $goods_desc = $this->input->post('new_goods_desc');
                $goods_cat = $this->input->post('new_goods_cat');
                $goods_quantity = $this->input->post('new_goods_quantity');
                $goods_price = round((float)$this->input->post('new_goods_price'), 2); //float round 2 decimals
                $this->load->model('product_model');     //load model(with database work)
                //$put_goods_id - contains goods 'id' to save goods image with
                $put_goods_id = $this->product_model->addGoods($goods_name,$goods_model,$goods_desc,$goods_cat,$goods_quantity,$goods_price); //save data and return id
                if (!empty($put_goods_id)) {
                    $all_imgname_tosave = array(); //We need a multi-dimensional associative array to be stored in the database
                    foreach ($all_imgname as $k => $v) {
                        unset ($all_imgname[$k]);              //unset key name to set new name
                        $new_key = 'image_name';
                        $all_imgname_tosave[][$new_key] = $v;   //put data into array to save data in databse
                    }
                    $data_to_save = array();                    //array to containes all data to save in Database
                    foreach ($all_imgname_tosave as $array) {
                        $array['id_stock_product'] = $put_goods_id; //set key as database row name and val goods database id
                        $data_to_save[] = $array;
                    }
                    $save_product_img = $this->product_model->addImage($data_to_save); //save image data
                    if($save_product_img == true) {
                        $data['stock_save_info'] = '<div class="form_error">Goods add successfully</div>'; //send error info in error div
                    } else {
                        $data['stock_save_info'] = '<div class="form_error">Image load error, please try again</div>'; //send error info in error div
                    }
                } else {
                    $data['stock_save_info'] = '<div class="form_error">Please try again</div>'; //send error info in error div
                }
            } else {
                $data['stock_save_info'] = validation_errors(); //validate error  containes div error class .form_error - to display where i need
            }
        }

        $data['admin_header'] = $this->load->view('layout/admin_header_layout', $data,true); //load view header and send some data to header (if needed in the future)
        $data['admin_footer'] = $this->load->view('layout/admin_footer_layout', $data,true); //load admin view footer
        $data['admin_control_sidebar'] = $this->load->view('layout/admin_control_sidebar_layout', $data,true); //load admin control sidebar

        $this->load->view('catalog/catalog_append',$data);      //load page view
    }
    public function showAll()                //show all product and filter search results
    {
        if (!isset($_SESSION['user'])){        //has access to only the role == 2
            redirect('','refresh');
        }
        if($_SESSION['user']['role'] == 1){    //has access to only the role == 2
            redirect('','refresh');
        }
        if(isset($_POST['admin_logout'])){     //logout condition
            $this->session->sess_destroy();    //destroy session
            redirect('','refresh');
        }
        //$dara = array to send data in the view
        $data['empty_data'] = 'change in the future';
        $data['admin_header'] = $this->load->view('layout/admin_header_layout', $data,true); //load view header and send some data to header (if needed in the future)
        $data['admin_footer'] = $this->load->view('layout/admin_footer_layout', $data,true); //load admin view footer
        $data['admin_control_sidebar'] = $this->load->view('layout/admin_control_sidebar_layout', $data,true); //load admin control sidebar
        $this->load->model('categories_model'); //load goods categories model
        $data['goods_categories'] = $this->categories_model->all_categories(); //all category name send to view
        $data['all_product_rows'] = $this->db->count_all('stock');             //count all product database rows
        if(isset($_POST['product_filter_button'])){                                    //if isset filter data
            $this->load->model('rules_model');
            $this->form_validation->set_error_delimiters('<div class="form_error">','</div>'); //set rules to div show error
            $this->form_validation->set_rules($this->rules_model->filter_product_data); //load validation ruls
            $check = $this->form_validation->run();  //validate form data
            if($check == true) {
                $_POST['ad_product_price'] = preg_replace("/\D/", '', $_POST['ad_product_price']);
                $_POST['ad_product_quantity'] = preg_replace("/\D/", '', $_POST['ad_product_quantity']);
                $insert_array = array();                           //array for use in displaying the result and unset empty filter data
                $insert_array['name'] = $_POST['ad_product_name'];
                $insert_array['model'] = $_POST['ad_product_model'];
                $insert_array['quantity'] = $_POST['ad_product_quantity'];
                $insert_array['price'] = $_POST['ad_product_price'];
                $result_filter_data = array_filter($insert_array); //unset empty filter data
                $this->load->model('product_model');
                //pagination config
                $config['base_url'] = 'http://localhost/bogdan/STORE/catalog/showall';
                $config['total_rows'] = $this->db->count_all('stock');        // all database table count
                $config['per_page'] = '5';                                    //rows in one page
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
                $data['all_product'] = $this->product_model->showFilter($config['per_page'],$page, $result_filter_data);//send data to method select_order
                $data['links'] = $this->pagination->create_links();                            //variable 'links' send pagination config
                // end pagination config
                $this->load->view('catalog/catalog_showall',$data);             //load page view
            } else {
                $data['stock_save_info'] = validation_errors(); //validate error  containes div error class .form_error - to display where i need
                $this->load->view('catalog/catalog_showall',$data);             //load page view
            }
        } else {  //if !isset filter - load default orders data
            $this->load->model('product_model');

            //pagination config
            $config['base_url'] = 'http://localhost/bogdan/STORE/catalog/showall';
            $config['total_rows'] = $this->db->count_all('stock');        // all database table count
            $config['per_page'] = '5';                                    //rows in one page
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
            $page = ($this->uri->segment(3, 0)) ? $this->uri->segment(3, 0) : 0;
            $this->pagination->initialize($config);                                        //load pagination
            $data['all_product'] = $this->product_model->showAll($config['per_page'], $page);//send data to method select_order
            $data['links'] = $this->pagination->create_links();                            //variable 'links' send pagination config
            // end pagination config

          /*  if (isset($_GET['order'])) { //if click button view order ('#order-view-')
                $order_id = (int)$_GET['order'];
                $data['order_view'] = $this->orders_model->view_order($order_id);                 //send order details array to view
                $data['order_view_product'] = $this->orders_model->view_order_product($order_id); //send all order product array to view
                $this->load->view('sales_orders_view', $data);
            } else {
                $this->load->view('catalog_showall', $data);             //load page view
            } */
            $this->load->view('catalog/catalog_showall', $data);             //load page view
        }
    }
    public function editProduct()              //edit product data
    {
        if (!isset($_SESSION['user'])){        //has access to only the role == 2
            redirect('','refresh');
        }
        if($_SESSION['user']['role'] == 1){    //has access to only the role == 2
            redirect('','refresh');
        }
        if(isset($_POST['admin_logout'])){     //logout condition
            $this->session->sess_destroy();    //destroy session
            redirect('','refresh');
        }
        if(isset($_POST['edit_product_name'])){
            $this->load->model('rules_model');    //load rules model
            $this->form_validation->set_rules($this->rules_model->product_edit_data); //load validation ruls
            $check = $this->form_validation->run();  //validate form data
            if($check == true) {
                $edit_id = $this->input->post('edit_product_id');
                $edit_name = $this->input->post('edit_product_name');
                $edit_model = $this->input->post('edit_product_model');
                $edit_desc = $this->input->post('edit_product_desc');
                $edit_price = $this->input->post('edit_product_price');
                $edit_quantity = $this->input->post('edit_product_quantity');
                $edit_date = $this->input->post('edit_product_date');
                $this->load->model('product_model');
                $data = $this->product_model->edit_product($edit_id,$edit_name,$edit_model,$edit_desc,$edit_price,$edit_quantity,$edit_date);
                if($data == true){
                    echo 'Successfully edited';   //response to ajax  js/admin_users.js
                }else{
                    echo 'Please try again';      //response to ajax  js/admin_users.js
                }
            } else {
                echo validation_errors();         //response to ajax  js/admin_users.js
            }
        }
    }
}