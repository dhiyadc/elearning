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
            $kat = $this->Classes_model->getKategori();
            if ($kat['status'] == 200) {
                $data['kategori'] = $kat['data'];
            } else {
                $this->session->set_flashdata("errorAPI", $kat['message']);
            }

            $jenis = $this->Classes_model->getJenis();
            if ($jenis['status'] == 200) {
                $data['jenis'] = $jenis['data'];
            } else {
                $this->session->set_flashdata("errorAPI", $jenis['message']);
            }

            $pembuat = $this->Classes_model->getMyName();
            if ($pembuat['status'] == 200) {
                $data['pembuat'] = $pembuat['data'];
            } else {
                $this->session->set_flashdata("errorAPI", $pembuat['message']);
            }

            $nama = $this->Classes_model->getMyName();
            if ($nama['status'] == 200) {
                $header['nama'] = explode(" ", $nama['data']['nama']);
            } else {
                $this->session->set_flashdata("errorAPI", $nama['message']);
            }

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200) {
                        if ($cek['data'] != null) {
                            $datanotif[] = $cek['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        if ($cek2['data'] != null) {
                            $datanotif2[] = $cek2['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

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
            if ($newClass['status'] == 200) {
                $newClass = $newClass['data'];
            } else {
                $this->session->set_flashdata("errorAPI", $newClass['message']);
            }

            if ($newClass) {
                $this->session->set_flashdata("invalidImage", "$newClass");
                redirect("classes/new_class");
            }

            $id = $this->Classes_model->getIdNewClass();
            if ($id['status'] == 200) {
                $id = $id['data'];
            } else
                $this->session->set_flashdata("errorAPI", $id['message']);

            redirect('classes/open_class/' . $id['id_kelas']);
        } else {
            redirect('home');
        }
    }

    public function open_class($id_kelas)
    {
        $data['seluruh_kelas'] = $this->Classes_model->getAllTopClasses();
        if ($data['seluruh_kelas']['status'] == 200) {
            $data['seluruh_kelas'] = $data['seluruh_kelas']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['seluruh_kelas']['message']);


        $data['seluruh_harga'] = $this->Classes_model->getAllHarga();
        if ($data['seluruh_harga']['status'] == 200) {
            $data['seluruh_harga'] = $data['seluruh_harga']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['seluruh_harga']['message']);

        $data['kegiatan'] = $this->Classes_model->getKegiatan($id_kelas);
        if ($data['kegiatan']['status'] == 200) {
            $data['kegiatan'] = $data['kegiatan']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['kegiatan']['message']);

        $data['tanggal'] = $this->Classes_model->getTanggalKegiatan($id_kelas);
        if ($data['tanggal']['status'] == 200) {
            $data['tanggal'] = $data['tanggal']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['tanggal']['message']);

        $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
        if ($data['kelas']['status'] == 200) {
            $data['kelas'] = $data['kelas']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

        $data['pembuat'] = $this->Classes_model->getPembuat();
        if ($data['pembuat']['status'] == 200) {
            $data['pembuat'] = $data['pembuat']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);

        $data['peserta_kelas'] = $this->Classes_model->getPesertaByClassId($id_kelas);
        if ($data['peserta_kelas']['status'] == 200) {
            $data['peserta_kelas'] = $data['peserta_kelas']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['peserta_kelas']['message']);

        $data['peserta_seluruh_kelas'] = $this->Classes_model->getPeserta();
        if ($data['peserta_seluruh_kelas']['status'] == 200) {
            $data['peserta_seluruh_kelas'] = $data['peserta_seluruh_kelas']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['peserta_seluruh_kelas']['message']);

        $data['kategori'] = $this->Classes_model->getKategori();
        if ($data['kategori']['status'] == 200) {
            $data['kategori'] = $data['kategori']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['kategori']['message']);

        $data['status'] = $this->Classes_model->getStatus();
        if ($data['status']['status'] == 200) {
            $data['status'] = $data['status']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['status']['message']);

        $data['harga'] = $this->Classes_model->getHarga($id_kelas);
        if ($data['harga']['status'] == 200) {
            $data['harga'] = $data['harga']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['harga']['message']);

        $data['peserta'] = $this->Classes_model->getPesertaByUserIdClassId($id_kelas);
        if ($data['peserta']['status'] == 200) {
            $data['peserta'] = $data['peserta']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['peserta']['message']);

        $data['cek'] = $this->Classes_model->cekPeserta($id_kelas);
        if ($data['cek']['status'] == 200) {
            $data['cek'] = $data['cek']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['cek']['message']);

        $data['materi'] = $this->Classes_model->getMateri($id_kelas);
        if ($data['materi']['status'] == 200) {
            $data['materi'] = $data['materi']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['materi']['message']);

        $data['materiKegiatan'] = $this->Classes_model->getMateribyKegiatan();
        if ($data['materiKegiatan']['status'] == 200) {
            $data['materiKegiatan'] = $data['materiKegiatan']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['materiKegiatan']['message']);

        if (isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('buttonJoin', 'Anda telah mengikuti kelas ini');
            $this->session->set_flashdata('batasPeserta', 'Maaf, kelas ini telah penuh');

            $header['nama'] = explode(" ", $this->Classes_model->getMyName()['nama']);
            if ($header['nama']['status'] == 200) {
                $header['nama'] = $header['nama']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200) {
                        if ($cek['data'] != null) {
                            $datanotif[] = $cek['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        if ($cek2['data'] != null) {
                            $datanotif2[] = $cek2['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

            $this->load->view('partials/user/header', $header);
            $this->load->view('classes/open_class', $data);
            $this->load->view('partials/user/footer');
            $this->session->set_userdata('workshop', null);
        } else {
            $this->load->view('partials/common/header');
            $this->load->view('classes/open_class', $data);
            $this->load->view('partials/common/footer');
            $this->session->set_userdata('workshop', null);
        }
    }

    public function video_class($id_kelas, $id_kegiatan, $id_materi, $index)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['seluruh_kelas'] = $this->Classes_model->getAllTopClasses();
            if ($data['seluruh_kelas']['status'] == 200) {
                $data['seluruh_kelas'] = $data['seluruh_kelas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['seluruh_kelas']['message']);

            $data['seluruh_harga'] = $this->Classes_model->getAllHarga();
            if ($data['seluruh_harga']['status'] == 200) {
                $data['seluruh_harga'] = $data['seluruh_harga']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['seluruh_harga']['message']);

            $data['kegiatan'] = $this->Classes_model->getKegiatanByIdKegiatan($id_kegiatan);
            if ($data['kegiatan']['status'] == 200) {
                $data['kegiatan'] = $data['kegiatan']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kegiatan']['message']);

            $data['tanggal'] = $this->Classes_model->getTanggalKegiatan($id_kelas);
            if ($data['tanggal']['status'] == 200) {
                $data['tanggal'] = $data['tanggal']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['tanggal']['message']);

            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            if ($data['kelas']['status'] == 200) {
                $data['kelas'] = $data['kelas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['pembuat'] = $this->Classes_model->getPembuat();
            if ($data['pembuat']['status'] == 200) {
                $data['pembuat'] = $data['pembuat']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);

            $data['peserta_kelas'] = $this->Classes_model->getPesertaByClassId($id_kelas);
            if ($data['peserta_kelas']['status'] == 200) {
                $data['peserta_kelas'] = $data['peserta_kelas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['peserta_kelas']['message']);

            $data['peserta_seluruh_kelas'] = $this->Classes_model->getPeserta();
            if ($data['peserta_seluruh_kelas']['status'] == 200) {
                $data['peserta_seluruh_kelas'] = $data['peserta_seluruh_kelas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['peserta_seluruh_kelas']['message']);

            $data['kategori'] = $this->Classes_model->getKategori();
            if ($data['kategori']['status'] == 200) {
                $data['kategori'] = $data['kategori']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kategori']['message']);

            $data['status'] = $this->Classes_model->getStatus();
            if ($data['status']['status'] == 200) {
                $data['status'] = $data['status']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['status']['message']);

            $data['harga'] = $this->Classes_model->getHarga($id_kelas);
            if ($data['harga']['status'] == 200) {
                $data['harga'] = $data['harga']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['harga']['message']);

            $data['peserta'] = $this->Classes_model->getPesertaByUserIdClassId($id_kelas);
            if ($data['peserta']['status'] == 200) {
                $data['peserta'] = $data['peserta']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['peserta']['message']);

            $data['cek'] = $this->Classes_model->cekPeserta($id_kelas);
            if ($data['cek']['status'] == 200) {
                $data['cek'] = $data['cek']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['cek']['message']);

            $data['materi'] = $this->Classes_model->getMateriByKegiatan($id_kelas);
            if ($data['materi']['status'] == 200) {
                $data['materi'] = $data['materi']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['materi']['message']);

            $data['materiKegiatan'] = $this->Classes_model->getMateribyIdMateri($id_materi);
            if ($data['materiKegiatan']['status'] == 200) {
                $data['materiKegiatan'] = $data['materiKegiatan']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['materiKegiatan']['message']);

            $data['materiLain'] = $this->Classes_model->getMateriLain($id_kegiatan, $id_materi);
            if ($data['materiLain']['status'] == 200) {
                $data['materiLain'] = $data['materiLain']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['materiLain']['message']);

            $data['indexvideo'] = $index;
            if (isset($this->session->userdata['logged_in'])) {
                $this->session->set_flashdata('buttonJoin', 'Anda telah mengikuti kelas ini');
                $this->session->set_flashdata('batasPeserta', 'Maaf, kelas ini telah penuh');
                $header['nama'] = $this->Classes_model->getMyName();
                if ($header['nama']['status'] == 200) {
                    $header['nama'] = explode(" ", $header['nama']['data']['nama']);
                } else
                    $this->session->set_flashdata("errorAPI", $header['nama']['message']);

                $notif = $this->Classes_model->getPesertaByUserId();
                if ($notif['status'] == 200) {
                    $datanotif = array();
                    foreach ($notif['data'] as $value) {
                        $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                        if ($cek['status'] == 200) {
                            if ($cek['data'] != null) {
                                $datanotif[] = $cek['data'];
                            }
                        } else {
                            $this->session->set_flashdata("errorAPI", $cek['message']);
                        }
                    }
                    $header['notif'] = $datanotif;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif['message']);
                }

                $notif2 = $this->Workshops_model->getPesertaByUserId();
                if ($notif2['status'] == 200) {
                    $datanotif2 = array();
                    foreach ($notif2['data'] as $value) {
                        $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                        if ($cek2['status'] == 200) {
                            if ($cek2['data'] != null) {
                                $datanotif2[] = $cek2['data'];
                            }
                        } else {
                            $this->session->set_flashdata("errorAPI", $cek2['message']);
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
                }

                $this->load->view('partials/user/header', $header);
                $this->load->view('classes/video_kelas', $data);
                $this->load->view('partials/user/footer');
                $this->session->set_userdata('workshop', null);
            } else {
                $this->load->view('partials/common/header');
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
            $classDetail = $this->Workshops_model->getClassById($classId);
            if ($classDetail['status'] == 200) {
                $classDetail = $classDetail['data'][0];
                $isClassOwner = $classDetail['data']['pembuat_workshop'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);

            $isClassMember = $this->Workshops_model->getPesertaByUserIdClassId($classId);
            if ($isClassMember['status'] == 200) {
                $isClassMember = $isClassMember['data'];
            } else
                $this->session->set_flashdata("errorAPI", $isClassMember['message']);
        } else {
            $classDetail = $this->Classes_model->getClassById($classId);
            if ($classDetail['status'] == 200) {
                $classDetail = $classDetail['data'][0];
                $isClassOwner = $classDetail['data']['pembuat_kelas'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);

            $isClassMember = $this->Classes_model->getPesertaByUserIdClassId($classId);
            if ($isClassMember['status'] == 200) {
                $isClassMember = $isClassMember['data'];
            } else
                $this->session->set_flashdata("errorAPI", $isClassMember['message']);
        }

        if (!$isClassOwner && !$isClassMember) {
            $this->session->set_flashdata('message', "You're not a member of this class!");
            if ($this->session->userdata('workshop') != null)
                redirect('workshops/open_workshop/' . $classId);
            else
                redirect("class/$classId");
        }
        if ($this->session->userdata('workshop') != null) {
            $classActivity = $this->Workshops_model->getKegiatanByIdKegiatan($activityId);
            if ($classActivity['status'] == 200) {
                $classActivity = $classActivity['data'][0];
            } else
                $this->session->set_flashdata("errorAPI", $classActivity['message']);
        } else {
            $classActivity = $this->Classes_model->getKegiatanByIdKegiatan($activityId);
            if ($classActivity['status'] == 200) {
                $classActivity = $classActivity['data'][0];
            } else
                $this->session->set_flashdata("errorAPI", $classActivity['message']);
        }

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

        if (!$this->Classes_model->updateKegiatanStatus($activityId, CLASS_STARTED)['status'] == 200 || !$this->Workshops_model->updateKegiatanStatus($activityId, CLASS_STARTED)['status'] == 200) {
            $this->session->set_flashdata('message', 'Failed to start the class!');
            if ($this->session->userdata('workshop') != null)
                redirect('workshops/open_workshop/' . $classId);
            else
                redirect("class/$classId");
        }
        if ($this->session->userdata('workshop') != null) {
            $classId = $classDetail['id_workshop'];
            $classMember = $this->Workshops_model->getPesertaByClassId($classId);
            if ($classMember['status'] == 200) {
                $classMember = $classMember['data'];
            } else
                $this->session->set_flashdata("errorAPI", $classMember['message']);

            $classOwner = $this->Workshops_model->getUserDetail($classDetail['pembuat_workshop']);
            if ($classOwner['status'] == 200) {
                $classOwner = $classOwner['data'][0];
            } else
                $this->session->set_flashdata("errorAPI", $classOwner['message']);

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
            if ($classMember['status'] == 200) {
                $classMember = $classMember['data'];
            } else
                $this->session->set_flashdata("errorAPI", $classMember['message']);

            $classOwner = $this->Classes_model->getUserDetail($classDetail['pembuat_kelas'])[0];
            if ($classOwner['status'] == 200) {
                $classOwner = $classOwner['data'][0];
            } else
                $this->session->set_flashdata("errorAPI", $classOwner['message']);

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
            $classDetail = $this->Workshops_model->getClassById($classId);
            if ($classDetail['status'] == 200) {
                $classDetail = $classDetail['data'][0];
                $isClassOwner = $classDetail['pembuat_workshop'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        } else {
            $userId = $this->session->userdata('id_user');
            $classDetail = $this->Classes_model->getClassById($classId);
            if ($classDetail['status'] == 200) {
                $classDetail = $classDetail['data'][0];
                $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }
        if (!$isClassOwner) {
            $this->session->set_flashdata('message', "You're not the owner of this class!");
            redirect("class/$classId/$activityId");
        }

        if (!$this->Classes_model->updateKegiatanStatus($activityId, CLASS_FINISHED)['status'] == 200 || !$this->Workshops_model->updateKegiatanStatus($activityId, CLASS_FINISHED)['status'] == 200) {
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
        if ($this->session->userdata('workshop') != null) {
            $userDetail = $this->Workshops_model->getUserDetail($userId);
            if ($userDetail['status'] == 200) {
                $userDetail = $userDetail['data'][0];
            } else
                $this->session->set_flashdata("errorAPI", $userDetail['message']);
        } else {
            $userDetail = $this->Classes_model->getUserDetail($userId);
            if ($userDetail['status'] == 200) {
                $userDetail = $userDetail['data'][0];
            } else
                $this->session->set_flashdata("errorAPI", $userDetail['message']);
        }

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

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail['status'] == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);;

        if (!$isClassOwner) {
            redirect("home");
        }

        $data['kategori'] = $this->Classes_model->getKategori();
        if ($data['kategori']['status'] == 200) {
            $data['kategori'] = $data['kategori']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['kategori']['message']);

        $data['jenis'] = $this->Classes_model->getJenis();
        if ($data['jenis']['status'] == 200) {
            $data['jenis'] = $data['jenis']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['jenis']['message']);

        $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
        if ($data['kelas']['status'] == 200) {
            $data['kelas'] = $data['kelas']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

        $data['pembuat'] = $this->Classes_model->getMyName();
        if ($data['pembuat']['status'] == 200) {
            $data['pembuat'] = $data['pembuat']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);

        $header['nama'] = $this->Classes_model->getMyName();
        if ($header['nama']['status'] == 200) {
            $header['nama'] = explode(" ", $header['nama']['data']['nama']);
        } else
            $this->session->set_flashdata("errorAPI", $header['nama']['message']);

        $notif = $this->Classes_model->getPesertaByUserId();
        if ($notif['status'] == 200) {
            $datanotif = array();
            foreach ($notif['data'] as $value) {
                $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                if ($cek['status'] == 200) {
                    if ($cek['data'] != null) {
                        $datanotif[] = $cek['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek['message']);
                }
            }
            $header['notif'] = $datanotif;
        } else {
            $this->session->set_flashdata("errorAPI", $notif['message']);
        }

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        if ($notif2['status'] == 200) {
            $datanotif2 = array();
            foreach ($notif2['data'] as $value) {
                $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                if ($cek2['status'] == 200) {
                    if ($cek2['data'] != null) {
                        $datanotif2[] = $cek2['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                }
            }
            $header['notif2'] = $datanotif2;
        } else {
            $this->session->set_flashdata("errorAPI", $notif2['message']);
        }


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

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);

        if (!$isClassOwner) {
            redirect("home");
        }

        $updateClass = $this->Classes_model->updateClass($id_kelas);
        if ($updateClass['status'] != 200) {
            $this->session->set_flashdata("invalidImage", "$updateClass");
            redirect("classes/update_class/" . $id_kelas);
        }
        redirect('classes/open_class/' . $id_kelas);
    }

    public function set_kegiatan($id_kelas, $redirect = null)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $kegiatan = $this->Classes_model->setKegiatanByClass($id_kelas);
            if ($kegiatan['status'] == 200) {
                $this->session->set_flashdata("success", "Jadwal Kegiatan anda berhasil di tambah!");
            } else if ($kegiatan['data']) {
                $this->session->set_flashdata("invalidFile", $kegiatan['data'] . " (only pdf, doc, ppt). Max Size : 25MB");
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

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);

        if (!$isClassOwner) {
            redirect("home");
        }

        $kegiatan = $this->Classes_model->updateKegiatan($id_kelas, $id_kegiatan);
        if ($kegiatan['status'] == 200) {
            $this->session->set_flashdata("success", "Jadwal Kegiatan anda berhasil di tambah!");
        } else if ($kegiatan) {
            $this->session->set_flashdata("invalidFile", $kegiatan['data'] . "(only pdf, doc, ppt). Max Size : 25MB");
        }

        if ($redirect == "akademik") {
            redirect('classes/my_classes');
        }
        redirect('classes/open_class/' . $id_kelas);
    }

    public function join_class($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $temp = $this->Classes_model->joinClass($id_kelas);
            if ($temp['status'] != 200)
                $this->session->set_flashdata("errorAPI", $temp['message']);
            redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function pembayaran_kelas($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama']['status'] == 200) {
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            } else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200) {
                        if ($cek['data'] != null) {
                            $datanotif[] = $cek['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        if ($cek2['data'] != null) {
                            $datanotif2[] = $cek2['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

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
            if ($data['seluruh_kelas']['status'] == 200) {
                $data['seluruh_kelas'] = $data['seluruh_kelas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['seluruh_kelas']['message']);

            $data['seluruh_kelas2'] = $this->Workshops_model->getAllClasses();
            if ($data['seluruh_kelas2']['status'] == 200) {
                $data['seluruh_kelas2'] = $data['seluruh_kelas2']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['seluruh_kelas2']['message']);

            $data['kelas'] = $this->Classes_model->getMyClasses();
            if ($data['kelas']['status'] == 200) {
                $data['kelas'] = $data['kelas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['kelas2'] = $this->Workshops_model->getMyClasses();
            if ($data['kelas2']['status'] == 200) {
                $data['kelas2'] = $data['kelas2']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kelas2']['message']);

            $data['kegiatan'] = $this->Classes_model->getAllKegiatan();
            if ($data['kegiatan']['status'] == 200) {
                $data['kegiatan'] = $data['kegiatan']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kegiatan']['message']);

            $data['kegiatan2'] = $this->Workshops_model->getAllKegiatan();
            if ($data['kegiatan2']['status'] == 200) {
                $data['kegiatan2'] = $data['kegiatan2']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kegiatan2']['message']);

            $data['pembuat'] = $this->Classes_model->getPembuat();
            if ($data['pembuat']['status'] == 200) {
                $data['pembuat'] = $data['pembuat']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);

            $data['status'] = $this->Classes_model->getStatus();
            if ($data['status']['status'] == 200) {
                $data['status'] = $data['status']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['status']['message']);

            $data['status2'] = $this->Workshops_model->getStatus();
            if ($data['status2']['status'] == 200) {
                $data['status2'] = $data['status2']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['status2']['message']);

            $data['peserta'] = $this->Classes_model->getPeserta();
            if ($data['peserta']['status'] == 200) {
                $data['peserta'] = $data['peserta']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['peserta']['message']);

            $data['peserta2'] = $this->Workshops_model->getPeserta();
            if ($data['peserta2']['status'] == 200) {
                $data['peserta2'] = $data['peserta2']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['peserta2']['message']);

            $data['materi2'] = $this->Classes_model->getMateriAll();
            if ($data['materi2']['status'] == 200) {
                $data['materi2'] = $data['materi2']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['materi2']['message']);

            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama']['status'] == 200) {
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            } else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama']['status'] == 200) {
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            } else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {

                $datanotif = array();
                $datatugas = array();
                $datakelas = array();
                $datamateri = array();
                $datakegiatansaya = array();
                $datakegiatandiikuti = array();
                foreach ($notif['data'] as $value) {

                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200)
                        $cek = $cek['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek['message']);

                    $tugas = $this->Classes_model->getTugasByClassId($value['id_kelas']);
                    if ($tugas['status'] == 200)
                        $tugas = $tugas['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $tugas['message']);
                    $kelas = $this->Classes_model->getClassById($value['id_kelas']);
                    if ($kelas['status'] == 200)
                        $kelas = $kelas['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $kelas['message']);

                    $materi = $this->Classes_model->getMateriByClassId($value['id_kelas']);
                    if ($materi['status'] == 200)
                        $materi = $materi['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $materi['message']);

                    $kegiatandiikuti = $this->Classes_model->getKegiatan($value['id_kelas']);
                    if ($kegiatandiikuti['status'] == 200)
                        $kegiatandiikuti = $kegiatandiikuti['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $kegiatandiikuti['message']);

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
                $data['notif'] = $datanotif;
                $data['tugas'] = $datatugas;
                $data['kelas_tugas'] = $datakelas;
                $data['materi'] = $datamateri;
            }

            foreach ($data['kelas'] as $value) {
                $kegiatansaya = $this->Classes_model->getKegiatan($value['id_kelas']);
                if ($kegiatansaya['status'] == 200) {
                    $kegiatansaya = $kegiatansaya['data'];
                }
                if ($kegiatansaya != null) {
                    $datakegiatansaya[] = $kegiatansaya;
                }
            }
            $data['kegiatan_saya'] = $datakegiatansaya;

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        $cek2 = $cek2['data'];
                    } else
                        $this->session->set_flashdata("errorAPI", $cek2['message']);

                    if ($cek2 != null) {
                        $datanotif2[] = $cek2;
                    }
                }
                $header['notif2'] = $datanotif2;
            }

            $datacek = array();
            foreach ($data['tugas'] as $value) {
                foreach ($value as $value2) {
                    $cek = $this->Classes_model->cekTugas($value2['id_tugas']);
                    if ($cek['status'] == 200) {
                        $cek = $cek['data'];
                    } else
                        $this->session->set_flashdata("errorAPI", $cek['message']);

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
            $temp = $this->Classes_model->leaveClass($id_kelas);
            if ($temp['status'] != 200) {
                $this->session->set_flashdata("errorAPI", $temp['message']);
            }
            redirect('classes/my_classes');
        } else {
            redirect('home');
        }
    }

    public function index()
    {
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama']['status'] == 200) {
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            } else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200) {
                        if ($cek['data'] != null) {
                            $datanotif[] = $cek['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        if ($cek2['data'] != null) {
                            $datanotif2[] = $cek2['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
        }


        $data['categories'] = $this->Classes_model->getKategori();
        if ($data['categories']['status'] == 200) {
            $data['categories'] = $data['categories']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['categories']['message']);

        $data['class'] = $this->Classes_model->getAllRandomClasses();
        if ($data['class']['status'] == 200) {
            $data['class'] = $data['class']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['class']['message']);

        $data['classNum'] = $this->Classes_model->getAllClassesDetail();
        if ($data['classNum']['status'] == 200) {
            $data['classNum'] = count($data['classNum']['data']);
        } else
            $this->session->set_flashdata("errorAPI", $data['classNum']['message']);

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
            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama']['status'] == 200) {
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            } else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200) {
                        if ($cek['data'] != null) {
                            $datanotif[] = $cek['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        if ($cek2['data'] != null) {
                            $datanotif2[] = $cek2['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
        }
        $data['kategori_text'] = $kategori;
        $data['categories'] = $this->Classes_model->getKategori();
        if ($data['categories']['status'] == 200) {
            $data['categories'] = $data['categories']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['categories']['message']);

        $data['class'] = $this->Classes_model->getClassesbyCategories($kategori);
        if ($data['class']['status'] == 200) {
            $data['class'] = $data['class']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['class']['message']);

        $data['classNum'] = $this->Classes_model->getClassesbyCategories($kategori);
        if ($data['classNum']['status'] == 200) {
            $data['classNum'] = count($data['classNum']['data']);
        } else
            $this->session->set_flashdata("errorAPI", $data['classNum']['message']);
        $data['kategori_text'] = $kategori;
        $data['categories'] = $this->Classes_model->getKategori();
        if ($data['categories']['status'] == 200) {
            $data['categories'] = $data['categories']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['categories']['message']);

        $data['class'] = $this->Classes_model->getClassesbyCategories($kategori);
        if ($data['class']['status'] == 200) {
            $data['class'] = $data['class']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['class']['message']);

        $data['classNum'] = $this->Classes_model->getClassesbyCategories($kategori);
        if ($data['classNum']['status'] == 200) {
            $data['classNum'] = count($data['classNum']['data']);
        } else
            $this->session->set_flashdata("errorAPI", $data['classNum']['message']);

        $this->load->view('classes/kelasfilter', $data);
        $this->load->view('partials/common/footer');
    }

    public function sort($sorting)
    {
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama']['status'] == 200) {
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            } else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200) {
                        if ($cek['data'] != null) {
                            $datanotif[] = $cek['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        if ($cek2['data'] != null) {
                            $datanotif2[] = $cek2['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
        }

        $data['kategori_text'] = $sorting;
        $data['categories'] = $this->Classes_model->getKategori();
        if ($data['categories']['status'] == 200) {
            $data['categories'] = $data['categories']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['categories']['message']);

        $data['class'] = $this->Classes_model->getClassesbySorting($sorting);
        if ($data['class']['status'] == 200) {
            $data['class'] = $data['class']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['class']['message']);

        $data['classNum'] = count($this->Classes_model->getClassesbySorting($sorting));
        if ($data['classNum']['status'] == 200) {
            $data['classNum'] = count($data['classNum']['data']);
        } else
            $this->session->set_flashdata("errorAPI", $data['classNum']['message']);

        $this->load->view('classes/kelasfilter', $data);
        $this->load->view('partials/common/footer');
    }

    public function search()
    {
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama']['status'] == 200) {
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            } else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200) {
                        if ($cek['data'] != null) {
                            $datanotif[] = $cek['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        if ($cek2['data'] != null) {
                            $datanotif2[] = $cek2['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }


            $this->load->view('partials/user/header', $header);
        } else {
            $this->load->view('partials/common/header');
        }

        $data['kategori_text'] = "Pencarian";
        $data['keyword'] = $this->input->post('keyword');
        $data['categories'] = $this->Classes_model->getKategori();
        if ($data['categories']['status'] == 200) {
            $data['categories'] = $data['categories']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['categories']['message']);

        $data['class'] = $this->Classes_model->getAllClassesDetail($data['keyword']);
        if ($data['class']['status'] == 200) {
            $data['class'] = $data['class']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['class']['message']);

        $data['classNum'] = count($this->Classes_model->getAllClassesDetail($data['keyword']));
        if ($data['classNum']['status'] == 200) {
            $data['classNum'] = count($data['classNum']['data']);
        } else
            $this->session->set_flashdata("errorAPI", $data['classNum']['message']);
        if (count($data['classNum']) == 0) {
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

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail['status'] == 200)
            $classDetail = $classDetail['data'][0];
        $isClassOwner = $classDetail['pembuat_kelas'] == $userId;

        if (!$isClassOwner) {
            redirect("home");
        }

        $temp = $this->Classes_model->delMateri($url_materi);
        if ($temp['status'] != 200)
            $this->session->set_flashdata("errorAPI", $temp['message']);

        if ($redirect == "akademik") {
            redirect("classes/my_classes");
        }

        redirect('classes/open_class/' . $id_kelas);
    }

    public function list_assignment($id_kelas)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tugas'] = $this->Classes_model->getTugasByClassId($id_kelas);
            if ($data['tugas']['status'] == 200) {
                $datacek = array();
                foreach ($data['tugas']['data'] as $value) {
                    $cek = $this->Classes_model->cekTugas($value['id_tugas']);
                    if ($cek['status'] == 200)
                        $cek = $cek['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    if ($cek == null) {
                        $datacek[] = null;
                    } else {
                        $datacek[] = $cek;
                    }
                }
                $data['cek'] = $datacek;
            } else
                $this->session->set_flashdata("errorAPI", $data['tugas']['message']);


            $data['submit'] = $this->Classes_model->getSubmit();
            if ($data['submit']['status'] == 200)
                $data['submit'] = $data['submit']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['submit']['message']);

            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            if ($data['kelas']['status'] == 200)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama']['status'] == 200) {
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            } else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200) {
                        if ($cek['data'] != null) {
                            $datanotif[] = $cek['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        if ($cek2['data'] != null) {
                            $datanotif2[] = $cek2['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

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

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail['status'] == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);

        if (!$isClassOwner) {
            redirect("home");
        }

        $data['kategori'] = $this->Classes_model->getKategoriTugas();
        if ($data['kategori']['status'] == 200) {
            $data['kategori'] = $data['kategori']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['kategori']['message']);

        $data['id'] = $id_kelas;
        $header['nama'] = $this->Classes_model->getMyName();
        if ($header['nama']['status'] == 200) {
            $header['nama'] = explode(" ", $header['nama']['data']['nama']);
        } else
            $this->session->set_flashdata("errorAPI", $header['nama']['message']);

        $notif = $this->Classes_model->getPesertaByUserId();
        if ($notif['status'] == 200) {
            $datanotif = array();
            foreach ($notif['data'] as $value) {
                $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                if ($cek['status'] == 200) {
                    if ($cek['data'] != null) {
                        $datanotif[] = $cek['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek['message']);
                }
            }
            $header['notif'] = $datanotif;
        } else {
            $this->session->set_flashdata("errorAPI", $notif['message']);
        }

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        if ($notif2['status'] == 200) {
            $datanotif2 = array();
            foreach ($notif2['data'] as $value) {
                $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                if ($cek2['status'] == 200) {
                    if ($cek2['data'] != null) {
                        $datanotif2[] = $cek2['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                }
            }
            $header['notif2'] = $datanotif2;
        } else {
            $this->session->set_flashdata("errorAPI", $notif2['message']);
        }

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
        if ($classDetail['status'] == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        }

        if (!$isClassOwner) {
            redirect("home");
        }

        $status = $this->Classes_model->createAssignment($id_kelas);
        if ($status['status'] != 200) {
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
        if ($deadline['status'] == 200) {
            $deadline = $deadline['status'];
        } else
            $this->session->set_flashdata("errorAPI", $deadline['message']);

        $status = $this->Classes_model->collectAssignment($id_tugas, $deadline["batas_pengiriman_tugas"]);

        if ($status['status'] != 200) {
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
        $temp = $this->Classes_model->deleteJawaban($id_submit);
        if ($temp['status'] != 200)
            $this->session->set_flashdata("errorAPI", $temp['message']);

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

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail['status'] == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);

        if (!$isClassOwner) {
            redirect("home");
        }

        $data['kategori'] = $this->Classes_model->getKategoriTugas();
        if ($data['kategori']['status'] == 200) {
            $data['kategori'] = $data['kategori']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['kategori']['message']);

        $data['tugas'] = $this->Classes_model->getTugasByTugasId($id_tugas);
        if ($data['tugas']['status'] == 200) {
            $data['tugas'] = $data['tugas']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['tugas']['message']);
        $data['id'] = $id_kelas;

        $header['nama'] = $this->Classes_model->getMyName();
        if ($header['nama']['status'] == 200) {
            $header['nama'] = explode(" ", $header['nama']['data']['nama']);
        } else
            $this->session->set_flashdata("errorAPI", $header['nama']['message']);

        $notif = $this->Classes_model->getPesertaByUserId();
        if ($notif['status'] == 200) {
            $datanotif = array();
            foreach ($notif['data'] as $value) {
                $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                if ($cek['status'] == 200) {
                    if ($cek['data'] != null) {
                        $datanotif[] = $cek['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek['message']);
                }
            }
            $header['notif'] = $datanotif;
        } else {
            $this->session->set_flashdata("errorAPI", $notif['message']);
        }

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        if ($notif2['status'] == 200) {
            $datanotif2 = array();
            foreach ($notif2['data'] as $value) {
                $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                if ($cek2['status'] == 200) {
                    if ($cek2['data'] != null) {
                        $datanotif2[] = $cek2['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                }
            }
            $header['notif2'] = $datanotif2;
        } else {
            $this->session->set_flashdata("errorAPI", $notif2['message']);
        }

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

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail['status'] == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);

        if (!$isClassOwner) {
            redirect("home");
        }

        $status = $this->Classes_model->updateAssignment($id_tugas);
        if ($status['status'] != 200) {
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
        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail['status'] == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);


        if (!$isClassOwner) {
            redirect("home");
        }
        $temp = $this->Classes_model->deleteAssignment($id_tugas);
        if ($temp['status'] != 200)
            $this->session->set_flashdata("errorAPI", $temp['message']);
        redirect('classes/list_tugas/' . $id_kelas);
    }

    public function update_nilai($id_kelas, $id_tugas, $id_submit)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $temp = $this->Classes_model->updateNilai($id_submit);
            if ($temp['status'] == 200)
                $this->session->set_flashdata("successUpdateNilai", "$id_submit");
            else
                $this->session->set_flashdata("errorAPI", $temp['message']);

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

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail['status'] == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);

        if ($isClassOwner) {

            $data['tugas'] = $this->Classes_model->getTugasByClassId($id_kelas);
            if ($data['tugas']['status'] == 200) {
                $datacek = array();
                foreach ($data['tugas']['data'] as $value) {
                    $cek = $this->Classes_model->cekTugas($value['id_tugas']);
                    if ($cek['status'] == 200)
                        $cek = $cek['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    if ($cek == null) {
                        $datacek[] = null;
                    } else {
                        $datacek[] = $cek;
                    }
                }
            } else
                $this->session->set_flashdata("errorAPI", $data['tugas']['message']);

            $data['cek'] = $datacek;
            $data['submit'] = $this->Classes_model->getSubmit();
            if ($data['submit']['status'] == 200)
                $data['submit'] = $data['submit']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['submit']['message']);

            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            if ($data['submit']['status'] == 200)
                $data['submit'] = $data['submit']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['submit']['message']);

            $data['peserta'] = $this->Classes_model->getPesertaByClassId($id_kelas);
            if ($data['peserta']['status'] == 200)
                $data['peserta'] = $data['peserta']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['peserta']['message']);

            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama']['status'] == 200) {
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            } else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200) {
                        if ($cek['data'] != null) {
                            $datanotif[] = $cek['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        if ($cek2['data'] != null) {
                            $datanotif2[] = $cek2['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }


            $this->load->view('partials/user/header', $header);
            $this->load->view('classes/list_tugas', $data);
            $this->load->view('partials/user/footer');
        } else {
            $classDetail2 = $this->Classes_model->getPesertabyClass($id_kelas);
            if ($classDetail2['status'] == 200) {
                $classDetail2 = $classDetail2['data'][0];
                $isPeserta = $classDetail2['id_user'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail2['message']);


            if (!$isPeserta) {
                redirect("home");
            }

            $data['tugas'] = $this->Classes_model->getTugasByClassId($id_kelas);
            if ($data['tugas']['status'] == 200) {
                $datacek = array();
                foreach ($data['tugas']['data'] as $value) {
                    $cek = $this->Classes_model->cekTugas($value['id_tugas']);
                    if ($cek['status'] == 200)
                        $cek = $cek['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    if ($cek == null) {
                        $datacek[] = null;
                    } else {
                        $datacek[] = $cek;
                    }
                }
            } else
                $this->session->set_flashdata("errorAPI", $data['tugas']['message']);


            $data['cek'] = $datacek;
            $data['submit'] = $this->Classes_model->getSubmit();
            if ($data['submit']['status'] == 200)
                $data['submit'] = $data['submit']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['submit']['message']);

            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            if ($data['kelas']['status'] == 200)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['peserta'] = $this->Classes_model->getPesertaByClassId($id_kelas);
            if ($data['peserta']['status'] == 200)
                $data['peserta'] = $data['peserta']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['peserta']['message']);

            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama']['status'] == 200)
                $header['nama'] = explode(" ", $header['nama']['data']['nama']);
            else
                $this->session->set_flashdata("errorAPI", $header['nama']['message']);

            $notif = $this->Classes_model->getPesertaByUserId();
            $datanotif = array();
            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif['status'] == 200) {
                $datanotif = array();
                foreach ($notif['data'] as $value) {
                    $cek = $this->Classes_model->getKelasKegiatan($value['id_kelas']);
                    if ($cek['status'] == 200) {
                        if ($cek['data'] != null) {
                            $datanotif[] = $cek['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        if ($cek2['data'] != null) {
                            $datanotif2[] = $cek2['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }


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

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail['status'] == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);

        if ($isClassOwner) {

            $data['tugas'] = $this->Classes_model->getTugasByTugasId($id_tugas);
            if ($data['tugas']['status'] == 200)
                $data['tugas'] = $data['tugas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['tugas']['message']);

            $data['cek'] = $this->Classes_model->cekTugas($data['tugas'][0]['id_tugas']);
            if ($data['cek']['status'] == 200)
                $data['cek'] = $data['cek']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['cek']['message']);

            $data['submit'] = $this->Classes_model->getSubmit();
            if ($data['submit']['status'] == 200)
                $data['submit'] = $data['submit']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['submit']['message']);

            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            if ($data['kelas']['status'] == 200)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['user'] = $this->Classes_model->getUserDetail($data['kelas'][0]['pembuat_kelas']);

            if ($data['user']['status'] == 200)
                $data['user'] = $data['user']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['user']['message']);

            $header['nama'] =  $this->Classes_model->getMyName();
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
                        if ($cek['data'] != null) {
                            $datanotif[] = $cek['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        if ($cek2['data'] != null) {
                            $datanotif2[] = $cek2['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }

            $this->load->view('partials/user/header', $header);
            $this->load->view('classes/detail_tugaskuis', $data);
            $this->load->view('partials/user/footer');
        } else {
            $classDetail2 = $this->Classes_model->getPesertabyClass($id_kelas);
            if ($classDetail2['status'] == 200) {
                $classDetail2 = $classDetail2['data'][0];
                $isPeserta = $classDetail2['id_user'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail2['message']);

            if (!$isPeserta) {
                redirect("home");
            }

            $data['tugas'] = $this->Classes_model->getTugasByTugasId($id_tugas);
            if ($data['tugas']['status'] == 200)
                $data['tugas'] = $data['tugas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['tugas']['message']);

            $data['cek'] = $this->Classes_model->cekTugas($data['tugas'][0]['id_tugas']);
            if ($data['cek']['status'] == 200)
                $data['cek'] = $data['cek']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['cek']['message']);

            $data['submit'] = $this->Classes_model->getSubmit();
            if ($data['submit']['status'] == 200)
                $data['submit'] = $data['submit']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['submit']['message']);

            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            if ($data['kelas']['status'] == 200)
                $data['kelas'] = $data['kelas']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

            $data['user'] = $this->Classes_model->getUserDetail($data['kelas'][0]['pembuat_kelas']);
            if ($data['user']['status'] == 200)
                $data['user'] = $data['user']['data'];
            else
                $this->session->set_flashdata("errorAPI", $data['user']['message']);

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
                        if ($cek['data'] != null) {
                            $datanotif[] = $cek['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek['message']);
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2['status'] == 200) {
                $datanotif2 = array();
                foreach ($notif2['data'] as $value) {
                    $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                    if ($cek2['status'] == 200) {
                        if ($cek2['data'] != null) {
                            $datanotif2[] = $cek2['data'];
                        }
                    } else {
                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }


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

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail['status'] == 200) {
            $classDetail = $classDetail['data'][0];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        } else
            $this->session->set_flashdata("errorAPI", $classDetail['message']);

        if (!$isClassOwner) {
            redirect("home");
        }

        $data['tugas'] = $this->Classes_model->getTugasByTugasId($id_tugas);
        if ($data['tugas']['status'] == 200) {
            $data['tugas'] = $data['tugas']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['tugas']['message']);

        $data['cek'] = $this->Classes_model->cekTugas($data['tugas'][0]['id_tugas']);
        if ($data['cek']['status'] == 200) {
            $data['cek'] = $data['cek']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['cek']['message']);

        $data['submit'] = $this->Classes_model->getSubmit();
        if ($data['submit']['status'] == 200) {
            $data['submit'] = $data['submit']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['submit']['message']);

        $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
        if ($data['kelas']['status'] == 200) {
            $data['kelas'] = $data['kelas']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['kelas']['message']);

        $data['user'] = $this->Classes_model->getUserDetail($data['kelas'][0]['pembuat_kelas']);
        if ($data['user']['status'] == 200) {
            $data['user'] = $data['user']['data'];
        } else
            $this->session->set_flashdata("errorAPI", $data['user']['message']);

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
                    if ($cek['data'] != null) {
                        $datanotif[] = $cek['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek['message']);
                }
            }
            $header['notif'] = $datanotif;
        } else {
            $this->session->set_flashdata("errorAPI", $notif['message']);
        }

        $notif2 = $this->Workshops_model->getPesertaByUserId();
        if ($notif2['status'] == 200) {
            $datanotif2 = array();
            foreach ($notif2['data'] as $value) {
                $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                if ($cek2['status'] == 200) {
                    if ($cek2['data'] != null) {
                        $datanotif2[] = $cek2['data'];
                    }
                } else {
                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                }
            }
            $header['notif2'] = $datanotif2;
        } else {
            $this->session->set_flashdata("errorAPI", $notif2['message']);
        }

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
