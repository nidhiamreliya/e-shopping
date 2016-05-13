<?php
class Admin_users extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('privilege') != 2) redirect('user_control/logout');
    }

    //Show users list
	public function index()
	{
		$data['users'] 	= $this->user_model->get_rows('users', array('privilege' => 1));
		
		$this->admin_views('admin/users', $data);
	}

	//Show user information for edit
	public function edit_user($slug)
	{
		$user = array('slug' => $slug);
		$user = $this->user_model->get_fields('users', array('user_id'), $user);
			
		$data['user'] = $this->user_model->getwhere_data('users', $user);
		
		$this->admin_views('admin/edit_user', $data);
	}

	//Delete user from list
	public function delete_user($user_id)
	{
		$data 	= array('user_id' => $user_id);
		$result = $this->user_model->delete_row('users', $data);
		if($result)
		{
			$this->session->set_flashdata('successful', 'Your data deleted successfully.');
		}
		redirect('users');
	}

	//Update user data
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
			$this->edit_user($this->input->post('slug'));
		}
		else
		{
			$slug = url_title($this->input->post('first_name').'-'.$this->input->post('last_name').'-'.$this->input->post('user_id'), 'dash', TRUE);
			$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'email_id' 	 => $this->input->post('email_id'),
					'contact_no' => $this->input->post('contact_no'),
					'address' 	 => $this->input->post('address'),
					'city' 		 => $this->input->post('city'),
					'zip_code' 	 => $this->input->post('zip_code'),
					'state' 	 => $this->input->post('state'),
					'country' 	 => $this->input->post('country'),
					'slug' 	 	 => $slug
				);
			if($this->input->post('password'))
			{
				$password 		  = create_password($this->input->post('password'));
				$data['password'] = $password;
			}
			$condition 	= array(
						'user_id' => $this->input->post('user_id'),
					);

			$result		= $this->user_model->update_row('users', $data, $condition);
			if($result)
			{
				$this->session->set_flashdata('successful', 'Your data inserted successfully.');
				redirect('user/edit/'.$slug);
			}
		}
	}

	//Check email id is already exist or not
	public function email_check($email)
	{
		$result = $this->user_model->check_duplicate($this->input->post('user_id'), $email);

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