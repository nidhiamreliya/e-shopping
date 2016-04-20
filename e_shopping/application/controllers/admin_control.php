<?php
class Admin_control extends CI_Controller
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
		$this->load->view('admin/home');
		$this->load->view('admin/includes/footer');
	}
	
	//Show login form
	public function change_password()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/side_menu');
		$this->load->view('admin/change_password');
		$this->load->view('admin/includes/footer');
	}

	//Show login form
	public function edit_password()
	{
		echo "head";
		if ($this->form_validation->run() == FALSE )
		{
			$this->change_password();
		}
		else
		{
			$password = create_password($this->input->post('password'));
			$data = array(
					'password' => $password
				);
			$condition = array(
				'user_id' => $this->session->userdata('user_id')
			);
			$result = $this->admin_model->update_row('users', $data, $condition);
			if($result)
			{
				$this->session->set_flashdata('successful', 'Your data inserted successfully.');
				redirect('admin_control/change_password');
			}			
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/side_menu');
		$this->load->view('admin/change_password');
		$this->load->view('admin/includes/footer');
	}

	public function password_check($password)
	{
		echo "callback";
		$password = create_password($password);
		$user_id = $this->session->userdata('user_id');
		$result = $this->admin_model->get_fields('users', array('password'), array('user_id' => $user_id));
		
		if ($result['password'] == $password)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('password_check', 'old password not match');
			return FALSE;
		}
	}
}
?>