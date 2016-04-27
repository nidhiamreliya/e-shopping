<?php
class Admin_categorys extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('privilege') != 2) redirect('user_control/logout');
    }

    //Show login form
	public function index()
	{
		$data['category'] = $this->admin_model->get_data('category');
		$this->admin_views('admin/category_list', $data);
	}
	public function edit_category($category = NULL)
	{

		if($category)
		{
			$condition = array('category_id' => $category);
			$data['category'] = $this->admin_model->getwhere_data('category', $condition);
		}
		else
		{
			$data['category'] = null;
		}
		
		$this->admin_views('admin/edit_category', $data);
	}
	public function insert_category()
	{

		if ($this->form_validation->run() == FALSE )
		{
			$this->edit_category();
		}
		else
		{
			if($this->input->post('category_id') != null)
			{
				$data = array(
					'category_name' => $this->input->post('category_name'),
				);
				$condition = array(
					'category_id' => $this->input->post('category_id'),
				);
				$result = $this->admin_model->update_row('category', $data, $condition);
			}
			else
			{
				$data = array(
						'category_name' => $this->input->post('category_name'),
					);
				$result = $this->admin_model->insert_row('category', $data);
			}
			if($result)
			{
				$this->session->set_flashdata('successful', 'Your data inserted successfully.');
				redirect('admin_categorys/admin_categorys');
			}
			
		}
	}
	public function delete_category($category_id)
	{
		$data = array('category_id' => $category_id);
		$result = $this->admin_model->delete_row('category', $data);
		if($result)
		{
			$this->session->set_flashdata('successful', 'Your data deleted successfully.');
		}
		redirect('admin_categorys');
	}
}
?>