<?php
class Admin_control extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('privilege') != 2) redirect('user_control/logout');
    }
    
    //Show home page of admin
	public function index()
	{
		$this->admin_views('admin/home', null);
	}
	
	//Show change pasword form
	public function change_password()
	{
		$this->admin_views('admin/change_password', null);
	}

	//Edit password of admin
	public function edit_password()
	{
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

			$result = $this->user_model->update_row('users', $data, $condition);
			if($result)
			{
				$this->session->set_flashdata('successful', 'Your data inserted successfully.');
				redirect('admin_control/change_password');
			}			
		}

		$this->admin_views('admin/change_password', null);
	}

	//Check password to change
	public function password_check($password)
	{
		$password 	= create_password($password);
		$user_id	= $this->session->userdata('user_id');
		$result		= $this->user_model->get_fields('users', array('password'), array('user_id' => $user_id));
		
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