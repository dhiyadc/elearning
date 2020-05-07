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
		$this->load->library('session');

		// Load database
		//$this->load->model('admin_login_database');
		$this->load->model('User_database');

		$this->load->helper('security');
	}
	
	// Show login page
	public function index() {
		
		 if(isset($this->session->userdata['logged_in'])){
		 	redirect('profile');
		 }else{
			$this->load->view('user/login_user');
		}
	}
	
	 //User Login Process
	public function user_login_process() {
	
		$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				redirect('profile');
			}else{
				$this->load->view('user/login_user');
			}
		} else {
			$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
			);
			$result = $this->User_database->login($data);
			if ($result == TRUE) {
			
				$email = $this->input->post('email');
				$user = $this->db->get_where('user', ['email' => $email])->row_array();
				
				$this->session->set_userdata('logged_in',TRUE);
				$this->session->set_userdata('id_user',$user['id_user']);
				$this->session->set_userdata('email',$email);

				redirect('profile');
			} else {
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('user/login_user', $data);
			}
		}
	}
		
		// Logout from user
		public function logout() {
		
			// Removing session data
			$sess_array = array(
			'email' => '',
			'id_user' => '',
			'logged_in' => TRUE
			);
			unset($_SESSION['email'],$_SESSION['id_user'],$_SESSION['logged_in']);
			redirect('login');
		} 
	

}
