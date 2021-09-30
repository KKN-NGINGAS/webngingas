<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBumdes extends CI_Controller {

	/**
	 Controller untuk Admin Bumdes
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('MainModel');
		date_default_timezone_set("Asia/Jakarta");

		if ($this->session->userdata('role') != 'admin_bumdes') {
			redirect(base_url());
		}
	}

	public function input_user()
	{
		$nama 			= $this->input->post('nama');
		$username 		= $this->input->post('username');
		$user_pwd		= bin2hex(random_bytes(5));
		$peranjabatan 	= $this->input->post('peranjabatan');
		$tanggal 		= date('Y:m:d H:i:s');
		$id_ikm			= $this->input->post('ikm');

		$data1 = array(
			'username' => $username,
			'user_pwd' => md5($user_pwd),
			'role' => $peranjabatan,
			'tanggal_dibuat' => $tanggal
		);

	}


	public function data_master()
	{
		$header['title']	= 'Data Master';
		$header['page']		= 'data master';
		$data['data_ikm']	= $this->MainModel->getListIKM()->result();
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/data_master/data_master', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_ikm($msg = '')
	{
		$header['title']	= 'Tambah IKM';
		$header['page']		= 'data master';
		$data['msg']		= $msg;
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/data_master/tambah_data', $data);
		$this->load->view('layouts/footer');
	}

	public function input_ikm()
	{
		$nama_ikm = $this->input->post('nama_ikm');
		$telp_ikm = $this->input->post('no_telp_ikm');
		$email_ikm = $this->input->post('email_ikm');
		$alamat_ikm = $this->input->post('alamat_ikm');

		$nama_ketua = $this->input->post('nama_ketua');
		$nik_ketua = $this->input->post('nik_ketua');
		$gender_ketua = $this->input->post('gender_ketua');
		$telp_ketua = $this->input->post('no_telp_ketua');
		$email_ketua = $this->input->post('email_ketua');
		$alamat_ketua = $this->input->post('alamat_ketua');
		$pass_ketua = bin2hex(random_bytes(5));

		$nama_admin = $this->input->post('nama_admin');
		$nik_admin = $this->input->post('nik_admin');
		$gender_admin = $this->input->post('gender_admin');
		$telp_admin = $this->input->post('no_telp_admin');
		$email_admin = $this->input->post('email_admin');
		$alamat_admin = $this->input->post('alamat_admin');
		$pass_admin = bin2hex(random_bytes(5));

		$cek_ketua = $this->MainModel->getWhere('data_karyawan', array('nik' => $nik_ketua))->num_rows();
		$cek_admin = $this->MainModel->getWhere('data_karyawan', array('nik' => $nik_admin))->num_rows();

		if ($cek_ketua > 0 && $cek_admin > 0) {
			$this->tambah_ikm('NIK Ketua dan Admin sudah terdaftar');
		} else if ($cek_ketua > 0) {
			$this->tambah_ikm('NIK Ketua sudah terdaftar');
		} else if ($cek_admin > 0) {
			$this->tambah_ikm('NIK Admin sudah terdaftar');
		} elseif ($nik_ketua == $nik_admin) {
			$this->tambah_ikm('Ketua dan admin harus orang yang berbeda dengan NIK yang berbeda');
		} else {
			$data_ikm = array(
				'nama_ikm' => $nama_ikm,
				'no_telp_ikm' => $telp_ikm,
				'email_ikm' => $email_ikm,
				'alamat_ikm' => $alamat_ikm
			);

			$id_ikm = $this->MainModel->insertGetId('data_ikm', $data_ikm);
			if (!empty($id_ikm)) {
				$data_user_ketua = array(
					'username' => $nik_ketua,
					'user_pwd' => md5($pass_ketua),
					'role' => "pimpinan_ikm"
				);

				$id_ketua = $this->MainModel->insertGetId('data_user', $data_user_ketua);

				if (!empty($id_ketua)) {
					$data_ketua = array(
						'nama_karyawan' => $nama_ketua,
						'nik' => $nik_ketua,
						'kelamin' => $gender_ketua,
						'no_telp' => $telp_ketua,
						'email' => $email_ketua,
						'alamat' => $alamat_ketua,
						'jabatan' => "Ketua",
						'id_ikm' => $id_ikm,
						'id_user' => $id_ketua
					);

					$this->MainModel->insertGetId('data_karyawan', $data_ketua);
				} else {
					$this->tambah_ikm('Gagal menyimpan informasi ketua');
				}

				$data_user_admin = array(
					'username' => $nik_admin,
					'user_pwd' => md5($pass_admin),
					'role' => "admin_ikm"
				);

				$id_admin = $this->MainModel->insertGetId('data_user', $data_user_admin);

				if (!empty($id_admin)) {
					$data_admin = array(
						'nama_karyawan' => $nama_admin,
						'nik' => $nik_admin,
						'kelamin' => $gender_admin,
						'no_telp' => $telp_admin,
						'email' => $email_admin,
						'alamat' => $alamat_admin,
						'jabatan' => "Karyawan",
						'id_ikm' => $id_ikm,
						'id_user' => $id_admin
					);

					$this->MainModel->insertGetId('data_karyawan', $data_admin);

					var_dump($data_ikm);
					var_dump($data_ketua);
					var_dump($data_admin);
				} else {
					$this->tambah_ikm('Gagal menyimpan informasi admin');
				}			
			} else {
				$this->tambah_ikm('Gagal menyimpan informasi IKM');
			}

		}
	}


	public function detail_ikm($id_ikm, $msg = '')
	{
		$header['title']	= 'Detail IKM';
		$header['page']		= 'data master';
		$data['msg']		= $msg;
		$data['ikm']		= $this->MainModel->getDetailIKM($id_ikm)->result();
		$data['pimpinan']	= $this->MainModel->getDataRoleIKM($id_ikm, 'pimpinan_ikm')->result();
		$data['admin']		= $this->MainModel->getDataRoleIKM($id_ikm, 'admin_ikm')->result();
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/data_master/edit_data', $data);
		$this->load->view('layouts/footer');
	}

	public function reset_pass($id_user)
	{
		echo "reset";
	}
}
