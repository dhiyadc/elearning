<?php

class Classes_model extends CI_Model {
    public function getAllClasses()
    {
        return $this->db->get('kelas')->result_array();
    }

    public function getAllHarga()
    {
        return $this->db->get('harga_kelas')->result_array();
    }

    public function getMyClasses()
    {
        $this->db->where('pembuat_kelas',$this->session->userdata('id_user'));
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

    public function getPesertaByClassId($id)
    {
        $this->db->where('id_kelas',$id);
        return $this->db->get('peserta')->result_array();
    }

    public function getPeserta()
    {
        return $this->db->get('peserta')->result_array();
    }

    public function getHarga($id)
    {
        $this->db->where('id_kelas',$id);
        return $this->db->get('harga_kelas')->result_array();
    }

    public function getIdNewClass()
    {
        $this->db->select('id_kelas');
        $this->db->where('pembuat_kelas',$this->session->userdata('id_user'));
        $this->db->order_by('id_kelas', 'DESC');
        $this->db->limit('1');
        return $this->db->get('kelas')->result_array()[0];
    }
    
    public function getKegiatan($id)
    {
        $sql = "SELECT *, DATE_FORMAT(tanggal_kegiatan, '%W, %d %M %Y') as tanggal, DATE_FORMAT(tanggal_kegiatan, '%H:%i') as waktu
                FROM jadwal_kegiatan
                WHERE id_kelas = '$id'";
        return $this->db->query($sql)->result_array();
    }

    public function getTanggalKegiatan($id)
    {
        $data = $this->db->get_where('jadwal_kegiatan',['id_kelas' => $id])->result_array();
        $selesai = true;
        foreach ($data as $key => $value) {
            if($value['tanggal_kegiatan'] > date("Y-m-d")){
                $selesai = false;
            break;
            }
        }

        $this->updateStatus($id,$selesai);
    }

    public function cekPeserta($id)
    {
        if ($this->db->get_where('peserta',['id_kelas' => $id])->row_array() == null) {
            return true;
        }
        else {
            return false;
        }
    }

    private function insertImage() 
    {
        $config['upload_path'] = './images/';
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
        $data = [
            'id_kelas' => uniqid(),
            'pembuat_kelas' => $this->session->userdata('id_user'),
            'judul_kelas' => $this->input->post('judul'),
            'deskripsi_kelas' => $this->input->post('deskripsi'),
            'kategori_kelas' => $this->input->post('kategori'),
            'poster_kelas' => $this->insertImage(),
            'jenis_kelas' => $this->input->post('jenis'),
            'status_kelas' => 1
        ];

        $this->db->insert('kelas',$data);
        
        if($this->input->post('addmore') == ""){
            $this->setKegiatan($this->getIdNewClass()['id_kelas']);
        }
        $this->setHarga($this->getIdNewClass()['id_kelas']);
    }

    public function updateStatus($id,$selesai)
    {
        if ($selesai == true) {
            $data = [
                'status_kelas' => 2
            ];
    
            $this->db->where('id_kelas',$id);
            $this->db->update('kelas',$data);
        }
        else if ($selesai == false) {
            $data = [
                'status_kelas' => 1
            ];
    
            $this->db->where('id_kelas',$id);
            $this->db->update('kelas',$data);
        }
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

    public function updateClass($id)
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

    public function setHarga($id)
    {
        if(!empty($this->input->post('harga'))) {
            $data = [
                'id_kelas' => $id,
                'harga_kelas' => $this->input->post('harga')
            ];
        }
        else {
            $data = [
                'id_kelas' => $id,
                'harga_kelas' => 'Rp.0,00'
            ];
        }

        $this->db->insert('harga_kelas',$data);
    }
    
    public function setKegiatanByClass($id)
    {
        $data = [
            'id_kegiatan' => uniqid(),
            'id_kelas' => $id,
            'deskripsi_kegiatan' => $this->input->post('deskripsi'),
            'tanggal_kegiatan' => $this->input->post('tanggal') . ":00",
            'status_kegiatan' => 1
        ];
        
        $this->db->insert('jadwal_kegiatan',$data);
    }

    public function setKegiatan($id)
    {
        if(!empty($this->input->post('addmore'))){
            foreach ($this->input->post('addmore') as $key => $value) {
                $i = $key++;
                if($i % 2 == 0) {
                    $deskripsi = $value['deskripsi_kegiatan'];
                }
                else {
                    $tanggal = $value['tanggal_kegiatan'];
                    $data = [
                        'id_kegiatan' => uniqid(),
                        'id_kelas' => $id,
                        'deskripsi_kegiatan' => $deskripsi,
                        'tanggal_kegiatan' => $tanggal . ":00",
                        'status_kegiatan' => 1
                    ];

                    $this->db->insert('jadwal_kegiatan',$data);
                }
            }
        }
    }

    public function updateKegiatan($id)
    {
        $data = [
            'deskripsi_kegiatan' => $this->input->post('deskripsi')
        ];

        $this->db->where('id_kegiatan',$id);
        $this->db->update('jadwal_kegiatan',$data);
    }

    public function joinClass($id)
    {
        $data = [
            'id_kelas' => $id,
            'id_user' => $this->session->userdata('id_user')
        ];

        $this->db->insert('peserta',$data);
    }

    public function leaveClass($id)
    {
        $this->db->where('id_user',$this->session->userdata('id_user'));
        $this->db->where('id_kelas',$id);
        $this->db->delete('peserta');
    }
}