<?php
class workshops_model extends CI_Model
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
    
    public function http_request_delete( $function)
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
        return $this->http_request_get("workshop/allworkshop");
    }

    public function getMyClasses()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("workshop/my_workshop/$id_user");
    }


    public function getMyPrivateClasses()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("?id_user=$id_user&tipe_workshop=2");
    }

    public function getAllKegiatan()
    {
        return $this->http_request_get("workshop/kegiatan");
    }

    public function getKategori()
    {
        return $this->http_request_get("workshop/kategori");
    }

    public function getJenis()
    {
        return $this->http_request_get("");
    }

    public function getStatus()
    {
        return $this->http_request_get("");
    }

    public function getAllHarga()
    {
        return $this->http_request_get("workshop/harga/all");
    }

    public function getUserDetail($userId)
    {
        $dataparam = [
            'id_user' => $userId
        ];
        return $this->http_request_get($dataparam, "users/detail");
    }

    public function getMyName()
    {
        $id_user = $this->session->userdata('id_user');

        return $this->http_request_get("?id_user=$id_user");
    }

    public function getPeserta()
    {
        return $this->http_request_get("workshop/peserta");
    }

    public function getHarga($id)
    {
        return $this->http_request_get("workshop/harga/$id");
    }

    public function getPesertaByUserIdClassId($id)
    {
        $id_user = $this->session->userdata('id_user');
        return $this->db->http_request_get("workshop/peserta/userworkshop/$id_user?id_workshop=$id");
    }

    public function cekPeserta($id)
    {
        $dataparam = [
            'id_workshop' => $id
        ];
        $data = $this->http_request_get($dataparam, "classes/workshop");
        if ($data['status'] == 200 && count($data['data']) == null || count($data['data']) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPesertaByUserId()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("workshop/peserta/$id_user");
    }

    public function getPesertaByClassId($id)
    {
        return $this->http_request_get("workshop/peserta_workshop/$id");
    }

    public function getClassById($id)
    {
        return $this->http_request_get("workshop/detail/$id");
    }

    public function getPembuat()
    {
        return $this->http_request_get("");
    }

    public function getKelasKegiatan($id)
    {
        return $this->http_request_get("workshop/kegiatan/$id");
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
            $id_workshop = uniqid();
            if ($this->input->post('batas') == 0) {
                $data = [
                    'id_workshop' => $id_workshop,
                    'pembuat_workshop' => $this->session->userdata('id_user'),
                    'judul_workshop' => $this->input->post('judul'),
                    'deskripsi_workshop' => $this->input->post('deskripsi'),
                    'kategori_workshop' => $this->input->post('kategori'),
                    'poster_workshop' => $file_name,
                    // 'jenis_kelas' => $this->input->post('jenis'),
                    'jenis_workshop' => 1,
                    'status_workshop' => 3,
                    'batas_jumlah' => 0,
                    'tipe_workshop' => $this->input->post('tipe')
                ];
            } else {
                $data = [
                    'id_workshop' => $id_workshop,
                    'pembuat_workshop' => $this->session->userdata('id_user'),
                    'judul_workshop' => $this->input->post('judul'),
                    'deskripsi_workshop' => $this->input->post('deskripsi'),
                    'kategori_workshop' => $this->input->post('kategori'),
                    'poster_workshop' => $file_name,
                    // 'jenis_kelas' => $this->input->post('jenis'),
                    'jenis_workshop' => 1,
                    'status_workshop' => 3,
                    'batas_jumlah' => $this->input->post('jumlah_peserta'),
                    'tipe_workshop' => $this->input->post('tipe')
                ];
            }

            $this->http_request_post($data, "workshop/create_workshop");

            $deskripsi_kegiatan = $this->input->post('deskripsi_kegiatan');
            $tanggal_kegiatan = $this->input->post('tanggal_kegiatan');
            $this->setKegiatan($id_workshop, $deskripsi_kegiatan, $tanggal_kegiatan);
            $this->setHarga($id_workshop);
        } else {
            return "fail";
        }
    }

    public function joinClass($id)
    {
        $data = [
            'id_workshop' => $id,
            'id_user' => $this->session->userdata('id_user')
        ];

        $this->http_request_post($data, "workshop/join");
    }
    public function getIdNewClass()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("workshop/new_workshop/$id_user");
    }

    public function setHarga($id)
    {
        if (!empty($this->input->post('harga'))) {
            $harga_str = preg_replace("/[^0-9]/", "", $this->input->post('harga'));
            $data = [
                'id_workshop' => $id,
                'harga_workshop' => $harga_str
            ];
        } else {
            $data = [
                'id_workshop' => $id,
                'harga_workshop' => '0'
            ];
        }

        $this->http_request_post($data, "");
    }


    public function setKegiatan($id_workshop, $deskripsi_kegiatan, $tanggal_kegiatan)
    {
        $id_kegiatan_uniq = uniqid();
        $data = [
            'id_kegiatan' => $id_kegiatan_uniq,
            'id_workshop' => $id_workshop,
            'deskripsi_kegiatan' => $deskripsi_kegiatan,
            'tanggal_kegiatan' => $tanggal_kegiatan . ":00",
            'status_kegiatan' => 3
        ];

        $this->http_request_post($data, "workshop/kegiatan");
    }

    public function updateKegiatan($id_kegiatan)
    {

        $data = [
            'deskripsi_kegiatan' => $this->input->post('deskripsi')

        ];

        $this->http_request_update($data, "workshop/kegiatan/$id_kegiatan");

        return "success";
    }

    public function getKegiatanByIdKegiatan($activityId)
    {
        $dataparam = [
            'id_kegiatan' => $activityId
        ];
        return $this->http_request_get("workshop/kegiatan/byidkegiatan/$activityId");
    }

    public function updateKegiatanStatus($activityId, $status)
    {
        $data = [
            'status_kegiatan' => $status
        ];
        return $this->http_request_update($data, "workshop/kegiatan/status/$activityId");
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

                $data = $this->http_request_get("?id_workshop=$id");
                foreach ($data['data'] as $data2) {
                    unlink("assets/images/" . $data2['poster_workshop']);
                }

                $file_name = $this->upload->data('file_name');
                $data = [
                    'judul_workshop' => $this->input->post('judul'),
                    'deskripsi_workshop' => $this->input->post('deskripsi'),
                    'kategori_workshop' => $this->input->post('kategori'),
                    'poster_workshop' => $file_name
                ];
            } else {
                return "fail";
            }
        } else {
            $data = [
                'judul_workshop' => $this->input->post('judul'),
                'deskripsi_workshop' => $this->input->post('deskripsi'),
                'kategori_workshop' => $this->input->post('kategori'),
                'poster_workshop' => $this->input->post('old_image')
            ];
        }

        $this->http_request_update($data, "workshop/my_workshop/$id");
    }


    public function getClassesbyCategories($kategori)
    {
        return $this->http_request_get("workshop/bykategori/$kategori");
    }

    public function getClassesbySorting($sorting)
    {
        $data = ['sorting' => $sorting];
            return $this->http_request_post($data, "workshop/bysorting");
    }

    public function getAllClassesDetail($keyword = null)
    {
        $dataparam = [
            'keyword' => $keyword
        ];
        return $this->http_request_post($dataparam, "workshop/allworkshop/detail");
        
    }

    public function getAllRandomClasses()
    {
        return $this->http_request_get("workshop/randomworkshop");
    }


    public function getKegiatan($id)
    {
        return $this->http_request_get("workshop/kegiatan/byidworkshop/$id");
    }

    public function getTanggalKegiatan($id)
    {
        return $data = $this->http_request_get("workshop/tanggal_kegiatan/$id");
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

    public function updateStatus($id, $selesai)
    {
        if ($selesai == true) {
            $data = [
                'status_workshop' => 2
            ];
        } else if ($selesai == false) {
            $data = [
                'status_workshop' => 1
            ];
        }
        $this->http_request_update($data, "?id_workshop=$id");
    }

    public function getAllTopClasses()
    {

        return $this->http_request_get("workshop/topworkshop");
    }

    public function getMyPrivateClassesDetail($keyword = null)
    {
        $user = $this->session->userdata('id_user');
        if ($keyword) {
            return $this->http_request_get("keyword=$keyword&id_user=$user");
        } else {
            return $this->http_request_get("keyword=null&id_user=$user");
        }
    }

    public function getMyClassesDetail($keyword = null)
    {
        $user = $this->session->userdata('id_user');
        if ($keyword) {
            return $this->http_request_get("keyword=$keyword&id_user=$user");
        } else {
            return $this->http_request_get("keyword=null&id_user=$user");
        }
    }

    public function leaveClass($id)
    {
        $id_user = $this->session->userdata('id_user');
        $this->http_request_delete("workshop/leave/$id?id_user=$id_user");
    }
}
