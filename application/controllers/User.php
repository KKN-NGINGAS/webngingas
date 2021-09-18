<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 Controller untuk login dan register ikm
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('ModelUser');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		if ($this->session->userdata('status') == "login") {
			if ($this->session->userdata('role') == "admin") {
				redirect('AdminBumdes');
			} else if ($this->session->userdata('role') == "pimpinan") {
				redirect('Pimpinan');
			} else if ($this->session->userdata('role') == "operator") {
				redirect('Operator');
			}
		} else {
			$this->load->view('pages/index');
		}
	}

	public function loginAct(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'user_pwd' => md5($password)
		);
		$cek = $this->ModelUser->getWhere("tb_user", $where);
		$result = $cek->num_rows();
		if ($result > 0) {
			$cek 	= $cek->row_array();

			$cek2	= $this->ModelUser->getWhere("admin_bumdes", array("id_user" => $cek['id_user']));
			$result2 = $cek2->num_rows();
			$cek3	= $this->ModelUser->getWhere("pimpinan_ikm_bumdes", array("id_user" => $cek['id_user']));
			$result3 = $cek3->num_rows();
			$cek4	= $this->ModelUser->getWhere("operator_ikm", array("id_user" => $cek['id_user']));
			$result4 = $cek4->num_rows();

			if ($result2 > 0) {
				$data = $cek2->row_array();
				$role = 'admin';
			} else if ($result3 > 0) {
				$data = $cek3->row_array();
				$role = 'pimpinan';
			} else if ($result4 > 0) {
				$data = $cek4->row_array();
				$role = 'operator';
			}

			$data_session = array(
				'id'		=>	$id_user,
				'nama'		=>	$data['nama'],
				'email'		=>	$data['email'],
				'role'		=>	$role,
				'status'	=>	'login'
			);

			$this->session->set_userdata($data_session);

			if ($role == 'admin') {
				redirect('AdminBumdes');
			} else if ($role == 'pimpinan') {
				redirect('Pimpinan');
			} else if ($role == 'operator') {
				redirect('Operator');
			} 

		} else {
			echo "<script>alert('username atau password anda salah');window.location.href = '.';</script>";
				// redirect('home');
				// print('username atau password anda salah');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url());
	}
}
