<?php
class Admin_orders extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    //Show login form
	public function index()
	{
		$data['orders'] = $this->admin_model->get_data('order');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/side_menu');
		$this->load->view('admin/orders', $data);
		$this->load->view('admin/includes/footer');
	}
}
?>