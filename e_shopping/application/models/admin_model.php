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
		$this->db->select($fields);
		$this->db->from($table);
		$this->db->order_by('product_id','desc');
		$result = $this->db->get();
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
		$query = $this->db
				->get($table);
		
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
		$this->db->select($fields);
		$this->db->from($table);
		$this->db->where($condition);
		$this->db->order_by('product_id','desc');
		$result = $this->db->get();
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
}