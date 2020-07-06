<?php

class Admin_database extends CI_Model
{

    public function http_request_get($data = null, $url)
    {

        $curl = curl_init();
        if($data)
        $data = http_build_query($data);
        $url = "http://classico.co.id/".$url;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);
        
        return json_decode($result, true);
    }

    public function http_request_post($data, $url)
    {
        $curl = curl_init();
        $url = "http://classico.co.id/".$url;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }

    public function http_request_update($data, $url)
    {
        $curl = curl_init();
        $url = "http://classico.co.id/".$url;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "UPDATE");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }
    public function http_request_delete($id)
    {
        $curl = curl_init();
        $url = "http://classico.co.id/".$id;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }


    //Login Function
    public function isAdmin($data)
    {

        $username = $data['email'];
        $password = $data['password'];
        $hashed = hash('sha256', $password);

        $user = $this->http_request_get("?email=$username");
        if ($user['status'] == 200 && count($user['data']) != 0 || count($user['data']) != null) {
            $cekpassword = $this->http_request_get("?password=$hashed");
            if ($cekpassword['status'] == 200 && count($cekpassword['data']) != 0 || count($cekpassword['data']) != null) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isOwner($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $hashed = hash('sha256', $password);

        $owner = $this->http_request_get("?email=$email");

        if ($owner['status'] == 200 && count($owner['data']) != 0 || count($owner['data']) != null) {
            $cekpassword = $this->http_request_get("?password=$hashed");

            if ($cekpassword['status'] == 200 && count($cekpassword['data']) != 0 || count($cekpassword['data']) != null) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getIDUser($email)
    {
        return $this->http_request_get("?email=$email");
    }

    // Read data from database to show data in any page
    public function read_user_information($email)
    {

        $result = $this->http_request_get("?email=$email");
        if (count($result['data']) == 1) {
            return $result;
        } else {
            return false;
        }
    }

    public function getAllClasses()
    {
        return $this->http_request_get("");
    }

    public function getClassById($id)
    {
        return $this->http_request_get("?id_kelas=$id");
    }

    public function getPembuat()
    {
        return $this->http_request_get("");
    }

    public function getPeserta()
    {
        return $this->db->http_request_get("");
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

    public function getPesertaByUserIdClassId($id)
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("?id_user=$id_user&id_kelas=$id");
    }

    public function getHarga($id)
    {
        return $this->http_request_get("?id_kelas=$id");
    }

    public function getKegiatan($id)
    {
        return $this->http_request_get("?id_kelas=$id");
    }

    public function getAllUser()
    {
        return $this->http_request_get("");
    }

    private function updateImage($id)
    {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['remove_space'] = true;

        $data = $this->http_request_get("?id_kelas=$id");
        foreach($data['data'] as $data2){
            unlink("images/" . $data2['poster_kelas']);
        }

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('poster')) {
            return $this->upload->data('file_name');
        }
    }

    public function updateKelas($id)
    {
        if (!empty($_FILES['poster']['name'])) {
            $data = [
                'judul_kelas' => $this->input->post('judul'),
                'deskripsi_kelas' => $this->input->post('deskripsi'),
                'kategori_kelas' => $this->input->post('kategori'),
                'poster_kelas' => $this->updateImage($id)
            ];
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

    public function updateKegiatan($id)
    {
        foreach ($this->input->post('id') as $value) {
            $data = [
                'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan')
            ];
            $this->http_request_update($data, "?id_kelas=$id&id_kegiatan=$value");
        }
    }

    public function hapusKelas($id)
    {
        $this->http_request_delete("?id_kelas=$id");
    }

    public function hapusWorkshop($id)
    {
        $this->http_request_delete("$id");
    }

    public function getAllUsersDetail()
    {
        return $this->http_request_get("");
    }

    public function getAllClassesOwner()
    {
        $this->http_request_get("");
    }

    public function getAllWorkshopsOwner()
    {
        $this->http_request_get("");
    }
}
