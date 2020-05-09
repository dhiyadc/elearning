<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

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
        $this->load->view('registeruser/register');
        $this->load->view('partials/footer');
    }

    // public function showComment(){
    //     $data['blog'] = $this->homepage_database->getBlogs();
    //     $data['comment'] = $this->homepage_database->getComment();
    //     $comment = $data['blog'];
    // }
    
}

?>
