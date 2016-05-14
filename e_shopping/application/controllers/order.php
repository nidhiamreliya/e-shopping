<?php
class Order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //Checkout form for place order
    public function checkout()
    {
        $data['checkout'] = $this->user_model->cart_details($this->session->userdata('user_id'));
        $condition = array('user_id' => $this->session->userdata('user_id'));
        $data['user']     = $this->user_model->getwhere_data('users', $condition);
        $this->user_views('users/checkout', $data);
    }

    public function datatable()
    {
        $totalRecord;
        $row;
    }

    //Display order details
    public function order_details($order_no = null)
    {
        if($order_no)
        {
            $data['order'] = $this->user_model->get_rows('order', array('order_no' => $order_no, 'user_id' => $this->session->userdata('user_id')));
        }
        else
        {
            $data['order'] = $this->user_model->get_rows('order', array('user_id' => $this->session->userdata('user_id')));
        }
        $this->user_views('users/order_details', $data);
    }

     //Insert order in to database
    public function place_order()
    {
        if($this->session->userdata('user_id'))
        {
            if ($this->form_validation->run() == FALSE )
            {
            $this->checkout();
        }
        else
        {
            $address  = implode(',',$this->input->post());
            $data     = array(
                'user_id'          => $this->session->userdata('user_id'),
                'order_date'       => date('Y-m-d'),
                'shipping_address' => ltrim($address,$this->input->post('amount').','),
                'amount'           => $this->input->post('amount')
            );
            $order_no = $this->user_model->insert_row('order', $data);

            $products = $this->user_model->cart_data($this->session->userdata('user_id'));
            if($products)
            {
                foreach ($products as $row) 
                {
                    $data = array(
                        'order_no'      => $order_no,
                        'product_id'    => $row['product_id'],
                        'quantity'      => $row['quantity']
                    );
                    $detail_id = $this->user_model->insert_row('order_details', $data);
                }
                if($detail_id)
                {
                    $data   = array('user_id' => $this->session->userdata('user_id'));
                    $result = $this->user_model->delete_row('cart',$data);
                }

                $this->session->set_flashdata('successful', 'Your order placed sucessfully.');
                redirect('order/'.$order_no);
            }
            else
            {
                redirect('checkout');
            }
        }
    }
    else
    {
      redirect('login');
    }
  } 
}