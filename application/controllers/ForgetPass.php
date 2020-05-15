<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ForgetPass extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
		// Load database
        // $this->load->model('homepage_database');
        $this->load->helper('url');
	}

    public function index(){
        //Controller Home
        $this->load->view('partials/header');
        $this->load->view('forgetpass/forgetpassword');
        $this->load->view('partials/footer');
    }

  
    
}

?>
