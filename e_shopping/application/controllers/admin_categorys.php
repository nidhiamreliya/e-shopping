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
		$data['category'] = $this->user_model->get_data('category');
		$this->admin_views('admin/category_list', $data);
	}
	public function edit_category($category = NULL)
	{
		if($category)
		{
			$condition = array('category_id' => $category);
			$data['category'] = $this->user_model->getwhere_data('category', $condition);
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
					'status'		=> $this->input->post('visible')
				);
				$condition = array(
					'category_id' => $this->input->post('category_id'),
				);

				$result = $this->user_model->update_row('category', $data, $condition);
				$result = $this->user_model->update_row('product', array('visible'=>$this->input->post('visible')), $condition);
			}
			else
			{
				$data = array(
						'category_name' => $this->input->post('category_name'),
						'status'		=> $this->input->post('visible')
					);
				$result = $this->user_model->insert_row('category', $data);
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
		$data 		= array('category_id' => $category_id);
		$is_ordered	= $this->user_model->get_category($category_id);

		if($is_ordered)
		{
			$data   = array('category_id' => $category_id);
			$result = $this->user_model->delete_row('category', $data);
			if($result)
			{
				$this->session->set_flashdata('successful', 'Your data deleted successfully.');
			}
		}
		else
		{
			$this->session->set_flashdata('successful', 'You can not delete this category. Set it as not visible for user');
		}
		redirect('admin_categorys');
	}
}
?>