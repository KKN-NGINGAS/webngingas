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
		$cek = $this->ModelUser->getWhere("data_user", $where);
		$num_row = $cek->num_rows();
		if ($num_row > 0) {
			$result = $cek->row_array();

			if ($result['id_user'] == 1) {
				$data_user['nama_karyawan'] = "Admin Bumdes";
			} else if ($result['id_user'] == 2) {
				$data_user['nama_karyawan'] = "Pimpinan Bumdes";
			} else {

				$whereuser = array(
					'id_user' => $result['id_user']
				);

				$data_user = $this->ModelUser->getWhere("data_karyawan", $whereuser)->row_array();
			}

			$data_session = array(
				'id'		=>	$result['id_user'],
				'nama'		=>	$data_user['nama_karyawan'],
				'role'		=>	$result['role'],
				'status'	=>	'login'
			);

			$this->session->set_userdata($data_session);

			if ($result['role'] == 'admin_bumdes') {
				redirect('AdminBumdes');
			} else if ($result['role'] == 'pimpinan_bumdes') {
				echo "pimpinan_bumdes";
			} else if ($result['role'] == 'pimpinan_ikm') {
				echo "pimpinan_ikm";
			} else if ($result['role'] == 'admin_ikm') {
				echo "admin_ikm";
			} else if ($result['role'] == 'operator_ikm') {
				echo "operator_ikm";
			}

		} else {
			echo "<script>alert('username atau password anda salah');window.location.href = '".base_url()."';</script>";
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
