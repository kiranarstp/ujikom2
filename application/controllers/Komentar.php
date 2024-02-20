<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('MSudi');

        $this->load->library('session');
        $this->load->helper('url');

		$this->load->database();
    }

    public function index (){
        $this->load->view("komentar");

    }
	public function tambahKomentar() {
		$fotoid = $this->input->post('FotoID'); 
		$UserID = $this->session->userdata('UserID');
		$IsiKomentar = $this->input->post('comment');
		$TanggalKomentar = date('Y-m-d H:i:s');
	
		// Set data untuk disimpan ke database
		$data = array(
			'FotoID' => $FotoID,
			'UserID' => $UserID,
			'IsiKomentar' => $IsiKomentar,
			'TanggalKomentar' => $TanggalKomentar
		);
	
		// Panggil model untuk menyimpan komentar
		$this->MSudi->tambahKomentar($data);
	
		// Redirect ke halaman foto setelah menambahkan komentar
		redirect('Welcome/beranda/'.$FotoID);
	}
	
	
}