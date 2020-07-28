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
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $email = $_SESSION['email'];
        $id_user = $_SESSION['id_user'];

        $data['profile'] = $this->Profile_model->getProfile();
        if ($data['profile'] == null)
            $null = true;
        else {
            if ($data['profile']['status'] == 200 || $data['profile']['status'] == 202) {
                $tempprofile[] = $data['profile']['data'];
                $data['profile'] = $tempprofile;
            } else
                $this->session->set_flashdata("errorAPI", $data['profile']['message']);
        }

        $data['peserta'] = $this->Classes_model->getPeserta();
        if ($data['peserta'] == null)
            $null = true;
        else {
            if ($data['peserta']['status'] == 200 || $data['peserta']['status'] == 202)
                $data['peserta'] = $data['peserta']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['peserta']['message']);
        }

        $data['peserta2'] = $this->Classes_model->getPeserta();
        if ($data['peserta2'] == null)
            $null = true;
        else {
            if ($data['peserta2']['status'] == 200 || $data['peserta2']['status'] == 202)
                $data['peserta2'] = $data['peserta2']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['peserta2']['message']);
        }

        $data['kelas'] = $this->Classes_model->getMyClasses();
        if ($data['kelas'] == null)
            $null = true;
        else {
            if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202) {
                $tempkelas[] = $data['kelas']['data'];
                $data['kelas'] = $tempkelas;
            } else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
        }

        $data['kelas2'] = $this->Workshops_model->getMyClasses();
        if ($data['kelas2'] == null)
            $null = true;
        else {
            if ($data['kelas2']['status'] == 200 || $data['kelas2']['status'] == 202) {
                $tempkelas2[] = $data['kelas2']['data'];
                $data['kelas2'] = $tempkelas2;
            } else
                $this->session->set_flashdata("errorAPI", $data['kelas2']['message']);
        }

        $header['nama'] = $this->Classes_model->getMyName();
        if ($header['nama'] == null)
            $null = true;
        else {
            if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202)
                $header['nama'] = explode(" ", $header['nama']['data']);
            else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);
        }

        $notif = $this->Classes_model->getPesertaByUserId();
        if ($notif == null)
            $null = true;
        else {
            if ($notif['status'] == 200 || $notif['status'] == 202) {
                $datanotif = array();
                if ($notif['data'] != null) {
                    foreach ($notif['data'] as $value) {
                        $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                        if ($cek == null)
                            $null = true;
                        else {
                            if ($cek['status'] == 200 || $cek['status'] == 202) {
                                if ($cek['data'] != null) {
                                    $datanotif[] = $cek['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek['message']);
                            }
                        }
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }
        }

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        if ($notif2 == null)
            $null = true;
        else {
            if ($notif2['status'] == 200 || $notif2['status'] == 202) {
                $datanotif2 = array();
                if ($notif2['data'] != null) {
                    foreach ($notif2['data'] as $value) {
                        $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                        if ($cek2 == null)
                            $null = true;
                        else {
                            if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                if ($cek2['data'] != null) {
                                    $datanotif2[] = $cek2['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek2['message']);
                            }
                        }
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }
        }

        if ($null)
            $this->load->view('server_error');
        else {
            $this->load->view('partials/user/header', $header);
            $this->load->view('profile/my_profile', $data);
            $this->load->view('partials/user/footer');
        }
    }

    public function edit_profile()
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $data['profile'] = $this->Profile_model->getProfile();
        if ($data['profile'] == null)
            $null = true;
        else {
            if ($data['profile']['status'] == 200 || $data['profile']['status'] == 202) {
                $tempprofile[] = $data['profile']['data'];
                $data['profile'] = $tempprofile;
            } else
                $this->session->set_flashdata("errorAPI", $data['profile']['message']);
        }

        $header['nama'] = $this->Classes_model->getMyName();
        if ($header['nama'] == null)
            $null = true;
        else {
            if ($header['nama']['status'] == 200)
                $header['nama'] = explode(" ", $header['nama']['data']);
            else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);
        }

        $notif = $this->Classes_model->getPesertaByUserId();
        if ($notif == null)
            $null = true;
        else {
            if ($notif['status'] == 200 || $notif['status'] == 202) {
                $datanotif = array();
                if ($notif['data'] != null) {
                    foreach ($notif['data'] as $value) {
                        $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                        if ($cek == null)
                            $null = true;
                        else {
                            if ($cek['status'] == 200 || $cek['status'] == 202) {
                                if ($cek['data'] != null) {
                                    $datanotif[] = $cek['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek['message']);
                            }
                        }
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }
        }

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        if ($notif2 == null)
            $null = true;
        else {
            if ($notif2['status'] == 200 || $notif2['status'] == 202) {
                $datanotif2 = array();
                if ($notif2['data'] != null) {
                    foreach ($notif2['data'] as $value) {
                        $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                        if ($cek2 == null)
                            $null = true;
                        else {
                            if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                if ($cek2['data'] != null) {
                                    $datanotif2[] = $cek2['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek2['message']);
                            }
                        }
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }
        }

        $this->load->view('partials/user/header', $header);
        $this->load->view('profile/edit_profile', $data);
        $this->load->view('partials/user/footer');
    }

    public function edit_profile_action()
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $edit_profile = $this->Profile_model->editProfile();
        if ($edit_profile == null)
            $null = true;
        else {
            if ($edit_profile['status'] == 200)
                $this->session->set_flashdata("success_update_profile", "Profil berhasil diubah.");
            else
                $this->session->set_flashdata("errorAPI", $edit_profile['message']);
        }
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
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $header['nama'] = $this->Classes_model->getMyName();
        if ($header['nama'] == null)
            $null = true;
        else {
            if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202)
                $header['nama'] = explode(" ", $header['nama']['data']);
            else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);
        }
        $notif = $this->Classes_model->getPesertaByUserId();
        if ($notif == null)
            $null = true;
        else {
            if ($notif['status'] == 200 || $notif['status'] == 202) {
                $datanotif = array();
                if ($notif['data'] != null) {
                    foreach ($notif['data'] as $value) {
                        $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                        if ($cek == null)
                            $null = true;
                        else {
                            if ($cek['status'] == 200 || $cek['status'] == 202) {
                                if ($cek['data'] != null) {
                                    $datanotif[] = $cek['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek['message']);
                            }
                        }
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }
        }

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        if ($notif2 == null)
            $null = true;
        else {
            if ($notif2['status'] == 200 || $notif2['status'] == 202) {
                $datanotif2 = array();
                if ($notif2['data'] != null) {
                    foreach ($notif2['data'] as $value) {
                        $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                        if ($cek2 == null)
                            $null = true;
                        else {
                            if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                if ($cek2['data'] != null) {
                                    $datanotif2[] = $cek2['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek2['message']);
                            }
                        }
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }
        }

        $this->load->view('partials/user/header', $header);
        $this->load->view('profile/change_password');
        $this->load->view('partials/user/footer');
    }

    public function change_password_action()
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }
        $oldPass = $this->input->post('old_password');
        $hashed = hash('sha256', $oldPass);
        $getPass = $this->User_database->getFirstAccount($this->session->userdata('email'));
        if ($getPass == null)
            $null = true;
        else {
            if ($getPass['status'] == 200 || $getPass['status'] == 202)
                $getPass = $getPass['data'];
            else
                $this->session->set_flashdata("errorAPI", $getPass['message']);
        }

        $getPassword = $getPass['password'];
        $newPassword = $this->input->post('password');
        $hashedNewPass = hash('sha256', $newPassword);
        if ($hashed == $getPassword) {

            if ($getPassword == $hashedNewPass) {
                $this->session->set_flashdata('same_pass', 'Password baru yang anda input sama dengan password lama anda');
                if ($null)
                    $this->load->view('server_error');
                else
                    redirect('profile/change_password');
            }

            $temp = $this->Profile_model->updatePassword($newPassword);
            if ($temp == null)
                $null = true;
            else {
                if ($temp['status'] == 200) {
                    $this->session->set_flashdata('pass', 'Password berhasil diubah.');
                    if ($null)
                        $this->load->view('server_error');
                    else
                        redirect('profile/change_password');
                } else {
                    $this->session->set_flashdata("errorAPI", $temp['message']);
                    if ($null)
                        $this->load->view('server_error');
                    else
                        redirect('profile/change_password');
                }
            }
            //nanti pake flashdata
            //redirect('profile');



        } else {
            $this->session->set_flashdata('invalid_pass', 'Password lama yang anda input salah');
            if ($null)
                $this->load->view('server_error');
            else
                redirect('profile/change_password');
        }
    }
}
