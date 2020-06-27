<?php

class Profile_model extends CI_Model {
    public function getProfile()
    {
        $id = $this->session->userdata('id_user');
        $sql = "SELECT user.*,detail_user.*
                FROM user,detail_user
                WHERE user.id_user = '$id' AND detail_user.id_user = '$id'";
        return $this->db->query($sql)->result_array();
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
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['remove_space'] = true;

            

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $data = $this->db->get_where('detail_user',['id_user' => $this->session->userdata('id_user')])->row();
                unlink("./assets/images/".$data->foto);

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