<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
    public function angel($categoryName='',$categoryId='') //send uri variable 
    {
        //$dara = array to send data in the view
        $data['empty_data'] = 'change in the future';
        $this->load->model('product_model');    //load goods model
        $this->load->model('categories_model'); //load goods categories model
        $data['parent_categories'] = $this->categories_model->all_categories();   //all categories
        if(empty($categoryId) && empty($categoryName)) { //if empty url variable (if the user has not clicked on the category name)
            if(isset($_GET['goods_search'])){   //serch goods query
                $this->form_validation->set_rules('goods_search', '', 'max_length[30]|trim|prep_for_form|encode_php_tags');
                $this->form_validation->run();  //validate form data
                $this->load->model('product_model');
                $data['shop_product'] = $this->product_model->goods_search($_GET['goods_search']);//send data to method select_order

            } else {
                //goods pagination config
                $this->load->model('product_model');    //load goods model
                $config['base_url'] = base_url().'main/angel';
                $config['total_rows'] = $this->db->count_all('stock');        // all database table count
                $config['per_page'] = '15';                                    //rows in one page
                $config['full_tag_open'] = '<nav><ul style="margin: 0px 4px 0px 0px;float: right " class="pagination">'; //start teg
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
                $this->pagination->initialize($config);//load pagination
                $data['shop_product'] = $this->product_model->show_rand_product($config['per_page'], $page);//send data to method select_order
                $data['links'] = $this->pagination->create_links();                            //variable 'links' send pagination config
                // end pagination config
            }
        } else {
            if(isset($_GET['goods_search'])){   //serch goods query
                $this->form_validation->set_rules('goods_search', '', 'max_length[60]|trim|prep_for_form|encode_php_tags');
                $this->form_validation->run();  //validate form data
                $this->load->model('product_model');
                $data['shop_product'] = $this->product_model->goods_search($_GET['goods_search']);//send data to method select_order

            } else {
                //goods pagination config
                $categoryId = (int)$categoryId;         //url variable
                $this->load->model('product_model');    //load goods model
                $config['base_url'] = base_url().'main/angel/' . $categoryName . '/' . $categoryId;
                $config['total_rows'] = $this->db->count_all('stock');        // all database table count
                $config['per_page'] = '15';                                    //rows in one page
                $config['full_tag_open'] = '<nav><ul style="float: right;margin: 0px 4px 0px 0px;" class="pagination">'; //start teg
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
                $config['uri_segment'] = 5;                                                    //uri segment
                $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;                 //pagination uri segment
                $this->pagination->initialize($config);                                        //load pagination
                $data['shop_product'] = $this->product_model->show_category_product($config['per_page'], $page, $categoryId);//send data to method select_order
                $data['links'] = $this->pagination->create_links();                            //variable 'links' send pagination config
                // end pagination config
            }
        }
        $data['carusel_data'] = $this->product_model->best_product(); //load data for header "carusel-slider"
        $data['header'] = $this->load->view('layout/new_header_layout', $data,true); //load view header and send some data to header (if needed in the future)
        $data['footer'] = $this->load->view('layout/new_footer_layout', $data,true); //load view footer and send some data to footer (if needed in the future)
        $data['basket_view'] = $this->load->view('layout/basket_view_layout',$data,true); // load basket buyer view
        $data['modal_window'] = $this->load->view('layout/modal_window',$data,true); // load basket buyer view

        $this->load->view('store_pages/main/new_main',$data);                                         //load page view
    }
    public function basket(){ //shop basket
        if(isset($_POST['basket_goods_plus'])){            //increase basket goods quantity js/main_angels.js
            $goods_id = (int)$_POST['basket_goods_plus_id'];
            $goods_quantity = (int)$_POST['basket_goods_plus'];
            $_SESSION['angel_basket'][$goods_id]['quantity'] = $goods_quantity; //set new session goods quantity
        }
        if(isset($_POST['basket_goods_minus'])){          //decrease basket goods quantity  js/main_angels.js
            $goods_minus_id = (int)$_POST['basket_goods_minus_id'];
            $goods_minus_quantity = (int)$_POST['basket_goods_minus'];
            $_SESSION['angel_basket'][$goods_minus_id]['quantity'] = $goods_minus_quantity; //set new session goods quantity
        }
        if(isset($_POST['remove_basket_goods'])){        //remove goods from basket - unset goods session
            $remove_goods = (int)$_POST['remove_basket_goods'];
            unset ($_SESSION['angel_basket'][$remove_goods]);
        }
        
        if(isset($_POST['basket_sess_dest'])){             //unset session basket for clear basket
            unset($_SESSION['angel_basket']);
            if(empty($_POST['u_goods_url'])){
                redirect('','refresh');
            } else {
                redirect($_POST['u_goods_url'],'refresh'); //curent redirect url
            }
        }
        if(isset($_POST['add_to_basket'])){
            $goods_details = $_POST['add_to_basket'];
            $goods_url = $_POST['goods_url'];
            $pieces = explode("|", $goods_details);
            $goods_id = $pieces[0];
            $goods_name = $pieces[1];
            $goods_total_quantity = $pieces[2];
            $goods_price = $pieces[3];
            $goods_img = $pieces[4];
            if(isset($_SESSION['angel_basket'])){
               if (array_key_exists($goods_id, $_SESSION['angel_basket'])){
                   $_SESSION['angel_basket'][$goods_id]['quantity']++;
                   if(empty($goods_url)) {
                       redirect('', 'refresh');
                   } else {
                       redirect($goods_url, 'refresh');
                   }
                   } else {
                       $_SESSION['angel_basket'][$goods_id] = array(
                           "quantity" => 1,
                           "name" => $goods_name,
                           "img" => $goods_img,
                           "price" => $goods_price,
                           "total_quantity" => $goods_total_quantity
                       );
                       if(empty($goods_url)) {
                           redirect('', 'refresh');
                       } else {
                           redirect($goods_url, 'refresh');
                       }
                   }
               } else {
                $_SESSION['angel_basket'][$goods_id] = array(
                    "quantity" => 1,
                    "name" => $goods_name,
                    "img" => $goods_img,
                    "price" => $goods_price,
                    "total_quantity" => $goods_total_quantity
                );
                if(empty($goods_url)) {
                    redirect('', 'refresh');
                } else {
                    redirect($goods_url, 'refresh');
                }
            }
        } else {
            if(empty($goods_url)) {
                redirect('', 'refresh');
            } else {
                redirect($goods_url, 'refresh');
            }
        }
    }
    public function order (){
        if(isset($_POST['one_quantity_check'])){ //check basket goods quantity whene click "Оформить заказ"
            $this->load->model('product_model'); //load goods categories model
            if(isset($_SESSION['angel_basket'])){
                $goods_guantity_result = array(); //push database result into array
                foreach ($_SESSION['angel_basket'] as $key=>$value) {
                    $check_quantity = $this->product_model->check_quantity($key, $value['quantity']); //check goods quantity in databse (if false return false)
                    $goods_guantity_result[] = $check_quantity;
                }
                if (in_array(false, $goods_guantity_result)) { //true if the quantity of goods is not enough
                    //php input validate error send to js respons main_angel.js
                    $error_arr = array(); //array for json data
                    $error_arr[0] = 'quantity_error';
                    $error_arr[1] = 'Изинине на складе нет такого количества товара';
                    echo json_encode($error_arr);
                } else {
                    //php input validate error send to js respons main_angel.js
                    $error_arr = array(); //array for json data
                    $error_arr[0] = 'quantity_positive';
                    echo json_encode($error_arr);
                }
            }
        }
        //step 2 => byuer information
        if(isset($_POST['buyer_name'])){
            $this->load->model('product_model'); //load goods categories model
            if(isset($_SESSION['angel_basket'])){
                $goods_guantity_result = array(); //push database result into array
                foreach ($_SESSION['angel_basket'] as $key=>$value) {
                    $check_quantity = $this->product_model->check_quantity($key, $value['quantity']); //check goods quantity in databse (if false return false)
                    $goods_guantity_result[] = $check_quantity;
                }
                if (in_array(false, $goods_guantity_result)) { //true if the quantity of goods is not enough
                    //php input validate error send to js respons main_angel.js
                    $error_arr = array(); //array for json data
                    $error_arr[0] = 'quantity_error';
                    $error_arr[1] = 'Изинине на складе нет такого количества товара';
                    echo json_encode($error_arr);
                } else {
                    $_POST['buyer_phone'] = preg_replace("/\D/", '', $_POST['buyer_phone']);         //only numbers
                    $this->form_validation->set_rules('buyer_name', 'Инициалы', 'required|trim|max_length[50]|prep_for_form|encode_php_tags');
                    $this->form_validation->set_rules('buyer_email', 'Email', 'required|trim|valid_email|max_length[50]|prep_for_form|encode_php_tags');
                    $this->form_validation->set_rules('buyer_phone', 'Телефон', 'required|trim|is_natural|max_length[50]|prep_for_form|encode_php_tags');
                    $this->form_validation->set_rules('buyer_city', 'Город проживания', 'required|trim|max_length[50]|prep_for_form|encode_php_tags');
                    $this->form_validation->set_rules('buyer_address', 'Адрес', 'required|trim|max_length[100]|prep_for_form|encode_php_tags');
                    if(!empty($_POST['buyer_comment'])){ //if field not empty validate tham
                        $this->form_validation->set_rules('buyer_comment', 'Коментарий к заказу', 'trim|max_length[100]|prep_for_form|encode_php_tags');
                    }
                    if ($this->form_validation->run() == true) {
                        $buyer_name = $_POST['buyer_name'];
                        $buyer_email = $_POST['buyer_email'];
                        $buyer_phone = $_POST['buyer_phone'];
                        $buyer_city = $_POST['buyer_city'];
                        $buyer_address = $_POST['buyer_address'];
                        $buyer_comment = $_POST['buyer_comment'];
                        $data_string = array(                //find city and return cityId From NovaPoshta API 2.0 | $data_string = $_POST['json_n_p']; //got json from POST -> from js/main_angel.js
                            'apiKey' => "3c7122c42f40fe7c44533f8b0ac4e2fa",  //my apiKey from NovaPoshta
                            'modelName' => "Address",
                            'calledMethod' => 'getCities',
                            'methodProperties' => array(
                                'FindByString' => $buyer_city
                            )
                        );
                        $data_string = json_encode($data_string);
                        $ch = curl_init('https://api.novaposhta.ua/v2.0/json/'); //url to send json -> to NovaPoshta -> got city id for details
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");         //set method
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);      //what send
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //on local server
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //on local server
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                'Content-Type: application/json',
                                'Content-Length: ' . strlen($data_string))
                        );
                        $result = curl_exec($ch);                       //curl result

                        curl_close($ch);

                        $result = json_decode($result,true);
                        if(!empty($result['data'])){    //if response true |  // $result - Array recive from NovaPoshta API 2.0
                            $np_city_id =  $result['data'][0]['Ref']; //variable with the id of the city received from NovaPoshta API 2.0
                            $_SESSION['buyer_info'] = array(
                                'buyer_name' => $buyer_name,
                                'buyer_email' => $buyer_email,
                                'buyer_phone' => $buyer_phone,
                                'buyer_city' => $buyer_city,
                                'buyer_address' => $buyer_address,
                                'buyer_comment' => $buyer_comment
                            ) ;
                            $np_werhouse = array( //https://my.novaposhta.ua/data/instruction-json-1.7.pdf - API manual |  $np_werhouse NovaPoshta API 2.0 config
                                'apiKey' => "3c7122c42f40fe7c44533f8b0ac4e2fa",
                                'modelName' => "Address",
                                'calledMethod' => 'getWarehouses',
                                'methodProperties' => array(
                                    'CityRef' => $np_city_id
                                )
                            );
                            $data_string_werhouse = json_encode($np_werhouse); //got json from POST -> from js/main_angel.js
                            $ch1 = curl_init('https://api.novaposhta.ua/v2.0/json/'); //url to send json -> to NovaPoshta -> got city id for details
                            curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");         //set method
                            curl_setopt($ch1, CURLOPT_POSTFIELDS, $data_string_werhouse);      //what send
                            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch1, CURLOPT_HEADER, false);
                            curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false); //on local server
                            curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, false); //on local server
                            curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
                                    'Content-Type: application/json',
                                    'Content-Length: ' . strlen($data_string_werhouse))
                            );
                            $result_werhouse = curl_exec($ch1);                       //curl result

                            curl_close($ch1);

                            $result_werhouse = json_decode($result_werhouse,true);   //all city werhouse
                            $nova_poshta_city_verhouse = array();                   //array containes all city werhouse address
                            foreach ($result_werhouse['data'] as $row) {
                                array_push($nova_poshta_city_verhouse, $row['DescriptionRu']); //push all city werhouse into array
                            }
                            $error_arr = array(); //array for json data
                            $error_arr[0] = 'positive';
                            $error_arr[1] = $nova_poshta_city_verhouse;
                            echo json_encode($error_arr);
                            exit(); //exit for stop header error
                        } else {
                            $_SESSION['buyer_info'] = array( //push buyer data into array
                                'buyer_name' => $buyer_name,
                                'buyer_email' => $buyer_email,
                                'buyer_phone' => $buyer_phone,
                                'buyer_city' => $buyer_city,
                                'buyer_address' => $buyer_address,
                                'buyer_comment' => $buyer_comment
                            );

                            $error_arr = array(); //array for json data
                            $error_arr[0] = 'error_city';
                            echo json_encode($error_arr);
                        }
                    } else {
                        //php input validate error send to js respons main_angel.js
                        $error_arr = array(); //array for json data
                        $error_arr[0] = 'error_input';
                        $error_arr[1] = validation_errors();
                        echo json_encode($error_arr);
                    }
                }
            }
        }
        //next step save delivery and payment method => if checkbox #pay_cash select
        if(isset($_POST['order_delivery_s'])) {
            //delivery form
            $this->load->model('product_model'); //load goods categories model
            if(isset($_SESSION['angel_basket'])){
                $goods_guantity_result = array(); //push database result into array
                foreach ($_SESSION['angel_basket'] as $key=>$value) {
                    $check_quantity = $this->product_model->check_quantity($key, $value['quantity']); //check goods quantity in databse (if false return false)
                    $goods_guantity_result[] = $check_quantity;
                }
                if (in_array(false, $goods_guantity_result)) { //true if the quantity of goods is not enough
                    //php input validate error send to js respons main_angel.js
                    $error_arr = array(); //array for json data
                    $error_arr[0] = 'quantity_error';
                    $error_arr[1] = 'Изинине на складе нет такого количества товара';
                    echo json_encode($error_arr);
                    exit();
                } else {
                    $this->form_validation->set_rules('order_delivery_s', '', 'trim|max_length[200]|prep_for_form|encode_php_tags');
                    $this->form_validation->set_rules('payment_method', '', 'trim|max_length[200]|prep_for_form|encode_php_tags');
                    if ($this->form_validation->run() == true) {
                        $_SESSION['buyer_info']['buyer_delivery_address'] = $_POST['order_delivery_s'];
                        $_SESSION['buyer_info']['payment_method'] = $_POST['payment_method'];
                        //data => array to save data to database
                        $data = array(
                            'name' => $_SESSION['buyer_info']['buyer_name'],
                            'email' => $_SESSION['buyer_info']['buyer_email'],
                            'tell' => $_SESSION['buyer_info']['buyer_phone'],
                            'city' => $_SESSION['buyer_info']['buyer_city'],
                            'address' => $_SESSION['buyer_info']['buyer_address'],
                            'delivery_address' => $_SESSION['buyer_info']['buyer_delivery_address'],
                            'payment_method' => $_SESSION['buyer_info']['payment_method']
                        );
                        $this->load->model('orders_model');     //load model (with database work)
                        $res = $this->orders_model->add_buyer($data); //add buyer info to database and return last insert id
                        $error_arr = array(); //array for json data
                        if ($res !== false) {
                            $error_arr[0] = 'successfully';
                            $data_o = array(
                                'customer' => $_SESSION['buyer_info']['buyer_name'],
                                'comment' => $_SESSION['buyer_info']['buyer_comment'],
                                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                                'id_authorization' => $res,
                            );
                            $res_o = $this->orders_model->add_order($data_o); //add order info to database and return last insert id
                            if ($res_o !== false) {
                                //$res => buyer id
                                //$res_o => order_id
                                $query_result = array(); //push database result into array
                                $order_products = array(
                                    'id_orders' => $res_o //order_id
                                );
                                foreach ($_SESSION['angel_basket'] as $key => $value) { //add product to table 'order_product'
                                    $order_products['id_goods'] = $key;
                                    $order_products['quantity'] = $value['quantity'];
                                    $add_order_product = $this->orders_model->add_order_product($order_products); //check goods quantity in databse (if false return false)
                                    $add_order_product_result[] = $add_order_product;   //push error to array
                                }
                                if (in_array(false, $add_order_product_result)) { //true if the quantity of goods is not enough
                                    //php input validate error send to js respons main_angel.js
                                    $error_arr = array(); //array for json data
                                    $error_arr[0] = 'db_error';
                                    $error_arr[1] = 'Попробуйте еще раз';
                                    //echo json_encode($error_arr);
                                } else {
                                    //remove order product quontity from stock
                                    $this->load->model('product_model');     //load model (with database work)
                                    foreach ($_SESSION['angel_basket'] as $key => $value) {

                                        $product_quantity = $this->product_model->goods_quantity($key); //return product stock quantity
                                        $update_product_quantity = $product_quantity[0]['quantity'] - $value['quantity']; //product quantity what need to update in database
                                        //$update_product_quantity = $value['total_quantity'] - $value['quantity'];  //total_quontity - order_quontity = update data
                                        $stock_update = $this->product_model->update_quantity($key, $update_product_quantity); //add order info to database and return last insert id
                                        $stock_update_result[] = $stock_update;
                                    }
                                    if (in_array(false, $stock_update_result)) {
                                        //php input validate error send to js respons main_angel.js
                                        $error_arr = array(); //array for json data
                                        $error_arr[0] = 'db_error';
                                        $error_arr[1] = 'Попробуйте еще раз';
                                    } else {
                                        //unset($_SESSION['angel_basket']);
                                       // unset($_SESSION['buyer_info']);
                                        $_SESSION['buyer_info']['order_id'] = $res_o;
                                        $error_arr[1] = $res_o; //return order id
                                        //Загружать блок с отображенным номером заказа $res_o на JS
                                        
                                        

                                    }
                                }
                            } else {
                                $error_arr[0] = 'db_error';
                            }
                        } else {
                            $error_arr[0] = 'db_error';
                        }
                        //info send to js respons main_angel.js
                        echo(json_encode($error_arr));
                    } else {
                        //php input validate error send to js respons main_angel.js
                        //$error_arr = array(); //array for json data
                        $error_arr[0] = 'error_input';
                        $error_arr[1] = validation_errors();
                        echo json_encode($error_arr);
                    }
                }
            }
        }
        //pay for order if select PayPal checkbox
        if(isset($_POST['pay_for_order'])){
            $this->load->model('product_model'); //load product model
            $delivery_address = trim(htmlspecialchars(strip_tags($_POST['pay_order_delivery_s'])));
            $pay_payment_method = trim(htmlspecialchars(strip_tags($_POST['pay_payment_method'])));
            if(isset($_SESSION['angel_basket'])){ //check goods quantity
                $goods_guantity_result = array(); //push database result into array
                foreach ($_SESSION['angel_basket'] as $key=>$value) {
                    $check_quantity = $this->product_model->check_quantity($key, $value['quantity']); //check goods quantity in databse (if false return false)
                    $goods_guantity_result[] = $check_quantity;
                }
                if (in_array(false, $goods_guantity_result)) { //true if the quantity of goods is not enough
                    //php input validate error send to js respons main_angel.js
                    $error_arr = array(); //array for json data
                    $error_arr[0] = 'quantity_error';
                    $error_arr[1] = 'Изинине на складе нет такого количества товара';
                    echo json_encode($error_arr);
                } else {
                    //php input validate error send to js respons main_angel.js
                    $error_arr = array(); //array for json data
                    $error_arr[0] = 'quantity_positive';
                    // PayPal curl payment
                    // Curl for recive access token
                    $ch = curl_init();
                    //$cliendId and $secret from my account in https://developer.paypal.com/developer/applications/
                    $clientId = "ASDZgA3nFgVMzjuRpuG0nRvc6_N_TUal2OMo0qaH3XWO22wJVeT7n1COo0QHSgUIm_a_lbiAE7DSU07f";
                    $secret = "EJTcemOiN6W853uRN8ieFTP-MvwYjKnofYgvcaRqCC66QWeTMAxbVM6HZbgCQoo1FdCBlQQ-bDwjOjvM";
                    curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POST, true);

                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
                    $result = curl_exec($ch);
                    if(empty($result))die("Error: No response.");
                    else
                    {
                        $json = json_decode($result);
                        $pp_access_token = $json->access_token; //PayPal Access token for next pay step
                    }
                    curl_close($ch);
                    //data => PayPal pay settings
                    //return_url - url PayPal redirect after payment
                    //Curl for getting paypal pay url for redirect client
                    $pay_amount = $_POST['pay_for_order']; //payment amount
                    $data = '{
                              "intent":"sale",
                              "redirect_urls":{
                                "return_url":"http://localhost/bogdan/my_store_15.04/main/complete_pp",  
                                "cancel_url":"http://localhost/bogdan/my_store_15.04/main/order"
                              },
                              "payer":{
                                "payment_method":"paypal"
                              },
                              "transactions":[
                                {
                                  "amount":{
                                    "total":"'.$pay_amount.'",
                                    "currency":"USD"
                                  },
                                  "description":"This is the payment transaction description."
                                }
                              ]
                            }';
                    $ch1 = curl_init();
                    curl_setopt($ch1, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment"); //PayPal pay url
                    curl_setopt($ch1, CURLOPT_POST, true);
                    curl_setopt($ch1, CURLOPT_HEADER, false);
                    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch1, CURLOPT_POSTFIELDS, $data);

                    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false); //on local server
                    curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, false); //on local server

                    curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
                            "Content-Type: application/json",
                            "Authorization: Bearer ".$pp_access_token, //PayPal access token
                            "Content-length: ".strlen($data))
                    );
                    $result1 = curl_exec($ch1);
                    if(empty($result1))die("Error: No response.");
                    else
                    {
                        //if true create in buyer session variable with delivery address and payment method type
                        $_SESSION['buyer_info']['buyer_delivery_address'] = $delivery_address;
                        $_SESSION['buyer_info']['payment_method'] = $pay_payment_method;
                        $_SESSION['buyer_info']['pay_access_token'] = $pp_access_token; //access token - need in complet order after pay
                        $json1 = json_decode($result1,true);
                        $error_arr[1] = $json1['links'][1]['href'];                     //send redirect link (to PayPal.com) to JS for PayPal payment
                        $_SESSION['buyer_info']['pay_id'] = $json1['id'];               //buyer id - need in complet order after pay
                        echo json_encode($error_arr);
                    }
                    curl_close($ch1);
                }
            }
        } else {
            redirect('','refresh');
        }
    }
    public function complete(){       //complete cash pay order
        if(isset($_SESSION['buyer_info'])){
            //$dara = array to send data in the view
            $data['empty_data'] = 'change in the future';
            $data['b_name'] = $_SESSION['buyer_info']['buyer_name'];
            $data['b_delivery'] = $_SESSION['buyer_info']['buyer_delivery_address'];
            $data['b_order'] = $_SESSION['buyer_info']['order_id'];
            unset($_SESSION['angel_basket']);
            unset($_SESSION['buyer_info']);
            $this->load->view('store_pages/complete',$data);
        } else {
            redirect('', 'refresh');
        }
    }
    public function complete_pp(){   //complete PayPal pay order
        if(isset($_GET['paymentId']) && isset($_GET['token']) && isset($_GET['PayerID'])){ //true -> if valid GET value
            if($_GET['paymentId'] == $_SESSION['buyer_info']['pay_id']) { //if true -> only true reference work
                //$dara = array to send data in the view
                $data['empty_data'] = 'change in the future';
                $curl_data = '{ "payer_id" : "' . $_GET['PayerID'] . '" }'; //send OayerID to PayPal execut payment
                $ch = curl_init();
                $execute_url = 'https://api.sandbox.paypal.com/v1/payments/payment/' . $_GET['paymentId'] . '/execute/'; //PayPal execute pay url
                curl_setopt($ch, CURLOPT_URL, $execute_url); //PayPal execute pay url
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_data);

                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //on local server
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //on local server

                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        "Content-Type: application/json",
                        "Authorization: Bearer " . $_SESSION['buyer_info']['pay_access_token'], //PayPal access token
                        "Content-length: " . strlen($curl_data))
                );
                $result = curl_exec($ch);
                curl_close($ch);
                if (empty($result)) {
                    //if curl respons error
                    $data['user_info'] = '<div class="form_error">The money is not gone from your account, please try again</div>';
                    $this->load->view('store_pages/complete_pp', $data);
                }
                else {
                    $json = json_decode($result, true);
                    if(isset($json['state'])) {
                        if ($json['state'] == 'approved') {
                            //вычитаем все остатки из БД + МЕНЯЕМ СТАТУС ЗАКАЗА НА ОПЛАЧЕНО - Возвращаем номер заказа и передаем в вид
                            //При успешной оплате сохраняем все изменения в базу и убираем остатки + в будущем нужно создавать ордер до оплаты PayPal и если оплата пришла true то изменять статус на Оплачено
                            //data_b => array to save data to database
                            $data_b = array(
                                'name' => $_SESSION['buyer_info']['buyer_name'],
                                'email' => $_SESSION['buyer_info']['buyer_email'],
                                'tell' => $_SESSION['buyer_info']['buyer_phone'],
                                'city' => $_SESSION['buyer_info']['buyer_city'],
                                'address' => $_SESSION['buyer_info']['buyer_address'],
                                'delivery_address' => $_SESSION['buyer_info']['buyer_delivery_address'],
                                'payment_method' => $_SESSION['buyer_info']['payment_method']
                            );
                            $this->load->model('orders_model');     //load model (with database work)
                            $res = $this->orders_model->add_buyer($data_b); //add buyer info to database and return last insert id
                            if ($res !== false) {
                                $data_o = array(
                                    'customer' => $_SESSION['buyer_info']['buyer_name'],
                                    'order_status' => 'payment is confirmed',
                                    'comment' => $_SESSION['buyer_info']['buyer_comment'],
                                    'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                                    'id_authorization' => $res,
                                );
                                $res_o = $this->orders_model->add_order($data_o); //add order info to database and return last insert id
                                if ($res_o !== false) {
                                    //$res => buyer id
                                    //$res_o => order_id
                                    $add_order_product_result = array(); //push database result into array
                                    $order_products = array(
                                        'id_orders' => $res_o //order_id
                                    );
                                    foreach ($_SESSION['angel_basket'] as $key => $value) { //add product to table 'order_product'
                                        $order_products['id_goods'] = $key;
                                        $order_products['quantity'] = $value['quantity'];
                                        $add_order_product = $this->orders_model->add_order_product($order_products); //check goods quantity in databse (if false return false)
                                        $add_order_product_result[] = $add_order_product;   //push error to array
                                    }
                                    if (in_array(false, $add_order_product_result)) { //true if the quantity of goods is not enough
                                        //php input validate error send to js respons main_angel.js
                                        //$error_arr = array(); //array for json data
                                        //$error_arr[0] = 'db_error';
                                        //$error_arr[1] = 'Попробуйте еще раз';
                                        //echo json_encode($error_arr);
                                        //ошибки если возникают нужно с логи сохранять
                                    } else {
                                        //remove order product quantity from stock
                                        $this->load->model('product_model');     //load model (with database work)
                                        foreach ($_SESSION['angel_basket'] as $key => $value) {

                                            $product_quantity = $this->product_model->goods_quantity($key); //return product stock quantity
                                            $update_product_quantity = $product_quantity[0]['quantity'] - $value['quantity']; //product quantity what need to update in database
                                            //$update_product_quantity = $value['total_quantity'] - $value['quantity'];  //total_quontity - order_quontity = update data
                                            $stock_update = $this->product_model->update_quantity($key, $update_product_quantity); //add order info to database and return last insert id
                                            $stock_update_result[] = $stock_update;
                                        }
                                        if (in_array(false, $stock_update_result)) {
                                            // $error_arr = array(); //array for json data
                                            // $error_arr[0] = 'db_error';
                                            // $error_arr[1] = 'Попробуйте еще раз';
                                            //Если false есть в массиве значит при изменении количества возникла ошибка и нужно добавить ее в ЛОГИ
                                        } else {

                                            //unset($_SESSION['angel_basket']);
                                            // unset($_SESSION['buyer_info']);
                                            //Нужно давить в логи удачно созданого и оплаченего ордера
                                            $data['b_name'] = $_SESSION['buyer_info']['buyer_name']; //Buyer name send to view
                                            $data['b_order'] = $res_o;                               //Order id send to view
                                        }
                                    }
                                } else {
                                    //$error_arr[0] = 'db_error';
                                    //Нада записывать ошибку в файл
                                }
                            } else {
                                // $error_arr[0] = 'db_error';
                                //Нада записывать ошибку в файл
                            }
                            //If the order is successfully created and made changes to the database
                            $this->load->view('store_pages/complete_pp', $data);
                            if (isset($_SESSION['angel_basket']) && isset($_SESSION['buyer_info'])) {
                                unset($_SESSION['angel_basket']);
                                unset($_SESSION['buyer_info']);
                            }
                        } else {
                            //if PayPay pay confirmation == false
                            $data['user_info'] = '<div class="form_error">You have not paid for the order, please try again</div>';
                            $this->load->view('store_pages/complete_pp', $data);
                        }
                    }
                    //if PayPay pay confirmation == false
                    $data['user_info'] = '<div class="form_error">You have not paid for the order, please try again</div>';
                    $this->load->view('store_pages/complete_pp', $data);
                }
            } else {
                redirect('', 'refresh');
            }
        } else {
            redirect('', 'refresh');
        }
    }
    public function registration_user() {        //registr user
        if (isset($_POST['u-email'])) {
            $this->load->model('users_model'); //load model
            $this->load->model('rules_model'); //load model rules
            $this->form_validation->set_rules($this->rules_model->reg_rules);
            $check = $this->form_validation->run();
            if ($check == true) {
                $email = $this->input->post('u-email');
                $data1 = $this->users_model->check_email($email); //check email
                if (!empty($data1)) {
                    $this->session->set_flashdata('message', 'Email already busy');
                    redirect('', 'refresh');
                }
                $add['name'] = $this->input->post('u-name');
                $add['email'] = $this->input->post('u-email');
                $add['pass'] = $this->input->post('u-pass');
                $add['tell'] = $this->input->post('u-phone');
                $add['city'] = $this->input->post('u-city');
                $add['role'] = (int)1;
                $this->db->insert('authorization', $add);

                $this->session->set_flashdata('message', 'Congratulations you have successfully registered');
                redirect('', 'refresh');

            } else {
                $this->session->set_flashdata('message', validation_errors());
                redirect('', 'refresh');
            }
        } else {
            //redirect('Market/cars', 'refresh');
        }
    }
    public function authorization_user() {        //registr user
        if (isset($_POST['s-email'])) {
            $this->load->model('rules_model'); //load model
            $this->form_validation->set_rules($this->rules_model->login_rules); // load model for input validation
            $check = $this->form_validation->run();
            if ($check == true) {      //if validation == true
                $email = $_POST['s-email'];
                $pass = md5($_POST['s-pass']);
                $this->load->model('users_model');
                $data = $this->users_model->check_login_in($email, $pass);
                if (!empty($data)) {
                    $_SESSION['marker']['user'] = $data[0];                         //user data put into session
                    $this->session->set_flashdata('message', 'You have successfully logged');
                    redirect('', 'refresh');
                } else {
                    $this->session->set_flashdata('message', 'Invalid username or password');
                    redirect('', 'refresh');
                }
            }
        } else {
            redirect('', 'refresh');
        }
    }
    public function product_view () { //product view
        if(isset($_POST['product_view'])){
            //echo $_POST['product_view']; //response to ajax main_angel.js
            //$product_id = (int)$_POST['product_view'];
            $this->load->model('product_model');
            $data = $this->product_model->product_view($_POST['product_view']);
            $data = json_encode($data);
            echo $data;
            //echo 'sdfsdf';
        }
    }
    public function logout () {  //log out user
        if (isset($_POST['s-log-out'])) {
            if($_POST['s-log-out'] == $_SESSION['marker']['user']['id']){
                $this->session->set_flashdata('message', 'You have successfully log out');
                $this->session->unset_userdata('marker'); // unset log in user data
                redirect('', 'refresh');
            } else {
                $this->session->set_flashdata('message', 'Please try again');
                redirect('', 'refresh');
            }
        } else {
            redirect('', 'refresh');
        }
    }
}