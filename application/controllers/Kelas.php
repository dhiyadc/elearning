<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
		// Load database
        // $this->load->model('homepage_database');
        $this->load->helper('url');
        $this->load->model('Classes_model');
	}

    public function index(){
        //Controller Home
        if(isset($_SESSION['logged_in'])){
            $this->load->view('partialsuser/header');
            $data['categories'] = $this->Classes_model->getCategories();
            $data['class'] = $this->Classes_model->getAllClassesDetail();
            $this->load->view('tampilankelas/kelasview', $data);
            $this->load->view('partialsuser/footer');
        } else {
            $this->load->view('partials/header');
            $data['categories'] = $this->Classes_model->getCategories();
            $data['class'] = $this->Classes_model->getAllClassesDetail();
            $this->load->view('tampilankelas/kelasview', $data);
            $this->load->view('partials/footer');
        }
    }

   
    
}

?>
