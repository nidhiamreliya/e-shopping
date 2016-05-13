<?php
class User_products extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    //Show product list to users
	public function index($slug = NULL)
	{
		if($slug)
		{
			$category  = array('slug' => $slug);
			$category  = $this->user_model->get_fields('category', array('category_id'), $category);
			
			$condition = array('category_id' => $category['category_id'], 'visible' => 1);
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