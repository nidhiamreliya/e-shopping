<?php
class Admin_change_psw extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    //Show login form
	public function index()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/side_menu');
		$this->load->view('admin/change_psw');
		$this->load->view('admin/includes/footer');
	}
}
?>