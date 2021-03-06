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

	function getOuterJoin($table, $join, $join_param)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join,$join_param, 'left outer');
		return $this->db->get();
	}

	function getJoinWhere($table, $join, $join_param, $where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join,$join_param);
		$this->db->where($where);
		return $this->db->get();
	}

	function getOuterJoinWhere($table, $join, $join_param, $where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join,$join_param, 'left outer');
		$this->db->where($where);
		return $this->db->get();
	}

	function updateData($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	function deleteBy($table, $column, $column_value){
		$this->db->delete($table, array($column => $column_value));
	}

	function getLastRow($table, $id){
		$result = $this->db->select($id)->order_by($id,"desc")->limit(1)->get($table)->row();
		return $result;
	}
}