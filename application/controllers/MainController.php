<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	/**
	 Controller untuk semua fitur
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('MainModel');
		date_default_timezone_set("Asia/Jakarta");

		if ($this->session->userdata('status') != 'login') {
			redirect(base_url());
		}
	}

	public function index()
	{
		$header['title']	= 'Dashboard';
		$header['page']		= 'dashboard';
		$data['name']		= $this->session->userdata('nama');
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('layouts/footer');
	}

	public function no_access()
	{
		$header['title']	= 'Dashboard';
		$header['page']		= 'dashboard';
		$this->load->view('layouts/header', $header);
		$this->load->view('errors/no_access');
		$this->load->view('layouts/footer');
	}

	// Fungsi User khusu buat admin bumdes dan admin ikm

	public function data_user()
	{
		if (!in_array($this->session->userdata('role'), array('admin_bumdes', 'admin_ikm'))) {
			redirect('MainController/no_access');
		}
		$header['title']	= 'Data User';
		$header['page']		= 'data user';
		$data['listUser']	= $this->MainModel->getUserList('data_user')->result();
		// die(var_dump($data['listUser']));
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/data_user/list_user', $data);
		$this->load->view('layouts/footer');
	}

	public function detail_user($id_user)
	{
		if (!in_array($this->session->userdata('role'), array('admin_bumdes', 'admin_ikm'))) {
			redirect('MainController/no_access');
		}
		echo "detail_user";
	}

	public function edit_user($id_user)
	{
		if (!in_array($this->session->userdata('role'), array('admin_bumdes', 'admin_ikm'))) {
			redirect('MainController/no_access');
		}
		echo "edit_user";
	}

	public function tambah_user()
	{
		if (!in_array($this->session->userdata('role'), array('admin_bumdes', 'admin_ikm'))) {
			redirect('MainController/no_access');
		}
		echo "tambah_user";
	}

	// Pemasaran

	public function pemasaran()
	{
		$header['title']	= 'Pemasaran dan Periklanan';
		$header['page']		= 'pemasaran';
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pemasaran/pasariklan.php');
		$this->load->view('layouts/footer');
	}

	// Fungsi SDM

	public function data_sdm($msg = '')
	{
		$header['title']	= 'Sumber Daya Manusia';
		$header['page']		= 'sdm';
		$data['data_sdm']	= $this->MainModel->getJoin('data_karyawan', 'data_ikm', 'data_karyawan.id_ikm = data_ikm.id_ikm')->result();
		$data['msg']		= $msg;
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/sdm/list_sdm', $data);
		$this->load->view('layouts/footer');
	}

	public function detail_sdm($id_karyawan)
	{
		$header['title']	= 'Sumber Daya Manusia';
		$header['page']		= 'sdm';
		$data['sdm']		= $this->MainModel->getJoinWhere('data_karyawan', 'data_ikm', 'data_karyawan.id_ikm = data_ikm.id_ikm', array('id_karyawan' => $id_karyawan))->result();
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/sdm/detail_sdm', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_sdm($msg = '')
	{
		if ($this->session->userdata('role') != 'admin_ikm') {
			redirect('MainController/no_access');
		}
		$header['title']	= 'Sumber Daya Manusia';
		$header['page']		= 'sdm';
		$data['msg']		= $msg;
		$data['ikm']		= $this->MainModel->get('data_ikm')->result();
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/sdm/tambah_sdm', $data);
		$this->load->view('layouts/footer');
	}

	public function input_sdm()
	{
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$gender = $this->input->post('gender');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');

		$cek = $this->MainModel->getWhere('data_karyawan', array('nik' => $nik))->num_rows();

		if ($cek > 0) {
			$this->tambah_sdm('NIK Karyawan sudah terdaftar');
		} else {
			$data = array(
				'nama_karyawan'	=> $nama,
				'nik'			=> $nik,
				'kelamin'		=> $gender,
				'no_telp'		=> $no_telp,
				'email'			=> $email,
				'id_ikm'		=> $this->session->userdata('id_ikm'),
				'alamat'		=> $alamat,
				'jabatan'		=> "Karyawan"
			);

			$this->MainModel->inputData('data_karyawan', $data);

			$this->data_sdm('Data Karyawan Berhasil ditambahkan');
		}
	}

	public function update_sdm($id_karyawan)
	{
		$nama = $this->input->post('nama');
		$gender = $this->input->post('gender');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');

		$data = array(
			'nama_karyawan'	=> $nama,
			'kelamin'		=> $gender,
			'no_telp'		=> $no_telp,
			'email'			=> $email,
			'alamat'		=> $alamat
		);

		$where = array(
			'id_karyawan' => $id_karyawan
		);

		$this->MainModel->updateData('data_karyawan', $data, $where);

		$this->data_sdm('Data Karyawan berhasil diubah');

	}

}
