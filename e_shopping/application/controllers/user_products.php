<?php
class User_products extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
    }

    public function index()
	{
		$this->user_views("users/products", null);
	}
	public function products()
	{
		
		$values = $this->config->config;

		$data['category'] = $this->user_model->get_rows('category', array('status' => 1));

		$values["base_url"] = site_url("catalog");
    	$total_row = $this->user_model->record_count('product', array('visible'=> 1));

    	$condition = array('visible' => 1);

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
        
        if($data) {
        	$info=$this->load->view("users/list_product",$data, TRUE);
            /*echo json_encode(
                array( 
                "status"=>true,
                "msg"=> "successfully done",
                "html"=>$this->set_output($info),
                
            ));*/
			echo $info;
            exit;
        } else {
        	 echo json_encode(
                array( 
                "status"=>false,
                "msg"=> "not done",
            ));
            exit;
        }     
    }

    public function category($slug)
	{
		$values = $this->config->config;
		$category  = array('slug' => $slug);
		$category  = $this->user_model->get_fields('category', array('category_id'), $category);
		$data['category'] = $this->user_model->get_rows('category', array('status' => 1));

		$values["base_url"] = site_url("/catalog")."/".$slug;
		$condition = array('category_id' => $category['category_id'], 'visible' => 1);
    	$total_row = $this->user_model->record_count('product', $condition);

        $values["total_rows"] = $total_row;
        $values['num_links'] = ceil($total_row / $values["per_page_product"]);
        $this->pagination->initialize($values);

        $page_no = $this->uri->segment(2);

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
        if($data) {
            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;',$str_links );
        } else {
            $data["links"] = "sorry no data available.";
        }    
      
        $this->user_views('users/products', $data);
    }
}