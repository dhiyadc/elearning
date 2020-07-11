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
        if ($data['profile']['status'] == 200)
            $data['profile'] = $data['profile']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['profile']['message']);

        $data['peserta'] = $this->Classes_model->getPeserta();
        if ($data['peserta']['status'] == 200)
            $data['peserta'] = $data['peserta']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['peserta']['message']);

        $data['kelas'] = $this->Classes_model->getMyClasses();
        if ($data['kelas']['status'] == 200)
            $data['kelas'] = $data['kelas']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

        $header['nama'] = $this->Classes_model->getMyName();
        if ($header['nama']['status'] == 200)
            $header['nama'] = explode(" ", $header['nama']['data']['nama']);
        else
            $this->session->set_flashdata("errorAPI", $header['nama']['message']);

        $notif = $this->Classes_model->getPesertaByUserId();
        if ($notif['status'] == 200) {
            $datanotif = array();
            foreach ($notif['data'] as $value) {
                $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                if ($cek['status'] == 200) {
                    if ($cek['data'] != null) {
                        $datanotif[] = $cek['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek['message']);
                }
            }
            $header['notif'] = $datanotif;
        } else {
            $this->session->set_flashdata("errorAPI", $notif['message']);
        }

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        if ($notif2['status'] == 200) {
            $datanotif2 = array();
            foreach ($notif2['data'] as $value) {
                $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                if ($cek2['status'] == 200) {
                    if ($cek2['data'] != null) {
                        $datanotif2[] = $cek2['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                }
            }
            $header['notif2'] = $datanotif2;
        } else {
            $this->session->set_flashdata("errorAPI", $notif2['message']);
        }

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
        if ($data['profile']['status'] == 200)
            $data['profile'] = $data['profile']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['profile']['message']);

        $header['nama'] = $this->Classes_model->getMyName();
        if ($header['nama']['status'] == 200)
            $header['nama'] = explode(" ", $header['nama']['data']['nama']);
        else
            $this->session->set_flashdata("errorAPI", $header['nama']['message']);

        $notif = $this->Classes_model->getPesertaByUserId();
        if ($notif['status'] == 200) {
            $datanotif = array();
            foreach ($notif['data'] as $value) {
                $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                if ($cek['status'] == 200) {
                    if ($cek['data'] != null) {
                        $datanotif[] = $cek['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek['message']);
                }
            }
            $header['notif'] = $datanotif;
        } else {
            $this->session->set_flashdata("errorAPI", $notif['message']);
        }

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        if ($notif2['status'] == 200) {
            $datanotif2 = array();
            foreach ($notif2['data'] as $value) {
                $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                if ($cek2['status'] == 200) {
                    if ($cek2['data'] != null) {
                        $datanotif2[] = $cek2['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                }
            }
            $header['notif2'] = $datanotif2;
        } else {
            $this->session->set_flashdata("errorAPI", $notif2['message']);
        }

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
        if ($edit_profile['status'] == 200)
            $edit_profile = $edit_profile['data'];
        else
            $this->session->set_flashdata("errorAPI", $edit_profile['message']);

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

        $temp = $this->Profile_model->deleteAccount();
        if ($temp['status'] != 200)
            $this->session->set_flashdata("errorAPI", $temp['messages']);
            
        redirect('login/logout');
    }

    public function change_password()
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $header['nama'] = $this->Classes_model->getMyName();
        if ($header['nama']['status'] == 200)
            $header['nama'] = explode(" ", $header['nama']['data']['nama']);
        else
            $this->session->set_flashdata("errorAPI", $header['nama']['message']);

        $notif = $this->Classes_model->getPesertaByUserId();
        if ($notif['status'] == 200) {
            $datanotif = array();
            foreach ($notif['data'] as $value) {
                $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                if ($cek['status'] == 200) {
                    if ($cek['data'] != null) {
                        $datanotif[] = $cek['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek['message']);
                }
            }
            $header['notif'] = $datanotif;
        } else {
            $this->session->set_flashdata("errorAPI", $notif['message']);
        }

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        if ($notif2['status'] == 200) {
            $datanotif2 = array();
            foreach ($notif2['data'] as $value) {
                $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                if ($cek2['status'] == 200) {
                    if ($cek2['data'] != null) {
                        $datanotif2[] = $cek2['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                }
            }
            $header['notif2'] = $datanotif2;
        } else {
            $this->session->set_flashdata("errorAPI", $notif2['message']);
        }
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
        if ($getPass['status'] == 200)
            $getPass = $getPass['data'];
        else
            $this->session->set_flashdata("errorAPI", $getPass['message']);

        $getPassword = $getPass['password'];

        $newPassword = $this->input->post('password');
        $hashedNewPass = hash('sha256', $newPassword);
        if ($hashed == $getPassword) {

            if ($getPassword == $hashedNewPass) {
                $this->session->set_flashdata('same_pass', 'Password baru yang anda input sama dengan password lama anda');
                redirect('profile/change_password');
            }

            $temp = $this->Profile_model->updatePassword($newPassword);
            if($temp['status'] != 200)
            $this->session->set_flashdata("errorAPI", $temp['message']);
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
