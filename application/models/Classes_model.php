<?php

class Classes_model extends CI_Model {
    public function getAllClasses()
    {
        return $this->db->get('kelas')->result_array();
    }

    public function getMyClasses()
    {
        $this->db->where('pembuat_kelas',1);
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
            'pembuat_kelas' => 1,
            'judul_kelas' => $this->input->post('judul'),
            'deskripsi_kelas' => $this->input->post('deskripsi'),
            'kategori_kelas' => $this->input->post('kategori'),
            'poster_kelas' => $this->insertImage(),
            'jenis_kelas' => $this->input->post('jenis'),
            'status_kelas' => 1
        ];

        $this->db->insert('kelas',$data);
    }

    public function updateStatus($id)
    {
        $data = [
            'status_kelas' => $this->input->post('status')
        ];

        $this->db->where('id_kelas',$id);
        $this->db->update('kelas',$data);
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
                'poster_kelas' => $this->updateImage($id),
                'jenis_kelas' => $this->input->post('jenis')
            ];
        }
        else {
            $data = [
                'judul_kelas' => $this->input->post('judul'),
                'deskripsi_kelas' => $this->input->post('deskripsi'),
                'kategori_kelas' => $this->input->post('kategori'),
                'poster_kelas' => $this->input->post('old_image'),
                'jenis_kelas' => $this->input->post('jenis')
            ];
        }

        $this->db->where('id_kelas',$id);
        $this->db->update('kelas',$data);
    }

    public function deleteClass($id)
    {
        $data = $this->db->get_where('kelas',['id_kelas' => $id])->row();
        $deldata = $this->db->delete('kelas',['id_kelas'=>$id]);
        if($deldata){
            unlink("images/".$data->poster_kelas);
        }
    }
    
    public function setKegiatan($id)
    {
        $data = [
            'id_kegiatan' => uniqid(),
            'id_kelas' => $id,
            'deskripsi_kegiatan' => $this->input->post('deskripsi'),
            'tanggal_kegiatan' => $this->input->post('tanggal'),
            'status_kegiatan' => 1
        ];
        
        $this->db->insert('jadwal_kegiatan',$data);
    }

    public function getKegiatan($id)
    {
        $this->db->where('id_kelas',$id);
        return $this->db->get('jadwal_kegiatan')->result_array();
    }

    public function deleteKegiatan($id)
    {
        $this->db->where('id_kegiatan',$id);
        $this->db->delete('jadwal_kegiatan');
    }

    public function updateKegiatan($id)
    {
        $data = [
            'deskripsi_kegiatan' => $this->input->post('deskripsi'),
            'tanggal_kegiatan' => $this->input->post('tanggal'),
            'status_kegiatan' => $this->input->post('status')
        ];

        $this->db->where('id_kegiatan',$id);
        $this->db->update('jadwal_kegiatan',$data);
    }
}