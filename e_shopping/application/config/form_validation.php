<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    		'user_control/check_user' => array(
							array(
							    'field' => 'email_id',
							    'label' => 'user name',
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
							    'rules' => 'trim|required|xss_clean|callback_duplicate_check'
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
							),
							array(
							    'field' => 'visible',
							    'label' => 'visible',
							    'rules' => 'trim|required|xss_clean'
							)
		    ),
		    'admin_categorys/insert_category' => array(
							array(
							    'field' => 'category_name',
							    'label' => 'category name',
							    'rules' => 'trim|required|xss_clean|callback_duplicate_check'
							),
							array(
							    'field' => 'visible',
							    'label' => 'visible',
							    'rules' => 'trim|required|xss_clean'
							)
			),
			'admin_control/edit_password' => array(
							array(
							    'field' => 'old_password',
							    'label' => 'Old password',
							    'rules' => 'trim|required|xss_clean|callback_password_check'
							),
							array(
							    'field' => 'password',
							    'label' => 'password',
							    'rules' => 'trim|required|min_length[6]|xss_clean'
							),
							array(
							    'field' => 'confirm_password',
							    'label' => 'confirm password',
							    'rules' => 'trim|required|matches[password]|xss_clean'
							)
		    ),
		    'check_qty' => array(
		    				array(
							    'field' => 'quantity',
							    'label' => 'quantity',
							    'rules' => 'trim|required|greater_than[0]|less_than[11]'
							)
		    ),
		    'order/place_order' => array(
		    				array(
							    'field' => 'sh_address',
							    'label' => 'Address',
							    'rules' => 'required|xss_clean'
							),
							array(
							    'field' => 'sh_city',
							    'label' => 'City',
							    'rules' => 'required|xss_clean'
							),
							array(
							    'field' => 'sh_zipcode',
							    'label' => 'Zip code',
							    'rules' => 'required|exact_length[6]|numeric|xss_clean'
							),
							array(
							    'field' => 'sh_state',
							    'label' => 'State',
							    'rules' => 'required|xss_clean'
							),
							array(
							    'field' => 'sh_country',
							    'label' => 'Country',
							    'rules' => 'required|xss_clean'
							)
			),
			'check_user' => array(
							array(
							    'field' => 'first_name',
							    'label' => 'First name',
							    'rules' => 'required|alpha|xss_clean'
							),
							array(
							    'field' => 'last_name',
							    'label' => 'Last name',
							    'rules' => 'required|alpha|xss_clean'
							),
							array(
							    'field' => 'contact_no',
							    'label' => 'contact_no',
							    'rules' => 'required|xss_clean|exact_length[10]'
							),
							array(
							    'field' => 'address',
							    'label' => 'Address',
							    'rules' => 'required|xss_clean|strip_tags|trim'
							),
							array(
							    'field' => 'city',
							    'label' => 'City',
							    'rules' => 'required|xss_clean'
							),
							array(
							    'field' => 'zip_code',
							    'label' => 'Zip code',
							    'rules' => 'required|exact_length[6]|numeric|xss_clean'
							),
							array(
							    'field' => 'state',
							    'label' => 'State',
							    'rules' => 'required|xss_clean'
							),
							array(
							    'field' => 'country',
							    'label' => 'Country',
							    'rules' => 'required|xss_clean'
							)

		    ),
			'register' =>array(
							array(
							    'field' => 'email_id',
							    'label' => 'email_id',
							    'rules' => 'required|valid_email|is_unique[users.email_id]|xss_clean'
							)
			),
			'password' =>array(
							array(
							    'field' => 'password',
							    'label' => 'Password',
							    'rules' => 'required|min_length[6]|xss_clean'
							),
							array(
							    'field' => 'confirm_password',
							    'label' => 'Confirm password',
							    'rules' => 'required|matches[password]|xss_clean'
							)
			),
			'check_duplicate' =>array(
							array(
							    'field' => 'email_id',
							    'label' => 'email_id',
							    'rules' => 'trim|required|valid_email|xss_clean|callback_email_check'
							)
			)
);
$config['registeration'] = array_merge($config['check_user'], $config['register'], $config['password']);
$config['update_user'] 	 = array_merge($config['check_user'], $config['check_duplicate']);
$config['edit_user'] 	 = array_merge($config['check_user'], $config['check_duplicate'], $config['password']);
?>