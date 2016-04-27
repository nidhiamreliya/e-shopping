<?php

class Admin_products extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('privilege') != 2) redirect('user_control/logout');
    }

    //Show product list
	public function index($category_id = NULL)
	{
		if($category_id)
		{
			$category 			= array('category_id' => $category_id);
			$data['products']	= $this->admin_model->get_rows('product', $category);
		}
		else
		{
			$data['products']	= $this->admin_model->get_data('product');
		}
		$this->admin_views('admin/products', $data);
	}
	//Show edit product
	public function edit_products($product_id = NULL)
	{
		if($product_id)
		{
			$condition			= array('product_id' => $product_id);
			$data['product']	= $this->admin_model->getwhere_data('product', $condition);
		}
		else
		{
			$data['product']	= null;
			$data['category']	= $this->admin_model->get_data('category');
		}
		
		$this->admin_views('admin/edit_product', $data);
	}

	public function delete_product($product_id)
	{
		$data 			= array('product_id' => $product_id);
		$check_inorder	= $this->admin_model->get_product($product_id);
		if($check_inorder)
		{
			$result			= $this->admin_model->delete_row('product_', $data);
			if($result)
			{
				$this->session->set_flashdata('successful', 'Your data deleted successfully.');
			}
		}
		else
		{
			$this->session->set_flashdata('successful', 'You can not delete this product.');
		}
		redirect('admin_products');
	}

	public function insert_product()
	{
		if ($this->form_validation->run() == FALSE )
		{
			$this->edit_category();
		}
		else
		{
			$data = array(
					'product_name'	=> $this->input->post('product_name'),
					'category_id'	=> $this->input->post('category_id'),
					'description'	=> $this->input->post('description'),
					'product_price'	=> $this->input->post('price'),
					'visible'		=> $this->input->post('visible')
				);
			if($this->input->post('product_id') != null)
			{
				$condition = array(
					'product_id'	=> $this->input->post('product_id')
				);
				$product_id = $this->input->post('product_id');
				$result		= $this->admin_model->update_row('product', $data, $condition);	
			}
			else
			{
				$result 	= $this->admin_model->insert_row('product', $data);
				$product_id = $result;
				$condition 	= array(
					'product_id' 	=> $product_id
				);
				$result 	= $this->admin_model->update_row('product', $data, $condition);
			}
			if($result)
			{
				$this->session->set_flashdata('successful', 'Your data inserted successfully.');
				redirect('admin_products/edit_products/'.$product_id);
			}
			
		}
	}

	//Upadate user's profile picture
	public function product_pic()
	{
		$values 			 = $this->config->config;
		$values['file_name'] = $this->input->post('product_id');
		$this->load->library('upload', $values);

		if ( ! $this->upload->do_upload('image'))
		{
			echo $this->upload->display_errors();

			$error = array(
					'error'	=> $this->upload->display_errors()
				);

			$this->session->set_flashdata('error', $error);
			redirect('admin_products/edit_products/' . $product_id);
		}
		else
   		{   
   			$upload_data 	= $this->upload->data(); 
			$file_name 		= $upload_data['file_name'];
			$condition 		= array(
					'product_id' 	=> $this->input->post('product_id')
				);
			$data = array(
					'product_img'	=> $file_name
				);
			$result 		= $this->admin_model->update_row('product', $data, $condition);

			$this->session->set_flashdata('successful', 'Your data inserted successfully.');

			redirect('admin_products/edit_products/'.$this->input->post('product_id'));
   		}
    }
}
?>