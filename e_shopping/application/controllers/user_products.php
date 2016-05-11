<?php
class User_products extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    //Show login form
	public function index($category = NULL)
	{
		if($category)
		{
			$condition = array('category_id' => $category, 'visible' => 1);
			$data['products'] = $this->user_model->get_rows('product', $condition);
			$data['category'] = $this->user_model->get_rows('category', array('status' => 1));
			$this->user_views('users/products', $data);
		}
		else
		{
			$condition = array('visible' => 1);
			$data['products'] = $this->user_model->get_rows('product', $condition);
			$data['category'] = $this->user_model->get_rows('category', array('status' => 1));
			$this->user_views('users/products', $data);
		}
	}
}