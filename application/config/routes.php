<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main/angel';  //shop main page
$route['basket'] = 'main/basket';             //shop basket controller
$route['order'] = 'main/order';               //basket order controller
$route['complete'] = 'main/complete';         //order complete controller
$toute['complete_pp'] = 'main/complete_pp';   //order PayPal pay complete controller
$route['services'] = 'goods/services';        //shop service
$route['goods'] = 'order/goods';              //shop product list
$route['contacts'] = 'contacts/first';        //shop contacts
$route['author'] = 'author/login';            //authorization admin form
$route['gotoadmin']= 'admin/panel';           //admin panel
$route['categories'] = 'categories/main';     //categories
$route['categoriesedit'] = 'categories/edit'; //edit categories
$route['users'] = 'users/data';               //all users information
$route['usersedit'] = 'users/edit';           //edit users data
$route['usersadd'] = 'users/add';             //add new user
$route['usersdelete'] = 'users/delete';       //delete user data
$route['news'] = 'news/data';                 //all news information
$route['newsadd'] = 'news/add';               //add news
$route['newsedit'] = 'news/edit';             //edit news
$route['newsdelete'] = 'news/delete';         //delete news
$route['salesorders'] = 'sales/orders';       //sales/orders
$route['editorders'] = 'sales/edit';          //edit orders
$route['deleteorders'] = 'sales/delete';      //delete orders
$route['gdsappend'] = 'catalog/append';       //add new goods
$route['allproduct'] = 'catalog/showall';     //show all product
$route['productedit'] = 'catalog/editproduct';//edit product data
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
