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

		if ($this->session->userdata('role') != 'admin_ikm') {
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
		// getJoin($table, $join, $join_param)				
		// $result['laporan_keuangan_join_data_ikm'] = $this->ModelOperator->getJoin("laporan_keuangan", "data_ikm", "laporan_keuangan.data_ikm = data_ikm.id_ikm");	
		$result['laporan_keuangan_2']	= $this->ModelOperator->getJoin('laporan_keuangan', 'data_ikm', 'laporan_keuangan.id_ikm = data_ikm.id_ikm')->result();

        $this->load->view('layouts/header', $header);
        $this->load->view('pages/keuangan/operator', $result);
        $this->load->view('layouts/footer');
    }
	
    public function keuangan_detail_operator($id){
		$header['title']	= 'Keuangan Detail';
		$header['page']	= 'keuangan';

		$result['keuangan'] = $this->ModelOperator->getbyid("id_laporan","laporan_keuangan", $id);
		
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
}
