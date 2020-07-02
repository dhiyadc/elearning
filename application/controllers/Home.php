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
        } else {
            $this->load->view('partials/common/header');
        }
        $data['class'] = $this->Classes_model->getAllTopClasses();
        $data['class2'] = $this->Workshops_model->getAllTopClasses();
        $data['kategori'] = $this->Classes_model->getKategori();
        $data['kategori2'] = $this->Workshops_model->getKategori();
        $this->load->view('home', $data);
        $this->load->view('partials/common/footer');
    }
}
