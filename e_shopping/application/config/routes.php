<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] 	= "user_control/home";
$route['product/(:any)'] 	 	= "user_products/index/$1";
$route['login'] 			 	= "user_control";
$route['login/error'] 		 	= "user_control/check_user";
$route['home']				   	= "user_control/home";
$route['home/(:any)']			= "user_control/home/$1";
$route['registration'] 		   	= "user_control/registration";
$route['product']              	= "user_products/index";
$route['view/(:any)'] 			= "user_control/product_details/$1";
$route['add_cart'] 				= "user_control/add_to_cart";
$route['cart'] 					= "cart/cart_details";
$route['cart/update'] 			= "cart/update_cart";
$route['remove/(:num)'] 		= "cart/remove/$1";
$route['checkout'] 				= "order/checkout";
$route['order'] 				= "order/place_order";
$route['order/(:any)'] 			= "order/order_details/$1";
$route['user/orders'] 			= "order/order_details";
$route['forgot_password'] 		= "user_control/forgot_psw";
$route['forgot_password/error'] = "user_control/check_email";
$route['password/change/(:any)'] = "user_control/change_password/$1";

$route['admin_home'] 	 		= "admin_control";
$route['categorys'] 			= "admin_categorys";
$route['products'] 		 		= "admin_products";
$route['orders']				= "admin_orders";
$route['users']				   	= "admin_users";
$route['change_password']		= "admin_control/change_password";
$route['products/(:any)']		= "admin_products/index/$1";
$route['category/edit/(:any)']	= "admin_categorys/edit_category/$1";
$route['category']				= "admin_categorys/edit_category";
$route['admin/product/(:any)']	= "admin_products/edit_products/$1";
$route['admin/product']			= "admin_products/edit_products";
$route['order_details/(:any)']	= "admin_orders/order_details/$1";
$route['user/edit/(:any)']		= "admin_users/edit_user/$1";

$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */