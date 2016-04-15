<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function Main()
    {
        if (!isset($_SESSION['user'])){        //has access to only the role == 2
            redirect('','refresh');
        }
        if($_SESSION['user']['role'] == 1){    //has access to only the role == 2
            redirect('','refresh');
        }
        if(isset($_POST['admin_logout'])){    //logout condition
            unset($_SESSION['user']);
            redirect('','refresh');
        }
        //$dara = array to send data in the view
        $data['empty_data'] = 'change in the future';
        $this->load->model('categories_model'); //load goods categories model
        if(isset($_POST['new_category_name'])){
            $this->load->model('rules_model');
            $this->form_validation->set_error_delimiters('<div class="form_error">','</div>'); //set rules to div show error
            $this->form_validation->set_rules($this->rules_model->add_category);               //load validation ruls
            $check = $this->form_validation->run();                                            //validate form data
            if($check == true){
                $name = $_POST['new_category_name'];
                $parent_id = $_POST['parent_category'];
                $desc = $_POST['new_category_desc'];
                //start transliterate category name
                function transliterate($input){
                    $gost = array(
                        "Є"=>"YE","І"=>"I","Ѓ"=>"G","і"=>"i","є"=>"ye","ѓ"=>"g",
                        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
                        "Е"=>"E","Ё"=>"YO","Ж"=>"ZH",
                        "З"=>"Z","И"=>"I","Й"=>"J","К"=>"K","Л"=>"L",
                        "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
                        "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"X",
                        "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"'",
                        "Ы"=>"Y","Ь"=>"","Э"=>"E","Ю"=>"YU","Я"=>"YA",
                        "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
                        "е"=>"e","ё"=>"yo","ж"=>"zh",
                        "з"=>"z","и"=>"i","й"=>"j","к"=>"k","л"=>"l",
                        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
                        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"x",
                        "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
                        "ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"
                    );
                return strtr($input, $gost);
                }
                //name_translit (translit category name) - we use in URL
                $name_translit = transliterate($name);
                $name_translit = mb_strtolower($name_translit);      //string to lower case
                $name_translit = str_replace(" ","_",$name_translit);//replace all spaces to '_'
                //end transliterate
                $row = $this->categories_model->add_categories($name,$parent_id,$desc,$name_translit);//send data to save in database
                if($row == true) {
                    $data['user_info'] ='<div class="form_error">Successfully added</div>';
                } else {
                    $data['user_info'] = '<div class="form_error">Please try again</div>';
                }
            } else {
                $data['user_info'] = validation_errors(); //validate error  containes div error class .form_error - to display where i need
            }
        }
        $data['admin_header'] = $this->load->view('layout/admin_header_layout', $data,true); //load view header and send some data to header (if needed in the future)
        $data['admin_footer'] = $this->load->view('layout/admin_footer_layout', $data,true); //load admin view footer
        $data['admin_control_sidebar'] = $this->load->view('layout/admin_control_sidebar_layout', $data,true); //load admin control sidebar
        $data['parent_categories'] = $this->categories_model->all_categories();   //all categories
        //pagination config
        $config['base_url'] = 'http://localhost/bogdan/STORE/categories/main';
        $config['total_rows'] = $this->db->count_all('categories');   // all database table count
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
        $data['parent_child_categories'] = $this->categories_model->all_parent($config['per_page'],$page); //all parent and child categories
        $data['all_cat_count'] = $this->db->count_all('categories');                   //count all categories to show in view
        $data['links'] = $this->pagination->create_links();                            //variable 'links' send pagination config
        // end pagination config

        //Create a map of child categories tree
        $cat = array();
        //В цикле формируем массив разделов, ключом будет id родительской категории, а также массив разделов, ключом будет id категории
        //$data['parent_categories'] all goods category
        foreach ( $data['parent_categories'] as $row) {
           // $cat_ID[$row['id']][] = $row; need if need function 'find_parent'
            $cat[$row['parent_id']][$row['id']] = $row;
        }
        function build_tree($cat, $parent_id, $only_parent = false)
        {
            if (is_array($cat) and isset($cat[$parent_id])) {
                $tree = '<ul type="circle" id="category-tree">';
                if ($only_parent == false) {
                    foreach ($cat[$parent_id] as $cat_row) {
                        $tree .= '<li id="' . $cat_row['id'] . '">'.$cat_row['name'];  //li -> will have a id as category id in database
                        $tree .= build_tree($cat, $cat_row['id']);
                        $tree .= '</li>';
                    }
                } elseif (is_numeric($only_parent)) {
                    $category = $cat[$parent_id][$only_parent];
                    $tree .= '<li>' . $category['name'];
                    $tree .= build_tree($cat, $category['id']);
                    $tree .= '</li>';
                }
                $tree .= '</ul>';
            } else return null;
            return $tree;
        }
        /*
         if need to show curent category tree
        function find_parent($tmp, $cur_id)
        {
            if ($tmp[$cur_id][0]['parent_id'] != 0) {
                return find_parent($tmp, $tmp[$cur_id][0]['parent_id']);
            }
            return (int)$tmp[$cur_id][0]['id'];
        }
        //echo build_tree($cat, 0, find_parent($cat_ID, 106));
        */
        $data['tree'] =  build_tree($cat, 0); //SEND category tree to view
        //End category tree
        
        $this->load->view('categories/categories',$data);             //load page view
    }
    //edit product categorys
    public function Edit()
    {
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
        if(isset($_POST['edit_category_name'])){
            //$this->load->model('rules_model');
            $this->form_validation->set_rules('edit_category_name','Category name','required|max_length[100]|trim|prep_for_form|encode_php_tags'); //load validation ruls
            $check = $this->form_validation->run();
            if($check == true){
                $id = $this->input->post('edit_category_id');
                $name = $this->input->post('edit_category_name');
                $this->load->model('categories_model');     //load model (with database work)
                $data = $this->categories_model->edit_category($id,$name);
                if ($data == true) {
                    echo 'Successfully edited';       //response to ajax  js/admin_users.js
                } else {
                    echo 'Please try again';          //response to ajax  js/admin_users.js
                }
            }else{
                echo 'Please try again';              //response to ajax  js/admin_news.js
            }
        }
        if(isset($_POST['curent_cat_id'])) {
            $curent_cat_id = (int)$_POST['curent_cat_id'];
            $new_parent_cat = (int)$_POST['parent_cat_id'];
            $this->load->model('categories_model');     //load model (with database work)
            $data = $this->categories_model->change_parent($curent_cat_id,$new_parent_cat);
            if ($data == true) {
                echo 'Parent category changed successfully';       //response to ajax  js/admin_users.js
            } else {
                echo 'Please try again';          //response to ajax  js/admin_users.js
            }
        }
    }
}