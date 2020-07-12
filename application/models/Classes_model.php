<?php

class Classes_model extends CI_Model
{

    public function http_request_get($function)
    {
        $curl = curl_init();
            $url = "http://classico.co.id/" . $function;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    public function http_request_post($data, $function)
    {
        $curl = curl_init();
            $url = "http://classico.co.id/" . $function;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    public function http_request_update($data, $function)
    {
        $curl = curl_init();
            $url = "http://classico.co.id/" . $function;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "UPDATE");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }
    
    public function http_request_delete($function)
    {
        $curl = curl_init();
            $url = "http://classico.co.id/" . $function;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    public function getAllClasses()
    {
        return $this->http_request_get("classes/all_class/detail");
    }

    public function getAllHarga()
    {
        return $this->http_request_get("classes/class_harga");
    }

    public function getAllClassesDetail($keyword = null)
    {
        $dataparam = [
            'keyword' => $keyword
        ];
        $this->http_request_post($dataparam, "classes/all_detail");
    }

    public function getAllRandomClasses()
    {
        $this->http_request_get("classes/all_class/random");
    }

    public function getAllTopClasses()
    {
        $this->http_request_get("classes/all_class/top");
    }

    public function getClassesbyCategories($kategori)
    {
        $dataparam = [
            'kategori' => $kategori
        ];
        return $this->http_request_get("classes/by/kategori/$kategori");
    }

    public function getClassesbySorting($sorting)
    {
        $dataparam = [
            'sorting' => $sorting
        ];
        return $this->http_request_get("classes/by/sorting/$sorting");
    }

    public function getMyClasses()
    {
        $id_user =  $this->session->userdata('id_user');
        return $this->http_request_get("classes/my_classes/$id_user");
    }


    public function getMyPublicClasses()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("?id_user=$id_user&tipe_kelas=1");
    }

    public function getMyPrivateClasses()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("?id_user=$id_user&tipe_kelas=2");
    }

    public function getMyPrivateClassesDetail($keyword = null)
    {
        if ($keyword) {
            $user = $this->session->userdata('id_user');
            return $this->http_request_get("?keyword=$keyword&id_user=$user");
        } else {
            $user = $this->session->userdata('id_user');
            return $this->http_request_get("?keyword=null&id_user=$user");
        }
    }

    public function getClassById($id)
    {
        $dataparam = [
            'id_kelas' => $id
        ];
        return $this->http_request_get("classes/$id");
    }

    public function getPesertabyClass($id)
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get(null, "classes/peserta/byclass/$id?id_user=$id_user");
    }

    public function getPembuat()
    {
        return $this->http_request_get("classes/pembuat");
    }

    public function getMyName()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("user/account/name/$id_user");
    }

    public function getKategori()
    {
        return $this->http_request_get("classes/kategori_kelas");
    }

    public function getJenis()
    {
        return $this->http_request_get("classes/jenis_kelas");
    }

    public function getStatus()
    {
        return $this->http_request_get("classes/kegiatan/status");
    }

    public function getUserDetail($userId)
    {
        $dataparam = [
            'id_user' => $userId
        ];
        return $this->$this->http_request_get($dataparam, "users/detail");
    }

    public function getPesertaByUserIdClassId($id)
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("classes/peserta/userclass/$id?id_user=$id_user");
    }

    public function getPesertaByClassId($id)
    {
        return $this->http_request_get("classes/peserta/class/$id");
    }

    public function getPesertaByUserId()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("classes/peserta/user/$id_user");
    }

    public function getPeserta()
    {
        return $this->http_request_get("classes/peserta");
    }

    public function getHarga($id)
    {
        $dataparam = [
            'id_kelas' => $id
        ];
        return $this->http_request_get("classes/class_harga/$id");
    }

    public function getMateriByClassId($id)
    {
        $dataparam = [
            'id_kelas' => $id
        ];
        return $this->http_request_get("classes/open_class/materi/by/idkelas/$id");
    }

    public function getKelasKegiatan($id)
    {
        $dataparam = [
            'id_kelas' => $id
        ];
        return $this->http_request_get("classes/kegiatan/$id");
    }

    public function getIdNewClass()
    {
        $id_user = $this->session->userdata('id_user');
        $dataparam = [
            'id_user' => $id_user
        ];
        return $this->http_request_get("classes/new_class/$id_user");
    }

    public function getKegiatan($id)
    {
        return $this->http_request_get("classes/open_class/kegiatan/kelas/$id");
    }

    public function getKegiatanByIdKegiatan($activityId)
    {
        return $this->http_request_get("classes/open_class/kegiatan/$activityId");
    }

    public function getAllKegiatan()
    {
        return $this->http_request_get("classes/open_class/kegiatan");
    }

    public function getTanggalKegiatan($id)
    {
        $data = $this->http_request_get("classes/kegiatan/tanggal/$id");
        return $data;
        if ($data['status'] == 200 && count($data['data']) != null || count($data['data']) != 0) {
            $selesai = true;
            foreach ($data['data'] as $key => $value) {
                if ($value['status_kegiatan'] == 1 || $value['status_kegiatan'] == 3) {
                    $selesai = false;
                    break;
                }
            }
        } else {
            $selesai = false;
        }

        $this->updateStatus($id, $selesai);
    }

    public function cekPeserta($id)
    {
        $dataparam = [
            'id_kelas' => $id
        ];
        $peserta = $this->http_request_get($dataparam, "class/cekpeserta");
        if ($peserta['status'] == 200 && count($peserta['data']) == null || count($peserta['data']) == 0) {
            return true;
        } else {
            return false;
        }
    }

    private function insertImage()
    {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['remove_space'] = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('poster')) {
            return $this->upload->data('file_name');
        }
    }

    public function createClass()
    {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['remove_space'] = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('poster')) {
            $file_name = $this->upload->data('file_name');
            $uniqid = uniqid();

            if ($this->input->post('batas') == 0) {
                $data = [
                    'id_kelas' => $uniqid,
                    'pembuat_kelas' => $this->session->userdata('id_user'),
                    'judul_kelas' => $this->input->post('judul'),
                    'deskripsi_kelas' => $this->input->post('deskripsi'),
                    'kategori_kelas' => $this->input->post('kategori'),
                    'poster_kelas' => $file_name,
                    // 'jenis_kelas' => $this->input->post('jenis'),
                    'jenis_kelas' => 1,
                    'status_kelas' => 1,
                    'batas_jumlah' => 0,
                    'tipe_kelas' => $this->input->post('tipe')
                ];
            } else {
                $data = [
                    'id_kelas' => $uniqid,
                    'pembuat_kelas' => $this->session->userdata('id_user'),
                    'judul_kelas' => $this->input->post('judul'),
                    'deskripsi_kelas' => $this->input->post('deskripsi'),
                    'kategori_kelas' => $this->input->post('kategori'),
                    'poster_kelas' => $file_name,
                    // 'jenis_kelas' => $this->input->post('jenis'),
                    'jenis_kelas' => 1,
                    'status_kelas' => 1,
                    'batas_jumlah' => $this->input->post('jumlah_peserta'),
                    'tipe_kelas' => $this->input->post('tipe')
                ];
            }

            $this->http_request_post($data, "classes/create_class");

            if (!empty($this->input->post('harga'))) {
                $harga_str = preg_replace("/[^0-9]/", "", $this->input->post('harga'));
                $data = [
                    'id_kelas' => $uniqid,
                    'harga_kelas' => $harga_str
                ];
            } else {
                $data = [
                    'id_kelas' => $uniqid,
                    'harga_kelas' => '0'
                ];
            }
            $this->db->insert('harga_kelas', $data);

            if (!empty($this->input->post('addmore'))) {
                $this->setKegiatan($uniqid);
            }
        } else {
            return $this->upload->display_errors();
        }
    }

    public function updateStatus($id, $selesai)
    {
        if ($selesai == true) {
            $data = [
                'status_kelas' => 2
            ];
        } else if ($selesai == false) {
            $data = [
                'status_kelas' => 1
            ];
        }
        $this->http_request_update($data, null,  "classes/kegiatan/status/$id");
    }

    private function updateImage($id)
    {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['remove_space'] = true;


        $data = $this->http_request_get("?id_kelas=$id");
        foreach ($data['data'] as $data2) {
            unlink("images/" . $data2['poster_kelas']);
        }

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('poster')) {
            return $this->upload->data('file_name');
        }
    }

    public function getMateriLain($id_kegiatan, $id_materi)
    {
        return $this->http_request_get("classes/open_class/materi/another/$id_kegiatan?id_materi=$id_materi");
    }

    public function updateClass($id)
    {
        if (!empty($_FILES['poster']['name'])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['remove_space'] = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('poster')) {
                $data = $this->http_request_get("?id_kelas=$id");
                foreach ($data['data'] as $data2) {
                    unlink("assets/images/" . $data2['poster_kelas']);
                }

                $file_name = $this->upload->data('file_name');
                $data = [
                    'judul_kelas' => $this->input->post('judul'),
                    'deskripsi_kelas' => $this->input->post('deskripsi'),
                    'kategori_kelas' => $this->input->post('kategori'),
                    'poster_kelas' => $file_name
                ];
            } else {
                return $this->upload->display_errors();
            }
        } else {
            $data = [
                'judul_kelas' => $this->input->post('judul'),
                'deskripsi_kelas' => $this->input->post('deskripsi'),
                'kategori_kelas' => $this->input->post('kategori'),
                'poster_kelas' => $this->input->post('old_image')
            ];
        }
        $this->http_request_update($data, "classes/my_classes/update/$id");
    }

    public function setHarga($id)
    {
        if (!empty($this->input->post('harga'))) {
            $harga_str = preg_replace("/[^0-9]/", "", $this->input->post('harga'));
            $data = [
                'id_kelas' => $id,
                'harga_kelas' => $harga_str
            ];
        } else {
            $data = [
                'id_kelas' => $id,
                'harga_kelas' => '0'
            ];
        }

        $this->http_request_post($data, "");
    }

    public function setKegiatanByClass($id)
    {
        $data = [];
        $id_kegiatan_uniq = uniqid();

        if (!empty($_FILES['materi']['name'][0])) {
            $data = [
                'id_kegiatan' => $id_kegiatan_uniq,
                'id_kelas' => $id,
                'deskripsi_kegiatan' => $this->input->post('deskripsi'),
                'tanggal_kegiatan' => $this->input->post('tanggal') . ":00",
                'status_kegiatan' => 3
            ];

            $this->http_request_post($data, "");
            $id_keg = $data['id_kegiatan'];

            $video = $this->input->post('video');
            if ($video != 0 || $video != null) {

                $str_arr = explode(",", $video);
                $countvideo = count($str_arr);
                for ($j = 0; $j < $countvideo; $j++) {
                    $data = [
                        'id_materi' => uniqid(),
                        'url_materi' => $str_arr[$j],
                        'id_kelas' => $id,
                        'id_kegiatan' => $id_kegiatan_uniq,
                        'kategori_materi' => 2
                    ];
                    $materi_id[] = $data['id_materi'];
                    $this->http_request_post($data, "");
                }
            }
        }

        $count = count($_FILES['materi']['name']);
        for ($i = 0; $i < $count; $i++) {
            if (!empty($_FILES['materi']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['materi']['name'][$i];
                $_FILES['file']['type'] = $_FILES['materi']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['materi']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['materi']['error'][$i];
                $_FILES['file']['size'] = $_FILES['materi']['size'][$i];

                $config['upload_path'] = './assets/docs/';
                $config['allowed_types'] = 'docx|pdf|pptx|doc|ppt';
                $config['max_size'] = '25000';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $file_name = $this->upload->data('file_name');
                    // $data['totalFiles'][] = $file_name;
                    $fileArr[] = $file_name;


                    $data = [
                        'id_materi' => uniqid(),
                        'url_materi' => $file_name,
                        'id_kelas' => $id,
                        'id_kegiatan' => $id_kegiatan_uniq,
                        'kategori_materi' => 1
                    ];
                    $materi_id[] = $data['id_materi'];
                    $this->http_request_post($data, "");
                } else {
                    $this->http_request_delete("?id_kegiatan=$id_keg");

                    $countFile = count($fileArr);
                    for ($j = 0; $j < $countFile; $j++) {
                        $this->http_request_delete("?id_materi=$materi_id[$j]");
                        unlink("assets/docs/" . $fileArr[$j]);
                    }
                    return $this->upload->display_errors();

                    //return $_FILES['materi']['name'][$i];
                }
            } else {
                $data = [
                    'id_kegiatan' => $id_kegiatan_uniq,
                    'id_kelas' => $id,
                    'deskripsi_kegiatan' => $this->input->post('deskripsi'),
                    'tanggal_kegiatan' => $this->input->post('tanggal') . ":00",
                    'status_kegiatan' => 3
                ];

                $this->http_request_post($data, "");

                $video = $this->input->post('video');
                if ($video != 0 || $video != null) {

                    $str_arr = explode(",", $video);
                    $countvideo = count($str_arr);
                    for ($j = 0; $j < $countvideo; $j++) {
                        $data = [
                            'id_materi' => uniqid(),
                            'url_materi' => $str_arr[$j],
                            'id_kelas' => $id,
                            'id_kegiatan' => $id_kegiatan_uniq,
                            'kategori_materi' => 2
                        ];
                        $materi_id[] = $data['id_materi'];
                        $this->http_request_post($data, "");
                    }
                }
            }
        }
        //return $data['totalFiles'];
        return "success";
    }

    public function getMateriVideo()
    {
        return $this->http_request_get("classes/open_class/materi/video");
    }

    public function setKegiatan($id)
    {
        if (!empty($this->input->post('addmore'))) {
            foreach ($this->input->post('addmore') as $key => $value) {
                $i = $key++;
                if ($i % 2 == 0) {
                    $deskripsi = $value['deskripsi_kegiatan'];
                } else {
                    $id_kegiatan_uniq = uniqid();
                    $tanggal = $value['tanggal_kegiatan'];
                    $data = [
                        'id_kegiatan' => $id_kegiatan_uniq,
                        'id_kelas' => $id,
                        'deskripsi_kegiatan' => $deskripsi,
                        'tanggal_kegiatan' => $tanggal . ":00",
                        'status_kegiatan' => 3
                    ];

                    $this->http_request_post($data, "classes/open_class/kegiatan");
                }

                // if(!empty($this->input->post('addmorefile'))){
                //     $this->setKegiatanFile($id, $id_kegiatan_uniq);
                // }
            }
        }
    }

    // public function setKegiatanFile($id, $id_kegiatan)
    // {
    //     if(!empty($this->input->post('addmorefile'))){
    //         foreach ($this->input->post('addmorefile') as $key => $value) {
    //             $data = [];

    //     $count = count($_FILES['materi']['name']);
    //     for($i=0;$i<$count;$i++){
    //         if(!empty($_FILES['materi']['name'][$i])) {
    //             $_FILES['file']['name'] = $_FILES['materi']['name'][$i];
    //             $_FILES['file']['type'] = $_FILES['materi']['type'][$i];
    //             $_FILES['file']['tmp_name'] = $_FILES['materi']['tmp_name'][$i];
    //             $_FILES['file']['error'] = $_FILES['materi']['error'][$i];
    //             $_FILES['file']['size'] = $_FILES['materi']['size'][$i];

    //             $config['upload_path'] = './assets/docs/';
    //             $config['allowed_types'] = 'docx|pdf|pptx|doc|ppt';
    //             $config['max_size'] = '25000';

    //             $this->load->library('upload', $config);
    //             if ($this->upload->do_upload('file')) {
    //                 $file_name = $this->upload->data('file_name');
    //                 // $data['totalFiles'][] = $file_name;
    //                 $fileArr[] = $file_name;


    //                 $data = [
    //                     'id_materi' => uniqid(),
    //                     'url_materi' => $file_name,
    //                     'id_kelas' => $id,
    //                     'id_kegiatan' => $id_kegiatan
    //                 ];
    //                 $materi_id[] = $data['id_materi'];
    //                 $this->db->insert('materi',$data);
    //             } else {
    //                 $this->db->where('id_kegiatan', $id_keg);
    //                 $this->db->delete('jadwal_kegiatan');

    //                 $countFile = count($fileArr);
    //                 for($j = 0; $j < $countFile; $j++){
    //                     $this->db->where('id_materi', $materi_id[$j]);
    //                     $this->db->delete('materi');
    //                     unlink("assets/docs/".$fileArr[$j]);
    //                 }

    //                 return "fail";

    //                 //return $_FILES['materi']['name'][$i];
    //             }
    //         }
    //     }
    //     //return $data['totalFiles'];

    //         }
    //         return "success";
    //     }
    // }



    public function updateKegiatan($id_kelas, $id_kegiatan)
    {
        $data = [];

        if (!empty($_FILES['materi']['name'][0])) {
            $data = [
                'deskripsi_kegiatan' => $this->input->post('deskripsi'),
                'tanggal_kegiatan' => $this->input->post('tanggal')
            ];

            $this->http_request_update($data, "?id_kegiatan=$id_kegiatan");

            $video = $this->input->post('video');
            if ($video != 0 || $video != null) {

                $str_arr = explode(",", $video);
                $countvideo = count($str_arr);
                for ($j = 0; $j < $countvideo; $j++) {
                    $data = [
                        'id_materi' => uniqid(),
                        'url_materi' => $str_arr[$j],
                        'id_kelas' => $id_kelas,
                        'id_kegiatan' => $id_kegiatan,
                        'kategori_materi' => 2
                    ];
                    $materi_id[] = $data['id_materi'];
                    $this->http_request_post($data, "");
                }
            }
        }

        $count = count($_FILES['materi']['name']);
        for ($i = 0; $i < $count; $i++) {
            if (!empty($_FILES['materi']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['materi']['name'][$i];
                $_FILES['file']['type'] = $_FILES['materi']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['materi']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['materi']['error'][$i];
                $_FILES['file']['size'] = $_FILES['materi']['size'][$i];

                $config['upload_path'] = './assets/docs/';
                $config['allowed_types'] = 'docx|pdf|pptx|doc|ppt';
                $config['max_size'] = '25000';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $file_name = $this->upload->data('file_name');
                    // $data['totalFiles'][] = $file_name;
                    $fileArr[] = $file_name;


                    $data = [
                        'id_materi' => uniqid(),
                        'url_materi' => $file_name,
                        'id_kelas' => $id_kelas,
                        'id_kegiatan' => $id_kegiatan,
                        'kategori_materi' => 1
                    ];
                    $materi_id[] = $data['id_materi'];
                    $this->http_request_post($data, "");
                } else {

                    $countFile = count($fileArr);
                    for ($j = 0; $j < $countFile; $j++) {
                        $this->http_request_delete("?id_materi=$materi_id[$j]");
                        unlink("assets/docs/" . $fileArr[$j]);
                    }

                    return $this->upload->display_errors();

                    //return $_FILES['materi']['name'][$i];
                }
            } else {

                $data = [
                    'deskripsi_kegiatan' => $this->input->post('deskripsi'),
                    'tanggal_kegiatan' => $this->input->post('tanggal')
                ];


                $this->http_request_update($data, "?id_kegiatan=$id_kegiatan");

                $video = $this->input->post('video');
                if ($video != 0 || $video != null) {

                    $str_arr = explode(",", $video);
                    $countvideo = count($str_arr);
                    for ($j = 0; $j < $countvideo; $j++) {
                        $data = [
                            'id_materi' => uniqid(),
                            'url_materi' => $str_arr[$j],
                            'id_kelas' => $id_kelas,
                            'id_kegiatan' => $id_kegiatan,
                            'kategori_materi' => 2
                        ];
                        $materi_id[] = $data['id_materi'];
                        $this->http_request_post($data, "");
                    }
                }
            }
        }
        return "success";
    }

    public function updateKegiatanStatus($activityId, $status)
    {
        $data = [
            'status_kegiatan' => $status
        ];
        return $this->http_request_update($data, "classes/kegiatan/status/$activityId");
    }

    public function joinClass($id)
    {
        $data = [
            'id_kelas' => $id,
            'id_user' => $this->session->userdata('id_user')
        ];

        $this->http_request_post($data, "classes/joinclass");
    }

    public function leaveClass($id)
    {
        $id_user = $this->session->userdata('id_user');
        $this->db->where('id_kelas', $id);
        $this->http_request_delete(null,"classes/leaveclass/$id?id_user=$id_user");
    }

    public function getMateri($id_kelas)
    {
        return $this->http_request_get("?id_kelas=$id_kelas");
    }
    public function getMateriAll()
    {
        return $this->http_request_get("classes/open_class/materi");
    }

    public function getMateribyKegiatan()
    {
        return $this->http_request_get("classes/open_class/materi/by/kegiatan");
    }
    public function getMateribyIdMateri($id_materi)
    {
        return $this->http_request_get("classes/open_class/materi/$id_materi");
    }

    public function delMateri($url_materi)
    {
        $data = ['url_materi' => $url_materi];
        unlink("assets/docs/" . $url_materi);
        return $this->http_request_delete($data, "classes/open_class/materi/url/$url_materi");
    }


    public function getKategoriTugas()
    {
        return $this->http_request_get("classes/kategori_tugas");
    }

    public function getDeadlineTugas($id)
    {
        $dataparam = [
            'id_tugas' => $id
        ];
        return $this->http_request_get("classes/my_class/assignment/deadline/$id");
    }

    public function getTugasByClassId($id)
    {
        $dataparam = [
            'id_kelas' => $id
        ];
        return $this->http_request_get($dataparam, "classes/my_class/assignment/by/kelas/$id");
    }

    public function getTugasByTugasId($id)
    {
        $dataparam = [
            'id_tugas' => $id
        ];
        return $this->http_request_get($dataparam, "classes/my_class/assignment/by/tugas/$id");
    }

    public function getSubmit()
    {
        return $this->http_request_get(null, "classes/submitview");
    }

    public function createAssignment($id)
    {
        $id_tugas = uniqid();
        $deadline = $this->input->post('deadline');
        if (!empty($_FILES['url_tugas']['name'])) {
            $config['upload_path'] = './assets/docs/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = '25000';
            $config['remove_space'] = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('url_tugas')) {
                $filename = $this->upload->data('file_name');
                $data = [
                    'id_tugas' => $id_tugas,
                    'judul_tugas' => $this->input->post('judul'),
                    'deskripsi_tugas' => $this->input->post('deskripsi'),
                    'url_tugas' => $filename,
                    'id_kelas' => $id,
                    'kategori_tugas' => $this->input->post('kategori'),
                    'batas_pengiriman_tugas' => $this->input->post('deadline'),
                ];

                $this->http_request_post($data, "classes/my_class/assignment/kuis");
            } else {
                return $this->upload->display_errors();
            }
        } else {
            $data = [
                'id_tugas' => $id_tugas,
                'judul_tugas' => $this->input->post('judul'),
                'deskripsi_tugas' => $this->input->post('deskripsi'),
                'url_tugas' => null,
                'id_kelas' => $id,
                'kategori_tugas' => $this->input->post('kategori'),
                'batas_pengiriman_tugas' => $this->input->post('deadline')
            ];

            $this->http_request_post($data, "classes/my_class/assignment/kuis");
        }
    }

    public function collectAssignment($id_tugas, $deadline)
    {
        $config['upload_path'] = './assets/docs/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = '25000';
        $config['remove_space'] = true;
        $id_user = $this->session->userdata('id_user');

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('assignment')) {
            $filename = $this->upload->data('file_name');
            $timezone = time() + (60 * 60 * 7);

            if (gmdate('Y-m-d H:i:s', $timezone) > $deadline) {
                $data = [
                    'id_tugas' => $id_tugas,
                    'url_file' => $filename,
                    'nilai_tugas' => "Belum Dinilai",
                    'status_tugas' => 2,
                    'id_user' => $this->session->userdata('id_user'),
                    'subjek_tugas' => $this->input->post('subjek'),
                    'tanggal_submit' => gmdate('Y-m-d H:i:s', $timezone),
                    'id_user' => $id_user,
                    'id_tugas' => $id_tugas
                ];

                $this->http_request_post($data, "classes/my_class/submit_assignment");
                $data = [
                    'id_tugas' => $id_tugas,
                    'url_file' => $filename,
                    'nilai_tugas' => "Belum Dinilai",
                    'status_tugas' => 1,
                    'id_user' => $this->session->userdata('id_user'),
                    'subjek_tugas' => $this->input->post('subjek'),
                    'tanggal_submit' => gmdate('Y-m-d H:i:s', $timezone),
                    'id_user' => $id_user,
                    'id_tugas' => $id_tugas
                ];

                $this->http_request_post($data, "classes/my_class/submit_assignment");
            }
        } else {
            return $this->upload->display_errors();
        }
    }

    public function updateAssignment($id)
    {
        if (!empty($_FILES['url_tugas']['name'])) {
            $config['upload_path'] = './assets/docs/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = '25000';
            $config['remove_space'] = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('url_tugas')) {
                $filename = $this->upload->data('file_name');

                $data = [
                    'judul_tugas' => $this->input->post('judul'),
                    'deskripsi_tugas' => $this->input->post('deskripsi'),
                    'url_tugas' => $filename,
                    'kategori_tugas' => $this->input->post('kategori'),
                    'batas_pengiriman_tugas' => $this->input->post('deadline')
                ];

                $this->http_request_update($data, "classes/my_class/assignment/kuis/$id");
            } else {
                return $this->upload->display_errors();
            }
        } else {
            $data = [
                'judul_tugas' => $this->input->post('judul'),
                'deskripsi_tugas' => $this->input->post('deskripsi'),
                'kategori_tugas' => $this->input->post('kategori'),
                'url_tugas' => $this->input->post('old_file'),
                'batas_pengiriman_tugas' => $this->input->post('deadline')
            ];

            $this->http_request_update($data, "classes/my_class/assignment/kuis/$id");
        }
    }

    public function deleteAssignment($id)
    {
        $data = ['id_tugas' => $id];
        return $this->http_request_delete("classes/my_class/assignment/kuis/$id");
    }

    public function updateNilai($id)
    {
        $data = [
            'nilai_tugas' => $this->input->post('nilai'),
            'tanggal_submit' => $this->input->post('tanggal_submit')
        ];

        $this->http_request_update($data, "classes/my_class/assigclasses/my_class/assignment/nilai/$id");
    }

    public function deleteJawaban($id)
    {
        //$data = ['id_submit => $id'];
        $deldata = $this->http_request_delete("/");
        if ($deldata['status'] == 200) {
            foreach ($deldata['data'] as $data2) {
                unlink("assets/docs/" . $data2['url_file']);
            }
        }
    }

    public function cekTugas($id)
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("classes/my_class/assignment/$id/$id_user");
    }
}
