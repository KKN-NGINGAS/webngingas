<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

	/**
	 Controller untuk Operator IKM
	 */
	
	function __construct()
	{
		parent::__construct();
		// $this->load->model('ModelUser');
		date_default_timezone_set("Asia/Jakarta");

		if ($this->session->userdata('role') != 'operator') {
			redirect(base_url());
		}
	}

	public function index()
	{
		// $this->load->view('welcome_message');
		echo "Hai ".$this->session->userdata('nama')." - Sang ".$this->session->userdata('role');
		echo "<br><a href='".base_url()."Logout'>Logout</a>";
	}

	//
	// Produksi
	//

	public function produksi_operator(){
		$header['title']	= 'Produksi';
		$header['page']	= 'produksi';
        $this->load->view('layouts/header', $header);
        $this->load->view('pages/produksi/operator');
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

	//
	// Keuangan
	//

	public function keuangan_operator(){
		$header['title']	= 'Keuangan';
		$header['page']	= 'keuangan';
        $this->load->view('layouts/header', $header);
        $this->load->view('pages/keuangan/operator');
        $this->load->view('layouts/footer');
    }
	
    public function keuangan_detail_operator(){
		$header['title']	= 'Keuangan Detail';
		$header['page']	= 'keuangan';
        $this->load->view('layouts/header', $header);
        $this->load->view('pages/keuangan/detail_operator');
        $this->load->view('layouts/footer');
    }
}
