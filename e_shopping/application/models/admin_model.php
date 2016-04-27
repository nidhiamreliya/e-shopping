<?php
class Admin_model extends CI_Model 
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


	/*Check user data and retrive user data from database.
     *@params string $user_name user name or email_id 
     *@params string $password 
     *@returns array row
	*/
	public function user_login($user_name, $password)
	{
		$query = $this->db
				->select('user_id, privilege, first_name')
				->from('users')
			    ->where('email_id', $user_name)
			    ->where('password', $password)
			   	->get();
		if ($query->num_rows() > 0) 
		{
			return $query->row_array();
		} 
		else 
		{
			return false;
		}
	}

    /*Inseart user data for register user.
     *@params array $data data entered by user
     *@return int user id
	*/
	public function get_data($table)
	{
		$result = $this->db->get($table);
		if ($result->num_rows() > 0) 
		{
			return $result->result();
		} 
		else 
		{
			return false;
		}
	}
	/*Inseart user data for register user.
     *@params array $data data entered by user
     *@return int user id
	*/
	public function get_rows($table, $condition)
	{
		$result = $this->db->get_where($table, $condition);
		if ($result->num_rows() > 0) 
		{
			return $result->result();
		} 
		else 
		{
			return false;
		}
	}

	public function update_row($table, $data, $condition)
	{
		$this->db->where($condition);
		$query = $this->db->update($table, $data);
		
		if ($this->db->trans_status() === true) 
		{
    		return true;
		} 
		else 
		{
   			return 	false;
    	}
	}
	/*Inseart user data for register user.
     *@params array $data data entered by user
     *@return int user id
	*/
	public function getwhere_data($table, $condition)
	{
		$result = $this->db->get_where($table, $condition);
		if ($result->num_rows() > 0) 
		{
			return $result->row_array();
		} 
		else 
		{
			return false;
		}
	}

	/*Inseart user data for register user.
     *@params array $data data entered by user
     *@return int user id
	*/
	public function get_fields($table, $fields, $condition)
	{
		$query = $this->db
				->select($fields)
				->from($table)
			    ->where($condition)
			   	->get();

		if ($query->num_rows() > 0) 
		{
			return $query->row_array();
		} 
		else 
		{
			return false;
		}
	}

	/*Inseart user data for register user.
     *@params array $data data entered by user
     *@return int user id
	*/
	public function insert_row($table, $data)
	{
		$result = $this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	/*Inseart user data for register user.
     *@params array $data data entered by user
     *@return int user id
	*/
	public function delete_row($table, $data)
	{
		$result = $this->db->delete($table, $data);
		if ($this->db->trans_status() === true) 
		{
    		return true;
		} 
		else 
		{
   			return 	false;
    	}
	}

	/*Inseart user data for register user.
     *@params array $data data entered by user
     *@return int user id
	*/
	public function get_last_rows($table, $fields)
	{
		$result = $this->db
				->select($fields)
				->from($table)
				->order_by('product_id','desc')
				->get();
		if ($result->num_rows() > 0) 
		{
			return $result->result();
		} 
		else 
		{
			return false;
		}
	}
	/*Count total records
     *@return int total users in database
    */
    public function record_count($table) 
    {
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	/*Fetch data according to per_page limit.
	 *@params int $page page no 
	 *@params int $limit no of record to retrive
     *@return array rows
	*/
	public function fetch_data($page, $limit, $table, $fields) 
	{
		$query = $this->db
				->select($fields)
				->from($table)
				->limit($limit,$page)
				->get();

		if ($query->num_rows() >= 1) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}
	public function last_rows($table, $fields, $condition)
	{
		$result = $this->db
				->select($fields)
				->from($table)
				->where($condition)
				->order_by('product_id','desc')
				->get();
		if ($result->num_rows() > 0) 
		{
			return $result->result();
		} 
		else 
		{
			return false;
		}
	}

	public function check_cart($table, $user_id, $product_id)
	{
		$query = $this->db
				->select('cart_id')
				->from($table)
			    ->where('user_id', $user_id)
			    ->where('product_id', $product_id)
			   	->get();
		if ($query->num_rows() > 0) 
		{
			return $query->row_array();
		} 
		else 
		{
			return false;
		}
	}
	//SELECT `p`.`product_name`,`p`.`product_price`, `c`.`quantity` FROM (`cart` c) JOIN `product` p ON `c`.`product_id` = `p`.`product_id` where `c`.`user_id` = 2
	public function cart_details($user_id)
	{
		$query = $this->db
				->select('c.cart_id, c.product_id, p.product_name, p.product_price, c.quantity, p.product_img')
				->from('cart c')
				->join('product p', 'c.product_id = p.product_id')
				->where('c.user_id', $user_id)
				->get();

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}

	public function cart_data($user_id)
	{
		$query = $this->db
				->select('c.product_id, p.product_price, c.quantity')
				->from('cart c')
				->join('product p', 'c.product_id = p.product_id')
				->where('c.user_id', $user_id)
				->get();

		if ($query->num_rows() > 0) 
		{
			return $query->result_array();
		} 
		else 
		{
			return false;
		}
	}

	public function order_details($table, $condition)
	{
		$result = $this->db->get_where($table, $condition);
		$result = $result->row_array();
		$product_id = explode(',', $result['product_id']);
		$quantitys = explode(',', $result['quantity']);
		$result = array();
		$result = array();
		$i = 0;
		foreach ($product_id as $row) 
		{
			$query = $this->db
					->select('product_id, product_name, product_price')
					->from('product')
					->where('product_id', $row)
					->get();
			$result = $query->row_array();
			$result['qty'] = $quantitys[$i];
			$result2[] = $result;
			$i++;
		}

		if ($result2) 
		{
			return $result2;
		} 
		else 
		{
			return false;
		}
	}

	//SELECT `od`.`product_id` FROM (`order` o) JOIN `order_details` od ON `od`.`order_no` = `o`.`order_no` where `od`.`product_id` like '%33%' and `o`.`status`='not delivered'
	public function get_product($product_id)
	{
		$query = $this->db
				->select('od.product_id')
				->from('order o')
				->join('order_details od', 'od.order_no = o.order_no')
				->like('od.product_id', $product_id)
				->where('o.status', 'not delivered')
				->get();
				
		if($query->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}
}