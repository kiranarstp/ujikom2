<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MLogin');
	}
	
	// login
	function index(){
		$this->load->view('VLogin');
	  }
	function authenticate(){
		$user     = $this->input->post('User',TRUE);
		$password = $this->input->post('Password',TRUE);
		$validate = $this->MLogin->validate($user,$password);
		if($validate->num_rows() > 0){
			$data   = $validate->row_array();
			$UserID = $data['UserID'];
			$name   = $data['Username'];
			$email  = $data['Email'];
			$sesdata = array(
				'UserID'    => $UserID,
				'username'  => $name,
				'email'     => $email,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			redirect(site_url('Welcome'));

		}else{
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Please try again
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('Login');
		}
	  }
	  // end login

	  function logout()
	  {
		$this->session->sess_destroy();
		redirect('Home');
	  }
}
?>