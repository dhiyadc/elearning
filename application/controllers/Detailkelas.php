<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detailkelas extends CI_Controller{

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
        $this->load->view('kelasdetail/viewdetail');
        $this->load->view('partialsuser/footer');
    }

    // public function showComment(){
    //     $data['blog'] = $this->homepage_database->getBlogs();
    //     $data['comment'] = $this->homepage_database->getComment();
    //     $comment = $data['blog'];
    // }
    
}

?>
