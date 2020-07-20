<?php

class Admin_database extends CI_Model
{

    public function http_request_get($function)
    {
        $curl = curl_init();
        $url = "http://classico.id:9090/$function";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    public function http_request_post($data, $function)
    {
        $curl = curl_init();
        $url = "http://classico.id:9090/$function";
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
        $url = "http://classico.id:9090/$function";
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
        $url = "http://classico.id:9090/$function";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    //Login Function
    public function isAdmin($data)
    {

        $username = $data['email'];
        $password = $data['password'];
        $hashed = hash('sha256', $password);

        $dataparam = [
            'email' => $username,
            'hashpass' => $hashed
        ];
        return $this->http_request_post($dataparam, "account/isadmin");
    }

    public function isOwner($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $hashed = hash('sha256', $password);

        $dataparam = [
            'email' => $email,
            'hashpass' => $hashed
        ];
        return $this->http_request_post($dataparam, "account/isowner");
    }

    public function getIDUser($email)
    {
        return $this->http_request_get("user/id_user/$email");
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
        return $this->http_request_get("classes");
    }

    public function getClassById($id)
    {
        $dataparam = [
            'id_kelas' => $id
        ];
        return $this->http_request_get("classes/$id");
    }

    public function getPembuat()
    {
        return $this->http_request_get("classes/pembuat");
    }

    public function getPeserta()
    {
        return $this->db->http_request_get("classes/peserta");
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

    public function getPesertaByUserIdClassId($id)
    {
        $id_user = $this->session->userdata('id_user');
        return $this->http_request_get("classes/peserta/userclass/$id?id_user=$id_user");
    }

    public function getHarga($id)
    {
        return $this->http_request_get("classes/class_harga/$id");
    }

    public function getKegiatan($id)
    {
        return $this->http_request_get("classes/open_class/kegiatan/kelas/$id");
    }

    public function getAllUser()
    {
        return $this->http_request_get("account/users");
    }

    private function updateImage($id)
    {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['remove_space'] = true;

        $data = $this->http_request_get("classes/$id");
        foreach ($data['data'] as $data2) {
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
        $this->http_request_update($data, "classes/my_classes/update/$id");
    }

    public function updateKegiatan($id)
    {
        foreach ($this->input->post('id') as $value) {
            $data = [
                'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan')
            ];
            $this->http_request_update($data, "classes/open_class/kegiatan/$id");
        }
    }

    public function hapusKelas($id)
    {
        $this->http_request_delete("classes/my_classes/delete/$id");
    }

    //belum digawein
    public function hapusWorkshop($id)
    {
        $this->http_request_delete("workshop/my_workshop/$id");
    }

    public function getAllUsersDetail()
    {
        return $this->http_request_get("account/users/detail");
    }

    public function getAllClassesOwner()
    {
        $this->http_request_get("classes/all_class/owner");
    }

    public function getAllWorkshopsOwner()
    {
        $this->http_request_get("workshop/allworkshop/owner");
    }
}
