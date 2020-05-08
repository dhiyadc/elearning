<?php

class Profile_model extends CI_Model {
    public function getMyProfile()
    {
        //return $this->db->get_where('detail_user',['id_user' => $this->session->userdata('id_user')])->result_array();

        $id_user = implode('', $_SESSION['logged_in']['id_user']);
        //$id_user = mysqli_real_escape_string($id_user);
        $sql = "SELECT * FROM detail_user
        WHERE id_user='$id_user'";
    $query = $this->db->query($sql);
    return $query->result_array();
    }

    public function getMyAccount()
    {
        //return $this->db->get_where('user',['id_user' => $this->session->userdata('id_user')])->result_array();
        
        $id_user = implode('', $_SESSION['logged_in']['id_user']);
        //$id_user = mysqli_real_escape_string($id_user);
        $sql = "SELECT * FROM user
        WHERE id_user='$id_user'";
    $query = $this->db->query($sql);
    return $query->result_array();
    }

    public function editProfile()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'no_telepon' => $this->input->post('no_telp')
        ];

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
        $this->db->where('id_user',$this->session->userdata('id_user'));
        $this->db->delete('user');
    }
}