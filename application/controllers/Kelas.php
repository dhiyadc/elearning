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
            
        } else {
            $this->load->view('partials/header');    
        }

        
        $data['categories'] = $this->Classes_model->getKategori();
        $data['class'] = $this->Classes_model->getAllClassesDetail();
        $this->load->view('tampilankelas/kelasview', $data);
        $this->load->view('partials/footer');
        

        
    }

    public function categories($kategori){
        if(isset($_SESSION['logged_in'])){
            $this->load->view('partialsuser/header');
            
        } else {
            $this->load->view('partials/header');    
        }
        $data['kategori_text'] = $kategori;
        $data['categories'] = $this->Classes_model->getKategori();
        $data['class'] = $this->Classes_model->getClassesbyCategories($kategori);
        $this->load->view('tampilankelas/kelasfilter', $data);
        $this->load->view('partials/footer');
    }

    public function search(){
        if(isset($_SESSION['logged_in'])){
            $this->load->view('partialsuser/header');
            
        } else {
            $this->load->view('partials/header');    
        }
        $data['keyword'] = $this->input->post('keyword');
        $data['categories'] = $this->Classes_model->getKategori();
        $data['class'] = $this->Classes_model->getAllClassesDetail($data['keyword']);
        $this->load->view('tampilankelas/kelasfilter', $data);
        $this->load->view('partials/footer');
    }

   
    
}

?>
