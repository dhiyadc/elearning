<?php

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->model('Classes_model');
        $this->load->model('Workshops_model');
        $this->load->model('User_database');
    }

    public function index()
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $email = $_SESSION['email'];
        $id_user = $_SESSION['id_user'];

        $data['profile'] = $this->Profile_model->getProfile();
        $data['peserta'] = $this->Classes_model->getPeserta();
        $data['kelas'] = $this->Classes_model->getMyClasses();
        $header['nama'] = explode(" ", $this->Classes_model->getMyName()['nama']);
        $notif = $this->Classes_model->getPesertaByUserId();
        $datanotif = array();
        foreach ($notif as $value) {
            $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
            if ($cek != null) {
                $datanotif[] = $cek;
            }
        }
        $header['notif'] = $datanotif;

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        $datanotif2 = array();
        foreach ($notif2 as $value) {
            $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
            if ($cek2 != null) {
                $datanotif2[] = $cek2;
            }
        }
        $header['notif2'] = $datanotif2;

        $this->load->view('partials/user/header', $header);
        $this->load->view('profile/my_profile', $data);
        $this->load->view('partials/user/footer');
    }

    public function edit_profile()
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $data['profile'] = $this->Profile_model->getProfile();
        $header['nama'] = explode(" ", $this->Classes_model->getMyName()['nama']);
        $notif = $this->Classes_model->getPesertaByUserId();
        $datanotif = array();
        foreach ($notif as $value) {
            $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
            if ($cek != null) {
                $datanotif[] = $cek;
            }
        }
        $header['notif'] = $datanotif;

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        $datanotif2 = array();
        foreach ($notif2 as $value) {
            $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
            if ($cek2 != null) {
                $datanotif2[] = $cek2;
            }
        }
        $header['notif2'] = $datanotif2;


        $this->load->view('partials/user/header', $header);
        $this->load->view('profile/edit_profile', $data);
        $this->load->view('partials/user/footer');
    }

    public function edit_profile_action()
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $edit_profile = $this->Profile_model->editProfile();
        if ($edit_profile == "fail") {
            $this->session->set_flashdata("invalidImage", "Invalid Image Size (Max Size: 3 MB)");
            redirect("profile/edit_profile");
        }
        redirect('profile');
    }

    public function delete_account()
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $this->Profile_model->deleteAccount();
        redirect('login/logout');
    }

    public function change_password()
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $header['nama'] = explode(" ", $this->Classes_model->getMyName()['nama']);
        $notif = $this->Classes_model->getPesertaByUserId();
        $datanotif = array();
        foreach ($notif as $value) {
            $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
            if ($cek != null) {
                $datanotif[] = $cek;
            }
        }
        $header['notif'] = $datanotif;

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        $datanotif2 = array();
        foreach ($notif2 as $value) {
            $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
            if ($cek2 != null) {
                $datanotif2[] = $cek2;
            }
        }
        $header['notif2'] = $datanotif2;

        $this->load->view('partials/user/header', $header);
        $this->load->view('profile/change_password');
        $this->load->view('partials/user/footer');
    }

    public function change_password_action()
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }
            $oldPass = $this->input->post('old_password');
            $hashed = hash('sha256', $oldPass);
            $getPass = $this->Profile_model->getOldPassword();
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
    }
}