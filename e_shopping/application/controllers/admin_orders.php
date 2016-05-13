<?php
class Admin_orders extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('privilege') != 2) redirect('user_control/logout');
    }

    //Show order list
	public function index()
	{
		$data['orders'] = $this->user_model->get_data('order');
		
		$this->admin_views('admin/orders', $data);
	}

	//Show details of order
	public function order_details($order_no = null)
	{
		$data['order_details'] 	= $this->user_model->order_details($order_no);
		$data['order_no'] 		= $order_no;
		$this->admin_views('admin/order_details', $data);
	}

	//Change status of order
	public function mark_as($status,$order_no)
	{
		$condition 	= array('order_no' => $order_no);
		$data 		= array(
					'delivery_date'=> date('Y-m-d'),
					'status'=> $status
			);
		$result 	= $this->user_model->update_row('order', $data, $condition);
		redirect('orders');
	}
}
?>