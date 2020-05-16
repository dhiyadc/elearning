<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        // Load database
        
	}

    public function index(){
        //Controller Home
        if(isset($_SESSION['admin_logged_in'])){
        //$this->load->view('layout/header');
        $this->load->view('admin/home_admin');
        //$this->load->view('layout/footer');
        } else {
            redirect('admin');
        }
    }
    
}

?>
