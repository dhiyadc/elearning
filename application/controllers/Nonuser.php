<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nonuser extends CI_Controller {

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
		$this->load->model('Admin_database');

		$this->load->helper('security');
	}
	
	// Show login page
	public function index() {
		 if(isset($_SESSION['admin_logged_in'])){      
             if(isset($_SESSION['owner_logged_in'])){
                redirect('owner');
             }
             redirect('admin');


		 }else{
			$this->load->view('nonuser/admin_login');
		}
	}
	
	 //User Login Process
	public function admin_login_process() {
			if(isset($_SESSION['admin_logged_in'])){
				redirect('admin');

			}
    
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
                );

            $email = $this->input->post('email');
            $owner = $this->Admin_database->isOwner($data);
            if($owner){

                // Add user data in session if owner is login
                $this->session->set_userdata('owner_logged_in', TRUE);
                // $this->session->set_userdata('admin_logged_in', TRUE);
                $this->session->set_userdata('owner_email', $email);
                
                redirect('owner');

            } else {
                $result = $this->Admin_database->login($data);
                if ($result == TRUE) {
                
                    // Add user data in session
                    $this->session->set_userdata('admin_logged_in', TRUE);
                    $this->session->set_userdata('admin_email', $email);

                    redirect('admin');

                } else {
                    $data = array(
                    'error_message' => 'Invalid Email or Password'
                    );
                    $this->load->view('nonuser/admin_login', $data);
                }
            }
		
	}
		
		// Logout from user
		public function logout() {
    
            if(isset($_SESSION['owner_logged_in'])){
                // Remove Session data if owner is logout
                $this->session->unset_userdata('owner_logged_in');
                // $this->session->unset_userdata('admin_logged_in');
			    $this->session->unset_userdata('email');
            } else {
			// Removing session data		
			$this->session->unset_userdata('admin_logged_in');
			$this->session->unset_userdata('email');
            }

            redirect('nonuser');
            
		} 
	

}
