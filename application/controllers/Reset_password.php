<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller{

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
            $this->load->view('user/reset_password');
        }

        /*CATATAN
            Setelah di klik link akan dilakukan pengecekan token, kalau eligible akan di lanjutkan ke halaman reset password
        */
    }

    public function request($email, $token){
        $email = $this->input->post('email');
        $token = $this->input->post('token');
        $newPassword = $this->input->post('password');







    }
    
}

?>
