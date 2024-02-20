<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regis extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MSudi');
        $this->load->model('MRegis');
        $this->load->library('form_validation');
    }
    
	function index()
	{
	  $this->load->view('VRegister');
	}
	function registerNewUser()  
	{
		  $this->form_validation->set_rules('Password', 'Password', 'required');
		  $this->form_validation->set_rules('Alamat', 'Alamat', 'required');
		  $this->form_validation->set_rules('Username', 'Username', 'required');
		  $this->form_validation->set_rules('Email', 'Email', 'required');
		  $this->form_validation->set_rules('NamaLengkap', 'NamaLengkap', 'required');
		  $this->form_validation->set_rules('ConfirmPassword', 'Confirm Password', 'required|matches[Password]');
		  if ($this->form_validation->run() == FALSE)
		  {
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Coba Lagi
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('Regis');
			} 
			else {
				$add = [
				'UserID'  	=> $this->input->post('UserID'),
				'Username'  => $this->input->post('Username'),
				'Email'     => $this->input->post('Email'),
				'Password'  => $this->input->post('Password'),
				'Alamat'  => $this->input->post('Alamat'),
				'NamaLengkap'  => $this->input->post('NamaLengkap'),
				];
				$this->MSudi->addData('user', $add);
				
					redirect(site_url('Login'));
			}
	}
	// end register
  
  
  
	function logout(){
		$this->session->sess_destroy();
		redirect('Login');
	} 
  
  
  
  }