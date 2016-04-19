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

	//Show edit product
	public function edit_user($user_id)
	{
		$condition = array('user_id' => $user_id);
		$data['user'] = $this->admin_model->getwhere_data('users', $condition);
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/side_menu');
		$this->load->view('admin/edit_user', $data);
		$this->load->view('admin/includes/footer');
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


	public function insert_user()
	{
		if ($this->form_validation->run() == FALSE )
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
}
?>