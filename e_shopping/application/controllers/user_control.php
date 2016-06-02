<?php
class User_control extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
        $this->load->helper('function_helper');
    }

    //Show login form
    public function index()
    {
        if($this->session->userdata('user_id')){
            $this->logout();
        }
        $this->user_views('login', null);
    }

    //Validate login data
    public function check_user()
    {
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $password = create_password($this->input->post('password'));
            $user = $this->user_model->user_login($this->input->post('email_id'), $password);
            
            if($user) {
                $user_data = array(
                    'user_id' => $user['user_id'],
                    'privilege' => $user['privilege'], 
                    'first_name' => $user['first_name']
                );
                $this->session->set_userdata($user_data);
                if($this->session->userdata('privilege') == 1) {
                    
                    $cart = $this->user_model->get_rows(
                                'cart', 
                                array(
                                    'session_id' => $this->session->userdata('session_id'), 
                                    'user_id'=> null
                                )
                        );
                    if($cart)
                    {
                        $condition = array(
                                'session_id' => $this->session->userdata('session_id'), 
                                'user_id'=> null
                            );
                        $data = array('user_id' => $this->session->userdata('user_id'));

                        foreach ($cart as $row) {
                            $check = $this->user_model->check_cart(
                                        'cart', 
                                        array('user_id' =>$this->session->userdata('user_id')), 
                                        $row->product_id
                                    );
                            if($check)
                            {
                                $this->user_model->delete_row('cart', $check);
                            }
                        }
                        $this->user_model->update_row('cart', $data, $condition);
                    }
                    redirect('home');
                } else if($this->session->userdata('privilege') == 2) {
                  redirect('admin_control');
                }
            } else {
                $data['err_message'] = 'Invalid user name or password.';
             
                $this->user_views('login', $data);
            }
        }
    }

    //Show logout
    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('privilege');
        $this->session->unset_userdata('first_name');
        $this->session->sess_destroy();
        redirect('login');
    }

    //Show home page of website
    public function home()
    {
        $this->load->library('pagination');

        $values = $this->config->config;
        $values["base_url"] = site_url("/home");
        $total_row = $this->user_model->record_count('product');
        $values["total_rows"] = $total_row;
        $values['num_links'] = ceil($total_row / $values["per_page"]);

        $this->pagination->initialize($values);

        $page_no = $this->uri->segment(2);

        if($page_no > 0 && $page_no <= $values['num_links']) {
            $page = ($page_no-1) * $values["per_page"];
        } else if($page_no > $values['num_links']) {
            $page = ($values['num_links']-1) * $values["per_page"];
        } else {
            $page = 0;
        }

        $fields = array('product_id', 'product_price', 'product_img', 'slug');
        $condition = array('visible' => 1);
        $data['products'] = $this->user_model->fetch_data(
                                $page, 
                                $values["per_page"], 
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
        $condition = array('category_id' => 5, 'visible' => 1);
        $data['nacklaces'] = $this->user_model->last_rows('product', $fields, $condition);
      
        $this->user_views('users/home', $data);
    }

    //Display registration form
    public function registration()
    {
        $this->user_views('users/register', null);
    }

    //Validate user data and insert data into database
    public function insert_user()
    {
        if ($this->form_validation->run('registeration') == FALSE ) {
            $this->registration();
        } else {
            $password = create_password($this->input->post('password'));
            $data = array(
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

            $result = $this->user_model->insert_row('users', $data);
            if($result) {
                $user_data = array(
                                'user_id' => $result,
                                'privilege' => 1, 
                                'first_name' => $this->input->post('first_name')
                            );    
                $this->session->set_userdata($user_data);
                
                $slug = url_title(
                            $this->input->post('first_name').'-'.$this->input->post('last_name').'-'.$this->session->userdata('user_id'), 
                            'dash', 
                            TRUE
                        );
                $result = $this->user_model->update_row(
                            'users', 
                            array('slug' => $slug), 
                            array('user_id' => $this->session->userdata('user_id'))
                        );

                $cart = $this->user_model->get_rows(
                            'cart', 
                            array( 'session_id' => $this->session->userdata('session_id'), 
                            'user_id'=> null)
                        );
                if($cart)
                {
                    $condition = array( 
                                    'session_id' => $this->session->userdata('session_id'), 
                                    'user_id'=> null
                                );
                    $data = array('user_id' => $this->session->userdata('user_id'));

                    foreach ($cart as $row) {
                        $check = $this->user_model->check_cart(
                                    array('user_id' => $this->session->userdata('user_id')),
                                    $row->product_id
                                    );
                        if($check)
                        {
                            print_r($check);
                            $this->user_model->delete_row('cart', $check);
                        }
                    }
                    $this->user_model->update_row('cart', $data, $condition);
                }
                redirect('home');
            } else {
                redirect('registration');
            }
        }
    }

    /*Display details of given product
        *@Param string $slug
    */
    public function product_details($slug)
    {
        $product = array('slug' => $slug);
        $product = $this->user_model->get_fields('product', array('product_id'), $product);
        $condition = array('product_id' => $product['product_id'], 'visible' => 1);
        $data['product'] = $this->user_model->getwhere_data('product',$condition);
        if($data['product'])
        {
            $this->user_views('users/product_details', $data);
        } else {
            show_404();
        }
    }

    //Show forgot password form
    public function forgot_psw()
    {
        $this->user_views('forgot_password', null);
    }


    //Show check for valid email id for change password of user
    public function check_email()
    {
        $this->load->helper('string');
        if($this->form_validation->run('email_id') == FALSE ) {
            $this->forgot_psw();
        } else {

            $valid = $this->user_model->get_fields(
                        'users', 
                        array('user_id'), 
                        array('email_id' => $this->input->post('email_id'))
                    );
            if($valid)
            {
                $tokan = random_string('alnum', 16);
                $valid = $this->user_model->update_row('users', array('change_psw'=> $tokan), array('email_id'=>$this->input->post('email_id')));
                if($valid){
                    redirect('password/change/' . $tokan);
                } else {
                    $data['err_message'] = 'Email id not exist.';
                    $this->user_views('forgot_password', $data);
                }
            } else {
                $data['err_message'] = 'Email id not exist.';
                $this->user_views('forgot_password', $data);
            }
            
        }
    }

    /*Show change password view of user
        *@Param string $user encrypted user id
    */
    public function change_password($tokan)
    {   
        if($this->form_validation->run('password') == FALSE ) {
            $this->user_views('change_psw', $data);
        } else {
           
            $update = $this->user_model->getwhere_data('users', array('change_psw'=>$tokan));   

            if($update){
                $password = create_password($this->input->post('password'));
            
                $result = $this->user_model->update_row(
                            'users', 
                            array('password' => $password),
                            array('change_psw' => $tokan)
                        );
                if($result)
                {
                    $this->user_model->update_row('users', array('change_psw'=> null), array('change_psw' => $tokan));
                    $this->session->set_flashdata('psw_success', 'Your password update successfully');
                    redirect('login');
                } else {
                    $data['err_message'] = 'invalid user.';
                    $this->user_views('change_psw', $data);
                }
            } else {
                $data['err_message'] = 'invalid user.';
                $this->user_views('change_psw', $data);
            }
        }
    }
}