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
            $this->session->set_userdata('workshop', true);

            $this->load->view('partialsuser/header', $header);
        } else {
            $this->load->view('partials/header');
        }


        $data['categories'] = $this->Workshops_model->getKategori();
        $data['class'] = $this->Workshops_model->getAllRandomClasses();
        $data['classNum'] = count($this->Workshops_model->getAllClassesDetail());
        $this->session->set_userdata('workshop', true);
        $this->load->view('workshops/workshop', $data);
        $this->load->view('partials/footer');
    }

    public function new_workshop()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['kategori'] = $this->Workshops_model->getKategori();
            $data['jenis'] = $this->Workshops_model->getJenis();
            $data['pembuat'] = $this->Workshops_model->getMyName();
            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
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

            $this->load->view('partialsuser/header', $header);
            $this->load->view('workshops/new_workshop', $data);
            $this->load->view('partialsuser/footer');
        } else {
            redirect('home');
        }
    }

    public function new_class_action()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $newClass = $this->Workshops_model->createClass();
            if ($newClass == "fail") {
                $this->session->set_flashdata("invalidImage", "Invalid Image Size (Max Size: 3 MB)");
                redirect("workshops/new_workshop");
            }
            $id = $this->Workshops_model->getIdNewClass();
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
            $this->load->view('partialsuser/header', $header);
        } else {
            $this->load->view('partials/header');
        }
        $data['kategori_text'] = $kategorii;
        $data['categories'] = $this->Workshops_model->getKategori();
        $data['class'] = $this->Workshops_model->getClassesbyCategories($kategorii);
        $data['classNum'] = count($this->Workshops_model->getClassesbyCategories($kategorii));
        $this->load->view('workshops/workshopfilter', $data);
        $this->load->view('partials/footer');
    }

    public function sort($sorting)
    {
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
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
            $this->load->view('partialsuser/header', $header);
        } else {
            $this->load->view('partials/header');
        }
        $data['kategori_text'] = $sorting;
        $data['categories'] = $this->Workshops_model->getKategori();
        $data['class'] = $this->Workshops_model->getClassesbySorting($sorting);
        $data['classNum'] = count($this->Workshops_model->getClassesbySorting($sorting));
        $this->load->view('workshops/workshopfilter', $data);
        $this->load->view('partials/footer');
    }

    public function search()
    {
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
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
            $this->load->view('partialsuser/header', $header);
        } else {
            $this->load->view('partials/header');
        }

        $data['kategori_text'] = "Pencarian";
        $data['keyword'] = $this->input->post('keyword');
        $data['categories'] = $this->Workshops_model->getKategori();
        $data['class'] = $this->Workshops_model->getAllClassesDetail($data['keyword']);
        $data['classNum'] = count($this->Workshops_model->getAllClassesDetail($data['keyword']));
        if ($data['classNum'] == 0) {
            $data['tidak_ketemu'] = "workshop yang anda cari tidak ada.";
        }
        $this->load->view('workshops/workshopfilter', $data);
        $this->load->view('partials/footer');
    }

    public function join_workshop($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $this->Workshops_model->joinClass($id_kelas);
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

        $classDetail = $this->Workshops_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_workshop'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }

        $kegiatan = $this->Workshops_model->updateKegiatan($id_kegiatan);

        if ($kegiatan == "success") {
            $this->session->set_flashdata("success", "Jadwal Kegiatan anda berhasil di update!");
        }
        redirect('workshops/open_workshop/' . $id_kelas);
    }


    public function open_workshop($id_kelas)
    {
        $data['seluruh_kelas'] = $this->Workshops_model->getAllTopClasses();
        $data['seluruh_harga'] = $this->Workshops_model->getAllHarga();
        $data['kegiatan'] = $this->Workshops_model->getKegiatan($id_kelas);
        $data['tanggal'] = $this->Workshops_model->getTanggalKegiatan($id_kelas);
        $data['kelas'] = $this->Workshops_model->getClassById($id_kelas);
        $data['pembuat'] = $this->Workshops_model->getPembuat();
        $data['peserta_kelas'] = $this->Workshops_model->getPesertaByClassId($id_kelas);
        $data['peserta_seluruh_kelas'] = $this->Workshops_model->getPeserta();
        $data['kategori'] = $this->Workshops_model->getKategori();
        $data['status'] = $this->Workshops_model->getStatus();
        $data['harga'] = $this->Workshops_model->getHarga($id_kelas);
        $data['peserta'] = $this->Workshops_model->getPesertaByUserIdClassId($id_kelas);
        $data['cek'] = $this->Workshops_model->cekPeserta($id_kelas);
        //$data['materi'] = $this->Workshops_model->getMateri($id_kelas);
        //$data['materiKegiatan'] = $this->Workshops_model->getMateribyKegiatan();
        if (isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('buttonJoin', 'Anda telah mengikuti kelas ini');
            $this->session->set_flashdata('batasPeserta', 'Maaf, kelas ini telah penuh');
            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
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
            $this->load->view('partialsuser/header', $header);
            $this->load->view('workshops/openworkshop', $data);
            $this->load->view('partialsuser/footer');
        } else {
            $this->load->view('partials/header');
            $this->load->view('workshops/openworkshop', $data);
            $this->load->view('partials/footer');
        }
    }

    public function pembayaran_workshop($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
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
            $this->load->view('partialsuser/header', $header);
            $this->load->view('workshops/pembayaran', $id_kelas);
            $this->load->view('partialsuser/footer');
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

        $classDetail = $this->Workshops_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_workshop'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }

        $data['kategori'] = $this->Workshops_model->getKategori();
        $data['jenis'] = $this->Workshops_model->getJenis();
        $data['kelas'] = $this->Workshops_model->getClassById($id_kelas);
        $data['pembuat'] = $this->Workshops_model->getMyName();
        $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
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
        $this->load->view('partialsuser/header', $header);
        $this->load->view('workshops/update_workshop', $data);
        $this->load->view('partialsuser/footer');
    }

    public function update_workshop_action($id_kelas)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Workshops_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_workshop'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }

        $updateClass = $this->Workshops_model->updateClass($id_kelas);
        if ($updateClass == "fail") {
            $this->session->set_flashdata("invalidImage", "Invalid Image Size (Max Size: 3 MB)");
            redirect("workshops/update_workshop/" . $id_kelas);
        }
        redirect('workshops/open_workshop/' . $id_kelas);
    }

    public function search_workshop_saya()
    {
        if (isset($_SESSION['logged_in'])) {
            $data['kategori_text2'] = "Pencarian";
            $data['keyword_kelas_saya2'] = $this->input->post('keyword');
            $data['keyword_kelas_diikuti2'] = null;
            $data['keyword_tugas2'] = null;
            $data['keyword_materi2'] = null;
            $data['kegiatan2'] = $this->Workshops_model->getAllKegiatan();
            $data['private_kelas2'] = $this->Workshops_model->getMyPrivateClassesDetail($data['keyword_kelas_saya2']);
            $data['kelas_saya2'] = $this->Workshops_model->getMyClassesDetail($data['keyword_kelas_saya2']);
            $data['seluruh_kelas2'] = $this->Workshops_model->getAllClasses();
            $data['private_kelas2'] = $this->Workshops_model->getMyPrivateClasses();
            $data['status2'] = $this->Workshops_model->getStatus();
            $data['kegiatan2'] = $this->Workshops_model->getAllKegiatan();
            $data['status2'] = $this->Workshops_model->getStatus();
            $data['peserta2'] = $this->Workshops_model->getPeserta();

            $data['kategori_text'] = "Pencarian";
            $data['keyword_kelas_saya'] = null;
            $data['keyword_kelas_diikuti'] = null;
            $data['keyword_tugas'] = null;
            $data['keyword_materi'] = null;
            $data['kegiatan'] = $this->Classes_model->getAllKegiatan();
            $data['private_kelas'] = $this->Classes_model->getMyPrivateClassesDetail($data['keyword_kelas_saya']);
            $data['kelas_saya'] = $this->Classes_model->getMyClassesDetail($data['keyword_kelas_saya']);
            $data['seluruh_kelas'] = $this->Classes_model->getAllClasses();
            $data['private_kelas'] = $this->Classes_model->getMyPrivateClasses();
            $data['status'] = $this->Classes_model->getStatus();
            $data['kegiatan'] = $this->Classes_model->getAllKegiatan();
            $data['status'] = $this->Classes_model->getStatus();
            $data['peserta'] = $this->Classes_model->getPeserta();
            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
            $notif = $this->Workshops_model->getPesertaByUserId();
            $datanotif = array();
            $datatugas = array();
            $datakelas = array();
            $datamateri = array();
            foreach ($notif as $value) {
                $cek = $this->Classes_model->getKelasKegiatan($value['id_workshop']);
                $tugas = $this->Classes_model->getTugasByClassId($value['id_workshop']);
                $kelas = $this->Classes_model->getClassById($value['id_workshop']);
                $materi = $this->Classes_model->getMateriByClassId($value['id_workshop']);
                if ($cek != null) {
                    $datanotif[] = $cek;
                }
                if ($tugas != null) {
                    $datatugas[] = $tugas;
                }
                if ($kelas != null) {
                    $datakelas[] = $kelas;
                }
                if ($materi != null) {
                    $datamateri[] = $materi;
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

            $data['cek'] = $cek2;
            $data['submit'] = $this->Classes_model->getSubmit();
            $this->session->set_flashdata("tabWorkshopSaya", "6");
            $this->load->view('partialsuser/header', $header);
            $this->load->view('classes/search_akademik', $data);
            $this->load->view('partials/footer');
        } else {
            redirect('home');
        }
    }


    public function search_workshop_diikuti()
    {
        if (isset($_SESSION['logged_in'])) {
            $data['kategori_text2'] = "Pencarian";
            $data['keyword_kelas_diikuti2'] = $this->input->post('keyword');
            $data['keyword_kelas_saya2'] = null;
            $data['keyword_tugas2'] = null;
            $data['keyword_materi2'] = null;
            $data['seluruh_kelas2'] = $this->Workshops_model->getAllClassesDetail($data['keyword_kelas_diikuti2']);
            $data['kelas_saya2'] = $this->Workshops_model->getMyClasses();
            $data['private_kelas2'] = $this->Workshops_model->getMyPrivateClasses();
            $data['status2'] = $this->Workshops_model->getStatus();
            $data['kegiatan2'] = $this->Workshops_model->getAllKegiatan();
            $data['peserta2'] = $this->Workshops_model->getPeserta();

            $data['kategori_text'] = "Pencarian";
            $data['keyword_kelas_diikuti'] = null;
            $data['keyword_kelas_saya'] = null;
            $data['keyword_tugas'] = null;
            $data['keyword_materi'] = null;
            $data['seluruh_kelas'] = $this->Classes_model->getAllClasses();
            $data['kelas_saya'] = $this->Classes_model->getMyClasses();
            $data['private_kelas'] = $this->Classes_model->getMyPrivateClasses();
            $data['kegiatan'] = $this->Classes_model->getAllKegiatan();
            $data['peserta'] = $this->Classes_model->getPeserta();
            $data['status'] = $this->Classes_model->getStatus();

            $header['nama'] = explode(" ", $this->Workshops_model->getMyName()['nama']);
            $notif = $this->Classes_model->getPesertaByUserId();
            $datanotif = array();
            $datatugas = array();
            $datakelas = array();
            $datamateri = array();
            foreach ($notif as $value) {
                $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                $tugas = $this->Classes_model->getTugasByClassId($value['id_kelas']);
                $kelas = $this->Classes_model->getClassById($value['id_kelas']);
                $materi = $this->Classes_model->getMateriByClassId($value['id_kelas']);
                if ($cek != null) {
                    $datanotif[] = $cek;
                }
                if ($tugas != null) {
                    $datatugas[] = $tugas;
                }
                if ($kelas != null) {
                    $datakelas[] = $kelas;
                }
                if ($materi != null) {
                    $datamateri[] = $materi;
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

            $data['tugas'] = $datatugas;
            $data['kelas_tugas'] = $datakelas;
            $data['materi'] = $datamateri;
            $datacek = array();
            foreach ($data['tugas'] as $value) {
                foreach ($value as $value2) {
                    $cek = $this->Classes_model->cekTugas($value2['id_tugas']);
                    if ($cek == null) {
                        $datacek[] = true;
                    } else {
                        $datacek[] = false;
                    }
                }
            }
            $data['cek'] = $datacek;
            $data['submit'] = $this->Classes_model->getSubmit();
            $this->session->set_flashdata("tabWorkshopDiikuti", "7");
            $this->load->view('partialsuser/header', $header);
            $this->load->view('classes/search_akademik', $data);
            $this->load->view('partials/footer');
        } else {
            redirect('home');
        }
    }
}
