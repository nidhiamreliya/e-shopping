<?php
class Admin_products extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    //Show product list
	public function index($category_id)
	{
		if($category_id != 0)
		{
			$category = array('category_id' => $category_id);
			$data['products'] = $this->admin_model->get_rows('product', $category);
		}
		else
		{
			$data['products'] = $this->admin_model->get_data('product');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/side_menu');
		$this->load->view('admin/products', $data);
		$this->load->view('admin/includes/footer');
	}
	//Show edit product
	public function edit_products($product_id)
	{
		if($product_id != 0)
		{
			$condition = array('product_id' => $product_id);
			$data['product'] = $this->admin_model->getwhere_data('product', $condition);
		}
		else
		{
			$data['product'] = null;
			$data['category'] = $this->admin_model->get_data('category');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/side_menu');
		$this->load->view('admin/edit_product', $data);
		$this->load->view('admin/includes/footer');
	}

	public function delete_product($product_id)
	{
		$data = array('product_id' => $product_id);
		$result = $this->admin_model->delete_row('product', $data);
		if($result)
		{
			$this->session->set_flashdata('successful', 'Your data deleted successfully.');
		}
		redirect('admin_products/index/0');
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
					'product_name' => $this->input->post('product_name'),
					'category_id' => $this->input->post('category_id'),
					'description' => $this->input->post('description'),
					'product_price' => $this->input->post('price'),
					'product_img' => 'default_profile.jpg'
				);
			if($this->input->post('product_id') != null)
			{
				$condition = array(
					'product_id' => $this->input->post('product_id'),
				);
				$result = $this->admin_model->update_row('product', $data, $condition);
				$product_id = $this->input->post('product_id');
			}
			else
			{
				$result = $this->admin_model->insert_row('product', $data);
				$product_id = $result;
			}
			if($result)
			{
				$this->session->set_flashdata('successful', 'Your data inserted successfully.');
				redirect('admin_products/edit_products/'.$product_id);
			}
			
		}
	}
}
?>