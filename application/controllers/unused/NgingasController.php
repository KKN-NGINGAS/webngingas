<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NgingasController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }    

    public function index(){        
        $this->load->view('pages/index');        
    }

    public function signup_ikm(){        
        $this->load->view('pages/signup_ikm');        
    }

    public function dashboard(){
        $this->load->view('layouts/header');
        $this->load->view('pages/dashboard');
        $this->load->view('layouts/footer');
    }

    public function notifikasi(){
        $this->load->view('layouts/header');
        $this->load->view('pages/notifikasi');
        $this->load->view('layouts/footer');
    }

    //
    // Data User
    //

    public function data_user_home(){
        $this->load->view('layouts/header');
        $this->load->view('pages/data_user/home');
        $this->load->view('layouts/footer');
    }

    public function data_user_create(){
        $this->load->view('layouts/header');
        $this->load->view('pages/data_user/create');
        $this->load->view('layouts/footer');
    }

    //
    // Produksi
    //

    public function produksi_pimpinan(){
        $this->load->view('layouts/header');
        $this->load->view('pages/produksi/pimpinan');
        $this->load->view('layouts/footer');
    }

    public function produksi_operator(){
        $this->load->view('layouts/header');
        $this->load->view('pages/produksi/operator');
        $this->load->view('layouts/footer');
    }

    public function produksi_detail_pimpinan(){
        $this->load->view('layouts/header');
        $this->load->view('pages/produksi/detail_pimpinan');
        $this->load->view('layouts/footer');
    }

    public function produksi_tambah_operator(){
        $this->load->view('layouts/header');
        $this->load->view('pages/produksi/tambah_operator');
        $this->load->view('layouts/footer');
    }

    public function produksi_tambah_berhasil_operator(){
        $this->load->view('layouts/header');
        $this->load->view('pages/produksi/tambah_berhasil_operator');
        $this->load->view('layouts/footer');
    }

    //
    // Keuangan
    //

    public function keuangan_pimpinan(){
        $this->load->view('layouts/header');
        $this->load->view('pages/keuangan/pimpinan');
        $this->load->view('layouts/footer');
    }

    public function keuangan_operator(){
        $this->load->view('layouts/header');
        $this->load->view('pages/keuangan/operator');
        $this->load->view('layouts/footer');
    }

    public function keuangan_detail_pimpinan(){
        $this->load->view('layouts/header');
        $this->load->view('pages/keuangan/detail_pimpinan');
        $this->load->view('layouts/footer');
    }

    public function keuangan_detail_operator(){
        $this->load->view('layouts/header');
        $this->load->view('pages/keuangan/detail_operator');
        $this->load->view('layouts/footer');
    }

    //
    // SDM
    //

    public function sdm_tambah_sdm(){
        $this->load->view('layouts/header');
        $this->load->view('pages/sdm/tambah_sdm');
        $this->load->view('layouts/footer');
    }

    public function sdm_list_sdm(){
        $this->load->view('layouts/header');
        $this->load->view('pages/sdm/list_sdm');
        $this->load->view('layouts/footer');
    }

    //
    // Tekfo
    //

    public function tekfo_pimpinan(){
        $this->load->view('layouts/header');
        $this->load->view('pages/tekfo/pimpinan');
        $this->load->view('layouts/footer');
    }

    public function tekfo_operator(){
        $this->load->view('layouts/header');
        $this->load->view('pages/tekfo/operator');
        $this->load->view('layouts/footer');
    }

    public function tekfo_detail_pimpinan(){
        $this->load->view('layouts/header');
        $this->load->view('pages/tekfo/detail_pimpinan');
        $this->load->view('layouts/footer');
    }

    public function tekfo_tambah_operator(){
        $this->load->view('layouts/header');
        $this->load->view('pages/tekfo/tambah_operator');
        $this->load->view('layouts/footer');
    }

    public function tekfo_tambah_berhasil_operator(){
        $this->load->view('layouts/header');
        $this->load->view('pages/tekfo/tambah_berhasil_operator');
        $this->load->view('layouts/footer');
    }


}
