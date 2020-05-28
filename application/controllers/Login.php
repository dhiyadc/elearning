<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		//$this->load->library('session');

		// Load database
		//$this->load->model('admin_login_database');
		$this->load->model('User_database');

		$this->load->helper('security');
	}
	
	// Show login page
	public function index() {
		 	redirect('home');
	}
	
	 //User Login Process
	public function user_login_process() {
	
			if(isset($_SESSION['logged_in'])){
				redirect('home');

			}
	
			$email = $this->input->post('email');
			$oldPass = $this->input->post('password');
            $hashed = hash('sha256', $oldPass);
			$getPass = $this->User_database->getFirstAccount($email);
            $getPassword = $getPass['password'];
			if ($hashed == $getPassword) {
			
				$email = $this->input->post('email');
				$id_user = $this->db->get_where('user', ['email' => $email])->row_array();

				// Add user data in session
				$this->session->set_userdata('logged_in', TRUE);
				$this->session->set_userdata('id_user', $id_user['id_user']);
				$this->session->set_userdata('email' , $email);

				redirect('home');

			} else {
				
				$this->session->set_flashdata('invalid', 'Invalid Email or Password');
				redirect('home');
			}
		
	}
		
		// Logout from user
		public function logout() {
		
			// Removing session data		
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('id_user');
			$this->session->unset_userdata('email');

			redirect('home');
		} 
	

}
