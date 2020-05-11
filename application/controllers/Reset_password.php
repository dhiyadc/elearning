<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        // Load database
        $this->load->model('user_database');
        
	}

    public function index($email, $token){
        //Controller Home
        if(isset($this->session->userdata['logged_in'])){
        //$this->load->view('layout/header');
        $this->load->view('viewtes');
        //$this->load->view('layout/footer');
        } else {
            
        }
    }

    public function valid($id_user, $token){
            $isValid = $this->user_database->getValidToken($id_user, $token);
            if($isValid > 0)
            {
                $this->load->view('user/reset_password');
            } else {
                $data = array(
                    'error_message' => 'Token is not valid / expired'
					);
                $this->load->view('user/reset_password', $data);
            }
    }

    public function request(){
        $id_user = $this->input->post('id_user');
        $token = $this->input->post('token');
        $newPassword = $this->input->post('password');

        $this->user_database->updatePassword($id_user, $newPassword);
        $data = array(
            'message_display' => 'Your password has been updated'
            );
            $this->load->view('user/login_user', $data);
    }
    
}

?>
