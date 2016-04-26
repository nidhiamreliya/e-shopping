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

	public function order_details($order_no)
	{
		$condition = array('order_no' => $order_no);
		$data['order_details'] = $this->admin_model->order_details('order_details', $condition);
		$data['order_no'] = $order_no;
		$this->admin_views('admin/order_details', $data);
	}
}
?>