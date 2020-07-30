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
        $null = false;

        if (isset($_SESSION['logged_in'])) {

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
                            if ($cek2['status'] == 200 || $cek2['status'] == 202)
                                $cek2 = $cek2['data'];
                            else
                                $this->session->set_flashdata("errorAPI", $cek2['message']);

                            if ($cek2 != null) {
                                $datanotif2[] = $cek2;
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

        $data['class'] = $this->Classes_model->getAllTopClasses();
        if ($data['class'] == null)
            $null = true;
        else {
            if ($data['class']['status'] == 200 || $data['class']['status'] == 202)
                $data['class'] = $data['class']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['class']['message']);
        }

        $data['class2'] = $this->Workshops_model->getAllTopClasses();
        if ($data['class2'] == null)
            $null = true;
        else {
            if ($data['class2']['status'] == 200 || $data['class2']['status'] == 202)
                $data['class2'] = $data['class2']['data'];
            else {
                $this->session->set_flashdata("errorAPI", $data['class2']['message']);
                $data['class2'] = null;
            }
        }

        $data['kategori'] = $this->Classes_model->getKategori();
        if ($data['kategori'] == null)
            $null = true;
        else {
            if ($data['kategori']['status'] == 200 || $data['kategori']['status'] == 202)
                $data['kategori'] = $data['kategori']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kategori']['message']);
        }

        $data['kategori2'] = $this->Workshops_model->getKategori();
        if ($data['kategori2'] == null)
            $null = true;
        else {
            if ($data['kategori2']['status'] == 200 || $data['kategori2']['status'] == 202)
                $data['kategori2'] = $data['kategori2']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kategori2']['message']);
        }




        if ($null)
            $this->load->view('server_error');
        else {
            if (!isset($_SESSION['logged_in']))
                $this->load->view('partials/common/header');

            $this->load->view('home', $data);
            $this->load->view('partials/common/footer');
        }
    }
}
