<?php
class MY_admin_controller extends CI_Controller
{
	public function views($view_name, $data) 
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/side_menu');
		$this->load->view($view_name, $data);
		$this->load->view('admin/includes/footer');
	}
}
?>