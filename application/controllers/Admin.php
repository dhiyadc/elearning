<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_database');
        $this->load->model('Workshops_model');
    }

    public function index()
    {
        if (isset($_SESSION['admin_logged_in'])) {

            $data['kelas'] = $this->Admin_database->getAllClasses();
            if ($data['kelas']['status'] == 200)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['pembuat'] = $this->Admin_database->getPembuat();
            if ($data['pembuat']['status'] == 200)
                $data['pembuat'] = $data['pembuat']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);

            $data['peserta'] = $this->Admin_database->getPeserta();
            if ($data['peserta']['status'] == 200)
                $data['peserta'] = $data['peserta']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['peserta']['message']);

            $data['kelas2'] = $this->Workshops_model->getAllClasses();
            if ($data['kelas2']['status'] == 200)
                $data['kelas2'] = $data['kelas2']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas2']['message']);

            $data['pembuat2'] = $this->Workshops_model->getPembuat();
            if ($data['pembuat2']['status'] == 200)
                $data['pembuat2'] = $data['pembuat2']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['pembuat2']['message']);

            $data['peserta2'] = $this->Workshops_model->getPeserta();
            if ($data['peserta2']['status'] == 200)
                $data['peserta2'] = $data['peserta2']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['peserta2']['message']);

            $this->load->view('nonuser/admin/home_admin', $data);
        } else {
            redirect('nonuser');
        }
    }

    public function list_kelas()
    {
        if (isset($_SESSION['admin_logged_in'])) {
            $data['kelas'] = $this->Admin_database->getAllClasses();
            if ($data['kelas']['status'] == 200)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['pembuat'] = $this->Admin_database->getPembuat();
            if ($data['pembuat']['status'] == 200)
                $data['pembuat'] = $data['pembuat']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);

            $data['peserta'] = $this->Admin_database->getPeserta();
            if ($data['peserta']['status'] == 200)
                $data['peserta'] = $data['peserta']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['peserta']['message']);

            $this->load->view('nonuser/admin/list_kelas', $data);
        } else {
            redirect('nonuser');
        }
    }

    public function detail_kelas($id_kelas)
    {
        if (isset($_SESSION['admin_logged_in'])) {
            $data['kelas'] = $this->Admin_database->getClassById($id_kelas);
            if ($data['kelas']['status'] == 200)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['kegiatan'] = $this->Admin_database->getKegiatan($id_kelas);
            if ($data['kegiatan']['status'] == 200)
                $data['kegiatan'] = $data['kegiatan']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kegiatan']['message']);

            $data['pembuat'] = $this->Admin_database->getPembuat();
            if ($data['pembuat']['status'] == 200)
                $data['pembuat'] = $data['pembuat']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);

            $data['kategori'] = $this->Admin_database->getKategori();
            if ($data['kategori']['status'] == 200)
                $data['kategori'] = $data['kategori']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kategori']['message']);

            $data['status'] = $this->Admin_database->getStatus();
            if ($data['status']['status'] == 200)
                $data['status'] = $data['status']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['status']['message']);

            $data['harga'] = $this->Admin_database->getHarga($id_kelas);
            if ($data['harga']['status'] == 200)
                $data['harga'] = $data['harga']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['harga']['message']);

            $data['peserta'] = $this->Admin_database->getPesertaByUserIdClassId($id_kelas);
            if ($data['peserta']['status'] == 200)
                $data['peserta'] = $data['peserta']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['peserta']['message']);

            $this->load->view('nonuser/admin/detail_kelas', $data);
        } else {
            redirect('nonuser');
        }
    }

    public function edit_kelas($id_kelas)
    {
        if (isset($_SESSION['admin_logged_in'])) {
            $data['kelas'] = $this->Admin_database->getClassById($id_kelas);
            if ($data['kelas']['status'] == 200)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['kegiatan'] = $this->Admin_database->getKegiatan($id_kelas);
            if ($data['kegiatan']['status'] == 200)
                $data['kegiatan'] = $data['kegiatan']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kegiatan']['message']);

            $data['kategori'] = $this->Admin_database->getKategori();
            if ($data['kategori']['status'] == 200)
                $data['kategori'] = $data['kategori']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kategori']['message']);

            $data['status'] = $this->Admin_database->getStatus();
            if ($data['status']['status'] == 200)
                $data['status'] = $data['status']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['status']['message']);

            $this->load->view('nonuser/admin/edit_kelas', $data);
        } else {
            redirect('nonuser');
        }
    }

    public function edit_kelas_action($id_kelas)
    {
        if (isset($_SESSION['admin_logged_in'])) {
            $temp = $this->Admin_database->updateKelas($id_kelas);
            if ($temp['status'] != 200)
                $this->session->set_flashdata("errorAPI", $temp['message']);

            $temp2 = $this->Admin_database->updateKegiatan($id_kelas);
            if ($temp['status'] != 200)
                $this->session->set_flashdata("errorAPI", $temp['message']);

            redirect('admin/detail_kelas/' . $id_kelas);
        } else {
            redirect('nonuser');
        }
    }

    public function hapus_kelas($id_kelas)
    {
        if (isset($_SESSION['admin_logged_in'])) {
            $temp = $this->Admin_database->hapusKelas($id_kelas);
            if ($temp['status'] != 200)
                $this->session->set_flashdata("errorAPI", $temp['message']);

            redirect('admin/list_kelas');
        } else {
            redirect('nonuser');
        }
    }

    public function list_user()
    {
        if (isset($_SESSION['admin_logged_in'])) {
            $data['user'] = $this->Admin_database->getAllUser();
            if ($data['user']['status'] == 200)
                $data['user'] = $data['user']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['user']['message']);

            $data['kelas'] = $this->Admin_database->getAllClasses();
            if ($data['kelas']['status'] == 200)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['peserta'] = $this->Admin_database->getPeserta();
            if ($data['peserta']['status'] == 200)
                $data['peserta'] = $data['peserta']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['peserta']['message']);

            $this->load->view('nonuser/admin/list_user', $data);
        } else {
            redirect('nonuser');
        }
    }

    public function list_workshop()
    {
        if (isset($_SESSION['admin_logged_in'])) {
            $data['kelas'] = $this->Workshops_model->getAllClasses();
            if ($data['kelas']['status'] == 200)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['pembuat'] = $this->Workshops_model->getPembuat();
            if ($data['pembuat']['status'] == 200)
                $data['pembuat'] = $data['pembuat']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);

            $data['peserta'] = $this->Workshops_model->getPeserta();
            if ($data['peserta']['status'] == 200)
                $data['peserta'] = $data['peserta']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['peserta']['message']);

            $this->load->view('nonuser/admin/list_workshop', $data);
        } else {
            redirect('nonuser');
        }
    }

    public function detail_workshop($id_kelas)
    {
        if (isset($_SESSION['admin_logged_in'])) {
            $data['kelas'] = $this->Workshops_model->getClassById($id_kelas);
            if ($data['kelas']['status'] == 200)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['kegiatan'] = $this->Workshops_model->getKegiatan($id_kelas);
            if ($data['kegiatan']['status'] == 200)
                $data['kegiatan'] = $data['kegiatan']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kegiatan']['message']);

            $data['pembuat'] = $this->Workshops_model->getPembuat();
            if ($data['pembuat']['status'] == 200)
                $data['pembuat'] = $data['pembuat']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);

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

            $this->load->view('nonuser/admin/detail_workshop', $data);
        } else {
            redirect('nonuser');
        }
    }

    public function edit_workshop($id_kelas)
    {
        if (isset($_SESSION['admin_logged_in'])) {
            $data['kelas'] = $this->Workshops_model->getClassById($id_kelas);
            if ($data['kelas']['status'] == 200)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['kegiatan'] = $this->Workshops_model->getKegiatan($id_kelas);
            if ($data['kegiatan']['status'] == 200)
                $data['kegiatan'] = $data['kegiatan']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kegiatan']['message']);

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

            $this->load->view('nonuser/admin/edit_workshop', $data);
        } else {
            redirect('nonuser');
        }
    }

    public function edit_workshop_action($id_kelas)
    {
        if (isset($_SESSION['admin_logged_in'])) {
            $temp = $this->Workshops_model->updateClass($id_kelas);
            if ($temp['status'] != 200)
                $this->session->set_flashdata("errorAPI", $temp['message']);

            $temp2 = $this->Workshops_model->updateKegiatan($id_kelas);
            if ($temp2['status'] != 200)
                $this->session->set_flashdata("errorAPI", $temp2['message']);
                redirect('admin/detail_workshop/' . $id_kelas);
            } else {
                redirect('nonuser');
            }
        }
        
        public function hapus_workshop($id_kelas)
        {
            if (isset($_SESSION['admin_logged_in'])) {
                $temp = $this->Admin_database->hapusWorkshop($id_kelas);
                if ($temp['status'] != 200)
                    $this->session->set_flashdata("errorAPI", $temp['message']);
                redirect('admin/list_workshop');
        } else {
            redirect('nonuser');
        }
    }
}
