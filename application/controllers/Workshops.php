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
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
            if ($header['nama']['status'] == 200)
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200)
                        $cek = $cek['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek['message']);

                    if ($cek != null) {
                        $datanotif[] = $cek;
                    }
                }
                $header['notif'] = $datanotif;
            } else
                $this->session->set_flashdata("errorAPI", $notif['message']);

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200)
                        $cek2 = $cek2['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek2['message']);

                    if ($cek2 != null) {
                        $datanotif2[] = $cek;
                    }
                }
                $header['notif2'] = $datanotif2;
            } else
                $this->session->set_flashdata("errorAPI", $notif2['message']);


            $this->session->set_userdata('workshop', true);

            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
        }


        $data['categories'] = $this->Workshops_model->getKategori();
        if ($data['categories']['status'] == 200)
            $data['categories'] = $data['categories']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['categories']['message']);

        $data['class'] = $this->Workshops_model->getAllRandomClasses();
        if ($data['class']['status'] == 200)
            $data['class'] = $data['class']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['class']['message']);

        $data['classNum'] = $this->Workshops_model->getAllClassesDetail();
        if ($data['classNum']['status'] == 200)
            $data['classNum'] = count($data['class']['data']);
        else
            $this->session->set_flashdata("errorAPI", $data['classNum']['message']);

        $this->session->set_userdata('workshop', true);
        $this->load->view('workshops/workshop', $data);
        $this->load->view('partials/common/footer');
    }

    public function set_sess()
    {
        $this->session->set_userdata('workshop', true);
    }

    public function new_workshop()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['kategori'] = $this->Workshops_model->getKategori();
            if ($data['kategori']['status'] == 200)
                $data['kategori'] = $data['kategori']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kategori']['message']);

            $data['jenis'] = $this->Workshops_model->getJenis();
            if ($data['jenis']['status'] == 200)
                $data['jenis'] = $data['jenis']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['jenis']['message']);

            $data['pembuat'] = $this->Workshops_model->getMyName();
            if ($data['pembuat']['status'] == 200)
                $data['pembuat'] = $data['pembuat']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);

            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
            if ($header['nama']['status'] == 200)
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200)
                        $cek = $cek['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek['message']);

                    if ($cek != null) {
                        $datanotif[] = $cek;
                    }
                }
                $header['notif'] = $datanotif;
            } else
                $this->session->set_flashdata("errorAPI", $notif['message']);

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200)
                        $cek2 = $cek2['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek2['message']);

                    if ($cek2 != null) {
                        $datanotif2[] = $cek;
                    }
                }
                $header['notif2'] = $datanotif2;
            } else
                $this->session->set_flashdata("errorAPI", $notif2['message']);


            $this->load->view('partials/user/header', $header);
            $this->load->view('workshops/new_workshop', $data);
            $this->load->view('partials/user/footer');
        } else {
            redirect('home');
        }
    }

    public function new_class_action()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $newClass = $this->Workshops_model->createClass();
            if ($newClass['status'] == 200)
                $newClass = $newClass['data'];
            else
                $this->session->set_flashdata("errorAPI", $newClass['message']);

            if ($newClass == "fail") {
                $this->session->set_flashdata("invalidImage", "Invalid Image Size (Max Size: 3 MB)");
                redirect("workshops/new_workshop");
            }
            $id = $this->Workshops_model->getIdNewClass();
            if ($id['status'] == 200)
                $id = $id['data'];
            else
                $this->session->set_flashdata("errorAPI", $id['message']);

            redirect('workshops/open_workshop/' . $id['id_workshop']);
        } else {
            redirect('home');
        }
    }

    public function categories($kategori)
    {
        $kategorii = str_replace("%20", " ", $kategori);
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
            if ($header['nama']['status'] == 200)
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200)
                        $cek = $cek['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek['message']);

                    if ($cek != null) {
                        $datanotif[] = $cek;
                    }
                }
                $header['notif'] = $datanotif;
            } else
                $this->session->set_flashdata("errorAPI", $notif['message']);

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200)
                        $cek2 = $cek2['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek2['message']);

                    if ($cek2 != null) {
                        $datanotif2[] = $cek;
                    }
                }
                $header['notif2'] = $datanotif2;
            } else
                $this->session->set_flashdata("errorAPI", $notif2['message']);


            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
        }

        $data['kategori_text'] = $kategorii;
        $data['categories'] = $this->Workshops_model->getKategori();
        if ($data['categories']['status'] == 200)
            $data['categories'] = $data['categories']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['categories']['message']);

        $data['class'] = $this->Workshops_model->getClassesbyCategories($kategorii);
        if ($data['class']['status'] == 200)
            $data['class'] = $data['class']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['class']['message']);

        $data['classNum'] = $this->Workshops_model->getClassesbyCategories($kategorii);
        if ($data['classNum']['status'] == 200)
            $data['classNum'] = count($data['classNum']['data']);
        else
            $this->session->set_flashdata("errorAPI", $data['classNum']['message']);

        $this->load->view('workshops/workshopfilter', $data);
        $this->load->view('partials/common/footer');
    }

    public function sort($sorting)
    {
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
            if ($header['nama']['status'] == 200)
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200)
                        $cek = $cek['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek['message']);

                    if ($cek != null) {
                        $datanotif[] = $cek;
                    }
                }
                $header['notif'] = $datanotif;
            } else
                $this->session->set_flashdata("errorAPI", $notif['message']);

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200)
                        $cek2 = $cek2['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek2['message']);

                    if ($cek2 != null) {
                        $datanotif2[] = $cek;
                    }
                }
                $header['notif2'] = $datanotif2;
            } else
                $this->session->set_flashdata("errorAPI", $notif2['message']);

            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
        }
        $data['kategori_text'] = $sorting;

        $data['categories'] = $this->Workshops_model->getKategori();
        if ($data['categories']['status'] == 200)
            $data['categories'] = $data['categories']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['categories']['message']);

        $data['class'] = $this->Workshops_model->getClassesbySorting($sorting);
        if ($data['class']['status'] == 200)
            $data['class'] = $data['class']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['class']['message']);

        $data['classNum'] = $this->Workshops_model->getClassesbySorting($sorting);
        if ($data['classNum']['status'] == 200)
            $data['classNum'] = count($data['classNum']['data']);
        else
            $this->session->set_flashdata("errorAPI", $data['classNum']['message']);

        $this->load->view('workshops/workshopfilter', $data);
        $this->load->view('partials/common/footer');
    }

    public function search()
    {
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
            if ($header['nama']['status'] == 200)
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200)
                        $cek = $cek['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek['message']);

                    if ($cek != null) {
                        $datanotif[] = $cek;
                    }
                }
                $header['notif'] = $datanotif;
            } else
                $this->session->set_flashdata("errorAPI", $notif['message']);

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200)
                        $cek2 = $cek2['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek2['message']);

                    if ($cek2 != null) {
                        $datanotif2[] = $cek;
                    }
                }
                $header['notif2'] = $datanotif2;
            } else
                $this->session->set_flashdata("errorAPI", $notif2['message']);


            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
        }

        $data['kategori_text'] = "Pencarian";
        $data['keyword'] = $this->input->post('keyword');

        $data['categories'] = $this->Workshops_model->getKategori();
        if ($data['categories']['status'] == 200)
            $data['categories'] = $data['categories']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['categories']['message']);

        $data['class'] = $this->Workshops_model->getAllClassesDetail($data['keyword']);
        if ($data['class']['status'] == 200)
            $data['class'] = $data['class']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['class']['message']);

        $data['classNum'] = $this->Workshops_model->getAllClassesDetail($data['keyword']);
        if ($data['classNum']['status'] == 200)
            $data['classNum'] = count($data['classNum']['data']);
        else
            $this->session->set_flashdata("errorAPI", $data['classNum']['message']);

        if ($data['classNum'] == 0) {
            $data['tidak_ketemu'] = "workshop yang anda cari tidak ada.";
        }
        $this->load->view('workshops/workshopfilter', $data);
        $this->load->view('partials/common/footer');
    }

    public function join_workshop($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $temp = $this->Workshops_model->joinClass($id_kelas);
            if ($temp['status'] != 200)
                $this->session->set_flashdata("errorAPI", $temp['message']);
            redirect('workshops/open_workshop/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function edit_kegiatan($id_kelas, $id_kegiatan)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Workshops_model->getClassById($id_kelas);
        if ($classDetail['status'] == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_workshop'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);

        if (!$isClassOwner) {
            redirect("home");
        }

        $kegiatan = $this->Workshops_model->updateKegiatan($id_kegiatan);
        if ($kegiatan['status'] != 200)
            $this->session->set_flashdata("errorAPI", $kegiatan['message']);

        if ($kegiatan == "success") {
            $this->session->set_flashdata("success", "Jadwal Kegiatan anda berhasil di update!");
        }
        redirect('workshops/open_workshop/' . $id_kelas);
    }


    public function open_workshop($id_kelas)
    {
        $data['seluruh_kelas'] = $this->Workshops_model->getAllTopClasses();
        if ($data['seluruh_kelas']['status'] == 200)
            $data['seluruh_kelas'] = $data['seluruh_kelas']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['seluruh_kelas']['message']);

        $data['seluruh_harga'] = $this->Workshops_model->getAllHarga();
        if ($data['seluruh_harga']['status'] == 200)
            $data['seluruh_harga'] = $data['seluruh_harga']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['seluruh_harga']['message']);

        $data['kegiatan'] = $this->Workshops_model->getKegiatan($id_kelas);
        if ($data['kegiatan']['status'] == 200)
            $data['kegiatan'] = $data['kegiatan']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['kegiatan']['message']);

        $data['tanggal'] = $this->Workshops_model->getTanggalKegiatan($id_kelas);
        if ($data['tanggal']['status'] == 200)
            $data['tanggal'] = $data['tanggal']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['tanggal']['message']);

        $data['kelas'] = $this->Workshops_model->getClassById($id_kelas);
        if ($data['kelas']['status'] == 200)
            $data['kelas'] = $data['kelas']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

        $data['pembuat'] = $this->Workshops_model->getPembuat();
        if ($data['pembuat']['status'] == 200)
            $data['pembuat'] = $data['pembuat']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);

        $data['peserta_kelas'] = $this->Workshops_model->getPesertaByClassId($id_kelas);
        if ($data['peserta_kelas']['status'] == 200)
            $data['peserta_kelas'] = $data['peserta_kelas']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['peserta_kelas']['message']);

        $data['peserta_seluruh_kelas'] = $this->Workshops_model->getPeserta();
        if ($data['peserta_seluruh_kelas']['status'] == 200)
            $data['peserta_seluruh_kelas'] = $data['peserta_seluruh_kelas']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['peserta_seluruh_kelas']['message']);

        $data['kategori'] = $this->Workshops_model->getKategori();
        if ($data['kategori']['status'] == 200)
            $data['kategori'] = $data['kategori']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['kategori']['message']);

        $data['status'] = $this->Workshops_model->getStatus();
        if ($data['status']['status'] == 200)
            $data['status'] = $data['status']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['status']['message']);

        $data['harga'] = $this->Workshops_model->getHarga($id_kelas);
        if ($data['harga']['status'] == 200)
            $data['harga'] = $data['harga']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['harga']['message']);

        $data['peserta'] = $this->Workshops_model->getPesertaByUserIdClassId($id_kelas);
        if ($data['peserta']['status'] == 200)
            $data['peserta'] = $data['peserta']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['peserta']['message']);

        $data['cek'] = $this->Workshops_model->cekPeserta($id_kelas);
        if ($data['cek']['status'] == 200)
            $data['cek'] = $data['kegiatan']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['cek']['message']);
        //$data['materi'] = $this->Workshops_model->getMateri($id_kelas);
        //$data['materiKegiatan'] = $this->Workshops_model->getMateribyKegiatan();

        if (isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('buttonJoin', 'Anda telah mengikuti kelas ini');
            $this->session->set_flashdata('batasPeserta', 'Maaf, kelas ini telah penuh');

            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
            if ($header['nama']['status'] == 200)
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200)
                        $cek = $cek['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek['message']);

                    if ($cek != null) {
                        $datanotif[] = $cek;
                    }
                }
                $header['notif'] = $datanotif;
            } else
                $this->session->set_flashdata("errorAPI", $notif['message']);

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200)
                        $cek2 = $cek2['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek2['message']);

                    if ($cek2 != null) {
                        $datanotif2[] = $cek;
                    }
                }
                $header['notif2'] = $datanotif2;
            } else
                $this->session->set_flashdata("errorAPI", $notif2['message']);


            $this->load->view('partials/user/header', $header);
            $this->load->view('workshops/openworkshop', $data);
            $this->load->view('partials/user/footer');
        } else {
            $this->load->view('partials/common/header');
            $this->load->view('workshops/openworkshop', $data);
            $this->load->view('partials/common/footer');
        }
    }

    public function pembayaran_workshop($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
            if ($header['nama']['status'] == 200)
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200)
                        $cek = $cek['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek['message']);

                    if ($cek != null) {
                        $datanotif[] = $cek;
                    }
                }
                $header['notif'] = $datanotif;
            } else
                $this->session->set_flashdata("errorAPI", $notif['message']);

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200)
                        $cek2 = $cek2['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek2['message']);

                    if ($cek2 != null) {
                        $datanotif2[] = $cek;
                    }
                }
                $header['notif2'] = $datanotif2;
            } else
                $this->session->set_flashdata("errorAPI", $notif2['message']);

            $this->load->view('partials/user/header', $header);
            $this->load->view('workshops/pembayaran', $id_kelas);
            $this->load->view('partials/user/footer');
        } else {
            redirect('home');
        }
    }

    public function update_workshop($id_kelas)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Workshops_model->getClassById($id_kelas);
        if ($classDetail['status'] == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_workshop'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);

        if (!$isClassOwner) {
            redirect("home");
        }

        $data['kategori'] = $this->Workshops_model->getKategori();
        if ($data['kategori']['status'] == 200)
            $data['kategori'] = $data['kategori']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['kategori']['message']);

        $data['jenis'] = $this->Workshops_model->getJenis();
        if ($data['jenis']['status'] == 200)
            $data['jenis'] = $data['jenis']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['jenis']['message']);

        $data['kelas'] = $this->Workshops_model->getClassById($id_kelas);
        if ($data['kelas']['status'] == 200)
            $data['kelas'] = $data['kelas']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

        $data['pembuat'] = $this->Workshops_model->getMyName();
        if ($data['pembuat']['status'] == 200)
            $data['pembuat'] = $data['pembuat']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);

        $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
        if ($header['nama']['status'] == 200)
            $header['nama'] = explode(" ", $header['nama']['data']['nama']);
        else
            $this->session->set_flashdata("errorAPI", $header['nama']['message']);

        $notif = $this->Classes_model->getPesertaByUserId();
        if ($notif['status'] == 200) {
            $datanotif = array();
            foreach ($notif['data'] as $value) {
                $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                if ($cek['status'] == 200)
                    $cek = $cek['data'];
                else
                    $this->session->set_flashdata("errorAPI", $cek['message']);

                if ($cek != null) {
                    $datanotif[] = $cek;
                }
            }
            $header['notif'] = $datanotif;
        } else
            $this->session->set_flashdata("errorAPI", $notif['message']);

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        if ($notif2['status'] == 200) {
            $datanotif2 = array();
            foreach ($notif2['data'] as $value) {
                $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                if ($cek2['status'] == 200)
                    $cek2 = $cek2['data'];
                else
                    $this->session->set_flashdata("errorAPI", $cek2['message']);

                if ($cek2 != null) {
                    $datanotif2[] = $cek;
                }
            }
            $header['notif2'] = $datanotif2;
        } else
            $this->session->set_flashdata("errorAPI", $notif2['message']);

        $this->load->view('partials/user/header', $header);
        $this->load->view('workshops/update_workshop', $data);
        $this->load->view('partials/user/footer');
    }

    public function update_workshop_action($id_kelas)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Workshops_model->getClassById($id_kelas)[0];
        if ($classDetail['status'] == 200) {
            $classDetail = $classDetail['data'];
            $isClassOwner = $classDetail['pembuat_workshop'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);

        if (!$isClassOwner) {
            redirect("home");
        }

        $updateClass = $this->Workshops_model->updateClass($id_kelas);
        if ($updateClass['status'] != 200)
            $this->session->set_flashdata("errorAPI", $updateClass['message']);
        if ($updateClass == "fail") {
            $this->session->set_flashdata("invalidImage", "Invalid Image Size (Max Size: 3 MB)");
            redirect("workshops/update_workshop/" . $id_kelas);
        }
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
        if (isset($this->session->userdata['logged_in'])) {
            $temp = $this->Workshops_model->leaveClass($id_kelas);
            if ($temp['status'] != 200)
                $this->session->set_flashdata("errorAPI", $temp['message']);
            redirect('classes/my_classes');
        } else {
            redirect('home');
        }
    }
}
