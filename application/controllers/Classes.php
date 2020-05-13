<?php

class Classes extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Classes_model');
    }

    public function new_class()
    {
        if(isset($this->session->userdata['logged_in'])){
            $data['kategori'] = $this->Classes_model->getKategori();
            $data['jenis'] = $this->Classes_model->getJenis();
            $this->load->view('classes/new_class',$data);
        } else {
            redirect('login');
        }
    }

    public function new_class_action()
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Classes_model->createClass();
            $id = $this->Classes_model->getIdNewClass();
            redirect('classes/open_class/' . $id);
        } else {
            redirect('login');
        }
    }

    public function index()
    {
        if(isset($this->session->userdata['logged_in'])){
            $data['kelas'] = $this->Classes_model->getMyClasses();
            $this->load->view('classes/my_classes',$data);
        } else {
            redirect('login');
        }
    }

    public function open_class($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $data['kegiatan'] = $this->Classes_model->getKegiatan($id_kelas);
            $data['tanggal'] = $this->Classes_model->getTanggalKegiatan($id_kelas);
            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            $data['pembuat'] = $this->Classes_model->getPembuat();
            $data['kategori'] = $this->Classes_model->getKategori();
            $data['status'] = $this->Classes_model->getStatus();
            $data['harga'] = $this->Classes_model->getHarga($id_kelas);
            $data['peserta'] = $this->Classes_model->getPesertaByUserIdClassId($id_kelas);
            $data['cek'] = $this->Classes_model->cekPeserta($id_kelas);
            $this->load->view('classes/open_class',$data);
        } else {
            redirect('login');
        }
    }

    public function update_class($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $data['kategori'] = $this->Classes_model->getKategori();
            $data['jenis'] = $this->Classes_model->getJenis();
            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            $this->load->view('classes/update_class',$data);
        } else {
            redirect('login');
        }
    }

    public function update_class_action($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Classes_model->updateClass($id_kelas);
            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('login');
        }
    }

    public function set_kegiatan($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Classes_model->setKegiatanByClass($id_kelas);
            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('login');
        }
    }

    public function edit_kegiatan($id_kelas,$id_kegiatan)
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Classes_model->updateKegiatan($id_kegiatan);
            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('login');
        }
    }

    public function join_class($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Classes_model->joinClass($id_kelas);
            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('login');
        }
    }

    public function pembayaran_kelas($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->load->view('classes/pembayaran',$id_kelas);
        } else {
            redirect('login');
        }
    }

    public function kelas_diikuti()
    {
        if(isset($this->session->userdata['logged_in'])){
            $data['kelas'] = $this->Classes_model->getAllClasses();
            $data['peserta'] = $this->Classes_model->getPeserta();
            $this->load->view('classes/kelas_diikuti',$data);
        } else {
            redirect('login');
        }
    }

    public function leave_class($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Classes_model->leaveClass($id_kelas);
            redirect('classes/kelas_diikuti');
        } else {
            redirect('login');
        }
    }
}