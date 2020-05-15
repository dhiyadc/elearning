<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BuatKelas extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
		// Load database
        // $this->load->model('homepage_database');
        $this->load->helper('url');
	}

    public function index(){
        //Controller Home
        $this->load->view('partialsuser/header');
        $this->load->view('buatkelas');
        $this->load->view('partialsuser/footer');
    }

  
    
}

?>
