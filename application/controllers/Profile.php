<?php

class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->model('Classes_model');
        $this->load->model('User_database');
    }

    public function index()
    {
        if(isset($this->session->userdata['logged_in'])){
            $email = $_SESSION['email'];
            $id_user = $_SESSION['id_user'];

            $data['profile'] = $this->Profile_model->getProfile();
            $data['peserta'] = $this->Classes_model->getPeserta();
            $data['kelas'] = $this->Classes_model->getMyClasses();
            $nama['nama'] = explode (" ",$this->Classes_model->getMyName()['nama']);
            $this->load->view('partialsuser/header',$nama);
            $this->load->view('profile/my_profile',$data);
            $this->load->view('partialsuser/footer');
        } else {
            redirect('home');
        }
    }

    public function edit_profile()
    {
        if(isset($this->session->userdata['logged_in'])){
            $data['profile'] = $this->Profile_model->getProfile();
            $nama['nama'] = explode (" ",$this->Classes_model->getMyName()['nama']);
            $this->load->view('partialsuser/header',$nama);
            $this->load->view('profile/edit_profile',$data);
            $this->load->view('partialsuser/footer');
        } else {
            redirect('home');
        }
    }

    public function edit_profile_action()
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Profile_model->editProfile();
            redirect('profile');
        } else {
            redirect('home');
        }
    }

    public function delete_account()
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Profile_model->deleteAccount();
            redirect('login/logout');
        } else {
            redirect('home');
        }
    }

    public function change_password()
    {
        if(isset($this->session->userdata['logged_in'])){
            $nama['nama'] = explode (" ",$this->Classes_model->getMyName()['nama']);
            $this->load->view('partialsuser/header',$nama);
            $this->load->view('profile/change_password');
            $this->load->view('partialsuser/footer');
        } else {
            redirect('home');
        }
    }

    public function change_password_action()
    {
        if(isset($this->session->userdata['logged_in'])){
            $oldPass = $this->input->post('old_password');
            $hashed = hash('sha256', $oldPass);
            $getPass = $this->Profile_model->getFirstAccount();
            $getPassword = $getPass['password'];

            $newPassword = $this->input->post('password');
            $hashedNewPass = hash('sha256', $newPassword);
            if($hashed == $getPassword){

                if($getPassword == $hashedNewPass){
                    $this->session->set_flashdata('same_pass', 'Password baru yang anda input sama dengan password lama anda');
                    redirect('profile/change_password');
                } 

                $this->Profile_model->updatePassword($newPassword);
                //nanti pake flashdata
                //redirect('profile');


                
                $this->session->set_flashdata('pass', 'Password berhasil diubah');
			    redirect('profile/change_password');
            } else {   
                $this->session->set_flashdata('invalid_pass', 'Password lama yang anda input salah');
			    redirect('profile/change_password');
            }

        } else {
            redirect('home');
        }
    }
}