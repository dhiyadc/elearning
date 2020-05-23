<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UbahPassword extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
	}

    public function index()
    {
        $this->load->view('partialsuser/header');
        $this->load->view('user/ubahpassword');
        $this->load->view('partialsuser/footer');
    }
}
?>