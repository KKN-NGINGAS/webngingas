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


	public function data_master($msg = '')
	{
		$header['title']	= 'Data Master';
		$header['page']		= 'data master';
		$data['data_ikm']	= $this->MainModel->get('data_ikm')->result();
		$data['msg']		= $msg;
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


		$data_ikm = array(
			'nama_ikm' => $nama_ikm,
			'no_telp_ikm' => $telp_ikm,
			'email_ikm' => $email_ikm,
			'alamat_ikm' => $alamat_ikm
		);

		$this->MainModel->inputData('data_ikm', $data_ikm);

		$this->data_master('IKM Berhasil Ditambahkan');
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

	public function update_ikm()
	{
		$id_ikm = $this->input->post('id_ikm');
		$nama_ikm = $this->input->post('nama_ikm');
		$telp_ikm = $this->input->post('no_telp_ikm');
		$email_ikm = $this->input->post('email_ikm');
		$alamat_ikm = $this->input->post('alamat_ikm');


		$data_ikm = array(
			'nama_ikm' => $nama_ikm,
			'no_telp_ikm' => $telp_ikm,
			'email_ikm' => $email_ikm,
			'alamat_ikm' => $alamat_ikm
		);

		$this->MainModel->updateData('data_ikm', $data_ikm, array('id_ikm' => $id_ikm));

		$this->data_master('Data IKM Berhasil Diupdate');
	}

	public function reset_pass($id_user)
	{
		echo "reset";
	}
}
