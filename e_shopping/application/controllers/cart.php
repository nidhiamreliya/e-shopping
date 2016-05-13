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
    $data['cart'] = $this->user_model->cart_details($this->session->userdata('user_id'));
    
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

  //Remove item from cart
  public function remove($cart_id)
  {

    $data   = array('cart_id' => $cart_id);
    $result = $this->user_model->delete_row('cart', $data);
    if($result)
    {
      $this->session->set_flashdata('successful', 'Your data deleted successfully.');
    }
    redirect('cart');
  }

  //Update cart items
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
      $result = $this->user_model->update_row('cart', $data, array('cart_id' => $this->input->post('cart_id')));
      
      if($result)
      {
        $this->session->set_flashdata('successful', 'Your data updated successfully.');
      }
      redirect('cart');
    }
  }

  
}