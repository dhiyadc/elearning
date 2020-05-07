<?php

class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    public function index()
    {
        if(isset($this->session->userdata['logged_in'])){
            var_dump($this->session->userdata('id_user'));
            $data['profile'] = $this->Profile_model->getMyProfile();
            $data['account'] = $this->Profile_model->getMyAccount();
            $this->load->view('profile/my_profile',$data);
        } else {
            redirect('login');
        }
    }

    public function edit_profile()
    {
        if(isset($this->session->userdata['logged_in'])){
            $data['profile'] = $this->Profile_model->getMyProfile();
            $data['account'] = $this->Profile_model->getMyAccount();
            $this->load->view('profile/edit_profile',$data);
        } else {
            redirect('login');
        }
    }

    public function edit_profile_action()
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Profile_model->editProfile();
            $this->Profile_model->editAccount();
            redirect('profile');
        } else {
            redirect('login');
        }
    }

    public function delete_account()
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Profile_model->deleteAccount();
            redirect('login');
        } else {
            redirect('login');
        }
    }
}