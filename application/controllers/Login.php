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
	public function user_login_process($redirect = null) {
		
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

				if($redirect){
					if($redirect == "create_class"){
						redirect('classes/new_class');
					}
				} else {
					if(isset($_SESSION['url_login'])){
						if($_SESSION['url_login'] == "open_class"){
							$class = $_SESSION['url_login_open_class'];
							redirect('classes/open_class/'.$class);
						} else if($_SESSION['url_login'] == "class"){
							$class = $_SESSION['url_login_class'];
							redirect('classes/open_class/'.$class);
						} else if($_SESSION['url_login'] == "kelasview"){
							redirect('classes');
						} else if($_SESSION['url_login'] == "kelasfilter"){
							redirect('classes');
						} else if($_SESSION['url_login'] == "home"){
							redirect('home');
						} else {
							redirect('home');
						}
	
					} else {
						redirect('home');
					}
				}

				

			} else {
				
				$this->session->set_flashdata('invalid', 'Invalid Email or Password');
				
				if(isset($_SESSION['url_login'])){
					

					if($_SESSION['url_login'] == "open_class"){
						$class = $_SESSION['url_login_open_class'];
						redirect('classes/open_class/'.$class);
					} else if($_SESSION['url_login'] == "kelasview"){
						redirect('classes');
					} else if($_SESSION['url_login'] == "kelasfilter"){
						redirect('classes');
					} else if($_SESSION['url_login'] == "home"){
						redirect('home');
					} else if($_SESSION['url_login'] == "register_user"){
						redirect('register');
					}

				} else {
					redirect('home');
				}
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
