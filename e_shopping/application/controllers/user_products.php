<?php
class User_products extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
    }
    // Load product view
    public function index()
	{
		$data['category'] = $this->user_model->get_rows('category', array('status' => 1));
		$condition = array('visible'=> 1);
		$total_row = $this->user_model->record_count('product',$condition);
		$data['links'] = ceil($total_row /  $this->config->item('per_page_product'));
		$this->user_views("users/products", $data);
	}

	/*load category wise product view
	 * @param string $slug  
	*/
	public function category($slug)
	{
		$data['category'] = $this->user_model->get_rows('category', array('status' => 1));
		$product = array('slug' => $slug, 'status'=>1);
		$product = $this->user_model->get_fields('category', array('category_id'), $product);
		if($product){
			$condition = array('category_id'=> $product['category_id'],'visible'=> 1);
		} else {
			show_404();
		}
		$total_row = $this->user_model->record_count('product',$condition);

		$data['links'] = ceil($total_row /  $this->config->item('per_page_product'));
		$this->user_views("users/category", $data);
	}

	//load list of products
	public function products()
	{
		$values = $this->config->config;
		$values["base_url"] = site_url("catalog");
    	$total_row = $this->user_model->record_count('product', array('visible'=> 1));
        $values["total_rows"] = $total_row;
        $values['num_links'] = ceil($total_row / $values["per_page_product"]);

        $this->pagination->initialize($values);

        $page_no = $this->input->post('page');

        if($page_no > 0 && $page_no <= $values['num_links']) {
            $page = ($page_no-1) * $values["per_page_product"];

        } else if($page_no > $values['num_links']) {
            $page = ($values['num_links']-1) * $values["per_page_product"];

        } else {
            $page = 0;
        }

        $fields = array('product_id', 'product_name', 'product_price', 'product_img', 'slug');
        $condition = array('visible' => 1);

        $data['products'] = $this->user_model->fetch_data(
                                $page, 
                                $values["per_page_product"], 
                                'product', 
                                $fields, 
                                $condition
                            );
        if($data) {
        	$info=$this->load->view("users/list_product",$data, TRUE);
			echo $info;
            exit;
        } else {
            echo "Sorry no products avilable.";
            exit;
        }     
    }

    //load list of products category wise
    public function cat_product()
	{
		$product = array('slug' => $this->input->post('slug'), 'status'=> 1);
		$product = $this->user_model->get_fields('category', array('category_id'), $product);
		$condition = array('category_id'=> $product['category_id'],'visible'=> 1);

		$values = $this->config->config;
		$values["base_url"] = site_url("catalog");
    	$total_row = $this->user_model->record_count('product', $condition);
        $values["total_rows"] = $total_row;
        $values['num_links'] = ceil($total_row / $values["per_page_product"]);

        $this->pagination->initialize($values);

        $page_no = $this->input->post('page');

        if($page_no > 0 && $page_no <= $values['num_links']) {
            $page = ($page_no-1) * $values["per_page_product"];

        } else if($page_no > $values['num_links']) {
            $page = ($values['num_links']-1) * $values["per_page_product"];

        } else {
            $page = 0;
        }

        $fields = array('product_id', 'product_name', 'product_price', 'product_img', 'slug');

        $data['products'] = $this->user_model->fetch_data(
                                $page, 
                                $values["per_page_product"], 
                                'product', 
                                $fields, 
                                $condition
                            );
        if($data['products']) {
        	$info=$this->load->view("users/list_product",$data, TRUE);
			echo $info;
            exit;
        } else { 
            echo "Sorry no products avilable.";
            exit;
        }     
    }
}