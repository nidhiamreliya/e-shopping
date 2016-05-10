<?php
class Admin_users extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('privilege') != 2) redirect('user_control/logout');
    }

    //Show login form
	public function index()
	{
		$data['users'] = $this->admin_model->get_rows('users', array('privilege' => 1));
		
		$this->admin_views('admin/users', $data);
	}

	//Show edit product
	public function edit_user($user_id)
	{
		$condition = array('user_id' => $user_id);
		$data['user'] = $this->admin_model->getwhere_data('users', $condition);
		
		$this->admin_views('admin/edit_user', $data);
	}

	public function delete_user($user_id)
	{
		$data = array('user_id' => $user_id);
		$result = $this->admin_model->delete_row('users', $data);
		if($result)
		{
			$this->session->set_flashdata('successful', 'Your data deleted successfully.');
		}
		redirect('admin_users');
	}


	public function update_user()
	{
		if($this->input->post('password'))
		{
			$run = 'edit_user';
		}
		else
		{
			$run = 'update_user';
		}
		if($this->form_validation->run($run) == FALSE)
		{
			$this->edit_user($this->input->post('user_id'));
		}
		else
		{
				$data = array(
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'email_id' => $this->input->post('email_id'),
						'contect_no' => $this->input->post('contect_no'),
						'address' => $this->input->post('address'),
						'city' => $this->input->post('city'),
						'zip_code' => $this->input->post('zip_code'),
						'state' => $this->input->post('state'),
						'country' => $this->input->post('country')
					);
				if($this->input->post('password'))
				{
					$password = create_password($this->input->post('password'));
					$data['password'] = $password;
				}
				$condition = array(
					'user_id' => $this->input->post('user_id'),
				);
				$result = $this->admin_model->update_row('users', $data, $condition);
				$user_id = $this->input->post('user_id');
				if($result)
				{
					$this->session->set_flashdata('successful', 'Your data inserted successfully.');
					redirect('admin_users/edit_user/'.$user_id);
				}
			
		}
	}

	public function email_check($email)
	{
		$result = $this->admin_model->check_duplicate($this->input->post('user_id'), $email);

		if ($result)
		{
			$this->form_validation->set_message('email_check', 'This email id already exist');
			return FALSE;
		}
		else
		{
			return true;
		}
	}

}
?>