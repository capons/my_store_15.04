<?php
if( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Rules_model extends CI_Model
{
    public $admin_author_rules = array(  // validate admin login
        array(
            'field' => 'admin_email',
            'label' => '',
            'rules' => 'required|trim|prep_for_form|encode_php_tags|valid_email|max_length[30]'
        ),
        array(
            'field' => 'admin_pass',
            'label' => '',
            'rules' => 'required|min_length[5]|max_length[20]|trim|prep_for_form|encode_php_tags'
        )
    );
    public $users_edit_data = array(    //validate user data edit
        array(
            'field' => 'modal_edit_user_id',
            'label' => '',
            'rules' => 'trim'
        ),
        array(
            'field' => 'modal_edit_user_name',
            'label' => 'User name',
            'rules' => 'required|max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'modal_edit_user_pass',
            'label' => 'Password',
            'rules' => 'required|max_length[50]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'modal_edit_user_email',
            'label' => 'Email',
            'rules' => 'required|max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'modal_edit_user_tell',
            'label' => 'Phone',
            'rules' => 'required|max_length[30]|trim|prep_for_form|encode_php_tags|integer'
        ),
        array(
            'field' => 'modal_edit_user_role',
            'label' => 'Role',
            'rules' => 'required|integer'
        )
    );
    public $users_add_data = array(     //validate add user data
        array(
            'field' => 'modal_add_user_name',
            'label' => 'User name',
            'rules' => 'required|max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'modal_add_user_pass',
            'label' => 'Password',
            'rules' => 'required|max_length[50]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'modal_add_user_email',
            'label' => 'Email',
            'rules' => 'required|max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'modal_add_user_tell',
            'label' => 'Phone',
            'rules' => 'required|max_length[30]|trim|prep_for_form|encode_php_tags|integer'
        ),
        array(
            'field' => 'modal_add_user_role',
            'label' => 'Role',
            'rules' => ''
        )
    );
    public $news_add_data = array(     //validate add news data
        array(
            'field' => 'modal_news_title',
            'label' => 'Title',
            'rules' => 'required|max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'modal_news_desc',
            'label' => 'Description',
            'rules' => 'required|max_length[255]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'modal_news_keywords',
            'label' => 'Some keywords',
            'rules' => 'required|max_length[100]|trim|prep_for_form|encode_php_tags'
        )
    );
    public $news_edit_data = array(
        array(
            'field' => 'modal_news_edit_title',
            'label' => 'Title',
            'rules' => 'required|max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'modal_news_edit_desc',
            'label' => 'Description',
            'rules' => 'required|max_length[255]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'modal_news_edit_keywords',
            'label' => 'Some keywords',
            'rules' => 'required|max_length[100]|trim|prep_for_form|encode_php_tags'
        )
    );
    public $filter_orders_data = array(     //validate filter orders data
        array(
            'field' => 'order_id',
            'label' => 'Order id',
            'rules' => 'max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'customer',
            'label' => 'Customer',
            'rules' => 'max_length[50]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'order_status',
            'label' => 'Order status',
            'rules' => 'max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'filter_total',
            'label' => 'Total',
            'rules' => 'max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'date_add',
            'label' => 'Date Added',
            'rules' => 'max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'date_modify',
            'label' => 'Date Modified',
            'rules' => 'max_length[30]|trim|prep_for_form|encode_php_tags'
        )
    );
    public $append_goods = array(     //validate add new goods data
        array(
            'field' => 'new_goods_model',
            'label' => 'Name',
            'rules' => 'required|max_length[40]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'new_goods_model_model',
            'label' => 'Model',
            'rules' => 'required|max_length[40]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'new_goods_desc',
            'label' => 'Description',
            'rules' => 'required|max_length[100]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'new_goods_cat',
            'label' => 'Category',
            'rules' => 'required|max_length[100]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'new_goods_quantity',
            'label' => 'Goods quantity',
            'rules' => 'required|max_length[200]|trim|is_natural|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'new_goods_price',
            'label' => 'Price',
            'rules' => 'required|max_length[50]|trim|numeric|prep_for_form|encode_php_tags'
        )
    );
    public $filter_product_data = array ( //validate filter product
        array(
            'field' => 'ad_product_name',
            'label' => 'Product name',
            'rules' => 'max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'ad_product_model',
            'label' => 'Model',
            'rules' => 'max_length[50]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'ad_product_price',
            'label' => 'Price',
            'rules' => 'max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'ad_product_quantity',
            'label' => 'Quantity',
            'rules' => 'max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'ad_product_cat',
            'label' => 'Category',
            'rules' => 'max_length[50]|trim|prep_for_form|encode_php_tags'
        )
    );
    public $product_edit_data = array ( //validate edit product data
        array(
            'field' => 'edit_product_name',
            'label' => 'Name',
            'rules' => 'required|max_length[50]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'edit_product_model',
            'label' => 'Model',
            'rules' => 'required|max_length[50]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'edit_product_desc',
            'label' => 'Description',
            'rules' => 'required|max_length[100]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'edit_product_price',
            'label' => 'Price',
            'rules' => 'required|numeric|max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'edit_product_quantity',
            'label' => 'Quantity',
            'rules' => 'required|is_natural_no_zero|max_length[50]|trim|prep_for_form|encode_php_tags'
        )
    );
    public $add_category = array (
        array(
            'field' => 'new_category_name',
            'label' => 'Category name',
            'rules' => 'required|max_length[100]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'parent_category',
            'label' => 'Parent category',
            'rules' => 'numeric|max_length[100]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'new_category_desc',
            'label' => 'Category description',
            'rules' => 'required|max_length[100]|trim|prep_for_form|encode_php_tags'
        )
    );
    public $reg_rules = array( //reg rules
        array(
            'field' => 'u-phone',
            'label' => 'Phone',
            'rules' => 'required|max_length[40]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'u-name',
            'label' => 'Name',
            'rules' => 'required|max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'u-city',
            'label' => 'City',
            'rules' => 'required|max_length[30]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'u-email',
            'label' => 'Email',
            'rules' => 'required|max_length[30]|trim|valid_email|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'u-pass',
            'label' => 'Password',
            'rules' => 'required|max_length[30]|trim|prep_for_form|encode_php_tags|md5'
        ),
    );
    public $login_rules = array(               //login user data validation
        array(
            'field' => 's-email',
            'label' => 'Email',
            'rules' => 'required|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 's-pass',
            'label' => 'Password',
            'rules' => 'required|trim|prep_for_form|encode_php_tags'
        )
    );

}