<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 Controller untuk login dan logout
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
			redirect('MainController');
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

			if ($result['role'] == 'admin_bumdes') {
				$data_user['nama_karyawan'] = "Admin Bumdes";
			} else if ($result['id_user'] == 'pimpinan_bumdes') {
				$data_user['nama_karyawan'] = "Pimpinan Bumdes";
			} else {

				$whereuser = array(
					'id_karyawan' => $result['id_karyawan']
				);

				$data_user = $this->ModelUser->getWhere("data_karyawan", $whereuser)->row_array();
			}

			$data_session = array(
				'id_user'		=>	$result['id_user'],
				'id_karyawan'	=>	$result['id_karyawan'],
				'nama'			=>	$data_user['nama_karyawan'],
				'id_ikm'		=>	$data_user['id_ikm'],
				'role'			=>	$result['role'],
				'status'		=>	'login'
			);

			$this->session->set_userdata($data_session);

			redirect('MainController');

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
