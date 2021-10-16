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

	public function data_master()
	{
		$header['title']	= 'Data Master';
		$header['page']		= 'data master';
		$data['data_ikm']	= $this->MainModel->get('data_ikm')->result();

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/data_master/data_master', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_ikm()
	{
		$header['title']	= 'Tambah IKM';
		$header['page']		= 'data master';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

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

		$this->session->set_userdata('msg', 'Data IKM Berhasil Ditambahkan');
		redirect('AdminBumdes/data_master');
	}

	public function detail_ikm($id_ikm)
	{
		$header['title']	= 'Detail IKM';
		$header['page']		= 'data master';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		$data['ikm']		= $this->MainModel->getWhere('data_ikm', array('id_ikm', $id_ikm))->result();
		$data['pimpinan']	= $this->MainModel->getJoinWhere('data_karyawan', 'data_user', 'data_karyawan.id_karyawan = data_user.id_karyawan', array('data_karyawan.id_ikm' => $id_ikm, 'data_user.role' => 'pimpinan_ikm'))->result();

		$data['admin']	= $this->MainModel->getJoinWhere('data_karyawan', 'data_user', 'data_karyawan.id_karyawan = data_user.id_karyawan', array('data_karyawan.id_ikm' => $id_ikm, 'data_user.role' => 'admin_ikm'))->result();
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

		$this->session->set_userdata('msg', 'Data IKM Berhasil Diupdate');
		redirect('AdminBumdes/data_master');
	}

	public function tambah_user($role, $id_ikm)
	{
		if ($role == 'ketua') {
			$cek = $this->MainModel->getJoinWhere('data_user', 'data_karyawan', 'data_user.id_karyawan = data_karyawan.id_karyawan', array('data_karyawan.id_ikm' => $id_ikm, 'data_user.role' => 'pimpinan_ikm'))->num_rows();
			
			$data['level'] = 'Ketua IKM';
		} else if ($role == 'admin') {
			$cek = $this->MainModel->getJoinWhere('data_user', 'data_karyawan', 'data_user.id_karyawan = data_karyawan.id_karyawan', array('data_karyawan.id_ikm' => $id_ikm, 'data_user.role' => 'admin_ikm'))->num_rows();

			$data['level'] = 'Admin IKM';
		} else {
			redirect('AdminBumdes/data_master');
		}

		if ($cek > 0) {
			redirect('AdminBumdes/data_master');
		}

		$header['title']	= 'Tambah '.ucwords($role);
		$header['page']		= 'data master';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		$data['id_ikm'] = $id_ikm;

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/data_master/tambah_user', $data);
		$this->load->view('layouts/footer');
	}

	public function input_user()
	{
		$id_ikm = $this->input->post('id_ikm');
		$nama = $this->input->post('nama');
		$role = $this->input->post('role');
		$nik = $this->input->post('nik');
		$gender = $this->input->post('gender');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		$pendidikan = $this->input->post('pendidikan');
		$alamat = $this->input->post('alamat');

		$timestamp = date("YmdHis");

		if ($role == 'pimpinan_ikm') {
			$jabatan = 'Ketua';
		} else if ($role == 'admin_ikm') {
			$jabatan = 'Karyawan';
		}

		$cek = $this->MainModel->getWhere('data_karyawan', array('nik' => $nik))->num_rows();

		if ($cek > 0) {
			$this->session->set_userdata('msg', 'NIK Karyawan sudah terdaftar');
			redirect('AdminBumdes/tambah_user');
		} else {
			$data = array(
				'nama_karyawan'	=> $nama,
				'nik'			=> $nik,
				'kelamin'		=> $gender,
				'no_telp'		=> $no_telp,
				'email'			=> $email,
				'id_ikm'		=> $id_ikm,
				'alamat'		=> $alamat,
				'pendidikan'	=> $pendidikan,
				'jabatan'		=> $jabatan
			);

			$id_karyawan = $this->MainModel->insertGetId('data_karyawan', $data);

			$data2 = array(
				'id_karyawan'	=> $id_karyawan,
				'username' 		=> $timestamp,
				'user_pwd'		=> $timestamp,
				'role'			=> $role,
				'tanggal_dibuat'=> date("Y-m-d H:i:s")
			);

			$this->MainModel->inputData('data_user', $data2);

			$this->session->set_userdata('msg', 'Data berhasil ditambahkan');
			redirect('AdminBumdes/detail_ikm/'.$id_ikm);
		}
	}
}
