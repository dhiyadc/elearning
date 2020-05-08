<?php

class Classes extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Classes_model');
    }

    public function new_class()
    {
        $data['kategori'] = $this->Classes_model->getKategori();
        $data['jenis'] = $this->Classes_model->getJenis();
        $this->load->view('classes/new_class',$data);
    }

    public function new_class_action()
    {
        $this->Classes_model->createClass();
        redirect('classes');
    }

    public function index()
    {
        $data['kelas'] = $this->Classes_model->getMyClasses();
        $this->load->view('classes/my_classes',$data);
    }

    public function open_class($id_kelas)
    {
        $data['kegiatan'] = $this->Classes_model->getKegiatan($id_kelas);
        $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
        $data['pembuat'] = $this->Classes_model->getPembuat();
        $data['kategori'] = $this->Classes_model->getKategori();
        $data['status'] = $this->Classes_model->getStatus();
        $this->load->view('classes/open_class',$data);
    }

    public function update_status($id_kelas)
    {
        $this->Classes_model->updateStatus($id_kelas);
        redirect('classes/open_class/' . $id_kelas);
    }

    public function update_class($id_kelas)
    {
        $data['kategori'] = $this->Classes_model->getKategori();
        $data['jenis'] = $this->Classes_model->getJenis();
        $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
        $this->load->view('classes/update_class',$data);
    }

    public function update_class_action($id_kelas)
    {
        $this->Classes_model->updateClass($id_kelas);
        redirect('classes/open_class/' . $id_kelas);
    }

    public function delete_class($id_kelas)
    {
        $this->Classes_model->deleteClass($id_kelas);
        redirect('classes');
    }

    public function set_kegiatan($id_kelas)
    {
        $this->Classes_model->setKegiatan($id_kelas);
        redirect('classes/open_class/' . $id_kelas);
    }

    public function hapus_kegiatan($id_kelas,$id_kegiatan)
    {
        $this->Classes_model->deleteKegiatan($id_kegiatan);
        redirect('classes/open_class/' . $id_kelas);
    }

    public function edit_kegiatan($id_kelas,$id_kegiatan)
    {
        $this->Classes_model->updateKegiatan($id_kegiatan);
        redirect('classes/open_class/' . $id_kelas);
    }
}