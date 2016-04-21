<?php
class User_products extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    //Show login form
	public function index($category)
	{
		$condition = array('category_id' => $category);
		$data['products'] = $this->admin_model->get_rows('product', $condition);
		$this->user_views('users/products', $data);
	}
}