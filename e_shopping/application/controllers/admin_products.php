<?php

class Admin_products extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('privilege') != 2) redirect('user_control/logout');
    }

    /*Show product list
    	*@param string $slug optional
    */
	public function index($slug = NULL)
	{
		if($slug)
		{
			$category = array('slug' => $slug);
			$category_id = $this->user_model->get_fields('category', array('category_id'), $category);
			
			$category = array('p.category_id' => $category_id['category_id']);
			$data['products'] = $this->user_model->get_products($category);
		}
		else
		{
			$data['products'] = $this->user_model->get_products();
		}
		$this->admin_views('admin/products', $data);
	}

	/*Show product details for update
		*@Param string $slug optional
    */
	public function edit_products($slug = NULL)
	{
		if($slug) {
			$product = array('slug' => $slug);
			$product = $this->user_model->get_fields('product', array('product_id'), $product);
			
			$data['product'] = $this->user_model->getwhere_data('product', $product);
			$data['category'] = $this->user_model->get_data('category');
		} else {
			$data['product'] = null;
			$data['category'] = $this->user_model->get_rows('category', array('status' => 1));
		}
		
		$this->admin_views('admin/edit_product', $data);
	}

	/*Delete product from list
		*@Param int $product_id
    */
	public function delete_product($product_id)
	{
		$data = array('product_id' => $product_id);
		$check_inorder = $this->user_model->get_product($product_id);

		if($check_inorder) {
			$result = $this->user_model->delete_row('product', $data);

			if($result) {
				$this->session->set_flashdata('successful', 'Your data deleted successfully.');
			}
		} else {
			$this->session->set_flashdata('successful', 'You can not delete this product. Set it as not visible for user');
		}

		redirect('products');
	}

	// Inseart new product or update existing product
	public function insert_product()
	{
		if ($this->form_validation->run() == FALSE ) {
			$this->edit_products($this->input->post('slug'));
		} else {
			if($this->input->post('visible') == 1) {
				$condition = array('category_id' => $this->input->post('category_id'), 'status' => 0);
				$check_category = $this->user_model->get_rows('category', $condition);
				
				if($check_category) {
					$this->session->set_flashdata('info', 'Category of this product is not visible, Please make category as visible to display this product.');
					redirect('admin/product/'.$this->input->post('slug'));
				}
			}
			$category = $this->user_model->get_fields('category', array('category_name'), array('category_id' => $this->input->post('category_id')));
			$slug = url_title($category['category_name'].'-'.$this->input->post('product_name'), '-', TRUE);

			$data = array(
						'product_name'	=> $this->input->post('product_name'),
						'category_id'	=> $this->input->post('category_id'),
						'description'	=> $this->input->post('description'),
						'product_price'	=> $this->input->post('price'),
						'visible'		=> $this->input->post('visible'),
						'slug'			=> $slug
					);
			if($this->input->post('product_id') != null) {
				$result = $this->duplicate_check($this->input->post('product_name'));
				if($result) {
					$condition = array(
						'product_id' => $this->input->post('product_id')
					);
					$product_id = $this->input->post('product_id');
					$result	= $this->user_model->update_row('product', $data, $condition);
				} else {
					$this->edit_products($slug);
				}	
			} else {
				$result = $this->duplicate_check($this->input->post('product_name'));

				if($result) {	
					$result = $this->user_model->insert_row('product', $data);
					$product_id = $result;

					$condition = array(
						'product_id' => $product_id
					);
					$result = $this->user_model->update_row('product', $data, $condition);

				} else {
					$this->edit_products($slug);
				}
			}
			if($result) {
				$this->session->set_flashdata('successful', 'Your data inserted successfully.');
				redirect('admin/product/'.$slug);
			}
		}
	}

	/*check product name is already exist or not
		*@Param string $product_name
    */
	public function duplicate_check($product_name)
	{
		if($this->input->post('product_id') != null) {
			$is_exist = $this->user_model->check_product($this->input->post('category_id'), $product_name, $this->input->post('product_id'));
		} else {
			$is_exist = $this->user_model->check_product($this->input->post('category_id'), $product_name);
		}
		
		if($is_exist) {
			$this->form_validation->set_message('duplicate_check', 'This product name already exist');
			return FALSE;
		} else {
			return True;
		}
	}
	//Update product image
	public function product_pic()
	{
		if($this->input->post('product_id')) {
			$values = $this->config->config;
			$values['file_name'] = $this->input->post('product_id');

			$this->load->library('upload', $values);

			if ( ! $this->upload->do_upload('image')) {
				echo $this->upload->display_errors();
				$error = array(
							'error' => $this->upload->display_errors()
						);
				$this->session->set_flashdata('error', $error);

				redirect('admin_products/edit_products/' . $this->input->post('slug'));
			} else {   
	   			$upload_data = $this->upload->data(); 
				$file_name 	= $upload_data['file_name'];
				$condition 	= array(
							'product_id' 	=> $this->input->post('product_id')
						);
				$data 	= array(
							'product_img'	=> $file_name
						);
				$result = $this->user_model->update_row('product', $data, $condition);

				$this->session->set_flashdata('successful', 'Your data inserted successfully.');

				redirect('admin/product/'.$this->input->post('slug'));
	   		}
	   	}
	   	else
	   	{
	   		$error = array(
						'error'	=> 'First enter data for product.'
					);
	   		$this->session->set_flashdata('error', $error);

	   		redirect('admin/product');
	   	}
    }
}
?>