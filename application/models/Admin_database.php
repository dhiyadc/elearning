<?php

Class Admin_database extends CI_Model {

//Login Function
    public function login($data){
        
        $username = $data['email'];
        $password = $data['password'];
        $hashed = hash('sha256', $password);
        $user = $this->db->get_where('admin', ['email' => $username])->row_array();
    
        if($user){
            if($this->db->get_where('admin', ['password' => $hashed])->row_array()){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isOwner($data){
        $email = $data['email'];
        $password = $data['password'];
        $hashed = hash('sha256', $password);
        
        $owner = $this->db->get_where('owner', ['email' => $email])->row_array();
    
        if($owner){
            if($this->db->get_where('owner', ['password' => $hashed])->row_array()){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getIDUser($email){
        /*$sql = "SELECT id_user FROM user
            WHERE email='$email'";
        $query = $this->db->query($sql);
        return $query->getFirstRow(); */
        
        
        $condition = "email =" . "'" . $email . "'";
        $this->db->select('id_user');
        $this->db->from('user');
        $this->db->where($condition);
        //$this->db->limit(1);
        $query = $this->db->get(); 

        return $query->result_array()[0];
    }

    // Read data from database to show data in any page
    public function read_user_information($email) {

        $condition = "email =" . "'" . $email . "'";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAllClasses()
    {
        return $this->db->get('kelas')->result_array();
    }

    public function getClassById($id)
    {
        $this->db->where('id_kelas',$id);
        return $this->db->get('kelas')->result_array();
    }

    public function getPembuat()
    {
        return $this->db->get('detail_user')->result_array();
    }

    public function getPeserta()
    {
        return $this->db->get('peserta')->result_array();
    }

    public function getKategori()
    {
        return $this->db->get('kategori_kelas')->result_array();
    }

    public function getJenis()
    {
        return $this->db->get('jenis_kelas')->result_array();
    }

    public function getStatus()
    {
        return $this->db->get('status_kegiatan')->result_array();
    }

    public function getPesertaByUserIdClassId($id)
    {
        $this->db->where('id_user',$this->session->userdata('id_user'));
        $this->db->where('id_kelas',$id);
        return $this->db->get('peserta')->result_array();
    }

    public function getHarga($id)
    {
        $this->db->where('id_kelas',$id);
        return $this->db->get('harga_kelas')->result_array();
    }

    public function getKegiatan($id)
    {
        $sql = "SELECT *, DATE_FORMAT(tanggal_kegiatan, '%W, %d %M %Y') as tanggal, DATE_FORMAT(tanggal_kegiatan, '%H:%i') as waktu
                FROM jadwal_kegiatan
                WHERE id_kelas = '$id'";
        return $this->db->query($sql)->result_array();
    }

    public function getAllUser()
    {
        $sql = "SELECT user.*,detail_user.*
                FROM user,detail_user
                WHERE user.id_user = detail_user.id_user";
        return $this->db->query($sql)->result_array();
    }

    private function updateImage($id) 
    {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['remove_space'] = true;

        $data = $this->db->get_where('kelas',['id_kelas' => $id])->row();
        unlink("images/".$data->poster_kelas);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('poster')) {
            return $this->upload->data('file_name');
        }
    }

    public function updateKelas($id)
    {
        if(!empty($_FILES['poster']['name'])) {
            $data = [
                'judul_kelas' => $this->input->post('judul'),
                'deskripsi_kelas' => $this->input->post('deskripsi'),
                'kategori_kelas' => $this->input->post('kategori'),
                'poster_kelas' => $this->updateImage($id)
            ];
        }
        else {
            $data = [
                'judul_kelas' => $this->input->post('judul'),
                'deskripsi_kelas' => $this->input->post('deskripsi'),
                'kategori_kelas' => $this->input->post('kategori'),
                'poster_kelas' => $this->input->post('old_image')
            ];
        }

        $this->db->where('id_kelas',$id);
        $this->db->update('kelas',$data);
    }

    public function updateKegiatan($id)
    {
        $id = $this->input->post('id');
        foreach ($id as $value) {
            $data = [
                'deskripsi_kegiatan' => $this->input->post('deskripsi' . $value)
            ];

            $this->db->update('jadwal_kegiatan',$data);

            $value++;
        }
    }

    public function hapusKelas($id)
    {
        $this->db->delete('kelas',['id_kelas' => $id]);
    }

}

?>