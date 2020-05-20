<?php

class Profile_model extends CI_Model {
    public function getMyProfile()
    {
        //return $this->db->get_where('detail_user',['id_user' => $this->session->userdata('id_user')])->result_array();

        $id_user = $_SESSION['id_user'];
        $sql = "SELECT * FROM detail_user
        WHERE id_user='$id_user'";
    $query = $this->db->query($sql);
    return $query->result_array();
    }

    public function getMyAccount()
    {
        //return $this->db->get_where('user',['id_user' => $this->session->userdata('id_user')])->result_array();
        
        $id_user = $_SESSION['id_user'];
        $sql = "SELECT * FROM user
        WHERE id_user='$id_user'";
    $query = $this->db->query($sql);
    return $query->result_array();
    }

    public function getFirstAccount()
    {
        //return $this->db->get_where('user',['id_user' => $this->session->userdata('id_user')])->result_array();
        
        $id_user = $_SESSION['id_user'];
        $sql = "SELECT * FROM user
        WHERE id_user='$id_user'";
    $query = $this->db->query($sql);
    return $query->result_array()[0];
    }

    public function getFotoDeskripsi()
    {
        $id_user = $this->session->userdata('id_user');
        $sql = "SELECT foto,deskripsi FROM detail_user
        WHERE id_user='$id_user'";
        $query = $this->db->query($sql);
        return $query->result_array()[0];
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

    public function insertFotoDeskripsi()
    {
        $data = [
            'foto' => $this->insertImage(),
            'deskripsi' => $this->input->post('deskripsi')
        ];

        $this->db->where('id_user',$this->session->userdata('id_user'));
        $this->db->update('detail_user',$data);
    }

    private function updateImage() 
    {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['remove_space'] = true;

        $data = $this->db->get_where('detail_user',['id_user' => $this->session->userdata('id_user')])->row();
        unlink("./assets/images/".$data->foto);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            return $this->upload->data('file_name');
        }
    }

    public function editProfile()
    {
        if(!empty($_FILES['foto']['name'])) {
            $data = [
                'nama' => $this->input->post('nama'),
                'no_telepon' => $this->input->post('no_telp'),
                'foto' => $this->updateImage(),
                'deskripsi' => $this->input->post('deskripsi')
            ];
        }
        else {
            $data = [
                'nama' => $this->input->post('nama'),
                'no_telepon' => $this->input->post('no_telp'),
                'foto' => $this->input->post('old_image'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
        }

        $this->db->where('id_user',$this->session->userdata('id_user'));
        $this->db->update('detail_user',$data);   
    }

    public function editAccount()
    {
        $data = [
            'password' => $this->input->post('password')
        ];

        $this->db->where('id_user',$this->session->userdata('id_user'));
        $this->db->update('user',$data);   
    }

    public function deleteAccount()
    {
        $data = $this->db->get_where('user',['id_user' => $this->session->userdata('id_user')])->row();
        $deldata = $this->db->delete('user',['id_user'=>$this->session->userdata('id_user')]);
        if($deldata){
            unlink("./aseets/images/".$data->foto);
        }
    }

    public function getOldPassword()
    {
        $id_user = $_SESSION['id_user'];
        $sql = "SELECT * FROM user
        WHERE id_user='$id_user'";
        $query = $this->db->query($sql);
        return $query->result_array()[0];
    }

    public function updatePassword($newPassword)
    {
        $id_user = $_SESSION['id_user'];
    $newPasswordHashed = hash('sha256', $newPassword);
    $sql = "UPDATE user SET password = '$newPasswordHashed'
    WHERE id_user='$id_user'";
    return $this->db->query($sql);
    }

}