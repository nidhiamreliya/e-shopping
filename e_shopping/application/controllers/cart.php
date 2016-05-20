<?php
class Cart extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //Show cart data
    public function index()
    {
        $this->cart_details();
    }

    //show details of cart
    public function cart_details()
    {
        if($this->session->userdata('user_id')){        
            $data['cart'] = $this->user_model->cart_details($this->session->userdata('user_id'));
        } else {
            $data['cart'] = $this->user_model->cart_details(null, $this->session->userdata('session_id'));
        }
      
        $total = 0;
        if($data['cart'])
        {
            foreach ($data['cart'] as $row) 
            {
                $total = $total + ($row->product_price * $row->quantity);
            }
            $data['total'] = $total;
            $this->user_views('users/cart', $data);
        }
        else
        {
            $data['cart'] = null;
            $this->user_views('users/cart', $data);
        }
    }
    public function add_to_cart()
    {

        if ($this->form_validation->run('check_qty') == FALSE )
        {
            echo json_encode(
                array( 
                "status"=>false,
                "msg"=> "you entered invalid quantity",
            ));
            exit;
        }
        else
        {   
            $data = array(
                    'session_id'  => $this->session->userdata('session_id'),
                    'product_id'  => $this->input->post('product_id'),
                    'quantity'    => $this->input->post('quantity')
            );
            if($this->session->userdata('user_id'))
            {
                $data['user_id'] = $this->session->userdata('user_id');
            } 
            $check = $this->user_model->check_cart('cart', array('session_id' => $this->session->userdata('session_id')), $this->input->post('product_id'));

            if($check)
            {
                echo json_encode( array(
                    "status"=>false,
                    "msg"   => "This product is already exist in your cart.",
                ));
                exit;
            }
            else
            {
                $result = $this->user_model->insert_row('cart', $data);
                if($result)                                 
                {
                    echo json_encode(array(
                        "status"=>TRUE,
                        "msg"   => "Item added to your cart successfully.",
                    ));
                    exit;   
                }
                else
                {
                    echo json_encode(array(
                        "status"=>false,
                        "msg"   => "Database error",
                    ));
                    exit;
                }
            }
        }
    }

    public function items_in_cart()
    {
        if($this->input->post('total_cart_items'))
        {
            if($this->session->userdata('user_id'))
            {
                $count = $this->user_model->record_count('cart', array('user_id' => $this->session->userdata('user_id')));
            } else {
                $count = $this->user_model->record_count('cart', array('session_id' => $this->session->userdata('session_id'), 'user_id' => null));
            }
            echo json_encode(array(
                        "status"=>true,
                        "msg"   => $count,
                ));
            exit;
        }
    }
    //Remove item from cart
    public function remove()
    {
        $condition = array('cart_id' => $this->input->post('cart_id'));
        $result = $this->user_model->delete_row('cart', $condition);
        if($result)
        {
            $this->session->set_flashdata('successful', 'Your data deleted successfully.');
            echo json_encode(array(
                    "status"=>TRUE,
                    "msg"   => "Your data deleted successfully.",
                ));
            exit;
        } else {
            echo json_encode(array(
                    "status"=>false,
                    "msg"   => "sorry there is some problem to remove this item from your cart",
                ));
            exit;
        }
    }

    //Update cart items
    public function update_cart()
    {
        if ($this->form_validation->run('check_qty') == FALSE )
        {
            echo json_encode(
                array( 
                "status"=>false,
                "msg"=> "you entered invalid quentity",
            ));
            exit;
        }
        else
        {
            $data = array(
                'quantity' => $this->input->post('quantity')
            );
            $result = $this->user_model->update_row('cart', $data, array('cart_id' => $this->input->post('cart_id')));
          
            if($result)
            {
                 echo json_encode(array(
                    "status"=> true,
                    "msg"   => "Your data updated successfully.",
                ));
                exit;
            }
        }
    }
    
}