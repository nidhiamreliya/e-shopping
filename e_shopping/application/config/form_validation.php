<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    		'login/check_data' => array(
							array(
							    'field' => 'user_name',
							    'label' => 'User name',
							    'rules' => 'trim|required|xss_clean'
							),
							array(
							    'field' => 'password',
							    'label' => 'Password',
							    'rules' => 'trim|required|xss_clean'
							)
		    ),
		    'admin_products/insert_product' => array(
							array(
							    'field' => 'product_name',
							    'label' => 'Product name',
							    'rules' => 'trim|required|xss_clean'
							),
							array(
							    'field' => 'description',
							    'label' => 'description',
							    'rules' => 'trim|required|xss_clean'
							),
							array(
							    'field' => 'price',
							    'label' => 'price',
							    'rules' => 'trim|required|numeric|xss_clean'
							)
		    ),
		    'admin_categorys/edit_category' => array(
							array(
							    'field' => 'category_name',
							    'label' => 'category name',
							    'rules' => 'trim|required|xss_clean'
							)
			)
);
?>