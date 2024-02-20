<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public $input;
	public $MSudi;
	function __construct()
	{
		parent::__construct();
		$this->load->model('MSudi');
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('Login');
		}
	}

	// Pada fungsi index() di Welcome Controller

public function index()
{
    // Ambil data komentar dari server
    $data['DataFoto'] = $this->MSudi->GetData('foto');
    $data['likefoto'] = $this->MSudi->GetData('likefoto');
    $data['content'] = 'beranda';
    
    // Load the 'welcome_message' view with the $data array
    $this->load->view('welcome_message', $data); 
}

	public function likefoto($FotoID)
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('Login');
		}
		$add = [
			'FotoID' => $FotoID,
			'UserID' => $this->session->userdata('UserID'),
			'TanggalLike' => date("Y-m-d"),
		];
		$this->MSudi->AddData('likefoto', $add);
		redirect(site_url('Welcome'));
	}
	public function unlikefoto($FotoID)
	{
    if ($this->session->userdata('logged_in') !== TRUE) {
        redirect('Login');
    }
    $this->MSudi->DeleteLikeFoto($FotoID, $this->session->userdata('UserID'));
    redirect(site_url('Welcome'));
	}


	// Pada fungsi komentar() di Welcome Controller

public function komentar()
{
    if ($this->session->userdata('logged_in') !== TRUE) {
        redirect('Login');
    }
    
    $FotoID = $this->input->post('FotoID');
    $IsiKomentar = $this->input->post('IsiKomentar');
    
    // Simpan komentar ke database
    $this->MSudi->saveComment($FotoID, $IsiKomentar);
    
    $add = [
        'FotoID' => $FotoID,
        'UserID' => $this->session->userdata('UserID'),
        'IsiKomentar' => $IsiKomentar,
        'TanggalKomentar' => date("Y-m-d"),
    ];
    
    $this->MSudi->AddData('komentarfoto', $add);
    
    // Redirect kembali ke halaman dashboard
    redirect(site_url('Welcome'));
}


	public function deleteDataKomentar($KomentarID)
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('Login');
		}
		$this->Msudi->DeleteData('komentarfoto', 'KomentarID', $KomentarID);
		redirect(site_url('Welcome'));
	}

	public function album()
	{
		// Memuat model MSudi
		$this->load->model('MSudi');

		// Mengakses data dari model
		$data['DataAlbum'] = $this->MSudi->GetData('album');
		$data['content'] = 'gallery/album';
		$this->load->view('welcome_message', $data);
	}
	public function addDataAlbum()
	{
		$this->load->model('MSudi');

		$add['NamaAlbum'] = $this->input->post('NamaAlbum');
		$add['Deskripsi'] = $this->input->post('Deskripsi');
		$add['TanggalDibuat'] = $this->input->post('TanggalDibuat');
		$add['UserID'] = $this->session->userdata('UserID');


		$this->MSudi->AddData('album', $add);


		redirect(site_url('Welcome/album'));
	}
	public function updateDataAlbum()
	{
		$a = $this->input->post('AlbumID');
		$update['NamaAlbum'] = $this->input->post('NamaAlbum');
		$update['Deskripsi'] = $this->input->post('Deskripsi');
		$update['TanggalDibuat'] = $this->input->post('TanggalDibuat');
		$update['UserID'] = $this->input->post('UserID');

		$this->MSudi->UpdateData('album', 'AlbumID', $a, $update);


		redirect(site_url('Welcome/album'));
	}
	public function deleteDataAlbum($AlbumID)
	{
		$this->load->model('MSudi');

		$this->MSudi->DeleteData('album', 'AlbumID', $AlbumID);

		// Redirect ke halaman master setelah penghapusan
		redirect(site_url('Welcome/album'));
	}
	public function albumDetail($AlbumID)
	{
		$data['fotoalbum'] = $this->MSudi->GetDataWhere('foto', 'AlbumID', $AlbumID)->result();
		$data['content'] = 'gallery/albumDetail';
		$this->load->view('welcome_message', $data);
	}

	public function foto()
	{
		// Memuat model MSudi
		$this->load->model('MSudi');

		// Mengakses data dari model
		$data['DataFoto'] = $this->MSudi->GetData('foto');
		$data['DataAlbum'] = $this->MSudi->GetData('album');
		$data['content'] = 'gallery/foto';
		$this->load->view('welcome_message', $data);
	}
	public function addDataFoto()
	{
		$add['FotoID'] = $this->input->post('FotoID');
		$add['JudulFoto'] = $this->input->post('JudulFoto');
		$add['DeskripsiFoto'] = $this->input->post('DeskripsiFoto');
		$add['TanggalUnggah'] = $this->input->post('TanggalUnggah');
		$add['LokasiFile'] = $this->input->post('LokasiFile');
		$add['AlbumID'] = $this->input->post('AlbumID');
		$add['UserID'] = $this->session->userdata('UserID');
		
		if ($add['UserID'] !== $this->session->userdata('UserID')) {
			// Jika tidak cocok, kembalikan ke halaman sebelumnya atau lakukan tindakan lainnya
			redirect(site_url('Welcome/foto'));
		}


		$this->uploadPhoto($add);
		$this->MSudi->AddData('foto', $add);
		redirect(site_url('Welcome/foto'));
	}

/**
 * Upload Photo
 * @param array $data
 * @return void
 */
protected function uploadPhoto(array &$data)
{
	$config['upload_path']		='./uploads/';
	$config['allowed_types']		='gif|jpg|png|jpg|svg';

	$this->load->library('upload', $config);

	if (isset($_FILES['LokasiFile'])){
		if ($this->upload->do_upload('LokasiFile')){
			$uploadData =$this->upload->data();
			$data['LokasiFile'] = $uploadData['file_name'];
		}
	}

}

	public function updateDataFoto()
	{
		$a = $this->input->post('FotoID');
		$update['JudulFoto'] = $this->input->post('JudulFoto');
		$update['DeskripsiFoto'] = $this->input->post('DeskripsiFoto');
		$update['TanggalUnggah'] = $this->input->post('TanggalUnggah');
		$update['LokasiFile'] = $this->input->post('LokasiFile');
		
		$config['upload_path']			='./uploads/';
		$config['allowed_types']		='gif|jpg|png|jpg|svg';

		$this->uploadPhoto($update);
		$this->MSudi->UpdateData('foto', 'FotoID', $a, $update);
		redirect(site_url('Welcome/foto'));
	}
	public function deleteDataFoto($FotoID)
	{
		$this->load->model('MSudi');

		$this->MSudi->DeleteData('foto', 'FotoID', $FotoID);

		// Redirect ke halaman master setelah penghapusan
		redirect(site_url('Welcome/foto'));
	}


	public function fotoDetail($FotoID)
	{
		$data['foto'] = $this->MSudi->GetDataWhere('foto', 'FotoID', $FotoID)->row();
		if ($data['foto']->UserID != $this->session->userdata('UserID')) {
            // If not, redirect to index page or any other appropriate page
            redirect('Welcome');
        }
		$data['content'] = 'gallery/fotoDetail';
		$this->load->view('welcome_message', $data);

	}
	public function getComments() {
		if ($this->session->userdata('Login')) {
		$FotoID = $this->input->get('FotoID');
		$comments = $this->MSudi->GettambahKomentarByFotoID($FotoID);

		header('Content-Type: application/json');
		echo json_encode($comments);
	}
}

	public function getUsername($UserID) {
		if ($this->session->userdata('Login')) {
		$this->load->model('MSudi');
		$Username = $this->MSudi->getUsername($UserID);
		echo json_encode($Username);
	}
}

}

