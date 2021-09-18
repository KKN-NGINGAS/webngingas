<?php 
class ModelUser extends CI_Model{
	function getWhere($table,$where)
	{
		return $this->db->get_where($table,$where);
	}
	function updatePass($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}