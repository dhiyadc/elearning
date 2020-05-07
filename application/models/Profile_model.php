<?php

class Profile_model extends CI_Model {
    public function getMyProfile()
    {
        return $this->db->get_where('detail_user',['id_user' => $this->session->userdata('id_user')])->result_array();
    }

    public function getMyAccount()
    {
        return $this->db->get_where('user',['id_user' => $this->session->userdata('id_user')])->result_array();
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