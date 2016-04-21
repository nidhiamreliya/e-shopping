<?php
class Admin_orders extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    //Show login form
	public function index()
	{
		$data['orders'] = $this->admin_model->get_data('order');
		
		$this->admin_views('admin/orders', $data);
	}
}
?>