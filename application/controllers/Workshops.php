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

            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
        }


        $data['categories'] = $this->Workshops_model->getKategori();
        $data['class'] = $this->Workshops_model->getAllRandomClasses();
        $data['classNum'] = count($this->Workshops_model->getAllClassesDetail());
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
            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
        }
        $data['kategori_text'] = $kategorii;
        $data['categories'] = $this->Workshops_model->getKategori();
        $data['class'] = $this->Workshops_model->getClassesbyCategories($kategorii);
        $data['classNum'] = count($this->Workshops_model->getClassesbyCategories($kategorii));
        $this->load->view('workshops/workshopfilter', $data);
        $this->load->view('partials/common/footer');
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
            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
        }
        $data['kategori_text'] = $sorting;
        $data['categories'] = $this->Workshops_model->getKategori();
        $data['class'] = $this->Workshops_model->getClassesbySorting($sorting);
        $data['classNum'] = count($this->Workshops_model->getClassesbySorting($sorting));
        $this->load->view('workshops/workshopfilter', $data);
        $this->load->view('partials/common/footer');
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
            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
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
        $this->load->view('partials/common/footer');
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
            $this->Workshops_model->leaveClass($id_kelas);
            redirect('classes/my_classes');
        } else {
            redirect('home');
        }
    }

    public function isactive_workshop($id_workshop)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data = $this->Workshops_model->getClassById($id_workshop);
            foreach ($data as $val) {
                $is_active = $val['is_active'];
                $nama = $val['judul_workshop'];
            }

            if ($is_active == 1) {
                $this->Workshops_model->isactive_workshop($id_workshop, 0);
                $this->session->set_flashdata('active', 0);
            } else{
            $this->Workshops_model->isactive_workshop($id_workshop, 1);
            $this->session->set_flashdata('active', 1 );
            }
            $x['nama'] = $nama;
            redirect("classes/my_classes", $nama);
        } else
            redirect("home");
    }
}
