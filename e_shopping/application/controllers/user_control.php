<?php
class User_control extends MY_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->helper('function_helper');
  }

  //Show login form
  public function index()
  {
    $this->login('login', null);
  }

  //Validate user data
  public function check_user()
  {
    if ($this->form_validation->run() == FALSE)
    {
      $this->index();
    }
    else
    {
      $password = create_password($this->input->post('password'));
      $user     = $this->user_model->user_login($this->input->post('email_id'), $password);
      if($user)
      {
        $user_data = array('user_id' => $user['user_id'],'privilege' => $user['privilege'], 'first_name' => $user['first_name']);
        $this->session->set_userdata($user_data);

        if($this->session->userdata('privilege') == 1)
        {
          redirect('user_control/home');
        }
        else if($this->session->userdata('privilege') == 2)
        {
          redirect('admin_control');
        }
      }
      else 
      {
        $data['err_message'] = 'Invalid user name or password.';
       
        $this->login('login', $data);
      }
    }
  }
  //Show login out
  public function logout()
  {
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('privilege');
    redirect('user_control');
  }

  //Show login out
  public function home()
  {
      $this->load->library('pagination');

      $values               = $this->config->config;
      $values["base_url"]   = site_url("/user_control/home");
      $total_row            = $this->user_model->record_count('product');
      $values["total_rows"] = $total_row;
      $values['num_links']  = ceil($total_row / $values["per_page"]);

      $this->pagination->initialize($values);

      $page_no              = $this->uri->segment(3);

      if($page_no > 0 && $page_no <= $values['num_links'])
      {
        $page   = ($page_no-1) * $values["per_page"];
      }
      else if($page_no > $values['num_links'])
      {
        $page   = ($values['num_links']-1) * $values["per_page"];
      }
      else
      {
        $page   = 0;
      }

      $fields           = array('product_id', 'product_price', 'product_img', 'slug');
      $condition        = array('visible' => 1);
      $data['products'] = $this->user_model->fetch_data($page, $values["per_page"], 'product', $fields, $condition);
      if($data)
      {
        $str_links      = $this->pagination->create_links();
        $data["links"]  = explode('&nbsp;',$str_links );
      }
      else
      {
        $data["links"]  = "sorry no data available.";
      }    
    $condition          = array('category_id' => 5, 'visible' => 1);
    $data['nacklaces']  = $this->user_model->last_rows('product', $fields, $condition);
    
    $this->user_views('users/home', $data);
  }

  public function registration()
  {
    $this->user_views('users/register', null);
  }

  //Validate user data and insert data into database
  public function insert_user()
  {
    if ($this->form_validation->run('registeration') == FALSE )
    {
      $this->registration();
    }
    else
    {
      echo $this->input->post('contact_no');

      $password = create_password($this->input->post('password'));
      $data     = array(
                  'privilege'   => 1,
                  'first_name'  => $this->input->post('first_name'),
                  'last_name'   =>  $this->input->post('last_name'),
                  'email_id'    => $this->input->post('email_id'),
                  'password'    => $password,
                  'contact_no'  => $this->input->post('contact_no'),
                  'address'     => $this->input->post('address'),
                  'city'        => $this->input->post('city'),
                  'zip_code'    => $this->input->post('zip_code'),
                  'state'       => $this->input->post('state'),
                  'country'     => $this->input->post('country')
      );

      $result   = $this->user_model->insert_row('users', $data);
      if($result)
      {
        $user_data = array('user_id' => $result,'privilege' => 1, 'first_name' => $this->input->post('first_name'));
        
        $this->session->set_userdata($user_data);
        $slug      = url_title($this->input->post('first_name').'-'.$this->input->post('last_name').'-'.$this->session->userdata('user_id'), 'dash', TRUE);
      
        $result    = $this->user_model->update_row('users', array('slug' => $slug), array('user_id' => $this->session->userdata('user_id')));

        redirect('user_control/home');
      }
      else
      {
        redirect('user_control/registration');
      }
    }
  }
  
  public function product_details($slug)
  {
    $product         = array('slug' => $slug);
    $product         = $this->user_model->get_fields('product', array('product_id'), $product);

    $data['product'] = $this->user_model->getwhere_data('product',$product);
    
    $this->user_views('users/product_details', $data);
  }

  public function add_item()
  {
    if ($this->form_validation->run('check_qty') == FALSE )
    {
      $this->product_details($this->input->post('slug'));
    }
    else
    {
      if($this->session->userdata('user_id'))
      {
        $data     = array(
                    'user_id'     => $this->session->userdata('user_id'),
                    'product_id'  => $this->input->post('product_id'),
                    'quantity'    => $this->input->post('quantity')
        );

        $check    = $this->user_model->check_cart('cart', $this->session->userdata('user_id'), $this->input->post('product_id'));

        if($check)
        {
          $this->session->set_flashdata('alredy_exist', 'This product is already exist in your cart.');
          redirect('user_control/product_details'.'/'.$this->input->post('slug'));
        }
        else
        {
          $result = $this->user_model->insert_row('cart', $data);
          if($result)
          {
            redirect('cart/cart_details');
          }
          else
          {
            redirect('user_control/product_details'.'/'.$this->input->post('slug'));
          }
        }
      }
      else
      {
        redirect('user_control');
      }
    }
  }
}
?>