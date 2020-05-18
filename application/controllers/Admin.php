<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_database');
	}

    public function index()
    {
        if(isset($_SESSION['admin_logged_in'])){

            $data['kelas'] = $this->Admin_database->getAllClasses();
            $data['pembuat'] = $this->Admin_database->getPembuat();
            $data['peserta'] = $this->Admin_database->getPeserta();
            $this->load->view('nonuser/admin/home_admin',$data);
        }
        else {
            redirect('nonuser');
        }
    }

    public function list_kelas()
    {
        if(isset($_SESSION['admin_logged_in'])){
            $data['kelas'] = $this->Admin_database->getAllClasses();
            $data['pembuat'] = $this->Admin_database->getPembuat();
            $data['peserta'] = $this->Admin_database->getPeserta();
            $this->load->view('nonuser/admin/list_kelas',$data);
        }
        else {
            redirect('nonuser');
        }
    }

    public function detail_kelas($id_kelas)
    {
        if(isset($_SESSION['admin_logged_in'])){
            $data['kelas'] = $this->Admin_database->getClassById($id_kelas);
            $data['kegiatan'] = $this->Admin_database->getKegiatan($id_kelas);
            $data['pembuat'] = $this->Admin_database->getPembuat();
            $data['kategori'] = $this->Admin_database->getKategori();
            $data['status'] = $this->Admin_database->getStatus();
            $data['harga'] = $this->Admin_database->getHarga($id_kelas);
            $data['peserta'] = $this->Admin_database->getPesertaByUserIdClassId($id_kelas);
            $this->load->view('nonuser/admin/detail_kelas',$data);
        }
        else {
            redirect('nonuser');
        }
    }

    public function edit_kelas($id_kelas)
    {
        if(isset($_SESSION['admin_logged_in'])){
            $data['kelas'] = $this->Admin_database->getClassById($id_kelas);
            $data['kegiatan'] = $this->Admin_database->getKegiatan($id_kelas);
            $data['kategori'] = $this->Admin_database->getKategori();
            $data['status'] = $this->Admin_database->getStatus();
            $this->load->view('nonuser/admin/edit_kelas',$data);
        }
        else {
            redirect('nonuser');
        }
    }

    public function edit_kelas_action($id_kelas)
    {
        if(isset($_SESSION['admin_logged_in'])){
            $this->Admin_database->updateKelas($id_kelas);
            $this->Admin_database->updateKegiatan($id_kelas);
            redirect('admin/detail_kelas/' . $id_kelas);
        }
        else {
            redirect('nonuser');
        }
    }

    public function hapus_kelas($id_kelas)
    {
        if(isset($_SESSION['admin_logged_in'])){
            $this->Admin_database->hapusKelas($id_kelas);
            redirect('admin/list_kelas');
        }
        else {
            redirect('nonuser');
        }
    }

    public function list_user()
    {
        if(isset($_SESSION['admin_logged_in'])){
            $data['user'] = $this->Admin_database->getAllUser();
            $data['kelas'] = $this->Admin_database->getAllClasses();
            $data['peserta'] = $this->Admin_database->getPeserta();
            $this->load->view('nonuser/admin/list_user',$data);
        }
        else {
            redirect('nonuser');
        }
    }
    
}

?>

