<?php 
class MainModel extends CI_Model{
	function get($table)
	{
		return $this->db->get($table);
	}

	function getWhere($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	function getJoin($table, $join, $join_param)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join,$join_param);
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

	function getListIKM()
	{
		$this->db->select('*');
		$this->db->from('data_ikm');
		$this->db->join('data_karyawan','data_ikm.id_ikm = data_karyawan.id_ikm');
		$this->db->where('data_karyawan.jabatan','ketua');
		return $this->db->get();
	}

	function insertGetId($table, $data)
	{
		$this->db->insert($table, $data);

		return $this->db->insert_id();
	}

	function getDetailIKM($id_ikm)
	{
		$this->db->select('*');
		$this->db->from('data_ikm');
		$this->db->where('id_ikm', $id_ikm);
		return $this->db->get();
	}

	function getDataRoleIKM($id_ikm, $role)
	{
		$this->db->select('*');
		$this->db->from('data_karyawan');
		$this->db->join('data_user', 'data_karyawan.id_karyawan = data_user.id_karyawan');
		$this->db->where('data_karyawan.id_ikm',$id_ikm);
		$this->db->where('data_user.role',$role);
		return $this->db->get();
	}

	function getUserList()
	{
		$this->db->select('*');
		$this->db->from('data_karyawan');
		$this->db->join('data_user', 'data_karyawan.id_karyawan = data_user.id_karyawan');
		return $this->db->get();
	}

	function getUserDetail()
	{

	}
}