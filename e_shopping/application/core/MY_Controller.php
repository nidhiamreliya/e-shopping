<?php
class MY_Controller extends CI_Controller
{
	public function admin_views($view_name, $data) 
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/side_menu');
		$this->load->view($view_name, $data);
		$this->load->view('admin/includes/footer');
	}

	public function user_views($view_name, $data) 
	{
		$header['category'] = $this->user_model->get_rows('category', array('status' => 1));
		$this->load->view('users/includes/header', $header);
		$this->load->view($view_name, $data);
		$this->load->view('users/includes/footer');
	}
}
?>