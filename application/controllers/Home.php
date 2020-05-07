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
        if(isset($_SESSION['logged_in'])){
        //$this->load->view('layout/header');
        var_dump($_SESSION['id_user']);
        $this->load->view('viewtes');
        //$this->load->view('layout/footer');
        } else {
            redirect('user');
        }
    }
    
}

?>
