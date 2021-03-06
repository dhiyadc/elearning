<?php

class Classes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Classes_model');
        $this->load->model('Workshops_model');
        $this->load->helper('url');
        $this->load->helper('download');
    }

    public function new_class()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['kategori'] = $this->Classes_model->getKategori();
            $data['jenis'] = $this->Classes_model->getJenis();
            $data['pembuat'] = $this->Classes_model->getMyName();
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
            $this->load->view('classes/new_class', $data);
            $this->load->view('partials/user/footer');
        } else {
            redirect('home');
        }
    }

    public function new_class_action()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $newClass = $this->Classes_model->createClass();

            if ($newClass) {
                $this->session->set_flashdata("invalidImage", "$newClass");
                redirect("classes/new_class");
            }

            $id = $this->Classes_model->getIdNewClass();
            redirect('classes/open_class/' . $id['id_kelas']);
        } else {
            redirect('home');
        }
    }

    public function open_class($id_kelas)
    {
        $data['seluruh_kelas'] = $this->Classes_model->getAllTopClasses();
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
        $data['materi'] = $this->Classes_model->getMateri($id_kelas);
        $data['materiKegiatan'] = $this->Classes_model->getMateribyKegiatan();
        $data['error_bagian'] = "kelas";
        if (isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('buttonJoin', 'Anda telah mengikuti kelas ini');
            $this->session->set_flashdata('batasPeserta', 'Maaf, kelas ini telah penuh');
            $this->session->set_flashdata('kelasSelesai', 'Kelas ini telah selesai');
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

            if (count($data['kelas']) == 0 || count($data['kelas']) == null)
                $this->load->view('classes/error_class', $data);
            else
                $this->load->view('classes/open_class', $data);
            $this->load->view('partials/user/footer');
            $this->session->set_userdata('workshop', null);
        } else {
            $this->load->view('partials/common/header');
            if (count($data['kelas']) == 0 || count($data['kelas']) == null)
                $this->load->view('classes/error_class', $data);
            else
                $this->load->view('classes/open_class', $data);
            $this->load->view('partials/common/footer');
            $this->session->set_userdata('workshop', null);
        }
    }

    public function video_class($id_kelas, $id_kegiatan, $id_materi, $index)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['seluruh_kelas'] = $this->Classes_model->getAllTopClasses();
            $data['seluruh_harga'] = $this->Classes_model->getAllHarga();
            $data['kegiatan'] = $this->Classes_model->getKegiatanByIdKegiatan($id_kegiatan);
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
            $data['materi'] = $this->Classes_model->getMateriByKegiatan($id_kelas);
            $data['materiKegiatan'] = $this->Classes_model->getMateribyIdMateri($id_materi);
            $data['materiLain'] = $this->Classes_model->getMateriLain($id_kegiatan, $id_materi);
            $data['indexvideo'] = $index;
            $data['error_bagian'] = "materi";
            if (isset($this->session->userdata['logged_in'])) {
                $this->session->set_flashdata('buttonJoin', 'Anda telah mengikuti kelas ini');
                $this->session->set_flashdata('batasPeserta', 'Maaf, kelas ini telah penuh');
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
                if (count($data['materiKegiatan']) == 0 || count($data['materiKegiatan']) == null)
                    $this->load->view('classes/error_class', $data);
                else
                    $this->load->view('classes/video_kelas', $data);
                $this->load->view('partials/user/footer');
                $this->session->set_userdata('workshop', null);
            } else {
                $this->load->view('partials/common/header');
                if (count($data['materiKegiatan']) == 0 || count($data['materiKegiatan']) == null)
                    $this->load->view('classes/error_class', $data);
                else
                    $this->load->view('classes/video_kelas', $data);
                $this->load->view('partials/common/footer');
                $this->session->set_userdata('workshop', null);
            }
        } else
            redirect('Home');
    }

    /**
     * Controller for handling user session and role 
     * before starting or joining the class.
     * 
     * @param String $classId id of the class
     * @param String $activityId id of the activity you want to start
     */
    public function validateUserClass($classId, $activityId)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            $this->session->set_flashdata('message', "Please log in first!");
            if ($this->session->userdata('workshop') != null)
                redirect('workshops/open_workshop/' . $classId);
            else
                redirect("class/$classId");
        }

        if ($this->session->userdata('workshop') != null) {

            $classDetail = $this->Workshops_model->getClassById($classId)[0];
            $isClassOwner = $classDetail['pembuat_workshop'] == $userId;
            $isClassMember = $this->Workshops_model->getPesertaByUserIdClassId($classId);
        } else {
            $classDetail = $this->Classes_model->getClassById($classId)[0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            $isClassMember = $this->Classes_model->getPesertaByUserIdClassId($classId);
        }

        if (!$isClassOwner && !$isClassMember) {
            $this->session->set_flashdata('message', "You're not a member of this class!");
            if ($this->session->userdata('workshop') != null)
                redirect('workshops/open_workshop/' . $classId);
            else
                redirect("class/$classId");
        }
        if ($this->session->userdata('workshop') != null)
            $classActivity = $this->Workshops_model->getKegiatanByIdKegiatan($activityId)[0];
        else
            $classActivity = $this->Classes_model->getKegiatanByIdKegiatan($activityId)[0];
        if ($isClassOwner) {
            $this->startClassActivity($classDetail, $classActivity);
        } else {
            $this->joinClassActivity($classDetail, $classActivity);
        }
    }

    public function startClassActivity($classDetail, $classActivity)
    {
        if ($this->session->userdata('workshop') != null)
            $classId = $classDetail['id_workshop'];
        else
            $classId = $classDetail['id_kelas'];

        $activityId = $classActivity['id_kegiatan'];

        if (!$this->Classes_model->updateKegiatanStatus($activityId, CLASS_STARTED) || !$this->Workshops_model->updateKegiatanStatus($activityId, CLASS_STARTED)) {
            $this->session->set_flashdata('message', 'Failed to start the class!');
            if ($this->session->userdata('workshop') != null)
                redirect('workshops/open_workshop/' . $classId);
            else
                redirect("class/$classId");
        }
        if ($this->session->userdata('workshop') != null) {
            $classId = $classDetail['id_workshop'];
            $classMember = $this->Workshops_model->getPesertaByClassId($classId);
            $classOwner = $this->Workshops_model->getUserDetail($classDetail['pembuat_workshop'])[0];
            $data = [
                'classId' => $classDetail['id_workshop'],
                'ownerId' => $classOwner['id_user'],
                'userId' => $classOwner['id_user'],
                'userName' => $classOwner['nama'],
                'userEmail' => $classOwner['email'],
                'classTitle' => $classDetail['judul_workshop'],
                'classStatus' => $classDetail['status_workshop'],
                'classMember' => array_map(function ($data) {
                    return $data['id_user'];
                }, $classMember),
                'classActivity' => [
                    'activityId' => $classActivity['id_kegiatan'],
                    'activityDescription' => $classActivity['deskripsi_kegiatan'],
                    'activityDate' => "$classActivity[tanggal]",
                    'activityTime' => "$classActivity[waktu]",
                    'activityStatus' => $classActivity['status_kegiatan']
                ]
            ];
        } else {
            $classId = $classDetail['id_kelas'];
            $classMember = $this->Classes_model->getPesertaByClassId($classId);
            $classOwner = $this->Classes_model->getUserDetail($classDetail['pembuat_kelas'])[0];
            $data = [
                'classId' => $classDetail['id_kelas'],
                'ownerId' => $classOwner['id_user'],
                'userId' => $classOwner['id_user'],
                'userName' => $classOwner['nama'],
                'userEmail' => $classOwner['email'],
                'classTitle' => $classDetail['judul_kelas'],
                'classStatus' => $classDetail['status_kelas'],
                'classMember' => array_map(function ($data) {
                    return $data['id_user'];
                }, $classMember),
                'classActivity' => [
                    'activityId' => $classActivity['id_kegiatan'],
                    'activityDescription' => $classActivity['deskripsi_kegiatan'],
                    'activityDate' => "$classActivity[tanggal]",
                    'activityTime' => "$classActivity[waktu]",
                    'activityStatus' => $classActivity['status_kegiatan']
                ]
            ];
        }

        $this->load->view('iframe/elearning', $data);
    }

    public function closeClassActivity($classId, $activityId)
    {
        if ($this->session->userdata('workshop') != null) {
            $userId = $this->session->userdata('id_user');
            $classDetail = $this->Workshops_model->getClassById($classId)[0];
            $isClassOwner = $classDetail['pembuat_workshop'] == $userId;
        } else {
            $userId = $this->session->userdata('id_user');
            $classDetail = $this->Classes_model->getClassById($classId)[0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        }
        if (!$isClassOwner) {
            $this->session->set_flashdata('message', "You're not the owner of this class!");
            redirect("class/$classId/$activityId");
        }

        if (!$this->Classes_model->updateKegiatanStatus($activityId, CLASS_FINISHED) || !$this->Workshops_model->updateKegiatanStatus($activityId, CLASS_FINISHED)) {
            $this->session->set_flashdata('message', 'Failed to end the class!');
            redirect("class/$classId/$activityId");
        }

        if ($this->session->userdata('workshop') != null)
            redirect('workshops/open_workshop/' . $classId);

        else
            redirect("class/$classId");
    }

    public function joinClassActivity($classDetail, $classActivity)
    {
        $userId = $this->session->userdata('id_user');
        if ($this->session->userdata('workshop') != null)
            $userDetail = $this->Workshops_model->getUserDetail($userId)[0];
        else
            $userDetail = $this->Classes_model->getUserDetail($userId)[0];
        if ($this->session->userdata('workshop') != null) {
            $data = [
                'classId' => $classDetail['id_workshop'],
                'classTitle' => $classDetail['judul_workshop'],
                'ownerId' => $classDetail['pembuat_workshop'],
                'userId' => $userDetail['id_user'],
                'userName' => $userDetail['nama'],
                'userEmail' => $userDetail['email'],
                'classActivity' => [
                    'activityId' => $classActivity['id_kegiatan'],
                    'activityDescription' => $classActivity['deskripsi_kegiatan'],
                    'activityDate' => "$classActivity[tanggal]",
                    'activityTime' => "$classActivity[waktu]",
                    'activityStatus' => $classActivity['status_kegiatan']
                ]
            ];
        } else {
            $data = [
                'classId' => $classDetail['id_kelas'],
                'classTitle' => $classDetail['judul_kelas'],
                'ownerId' => $classDetail['pembuat_kelas'],
                'userId' => $userDetail['id_user'],
                'userName' => $userDetail['nama'],
                'userEmail' => $userDetail['email'],
                'classActivity' => [
                    'activityId' => $classActivity['id_kegiatan'],
                    'activityDescription' => $classActivity['deskripsi_kegiatan'],
                    'activityDate' => "$classActivity[tanggal]",
                    'activityTime' => "$classActivity[waktu]",
                    'activityStatus' => $classActivity['status_kegiatan']
                ]
            ];
        }

        $this->load->view('iframe/elearning', $data);
    }

    public function update_class($id_kelas)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }

        $data['kategori'] = $this->Classes_model->getKategori();
        $data['jenis'] = $this->Classes_model->getJenis();
        $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
        $data['pembuat'] = $this->Classes_model->getMyName();
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
        $this->load->view('classes/update_class', $data);
        $this->load->view('partials/user/footer');
    }

    public function update_class_action($id_kelas)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }

        $updateClass = $this->Classes_model->updateClass($id_kelas);
        if ($updateClass) {
            $this->session->set_flashdata("invalidImage", "$updateClass");
            redirect("classes/update_class/" . $id_kelas);
        }
        redirect('classes/open_class/' . $id_kelas);
    }

    public function set_kegiatan($id_kelas, $redirect = null)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $kegiatan = $this->Classes_model->setKegiatanByClass($id_kelas);
            if ($kegiatan == "success") {
                $this->session->set_flashdata("success", "Jadwal Kegiatan anda berhasil di tambah!");
            } else if ($kegiatan) {
                $this->session->set_flashdata("invalidFile", "$kegiatan (only pdf, doc, ppt). Max Size : 25MB");
            }

            if ($redirect == "akademik") {
                redirect('classes/my_classes');
            }


            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function edit_kegiatan($id_kelas, $id_kegiatan, $redirect = null)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }

        $kegiatan = $this->Classes_model->updateKegiatan($id_kelas, $id_kegiatan);
        if ($kegiatan == "success") {
            $this->session->set_flashdata("success", "Jadwal Kegiatan anda berhasil di tambah!");
        } else if ($kegiatan) {
            $this->session->set_flashdata("invalidFile", "$kegiatan (only pdf, doc, ppt). Max Size : 25MB");
        }

        if ($redirect == "akademik") {
            redirect('classes/my_classes');
        }
        redirect('classes/open_class/' . $id_kelas);
    }

    public function join_class($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $this->Classes_model->joinClass($id_kelas);
            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function pembayaran_kelas($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
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
            $this->load->view('classes/pembayaran', $id_kelas);
            $this->load->view('partials/user/footer');
        } else {
            redirect('home');
        }
    }

    public function my_classes()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['seluruh_kelas'] = $this->Classes_model->getAllClasses();
            $data['seluruh_kelas2'] = $this->Workshops_model->getAllClasses();
            $data['kelas'] = $this->Classes_model->getMyClasses();
            $data['kelas2'] = $this->Workshops_model->getMyClasses();
            $data['kegiatan'] = $this->Classes_model->getAllKegiatan();
            $data['pembuat'] = $this->Classes_model->getPembuat();
            $data['kegiatan2'] = $this->Workshops_model->getAllKegiatan();
            $data['status'] = $this->Classes_model->getStatus();
            $data['status2'] = $this->Workshops_model->getStatus();
            $data['peserta'] = $this->Classes_model->getPeserta();
            $data['peserta2'] = $this->Workshops_model->getPeserta();
            $data['materi2'] = $this->Classes_model->getMateriAll();
            $header['nama'] = explode(" ", $this->Classes_model->getMyName()['nama']);
            $notif = $this->Classes_model->getPesertaByUserId();
            $notif2 = $this->Workshops_model->getPesertaByUserId();
            $datanotif = array();
            $datanotif2 = array();
            $datatugas = array();
            $datakelas = array();
            $datamateri = array();
            $datakegiatansaya = array();
            $datakegiatandiikuti = array();
            foreach ($notif as $value) {
                $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                $tugas = $this->Classes_model->getTugasByClassId($value['id_kelas']);
                $kelas = $this->Classes_model->getClassById($value['id_kelas']);
                $materi = $this->Classes_model->getMateriByClassId($value['id_kelas']);
                $kegiatandiikuti = $this->Classes_model->getKegiatan($value['id_kelas']);

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
                if ($kegiatandiikuti != null) {
                    $datakegiatandiikuti[] = $kegiatandiikuti;
                }
            }
            $data['kegiatan_diikuti'] = $datakegiatandiikuti;
            $header['notif'] = $datanotif;

            foreach ($data['kelas'] as $value) {
                $kegiatansaya = $this->Classes_model->getKegiatan($value['id_kelas']);

                if ($kegiatansaya != null) {
                    $datakegiatansaya[] = $kegiatansaya;
                }
            }
            $data['kegiatan_saya'] = $datakegiatansaya;

            foreach ($notif2 as $value) {
                $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                if ($cek2 != null) {
                    $datanotif2[] = $cek2;
                }
            }
            $header['notif2'] = $datanotif2;

            $data['notif'] = $datanotif;

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
            $this->load->view('partials/user/header', $header);
            $this->load->view('classes/my_classes', $data);
            $this->load->view('partials/user/footer');
        } else {
            redirect('home');
        }
    }

    public function leave_class($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $this->Classes_model->leaveClass($id_kelas);
            redirect('classes/my_classes');
        } else {
            redirect('home');
        }
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


        $data['categories'] = $this->Classes_model->getKategori();
        $data['class'] = $this->Classes_model->getAllRandomClasses();
        $data['classNum'] = count($this->Classes_model->getAllClassesDetail());
        $this->session->set_userdata('workshop', null);
        $this->load->view('classes/kelasview', $data);
        $this->load->view('partials/common/footer');
    }

    public function set_sess()
    {
        $this->session->set_userdata('workshop', null);
    }
    public function categories($kategori)
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
        $data['kategori_text'] = $kategori;
        $data['categories'] = $this->Classes_model->getKategori();
        $data['class'] = $this->Classes_model->getClassesbyCategories($kategori);
        $data['classNum'] = count($this->Classes_model->getClassesbyCategories($kategori));
        $this->load->view('classes/kelasfilter', $data);
        $this->load->view('partials/common/footer');
    }

    public function sort($sorting)
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
        $data['kategori_text'] = $sorting;
        $data['categories'] = $this->Classes_model->getKategori();
        $data['class'] = $this->Classes_model->getClassesbySorting($sorting);
        $data['classNum'] = count($this->Classes_model->getClassesbySorting($sorting));
        $this->load->view('classes/kelasfilter', $data);
        $this->load->view('partials/common/footer');
    }

    public function search()
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

        $data['kategori_text'] = "Pencarian";
        $data['keyword'] = $this->input->post('keyword');
        $data['categories'] = $this->Classes_model->getKategori();
        $data['class'] = $this->Classes_model->getAllClassesDetail($data['keyword']);
        $data['classNum'] = count($this->Classes_model->getAllClassesDetail($data['keyword']));
        if ($data['classNum'] == 0) {
            $data['tidak_ketemu'] = "Kelas yang anda cari tidak ada.";
        }
        $this->load->view('classes/kelasfilter', $data);
        $this->load->view('partials/common/footer');
    }

    public function iframe()
    {
        $this->load->view('iframe/elearning');
    }


    public function download_materi($url_materi)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }
        force_download('./assets/docs/' . $url_materi, NULL);
    }

    public function hapus_materi($id_kelas, $url_materi, $redirect = null)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }

        $this->Classes_model->delMateri($url_materi);

        if ($redirect == "akademik") {
            redirect("classes/my_classes");
        }

        redirect('classes/open_class/' . $id_kelas);
    }

    public function list_assignment($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tugas'] = $this->Classes_model->getTugasByClassId($id_kelas);
            $datacek = array();
            foreach ($data['tugas'] as $value) {
                $cek = $this->Classes_model->cekTugas($value['id_tugas']);
                if ($cek == null) {
                    $datacek[] = null;
                } else {
                    $datacek[] = $cek;
                }
            }
            $data['cek'] = $datacek;
            $data['submit'] = $this->Classes_model->getSubmit();
            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
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

            // $this->load->view('partialsuser/header',$header);
            $this->load->view('classes/list_assignment', $data);
            // $this->load->view('partialsuser/footer');
        } else {
            redirect('home');
        }
    }

    public function new_assignment($id_kelas)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }

        $data['kategori'] = $this->Classes_model->getKategoriTugas();
        $data['id'] = $id_kelas;
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
        $this->load->view('classes/new_assignment', $data);
        $this->load->view('partials/user/footer');
    }

    public function new_assignment_action($id_kelas)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }

        $status = $this->Classes_model->createAssignment($id_kelas);
        if ($status) {
            $this->session->set_flashdata("failedInputFile", "$status (Maz Size: 25 MB) (.pdf, .doc, .docx only)");
            redirect('classes/new_assignment/' . $id_kelas);
        }
        redirect('classes/list_tugas/' . $id_kelas);
    }

    public function collect_assignment($id_kelas, $id_tugas, $redirect = null)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }
        $deadline = $this->Classes_model->getDeadlineTugas($id_tugas);
        $status = $this->Classes_model->collectAssignment($id_tugas, $deadline["batas_pengiriman_tugas"]);
        if ($status) {
            $this->session->set_flashdata("failedInputFile", "$status (Maz Size: 25 MB) (.pdf, .doc, .docx only)");
            redirect('classes/detail_tugaskuis/' . $id_kelas . '/' . $id_tugas);
        }

        if ($redirect == "akademik") {
            redirect('classes/my_classes');
        }
        redirect('classes/detail_tugaskuis/' . $id_kelas . '/' . $id_tugas);
    }

    public function download_assignment($url_assignment)
    {
        if (isset($_SESSION['logged_in'])) {
            force_download('./assets/docs/' . $url_assignment, NULL);
        } else {
            redirect('home');
        }
    }

    public function hapus_jawaban($id_kelas, $id_tugas, $id_submit, $redirect = null)
    {
        $this->Classes_model->deleteJawaban($id_submit);

        if ($redirect == "akademik") {
            redirect('classes/my_classes');
        }
        redirect('classes/detail_tugaskuis/' . $id_kelas . '/' . $id_tugas);
    }

    public function edit_assignment($id_kelas, $id_tugas)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }

        $data['kategori'] = $this->Classes_model->getKategoriTugas();
        $data['tugas'] = $this->Classes_model->getTugasByTugasId($id_tugas);
        $data['id'] = $id_kelas;
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
        $this->load->view('classes/edit_assignment', $data);
        $this->load->view('partials/user/footer');
    }

    public function edit_assignment_action($id_kelas, $id_tugas)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }


        $status = $this->Classes_model->updateAssignment($id_tugas);
        if ($status) {
            $this->session->set_flashdata("failedInputFile", "$status (Maz Size: 25 MB) (.pdf, .doc, .docx only)");
            redirect('classes/edit_assignment/' . $id_kelas . '/' . $id_tugas);
        }
        redirect('classes/list_tugas/' . $id_kelas);
    }

    public function del_assignment($id_kelas, $id_tugas)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }
        $this->Classes_model->deleteAssignment($id_tugas);
        redirect('classes/list_tugas/' . $id_kelas);
    }

    public function update_nilai($id_kelas, $id_tugas, $id_submit)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $this->Classes_model->updateNilai($id_submit);
            $this->session->set_flashdata("successUpdateNilai", "$id_submit");
            redirect('classes/detail_tugaskuisguru/' . $id_kelas . '/' . $id_tugas);
        } else {
            redirect('home');
        }
    }

    public function list_tugas($id_kelas)
    {

        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if ($isClassOwner) {
            $data['tugas'] = $this->Classes_model->getTugasByClassId($id_kelas);
            $datacek = array();
            foreach ($data['tugas'] as $value) {
                $cek = $this->Classes_model->cekTugas($value['id_tugas']);
                if ($cek == null) {
                    $datacek[] = null;
                } else {
                    $datacek[] = $cek;
                }
            }
            $data['cek'] = $datacek;
            $data['submit'] = $this->Classes_model->getSubmit();
            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            $data['peserta'] = $this->Classes_model->getPesertaByClassId($id_kelas);
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
            $this->load->view('classes/list_tugas', $data);
            $this->load->view('partials/user/footer');
        } else {
            $classDetail2 = $this->Classes_model->getPesertabyClass($id_kelas)[0];
            $isPeserta = $classDetail2['id_user'] == $userId;

            if (!$isPeserta) {
                redirect("home");
            }

            $data['tugas'] = $this->Classes_model->getTugasByClassId($id_kelas);
            $datacek = array();
            foreach ($data['tugas'] as $value) {
                $cek = $this->Classes_model->cekTugas($value['id_tugas']);
                if ($cek == null) {
                    $datacek[] = null;
                } else {
                    $datacek[] = $cek;
                }
            }
            $data['cek'] = $datacek;
            $data['submit'] = $this->Classes_model->getSubmit();
            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            $data['peserta'] = $this->Classes_model->getPesertaByClassId($id_kelas);
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
            $this->load->view('classes/list_tugas', $data);
            $this->load->view('partials/user/footer');
        }
    }

    public function detail_tugaskuis($id_kelas, $id_tugas)
    {

        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if ($isClassOwner) {

            $data['tugas'] = $this->Classes_model->getTugasByTugasId($id_tugas);
            $data['cek'] = $this->Classes_model->cekTugas($data['tugas'][0]['id_tugas']);
            $data['submit'] = $this->Classes_model->getSubmit();
            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            $data['user'] = $this->Classes_model->getUserDetail($data['kelas'][0]['pembuat_kelas']);
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
            $this->load->view('classes/detail_tugaskuis', $data);
            $this->load->view('partials/user/footer');
        } else {
            $classDetail2 = $this->Classes_model->getPesertabyClass($id_kelas)[0];
            $isPeserta = $classDetail2['id_user'] == $userId;

            if (!$isPeserta) {
                redirect("home");
            }
            $data['tugas'] = $this->Classes_model->getTugasByTugasId($id_tugas);
            $data['cek'] = $this->Classes_model->cekTugas($data['tugas'][0]['id_tugas']);
            $data['submit'] = $this->Classes_model->getSubmit();
            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            $data['user'] = $this->Classes_model->getUserDetail($data['kelas'][0]['pembuat_kelas']);
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
            $this->load->view('classes/detail_tugaskuis', $data);
            $this->load->view('partials/user/footer');
        }
    }

    public function detail_tugaskuisguru($id_kelas, $id_tugas)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas)[0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }

        $data['tugas'] = $this->Classes_model->getTugasByTugasId($id_tugas);
        $data['cek'] = $this->Classes_model->cekTugas($data['tugas'][0]['id_tugas']);
        $data['submit'] = $this->Classes_model->getSubmit();
        $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
        $data['user'] = $this->Classes_model->getUserDetail($data['kelas'][0]['pembuat_kelas']);
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
        $this->load->view('classes/detail_tugaskuisguru', $data);
        $this->load->view('partials/user/footer');
    }

    public function open_modal_class($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata("openModal", "#tambahKegiatan");
            $this->session->set_flashdata("jadwalKegiatan", "#tambahKegiatan");
            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function lihat_kegiatan($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata("jadwalKegiatan", "#tambahKegiatan");
            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('home');
        }
    }
}
