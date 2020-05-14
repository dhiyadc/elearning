<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_database');
	}

    public function index()
    {
        if(isset($_SESSION['admin_logged_in'])){
            $this->load->view('admin/home_admin');
        } 
        else {
            redirect('admin');
        }
    }
    
}

?>
