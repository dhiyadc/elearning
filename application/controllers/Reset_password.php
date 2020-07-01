<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        // Load database
        $this->load->model('user_database');
        
	}

    public function index(){
        //Controller Home
        redirect('forgot_password');
    }

    public function valid($token){
            $isValid = $this->user_database->getValidToken($token);
            if($isValid > 0)
            {
                $this->load->view('user/reset_password');
            } else {
                $this->session->set_flashdata('error_message', 'Token is not valid / expired');
			        redirect('forgot_password');
            }
    }

    public function request(){
        $token = $this->input->post('token');
        $newPassword = $this->input->post('password');

        $user = $this->user_database->getIDbyToken($token);
        $id_user = $user['id_user'];

        $this->user_database->updatePasswordUser($id_user, $newPassword);
            $this->session->set_flashdata('success', 'Your password has been updated');
            redirect('home');
    }
    
}

?>
