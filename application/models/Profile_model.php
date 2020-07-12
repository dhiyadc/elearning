<?php

class Profile_model extends CI_Model
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

    public function getProfile()
    {
        $dataparam = [
            'id_user' => $this->session->userdata('id_user')
        ];
        return $this->http_request_get($dataparam, "account/users/profile");
    }

    private function insertImage()
    {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['remove_space'] = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            return $this->upload->data('file_name');
        }
    }

    private function updateImage()
    {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['remove_space'] = true;
        $id_user = $this->session->userdata('id_user');
        $data = $this->http_request_get("?id_user=$id_user");
        foreach ($data['data'] as $data2) {
            unlink("./assets/images/" . $data2['foto']);
        }

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            return $this->upload->data('file_name');
        }
    }

    public function editProfile()
    {
        $id_user =  $this->session->userdata('id_user');
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['remove_space'] = true;


            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $data = $this->http_request_get("?id_user=$id_user");
                foreach ($data['data'] as $data2) {
                    unlink("./assets/images/" . $data2['foto']);
                }

                $file_name = $this->upload->data('file_name');

                $data = [
                    'nama' => $this->input->post('nama'),
                    'no_telepon' => $this->input->post('no_telp'),
                    'foto' => $file_name,
                    'deskripsi' => $this->input->post('deskripsi')
                ];
            } else {
                return "fail";
            }
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'no_telepon' => $this->input->post('no_telp'),
                'foto' => $this->input->post('old_image'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
        }
        $dataparam = [
            'id_user' => $id_user
        ];
        $this->http_request_update($data, "user/account/profile/$id_user");
    }

    public function deleteAccount()
    {
        $id_user = $this->session->userdata('id_user');
        return $deldata = $this->http_request_delete("users/account/$id_user");
        if ($deldata['status'] == 200) {
            foreach ($deldata['data'] as $data2) {
                unlink("./assets/images/" . $data2['foto']);
            }
        }
    }

    public function getOldPassword()
    {
        $id_user = $_SESSION['id_user'];
        return $this->http_request_get("user/account/old_password/$id_user");
    }

    public function updatePassword($newPassword)
    {
        $id_user = $_SESSION['id_user'];
        $newPasswordHashed = hash('sha256', $newPassword);

        $data = [
            'password' => $newPasswordHashed
        ];

        return $this->http_request_update($data, "users/change_password/$id_user");
    }
}
