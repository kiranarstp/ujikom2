<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $MSudi;
	function __construct()
	{
		parent::__construct();
		$this->load->model('MSudi');
		$UserID = $this->session->userdata('UserID');
		
	}

     public function  index()
    {
        $data['DataFoto'] = $this->MSudi->GetData('foto');
		$data['likefoto'] = $this->MSudi->GetData('likefoto');

        $this->load->view('depan/V_isi.php', $data);
    } 
}