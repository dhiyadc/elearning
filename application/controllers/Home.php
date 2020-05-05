<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        // Load database
        
	}

    public function index(){
        //Controller Home
        if(isset($this->session->userdata['logged_in'])){
        //$this->load->view('layout/header');
        $this->load->view('viewtes');
        //$this->load->view('layout/footer');
        } else {
            redirect('user');
        }
    }
    
}

?>
