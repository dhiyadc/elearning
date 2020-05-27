<?php

class Classes extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Classes_model');
        $this->load->helper('url');
    }

    public function new_class()
    {
        if(isset($this->session->userdata['logged_in'])){
            $data['kategori'] = $this->Classes_model->getKategori();
            $data['jenis'] = $this->Classes_model->getJenis();
            $data['pembuat'] = $this->Classes_model->getMyName();
            $this->load->view('partialsuser/header');
            $this->load->view('classes/new_class',$data);
            $this->load->view('partialsuser/footer');
        } else {
            redirect('home');
        }
    }

    public function new_class_action()
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Classes_model->createClass();
            $id = $this->Classes_model->getIdNewClass();
            redirect('classes/open_class/' . $id['id_kelas']);
        } else {
            redirect('home');
        }
    }

    public function open_class($id_kelas)
    {
        $data['seluruh_kelas'] = $this->Classes_model->getAllClasses();
        $data['seluruh_harga'] = $this->Classes_model->getAllHarga();
        $data['kegiatan'] = $this->Classes_model->getKegiatan($id_kelas);
        $data['tanggal'] = $this->Classes_model->getTanggalKegiatan($id_kelas);
        $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
        $data['pembuat'] = $this->Classes_model->getPembuat();
        $data['peserta_kelas'] = $this->Classes_model->getPesertaByClassId($id_kelas);
        $data['peserta_seluruh_kelas'] = $this->Classes_model->getPeserta();
        $data['kategori'] = $this->Classes_model->getKategori();
        $data['status'] = $this->Classes_model->getStatus();
        $data['harga'] = $this->Classes_model->getHarga($id_kelas);
        $data['peserta'] = $this->Classes_model->getPesertaByUserIdClassId($id_kelas);
        $data['cek'] = $this->Classes_model->cekPeserta($id_kelas);
        if(isset($this->session->userdata['logged_in'])){
            $this->session->set_flashdata('buttonJoin','Anda telah mengikuti kelas ini');
            $this->load->view('partialsuser/header');
            $this->load->view('classes/open_class',$data);
            $this->load->view('partialsuser/footer');
        } else {
            $this->session->set_flashdata('buttonJoin','Anda telah mengikuti kelas ini');
            $this->load->view('partials/header');
            $this->load->view('classes/open_class',$data);
            $this->load->view('partials/footer');
        }
    }

    public function startClassActivity($classId, $activityId) {
        // Check if update class status to start has succeed
        if (!$this->Classes_model->updateKegiatanStatus($activityId, CLASS_STARTED)) {
            $this->session->set_flashdata('message', 'Failed to start the class!');
            redirect("classes/open_class/$classId");
        }

        $classDetail = $this->Classes_model->getClassById($classId)[0];
        $classActivity = $this->Classes_model->getKegiatanByIdKegiatan($activityId)[0];
        $classMember = $this->Classes_model->getPesertaByClassId($classId);
        $classOwner = $this->Classes_model->getUserDetail($classDetail['pembuat_kelas'])[0];
        $data = [
            'classId' => $classDetail['id_kelas'],
            'classOwner' => [
                'ownerId' => $classOwner['id_user'],
                'ownerUsername' => $classOwner['nama'],
                'ownerEmail' => $classOwner['email']
            ],
            'classTitle' => $classDetail['judul_kelas'],
            'classStatus' => $classDetail['status_kelas'],
            'classMember' => array_map(function($data) { return $data['id_user']; }, $classMember),
            'classActivity' => [
                'activityId' => $classActivity['id_kegiatan'],
                'activityDescription' => $classActivity['deskripsi_kegiatan'],
                'activityDate' => "$classActivity[tanggal]",
                'activityTime' => "$classActivity[waktu]",
                'activityStatus' => $classActivity['status_kegiatan']
            ]
        ];

        $this->load->view('iframe/elearning', $data);
    }

    public function update_class($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $data['kategori'] = $this->Classes_model->getKategori();
            $data['jenis'] = $this->Classes_model->getJenis();
            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            $data['pembuat'] = $this->Classes_model->getMyName();
            $this->load->view('partialsuser/header');
            $this->load->view('classes/update_class',$data);
            $this->load->view('partialsuser/footer');
        } else {
            redirect('home');
        }
    }

    public function update_class_action($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Classes_model->updateClass($id_kelas);
            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function set_kegiatan($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Classes_model->setKegiatanByClass($id_kelas);
            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function edit_kegiatan($id_kelas,$id_kegiatan)
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Classes_model->updateKegiatan($id_kegiatan);
            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function join_class($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Classes_model->joinClass($id_kelas);
            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function pembayaran_kelas($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->load->view('classes/pembayaran',$id_kelas);
        } else {
            redirect('home');
        }
    }

    public function my_classes()
    {
        if(isset($this->session->userdata['logged_in'])){
            $data['seluruh_kelas'] = $this->Classes_model->getAllClasses();
            $data['kelas'] = $this->Classes_model->getMyClasses();
            $data['kegiatan'] = $this->Classes_model->getAllKegiatan();
            $data['status'] = $this->Classes_model->getStatus();
            $data['peserta'] = $this->Classes_model->getPeserta();
            $this->load->view('partialsuser/header');
            $this->load->view('classes/my_classes',$data);
            $this->load->view('partialsuser/footer');
        } else {
            redirect('home');
        }
    }

    public function leave_class($id_kelas)
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->Classes_model->leaveClass($id_kelas);
            redirect('classes/kelas_diikuti');
        } else {
            redirect('home');
        }
    }

    public function index(){
        //Controller Home
        if(isset($_SESSION['logged_in'])){
            $this->load->view('partialsuser/header');
            
        } else {
            $this->load->view('partials/header');    
        }

        
        $data['categories'] = $this->Classes_model->getKategori();
        $data['class'] = $this->Classes_model->getAllRandomClasses();
        $data['classNum'] = count($this->Classes_model->getAllClassesDetail());
        $this->load->view('classes/kelasview', $data);
        $this->load->view('partials/footer');
    }

    public function categories($kategori){
        if(isset($_SESSION['logged_in'])){
            $this->load->view('partialsuser/header');
            
        } else {
            $this->load->view('partials/header');    
        }
        $data['kategori_text'] = $kategori;
        $data['categories'] = $this->Classes_model->getKategori();
        $data['class'] = $this->Classes_model->getClassesbyCategories($kategori);
        $data['classNum'] = count($this->Classes_model->getAllClassesDetail());
        $this->load->view('classes/kelasfilter', $data);
        $this->load->view('partials/footer');
    }

    public function sort($sorting){
        if(isset($_SESSION['logged_in'])){
            $this->load->view('partialsuser/header');
            
        } else {
            $this->load->view('partials/header');    
        }
        $data['kategori_text'] = $sorting;
        $data['categories'] = $this->Classes_model->getKategori();
        $data['class'] = $this->Classes_model->getClassesbySorting($sorting);
        $data['classNum'] = count($this->Classes_model->getAllClassesDetail());
        $this->load->view('classes/kelasfilter', $data);
        $this->load->view('partials/footer');
    }

    public function search(){
        if(isset($_SESSION['logged_in'])){
            $this->load->view('partialsuser/header');
            
        } else {
            $this->load->view('partials/header');    
        }
        $data['keyword'] = $this->input->post('keyword');
        $data['categories'] = $this->Classes_model->getKategori();
        $data['class'] = $this->Classes_model->getAllClassesDetail($data['keyword']);
        $data['classNum'] = count($this->Classes_model->getAllClassesDetail($data['keyword']));
        $this->load->view('classes/kelasfilter', $data);
        $this->load->view('partials/footer');
    }
}