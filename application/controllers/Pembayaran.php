<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

		// Load database
        // $this->load->model('homepage_database');
        $this->load->helper('url');
        $this->load->model('Classes_model');

	}

    public function index(){
        $this->load->view('partialsuser/header');
        $this->load->view('classes/pembayaran');
        $this->load->view('partialsuser/footer');
    }
}

?>
