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
		$this->db->join('data_karyawan','data_ikm.id_ikm = data_karyawan.id_ikm');
		$this->db->join('data_user', 'data_karyawan.id_user = data_user.id_user');
		$this->db->where('data_karyawan.id_ikm', $id_ikm);
		$this->db->where('data_karyawan.id_user is NOT NULL');
		return $this->db->get();
	}

	function getUser()
	{
		// $this->db->select('*');
		// $this->db->from('tb_user');
		// $this->db->join('pimpinan_ikm_bumdes', 'pimpinan_ikm_bumdes.id_user = tb_user.id_user OR');
		// $this->db->join('operator_ikm', 'operator_ikm.id_user = tb_user.id_user');
		// $this->db->where('pimpinan_ikm_bumdes.id_ikm !=', '0');
		// $this->db->where('tb_user.role !=', '1');
		$query = "SELECT * FROM tb_user 
		INNER JOIN (SELECT id_user, id_ikm, nama 
		FROM pimpinan_ikm_bumdes 
		UNION ALL 
		SELECT id_user, id_ikm, nama 
		FROM operator_ikm) 
		sub on tb_user.id_user = sub.id_user WHERE sub.id_ikm != 0";
		return $this->db->query($query)->result();
	}

	function getUserDetail()
	{

	}
}