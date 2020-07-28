<?php

class Workshops extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Workshops_model');
        $this->load->model('Classes_model');
        $this->load->helper('url');
        $this->load->helper('download');
    }


    public function index()
    {
        $null = false;
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = $this->Workshops_model->getMyName();
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
                                if ($cek['status'] == 200 || $cek['status'] == 202)
                                    $cek = $cek['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek['message']);

                                if ($cek != null) {
                                    $datanotif[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else
                    $this->session->set_flashdata("errorAPI", $notif['message']);
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
                                if ($cek2['status'] == 200 || $cek2['status'] == 202)
                                    $cek2 = $cek2['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);

                                if ($cek2 != null) {
                                    $datanotif2[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

            if (!$null) {
                $this->session->set_userdata('workshop', true);
                $this->load->view('partials/user/header', $header);
            }
        }

        $data['categories'] = $this->Workshops_model->getKategori();
        if ($data['categories'] == null)
            $null = true;
        else {
            if ($data['categories']['status'] == 200 || $data['categories']['status'] == 202)
                $data['categories'] = $data['categories']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['categories']['message']);
        }

        $data['class'] = $this->Workshops_model->getAllRandomClasses();
        if ($data['class'] == null)
            $null = true;
        else {
            if ($data['class']['status'] == 200 || $data['class']['status'] == 202)
                $data['class'] = $data['class']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['class']['message']);
        }

        $data['classNum'] = $this->Workshops_model->getAllClassesDetail();
        if ($data['classNum'] == null)
            $null = true;
        else {
            if ($data['classNum']['status'] == 200 || $data['classNum']['status'] == 202)
                $data['classNum'] = count($data['classNum']['data']);
            else
                $this->session->set_flashdata("errorAPI", $data['classNum']['message']);
        }

        if ($null)
            $this->load->view('server_error');
        else {
            if (!isset($_SESSION['logged_in']))
                $this->load->view('partials/common/header');

            $this->session->set_userdata('workshop', true);
            $this->load->view('workshops/workshop', $data);
            $this->load->view('partials/common/footer');
        }
    }

    public function set_sess()
    {
        $this->session->set_userdata('workshop', true);
    }

    public function new_workshop()
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {

            $data['kategori'] = $this->Workshops_model->getKategori();
            if ($data['kategori'] == null)
                $null = true;
            else {
                if ($data['kategori']['status'] == 200 || $data['kategori']['status'] == 202)
                    $data['kategori'] = $data['kategori']['data'];
                else
                    $this->session->set_flashdata("errorAPI", $data['kategori']['message']);
            }

            $data['jenis'] = $this->Workshops_model->getJenis();
            if ($data['jenis'] == null)
                $null = true;
            else {
                if ($data['jenis']['status'] == 200 || $data['jenis']['status'] == 202)
                    $data['jenis'] = $data['jenis']['data'];
                else
                    $this->session->set_flashdata("errorAPI", $data['jenis']['message']);
            }

            $data['pembuat'] = $this->Workshops_model->getMyName();
            if ($data['pembuat'] == null)
                $null = true;
            else {
                if ($data['pembuat']['status'] == 200 || $data['pembuat']['status'] == 202)
                    $data['pembuat']['nama'] = $data['pembuat']['data'];
                else
                    $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);
            }

            $header['nama'] = $this->Workshops_model->getMyName();
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
                                if ($cek['status'] == 200 || $cek['status'] == 202)
                                    $cek = $cek['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek['message']);

                                if ($cek != null) {
                                    $datanotif[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else
                    $this->session->set_flashdata("errorAPI", $notif['message']);
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
                                if ($cek2['status'] == 200 || $cek2['status'] == 202)
                                    $cek2 = $cek2['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);

                                if ($cek2 != null) {
                                    $datanotif2[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

            if ($null)
                $this->load->view('server_error');
            else {
                $this->load->view('partials/user/header', $header);
                $this->load->view('workshops/new_workshop', $data);
                $this->load->view('partials/user/footer');
            }
        } else {
            redirect('home');
        }
    }

    public function new_class_action()
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {

            $newClass = $this->Workshops_model->createClass();
            if ($newClass == 'server_error')
                $null = true;
            else {
                if ($newClass == 'success')
                    $newClass = $newClass['data'];
                else
                    $this->session->set_flashdata("errorAPI", $newClass['message']);
            }

            if (!$null) {
                if ($newClass == "fail") {
                    $this->session->set_flashdata("invalidImage", "Invalid Image Size (Max Size: 3 MB)");
                    redirect("workshops/new_workshop");
                } else if ($newClass == 'update_error') {
                    $this->session->set_flashdata("update_error", "Update error");
                    redirect('workshops/new_workshop');
                }
            }

            $id = $this->Workshops_model->getIdNewClass();
            if ($id == null)
                $null = true;
            else {
                if ($id['status'] == 200 || $id['status'] == 202)
                    $id = $id['data'];
                else
                    $this->session->set_flashdata("errorAPI", $id['message']);
            }

            if ($null)
                $this->load->view('server_error');
            else
                redirect('workshops/open_workshop/' . $id['id_workshop']);
        } else
            redirect('home');
    }

    public function categories($kategori)
    {
        $null = false;
        $kategorii = str_replace("%20", " ", $kategori);
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = $this->Workshops_model->getMyName();
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
                                if ($cek['status'] == 200 || $cek['status'] == 202)
                                    $cek = $cek['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek['message']);

                                if ($cek != null) {
                                    $datanotif[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else
                    $this->session->set_flashdata("errorAPI", $notif['message']);
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
                                if ($cek2['status'] == 200 || $cek2['status'] == 202)
                                    $cek2 = $cek2['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);

                                if ($cek2 != null) {
                                    $datanotif2[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

            if (!$null) {
                $this->session->set_userdata('workshop', true);
                $this->load->view('partials/user/header', $header);
            }
        }

        $data['kategori_text'] = $kategorii;
        $data['categories'] = $this->Workshops_model->getKategori();
        if ($data['categories'] == null)
            $null = true;
        else {
            if ($data['categories']['status'] == 200 || $data['categories']['status'] == 202)
                $data['categories'] = $data['categories']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['categories']['message']);
        }

        $data['class'] = $this->Workshops_model->getClassesbyCategories($kategorii);
        if ($data['class'] == null)
            $null = true;
        else {
            if ($data['class']['status'] == 200 || $data['class']['status'] == 202)
                $data['class'] = $data['class']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['class']['message']);
        }

        $data['classNum'] = $this->Workshops_model->getClassesbyCategories($kategorii);
        if ($data['classNum'] == null)
            $null = true;
        else {
            if ($data['classNum']['status'] == 200 || $data['classNum']['status'] == 202)
                $data['classNum'] = count($data['classNum']['data']);
            else
                $this->session->set_flashdata("errorAPI", $data['classNum']['message']);
        }

        if ($null)
            $this->load->view('server_error');
        else {
            if (isset($_SESSION['logged_in']))
                $this->load->view('partials/common/header');
            $this->load->view('workshops/workshopfilter', $data);
            $this->load->view('partials/common/footer');
        }
    }

    public function sort($sorting)
    {
        $null = false;
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = $this->Workshops_model->getMyName();
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
                                if ($cek['status'] == 200 || $cek['status'] == 202)
                                    $cek = $cek['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek['message']);

                                if ($cek != null) {
                                    $datanotif[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else
                    $this->session->set_flashdata("errorAPI", $notif['message']);
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
                                if ($cek2['status'] == 200 || $cek2['status'] == 202)
                                    $cek2 = $cek2['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);

                                if ($cek2 != null) {
                                    $datanotif2[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

            if (!$null) {
                $this->session->set_userdata('workshop', true);
                $this->load->view('partials/user/header', $header);
            }
        }

        $data['kategori_text'] = $sorting;

        $data['categories'] = $this->Workshops_model->getKategori();
        if ($data['categories'] == null)
            $null = true;
        else {
            if ($data['categories']['status'] == 200 || $data['categories']['status'] == 202)
                $data['categories'] = $data['categories']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['categories']['message']);
        }

        $data['class'] = $this->Workshops_model->getClassesbySorting($sorting);
        if ($data['class'] == null)
            $null = true;
        else {
            if ($data['class']['status'] == 200 || $data['class']['status'] == 202)
                $data['class'] = $data['class']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['class']['message']);
        }

        $data['classNum'] = $this->Workshops_model->getClassesbySorting($sorting);
        if ($data['classNum'] == null)
            $null = true;
        else {
            if ($data['classNum']['status'] == 200 || $data['classNum']['status'] == 202)
                $data['classNum'] = count($data['classNum']['data']);
            else
                $this->session->set_flashdata("errorAPI", $data['classNum']['message']);
        }

        if ($null)
            $this->load->view('server_error');
        else {
            if (isset($_SESSION['logged_in']))
                $this->load->view('partials/common/header');
            $this->load->view('workshops/workshopfilter', $data);
            $this->load->view('partials/common/footer');
        }
    }

    public function search()
    {
        $null = false;
        if (isset($_SESSION['logged_in'])) {

            $header['nama'] =  $this->Workshops_model->getMyName();
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
                                if ($cek['status'] == 200 || $cek['status'] == 202)
                                    $cek = $cek['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek['message']);

                                if ($cek != null) {
                                    $datanotif[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else
                    $this->session->set_flashdata("errorAPI", $notif['message']);
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
                                if ($cek2['status'] == 200 || $cek2['status'] == 202)
                                    $cek2 = $cek2['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);

                                if ($cek2 != null) {
                                    $datanotif2[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

            if (!$null)
                $this->load->view('partials/user/header', $header);
        }


        $data['kategori_text'] = "Pencarian";
        $data['keyword'] = $this->input->post('keyword');

        $data['categories'] = $this->Workshops_model->getKategori();
        if ($data['categories'] == null)
            $null = true;
        else {
            if ($data['categories']['status'] == 200 || $data['categories']['status'] == 202)
                $data['categories'] = $data['categories']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['categories']['message']);
        }

        $data['class'] = $this->Workshops_model->getAllClassesDetail($data['keyword']);
        if ($data['class'] == null)
            $null = true;
        else {
            if ($data['class']['status'] == 200 || $data['class']['status'] == 202)
                $data['class'] = $data['class']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['class']['message']);
        }

        $data['classNum'] = $this->Workshops_model->getAllClassesDetail($data['keyword']);
        if ($data['classNum'] == null)
            $null = true;
        else {
            if ($data['classNum']['status'] == 200 || $data['classNum']['status'] == 202)
                $data['classNum'] = count($data['classNum']['data']);
            else
                $this->session->set_flashdata("errorAPI", $data['classNum']['message']);
        }
        if (!$null) {
            if ($data['classNum'] == 0) {
                $data['tidak_ketemu'] = "workshop yang anda cari tidak ada.";
            }
        }

        if ($null)
            $this->load->view('server_error');
        else {
            if (!isset($_SESSION['logged_in']))
                $this->load->view('partials/common/header');
            $this->load->view('workshops/workshopfilter', $data);
            $this->load->view('partials/common/footer');
        }
    }

    public function join_workshop($id_kelas)
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {
            $temp = $this->Workshops_model->joinClass($id_kelas);
            if ($temp == null)
                $null = true;
            else {
                if ($temp['status'] != 200)
                    $this->session->set_flashdata("errorAPI", $temp['message']);
            }
            if ($null)
                $this->load->view('server_error');
            else
                redirect('workshops/open_workshop/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function edit_kegiatan($id_kelas, $id_kegiatan)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Workshops_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_workshop'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }

        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }

        $kegiatan = $this->Workshops_model->updateKegiatan($id_kegiatan);
        if ($kegiatan == null)
            $null = true;
        else {
            if ($kegiatan['status'] == 200)
                $this->session->set_flashdata("success", "Jadwal Kegiatan anda berhasil di update!");
            else
                $this->session->set_flashdata("errorAPI", $kegiatan['message']);
        }

        if ($null)
            $this->load->view('server_error');
        else
            redirect('workshops/open_workshop/' . $id_kelas);
    }


    public function open_workshop($id_kelas)
    {
        $null = false;
        $data['seluruh_kelas'] = $this->Workshops_model->getAllTopClasses();
        if ($data['seluruh_kelas'] == null)
            $null = true;
        else {
            if ($data['seluruh_kelas']['status'] == 200 || $data['seluruh_kelas']['status'] == 202)
                $data['seluruh_kelas'] = $data['seluruh_kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['seluruh_kelas']['message']);
        }

        $data['seluruh_harga'] = $this->Workshops_model->getAllHarga();
        if ($data['seluruh_harga'] == null)
            $null = true;
        else {
            if ($data['seluruh_harga']['status'] == 200 || $data['seluruh_harga'] == 202)
                $data['seluruh_harga'] = $data['seluruh_harga']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['seluruh_harga']['message']);
        }

        $data['kegiatan'] = $this->Workshops_model->getAllKegiatan();
        if ($data['kegiatan'] == null)
            $null = true;
        else {
            if ($data['kegiatan']['status'] == 200 || $data['kegiatan']['status'] == 202)
                $data['kegiatan'] = $data['kegiatan']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kegiatan']['message']);
        }

        $data['tanggal'] = $this->Workshops_model->getTanggalKegiatan($id_kelas);
        if ($data['tanggal'] == null)
            $null = true;
        else {
            if ($data['tanggal']['status'] == 200 || $data['tanggal']['status'] == 202)
                $data['tanggal'] = $data['tanggal']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['tanggal']['message']);
        }

        $data['kelas'] = $this->Workshops_model->getClassById($id_kelas);
        if ($data['kelas'] == null)
            $null = true;
        else {
            if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202) {
                $temp[] = $data['kelas']['data'];
                $data['kelas'] = $temp;
            } else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
        }

        $data['pembuat'] = $this->Workshops_model->getPembuat();
        if ($data['pembuat'] == null)
            $null = true;
        else {
            if ($data['pembuat']['status'] == 200 || $data['pembuat']['status'] == 202)
                $data['pembuat'] = $data['pembuat']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);
        }

        $data['peserta_kelas'] = $this->Workshops_model->getPesertaByClassId($id_kelas);
        if ($data['peserta_kelas'] == null)
            $null = true;
        else {
            if ($data['peserta_kelas']['status'] == 200 || $data['peserta_kelas']['status'] == 202) {
                if ($data['peserta_kelas']['data'] == null) {
                    $temp4 = array();
                    $data['peserta_kelas'] = $temp4;
                } else
                    $data['peserta_kelas'] = $data['peserta_kelas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['peserta_kelas']['message']);
        }

        $data['peserta_seluruh_kelas'] = $this->Workshops_model->getPeserta();
        if ($data['peserta_seluruh_kelas'] == null)
            $null = true;
        else {
            if ($data['peserta_seluruh_kelas']['status'] == 200 || $data['peserta_seluruh_kelas']['status'] == 202)
                $data['peserta_seluruh_kelas'] = $data['peserta_seluruh_kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['peserta_seluruh_kelas']['message']);
        }

        $data['kategori'] = $this->Workshops_model->getKategori();
        if ($data['kategori'] == null)
            $null = true;
        else {
            if ($data['kategori']['status'] == 200 || $data['kategori']['status'] == 202)
                $data['kategori'] = $data['kategori']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kategori']['message']);
        }

        $data['status'] = $this->Workshops_model->getStatus();
        if ($data['status'] == null)
            $null = true;
        else {
            if ($data['status']['status'] == 200 || $data['status']['status'] == 202)
                $data['status'] = $data['status']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['status']['message']);
        }

        $data['harga'] = $this->Workshops_model->getHarga($id_kelas);
        if ($data['harga'] == null)
            $null = true;
        else {
            if ($data['harga']['status'] == 200 || $data['harga']['status'] == 202)
                $data['harga'] = $data['harga']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['harga']['message']);
        }

        $data['peserta'] = $this->Workshops_model->getPesertaByUserIdClassId($id_kelas);
        if ($data['peserta'] == null)
            $null = true;
        else {
            if ($data['peserta']['status'] == 200 || $data['peserta']['status'] == 202)
                $data['peserta'] = $data['peserta']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['peserta']['message']);
        }

        $data['cek'] = $this->Workshops_model->cekPeserta($id_kelas);
        if ($data['cek'] == 'server_error')
            $null = true;
        else {
            if ($data['cek'] == true)
                $data['cek'] = $data['kegiatan']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['cek']['message']);
        }
        //$data['materi'] = $this->Workshops_model->getMateri($id_kelas);
        //$data['materiKegiatan'] = $this->Workshops_model->getMateribyKegiatan();
        $data['error_bagian'] = "workshop";

        if (isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('buttonJoin', 'Anda telah mengikuti kelas ini');
            $this->session->set_flashdata('batasPeserta', 'Maaf, kelas ini telah penuh');

            $header['nama'] = $this->Workshops_model->getMyName();
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
                                if ($cek['status'] == 200 || $cek['status'] == 202)
                                    $cek = $cek['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek['message']);

                                if ($cek != null) {
                                    $datanotif[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else
                    $this->session->set_flashdata("errorAPI", $notif['message']);
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
                                if ($cek2['status'] == 200 || $cek2['status'] == 202)
                                    $cek2 = $cek2['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);

                                if ($cek2 != null) {
                                    $datanotif2[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

            // if ($null)
            //     $this->load->view('server_error');
            // else {
            $this->load->view('partials/user/header', $header);
            if (count($data['kelas']) == 0 || count($data['kelas']) == null)
                $this->load->view('classes/error_class', $data);
            else
                $this->load->view('workshops/openworkshop', $data);
            $this->load->view('partials/user/footer');
            // }
        } else {
            // if ($null)
            //     $this->load->view('server_error');
            // else {
            $this->load->view('partials/common/header');
            if (count($data['kelas']) == 0 || count($data['kelas']) == null)
                $this->load->view('classes/error_class', $data);
            else
                $this->load->view('workshops/openworkshop', $data);
            $this->load->view('partials/common/footer');
            // }
        }
    }

    public function pembayaran_workshop($id_kelas)
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {
            $header['nama'] = $this->Workshops_model->getMyName();
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
                                if ($cek['status'] == 200 || $cek['status'] == 202)
                                    $cek = $cek['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek['message']);

                                if ($cek != null) {
                                    $datanotif[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else
                    $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2 == null)
                $null = true;
            else {
                if ($notif2['status'] == 200 || $notif2['status'] == 202) {
                    $datanotif2 = array();
                    if ($notif['data'] != null) {
                        foreach ($notif2['data'] as $value) {
                            $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                            if ($cek2 == null)
                                $null = true;
                            else {
                                if ($cek2['status'] == 200 || $cek2['status'] == 202)
                                    $cek2 = $cek2['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);

                                if ($cek2 != null) {
                                    $datanotif2[] = $cek;
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

            if ($null)
                $this->load->view('server_error');
            else {
                $this->load->view('partials/user/header', $header);
                $this->load->view('workshops/pembayaran', $id_kelas);
                $this->load->view('partials/user/footer');
            }
        } else {
            redirect('home');
        }
    }

    public function update_workshop($id_kelas)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Workshops_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_workshop'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }

        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }

        $data['kategori'] = $this->Workshops_model->getKategori();
        if ($data['kategori'] == null)
            $null = true;
        else {
            if ($data['kategori']['status'] == 200 || $data['kategori']['status'] == 202)
                $data['kategori'] = $data['kategori']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kategori']['message']);
        }

        $data['jenis'] = $this->Workshops_model->getJenis();
        if ($data['jenis'] == null)
            $null = true;
        else {
            if ($data['jenis']['status'] == 200 || $data['jenis']['status'] == 202)
                $data['jenis'] = $data['jenis']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['jenis']['message']);
        }

        $data['kelas'] = $this->Workshops_model->getClassById($id_kelas);
        if ($data['kelas'] == null)
            $null = true;
        else {
            if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
        }

        $data['pembuat'] = $this->Workshops_model->getMyName();
        if ($data['pembuat'] == null)
            $null = true;
        else {
            if ($data['pembuat']['status'] == 200 || $data['pembuat']['status'] == 202)
                $data['pembuat'] = $data['pembuat']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);
        }

        $header['nama'] = $this->Workshops_model->getMyName();
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
                            if ($cek['status'] == 200 || $cek['status'] == 202)
                                $cek = $cek['data'];
                            else
                                $this->session->set_flashdata("errorAPI", $cek['message']);

                            if ($cek != null) {
                                $datanotif[] = $cek;
                            }
                        }
                    }
                }
                $header['notif'] = $datanotif;
            } else
                $this->session->set_flashdata("errorAPI", $notif['message']);
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
                            if ($cek2['status'] == 200 || $cek2['status'] == 202)
                                $cek2 = $cek2['data'];
                            else
                                $this->session->set_flashdata("errorAPI", $cek2['message']);

                            if ($cek2 != null) {
                                $datanotif2[] = $cek;
                            }
                        }
                    }
                }
                $header['notif2'] = $datanotif2;
            } else
                $this->session->set_flashdata("errorAPI", $notif2['message']);
        }

        if ($null)
            $this->load->view('server_error');
        else {
            $this->load->view('partials/user/header', $header);
            $this->load->view('workshops/update_workshop', $data);
            $this->load->view('partials/user/footer');
        }
    }

    public function update_workshop_action($id_kelas)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Workshops_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_workshop'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }

        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }
        $updateClass = $this->Workshops_model->updateClass($id_kelas);
        if ($updateClass = 'server_error')
            $null = true;
        else {
            if ($updateClass == 'success')
                $this->session->set_flashdata("success_update", "Update workshop berhasil");

            else if ($updateClass == "fail") {
                $this->session->set_flashdata("invalidImage", "Invalid Image Size (Max Size: 3 MB)");
                redirect("workshops/update_workshop/" . $id_kelas);
            } else
                $this->session->set_flashdata("errorAPI", $updateClass);
        }

        if ($null)
            $this->load->view('server_error');
        else
            redirect('workshops/open_workshop/' . $id_kelas);
    }

    public function lihat_kegiatan($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata("jadwalKegiatan", "#tambahKegiatan");
            redirect('workshops/open_workshop/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function leave_workshop($id_kelas)
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {
            $temp = $this->Workshops_model->leaveClass($id_kelas);
            if ($temp == null)
                $null = true;
            else {
                if ($temp['status'] != 200)
                    $this->session->set_flashdata("errorAPI", $temp['message']);
            }

            if ($null)
                $this->load->view('server_error');
            else
                redirect('classes/my_classes');
        } else {
            redirect('home');
        }
    }
}
