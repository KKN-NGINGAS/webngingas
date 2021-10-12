<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OperatorController extends CI_Controller {

	/**
	 Controller untuk Operator IKM
	 */
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('ModelOperator');
		date_default_timezone_set("Asia/Jakarta");

		if (!in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) {
			redirect(base_url());
		}
	}

	public function index()
	{
		// $this->load->view('welcome_message');
		echo "Hai ".$this->session->userdata('nama')." - Sang ".$this->session->userdata('role');
		echo "<br><a href='".base_url()."Logout'>Logout</a>";
	}

	// VIEW
	// Produksi
	//

	public function produksi_operator(){
		$header['title']	= 'Produksi';
		$header['page']	= 'produksi';
		$result['data_produksi'] = $this->ModelOperator->getAll("data_produksi");
        $this->load->view('layouts/header', $header);
        $this->load->view('pages/produksi/operator', $result);
        $this->load->view('layouts/footer');
    }

	public function produksi_edit_operator($id){
		
		$header['title']	= 'Edit Produksi';
		$header['page']	= 'produksi';

		// here we select every column of the table
		$result['data'] = $this->ModelOperator->getbyid('data_produksi',$id);
		// $result['data'] = $this->ModelOperator->getById_hehe('data_produksi',$id);


        $this->load->view('layouts/header', $header);
        $this->load->view('pages/produksi/edit', $result);
        $this->load->view('layouts/footer');
    }

    public function produksi_tambah_operator(){
		$header['title']	= 'Tambah Produksi';
		$header['page']	= 'produksi';
        $this->load->view('layouts/header', $header);
        $this->load->view('pages/produksi/tambah_operator');
        $this->load->view('layouts/footer');
    }

    public function produksi_tambah_berhasil_operator(){
		$header['title']	= 'Tambah Produksi Berhasil';
		$header['page']	= 'produksi';
        $this->load->view('layouts/header', $header);
        $this->load->view('pages/produksi/tambah_berhasil_operator');
        $this->load->view('layouts/footer');
    }

	// FORM
	// Produksi
	//

	public function produksi_tambah_operator_insert(){
		$tanggal_produksi = $this->input->post('tanggal_produksi');
		$jenis_produk = $this->input->post('jenis_produk');
		$jenis_bahan_mentah = $this->input->post('jenis_bahan_mentah');
		$harga_satuan_produksi = $this->input->post('harga_satuan_produksi');
		$jumlah_produksi = $this->input->post('jumlah_produksi');

		$kuantitas = $jumlah_produksi;
 
		$data = array(
			'tanggal' => $tanggal_produksi,
			'jenis_produk' => $jenis_produk,
			'jenis_bahan_mentah' => $jenis_bahan_mentah,
			'harga_satuan' => $harga_satuan_produksi,
			'kuantitas' => $kuantitas,
			'jumlah_produksi' => $jumlah_produksi,
		);
		$this->ModelOperator->input_data('data_produksi',$data);
		redirect('produksi/operator');
    }

	public function produksi_tambah_operator_edit(){
		$tanggal_produksi = $this->input->post('tanggal_produksi');
		$jenis_produk = $this->input->post('jenis_produk');
		$jenis_bahan_mentah = $this->input->post('jenis_bahan_mentah');
		$harga_satuan_produksi = $this->input->post('harga_satuan_produksi');
		$jumlah_produksi = $this->input->post('jumlah_produksi');

		$kuantitas = $jumlah_produksi;
 
		$data = array(
			'tanggal' => $tanggal_produksi,
			'jenis_produk' => $jenis_produk,
			'jenis_bahan_mentah' => $jenis_bahan_mentah,
			'harga_satuan' => $harga_satuan_produksi,
			'kuantitas' => $kuantitas,
			'jumlah_produksi' => $jumlah_produksi,
		);
		$this->ModelOperator->input_data('data_produksi',$data);
		redirect('produksi/operator');
    }

	// VIEW
	// Keuangan
	//

	public function keuangan_operator(){
		$header['title']	= 'Keuangan';
		$header['page']	= 'keuangan';

		$result['laporan_keuangan'] = $this->ModelOperator->getAll("laporan_keuangan");		
		$result['laporan_keuangan_2']	= $this->ModelOperator->getJoin('laporan_keuangan', 'data_ikm', 'laporan_keuangan.id_ikm = data_ikm.id_ikm')->result();

        $this->load->view('layouts/header', $header);
        $this->load->view('pages/keuangan/operator', $result);
        $this->load->view('layouts/footer');
    }
	
    public function keuangan_detail_operator($id, $id_ikm){
		$header['title']	= 'Keuangan Detail';
		$header['page']	= 'keuangan';

		$result['detail_laporan_keuangan'] = $this->ModelOperator->getbyid('id_laporan', 'detail_laporan_keuangan', $id);
		$result['data_ikm']	= $this->ModelOperator->getJoinWhere('laporan_keuangan', 'data_ikm', 'laporan_keuangan.id_ikm = data_ikm.id_ikm', array('laporan_keuangan.id_ikm' => $id_ikm))->result();		

		$result['laporan_keuangan'] = $this->ModelOperator->getbyid('id_laporan', 'laporan_keuangan', $id);

		// UPDATE kolom laba yang ada ditable page sebelumnya
		$detail_laporan_keuangan = $this->ModelOperator->getbyid('id_laporan', 'detail_laporan_keuangan', $id);

		$laba = 0;
		foreach($detail_laporan_keuangan as $detail){			
			$laba =  $laba + $detail->pemasukan - $detail->pengeluaran;
		}

		// current time stamp
		date_default_timezone_set("Asia/Jakarta");		
		$date = date("Y-m-d H:i:s");

		$data = array(
			'laba' => $laba,
			'updated_at' => $date,
		);

		$where = array(
			'id_laporan' => $id,
		);

		$this->ModelOperator->updateData('laporan_keuangan', $data, $where);		
		
		// lempar ke view
        $this->load->view('layouts/header', $header);
        $this->load->view('pages/keuangan/detail_operator', $result);
        $this->load->view('layouts/footer');
    }

	public function tambah_operator(){
		$header['title']	= 'Tambah Data Keuangan';
		$header['page']	= 'keuangan';

		$result['data_ikm'] = $this->ModelOperator->getAllSortBy("data_ikm", "nama_ikm");

        $this->load->view('layouts/header', $header);
        $this->load->view('pages/keuangan/tambah_operator', $result);
        $this->load->view('layouts/footer');
    }

	public function tambah_detail_operator($id_laporan){
		$header['title']	= 'Tambah Detail Laporan Keuangan';
		$header['page']	= 'keuangan';

		$result['laporan_keuangan'] = $this->ModelOperator->getbyid('id_laporan', 'laporan_keuangan', $id_laporan);

        $this->load->view('layouts/header', $header);
        $this->load->view('pages/keuangan/tambah_detail_operator', $result);
        $this->load->view('layouts/footer');
    }

	public function edit_detail_operator($id_laporan, $id_detail){
		$header['title']	= 'Edit Detail Laporan Keuangan';
		$header['page']	= 'keuangan';

		$result['laporan_keuangan'] = $this->ModelOperator->getbyid('id_laporan', 'laporan_keuangan', $id_laporan);
		$result['detail_laporan_keuangan'] = $this->ModelOperator->getbyid('id_detail', 'detail_laporan_keuangan', $id_detail);

        $this->load->view('layouts/header', $header);
        $this->load->view('pages/keuangan/edit_detail_operator', $result);
        $this->load->view('layouts/footer');
    }

	// FORM
	// Keuangan
	//

	public function tambah_operator_insert(){
		$id_ikm = $this->input->post('id_ikm');
		$tanggal_keuangan = $this->input->post('tanggal_keuangan');

		// current time stamp
		date_default_timezone_set("Asia/Jakarta");		
		$date = date("Y-m-d H:i:s");				
 
		$data = array(
			'id_ikm' => $id_ikm,
			'tanggal' => $tanggal_keuangan,
			'created_at' => $date,
			'updated_at' => $date,
		);
		$this->ModelOperator->input_data('laporan_keuangan',$data);
		redirect('keuangan/operator');
    }

	public function tambah_detail_operator_insert($id_laporan){
		$aktivitas = $this->input->post('aktivitas');
		$tanggal_detail_keuangan = $this->input->post('tanggal_detail_keuangan');
		$pemasukan = $this->input->post('pemasukan');
		$pengeluaran = $this->input->post('pengeluaran');

		// current time stamp
		date_default_timezone_set("Asia/Jakarta");		
		$date = date("Y-m-d H:i:s");				
 
		$data = array(
			'id_laporan' => $id_laporan,
			'aktivitas' => $aktivitas,
			'tanggal' => $tanggal_detail_keuangan,
			'pemasukan' => $pemasukan,
			'pengeluaran' => $pengeluaran,
			'created_at' => $date,
			'updated_at' => $date,
		);
		$this->ModelOperator->input_data('detail_laporan_keuangan',$data);
		redirect('keuangan/detail_operator/'.$id_laporan);
    }

	public function edit_detail_operator_insert($id_laporan, $id_detail){
		$aktivitas = $this->input->post('aktivitas');
		$tanggal_detail_keuangan = $this->input->post('tanggal_detail_keuangan');
		$pemasukan = $this->input->post('pemasukan');
		$pengeluaran = $this->input->post('pengeluaran');

		// current time stamp
		date_default_timezone_set("Asia/Jakarta");		
		$date = date("Y-m-d H:i:s");				
 
		$data = array(
			'aktivitas' => $aktivitas,
			'tanggal' => $tanggal_detail_keuangan,
			'pemasukan' => $pemasukan,
			'pengeluaran' => $pengeluaran,
			'updated_at' => $date,
		);

		$where = array(
			'id_detail' => $id_detail,
		);

		$this->ModelOperator->updateData('detail_laporan_keuangan', $data, $where);

		redirect('keuangan/detail_operator/'.$id_laporan);
    }

	public function delete_detail_operator($id_laporan, $id_detail){

		$this->ModelOperator->deleteBy('detail_laporan_keuangan','id_detail',$id_detail);

		redirect('keuangan/detail_operator/'.$id_laporan);
	}

	// VIEW
	// TEKFO
	//

	public function tekfo_operator(){
		$header['title']	= 'Teknologi Informasi';
		$header['page']	= 'tekfo';

		$result['teknologi_informasi'] = $this->ModelOperator->getAll("teknologi_informasi");
		$result['teknologi_informasi_join']	= $this->ModelOperator->getJoin('teknologi_informasi', 'teknologi_informasi_kondisi_barang', 'teknologi_informasi.id_ti = teknologi_informasi_kondisi_barang.id_kondisi_barang')->result();

        $this->load->view('layouts/header', $header);
        $this->load->view('pages/tekfo/operator', $result);
        $this->load->view('layouts/footer');
    }

    public function tekfo_tambah_operator(){
		$header['title']	= 'Tambah Data Teknologi Informasi';
		$header['page']	= 'tekfo';

        $this->load->view('layouts/header', $header);
        $this->load->view('pages/tekfo/tambah_operator');
        $this->load->view('layouts/footer');
    }

    public function tekfo_edit_operator($id_ti){
		$header['title']	= 'Edit Data Teknologi Informasi';
		$header['page']	= 'tekfo';

		$result['teknologi_informasi_join']	= $this->ModelOperator->getJoinWhere('teknologi_informasi', 'teknologi_informasi_kondisi_barang', 'teknologi_informasi.id_ti = teknologi_informasi_kondisi_barang.id_kondisi_barang', array('teknologi_informasi.id_ti' => $id_ti))->result();

        $this->load->view('layouts/header', $header);
        $this->load->view('pages/tekfo/edit_operator', $result);
        $this->load->view('layouts/footer');
    }

	// FORM
	// TEKFO
	//

	public function tekfo_tambah_operator_insert(){
		$tanggal = $this->input->post('tanggal');
		$nama_barang = $this->input->post('nama_barang');
		$tipe_barang = $this->input->post('tipe_barang');
		$baik = $this->input->post('baik');
		$rusak_ringan = $this->input->post('rusak_ringan');
		$rusak_berat = $this->input->post('rusak_berat');
		$sumber_dana = $this->input->post('sumber_dana');


		// current time stamp
		date_default_timezone_set("Asia/Jakarta");		
		$date = date("Y-m-d H:i:s");				

		// get last row id
		// soale, jumlah row antar dua table ini harus sama
		$last_row_ti = $this->ModelOperator->getLastRow('teknologi_informasi','id_ti');
		$last_id_ti = $last_row_ti->id_ti;

		$last_row_kondisi_barang = $this->ModelOperator->getLastRow('teknologi_informasi_kondisi_barang','id_kondisi_barang');
		$last_id_kondisi_barang = $last_row_kondisi_barang->id_kondisi_barang;
 
		$data = array(
			'id_ti' => $last_id_ti + 1,
			'tanggal' => $tanggal,
			'nama_barang' => $nama_barang,
			'tipe_barang' => $tipe_barang,
			'sumber_dana' => $sumber_dana,
			'id_ikm' => $this->session->userdata('id_ikm'),
			'created_at' => $date,
			'updated_at' => $date,
		);

		$data2 = array(
			'id_kondisi_barang' => $last_id_kondisi_barang + 1,
			'baik' => $baik,
			'rusak_ringan' => $rusak_ringan,
			'rusak_berat' => $rusak_berat,
			'total_barang' => $baik + $rusak_ringan + $rusak_berat,
			'created_at' => $date,
			'updated_at' => $date,
		);

		$this->ModelOperator->input_data('teknologi_informasi',$data);
		$this->ModelOperator->input_data('teknologi_informasi_kondisi_barang',$data2);


		redirect('tekfo/operator');
    }

	public function tekfo_edit_operator_insert($id_ti){
		$tanggal = $this->input->post('tanggal');
		$nama_barang = $this->input->post('nama_barang');
		$tipe_barang = $this->input->post('tipe_barang');
		$baik = $this->input->post('baik');
		$rusak_ringan = $this->input->post('rusak_ringan');
		$rusak_berat = $this->input->post('rusak_berat');
		$sumber_dana = $this->input->post('sumber_dana');


		// current time stamp
		date_default_timezone_set("Asia/Jakarta");		
		$date = date("Y-m-d H:i:s");				
 
		$data = array(
			'tanggal' => $tanggal,
			'nama_barang' => $nama_barang,
			'tipe_barang' => $tipe_barang,
			'sumber_dana' => $sumber_dana,
			'updated_at' => $date,
		);

		$where = array(
			'id_ti' => $id_ti,
		);

		$data2 = array(
			'baik' => $baik,
			'rusak_ringan' => $rusak_ringan,
			'rusak_berat' => $rusak_berat,
			'total_barang' => $baik + $rusak_ringan + $rusak_berat,
			'updated_at' => $date,
		);

		$where2 = array(
			'id_kondisi_barang' => $id_ti,
		);		

		$this->ModelOperator->updateData('teknologi_informasi', $data, $where);
		$this->ModelOperator->updateData('teknologi_informasi_kondisi_barang', $data2, $where2);

		redirect('tekfo/operator');
    }

	public function tekfo_delete_operator($id_ti){

		$this->ModelOperator->deleteBy('teknologi_informasi','id_ti',$id_ti);
		$this->ModelOperator->deleteBy('teknologi_informasi_kondisi_barang','id_kondisi_barang',$id_ti);

		redirect('tekfo/operator');
	}
}
