<?php 
class ModelOperator extends CI_Model{
	function getWhere($table,$where)
	{
		return $this->db->get_where($table,$where);
	}
	function updatePass($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
    function getAll($table){
        $query = $this->db->get($table);
        return $query->result();
    }
	function getAllSortBy($table,$sort_by){
        $this->db->order_by($sort_by);
		$query = $this->db->get($table);
        return $query->result();
    }
	function getbyid($id_table, $table, $id){
		$this->db->where($id_table, $id);		
		$query = $this->db->get($table);
        return $query->result();
	}
	public function getById_hehe($id_table, $id)
    {
        return $this->db->get_where($this->table, [$id_table => $id])->row();
    }
	function input_data($table,$data){
		$this->db->insert($table,$data);
	}

	function getJoin($table, $join, $join_param)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join,$join_param);
		return $this->db->get();
	}
}