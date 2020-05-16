<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
		// Load database
        // $this->load->model('homepage_database');
        $this->load->helper('url');
	}

    public function index(){
        //Controller Home
        $this->load->view('headeruser/dashboardheader');
        $this->load->view('user/user_view');
        $this->load->view('partialsuser/footer');
    }


}

?>
