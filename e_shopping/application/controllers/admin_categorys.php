<?php
class Admin_categorys extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('privilege') != 2) redirect('user_control/logout');
    }

    //Show all category list
	public function index()
	{
		$data['category'] = $this->user_model->get_data('category');
		$this->admin_views('admin/category_list', $data);
	}

	//Show category's details to edit
	public function edit_category($slug = NULL)
	{
		if($slug)
		{
			$category 	 		= array('slug' => $slug);
			$category	 		= $this->user_model->get_fields('category', array('category_id'), $category);
			
			$data['category'] 	= $this->user_model->getwhere_data('category', $category);
		}
		else
		{
			$data['category'] 	= null;
		}
		
		$this->admin_views('admin/edit_category', $data);
	}

	//Insert new category or update existing category
	public function insert_category()
	{

		if ($this->form_validation->run() == FALSE )
		{
			$this->edit_category();
		}
		else
		{
			$slug 	= url_title($this->input->post('category_name'), 'dash', TRUE);
			$data 	= array(
					'category_name' => $this->input->post('category_name'),
					'status'		=> $this->input->post('visible'),
					'slug'			=> $slug
			);
			if($this->input->post('category_id') != null)
			{
				$condition = array(
						'category_id'   => $this->input->post('category_id'),
				);

				$result = $this->user_model->update_row('category', $data, $condition);
				$result = $this->user_model->update_row('product', array('visible'=>$this->input->post('visible')), $condition);
			}
			else
			{
				$result = $this->user_model->insert_row('category', $data);
			}
			if($result)
			{
				$this->session->set_flashdata('successful', 'Your data inserted successfully.');
				redirect('categorys');
			}
			
		}
	}

	//Check if category name already exist 
	public function duplicate_check($category_name)
	{
		if($this->input->post('category_id') != null)
		{
			$is_exist		= $this->user_model->cat_duplicate($category_name, $this->input->post('category_id'));
		}
		else
		{
			$is_exist		= $this->user_model->cat_duplicate($category_name);
		}
		if($is_exist)
		{
			$this->form_validation->set_message('duplicate_check', 'This category name already exist');
			return FALSE;
		}
		else
		{
			return True;
		}
	}

	//Romove category
	public function delete_category($slug)
	{
		$category 		= array('slug' => $slug);
		$category	= $this->user_model->get_fields('category', array('category_id'), $category);

		
		$is_ordered		= $this->user_model->get_category($category['category_id']);

		if($is_ordered)
		{
			$result = $this->user_model->delete_row('category', $category);
			if($result)
			{
				$this->session->set_flashdata('successful', 'Your data deleted successfully.');
			}
		}
		else
		{
			$this->session->set_flashdata('successful', 'You can not delete this category. Set it as not visible for user');
		}
		redirect('categorys');
	}
}
?>