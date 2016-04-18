<?php
class Admin_users extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    //Show login form
	public function index()
	{
		$data['users'] = $this->admin_model->get_data('users');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/side_menu');
		$this->load->view('admin/users', $data);
		$this->load->view('admin/includes/footer');
	}
}
?>