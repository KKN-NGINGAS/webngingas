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

	// Fungsi Random buat username sama password
	
	public function rand_string($length)
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		return substr(str_shuffle($chars), 0, $length);
	}

	// Fungsi Auth untuk akun ikm

	public function auth_ikm()
	{
		if (!in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) {
			redirect('MainController/no_access');
		} else {
			return;
		}
	}

	public function auth_admin_bumdes()
	{
		if (!in_array($this->session->userdata('role'), array('admin_bumdes'))) {
			redirect('MainController/no_access');
		} else {
			return;
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

	// Fungsi pengaturan

	public function pengaturan()
	{
		$header['title']	= 'Pengaturan';
		$header['page']		= 'pengaturan';
		
		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
			$data['sdm'] = $this->MainModel->getWhere('data_user', array('id_user' => $this->session->userdata('id_user')))->result();
		} else {
			$data['sdm'] = $this->MainModel->getJoinWhere('data_karyawan', 'data_user', 'data_user.id_karyawan = data_karyawan.id_karyawan', array('data_karyawan.id_karyawan' => $this->session->userdata('id_karyawan')))->result();
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pengaturan', $data);
		$this->load->view('layouts/footer');
	}

	public function update_pengaturan()
	{
		
	}

	// Fungsi Data Master khusus admin bumdes

	public function data_master()
	{
		$header['title']	= 'Data Master';
		$header['page']		= 'data master';
		$data['data_ikm']	= $this->MainModel->get('data_ikm')->result();

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
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
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
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
		$session = array (
			'msg' => 'Data IKM Berhasil Ditambahkan',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
		redirect('MainController/data_master');
	}

	public function detail_ikm($id_ikm)
	{
		$header['title']	= 'Detail IKM';
		$header['page']		= 'data master';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$data['ikm']		= $this->MainModel->getWhere('data_ikm', array('id_ikm' => $id_ikm))->result();
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
			'alamat_ikm' => $alamat_ikm,
			'tanggal_update' => date("Y-m-d H:i:s")
		);

		$this->MainModel->updateData('data_ikm', $data_ikm, array('id_ikm' => $id_ikm));
		$session = array (
			'msg' => 'Data IKM Berhasil Diupdate',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
		redirect('MainController/data_master');
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
			redirect('MainController/data_master');
		}

		if ($cek > 0) {
			redirect('MainController/data_master');
		}

		$header['title']	= 'Tambah '.ucwords($role);
		$header['page']		= 'data master';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
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

		$rand = $this->rand_string(8);

		if ($role == 'pimpinan_ikm') {
			$jabatan = 'Ketua';
		} else if ($role == 'admin_ikm') {
			$jabatan = 'Karyawan';
		}

		$cek = $this->MainModel->getWhere('data_karyawan', array('nik' => $nik))->num_rows();

		if ($cek > 0) {
			$session = array (
				'msg' => 'NIK Karyawan sudah terdaftar',
				'alert' => 'success'
			);

			$this->session->set_userdata($session);
			redirect('MainController/tambah_user');
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
				'username' 		=> $rand,
				'user_pwd'		=> $rand,
				'role'			=> $role
				//'tanggal_dibuat'=> date("Y-m-d H:i:s")
			);

			$this->MainModel->inputData('data_user', $data2);
			$session = array (
				'msg' => 'Data berhasil ditambahkan',
				'alert' => 'success'
			);

			$this->session->set_userdata($session);
			redirect('MainController/detail_ikm/'.$id_ikm);
		}
	}

	// Fungsi User khusus buat admin bumdes dan admin ikm

	public function data_user()
	{
		if (!in_array($this->session->userdata('role'), array('admin_ikm'))) {
			redirect('MainController/no_access');
		}
		$header['title']	= 'Data User';
		$header['page']		= 'data user';
		// if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
		// 	$data['data_sdm']	= $this->MainModel->getJoinWhere('data_karyawan', 'data_user', 'data_karyawan.id_karyawan = data_user.id_karyawan', 'data_user.role NOT IN ("admin_bumdes", "pimpinan_bumdes", "pimpinan_ikm", "admin_ikm")')->result();
		// } else {
		$data['data_sdm']	= $this->MainModel->getJoinWhere('data_user', 'data_karyawan', 'data_karyawan.id_karyawan = data_user.id_karyawan', array('data_karyawan.id_ikm' => $this->session->userdata('id_ikm')))->result();
		// }

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
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

		$rand = $this->rand_string(8);

		$data = array(
			'id_karyawan'	=> $id_karyawan,
			'username' 		=> $rand,
			'user_pwd'		=> $rand,
			'role'			=> 'operator_ikm'
		);

		$this->MainModel->inputData('data_user', $data);

		$session = array(
			'username' => $rand,
			'password' => $rand,
			'msg' => 'User Baru berhasil ditambahkan'
		);

		redirect('MainController/data_user');
	}

	public function reset_user($id_user, $id_ikm = '')
	{
		if (!in_array($this->session->userdata('role'), array('admin_bumdes', 'admin_ikm'))) {
			redirect('MainController/no_access');
		}

		$rand = $this->rand_string(8);
		
		$data = array(
			'username' => $rand,
			'user_pwd' => $rand,
			'tanggal_update'=> date("Y-m-d H:i:s")
		);

		$where = array(
			'id_user' => $id_user
		);

		$this->MainModel->updateData('data_user', $data, $where);

		$session = array(
			'username' => $rand,
			'password' => $rand,
			'msg' => 'Data User berhasil direset'
		);

		if ($this->session->role == 'admin_ikm') {
			redirect('MainController/data_user');
		} else if ($this->session->role == 'admin_bumdes') {
			redirect('MainController/detail_ikm/'.$id_ikm);
		}
	}

	public function delete_user($id_user)
	{
		if (!in_array($this->session->userdata('role'), array('admin_bumdes', 'admin_ikm'))) {
			redirect('MainController/no_access');
		}

		$this->MainModel->deleteData('data_user', array('id_user' => $id_user));
		$session = array (
			'msg' => 'User berhasil dihapus',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
		redirect('MainController/data_user');
	}

	// Fungsi Pemasaran

	public function pemasaran()
	{
		$header['title']	= 'Pemasaran dan Periklanan';
		$header['page']		= 'pemasaran';
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pemasaran/pasariklan');
		$this->load->view('layouts/footer');
	}

	// Fungsi Produk

	public function data_produk()
	{
		$header['title']	= 'Pemasaran dan Periklanan';
		$header['page']		= 'pemasaran';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}
		
		if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
			$data['data_produk']	= $this->MainModel->getJoin('data_ikm', 'data_produk', 'data_produk.id_ikm = data_ikm.id_ikm')->result();
		} else {
			$data['data_produk']	= $this->MainModel->getJoinWhere('data_produk', 'data_ikm', 'data_produk.id_ikm = data_ikm.id_ikm', array('data_produk.id_ikm' => $this->session->userdata('id_ikm')))->result();
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pemasaran/list_produk', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_produk()
	{
		$this->auth_ikm();

		$header['title']	= 'Pemasaran dan Periklanan';
		$header['page']		= 'pemasaran';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pemasaran/tambah_produk', $data);
		$this->load->view('layouts/footer');
	}

	public function detail_produk($id_produk)
	{
		$header['title']	= 'Pemasaran dan Periklanan';
		$header['page']		= 'pemasaran';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$data['data_produk']	= $this->MainModel->getJoinWhere('data_produk', 'data_ikm', 'data_produk.id_ikm = data_ikm.id_ikm', array('data_produk.id_data_produk' => $id_produk))->result();
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pemasaran/detail_produk', $data);
		$this->load->view('layouts/footer');
	}

	public function input_produk()
	{
		$nama_produk = $this->input->post('nama_produk');
		$harga_satuan = $this->input->post('harga_satuan');
		$stok = $this->input->post('stok');

		$cek = $this->MainModel->getWhere('data_produk', array('nama_produk' => $nama_produk))->num_rows();

		if ($cek > 0) {
			$session = array (
				'msg' => 'Produk dengan nama '.$nama_produk.' sudah terdaftar',
				'alert' => 'danger'
			);

			$this->session->set_userdata($session);
			redirect('MainController/tambah_produk');
		} else {
			$data = array(
				'nama_produk'	=> $nama_produk,
				'id_ikm'		=> $this->session->userdata('id_ikm'),
				'harga_satuan'	=> $harga_satuan,
				'stok'			=> $stok
			);

			$this->MainModel->inputData('data_produk', $data);
			$session = array (
				'msg' => 'Data Produk berhasil ditambahkan',
				'alert' => 'success'
			);

			$this->session->set_userdata($session);
			redirect('MainController/data_produk');
		}
	}

	public function update_produk($id_produk)
	{
		$nama_produk = $this->input->post('nama_produk');
		$harga_satuan = $this->input->post('harga_satuan');
		$stok = $this->input->post('stok');

		$data = array(
				'nama_produk'	=> $nama_produk,
				'harga_satuan'	=> $harga_satuan,
				// 'stok'			=> $stok,
				'tanggal_update'=> date("Y-m-d H:i:s")
			);

		$where = array(
			'id_data_produk' => $id_produk
		);

		$this->MainModel->updateData('data_produk', $data, $where);
		$session = array (
			'msg' => 'Data Produk berhasil diubah',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
		redirect('MainController/data_produk');
	}

	public function delete_produk($id_produk)
	{
		$cek = $this->MainModel->getWhere('detail_transaksi', array('id_produk' => $id_produk))->num_rows();
		
		if ($cek > 0) {
			$session = array (
				'msg' => 'Data Produk gagal dihapus dikarenakan pernah terdapat pada suatu transaksi',
				'alert' => 'danger'
			);

			$this->session->set_userdata($session);
		} else {
			$this->MainModel->deleteData('data_produk', array('id_data_produk' => $id_produk));
			$session = array (
				'msg' => 'Data Produk berhasil dihapus',
				'alert' => 'success'
			);

			$this->session->set_userdata($session);
		}
			redirect('MainController/data_produk');
	}

	// Fungsi Transaksi

	public function data_transaksi()
	{
		$header['title']	= 'Pemasaran dan Periklanan';
		$header['page']		= 'pemasaran';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}
		
		if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
			$data['transaksi'] = $this->MainModel->getJoin('data_pelanggan', 'data_transaksi', 'data_pelanggan.id_perusahaan = data_transaksi.id_pelanggan')->result();
		} else {
			$data['transaksi'] = $this->MainModel->getJoinWhere('data_pelanggan', 'data_transaksi', 'data_pelanggan.id_perusahaan = data_transaksi.id_pelanggan', array('data_transaksi.id_ikm' => $this->session->id_ikm))->result();
		}


		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pemasaran/list_transaksi', $data);
		$this->load->view('layouts/footer');
	}

	public function detail_transaksi($id_transaksi)
	{
		$header['title']	= 'Pemasaran dan Periklanan';
		$header['page']		= 'pemasaran';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}
		
		$data['transaksi'] = $this->MainModel->getJoinWhere('data_pelanggan', 'data_transaksi', 'data_pelanggan.id_perusahaan = data_transaksi.id_pelanggan', array('data_transaksi.id_transaksi' => $id_transaksi))->result();

		$data['detail_transaksi'] = $this->MainModel->getJoinWhere('data_produk', 'detail_transaksi', 'data_produk.id_data_produk = detail_transaksi.id_produk', array('id_transaksi' => $id_transaksi))->result();
		$data['id_transaksi'] = $id_transaksi;

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pemasaran/detail_transaksi', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_transaksi()
	{
		$this->auth_ikm();

		$header['title']	= 'Pemasaran dan Periklanan';
		$header['page']		= 'pemasaran';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$data['pelanggan'] = $this->MainModel->getWhere('data_pelanggan', array('id_ikm' => $this->session->id_ikm))->result();

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pemasaran/tambah_transaksi', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_detail_transaksi($id_transaksi)
	{
		$this->auth_ikm();

		$header['title']	= 'Pemasaran dan Periklanan';
		$header['page']		= 'pemasaran';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$data['produk'] = $this->MainModel->getWhere('data_produk', array('id_ikm' => $this->session->id_ikm))->result();
		$data['id_transaksi'] = $id_transaksi;

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pemasaran/tambah_detail_transaksi', $data);
		$this->load->view('layouts/footer');
	}

	public function input_transaksi()
	{
		$tanggal = $this->input->post('tanggal');
		$id_pelanggan = $this->input->post('pelanggan');

		$number = $this->MainModel->getWhere('data_transaksi', array('id_ikm' => $this->session->id_ikm))->last_row()->no_transaksi;

		if (is_null($number)) {
			$number = 1;
		} else {
			$number = substr($number,12) + 1;
		}

		$no_transaksi = date('dm').'/'.date('y').'/'.str_pad($this->session->id_ikm,3,"0", STR_PAD_LEFT).'/'.str_pad($number,5,"0", STR_PAD_LEFT);

		$data = array(
			'tanggal' => $tanggal,
			'id_pelanggan' => $id_pelanggan,
			'id_ikm' => $this->session->id_ikm,
			'no_transaksi' => $no_transaksi
		);

		$this->MainModel->inputData('data_transaksi', $data);
		$session = array (
			'msg' => 'Data Transaksi berhasil ditambahkan',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
		redirect('MainController/data_transaksi');
	}

	public function delete_transaksi($id_transaksi)
	{
		$data_transaksi = $this->MainModel->getWhere('detail_transaksi', array('id_transaksi' => $id_transaksi));
		$cek = $data_transaksi->num_rows();
		
		if ($cek > 0) {
			$this->session->set_userdata('flag', 'process delete');
			$detail_transaksi = $data_transaksi->result();
			foreach ($detail_transaksi as $key) {
				$this->delete_detail_transaksi($key->id_det_transaksi);
			}
			$this->session->unset_userdata('flag');
		}

		$this->MainModel->deleteData('data_transaksi', array('id_transaksi' => $id_transaksi));
		$session = array (
			'msg' => 'Data Transaksi berhasil dihapus',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
		redirect('MainController/data_transaksi');
	}

	public function input_detail_transaksi($id_transaksi)
	{
		$id_produk = $this->input->post('produk');
		$jumlah_barang = $this->input->post('jumlah');

		$data_produk = $this->MainModel->getWhere('data_produk', array('id_data_produk' => $id_produk))->row(); // ambil data produknya
		$harga_satuan = $data_produk->harga_satuan; // ambil harga satuannya
		$stok = $data_produk->stok; // ambil stok produknya
		$stok_update = $stok - $jumlah_barang; // stok sekarang dikurangi stok yang mau dipake transaksi
		$total_harga = $jumlah_barang * $harga_satuan; // hitung total harganya

		$total_transaksi = $this->MainModel->getWhere('data_transaksi', array('id_transaksi' => $id_transaksi))->row()->total; //ambil total harga sekarang
		$total = $total_transaksi + $total_harga; // total harga buat dimasukin ke data_transaksi

		if ($stok_update >= 0) { // kalo stok setelah dikurangi masih lebih dari 0 proses lanjut
			$data = array(
				'id_transaksi' => $id_transaksi,
				'id_produk' => $id_produk,
				'harga_satuan_transaksi' => $harga_satuan,
				'jumlah_barang' => $jumlah_barang
			);

			$update_produk = array(
				'stok' => $stok_update,
				'tanggal_update' => date("Y-m-d H:i:s")
			);

			$update_transaksi = array(
				'total' => $total,
				'tanggal_update' => date("Y-m-d H:i:s")
			);

			$this->MainModel->inputData('detail_transaksi', $data);
			$this->MainModel->updateData('data_produk', $update_produk, array('id_data_produk' => $id_produk));
			$this->MainModel->updateData('data_transaksi', $update_transaksi, array('id_transaksi' => $id_transaksi));
			$session = array (
				'msg' => 'Berhasil menambahkan produk ke transaksi',
				'alert' => 'success'
			);

			$this->session->set_userdata($session);
			redirect('MainController/detail_transaksi/'.$id_transaksi);
		} else { // kalo stok kurang dari 0 gagal menambahkan produk ke transaksi
			$session = array (
				'msg' => 'Gagal menambah produk karena kekurangan stok',
				'alert' => 'danger'
			);

			$this->session->set_userdata($session);
			redirect('MainController/tambah_detail_transaksi/'.$id_transaksi);
		}
	}

	public function delete_detail_transaksi($id_det_transaksi)
	{
		$data_detail_transaksi = $this->MainModel->getWhere('detail_transaksi', array('id_det_transaksi' => $id_det_transaksi))->row();
		$id_transaksi = $data_detail_transaksi->id_transaksi; // ambil id transaksi di detail_transaksi
		$id_produk = $data_detail_transaksi->id_produk; // ambil id produk di detail_transaksi

		$stok_produk = $this->MainModel->getWhere('data_produk', array('id_data_produk' => $id_produk))->row()->stok; // ambil stok produknya
		$total_transaksi = $this->MainModel->getWhere('data_transaksi', array('id_transaksi' => $id_transaksi))->row()->total; // ambil nominal total transaksi di data_transaksi

		$jumlah_barang = $data_detail_transaksi->jumlah_barang; // ambil jumlah barang dari detail transaksi
		$harga_satuan_transaksi = $data_detail_transaksi->harga_satuan_transaksi; // ambil harga satuan yang ada di detail transaksi

		$stok_update = $stok_produk + $jumlah_barang; // stok buat update di data_produk

		$total_detail = $harga_satuan_transaksi * $jumlah_barang; // hitung total harga dari produk
		$total_update = $total_transaksi - $total_detail; // harga buat update di data_transaksi

		$update_transaksi = array (
			'total' => $total_update,
			'tanggal_update' => date("Y-m-d H:i:s")
		);

		$update_produk = array(
			'stok' => $stok_update,
			'tanggal_update' => date("Y-m-d H:i:s")
		);

		$this->MainModel->deleteData('detail_transaksi', array('id_det_transaksi' => $id_det_transaksi));
		$this->MainModel->updateData('data_produk', $update_produk, array('id_data_produk' => $id_produk));
		$this->MainModel->updateData('data_transaksi', $update_transaksi, array('id_transaksi' => $id_transaksi));

		if ($this->session->flag != 'process delete') {
			$session = array (
				'msg' => 'Produk berhasil dihapus dari transaksi',
				'alert' => 'success'
			);

			$this->session->set_userdata($session);
			redirect('MainController/detail_transaksi/'.$id_transaksi);
		}
	}

	// Fungsi SDM

	public function data_sdm()
	{
		$header['title']	= 'Sumber Daya Manusia';
		$header['page']		= 'sdm';
		if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
			$data['data_sdm']	= $this->MainModel->getJoin('data_ikm', 'data_karyawan', 'data_karyawan.id_ikm = data_ikm.id_ikm')->result();
		} else {
			$data['data_sdm']	= $this->MainModel->getJoinWhere('data_karyawan', 'data_ikm', 'data_karyawan.id_ikm = data_ikm.id_ikm', array('data_karyawan.id_ikm' => $this->session->userdata('id_ikm')))->result();
		}

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/sdm/list_sdm', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_sdm()
	{
		$this->auth_ikm();

		$header['title']	= 'Sumber Daya Manusia';
		$header['page']		= 'sdm';
		
		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
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

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

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
			$session = array (
				'msg' => 'NIK Karyawan sudah terdaftar',
				'alert' => 'danger'
			);

			$this->session->set_userdata($session);
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
			$session = array (
				'msg' => 'Data Karyawan berhasil ditambahkan',
				'alert' => 'success'
			);

			$this->session->set_userdata($session);
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
		$session = array (
			'msg' => 'Data Karyawan berhasil diubah',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
		redirect('MainController/data_sdm');

	}

	public function delete_sdm($id_karyawan)
	{
		$this->MainModel->deleteData('data_karyawan', array('id_karyawan' => $id_karyawan));
		$this->MainModel->deleteData('data_user', array('id_karyawan' => $id_karyawan));
		$session = array (
			'msg' => 'Data Karyawan berhasil dihapus',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
		redirect('MainController/data_sdm');
	}

	// Fungsi Produksi

	public function data_produksi()
	{
		$header['title']	= 'Produksi';
		$header['page']		= 'produksi';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
			$data['produksi']	= $this->MainModel->getJoin('data_produk', 'data_produksi', 'data_produksi.id_produk = data_produk.id_data_produk')->result();
		} else {
			$data['produksi']	= $this->MainModel->getJoinWhere('data_produksi', 'data_produk', 'data_produksi.id_produk = data_produk.id_data_produk', array('data_produksi.id_ikm' => $this->session->userdata('id_ikm')))->result();
		}
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/produksi/list_produksi', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_produksi()
	{
		$this->auth_ikm();

		$header['title']	= 'Produksi';
		$header['page']		= 'produksi';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
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

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$data['data_produksi']	= $this->MainModel->getWhere('data_produksi', array('id_data_produksi' => $id_produksi));
		$id_ikm = $data['data_produksi']->row()->id_ikm;
		$data['data_produksi'] = $data['data_produksi']->result();
		
		$data['produk']	= $this->MainModel->getWhere('data_produk', array('id_ikm' => $id_ikm))->result();

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

		$where = array(
			'id_data_produk' => $id_produk
		);

		$stok = $this->MainModel->getWhere('data_produk', $where)->row()->stok;

		$update_stock = array(
			'stok' => $stok + $jumlah,
			'tanggal_update'=> date("Y-m-d H:i:s")
		);

		$this->MainModel->inputData('data_produksi', $data);
		$this->MainModel->updateData('data_produk', $update_stock, $where);
		$session = array (
			'msg' => 'Data Produksi berhasil ditambahkan',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
		redirect('MainController/data_produksi');
	}

	public function update_produksi($id_produksi)
	{
		$tgl = $this->input->post('tanggal_produksi');
		$id_produk = $this->input->post('produk');
		$produksi_baru = $this->input->post('jumlah_produksi');
		$bahan_mentah = $this->input->post('bahan_mentah');
		
		$stok_sekarang = $this->MainModel->getWhere('data_produk', array('id_data_produk' => $id_produk))->row()->stok;
		$produksi_lama = $this->MainModel->getWhere('data_produksi', array('id_data_produksi'=>$id_produksi))->row()->jumlah_produksi;
		$stok_awal = $stok_sekarang - $produksi_lama;
		$stok_update = $stok_awal + $produksi_baru;

		if ($stok_update < 0) {
			$session = array (
				'msg' => 'Data Produksi gagal diubah karena stok produk akan minus',
				'alert' => 'danger'
			);

			$this->session->set_userdata($session);
			redirect('MainController/detail_produksi/'.$id_produksi);
		} else {
			$data = array(
				'tanggal' => $tgl,
				'id_produk' => $id_produk,
				'jenis_bahan_mentah' => $bahan_mentah,
				'jumlah_produksi' => $produksi_baru,
				'tanggal_update'=> date("Y-m-d H:i:s")
			);

			$where = array(
				'id_data_produksi' => $id_produksi
			);

			$update_stok = array(
				'stok' => $stok_update,
				'tanggal_update'=> date("Y-m-d H:i:s")
			);


			$this->MainModel->updateData('data_produksi', $data, $where);
			$this->MainModel->updateData('data_produk', $update_stok, array('id_data_produk' => $id_produk));
			$session = array (
				'msg' => 'Data Produksi berhasil diubah',
				'alert' => 'success'
			);

			$this->session->set_userdata($session);
			redirect('MainController/data_produksi');
		}
	}

	public function delete_produksi($id_produksi)
	{
		$data_produksi = $this->MainModel->getWhere('data_produksi', array('id_data_produksi' => $id_produksi))->row();
		$id_produk = $data_produksi->id_produk;
		$data_produk = $this->MainModel->getWhere('data_produk', array('id_data_produk' => $id_produk))->row();
		$stok = $data_produk->stok;
		$produksi = $data_produksi->jumlah_produksi;
		$stok_update = $stok - $produksi;

		if ($stok_update < 0) {
			$session = array (
				'msg' => 'Data Produksi gagal diubah karena stok produk akan minus',
				'alert' => 'danger'
			);

			$this->session->set_userdata($session);
		} else {
			$this->MainModel->updateData('data_produk', array('stok' => $stok_update, 'tanggal_update'=> date("Y-m-d H:i:s")), array('id_data_produk' => $id_produk));
			$this->MainModel->deleteData('data_produksi', array('id_data_produksi' => $id_produksi));
			$session = array (
				'msg' => 'Data Produksi berhasil dihapus',
				'alert' => 'success'
			);

			$this->session->set_userdata($session);
		}
		redirect('MainController/data_produksi');
	}

	// Fungsi Pelayanan Konsumen

	public function pelayanan_konsumen()
	{
		$header['title']	= 'Pelayanan Konsumen';
		$header['page']		= 'pelayanan';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
			$data['pelayanan']	= $this->MainModel->getJoin('data_ikm', 'data_pelanggan', 'data_pelanggan.id_ikm = data_ikm.id_ikm')->result();
		} else {
			$data['pelayanan']	= $this->MainModel->getJoinWhere('data_pelanggan', 'data_ikm', 'data_pelanggan.id_ikm = data_ikm.id_ikm', array('data_pelanggan.id_ikm' => $this->session->userdata('id_ikm')))->result();
		}
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/pelayanan/list_pelayanan', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_konsumen()
	{
		$this->auth_ikm();

		$header['title']	= 'Pelayanan Konsumen';
		$header['page']		= 'pelayanan';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
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

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

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
		$session = array (
			'msg' => 'Data Pelanggan berhasil ditambahkan',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
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
		$session = array (
			'msg' => 'Data Pelanggan berhasil diubah',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
		redirect('MainController/pelayanan_konsumen');
	}

	public function delete_konsumen($id_konsumen)
	{
		$cek = $this->MainModel->getWhere('data_transaksi', array('id_pelanggan' => $id_konsumen))->num_rows();
		
		if ($cek > 0) {
			$session = array (
				'msg' => 'Data Pelanggan gagal dihapus dikarenakan pernah terdapat pada suatu transaksi',
				'alert' => 'danger'
			);

			$this->session->set_userdata($session);
		} else {
			$this->MainModel->deleteData('data_pelanggan', array('id_perusahaan' => $id_konsumen));
			$session = array (
				'msg' => 'Data Pelanggan berhasil dihapus',
				'alert' => 'success'
			);

			$this->session->set_userdata($session);
		}
			redirect('MainController/pelayanan_konsumen');
	}

	// Fungsi Keuangan

	public function data_laporan()
	{
		$header['title']	= 'Keuangan dan Akuntansi';
		$header['page']		= 'keuangan';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$data['keuangan'] = $this->MainModel->getKeuangan($this->session->id_ikm)->result();
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/keuangan/list_laporan', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_laporan()
	{
		$this->auth_ikm();

		$header['title']	= 'Keuangan dan Akuntansi';
		$header['page']		= 'keuangan';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/keuangan/tambah_laporan', $data);
		$this->load->view('layouts/footer');
	}

	public function detail_laporan($id_laporan)
	{
		$header['title']	= 'Keuangan dan Akuntansi';
		$header['page']		= 'keuangan';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$laporan = $this->MainModel->getWhere('laporan_keuangan', array('id_laporan' => $id_laporan))->row();
		$data['id_laporan'] = $laporan->id_laporan;
		$data['laporan'] = date("F Y", strtotime($laporan->tanggal));
		
		$data['keuangan'] = $this->MainModel->getWhere('detail_laporan_keuangan', array('id_laporan' => $id_laporan))->result();

		$data['total'] = $this->MainModel->getTotalKeuangan($id_laporan)->row()->total;
		
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/keuangan/detail_laporan', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_data_keuangan($id_laporan)
	{
		$this->auth_ikm();

		$header['title']	= 'Keuangan dan Akuntansi';
		$header['page']		= 'keuangan';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}
		$data['id_laporan'] = $id_laporan;

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/keuangan/tambah_keuangan', $data);
		$this->load->view('layouts/footer');
	}

	public function ubah_keuangan($id_laporan, $id_detail)
	{
		$header['title']	= 'Keuangan dan Akuntansi';
		$header['page']		= 'keuangan';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$data['id_laporan'] = $id_laporan;
		$data['keuangan'] = $this->MainModel->getWhere('detail_laporan_keuangan', array('id_detail' => $id_detail))->result();
		
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/keuangan/detail_keuangan', $data);
		$this->load->view('layouts/footer');
	}

	public function input_laporan()
	{
		$tanggal = $this->input->post('tanggal_laporan');

		$cek = $this->MainModel->getWhere('laporan_keuangan', array('tanggal' => $tanggal, 'id_ikm' => $this->session->id_ikm))->num_rows();

		$data = array(
			'tanggal' => $tanggal,
			'id_ikm' => $this->session->id_ikm
		);

		if ($cek > 0) {
			$session = array (
				'msg' => 'Laporan Bulan '.$tanggal.' sudah ada',
				'alert' => 'danger'
			);

			$this->session->set_userdata($session);
			redirect('MainController/tambah_laporan');
		} else {
			$this->MainModel->inputData('laporan_keuangan', $data);

			$session = array (
				'msg' => 'Laporan Bulan '.$tanggal.' berhasil ditambahkan',
				'alert' => 'success'
			);

			$this->session->set_userdata($session);
			redirect('MainController/data_laporan');
		}
	}

	public function input_data_keuangan($id_laporan)
	{
		$tanggal = $this->input->post('tanggal_laporan');
		$ket = $this->input->post('keterangan');
		$pengeluaran = $this->input->post('pengeluaran');
		$pemasukan = $this->input->post('pemasukan');

		$data = array(
			'tanggal' => $tanggal,
			'aktivitas' => $ket,
			'pengeluaran' => $pengeluaran,
			'pemasukan' => $pemasukan,
			'id_laporan' => $id_laporan
		);


		$this->MainModel->inputData('detail_laporan_keuangan', $data);

		$session = array (
			'msg' => 'Data Keuangan berhasil ditambahkan',
			'alert' => 'success'
		);
		$this->session->set_userdata($session);
		redirect('MainController/detail_laporan/'.$id_laporan);
	}

	public function update_data_keuangan($id_laporan, $id_detail)
	{
		$tanggal = $this->input->post('tanggal_laporan');
		$ket = $this->input->post('keterangan');
		$pengeluaran = $this->input->post('pengeluaran');
		$pemasukan = $this->input->post('pemasukan');

		$data = array(
			'tanggal' => $tanggal,
			'aktivitas' => $ket,
			'pengeluaran' => $pengeluaran,
			'pemasukan' => $pemasukan,
			'tanggal_update'=> date("Y-m-d H:i:s")
		);

		$where = array(
			'id_detail' => $id_detail
		);


		$this->MainModel->updateData('detail_laporan_keuangan', $data, $where);

		$session = array (
			'msg' => 'Data Keuangan berhasil diubah',
			'alert' => 'success'
		);
		$this->session->set_userdata($session);
		redirect('MainController/detail_laporan/'.$id_laporan);
	}

	//Fungsi Teknologi Informasi

	public function data_tekfo(){
		$header['title']	= 'Teknologi Informasi';
		$header['page']		= 'tekfo';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) {
			$data['teknologi'] = $this->MainModel->get('teknologi_informasi')->result();
		} else {
			$data['teknologi'] = $this->MainModel->getWhere('teknologi_informasi', array('id_ikm' => $this->session->id_ikm))->result();
		}
		
		$this->load->view('layouts/header', $header);
		$this->load->view('pages/tekfo/list_tekfo', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah_tekfo()
	{
		$this->auth_ikm();

		$header['title']	= 'Teknologi Informasi';
		$header['page']		= 'tekfo';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/tekfo/tambah_tekfo', $data);
		$this->load->view('layouts/footer');
	}

	public function detail_tekfo($id_tekfo)
	{
		$header['title']	= 'Teknologi Informasi';
		$header['page']		= 'tekfo';

		if ($this->session->has_userdata('msg')) {
			$data['msg']		= $this->session->msg;
			$data['alert']		= $this->session->alert;
			$this->session->unset_userdata(array ('msg', 'alert'));
		} else {
			$data['msg']		= '';
		}

		$data['teknologi'] = $this->MainModel->getWhere('teknologi_informasi', array('id_tekfo' => $id_tekfo))->result();

		$this->load->view('layouts/header', $header);
		$this->load->view('pages/tekfo/detail_tekfo', $data);
		$this->load->view('layouts/footer');
	}

	public function input_tekfo()
	{
		$nama_barang = $this->input->post('nama_barang');
		$tipe_merk = $this->input->post('tipe_merk');
		$dana = $this->input->post('dana');
		$jumlah_baik = $this->input->post('jumlah_baik');
		$jumlah_kurang = $this->input->post('jumlah_kurang');
		$jumlah_buruk = $this->input->post('jumlah_buruk');

		$cek_barang = $this->MainModel->getWhere('teknologi_informasi', array('nama_barang' => $nama_barang))->num_rows();
		$cek_tipe_merk = $this->MainModel->getWhere('teknologi_informasi', array('tipe_merk' => $tipe_merk))->num_rows();

		if ($cek_barang > 0 && $cek_tipe_merk > 0) {
			$session = array (
				'msg' => 'Barang dengan nama '.$nama_barang.' dan Tipe/Merk '.$tipe_merk.' sudah terdaftar',
				'alert' => 'danger'
			);

			$this->session->set_userdata($session);
			redirect('MainController/tambah_tekfo');
		} else {
			$data = array(
				'id_ikm'		=> $this->session->userdata('id_ikm'),
				'nama_barang'	=> $nama_barang,
				'tipe_merk'		=> $tipe_merk,
				'sumber_dana'	=> $dana,
				'kondisi_baik'	=> $jumlah_baik,
				'kondisi_kurang'=> $jumlah_kurang,
				'kondisi_buruk'	=> $jumlah_buruk
			);

			$this->MainModel->inputData('teknologi_informasi', $data);
			$session = array (
				'msg' => 'Data Teknologi Informasi berhasil ditambahkan',
				'alert' => 'success'
			);

			$this->session->set_userdata($session);
			redirect('MainController/data_tekfo');
		}
	}

	public function update_tekfo($id_tekfo)
	{
		$nama_barang = $this->input->post('nama_barang');
		$tipe_merk = $this->input->post('tipe_merk');
		$dana = $this->input->post('dana');
		$jumlah_baik = $this->input->post('jumlah_baik');
		$jumlah_kurang = $this->input->post('jumlah_kurang');
		$jumlah_buruk = $this->input->post('jumlah_buruk');

		$data = array(
			'nama_barang'	=> $nama_barang,
			'tipe_merk'		=> $tipe_merk,
			'sumber_dana'	=> $dana,
			'kondisi_baik'	=> $jumlah_baik,
			'kondisi_kurang'=> $jumlah_kurang,
			'kondisi_buruk'	=> $jumlah_buruk,
			'tanggal_update'=> date("Y-m-d H:i:s")
		);

		$where = array(
			'id_tekfo' => $id_tekfo
		);

		$this->MainModel->updateData('teknologi_informasi', $data, $where);
		$session = array (
			'msg' => 'Data Teknologi Informasi berhasil diubah',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
		redirect('MainController/data_tekfo');
	}

	public function delete_tekfo($id_tekfo)
	{
		$this->MainModel->deleteData('teknologi_informasi', array('id_tekfo' => $id_tekfo));
		$session = array (
			'msg' => 'Data Teknologi Informasi berhasil dihapus',
			'alert' => 'success'
		);

		$this->session->set_userdata($session);
		redirect('MainController/data_tekfo');
	}

	// test aja

	public function test()
	{
		$data = $this->MainModel->getKeuangan(1)->result();

		var_dump($data);
	}


}
