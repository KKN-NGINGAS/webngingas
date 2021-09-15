<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NgingasController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }    

	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }

    public function produksi_pimpinan(){
        $this->load->view('layouts/header_with_table');
        $this->load->view('pages/produksi/pimpinan');
        $this->load->view('layouts/footer');
    }
}
