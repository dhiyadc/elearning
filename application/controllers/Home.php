<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load database
        // $this->load->model('homepage_database');
        $this->load->helper('url');
        $this->load->model('Classes_model');
        $this->load->model('Workshops_model');
    }

    public function index()
    {
        if (isset($_SESSION['logged_in'])) {
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
                        $cek = $cek['data'];
                    } else
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
                        $datanotif2[] = $cek2;
                    }
                }
                $header['notif2'] = $datanotif2;
            } else
                $this->session->set_flashdata("errorAPI", $notif2['message']);

            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
        }
        $data['class'] = $this->Classes_model->getAllTopClasses();
        if ($data['class']['status'] == 200)
            $data['class'] = $data['class']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['class']['message']);

        $data['class2'] = $this->Workshops_model->getAllTopClasses();
        if ($data['class2']['status'] == 200)
            $data['class2'] = $data['class2']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['class2']['message']);

        $data['kategori'] = $this->Classes_model->getKategori();
        if ($data['kategori']['status'] == 200)
            $data['kategori'] = $data['kategori']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['kategori']['message']);

        $data['kategori2'] = $this->Workshops_model->getKategori();
        if ($data['kategori2']['status'] == 200)
            $data['kategori2'] = $data['kategori2']['data'];
        else
            $this->session->set_flashdata("errorAPI", $data['kategori2']['message']);

        $this->load->view('home', $data);
        $this->load->view('partials/common/footer');
    }
}
