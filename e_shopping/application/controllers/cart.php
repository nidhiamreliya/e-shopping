<?php
class Cart extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  //Show login form
  public function index()
  {
    $this->cart_details();
  }

  public function add_item()
  {
    if($this->session->userdata('user_id'))
    {
      $data= array(
              'user_id' => $this->session->userdata('user_id'),
              'product_id' => $this->input->post('product_id'),
              'quantity' => $this->input->post('quantity')
        );
      $check = $this->admin_model->check_cart('cart', $this->session->userdata('user_id'), $this->input->post('product_id'));
      if($check)
      {
        $this->session->set_flashdata('alredy_exist', 'This product is already exist in your cart.');
        redirect('user_control/product_details'.'/'.$this->input->post('product_id'));
      }
      else
      {
        $result = $this->admin_model->insert_row('cart', $data);
        if($result)
        {
          redirect('cart/cart_details');
        }
        else
        {
          redirect('user_control/product_details'.'/'.$this->input->post('product_id'));
        }
      }
    }
    else
    {
      redirect('user_control');
    }
  }

  public function cart_details()
  {
    $data['cart'] = $this->admin_model->cart_details($this->session->userdata('user_id'));
    
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

  public function remove($cart_id)
  {
    $data = array('cart_id' => $cart_id);
    $result = $this->admin_model->delete_row('cart', $data);
    if($result)
    {
      $this->session->set_flashdata('successful', 'Your data deleted successfully.');
    }
    $this->cart_details();
  }

  public function update_cart()
  {
    if ($this->form_validation->run('check_qty') == FALSE )
    {
      $this->cart_details();
    }
    else
    {
      $data = array(
          'quantity' => $this->input->post('quantity')
      );
      $result = $this->admin_model->update_row('cart', $data, array('cart_id' => $this->input->post('cart_id')));
      $this->session->set_flashdata('successful', 'Your data updated successfully.');
      redirect('cart/cart_details');
   }
  }

  public function checkout()
  {
    $data['checkout'] = $this->admin_model->cart_details($this->session->userdata('user_id'));
    $condition = array('user_id' => $this->session->userdata('user_id'));
    $data['user'] = $this->admin_model->getwhere_data('users', $condition);
    $this->user_views('users/checkout', $data);
  }

  public function order_details()
  {
    $data['order'] = $this->admin_model->getwhere_data('order', array('user_id' => $this->session->userdata('user_id')));
    $this->user_views('users/final_bill', $data);
  }

  public function place_order()
  {
    if($this->session->userdata('user_id'))
    {
      $data = array(
                  'user_id' => $this->session->userdata('user_id'),
                  'order_date' => date('Y-m-d'),
                  'shipping_address' => 150.00
        );
      $order_no = $this->admin_model->insert_row('order', $data);

      $products = $this->admin_model->cart_data($this->session->userdata('user_id'));
      if($products)
      {
        $product_id = "";
        $quantity = "";
        $price = "";
        foreach ($products as $row) 
        {
          $product_id .= $row['product_id'].',';
          $quantity .= $row['quantity'].',';
          $price .= $row['product_price'].',';
        }
        
        $data = array(
                    'order_no' => $order_no,
                    'product_id' => rtrim($product_id, ","),
                    'quantity' => rtrim($quantity, ","),
                    'price' => rtrim($price, ",")
          );
        $detail_id = $this->admin_model->insert_row('order_details', $data);
        if($detail_id)
        {
          $data = array('user_id' => $this->session->userdata('user_id'));
          $result = $this->admin_model->delete_row('cart',$data);
        }
        $this->session->set_flashdata('successful', 'Your order placed sucessfully.');
        redirect('cart/order_details');
      }
      else
      {
        redirect('cart/cart_details');
      }
    }
    else
    {
      redirect('user_control');
    }
  } 
}