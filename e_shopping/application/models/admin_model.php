<?php
class Admin_model extends CI_Model 
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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
}