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
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {

            $kat = $this->Classes_model->getKategori();
            if ($kat == null)
                $null = true;
            else {
                if ($kat['status'] == 200 || $kat['status'] == 202) {
                    $data['kategori'] = $kat['data'];
                } else {
                    $this->session->set_flashdata("errorAPI", $kat['message']);
                }
            }

            $jenis = $this->Classes_model->getJenis();
            if ($jenis == null)
                $null = true;
            else {
                if ($jenis['status'] == 200 || $jenis['status'] == 202) {
                    $data['jenis'] = $jenis['data'];
                } else {
                    $this->session->set_flashdata("errorAPI", $jenis['message']);
                }
            }

            $pembuat = $this->Classes_model->getMyName();
            if ($pembuat == null)
                $null = true;
            else {
                if ($pembuat['status'] == 200 || $pembuat['status'] == 202) {
                    $data['pembuat']['nama'] = $pembuat['data'];
                } else {
                    $this->session->set_flashdata("errorAPI", $pembuat['message']);
                }
            }

            $nama = $this->Classes_model->getMyName();
            if ($nama == null)
                $null = true;
            else {
                if ($nama['status'] == 200 || $nama['status'] == 202) {
                    $header['nama'] = explode(" ", $nama['data']);
                } else {
                    $this->session->set_flashdata("errorAPI", $nama['message']);
                }
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
                                if ($cek['status'] == 200 || $cek['status'] == 202) {
                                    if ($cek['data'] != null) {
                                        $datanotif[] = $cek['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek['message']);
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif['message']);
                }
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
                            else {
                                if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                    if ($cek2['data'] != null) {
                                        $datanotif2[] = $cek2['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
                }
            }

            if ($null)
                $this->load->view("server_error");
            else {
                $this->load->view('partials/user/header', $header);
                $this->load->view('classes/new_class', $data);
                $this->load->view('partials/user/footer');
            }
        } else {
            redirect('home');
        }
    }

    public function new_class_action()
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {

            $newClass = $this->Classes_model->createClass();
            if ($newClass == "server_error")
                $null = true;
            else {
                if ($newClass == 'error') {
                    $this->session->set_flashdata("invalidImage", "Invalid image type/size");
                    redirect("classes/new_class");
                }
            }

            $id = $this->Classes_model->getIdNewClass();
            if ($id == null)
                $null = true;
            else {
                if ($id['status'] == 200) {
                    $id = $id['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $id['message']);
            }

            if ($null)
                $this->load->view("server_error");
            else
                redirect('classes/open_class/' . $id);
        } else {
            redirect('home');
        }
    }

    public function open_class($id_kelas)
    {
        $null = false;

        $data['seluruh_kelas'] = $this->Classes_model->getAllTopClasses();
        if ($data['seluruh_kelas'] == null)
            $null = true;
        else {
            if ($data['seluruh_kelas']['status'] == 200 || $data['seluruh_kelas']['status'] == 202) {
                $data['seluruh_kelas'] = $data['seluruh_kelas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['seluruh_kelas']['message']);
        }

        $data['seluruh_harga'] = $this->Classes_model->getAllHarga();
        if ($data['seluruh_harga'] == null)
            $null = true;
        else {
            if ($data['seluruh_harga']['status'] == 200 || $data['seluruh_harga']['status'] == 202) {
                $data['seluruh_harga'] = $data['seluruh_harga']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['seluruh_harga']['message']);
        }

        $data['kegiatan'] = $this->Classes_model->getKegiatan($id_kelas);
        if ($data['kegiatan'] == null)
            $null = true;
        else {
            if ($data['kegiatan']['status'] == 200 || $data['kegiatan']['status'] == 202) {
                $data['kegiatan'] = $data['kegiatan']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kegiatan']['message']);
        }


        $data['tanggal'] = $this->Classes_model->getTanggalKegiatan($id_kelas);
        if ($data['tanggal'] == null)
            $null = true;
        else {
            if ($data['tanggal']['status'] == 200 || $data['tanggal']['status'] == 202) {
                $data['tanggal'] = $data['tanggal']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['tanggal']['message']);
        }

        $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
        if ($data['kelas'] == null)
            $null = true;
        else {
            if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202) {
                $temp[] = $data['kelas']['data'];
                $data['kelas'] = $temp;
            } else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
        }

        $data['pembuat'] = $this->Classes_model->getPembuat();
        if ($data['pembuat'] == null)
            $null = true;
        else {
            if ($data['pembuat']['status'] == 200 || $data['pembuat']['status'] == 202) {
                $data['pembuat'] = $data['pembuat']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);
        }

        $data['peserta_kelas'] = $this->Classes_model->getPesertaByClassId($id_kelas);
        if ($data['peserta_kelas'] == null)
            $null = true;
        else {
            if ($data['peserta_kelas']['status'] == 200 || $data['peserta_kelas']['status'] == 202) {
                if ($data['peserta_kelas']['data'] == null) {
                    $temp = array();
                    $data['peserta_kelas'] = $temp;
                } else
                    $data['peserta_kelas'] = $data['peserta_kelas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['peserta_kelas']['message']);
        }

        $data['peserta_seluruh_kelas'] = $this->Classes_model->getPeserta();
        if ($data['peserta_seluruh_kelas'] == null)
            $null = true;
        else {
            if ($data['peserta_seluruh_kelas']['status'] == 200 || $data['peserta_seluruh_kelas']['status'] == 202) {
                $data['peserta_seluruh_kelas'] = $data['peserta_seluruh_kelas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['peserta_seluruh_kelas']['message']);
        }

        $data['kategori'] = $this->Classes_model->getKategori();
        if ($data['kategori'] == null)
            $null = true;
        else {
            if ($data['kategori']['status'] == 200 || $data['kategori']['status'] == 202) {
                $data['kategori'] = $data['kategori']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kategori']['message']);
        }

        $data['status'] = $this->Classes_model->getStatus();
        if ($data['status'] == null)
            $null = true;
        else {
            if ($data['status']['status'] == 200 || $data['status']['status'] == 202) {
                $data['status'] = $data['status']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['status']['message']);
        }

        $data['harga'] = $this->Classes_model->getHarga($id_kelas);
        if ($data['harga'] == null)
            $null = true;
        else {
            if ($data['harga']['status'] == 200 || $data['harga']['status'] == 202) {
                $temp2 = $data['harga']['data'];
                $data['harga'] = $temp2;
            } else
                $this->session->set_flashdata("errorAPI", $data['harga']['message']);
        }

        $data['peserta'] = $this->Classes_model->getPesertaByUserIdClassId($id_kelas);
        if ($data['peserta'] == null)
            $null = true;
        else {
            if ($data['peserta']['status'] == 200 || $data['peserta']['status'] == 202) {
                $data['peserta'] = $data['peserta']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['peserta']['message']);
        }

        $data['cek'] = $this->Classes_model->cekPeserta($id_kelas);
        if ($data['cek'] == 'server_error')
            $null = true;

        $data['materi'] = $this->Classes_model->getMateriAll();
        if ($data['materi'] == null)
            $null = true;
        else {
            if ($data['materi']['status'] == 200 || $data['materi']['status'] == 202) {
                $data['materi'] = $data['materi']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['materi']['message']);
        }

        $data['materiKegiatan'] = $this->Classes_model->getMateribyKegiatan();
        if ($data['materiKegiatan'] == null)
            $null = true;
        else {
            if ($data['materiKegiatan']['status'] == 200 || $data['materiKegiatan']['status'] == 202) {
                $data['materiKegiatan'] = $data['materiKegiatan']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['materiKegiatan']['message']);
        }

        $data['error_bagian'] = "kelas";

        if (isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('buttonJoin', 'Anda telah mengikuti kelas ini');
            $this->session->set_flashdata('batasPeserta', 'Maaf, kelas ini telah penuh');
            $this->session->set_flashdata('kelasSelesai', 'Kelas ini telah selesai');

            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama'] == null)
                $null = true;
            else {
                if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202) {
                    $header['nama'] = explode(" ", $header['nama']['data']);
                } else
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
                                if ($cek['status'] == 200 || $cek['status'] == 202) {
                                    if ($cek['data'] != null) {
                                        $datanotif[] = $cek['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek['message']);
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif['message']);
                }
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
                            else {
                                if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                    if ($cek2['data'] != null) {
                                        $datanotif2[] = $cek2['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
                }
            }


            // if ($null)
            //     $this->load->view("server_error");
            // else {
            $this->load->view('partials/user/header', $header);
            if (count($data['kelas']) == 0 || count($data['kelas']) == null)
                $this->load->view('classes/error_class', $data);
            else
                $this->load->view('classes/open_class', $data);
            $this->load->view('partials/user/footer');
            $this->session->set_userdata('workshop', null);
            //}
        } else {
            // if ($null)
            //     $this->load->view("server_error");
            // else {
            $this->load->view('partials/common/header');
            if (count($data['kelas']) == 0 || count($data['kelas']) == null)
                $this->load->view('classes/error_class', $data);
            else
                $this->load->view('classes/open_class', $data);
            $this->load->view('partials/common/footer');
            $this->session->set_userdata('workshop', null);
            //}
        }
    }

    public function video_class($id_kelas, $id_kegiatan, $id_materi, $index)
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {

            $data['seluruh_kelas'] = $this->Classes_model->getAllTopClasses();
            if ($data['seluruh_kelas'] == null)
                $null = true;
            else {
                if ($data['seluruh_kelas']['status'] == 200 || $data['seluruh_kelas']['status'] == 202) {
                    $data['seluruh_kelas'] = $data['seluruh_kelas']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['seluruh_kelas']['message']);
            }

            $data['seluruh_harga'] = $this->Classes_model->getAllHarga();
            if ($data['seluruh_harga'] == null)
                $null = true;
            else {
                if ($data['seluruh_harga']['status'] == 200 || $data['seluruh_harga']['status'] == 202) {
                    $data['seluruh_harga'] = $data['seluruh_harga']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['seluruh_harga']['message']);
            }

            $data['kegiatan'] = $this->Classes_model->getKegiatanByIdKegiatan($id_kegiatan);
            if ($data['kegiatan'] == null)
                $null = true;
            else {
                if ($data['kegiatan']['status'] == 200 || $data['kegiatan']['status'] == 202) {
                    $tempkegiatan[] = $data['kegiatan']['data'];
                    $data['kegiatan'] = $tempkegiatan;
                } else
                    $this->session->set_flashdata("errorAPI", $data['kegiatan']['message']);
            }

            $data['tanggal'] = $this->Classes_model->getTanggalKegiatan($id_kelas);
            if ($data['tanggal'] == null)
                $null = true;
            else {
                if ($data['tanggal']['status'] == 200 || $data['tanggal']['status'] == 202) {
                    $data['tanggal'] = $data['tanggal']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['tanggal']['message']);
            }

            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            if ($data['kelas'] == null)
                $null = true;
            else {
                if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202) {
                    $tempkelas[] = $data['kelas']['data'];
                    $data['kelas'] = $tempkelas;
                } else
                    $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
            }

            $data['pembuat'] = $this->Classes_model->getPembuat();
            if ($data['pembuat'] == null)
                $null = true;
            else {
                if ($data['pembuat']['status'] == 200 || $data['pembuat']['status'] == 202) {
                    $data['pembuat'] = $data['pembuat']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);
            }

            $data['peserta_kelas'] = $this->Classes_model->getPesertaByClassId($id_kelas);
            if ($data['peserta_kelas'] == null)
                $null = true;
            else {
                if ($data['peserta_kelas']['status'] == 200 || $data['peserta_kelas']['status'] == 202) {
                    $data['peserta_kelas'] = $data['peserta_kelas']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['peserta_kelas']['message']);
            }

            $data['peserta_seluruh_kelas'] = $this->Classes_model->getPeserta();
            if ($data['peserta_seluruh_kelas'] == null)
                $null = true;
            else {
                if ($data['peserta_seluruh_kelas']['status'] == 200 || $data['peserta_seluruh_kelas']['status'] == 202) {
                    $data['peserta_seluruh_kelas'] = $data['peserta_seluruh_kelas']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['peserta_seluruh_kelas']['message']);
            }

            $data['kategori'] = $this->Classes_model->getKategori();
            if ($data['kategori'] == null)
                $null = true;
            else {
                if ($data['kategori']['status'] == 200 || $data['kategori']['status'] == 202) {
                    $data['kategori'] = $data['kategori']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['kategori']['message']);
            }

            $data['status'] = $this->Classes_model->getStatus();
            if ($data['status'] == null)
                $null = true;
            else {
                if ($data['status']['status'] == 200 || $data['status']['status'] == 202) {
                    $data['status'] = $data['status']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['status']['message']);
            }

            $data['harga'] = $this->Classes_model->getHarga($id_kelas);
            if ($data['harga'] == null)
                $null = true;
            else {
                if ($data['harga']['status'] == 200 || $data['harga']['status'] == 202) {
                    $data['harga'] = $data['harga']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['harga']['message']);
            }

            $data['peserta'] = $this->Classes_model->getPesertaByUserIdClassId($id_kelas);
            if ($data['peserta'] == null)
                $null = true;
            else {
                if ($data['peserta']['status'] == 200 || $data['peserta']['status'] == 202) {
                    $data['peserta'] = $data['peserta']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['peserta']['message']);
            }

            $data['cek'] = $this->Classes_model->cekPeserta($id_kelas);
            if ($data['cek'] == 'server_error')
                $null = true;



            $data['materi'] = $this->Classes_model->getMateriByKegiatan($id_kelas);
            if ($data['materi'] == null)
                $null = true;
            else {
                if ($data['materi']['status'] == 200 || $data['materi']['status'] == 202) {
                    $data['materi'] = $data['materi']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['materi']['message']);
            }

            $data['materiKegiatan'] = $this->Classes_model->getMateribyIdMateri($id_materi);
            if ($data['materiKegiatan'] == null)
                $null = true;
            else {
                if ($data['materiKegiatan']['status'] == 200 || $data['materiKegiatan']['status'] == 202) {
                    $tempmaterikegiatan[] = $data['materiKegiatan']['data'];
                    $data['materiKegiatan'] = $tempmaterikegiatan;
                } else
                    $this->session->set_flashdata("errorAPI", $data['materiKegiatan']['message']);
            }

            $data['materiLain'] = $this->Classes_model->getMateriLain($id_kegiatan, $id_materi);
            if ($data['materiLain'] == null)
                $null = true;
            else {
                if ($data['materiLain']['status'] == 200 || $data['materiLain']['status'] == 202) {
                    $data['materiLain'] = $data['materiLain']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['materiLain']['message']);
            }

            $data['indexvideo'] = $index;
            $data['error_bagian'] = "materi";

            if (isset($this->session->userdata['logged_in'])) {

                $this->session->set_flashdata('buttonJoin', 'Anda telah mengikuti kelas ini');
                $this->session->set_flashdata('batasPeserta', 'Maaf, kelas ini telah penuh');
                $header['nama'] = $this->Classes_model->getMyName();
                if ($header['nama'] == null)
                    $null = true;
                else {
                    if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202) {
                        $header['nama'] = explode(" ", $header['nama']['data']);
                    } else
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
                                    if ($cek['status'] == 200 || $cek['status'] == 202) {
                                        if ($cek['data'] != null) {
                                            $datanotif[] = $cek['data'];
                                        }
                                    } else {
                                        $this->session->set_flashdata("errorAPI", $cek['message']);
                                    }
                                }
                            }
                        }
                        $header['notif'] = $datanotif;
                    } else {
                        $this->session->set_flashdata("errorAPI", $notif['message']);
                    }
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
                                else {
                                    if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                        if ($cek2['data'] != null) {
                                            $datanotif2[] = $cek2['data'];
                                        }
                                    } else {
                                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                                    }
                                }
                            }
                        }
                        $header['notif2'] = $datanotif2;
                    } else {
                        $this->session->set_flashdata("errorAPI", $notif2['message']);
                    }
                }
                if ($null)
                    $this->load->view("server_error");
                else {
                    $this->load->view('partials/user/header', $header);
                    if ($data['materiKegiatan'] == null || $data['kegiatan'] == null || $data['kelas'] == null)
                        $this->load->view('classes/error_class', $data);
                    else
                        $this->load->view('classes/video_kelas', $data);
                    $this->load->view('partials/user/footer');
                    $this->session->set_userdata('workshop', null);
                }
            } else {
                if ($null)
                    $this->load->view("server_error");
                else {
                    $this->load->view('partials/common/header');
                    if ($data['materiKegiatan'] == null || $data['kegiatan'] == null || $data['kelas'] == null)
                        $this->load->view('classes/error_class', $data);
                    else
                        $this->load->view('classes/video_kelas', $data);
                    $this->load->view('partials/common/footer');
                    $this->session->set_userdata('workshop', null);
                }
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
        $null = false;

        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            $this->session->set_flashdata('message', "Please log in first!");
            if ($this->session->userdata('workshop') != null) {
                redirect('workshops/open_workshop/' . $classId);
            } else {
                redirect("class/$classId");
            }
        }

        if ($this->session->userdata('workshop') != null) {
            $classDetail = $this->Workshops_model->getClassById($classId);
            if ($classDetail == null)
                $null = true;
            else {
                if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                    $classDetail = $classDetail['data'];
                    $isClassOwner = $classDetail['data']['pembuat_workshop'] == $userId;
                } else
                    $this->session->set_flashdata("errorAPI", $classDetail['message']);
            }

            $isClassMember = $this->Workshops_model->getPesertaByUserIdClassId($classId);
            if ($isClassMember == null)
                $null = true;
            else {
                if ($isClassMember['status'] == 200 || $isClassMember['status'] == 202) {
                    $isClassMember = $isClassMember['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $isClassMember['message']);
            }
        } else {
            $classDetail = $this->Classes_model->getClassById($classId);
            if ($classDetail == null)
                $null = true;
            else {
                if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                    $classDetail = $classDetail['data'];
                    $isClassOwner = $classDetail['data']['pembuat_kelas'] == $userId;
                } else
                    $this->session->set_flashdata("errorAPI", $classDetail['message']);
            }

            $isClassMember = $this->Classes_model->getPesertaByUserIdClassId($classId);
            if ($isClassMember == null)
                $null = true;
            else {
                if ($isClassMember['status'] == 200 || $isClassMember['status'] == 202) {
                    $isClassMember = $isClassMember['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $isClassMember['message']);
            }
        }

        if (!$null) {
            if (!$isClassOwner && !$isClassMember) {
                $this->session->set_flashdata('message', "You're not a member of this class!");
                if ($this->session->userdata('workshop') != null) {
                    redirect('workshops/open_workshop/' . $classId);
                } else {
                    redirect("class/$classId");
                }
            }
        }

        if ($this->session->userdata('workshop') != null) {
            $classActivity = $this->Workshops_model->getKegiatanByIdKegiatan($activityId);
            if ($classActivity == null)
                $null = true;
            else {
                if ($classActivity['status'] == 200 || $classActivity['status'] == 202) {
                    $classActivity = $classActivity['data'][0];
                } else
                    $this->session->set_flashdata("errorAPI", $classActivity['message']);
            }
        } else {
            $classActivity = $this->Classes_model->getKegiatanByIdKegiatan($activityId);
            if ($classActivity == null)
                $null = true;
            else {
                if ($classActivity['status'] == 200 || $classActivity['status'] == 202) {
                    $classActivity = $classActivity['data'][0];
                } else
                    $this->session->set_flashdata("errorAPI", $classActivity['message']);
            }
        }

        if ($null)
            $this->load->view('server_error');
        else {
            if ($isClassOwner) {
                $this->startClassActivity($classDetail, $classActivity);
            } else {
                $this->joinClassActivity($classDetail, $classActivity);
            }
        }
    }

    public function startClassActivity($classDetail, $classActivity)
    {
        $null = false;

        if ($this->session->userdata('workshop') != null)
            $classId = $classDetail['id_workshop'];
        else
            $classId = $classDetail['id_kelas'];

        $activityId = $classActivity['id_kegiatan'];


        if ($this->session->userdata('workshop') != null) {
            $updateStatusWorkshop = $this->Workshops_model->updateKegiatanStatus($activityId, CLASS_STARTED);
            if ($updateStatusWorkshop == null)
                $null == true;
            else {
                if ($updateStatusWorkshop['status'] != 200) {
                    $this->session->set_flashdata('message', 'Failed to start the workshop!');
                    redirect('workshops/open_workshop/' . $classId);
                }
            }
        } else {
            $updateStatusClass = $this->Classes_model->updateKegiatanStatus($activityId, CLASS_STARTED);
            if ($updateStatusClass == null)
                $null == true;
            else {
                if ($updateStatusClass['status'] != 200) {
                    $this->session->set_flashdata('message', 'Failed to start the class!');
                    redirect("class/$classId");
                }
            }
        }

        if ($this->session->userdata('workshop') != null) {
            $classId = $classDetail['id_workshop'];
            $classMember = $this->Workshops_model->getPesertaByClassId($classId);
            if ($classMember == null)
                $null = true;
            else {
                if ($classMember['status'] == 200 || $classMember['status'] == 202) {
                    $classMember = $classMember['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $classMember['message']);
            }

            $classOwner = $this->Workshops_model->getUserDetail($classDetail['pembuat_workshop']);
            if ($classOwner == null)
                $null = true;
            else {
                if ($classOwner['status'] == 200 || $classOwner['status'] == 202) {
                    $classOwner = $classOwner['data'][0];
                } else
                    $this->session->set_flashdata("errorAPI", $classOwner['message']);
            }

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
            if ($classMember == null)
                $null = true;
            else {
                if ($classMember['status'] == 200 || $classMember['status'] == 202) {
                    $classMember = $classMember['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $classMember['message']);
            }

            $classOwner = $this->Classes_model->getUserDetail($classDetail['pembuat_kelas']);
            if ($classOwner == null)
                $null = true;
            else {
                if ($classOwner['status'] == 200 || $classOwner['status'] == 202) {
                    $classOwner = $classOwner['data'][0];
                } else
                    $this->session->set_flashdata("errorAPI", $classOwner['message']);
            }

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
        if ($null)
            $this->load->view("server_error");
        else
            $this->load->view('iframe/elearning', $data);
    }

    public function closeClassActivity($classId, $activityId)
    {
        $null = false;

        if ($this->session->userdata('workshop') != null) {

            $userId = $this->session->userdata('id_user');
            $classDetail = $this->Workshops_model->getClassById($classId);
            if ($classDetail == null)
                $null = true;
            else {
                if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                    $classDetail = $classDetail['data'];
                    $isClassOwner = $classDetail['pembuat_workshop'] == $userId;
                } else
                    $this->session->set_flashdata("errorAPI", $classDetail['message']);
            }
        } else {
            $userId = $this->session->userdata('id_user');
            $classDetail = $this->Classes_model->getClassById($classId);
            if ($classDetail == null)
                $null = true;
            else {
                if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                    $classDetail = $classDetail['data'];
                    $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
                } else
                    $this->session->set_flashdata("errorAPI", $classDetail['message']);
            }
        }

        if (!$null) {
            if (!$isClassOwner) {
                $this->session->set_flashdata('message', "You're not the owner of this class!");
                redirect("class/$classId/$activityId");
            }
        }

        $updateStatusClass = $this->Classes_model->updateKegiatanStatus($activityId, CLASS_FINISHED);
        if ($updateStatusClass == null)
            $null == true;
        else {
            if ($updateStatusClass['status'] != 200) {
                $this->session->set_flashdata('message', 'Failed to end the class!');
                redirect("class/$classId/$activityId");
            }
        }

        $updateStatusWorkshop = $this->Workshops_model->updateKegiatanStatus($activityId, CLASS_FINISHED);
        if ($updateStatusWorkshop == null)
            $null == true;
        else {
            if ($updateStatusWorkshop['status'] != 200) {
                $this->session->set_flashdata('message', 'Failed to end the workshop!');
                redirect("class/$classId/$activityId");
            }
        }

        if ($this->session->userdata('workshop') != null) {
            if ($null)
                $this->load->view("server_error");
            else
                redirect('workshops/open_workshop/' . $classId);
        } else {
            if ($null)
                $this->load->view("server_error");
            else
                redirect("class/$classId");
        }
    }

    public function joinClassActivity($classDetail, $classActivity)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        if ($this->session->userdata('workshop') != null) {
            $userDetail = $this->Workshops_model->getUserDetail($userId);
            if ($userDetail == null)
                $null = true;
            else {
                if ($userDetail['status'] == 200 || $userDetail['status'] == 202) {
                    $userDetail = $userDetail['data'][0];
                } else
                    $this->session->set_flashdata("errorAPI", $userDetail['message']);
            }
        } else {
            $userDetail = $this->Classes_model->getUserDetail($userId);
            if ($userDetail == null)
                $null = true;
            else {
                if ($userDetail['status'] == 200 || $userDetail['status'] == 202) {
                    $userDetail = $userDetail['data'][0];
                } else
                    $this->session->set_flashdata("errorAPI", $userDetail['message']);
            }
        }

        if (!$null) {
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
        }
        if ($null)
            $this->load->view('server_error');
        else
            $this->load->view('iframe/elearning', $data);
    }

    public function update_class($id_kelas)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);;
        }

        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }

        $data['kategori'] = $this->Classes_model->getKategori();
        if ($data['kategori'] == null)
            $null = true;
        else {
            if ($data['kategori']['status'] == 200 || $data['kategori']['status'] == 202) {
                $data['kategori'] = $data['kategori']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kategori']['message']);
        }

        $data['jenis'] = $this->Classes_model->getJenis();
        if ($data['jenis'] == null)
            $null = true;
        else {
            if ($data['jenis']['status'] == 200 || $data['jenis']['status'] == 202) {
                $data['jenis'] = $data['jenis']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['jenis']['message']);
        }

        $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
        if ($data['kelas'] == null)
            $null = true;
        else {
            if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202) {
                $tempkelas[] = $data['kelas']['data'];
                $data['kelas'] = $tempkelas;
            } else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
        }

        $data['pembuat'] = $this->Classes_model->getMyName();
        if ($data['pembuat'] == null)
            $null = true;
        else {
            if ($data['pembuat']['status'] == 200 || $data['pembuat']['status'] == 202) {
                $data['pembuat']['nama'] = $data['pembuat']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);
        }

        $header['nama'] = $this->Classes_model->getMyName();
        if ($header['nama'] == null)
            $null = true;
        else {
            if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202) {
                $header['nama'] = explode(" ", $header['nama']['data']);
            } else
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
                            if ($cek['status'] == 200 || $cek['status'] == 202) {
                                if ($cek['data'] != null) {
                                    $datanotif[] = $cek['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek['message']);
                            }
                        }
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }
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
                        else {
                            if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                if ($cek2['data'] != null) {
                                    $datanotif2[] = $cek2['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek2['message']);
                            }
                        }
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }
        }

        if ($null)
            $this->load->view("server_error");
        else {
            $this->load->view('partials/user/header', $header);
            $this->load->view('classes/update_class', $data);
            $this->load->view('partials/user/footer');
        }
    }

    public function update_class_action($id_kelas)
    {
        $null = false;

        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }

        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }
        $updateClass = $this->Classes_model->updateClass($id_kelas);
        if ($updateClass == 'server_error')
            $null = true;
        else {
            if ($updateClass == "error") {
                $this->session->set_flashdata("invalidImage", "Invalid image size/type");
                if ($null)
                    $this->load->view("server_error");
                else
                    redirect("classes/update_class/" . $id_kelas);
            } else
                $this->session->set_flashdata("errorAPI", $updateClass['message']);
        }


        if ($null)
            $this->load->view("server_error");
        else
            redirect('classes/open_class/' . $id_kelas);
    }

    public function set_kegiatan($id_kelas, $redirect = null)
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {
            $kegiatan = $this->Classes_model->setKegiatanByClass($id_kelas);
            if ($kegiatan == 'server_error')
                $null = true;
            else {
                if ($kegiatan == "success") {
                    $this->session->set_flashdata("success", "Jadwal Kegiatan anda berhasil di tambah!");
                } else if ($kegiatan == "error") {
                    $this->session->set_flashdata("invalidFile", $kegiatan['data'] . " (only pdf, doc, ppt). Max Size : 25MB");
                }
            }
            if ($redirect == "akademik") {
                if ($null)
                    $this->load->view("server_error");
                else
                    redirect('classes/my_classes');
            }

            if ($null)
                $this->load->view("server_error");
            else
                redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function edit_kegiatan($id_kelas, $id_kegiatan, $redirect = null)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }

        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }

        $kegiatan = $this->Classes_model->updateKegiatan($id_kelas, $id_kegiatan);
        var_dump($kegiatan);
        die;
        if ($kegiatan == 'server_error')
            $null = true;
        else {

            if ($kegiatan == "success") {
                $this->session->set_flashdata("success", "Jadwal Kegiatan anda berhasil di tambah!");
            } else if ($kegiatan == "error") {
                $this->session->set_flashdata("invalidFile", $kegiatan['data'] . "(only pdf, doc, ppt). Max Size : 25MB");
            }
        }

        if ($redirect == "akademik") {
            if ($null)
                $this->load->view("server_error");
            else
                redirect('classes/my_classes');
        }
        if ($null)
            $this->load->view("server_error");
        else
            redirect('classes/open_class/' . $id_kelas);
    }

    public function join_class($id_kelas)
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {
            $temp = $this->Classes_model->joinClass($id_kelas);
            if ($temp == null)
                $null = true;
            else {
                if ($temp['status'] != 200)
                    $this->session->set_flashdata("errorAPI", $temp['message']);
            }

            if ($null)
                $this->load->view("server_error");
            else
                redirect('classes/open_class/' . $id_kelas);
        } else {
            redirect('home');
        }
    }

    public function pembayaran_kelas($id_kelas)
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {
            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama'] == null)
                $null = true;
            else {
                if ($header['nama']['status'] == 200 || $header['nams']['status'] == 202) {
                    $header['nama'] = explode(" ", $header['nama']['data']);
                } else
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
                                if ($cek['status'] == 200 || $cek['status'] == 202) {
                                    if ($cek['data'] != null) {
                                        $datanotif[] = $cek['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek['message']);
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif['message']);
                }
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
                            else {
                                if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                    if ($cek2['data'] != null) {
                                        $datanotif2[] = $cek2['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
                }
            }

            if ($null)
                $this->load->view("server_error");
            else {
                $this->load->view('partials/user/header', $header);
                $this->load->view('classes/pembayaran', $id_kelas);
                $this->load->view('partials/user/footer');
            }
        } else {
            redirect('home');
        }
    }

    public function my_classes()
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {

            $data['seluruh_kelas'] = $this->Classes_model->getAllClasses();
            if ($data['seluruh_kelas'] == null)
                $null = true;
            else {
                if ($data['seluruh_kelas']['status'] == 200 || $data['seluruh_kelas']['status'] == 202) {
                    $data['seluruh_kelas'] = $data['seluruh_kelas']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['seluruh_kelas']['message']);
            }

            $data['seluruh_kelas2'] = $this->Workshops_model->getAllClasses();
            if ($data['seluruh_kelas2'] == null)
                $null = true;
            else {
                if ($data['seluruh_kelas2']['status'] == 200 || $data['seluruh_kelas2']['status'] == 202) {
                    $data['seluruh_kelas2'] = $data['seluruh_kelas2']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['seluruh_kelas2']['message']);
            }

            $data['kelas'] = $this->Classes_model->getMyClasses();
            if ($data['kelas'] == null)
                $null = true;
            else {
                if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202) {
                    if ($data['kelas']['data'] == null) {
                        $temp = array();
                        $data['kelas'] = $temp;
                    } else
                        $data['kelas'] = $data['kelas']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
            }

            $data['kelas2'] = $this->Workshops_model->getMyClasses();
            if ($data['kelas2'] == null)
                $null = true;
            else {
                if ($data['kelas2']['status'] == 200 || $data['kelas2']['status'] == 202) {
                    if ($data['kelas2']['data'] == null) {
                        $temp = array();
                        $data['kelas2'] = $temp;
                    } else
                        $data['kelas2'] = $data['kelas2']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['kelas2']['message']);
            }

            $data['kegiatan'] = $this->Classes_model->getAllKegiatan();
            if ($data['kegiatan'] == null)
                $null = true;
            else {
                if ($data['kegiatan']['status'] == 200 || $data['kegiatan']['status'] == 202) {
                    $data['kegiatan'] = $data['kegiatan']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['kegiatan']['message']);
            }

            $data['kegiatan2'] = $this->Workshops_model->getAllKegiatan();
            if ($data['kegiatan2'] == null)
                $null = true;
            else {
                if ($data['kegiatan2']['status'] == 200 || $data['kegiatan2']['status'] == 202) {
                    $data['kegiatan2'] = $data['kegiatan2']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['kegiatan2']['message']);
            }

            $data['pembuat'] = $this->Classes_model->getPembuat();
            if ($data['pembuat'] == null)
                $null = true;
            else {
                if ($data['pembuat']['status'] == 200 || $data['pembuat']['status'] == 202) {
                    $data['pembuat'] = $data['pembuat']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['pembuat']['message']);
            }

            $data['status'] = $this->Classes_model->getStatus();
            if ($data['status'] == null)
                $null = true;
            else {
                if ($data['status']['status'] == 200 || $data['status']['status'] == 202) {
                    $data['status'] = $data['status']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['status']['message']);
            }

            $data['status2'] = $this->Workshops_model->getStatus();
            if ($data['status2'] == null)
                $null = true;
            else {
                if ($data['status2']['status'] == 200 || $data['status2']['status'] == 202) {
                    $data['status2'] = $data['status2']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['status2']['message']);
            }

            $data['peserta'] = $this->Classes_model->getPeserta();
            if ($data['peserta'] == null)
                $null = true;
            else {
                if ($data['peserta']['status'] == 200 || $data['peserta']['status'] == 202) {
                    $data['peserta'] = $data['peserta']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['peserta']['message']);
            }

            $data['peserta2'] = $this->Workshops_model->getPeserta();
            if ($data['peserta2'] == null)
                $null = true;
            else {
                if ($data['peserta2']['status'] == 200 || $data['peserta2']['status'] == 202) {
                    $data['peserta2'] = $data['peserta2']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['peserta2']['message']);
            }

            $data['materi2'] = $this->Classes_model->getMateriAll();
            if ($data['materi2'] == null)
                $null = true;
            else {
                if ($data['materi2']['status'] == 200 || $data['materi2']['status'] == 202) {
                    $data['materi2'] = $data['materi2']['data'];
                } else
                    $this->session->set_flashdata("errorAPI", $data['materi2']['message']);
            }

            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama'] == null)
                $null = true;
            else {
                if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202) {
                    $header['nama'] = explode(" ", $header['nama']['data']);
                    $data['nama'] = $header['nama'];
                } else
                    $this->session->set_flashdata("errorAPI", $header['nama']['message']);
            }

            $notif = $this->Classes_model->getPesertaByUserId();
            if ($notif == null)
                $null = true;
            else {
                if ($notif['status'] == 200 || $notif['status'] == 202) {

                    $datanotif = array();
                    $datatugas = array();
                    $datakelas = array();
                    $datamateri = array();
                    $datakegiatansaya = array();
                    $datakegiatandiikuti = array();
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
                            }

                            $tugas = $this->Classes_model->getTugasByClassId($value['id_kelas']);

                            if ($tugas == null)
                                $null = true;
                            else {
                                if ($tugas['status'] == 200 || $tugas['status'] == 202)
                                    $tugas = $tugas['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $tugas['message']);
                            }

                            $kelas = $this->Classes_model->getClassById($value['id_kelas']);
                            if ($kelas == null)
                                $null = true;
                            else {
                                if ($kelas['status'] == 200 || $kelas['status'] == 202)
                                    $kelas = $kelas['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $kelas['message']);
                            }

                            $materi = $this->Classes_model->getMateriByClassId($value['id_kelas']);
                            if ($materi == null)
                                $null = true;
                            else {
                                if ($materi['status'] == 200 || $materi['status'] == 202)
                                    $materi = $materi['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $materi['message']);
                            }

                            $kegiatandiikuti = $this->Classes_model->getKegiatan($value['id_kelas']);
                            if ($kegiatandiikuti == null)
                                $null = true;
                            else {
                                if ($kegiatandiikuti['status'] == 200 || $kegiatandiikuti['status'] == 202)
                                    $kegiatandiikuti = $kegiatandiikuti['data'];
                                else
                                    $this->session->set_flashdata("errorAPI", $kegiatandiikuti['message']);
                            }

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
                    }
                    $data['kegiatan_diikuti'] = $datakegiatandiikuti;
                    $header['notif'] = $datanotif;
                    $data['notif'] = $datanotif;
                    $data['tugas'] = $datatugas;
                    $data['kelas_tugas'] = $datakelas;
                    $data['materi'] = $datamateri;
                }
            }
            if (!$null) {
                if ($data['kelas'] != null) {
                    foreach ($data['kelas'] as $value) {
                        $kegiatansaya = $this->Classes_model->getKegiatan($value['id_kelas']);
                        if ($data['seluruh_kelas'] == null)
                            $null = true;
                        else {
                            if ($kegiatansaya['status'] == 200 || $kegiatansaya['status'] == 202) {
                                $kegiatansaya = $kegiatansaya['data'];
                            } else
                                $this->session->set_flashdata("errorAPI", $kegiatansaya['message']);

                            if ($kegiatansaya != null) {
                                $datakegiatansaya[] = $kegiatansaya;
                            }
                        }
                    }
                }
                $data['kegiatan_saya'] = $datakegiatansaya;
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
                            else {
                                if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                    if ($cek2['data'] != null) {
                                        $datanotif2[] = $cek2['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
                }
            }


            if (!$null) {
                $datacek = array();
                foreach ($data['tugas'] as $value) {
                    foreach ($value as $value2) {
                        $cek = $this->Classes_model->cekTugas($value2['id_tugas']);
                        if ($cek == null)
                            $null = true;
                        else {
                            if ($cek['status'] == 200 || $cek['status'] == 202) {
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
                }

                $data['cek'] = $datacek;
            }

            $data['submit'] = $this->Classes_model->getSubmit();
            if ($data['submit'] == null)
                $null = true;
            else {
                if ($data['submit']['status'] == 200 || $data['submit']['status'] == 202)
                    $data['submit'] = $data['submit']['data'];
                else
                    $this->session->set_flashdata("errorAPI", $data['submit']['message']);
            }

            if ($null)
                $this->load->view("server_error");
            else {
                $this->load->view('partials/user/header', $header);
                $this->load->view('classes/my_classes', $data);
                $this->load->view('partials/user/footer');
            }
        } else {
            redirect('home');
        }
    }

    public function leave_class($id_kelas)
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {
            $temp = $this->Classes_model->leaveClass($id_kelas);
            if ($temp == null)
                $null = true;
            else {
                if ($temp['status'] != 200) {
                    $this->session->set_flashdata("errorAPI", $temp['message']);
                }
            }

            if ($null)
                $this->load->view("server_error");
            else
                redirect('classes/my_classes');
        } else {
            redirect('home');
        }
    }

    public function index()
    {
        $null = false;
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama'] == null)
                $null = true;
            else {
                if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202) {
                    $header['nama'] = explode(" ", $header['nama']['data']);
                } else
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
                                if ($cek['status'] == 200 || $cek['status'] == 202) {
                                    if ($cek['data'] != null) {
                                        $datanotif[] = $cek['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek['message']);
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif['message']);
                }
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
                            else {
                                if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                    if ($cek2['data'] != null) {
                                        $datanotif2[] = $cek2['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
                }
            }

            if (!$null)
                $this->load->view('partials/user/header', $header);
        }

        $data['categories'] = $this->Classes_model->getKategori();
        if ($data['categories'] == null)
            $null = true;
        else {
            if ($data['categories']['status'] == 200 || $data['categories']['status'] == 202) {
                $data['categories'] = $data['categories']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['categories']['message']);
        }

        $data['class'] = $this->Classes_model->getAllRandomClasses();
        if ($data['class'] == null)
            $null = true;
        else {
            if ($data['class']['status'] == 200 || $data['class']['status'] == 202) {
                $data['class'] = $data['class']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['class']['message']);
        }

        $data['classNum'] = $this->Classes_model->getAllClassesDetail();
        if ($data['classNum'] == null)
            $null = true;
        else {
            if ($data['classNum']['status'] == 200 || $data['classNum']['status'] == 202) {
                $data['classNum'] = count($data['classNum']['data']);
            } else
                $this->session->set_flashdata("errorAPI", $data['classNum']['message']);
        }


        if ($null)
            $this->load->view('server_error');
        else {
            if (!isset($_SESSION['logged_in']))
                $this->load->view('partials/common/header');

            $this->session->set_userdata('workshop', null);
            $this->load->view('classes/kelasview', $data);
            $this->load->view('partials/common/footer');
        }
    }

    public function set_sess()
    {
        $this->session->set_userdata('workshop', null);
    }

    public function categories($kategori)
    {
        $null = false;
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama'] == null)
                $null = true;
            else {
                if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202) {
                    $header['nama'] = explode(" ", $header['nama']['data']);
                } else
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
                                if ($cek['status'] == 200 || $cek['status'] == 202) {
                                    if ($cek['data'] != null) {
                                        $datanotif[] = $cek['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek['message']);
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif['message']);
                }
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
                            else {
                                if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                    if ($cek2['data'] != null) {
                                        $datanotif2[] = $cek2['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
                }
            }

            if (!$null)
                $this->load->view('partials/user/header', $header);
        }

        $data['kategori_text'] = $kategori;

        $data['categories'] = $this->Classes_model->getKategori();
        if ($data['categories'] == null)
            $null = true;
        else {
            if ($data['categories']['status'] == 200 || $data['categories']['status'] == 202) {
                $data['categories'] = $data['categories']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['categories']['message']);
        }

        $data['class'] = $this->Classes_model->getClassesbyCategories($kategori);
        if ($data['class'] == null)
            $null = true;
        else {
            if ($data['class']['status'] == 200 || $data['class']['status'] == 202) {
                $data['class'] = $data['class']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['class']['message']);
        }

        $data['classNum'] = $this->Classes_model->getClassesbyCategories($kategori);
        if ($data['classNum'] == null)
            $null = true;
        else {
            if ($data['classNum']['status'] == 200 || $data['classNum']['status'] == 202) {
                $data['classNum'] = count($data['classNum']['data']);
            } else
                $this->session->set_flashdata("errorAPI", $data['classNum']['message']);
        }

        if ($null)
            $this->load->view("server_error");
        else {

            if (!isset($_SESSION['logged_in']))
                $this->load->view('partials/common/header');

            $this->load->view('classes/kelasfilter', $data);
            $this->load->view('partials/common/footer');
        }
    }

    public function sort($sorting)
    {
        $null = false;
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama'] == null)
                $null = true;
            else {
                if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202) {
                    $header['nama'] = explode(" ", $header['nama']['data']);
                } else
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
                                if ($cek['status'] == 200 || $cek['status'] == 202) {
                                    if ($cek['data'] != null) {
                                        $datanotif[] = $cek['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek['message']);
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif['message']);
                }
            }

            $notif2 = $this->Workshops_model->getPesertaByUserId();
            if ($notif2 == null)
                $null = true;
            else {
                if ($notif2['status'] == 200 || $notif2['status'] == 202) {
                    $datanotif2 = array();
                    if ($notif2 != null) {
                        foreach ($notif2['data'] as $value) {
                            $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                            if ($cek2 == null)
                                $null = true;
                            else {
                                if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                    if ($cek2['data'] != null) {
                                        $datanotif2[] = $cek2['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
                }
            }

            if (!$null)
                $this->load->view('partials/user/header', $header);
        }

        $data['kategori_text'] = $sorting;

        $data['categories'] = $this->Classes_model->getKategori();
        if ($data['categories'] == null)
            $null = true;
        else {
            if ($data['categories']['status'] == 200 || $data['categories']['status'] == 202) {
                $data['categories'] = $data['categories']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['categories']['message']);
        }

        $data['class'] = $this->Classes_model->getClassesbySorting($sorting);
        if ($data['class'] == null)
            $null = true;
        else {
            if ($data['class']['status'] == 200 || $data['class']['status'] == 202) {
                $data['class'] = $data['class']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['class']['message']);
        }

        $data['classNum'] = $this->Classes_model->getClassesbySorting($sorting);
        if ($data['classNum'] == null)
            $null = true;
        else {
            if ($data['classNum']['status'] == 200 || $data['classNum']['status'] == 202) {
                $data['classNum'] = count($data['classNum']['data']);
            } else
                $this->session->set_flashdata("errorAPI", $data['classNum']['message']);
        }

        if ($null)
            $this->load->view("server_error");
        else {

            if (!isset($_SESSION['logged_in']))
                $this->load->view('partials/common/header');

            $this->load->view('classes/kelasfilter', $data);
            $this->load->view('partials/common/footer');
        }
    }

    public function search()
    {
        $null = false;
        if (isset($_SESSION['logged_in'])) {
            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama'] == null)
                $null = true;
            else {
                if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202) {
                    $header['nama'] = explode(" ", $header['nama']['data']);
                } else
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
                                if ($cek['status'] == 200 || $cek['status'] == 202) {
                                    if ($cek['data'] != null) {
                                        $datanotif[] = $cek['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek['message']);
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif['message']);
                }
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
                            else {
                                if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                    if ($cek2['data'] != null) {
                                        $datanotif2[] = $cek2['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
                }
            }

            $this->load->view('partials/user/header', $header);
        }

        $data['kategori_text'] = "Pencarian";
        $data['keyword'] = $this->input->post('keyword');

        $data['categories'] = $this->Classes_model->getKategori();
        if ($data['categories'] == null)
            $null = true;
        else {
            if ($data['categories']['status'] == 200 || $data['categories']['status'] == 202) {
                $data['categories'] = $data['categories']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['categories']['message']);
        }

        $data['class'] = $this->Classes_model->getAllClassesDetail($data['keyword']);
        if ($data['class'] == null)
            $null = true;
        else {
            if ($data['class']['status'] == 200 || $data['class']['status'] == 202) {
                $data['class'] = $data['class']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['class']['message']);
        }

        $data['classNum'] = count($this->Classes_model->getAllClassesDetail($data['keyword']));
        if ($data['classNum'] == null)
            $null = true;
        else {
            if ($data['classNum']['status'] == 200 || $data['classNum']['status'] == 202) {
                $data['classNum'] = count($data['classNum']['data']);
                if (count($data['classNum']) == 0) {
                    $data['tidak_ketemu'] = "Kelas yang anda cari tidak ada.";
                }
            } else
                $this->session->set_flashdata("errorAPI", $data['classNum']['message']);
        }

        if ($null)
            $this->load->view("server_error");
        else {
            if (isset($_SESSION['logged_in']))
                $this->load->view('partials/common/header');
            $this->load->view('classes/kelasfilter', $data);
            $this->load->view('partials/common/footer');
        }
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

    public function hapus_materi($id_kelas, $id_materi, $redirect = null)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200 || $classDetail['status'] == 202)
                $classDetail = $classDetail['data'];
            $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
        }

        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }

        $temp = $this->Classes_model->delMateri($id_materi);
        if ($temp == null)
            $null = true;
        else {
            if ($temp['status'] != 200)
                $this->session->set_flashdata("errorAPI", $temp['message']);
        }

        if ($redirect == "akademik") {
            if ($null)
                $this->load->view("server_error");
            else
                redirect("classes/my_classes");
        }

        if ($null)
            $this->load->view("server_error");
        else
            redirect('classes/open_class/' . $id_kelas);
    }

    // sampe sini yhh

    public function list_assignment($id_kelas)
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {

            $data['tugas'] = $this->Classes_model->getTugasByClassId($id_kelas);
            if ($data['tugas'] == null)
                $null = true;
            else {
                if ($data['tugas']['status'] == 200 || $data['tugas']['status'] == 202) {
                    $datacek = array();
                    foreach ($data['tugas']['data'] as $value) {
                        $cek = $this->Classes_model->cekTugas($value['id_tugas']);
                        if ($cek == null)
                            $null = true;
                        else {
                            if ($cek['status'] == 200 || $cek['status'] == 202)
                                $cek = $cek['data'];
                            else
                                $this->session->set_flashdata("errorAPI", $cek['message']);
                            if ($cek == null) {
                                $datacek[] = null;
                            } else {
                                $datacek[] = $cek;
                            }
                        }
                    }
                    $data['cek'] = $datacek;
                } else
                    $this->session->set_flashdata("errorAPI", $data['tugas']['message']);
            }

            $data['submit'] = $this->Classes_model->getSubmit();
            if ($data['submit'] == null)
                $null = true;
            else {
                if ($data['submit']['status'] == 200 || $data['submit']['status'] == 202)
                    $data['submit'] = $data['submit']['data'];
                else
                    $this->session->set_flashdata("errorAPI", $data['submit']['message']);
            }

            $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
            if ($data['kelas'] == null)
                $null = true;
            else {
                if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202)
                    $data['kelas'] = $data['kelas']['data'];
                else
                    $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
            }

            $header['nama'] = $this->Classes_model->getMyName();
            if ($header['nama'] == null)
                $null = true;
            else {
                if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202) {
                    $header['nama'] = explode(" ", $header['nama']['data']);
                } else
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
                                if ($cek['status'] == 200 || $cek['status'] == 202) {
                                    if ($cek['data'] != null) {
                                        $datanotif[] = $cek['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek['message']);
                                }
                            }
                        }
                    }
                    $header['notif'] = $datanotif;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif['message']);
                }
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
                            else {
                                if ($cek2['status'] == 200 || $data['categories']['status'] == 202) {
                                    if ($cek2['data'] != null) {
                                        $datanotif2[] = $cek2['data'];
                                    }
                                } else {
                                    $this->session->set_flashdata("errorAPI", $cek2['message']);
                                }
                            }
                        }
                    }
                    $header['notif2'] = $datanotif2;
                } else {
                    $this->session->set_flashdata("errorAPI", $notif2['message']);
                }
            }
            // $this->load->view('partialsuser/header',$header);
            if ($null)
                $this->load->view("server_error");
            else
                $this->load->view('classes/list_assignment', $data);
            // $this->load->view('partialsuser/footer');
        } else {
            redirect('home');
        }
    }



    public function new_assignment($id_kelas)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }
        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }

        $data['kategori'] = $this->Classes_model->getKategoriTugas();
        if ($data['kategori'] == null)
            $null = true;
        else {
            if ($data['kategori']['status'] == 200 || $data['kategori']['status'] == 202) {
                $data['kategori'] = $data['kategori']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kategori']['message']);
        }

        $data['id'] = $id_kelas;

        $header['nama'] = $this->Classes_model->getMyName();
        if ($header['nama'] == null)
            $null = true;
        else {
            if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202) {
                $header['nama'] = explode(" ", $header['nama']['data']);
            } else
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
                            if ($cek['status'] == 200 || $cek['status'] == 202) {
                                if ($cek['data'] != null) {
                                    $datanotif[] = $cek['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek['message']);
                            }
                        }
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }
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
                        else {
                            if ($cek2['status'] == 200) {
                                if ($cek2['data'] != null) {
                                    $datanotif2[] = $cek2['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek2['message']);
                            }
                        }
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }
        }

        if ($null)
            $this->load->view("server_error");
        else {
            $this->load->view('partials/user/header', $header);
            $this->load->view('classes/new_assignment', $data);
            $this->load->view('partials/user/footer');
        }
    }

    public function new_assignment_action($id_kelas)
    {
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas);

        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            }
        }
        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }

        $status = $this->Classes_model->createAssignment($id_kelas);
        if ($status == 'server_error')
            $null = true;
        else {
            if ($status == 'error') {
                $this->session->set_flashdata("failedInputFile", "$status (Maz Size: 25 MB) (.pdf, .doc, .docx only)");
                if ($null)
                    $this->load->view("server_error");
                else
                    redirect('classes/new_assignment/' . $id_kelas);
            }
        }

        if ($null)
            $this->load->view('server_error');
        else
            redirect('classes/list_tugas/' . $id_kelas);
    }

    public function collect_assignment($id_kelas, $id_tugas, $redirect = null)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }
        $deadline = $this->Classes_model->getDeadlineTugas($id_tugas);
        if ($deadline == null)
            $null = true;
        else {
            if ($deadline['status'] == 200 || $deadline['status'] == 202) {
                $deadline = $deadline['data'];
            } else
                $this->session->set_flashdata("errorAPI", $deadline['message']);
        }

        $status = $this->Classes_model->collectAssignment($id_tugas, $deadline);
        if ($status == 'server_error')
            $null = true;
        else {
            if ($status == "error") {
                $this->session->set_flashdata("failedInputFile", "File (Maz Size: 25 MB) (.pdf, .doc, .docx only)");
                redirect('classes/detail_tugaskuis/' . $id_kelas . '/' . $id_tugas);
            } else if ($status == 'success')
                $this->session->set_flashdata("success_kumpul", "Jawaban Berhasil dikumpulkan.");
            else
                $this->session->set_flashdata("errorAPI", $status);
        }
        if ($redirect == "akademik") {
            if ($null)
                $this->load->view("server_error");
            else
                redirect('classes/my_classes');
        }
        if ($null)
            $this->load->view("server_error");
        else
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
        $null = false;
        $temp = $this->Classes_model->deleteJawaban($id_submit);
        if ($temp == 'server_error')
            $null = true;
        else {
            if ($temp != 'success')
                $this->session->set_flashdata("errorAPI", $temp['message']);
        }

        if ($redirect == "akademik") {
            if ($null)
                $this->load->view('server_error');
            else
                redirect('classes/my_classes');
        }
        if ($null)
            $this->load->view('server_error');
        else
            redirect('classes/detail_tugaskuis/' . $id_kelas . '/' . $id_tugas);
    }

    public function edit_assignment($id_kelas, $id_tugas)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }

        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }

        $data['kategori'] = $this->Classes_model->getKategoriTugas();
        if ($data['kategori'] == null)
            $null = true;
        else {
            if ($data['kategori']['status'] == 200 || $data['kategori']['status'] == 202) {
                $data['kategori'] = $data['kategori']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kategori']['message']);
        }

        $data['tugas'] = $this->Classes_model->getTugasByTugasId($id_tugas);
        if ($data['tugas'] == null)
            $null = true;
        else {
            if ($data['tugas']['status'] == 200 || $data['tugas']['status'] == 202) {
                $data['tugas'] = $data['tugas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['tugas']['message']);
        }

        $data['id'] = $id_kelas;

        $header['nama'] = $this->Classes_model->getMyName();
        if ($header['nama'] == null)
            $null = true;
        else {
            if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202) {
                $header['nama'] = explode(" ", $header['nama']['data']);
            } else
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
                            if ($cek['status'] == 200 || $cek['status'] == 202) {
                                if ($cek['data'] != null) {
                                    $datanotif[] = $cek['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek['message']);
                            }
                        }
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }
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
                        else {
                            if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                if ($cek2['data'] != null) {
                                    $datanotif2[] = $cek2['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek2['message']);
                            }
                        }
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }
        }

        if ($null)
            $this->load->view("server_error");
        else {
            $this->load->view('partials/user/header', $header);
            $this->load->view('classes/edit_assignment', $data);
            $this->load->view('partials/user/footer');
        }
    }

    public function edit_assignment_action($id_kelas, $id_tugas)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }

        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }

        $status = $this->Classes_model->updateAssignment($id_tugas);
        if ($status == 'server_error')
            $null = true;
        else {
            if ($status == 'error') {
                $this->session->set_flashdata("failedInputFile", "$status (Maz Size: 25 MB) (.pdf, .doc, .docx only)");
                if ($null)
                    $this->load->view("server_error");
                else
                    redirect('classes/edit_assignment/' . $id_kelas . '/' . $id_tugas);
            }
        }
        if ($null)
            $this->load->view('server_error');
        else
            redirect('classes/list_tugas/' . $id_kelas);
    }

    public function del_assignment($id_kelas, $id_tugas)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }
        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }
        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }

        $temp = $this->Classes_model->deleteAssignment($id_tugas);
        if ($temp == null)
            $null = true;
        else {
            if ($temp['status'] != 200)
                $this->session->set_flashdata("errorAPI", $temp['message']);
        }
        if ($null)
            $this->load->view('server_error');
        else
            redirect('classes/list_tugas/' . $id_kelas);
    }

    public function update_nilai($id_kelas, $id_tugas, $id_submit)
    {
        $null = false;
        if (isset($this->session->userdata['logged_in'])) {
            $temp = $this->Classes_model->updateNilai($id_submit);
            if ($temp == null)
                $null = true;
            else {
                if ($temp['status'] == 200)
                    $this->session->set_flashdata("successUpdateNilai", "$id_submit");
                else
                    $this->session->set_flashdata("errorAPI", $temp['message']);
            }

            if ($null)
                $this->load->view('server_error');
            else
                redirect('classes/detail_tugaskuisguru/' . $id_kelas . '/' . $id_tugas);
        } else {
            redirect('home');
        }
    }

    public function list_tugas($id_kelas)
    {
        $null = false;

        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }

        if (!$null) {
            if ($isClassOwner) {

                $data['tugas'] = $this->Classes_model->getTugasByClassId($id_kelas);
                if ($data['tugas'] == null)
                    $null = true;
                else {
                    if ($data['tugas']['status'] == 200 || $data['tugas']['status'] == 202) {
                        $datacek = array();
                        if ($data['tugas']['data'] != null) {
                            foreach ($data['tugas']['data'] as $value) {
                                $cek = $this->Classes_model->cekTugas($value['id_tugas']);
                                if ($cek == null)
                                    $null = true;
                                else {
                                    if ($cek['status'] == 200 || $cek['status'] == 202)
                                        $cek = $cek['data'];
                                    else
                                        $this->session->set_flashdata("errorAPI", $cek['message']);

                                    if ($cek == null) {
                                        $datacek[] = null;
                                    } else {
                                        $datacek[] = $cek;
                                    }
                                }
                            }
                        }
                        $data['cek'] = $datacek;
                    } else
                        $this->session->set_flashdata("errorAPI", $data['tugas']['message']);
                }

                $data['submit'] = $this->Classes_model->getSubmit();
                if ($data['submit'] == null)
                    $null = true;
                else {
                    if ($data['submit']['status'] == 200 || $data['submit']['status'] == 202)
                        $data['submit'] = $data['submit']['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $data['submit']['message']);
                }

                $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
                if ($data['kelas'] == null)
                    $null = true;
                else {
                    if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202) {
                        $temp[] = $data['kelas']['data'];
                        $data['kelas'] = $temp;
                    } else
                        $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
                }

                $data['peserta'] = $this->Classes_model->getPesertaByClassId($id_kelas);
                if ($data['peserta'] == null)
                    $null = true;
                else {
                    if ($data['peserta']['status'] == 200 || $data['peserta']['status'] == 202)
                        $data['peserta'] = $data['peserta']['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $data['peserta']['message']);
                }

                $header['nama'] = $this->Classes_model->getMyName();
                if ($header['nama'] == null)
                    $null = true;
                else {
                    if ($header['nama']['status'] == 200 || $header['nama']['status'] == 202) {
                        $header['nama'] = explode(" ", $header['nama']['data']);
                    } else
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
                                    if (
                                        $cek['status'] == 200 || $cek['status'] == 200
                                    ) {
                                        if ($cek['data'] != null) {
                                            $datanotif[] = $cek['data'];
                                        }
                                    } else {
                                        $this->session->set_flashdata("errorAPI", $cek['message']);
                                    }
                                }
                            }
                        }
                        $header['notif'] = $datanotif;
                    } else {
                        $this->session->set_flashdata("errorAPI", $notif['message']);
                    }
                }

                $notif2 = $this->Workshops_model->getPesertaByUserId();
                if ($notif2 == null)
                    $null = true;
                else {
                    if (
                        $notif2['status'] == 200 || $notif2['status'] == 202
                    ) {
                        $datanotif2 = array();
                        if ($notif2['data'] != null) {
                            foreach ($notif2['data'] as $value) {
                                $cek2 = $this->Workshops_model->getKelasKegiatan($value['id_workshop']);
                                if ($cek2 == null)
                                    $null = true;
                                else {
                                    if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                        if ($cek2['data'] != null) {
                                            $datanotif2[] = $cek2['data'];
                                        }
                                    } else {
                                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                                    }
                                }
                            }
                        }
                        $header['notif2'] = $datanotif2;
                    } else {
                        $this->session->set_flashdata("errorAPI", $notif2['message']);
                    }
                }

                if ($null)
                    $this->load->view('server_error');
                else {
                    $this->load->view('partials/user/header', $header);
                    $this->load->view('classes/list_tugas', $data);
                    $this->load->view('partials/user/footer');
                }
            } else {
                $classDetail2 = $this->Classes_model->getPesertabyClass($id_kelas);
                if ($classDetail2 == null)
                    $null = true;
                else {
                    if ($classDetail2['status'] == 200 || $classDetail2['status'] == 202) {
                        $classDetail2 = $classDetail2['data'];
                        $isPeserta = $classDetail2['id_user'] == $userId;
                    } else
                        $this->session->set_flashdata("errorAPI", $classDetail2['message']);
                }
                if (!$null) {
                    if (!$isPeserta) {
                        redirect("home");
                    }
                }

                $data['tugas'] = $this->Classes_model->getTugasByClassId($id_kelas);
                if ($data['tugas'] == null)
                    $null = true;
                else {
                    if ($data['tugas']['status'] == 200 || $data['tugas']['status'] == 202) {
                        $datacek = array();
                        if ($data['tugas']['data'] != null) {
                            foreach ($data['tugas']['data'] as $value) {
                                $cek = $this->Classes_model->cekTugas($value['id_tugas']);
                                if ($cek == null)
                                    $null = true;
                                else {
                                    if ($cek['status'] == 200 || $cek['status'] == 202)
                                        $cek = $cek['data'];
                                    else
                                        $this->session->set_flashdata("errorAPI", $cek['message']);
                                    if ($cek == null) {
                                        $datacek[] = null;
                                    } else {
                                        $datacek[] = $cek;
                                    }
                                }
                            }
                        }
                        $data['cek'] = $datacek;
                    } else
                        $this->session->set_flashdata("errorAPI", $data['tugas']['message']);
                }

                $data['submit'] = $this->Classes_model->getSubmit();
                if ($data['submit'] == null)
                    $null = true;
                else {
                    if ($data['submit']['status'] == 200 || $data['submit']['status'] == 202)

                        $data['submit'] = $data['submit']['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $data['submit']['message']);
                }
                $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
                if ($data['kelas'] == null)
                    $null = true;
                else {
                    if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202) {

                        $temp[] = $data['kelas']['data'];
                        $data['kelas'] = $temp;
                    } else
                        $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
                }

                $data['peserta'] = $this->Classes_model->getPesertaByClassId($id_kelas);
                if ($data['peserta'] == null)
                    $null = true;
                else {
                    if ($data['peserta']['status'] == 200 || $data['peserta']['status'] == 202)
                        $data['peserta'] = $data['peserta']['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $data['peserta']['message']);
                }

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
                                    if ($cek['status'] == 200 || $cek['status'] == 202) {
                                        if ($cek['data'] != null) {
                                            $datanotif[] = $cek['data'];
                                        }
                                    } else {
                                        $this->session->set_flashdata("errorAPI", $cek['message']);
                                    }
                                }
                            }
                        }
                        $header['notif'] = $datanotif;
                    } else {
                        $this->session->set_flashdata("errorAPI", $notif['message']);
                    }
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
                                else {
                                    if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                        if ($cek2['data'] != null) {
                                            $datanotif2[] = $cek2['data'];
                                        }
                                    } else {
                                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                                    }
                                }
                            }
                        }
                        $header['notif2'] = $datanotif2;
                    } else {
                        $this->session->set_flashdata("errorAPI", $notif2['message']);
                    }
                }
            }

            if ($null)
                $this->load->view('server_error');
            else {
                $this->load->view('partials/user/header', $header);
                $this->load->view('classes/list_tugas', $data);
                $this->load->view('partials/user/footer');
            }
        }
    }

    public function detail_tugaskuis($id_kelas, $id_tugas)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }

        if (!$null) {
            if ($isClassOwner) {

                $data['tugas'] = $this->Classes_model->getTugasByTugasId($id_tugas);
                if ($data['tugas'] == null)
                    $null = true;
                else {
                    if ($data['tugas']['status'] == 200 || $data['tugas']['status'] == 202)
                        $data['tugas'] = $data['tugas']['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $data['tugas']['message']);
                }

                $data['cek'] = $this->Classes_model->cekTugas($data['tugas']['id_tugas']);
                if ($data['cek'] == null)
                    $null = true;
                else {
                    if ($data['cek']['status'] == 200 || $data['cek']['status'] == 202)
                        $data['cek'] = $data['cek']['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $data['cek']['message']);
                }

                $data['submit'] = $this->Classes_model->getSubmit();
                if ($data['submit'] == null)
                    $null = true;
                else {
                    if ($data['submit']['status'] == 200 || $data['submit']['status'] == 202)
                        $data['submit'] = $data['submit']['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $data['submit']['message']);
                }

                $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
                if ($data['kelas'] == null)
                    $null = true;
                else {
                    if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202) {
                        $tempkelas[] = $data['kelas']['data'];
                        $data['kelas'] = $tempkelas;
                    } else
                        $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
                }

                $data['user'] = $this->Classes_model->getUserDetail($data['kelas']['pembuat_kelas']);
                if ($data['user'] == null)
                    $null = true;
                else {
                    if ($data['user']['status'] == 200 || $data['user']['status'] == 202)
                        $data['user'] = $data['user']['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $data['user']['message']);
                }

                $header['nama'] =  $this->Classes_model->getMyName();
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
                                    if ($cek['status'] == 200 || $cek['status'] == 202) {
                                        if ($cek['data'] != null) {
                                            $datanotif[] = $cek['data'];
                                        }
                                    } else {
                                        $this->session->set_flashdata("errorAPI", $cek['message']);
                                    }
                                }
                            }
                        }
                        $header['notif'] = $datanotif;
                    } else {
                        $this->session->set_flashdata("errorAPI", $notif['message']);
                    }
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
                                else {
                                    if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                        if ($cek2['data'] != null) {
                                            $datanotif2[] = $cek2['data'];
                                        }
                                    } else {
                                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                                    }
                                }
                            }
                        }
                        $header['notif2'] = $datanotif2;
                    } else {
                        $this->session->set_flashdata("errorAPI", $notif2['message']);
                    }
                }

                if ($null)
                    $this->load->view('server_error');
                else {
                    $this->load->view('partials/user/header', $header);
                    $this->load->view('classes/detail_tugaskuis', $data);
                    $this->load->view('partials/user/footer');
                }
            } else {
                $classDetail2 = $this->Classes_model->getPesertabyClass($id_kelas);
                if ($classDetail == null)
                    $null = true;
                else {
                    if ($classDetail2['status'] == 200 || $classDetail2['status'] == 202) {
                        $classDetail2 = $classDetail2['data'];
                        $isPeserta = $classDetail2['id_user'] == $userId;
                    } else
                        $this->session->set_flashdata("errorAPI", $classDetail2['message']);
                }

                if (!$null) {
                    if (!$isPeserta) {
                        redirect("home");
                    }
                }

                $data['tugas'] = $this->Classes_model->getTugasByTugasId($id_tugas);
                if ($data['tugas'] == null)
                    $null = true;
                else {
                    if ($data['tugas']['status'] == 200 || $data['tugas']['status'] == 202) {

                        $temptugas2[] = $data['tugas']['data'];
                        $data['tugas'] = $temptugas2;
                    } else
                        $this->session->set_flashdata("errorAPI", $data['tugas']['message']);
                }

                foreach ($data['tugas'] as $val) {
                    $data['cek'] = $this->Classes_model->cekTugas($val['id_tugas']);
                    if ($data['cek'] == null)
                        $null = true;
                    else {
                        if ($data['cek']['status'] == 200 || $data['cek']['status'] == 202)
                            $data['cek'] = $data['cek']['data'];
                        else
                            $this->session->set_flashdata("errorAPI", $data['cek']['message']);
                    }
                }

                $data['submit'] = $this->Classes_model->getSubmit();
                if ($data['submit'] == null)
                    $null = true;
                else {
                    if ($data['submit']['status'] == 200 || $data['submit']['status'] == 202)
                        $data['submit'] = $data['submit']['data'];
                    else
                        $this->session->set_flashdata("errorAPI", $data['submit']['message']);
                }

                $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
                if ($data['kelas'] == null)
                    $null = true;
                else {
                    if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202) {
                        $tempkelas2[] = $data['kelas']['data'];
                        $data['kelas'] = $tempkelas2;
                    } else
                        $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
                }

                foreach ($data['kelas'] as $val) {
                    $data['user'] = $this->Classes_model->getUserDetail($val['pembuat_kelas']);
                    if ($data['user'] == null)
                        $null = true;
                    else {
                        if ($data['user']['status'] == 200 || $data['user']['status'] == 202) {
                            $tempuser2[] = $data['user']['data'];
                            $data['user'] = $tempuser2;
                        } else
                            $this->session->set_flashdata("errorAPI", $data['user']['message']);
                    }
                }

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
                                    if ($cek['status'] == 200 || $cek['status'] == 202) {
                                        if ($cek['data'] != null) {
                                            $datanotif[] = $cek['data'];
                                        }
                                    } else {
                                        $this->session->set_flashdata("errorAPI", $cek['message']);
                                    }
                                }
                            }
                        }
                        $header['notif'] = $datanotif;
                    } else {
                        $this->session->set_flashdata("errorAPI", $notif['message']);
                    }
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
                                else {
                                    if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                        if ($cek2['data'] != null) {
                                            $datanotif2[] = $cek2['data'];
                                        }
                                    } else {
                                        $this->session->set_flashdata("errorAPI", $cek2['message']);
                                    }
                                }
                            }
                        }
                        $header['notif2'] = $datanotif2;
                    } else {
                        $this->session->set_flashdata("errorAPI", $notif2['message']);
                    }
                }
            }

            if ($null)
                $this->load->view('server_error');
            else {
                $this->load->view('partials/user/header', $header);
                $this->load->view('classes/detail_tugaskuis', $data);
                $this->load->view('partials/user/footer');
            }
        }
    }

    public function detail_tugaskuisguru($id_kelas, $id_tugas)
    {
        $null = false;
        $userId = $this->session->userdata('id_user');
        $isUserLoggedIn = $this->session->userdata('logged_in') && $userId;

        if (!$isUserLoggedIn) {
            redirect("home");
        }

        $classDetail = $this->Classes_model->getClassById($id_kelas);
        if ($classDetail == null)
            $null = true;
        else {
            if ($classDetail['status'] == 200 || $classDetail['status'] == 202) {
                $classDetail = $classDetail['data'];
                $isClassOwner = $classDetail['pembuat_kelas'] == $userId;
            } else
                $this->session->set_flashdata("errorAPI", $classDetail['message']);
        }

        if (!$null) {
            if (!$isClassOwner) {
                redirect("home");
            }
        }

        $data['tugas'] = $this->Classes_model->getTugasByTugasId($id_tugas);
        if ($data['tugas'] == null)
            $null = true;
        else {
            if ($data['tugas']['status'] == 200 || $data['tugas']['status'] == 202) {
                $data['tugas'] = $data['tugas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['tugas']['message']);
        }

        $data['cek'] = $this->Classes_model->cekTugas($data['tugas'][0]['id_tugas']);
        if ($data['cek'] == null)
            $null = true;
        else {
            if ($data['cek']['status'] == 200 || $data['cek']['status'] == 202) {
                $data['cek'] = $data['cek']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['cek']['message']);
        }

        $data['submit'] = $this->Classes_model->getSubmit();
        if ($data['submit'] == null)
            $null = true;
        else {
            if ($data['submit']['status'] == 200 || $data['submit']['status'] == 202) {
                $data['submit'] = $data['submit']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['submit']['message']);
        }

        $data['kelas'] = $this->Classes_model->getClassById($id_kelas);
        if ($data['kelas'] == null)
            $null = true;
        else {
            if ($data['kelas']['status'] == 200 || $data['kelas']['status'] == 202) {
                $data['kelas'] = $data['kelas']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['kelas']['message']);
        }

        $data['user'] = $this->Classes_model->getUserDetail($data['kelas']['pembuat_kelas']);
        if ($data['user'] == null)
            $null = true;
        else {
            if ($data['user']['status'] == 200 || $data['user']['status'] == 202) {
                $data['user'] = $data['user']['data'];
            } else
                $this->session->set_flashdata("errorAPI", $data['user']['message']);
        }

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
                            if ($cek['status'] == 200 || $cek['status'] == 202) {
                                if ($cek['data'] != null) {
                                    $datanotif[] = $cek['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek['message']);
                            }
                        }
                    }
                }
                $header['notif'] = $datanotif;
            } else {
                $this->session->set_flashdata("errorAPI", $notif['message']);
            }
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
                        else {
                            if ($cek2['status'] == 200 || $cek2['status'] == 202) {
                                if ($cek2['data'] != null) {
                                    $datanotif2[] = $cek2['data'];
                                }
                            } else {
                                $this->session->set_flashdata("errorAPI", $cek2['message']);
                            }
                        }
                    }
                }
                $header['notif2'] = $datanotif2;
            } else {
                $this->session->set_flashdata("errorAPI", $notif2['message']);
            }
        }

        if ($null)
            $this->load->view('server_error');
        else {
            $this->load->view('partials/user/header', $header);
            $this->load->view('classes/detail_tugaskuisguru', $data);
            $this->load->view('partials/user/footer');
        }
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
