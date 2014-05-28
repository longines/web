<?php
class Account_model extends CI_Model
{
	function login($username,$password,$select='')
	{
		$query = $this->db->select();
		$query = $this->db->where('username',$username);
		$query = $this->db->where('password = password('."'".$password."')");
		$query = $this->db->get('user');

		if($query->num_rows() == 1)
		{
			return $query->result_array();
		}
		else
		{
			return NULL;
		}
	}

	function register($table,$data)
	{
		if($table == 'user')
		{
			$query = $this->db->set($data);
			$query = $this->db->set('password',"PASSWORD('".$data['password']."')", FALSE);
			return $query = $this->db->insert($table);
		}
		else
		{
			$query = $this->db->set($data);
			return $query = $this->db->insert($table);
		}
	}

	function getRecordByID($table,$id,$select='')
	{
		$query = $this->db->select($select);
		$query = $this->db->where('id',$id);
		$query = $this->db->get($table);

		if($query->num_rows())
		{
			return $query->result_array();
		}
		else
		{
			return NULL;
		}
	}
}
?>