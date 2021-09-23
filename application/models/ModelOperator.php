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
	function getbyid($table,$id){
		$this->db->where('id_data_produksi', $id);		
		$query = $this->db->get($table);
        return $query->result();
	}
	public function getById_hehe($id)
    {
        return $this->db->get_where($this->table, ["id_data_produksi" => $id])->row();
    }
	function input_data($table,$data){
		$this->db->insert($table,$data);
	}
}