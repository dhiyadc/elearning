<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

		// Load database
        // $this->load->model('homepage_database');
        $this->load->helper('url');
        $this->load->model('Classes_model');

	}

    public function index(){
        if(isset($_SESSION['logged_in'])){
            $this->load->view('partialsuser/header');
            
        } else {
            $this->load->view('partials/header');    
        }
        $data['class'] = $this->Classes_model->getAllTopClasses();
        $this->load->view('home', $data);
        $this->load->view('partials/footer');
    }
}

?>
