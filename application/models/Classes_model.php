<?php

class Classes_model extends CI_Model
{

    public function http_request_get($url)
    {

        $curl = curl_init();
        $url = "http://classico.co.id".$url;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    public function http_request_post($data, $url)
    {
        $curl = curl_init();
        $url = "http://classico.co.id".$url;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    public function http_request_update($data, $url)
    {
        $curl = curl_init();
        $url = "http://classico.co.id".$url;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "UPDATE");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }
    public function http_request_delete($url)
    {
        $curl = curl_init();
        $url = "http://classico.co.id".$url;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    public function getAllClasses()
    {
        return $this->http_request_get("");
    }

    public function getAllHarga()
    {
        return $this->http_request_get("");
    }

    public function getAllClassesDetail($keyword = null)
    {
        if ($keyword) {
            $sql = "SELECT kelas.id_kelas, kelas.status_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
            FROM kelas
            LEFT JOIN kategori_kelas
                    ON kategori_kelas.id_kategori = kelas.kategori_kelas 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = kelas.jenis_kelas
            LEFT JOIN harga_kelas
                    ON harga_kelas.id_kelas = kelas.id_kelas
            LEFT JOIN peserta
                    ON peserta.id_kelas = kelas.id_kelas
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = kelas.status_kelas
                WHERE kelas.judul_kelas LIKE '%$keyword%' AND kelas.tipe_kelas = 1 AND kelas.status_kelas = 1
            GROUP BY kelas.id_kelas";
            $query = $this->db->query($sql);
            return $query->result_array();
        } else {
            $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
            FROM kelas
            LEFT JOIN kategori_kelas
                    ON kategori_kelas.id_kategori = kelas.kategori_kelas 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = kelas.jenis_kelas
            LEFT JOIN harga_kelas
                    ON harga_kelas.id_kelas = kelas.id_kelas
            LEFT JOIN peserta
                    ON peserta.id_kelas = kelas.id_kelas
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = kelas.status_kelas
            WHERE kelas.tipe_kelas = 1 AND kelas.status_kelas = 1
            GROUP BY kelas.id_kelas";
            $query = $this->db->query($sql);
            return $query->result_array();

        }
    }

    public function getAllRandomClasses()
    {
        $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status, kelas.tipe_kelas
        FROM kelas
        LEFT JOIN kategori_kelas
                ON kategori_kelas.id_kategori = kelas.kategori_kelas 
        LEFT JOIN jenis_kelas
                ON jenis_kelas.id_jenis = kelas.jenis_kelas
        LEFT JOIN harga_kelas
                ON harga_kelas.id_kelas = kelas.id_kelas
        LEFT JOIN peserta
                ON peserta.id_kelas = kelas.id_kelas
        LEFT JOIN status_kegiatan
            ON status_kegiatan.id_status = kelas.status_kelas
        WHERE kelas.tipe_kelas = 1 AND kelas.status_kelas = 1
        GROUP BY kelas.id_kelas
        ORDER BY Rand()";
        $query = $this->db->query($sql);
        return $query->result_array();

    }

    public function getAllTopClasses()
    {

        $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
            FROM kelas
            LEFT JOIN kategori_kelas
                    ON kategori_kelas.id_kategori = kelas.kategori_kelas 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = kelas.jenis_kelas
            LEFT JOIN harga_kelas
                    ON harga_kelas.id_kelas = kelas.id_kelas
            LEFT JOIN peserta
                    ON peserta.id_kelas = kelas.id_kelas
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = kelas.status_kelas
            WHERE kelas.tipe_kelas = 1 AND kelas.status_kelas = 1
            GROUP BY kelas.id_kelas
            ORDER BY COUNT(peserta.id_kelas) DESC
            LIMIT 10";
        $query = $this->db->query($sql);
        return $query->result_array();

    }

    public function getClassesbyCategories($kategori)
    {
        $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
        FROM kelas
        LEFT JOIN kategori_kelas
                 ON kategori_kelas.id_kategori = kelas.kategori_kelas 
        LEFT JOIN jenis_kelas
                 ON jenis_kelas.id_jenis = kelas.jenis_kelas
        LEFT JOIN harga_kelas
                 ON harga_kelas.id_kelas = kelas.id_kelas
        LEFT JOIN peserta
                 ON peserta.id_kelas = kelas.id_kelas
        LEFT JOIN status_kegiatan
            ON status_kegiatan.id_status = kelas.status_kelas
        WHERE kategori_kelas.nama_kategori = '$kategori' AND kelas.tipe_kelas = 1 AND kelas.status_kelas = 1
        GROUP BY kelas.id_kelas";
        $query = $this->db->query($sql);
        return $query->result_array();

    }

    public function getClassesbySorting($sorting)
    {
        if ($sorting == "terbaru") {
            $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
        FROM kelas
        LEFT JOIN kategori_kelas
                 ON kategori_kelas.id_kategori = kelas.kategori_kelas 
        LEFT JOIN jenis_kelas
                 ON jenis_kelas.id_jenis = kelas.jenis_kelas
        LEFT JOIN harga_kelas
                 ON harga_kelas.id_kelas = kelas.id_kelas
        LEFT JOIN peserta
                 ON peserta.id_kelas = kelas.id_kelas
        LEFT JOIN status_kegiatan
            ON status_kegiatan.id_status = kelas.status_kelas
        WHERE kelas.tipe_kelas = 1 AND kelas.status_kelas = 1
        GROUP BY kelas.id_kelas
        ORDER BY kelas.id_kelas DESC";
            $query = $this->db->query($sql);
            return $query->result_array();
        } else if ($sorting == "terbaik") {
            $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
            FROM kelas
            LEFT JOIN kategori_kelas
                    ON kategori_kelas.id_kategori = kelas.kategori_kelas 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = kelas.jenis_kelas
            LEFT JOIN harga_kelas
                    ON harga_kelas.id_kelas = kelas.id_kelas
            LEFT JOIN peserta
                    ON peserta.id_kelas = kelas.id_kelas
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = kelas.status_kelas
            WHERE kelas.tipe_kelas = 1 AND kelas.status_kelas = 1
            GROUP BY kelas.id_kelas
            ORDER BY COUNT(peserta.id_kelas) DESC
            LIMIT 12";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
    }

    public function getMyClasses()
    {
        $id_user =  $this->session->userdata('id_user');
        return $this->http_request_get("?id_user=$id_user");
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
        return $this->http_request_get("?id_kelas=$id");
    }

    public function getPesertabyClass($id)
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("?id_user=$id_user&id_kelas=$id");
    }

    public function getPembuat()
    {
        return $this->http_request_get("");
    }

    public function getMyName()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("?id_user=$id_user");
    }

    public function getKategori()
    {
        return $this->http_request_get("");
    }

    public function getJenis()
    {
        return $this->http_request_get("");
    }

    public function getStatus()
    {
        return $this->http_request_get("");
    }

    public function getUserDetail($userId)
    {
        return $this->$this->http_request_get("?id_user=$userId");
    }

    public function getPesertaByUserIdClassId($id)
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("?id_kelas=$id&id_user=$id_user");
    }

    public function getPesertaByClassId($id)
    {
        return $this->http_request_get("?id_kelas=$id");
    }

    public function getPesertaByUserId()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("?id_user=$id_user");
    }

    public function getPeserta()
    {
        return $this->http_request_get("");
    }

    public function getHarga($id)
    {
        $this->db->where('id_kelas', $id);
        return $this->http_request_get("?id_kelas=$id");
    }

    public function getMateriByClassId($id)
    {
        return $this->http_request_get("?id_kelas=$id");
    }

    public function getKelasKegiatan($id)
    {
        return $this->http_request_get("?id_kelas=$id");
    }

    public function getIdNewClass()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("?id_user=$id_user");
    }

    public function getKegiatan($id)
    {
        return $this->http_request_get("?id_kelas=$id");
    }

    public function getKegiatanByIdKegiatan($activityId)
    {
        return $this->http_request_get("?id_kegiatan=$activityId");
    }

    public function getAllKegiatan()
    {
        return $this->http_request_get("");
    }

    public function getTanggalKegiatan($id)
    {
        $data = $this->http_request_get("?id_kelas=$id");
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
        $peserta = $this->http_request_get("?id_kelas=$id");
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

            $this->http_request_post($data, "");

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
        $this->http_request_update($data, "?id_kelas=$id");
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
        return $this->http_request_get("?id_kegiatan=$id_kegiatan&id_materi=$id_materi");
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
        $this->http_request_update($data, "?id_kelas=$id");
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
        return $this->http_request_get("");
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

                    $this->http_request_post($data, "");
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
        return $this->http_request_update($data, "?id_kegiatan=$activityId");
    }

    public function joinClass($id)
    {
        $data = [
            'id_kelas' => $id,
            'id_user' => $this->session->userdata('id_user')
        ];

        $this->http_request_post($data, "");
    }

    public function leaveClass($id)
    {
        $id_user = $this->session->userdata('id_user');
        $this->db->where('id_kelas', $id);
        $this->http_request_delete("?id_user=$id_user&id_kelas=$id");
    }

    public function getMateri($id_kelas)
    {
        return $this->http_request_get("?id_kelas=$id_kelas");
    }
    public function getMateriAll()
    {
        return $this->http_request_get("");
    }

    public function getMateribyKegiatan()
    {
        return $this->http_request_get("");
    }
    public function getMateribyIdMateri($id_materi)
    {
        return $this->http_request_get("?id_materi=$id_materi");
    }

    public function delMateri($url_materi)
    {
        unlink("assets/docs/" . $url_materi);
        return $this->http_request_delete("?url_materi=$url_materi");
    }


    public function getKategoriTugas()
    {
        return $this->http_request_get("");
    }

    public function getDeadlineTugas($id)
    {
        return $this->$this->http_request_get("?id_tugas=$id");
    }

    public function getTugasByClassId($id)
    {
        return $this->http_request_get("?id_kelas=$id");
    }

    public function getTugasByTugasId($id)
    {
        return $this->http_request_get("?id_tugas=$id");
    }

    public function getSubmit()
    {
        return $this->http_request_get("");
    }

    public function createAssignment($id)
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
                    'id_tugas' => uniqid(),
                    'judul_tugas' => $this->input->post('judul'),
                    'deskripsi_tugas' => $this->input->post('deskripsi'),
                    'url_tugas' => $filename,
                    'id_kelas' => $id,
                    'kategori_tugas' => $this->input->post('kategori'),
                    'batas_pengiriman_tugas' => $this->input->post('deadline')
                ];

                $this->http_request_post($data, "");
            } else {
                return $this->upload->display_errors();
            }
        } else {
            $data = [
                'id_tugas' => uniqid(),
                'judul_tugas' => $this->input->post('judul'),
                'deskripsi_tugas' => $this->input->post('deskripsi'),
                'url_tugas' => null,
                'id_kelas' => $id,
                'kategori_tugas' => $this->input->post('kategori'),
                'batas_pengiriman_tugas' => $this->input->post('deadline')
            ];

            $this->http_request_post($data, "");
        }
    }

    public function collectAssignment($id_tugas, $deadline)
    {
        $config['upload_path'] = './assets/docs/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = '25000';
        $config['remove_space'] = true;

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
                    'tanggal_submit' => gmdate('Y-m-d H:i:s', $timezone)
                ];

                $this->http_request_post($data, "");
            } else {
                $data = [
                    'id_tugas' => $id_tugas,
                    'url_file' => $filename,
                    'nilai_tugas' => "Belum Dinilai",
                    'status_tugas' => 1,
                    'id_user' => $this->session->userdata('id_user'),
                    'subjek_tugas' => $this->input->post('subjek'),
                    'tanggal_submit' => gmdate('Y-m-d H:i:s', $timezone)
                ];

                $this->http_request_post($data, "");
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

                $this->http_request_update($data, "?id_tugas=$id");
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

            $this->http_request_update($data, "?id_tugas=$id");
        }
    }

    public function deleteAssignment($id)
    {
        return $this->http_request_delete("?id_tugas=$id");
    }

    public function updateNilai($id)
    {
        $data = [
            'nilai_tugas' => $this->input->post('nilai'),
            'tanggal_submit' => $this->input->post('tanggal_submit')
        ];

        $this->http_request_update($data, "id_submit=$id");
    }

    public function deleteJawaban($id)
    {
        $data = $this->http_request_get("?id_submit=$id");
        $deldata = $this->http_request_delete("?id_submit=$id");
        if ($deldata['status'] == 200) {
            foreach ($data['data'] as $data2) {
                unlink("assets/docs/" . $data2['url_file']);
            }
        }
    }

    public function cekTugas($id)
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("?id_tugas=$id&id_user=$id_user");
    }
}
