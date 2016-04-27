<?php
class Admin_orders extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('privilege') != 2) redirect('user_control/logout');
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

	public function mark_as($status,$order_no)
	{
		$condition = array('order_no' => $order_no);
		$data = array(
			'delivery_date'=> date('Y-m-d'),
			'status'=> $status
		);
		$result = $this->admin_model->update_row('order', $data, $condition);
		redirect('admin_orders');
	}
}
?>