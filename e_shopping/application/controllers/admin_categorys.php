<?php
class Admin_categorys extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    //Show login form
	public function index()
	{
		$data['category'] = $this->admin_model->get_data('category');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/side_menu');
		$this->load->view('admin/category_list', $data);
		$this->load->view('admin/includes/footer');
	}
	public function edit_category($category)
	{

		if($category != 0)
		{
			$condition = array('category_id' => $category);
			$data['category'] = $this->admin_model->getwhere_data('category', $condition);
		}
		else
		{
			$data['category'] = null;
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/side_menu');
		$this->load->view('admin/edit_category', $data);
		$this->load->view('admin/includes/footer');
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