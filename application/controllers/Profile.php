<?php

class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_modal');
    }

    public function index()
    {
        $data['profile'] = $this->Profile_modal->getMyProfile();
        $data['account'] = $this->Profile_modal->getMyAccount();
        $this->load->view('profile/my_profile',$data);
    }

    public function complete_profile()
    {
        $this->load->view('profile/complete_profile');
    }

    public function complete_profile_action()
    {
        $this->Profile_modal->completeProfile();
        redirect('profile');
    }

    public function edit_profile()
    {
        $data['profile'] = $this->Profile_modal->getMyProfile();
        $data['account'] = $this->Profile_modal->getMyAccount();
        $this->load->view('profile/edit_profile',$data);
    }

    public function edit_profile_action()
    {
        $this->Profile_modal->editProfile();
        $this->Profile_modal->editAccount();
        redirect('profile');
    }

    public function delete_account()
    {
        $this->Profile_modal->deleteAccount();
        redirect('login');
    }
}