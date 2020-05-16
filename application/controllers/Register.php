<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		//$this->load->model('admin_login_database');
		$this->load->model('user_database');
    $this->load->helper('url');
		$this->load->helper('security');
	}
	
	// Show login page
	public function index() {

		 if(isset($this->session->userdata['logged_in'])){
		 	redirect('homepage');
		 }else{
			$this->load->view('partials/header'); 
			$this->load->view('register');
			$this->load->view('partials/footer');
		}
	}

	public function register_process()
	{
			if(isset($this->session->userdata['logged_in'])){
				redirect('homepage');
			}

			
			$email = $this->input->post('email');
			$emailDB = $this->user_database->read_user_information($email);

			if($email = $emailDB){
				$data = array(
					'error_message' => 'Email has been registered'
					);
			    return $this->load->view('register', $data);
			}


			function generateRandomString($length = 64) {
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$randomString = '';
				for ($i = 0; $i < $length; $i++) {
					$randomString .= $characters[rand(0, $charactersLength - 1)];
				}
				return $randomString;
			}

			$user_id = generateRandomString();
		
			$data = array(
			'user_id' => $user_id,
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'nama' => $this->input->post('nama'),
			'no_telepon' => $this->input->post('no_telepon')
			);
			$this->user_database->register($data);
			
			$data = array(
			'message_display' => 'Regristation Successfull'
			);

			//$this->load->view('register', $data);
			redirect('register');
	}

}
