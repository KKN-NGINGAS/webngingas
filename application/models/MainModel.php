<?php 
class MainModel extends CI_Model{
	function inputData($table, $data){
		$this->db->insert($table, $data);
	}

	function insertGetId($table, $data)
	{
		$this->db->insert($table, $data);

		return $this->db->insert_id();
	}

	function get($table)
	{
		return $this->db->get($table);
	}

	function getWhere($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function getJoin($table, $join, $join_param)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join,$join_param, 'right');
		return $this->db->get();
	}

	function getJoinWhere($table, $join, $join_param, $where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join,$join_param, 'right');
		$this->db->where($where);
		return $this->db->get();
	}

	function getKeuangan($id_ikm)
	{
		// $q = "SELECT a.*, (SELECT SUM(pemasukan)-SUM(pengeluaran) as total FROM detail_laporan_keuangan b WHERE a.id_laporan = b.id_laporan) FROM laporan_keuangan a";

		$this->db->select('a.*, (SELECT SUM(pemasukan)-SUM(pengeluaran) FROM detail_laporan_keuangan b WHERE a.id_laporan = b.id_laporan) as total, c.*');
		$this->db->from('laporan_keuangan a');
		$this->db->join('data_ikm c', 'a.id_ikm = c.id_ikm');
		if (!in_array($this->session->role, array('admin_bumdes', 'pimpinan_bumdes'))) {
			$this->db->where('a.id_ikm', $id_ikm);
		}
		return $this->db->get();
	}

	function getTotalKeuangan($id_laporan)
	{
		$this->db->select('SUM(pemasukan)-SUM(pengeluaran) as total');
		$this->db->from('detail_laporan_keuangan');
		$this->db->where('id_laporan', $id_laporan);

		return $this->db->get();
	}

	function updateData($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	function deleteData($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}