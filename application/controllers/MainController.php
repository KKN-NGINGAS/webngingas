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
		$header['title']	= 'Akses Ditangguhkan';
		$header['page']		= '';
		$this->load->view('layouts/header', $header);
		$this->load->view('errors/no_access');
		$this->load->view('layouts/footer');
	}

	// fungsi pengaturan

	public function pengaturan()
	{
		$header['title']	= 'Pengaturan';
		$header['page']		= 'pengaturan';
		
		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		$data['sdm']		= $this->MainModel->getJoinWhere('data_karyawan', 'data_user', 'data_user.id_karyawan = data_karyawan.id_karyawan', array('data_karyawan.id_karyawan' => $this->session->userdata('id_karyawan')))->result();
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pengaturan', $data);
		$this->load->view('layouts/footer');
	}

	public function update_pengaturan()
	{
		
	}

	// Fungsi User khusu buat admin bumdes dan admin ikm

	public function data_user()
	{
		if (!in_array($this->session->userdata('role'), array('admin_bumdes', 'admin_ikm'))) {
			redirect('MainController/no_access');
		}
		$header['title']	= 'Data User';
		$header['page']		= 'data user';
		if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
			$data['data_sdm']	= $this->MainModel->getJoinWhere('data_karyawan', 'data_user', 'data_karyawan.id_karyawan = data_user.id_karyawan', 'data_user.role NOT IN ("admin_bumdes", "pimpinan_bumdes", "pimpinan_ikm", "admin_ikm")')->result();
		} else {
			$data['data_sdm']	= $this->MainModel->getJoinWhere('data_user', 'data_karyawan', 'data_karyawan.id_karyawan = data_user.id_karyawan', array('data_karyawan.id_ikm' => $this->session->userdata('id_ikm')))->result();
		}

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/data_user/list_user', $data);
		$this->load->view('layouts/footer');
	}

	public function add_user($id_karyawan)
	{
		if (!in_array($this->session->userdata('role'), array('admin_bumdes', 'admin_ikm'))) {
			redirect('MainController/no_access');
		}

		$timestamp = date("YmdHis");

		$data = array(
			'id_karyawan'	=> $id_karyawan,
			'username' 		=> $timestamp,
			'user_pwd'		=> $timestamp,
			'role'			=> 'operator_ikm',
			'tanggal_dibuat'=> date("Y-m-d H:i:s")
		);

		$this->MainModel->inputData('data_user', $data);

		$this->session->set_userdata('msg', 'User Baru berhasil ditambahkan');
		redirect('MainController/data_user');
	}

	public function reset_user($id_user, $id_ikm = '')
	{
		if (!in_array($this->session->userdata('role'), array('admin_bumdes', 'admin_ikm'))) {
			redirect('MainController/no_access');
		}

		$timestamp = date("YmdHis");
		
		$data = array(
			'username' => $timestamp,
			'user_pwd' => $timestamp
		);

		$where = array(
			'id_user' => $id_user
		);

		$this->MainModel->updateData('data_user', $data, $where);

		$this->session->set_userdata('msg', 'Data User berhasil direset');

		if ($this->session->role == 'admin_ikm') {
			redirect('MainController/data_user');
		} else if ($this->session->role == 'admin_bumdes') {
			redirect('AdminBumdes/detail_ikm/'.$id_ikm);
		}
	}

	public function delete_user($id_user)
	{
		if (!in_array($this->session->userdata('role'), array('admin_bumdes', 'admin_ikm'))) {
			redirect('MainController/no_access');
		}

		$where = array(
			'id_user' => $id_user
		);

		$this->MainModel->deleteData('data_user', $where);

		$this->session->set_userdata('msg', 'User berhasil dihapus');
		redirect('MainController/data_user');
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

	public function data_produk()
	{
		$header['title']	= 'Pemasaran dan Periklanan';
		$header['page']		= 'pemasaran';
		if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
			$data['data_produk']	= $this->MainModel->getJoin('data_produk', 'data_ikm', 'data_produk.id_ikm = data_ikm.id_ikm')->result();
		} else {
			$data['data_produk']	= $this->MainModel->getJoinWhere('data_produk', 'data_ikm', 'data_produk.id_ikm = data_ikm.id_ikm', array('data_produk.id_ikm' => $this->session->userdata('id_ikm')))->result();
		}

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pemasaran/list_produk.php', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_produk()
	{
		if (!in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) {
			redirect('MainController/no_access');
		}
		$header['title']	= 'Pemasaran dan Periklanan';
		$header['page']		= 'pemasaran';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pemasaran/tambah_produk', $data);
		$this->load->view('layouts/footer');
	}

	public function input_produk()
	{
		$nama_produk = $this->input->post('nama_produk');
		$harga_satuan = $this->input->post('harga_satuan');
		$stok = $this->input->post('stok');

		$cek = $this->MainModel->getWhere('data_produk', array('nama_produk' => $nama_produk))->num_rows();

		if ($cek > 0) {
			$this->session->set_userdata('msg', 'Produk dengan nama '.$nama_produk.' sudah terdaftar');
			redirect('MainController/tambah_produk');
		} else {
			$data = array(
				'nama_produk'	=> $nama_produk,
				'id_ikm'		=> $this->session->userdata('id_ikm'),
				'harga_satuan'	=> $harga_satuan,
				'stok'			=> $stok
			);

			$this->MainModel->inputData('data_produk', $data);

			$this->session->set_userdata('msg', 'Data Produk berhasil ditambahkan');
			redirect('MainController/data_produk');
		}
	}

	public function detail_produk($id_produk)
	{
		$header['title']	= 'Pemasaran dan Periklanan';
		$header['page']		= 'pemasaran';
		$data['data_produk']	= $this->MainModel->getJoinWhere('data_produk', 'data_ikm', 'data_produk.id_ikm = data_ikm.id_ikm', array('data_produk.id_data_produk' => $id_produk))->result();
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pemasaran/detail_produk', $data);
		$this->load->view('layouts/footer');
	}

	public function update_produk($id_produk)
	{
		$nama_produk = $this->input->post('nama_produk');
		$harga_satuan = $this->input->post('harga_satuan');
		$stok = $this->input->post('stok');

		$data = array(
				'nama_produk'	=> $nama_produk,
				'harga_satuan'	=> $harga_satuan,
				'stok'			=> $stok
			);

		$where = array(
			'id_data_produk' => $id_produk
		);

		$this->MainModel->updateData('data_produk', $data, $where);

		$this->session->set_userdata('msg', 'Data Produk berhasil diubah');
		redirect('MainController/data_produk');
	}

	// Fungsi SDM

	public function data_sdm()
	{
		$header['title']	= 'Sumber Daya Manusia';
		$header['page']		= 'sdm';
		if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
			$data['data_sdm']	= $this->MainModel->getJoin('data_karyawan', 'data_ikm', 'data_karyawan.id_ikm = data_ikm.id_ikm')->result();
		} else {
			$data['data_sdm']	= $this->MainModel->getJoinWhere('data_karyawan', 'data_ikm', 'data_karyawan.id_ikm = data_ikm.id_ikm', array('data_karyawan.id_ikm' => $this->session->userdata('id_ikm')))->result();
		}

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/sdm/list_sdm', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_sdm()
	{
		if (!in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) {
			redirect('MainController/no_access');
		}
		$header['title']	= 'Sumber Daya Manusia';
		$header['page']		= 'sdm';
		
		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/sdm/tambah_sdm', $data);
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

	public function input_sdm()
	{
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$gender = $this->input->post('gender');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$pendidikan = $this->input->post('pendidikan');

		$cek = $this->MainModel->getWhere('data_karyawan', array('nik' => $nik))->num_rows();

		if ($cek > 0) {
			$this->session->set_userdata('msg', 'NIK Karyawan sudah terdaftar');
			redirect('MainController/tambah_sdm');
		} else {
			$data = array(
				'nama_karyawan'	=> $nama,
				'nik'			=> $nik,
				'kelamin'		=> $gender,
				'no_telp'		=> $no_telp,
				'email'			=> $email,
				'id_ikm'		=> $this->session->userdata('id_ikm'),
				'alamat'		=> $alamat,
				'pendidikan'	=> $pendidikan,
				'jabatan'		=> "Karyawan"
			);

			$this->MainModel->inputData('data_karyawan', $data);


			$this->session->set_userdata('msg', 'Data Karyawan berhasil ditambahkan');
			redirect('MainController/data_sdm');
		}
	}

	public function update_sdm($id_karyawan)
	{
		$nama = $this->input->post('nama');
		$gender = $this->input->post('gender');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$pendidikan = $this->input->post('pendidikan');

		$data = array(
			'nama_karyawan'	=> $nama,
			'kelamin'		=> $gender,
			'no_telp'		=> $no_telp,
			'email'			=> $email,
			'alamat'		=> $alamat,
			'pendidikan'	=> $pendidikan,
			'tanggal_update'=> date("Y-m-d H:i:s")
		);

		$where = array(
			'id_karyawan' => $id_karyawan
		);

		$this->MainModel->updateData('data_karyawan', $data, $where);


		$this->session->set_userdata('msg', 'Data Karyawan berhasil diubah');
		redirect('MainController/data_sdm');

	}

	// Fungsi Produksi

	public function data_produksi()
	{
		$header['title']	= 'Produksi';
		$header['page']		= 'produksi';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
			$data['produksi']	= $this->MainModel->getJoin('data_produksi', 'data_produk', 'data_produksi.id_produk = data_produk.id_data_produk')->result();
		} else {
			$data['produksi']	= $this->MainModel->getJoinWhere('data_produksi', 'data_produk', 'data_produksi.id_produk = data_produk.id_data_produk', array('data_produksi.id_ikm' => $this->session->userdata('id_ikm')))->result();
		}
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/produksi/list_produksi', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_produksi()
	{
		$header['title']	= 'Produksi';
		$header['page']		= 'produksi';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		$data['produk']	= $this->MainModel->getWhere('data_produk', array('id_ikm' => $this->session->userdata('id_ikm')))->result();
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/produksi/tambah_produksi', $data);
		$this->load->view('layouts/footer');
	}

	public function detail_produksi($id_produksi)
	{
		$header['title']	= 'Produksi';
		$header['page']		= 'produksi';
		$data['produk']	= $this->MainModel->getWhere('data_produk', array('id_ikm' => $this->session->userdata('id_ikm')))->result();
		$data['data_produksi']	= $this->MainModel->getWhere('data_produksi', array('id_data_produksi' => $id_produksi))->result();
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/produksi/detail_produksi', $data);
		$this->load->view('layouts/footer');
	}

	public function input_produksi()
	{
		$tgl = $this->input->post('tanggal_produksi');
		$id_produk = $this->input->post('produk');
		$jumlah = $this->input->post('jumlah_produksi');
		$bahan_mentah = $this->input->post('bahan_mentah');

		$data = array(
			'id_ikm' => $this->session->userdata('id_ikm'),
			'tanggal' => $tgl,
			'id_produk' => $id_produk,
			'jenis_bahan_mentah' => $bahan_mentah,
			'jumlah_produksi' => $jumlah
		);

		$this->MainModel->inputData('data_produksi', $data);

		$this->session->set_userdata('msg', 'Data Produksi berhasil ditambahkan');
		redirect('MainController/data_produksi');
	}

	public function update_produksi($id_produksi)
	{
		$tgl = $this->input->post('tanggal_produksi');
		$id_produk = $this->input->post('produk');
		$jumlah = $this->input->post('jumlah_produksi');
		$bahan_mentah = $this->input->post('bahan_mentah');

		$data = array(
			'tanggal' => $tgl,
			'id_produk' => $id_produk,
			'jenis_bahan_mentah' => $bahan_mentah,
			'jumlah_produksi' => $jumlah
		);

		$where = array(
			'id_data_produksi' => $id_produksi
		);

		$this->MainModel->updateData('data_produksi', $data, $where);

		$this->session->set_userdata('msg', 'Data Produksi berhasil diubah');
		redirect('MainController/data_produksi');
	}

	// Fungsi Pelayanan Konsumen

	public function pelayanan_konsumen()
	{
		$header['title']	= 'Pelayanan Konsumen';
		$header['page']		= 'pelayanan';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
			$data['pelayanan']	= $this->MainModel->getJoin('data_pelanggan', 'data_ikm', 'data_pelanggan.id_ikm = data_ikm.id_ikm')->result();
		} else {
			$data['pelayanan']	= $this->MainModel->getJoinWhere('data_pelanggan', 'data_ikm', 'data_pelanggan.id_ikm = data_ikm.id_ikm', array('data_pelanggan.id_ikm' => $this->session->userdata('id_ikm')))->result();
		}
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pelayanan/list_pelayanan', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_konsumen()
	{
		$header['title']	= 'Pelayanan Konsumen';
		$header['page']		= 'pelayanan';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$this->session->unset_userdata('msg');
		} else {
			$data['msg']		= '';
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pelayanan/tambah_pelayanan', $data);
		$this->load->view('layouts/footer');
	}

	public function detail_konsumen($id_perusahaan)
	{
		$header['title']	= 'Pelayanan Konsumen';
		$header['page']		= 'pelayanan';
		$data['konsumen']	= $this->MainModel->getWhere('data_pelanggan', array('id_perusahaan' => $id_perusahaan))->result();
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pelayanan/detail_pelayanan', $data);
		$this->load->view('layouts/footer');
	}

	public function input_konsumen()
	{
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$telp_perusahaan = $this->input->post('telp_perusahaan');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$telp_pemilik = $this->input->post('telp_pemilik');
		$nama_pic = $this->input->post('nama_pic');
		$telp_pic = $this->input->post('telp_pic');

		$data = array(
			'id_ikm' => $this->session->userdata('id_ikm'),
			'nama_perusahaan' => $nama_perusahaan,
			'nama_pemilik' => $nama_pemilik,
			'nama_pic' => $nama_pic,
			'alamat_perusahaan' => $alamat,
			'telp_pemilik' => $telp_pemilik,
			'telp_pic' => $telp_pic,
			'telp_perusahaan' => $telp_perusahaan,
			'email_perusahaan' => $email
		);

		$this->MainModel->inputData('data_pelanggan', $data);

		$this->session->set_userdata('msg', 'Data Pelanggan berhasil ditambahkan');
		redirect('MainController/pelayanan_konsumen');
	}

	public function update_konsumen($id_perusahaan)
	{
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$telp_perusahaan = $this->input->post('telp_perusahaan');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$telp_pemilik = $this->input->post('telp_pemilik');
		$nama_pic = $this->input->post('nama_pic');
		$telp_pic = $this->input->post('telp_pic');

		$data = array(
			'id_ikm' => $this->session->userdata('id_ikm'),
			'nama_perusahaan' => $nama_perusahaan,
			'nama_pemilik' => $nama_pemilik,
			'nama_pic' => $nama_pic,
			'alamat_perusahaan' => $alamat,
			'telp_pemilik' => $telp_pemilik,
			'telp_pic' => $telp_pic,
			'telp_perusahaan' => $telp_perusahaan,
			'email_perusahaan' => $email,
			'tanggal_update' => date("Y-m-d H:i:s")
		);

		$where = array(
			'id_perusahaan' => $id_perusahaan
		);

		$this->MainModel->updateData('data_pelanggan', $data, $where);

		$this->session->set_userdata('msg', 'Data Pelanggan berhasil diubah');
		redirect('MainController/pelayanan_konsumen');
	}
}
