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

		$this->load->helper('security');
	}
	
	// Show login page
	public function index() {

		 if(isset($this->session->userdata['logged_in'])){
		 	redirect('home');
		 }else{
			$this->load->view('user/register_user');
		}
	}

	public function register_process()
	{
			if(isset($this->session->userdata['logged_in'])){
				redirect('home_admin');
			}

			$email = $this->input->post('email');
			$emailDB = $this->user_database->read_user_information($email);

			if($email = $emailDB){
				$data = array(
					'error_message' => 'Email has been registered'
					);
			    return $this->load->view('user/register_user', $data);
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
			'password' => $this->input->post('password')
			);
			$this->user_database->register($data);
			
			$data = array(
			'message_display' => 'Regristation Successfull'
			);
			$this->load->view('user/login_user', $data);
	}

}
