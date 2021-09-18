<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBumdes extends CI_Controller {

	/**
	 Controller untuk Admin Bumdes
	 */

	function __construct()
	{
		parent::__construct();
		// $this->load->model('ModelUser');
		date_default_timezone_set("Asia/Jakarta");

		if ($this->session->userdata('role') != 'admin') {
			redirect(base_url());
		}
	}

	public function index()
	{
		// $this->load->view('welcome_message');
		echo "Hai ".$this->session->userdata('nama')." - Sang ".$this->session->userdata('role');
		echo "<br><a href='".base_url()."Logout'>Logout</a>";
	}
}
