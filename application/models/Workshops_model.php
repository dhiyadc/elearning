<?php
class workshops_model extends CI_Model
{
    public function getAllClasses()
    {
        return $this->db->get('workshop')->result_array();
    }

    public function getMyClasses()
    {
        $this->db->where('pembuat_workshop',$this->session->userdata('id_user'));
        return $this->db->get('workshop')->result_array();
    }

    public function getMyPrivateClasses()
    {
        $this->db->where('pembuat_workshop',$this->session->userdata('id_user'));
        $this->db->where('tipe_workshop', 2);
        return $this->db->get('workshop')->result_array();
    }

    public function getAllKegiatan()
    {
        return $this->db->get('jadwal_workshop')->result_array();
    }

    

    public function getKategori()
    {
        return $this->db->get('kategori_workshop')->result_array();
    }

    public function getJenis()
    {
        return $this->db->get('jenis_kelas')->result_array();
    }

    public function getStatus()
    {
        return $this->db->get('status_kegiatan')->result_array();
    }

    public function getAllHarga()
    {
        return $this->db->get('harga_workshop')->result_array();
    }

    public function getUserDetail($userId) {
        $this->db->select('*')
            ->from('user')
            ->join('detail_user', 'user.id_user = detail_user.id_user')
            ->where('user.id_user', $userId);
        return $this->db->get()->result_array();
    }

    public function getMyName()
    {
        $this->db->select('nama');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        return $this->db->get('detail_user')->result_array()[0];
    }

    public function getPeserta()
    {
        return $this->db->get('peserta_workshop')->result_array();
    }

    public function getHarga($id)
    {
        $this->db->where('id_workshop', $id);
        return $this->db->get('harga_workshop')->result_array();
    }

    public function getPesertaByUserIdClassId($id)
    {
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('id_workshop', $id);
        return $this->db->get('peserta_workshop')->result_array();
    }

    public function cekPeserta($id)
    {
        if ($this->db->get_where('peserta_workshop', ['id_workshop' => $id])->row_array() == null) {
            return true;
        } else {
            return false;
        }
    }




    public function getPesertaByUserId()
    {
        $this->db->select('id_workshop');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        return $this->db->get('peserta_workshop')->result_array();
    }

    public function getPesertaByClassId($id)
    {
        $this->db->where('id_workshop', $id);
        return $this->db->get('peserta_workshop')->result_array();
    }

    public function getClassById($id)
    {
        $this->db->where('id_workshop', $id);
        return $this->db->get('workshop')->result_array();
    }

    public function getPembuat()
    {
        return $this->db->get('detail_user')->result_array();
    }



    public function getKelasKegiatan($id)
    {
        $sql = "SELECT detail_user.nama, jadwal_workshop.id_kegiatan, jadwal_workshop.status_kegiatan, workshop.id_workshop, workshop.judul_workshop, workshop.poster_workshop, DATE_FORMAT(jadwal_workshop.tanggal_kegiatan, '%W, %d %M %Y (%H:%i)') as tanggal
                FROM jadwal_workshop, workshop, detail_user
                WHERE workshop.id_workshop = '$id' AND jadwal_workshop.id_workshop = workshop.id_workshop AND jadwal_workshop.status_kegiatan = 1 AND workshop.pembuat_workshop = detail_user.id_user";
        return $this->db->query($sql)->result_array();
    }

    public function createClass()
    {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['remove_space'] = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('poster')) {
            $file_name = $this->upload->data('file_name');

            if ($this->input->post('batas') == 0) {
                $data = [
                    'id_workshop' => uniqid(),
                    'pembuat_workshop' => $this->session->userdata('id_user'),
                    'judul_workshop' => $this->input->post('judul'),
                    'deskripsi_workshop' => $this->input->post('deskripsi'),
                    'kategori_workshop' => $this->input->post('kategori'),
                    'poster_workshop' => $file_name,
                    // 'jenis_kelas' => $this->input->post('jenis'),
                    'jenis_workshop' => 1,
                    'status_workshop' => 1,
                    'batas_jumlah' => 0,
                    'tipe_workshop' => $this->input->post('tipe')
                ];
            } else {
                $data = [
                    'id_workshop' => uniqid(),
                    'pembuat_workshop' => $this->session->userdata('id_user'),
                    'judul_workshop' => $this->input->post('judul'),
                    'deskripsi_workshop' => $this->input->post('deskripsi'),
                    'kategori_workshop' => $this->input->post('kategori'),
                    'poster_workshop' => $file_name,
                    // 'jenis_kelas' => $this->input->post('jenis'),
                    'jenis_workshop' => 1,
                    'status_workshop' => 1,
                    'batas_jumlah' => $this->input->post('jumlah_peserta'),
                    'tipe_workshop' => $this->input->post('tipe')
                ];
            }

            $this->db->insert('workshop', $data);

            $deskripsi_kegiatan = $this->input->post('deskripsi_kegiatan');
            $tanggal_kegiatan = $this->input->post('tanggal_kegiatan');
            $id_workshop = $this->getIdNewClass()['id_workshop'];
            $this->setKegiatan($id_workshop, $deskripsi_kegiatan, $tanggal_kegiatan);
            $this->setHarga($this->getIdNewClass()['id_workshop']);
        } else {
            return "fail";
        }
    }

    public function joinClass($id)
    {
        $data = [
            'id_workshop' => $id,
            'id_user' => $this->session->userdata('id_user')
        ];

        $this->db->insert('peserta_workshop', $data);
    }
    public function getIdNewClass()
    {
        $this->db->select('id_workshop');
        $this->db->where('pembuat_workshop', $this->session->userdata('id_user'));
        $this->db->order_by('id_workshop', 'DESC');
        $this->db->limit('1');
        return $this->db->get('workshop')->result_array()[0];
    }

    public function setHarga($id)
    {
        if (!empty($this->input->post('harga'))) {
            $harga_str = preg_replace("/[^0-9]/", "", $this->input->post('harga'));
            $data = [
                'id_workshop' => $id,
                'harga_workshop' => $harga_str
            ];
        } else {
            $data = [
                'id_workshop' => $id,
                'harga_workshop' => '0'
            ];
        }

        $this->db->insert('harga_workshop', $data);
    }


    public function setKegiatan($id_workshop, $deskripsi_kegiatan, $tanggal_kegiatan)
    {
        $id_kegiatan_uniq = uniqid();
        $data = [
            'id_kegiatan' => $id_kegiatan_uniq,
            'id_workshop' => $id_workshop,
            'deskripsi_kegiatan' => $deskripsi_kegiatan,
            'tanggal_kegiatan' => $tanggal_kegiatan . ":00",
            'status_kegiatan' => 3
        ];

        $this->db->insert('jadwal_workshop', $data);
    }

    public function updateKegiatan($id_kegiatan)
    {

            $data = [
                'deskripsi_kegiatan' => $this->input->post('deskripsi')
                
            ];
            
            $this->db->where('id_kegiatan',$id_kegiatan);
            $this->db->update('jadwal_workshop',$data);

        return "success";

    }

    public function getKegiatanByIdKegiatan($activityId) {
        $this->db->select("*, DATE_FORMAT(tanggal_kegiatan, '%W, %d %M %Y') as tanggal, DATE_FORMAT(tanggal_kegiatan, '%H:%i') as waktu")
            ->from('jadwal_workshop')
            ->where('id_kegiatan', $activityId);

        return $this->db->get()->result_array();
    }

    public function updateKegiatanStatus($activityId, $status) {
        $this->db->set('status_kegiatan', $status)->where('id_kegiatan', $activityId);
        return $this->db->update('jadwal_workshop');
    }

    public function updateClass($id)
    {
        if(!empty($_FILES['poster']['name'])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['remove_space'] = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('poster')) {
                $data = $this->db->get_where('workshop',['id_workshop' => $id])->row();
                unlink("assets/images/".$data->poster_kelas);

                $file_name = $this->upload->data('file_name');
                $data = [
                    'judul_workshop' => $this->input->post('judul'),
                    'deskripsi_workshop' => $this->input->post('deskripsi'),
                    'kategori_workshop' => $this->input->post('kategori'),
                    'poster_workshop' => $file_name
                ];
            } else {
                return "fail";
            }
           
        }
        else {
            $data = [
                'judul_workshop' => $this->input->post('judul'),
                'deskripsi_workshop' => $this->input->post('deskripsi'),
                'kategori_workshop' => $this->input->post('kategori'),
                'poster_workshop' => $this->input->post('old_image')
            ];
        }

        $this->db->where('id_workshop',$id);
        $this->db->update('workshop',$data);
    }


    public function getClassesbyCategories($kategori)
    {
        $sql = "SELECT workshop.id_workshop, workshop.judul_workshop, workshop.poster_workshop, workshop.deskripsi_workshop, kategori_workshop.nama_kategori, jenis_kelas.nama_jenis, harga_workshop.harga_workshop, COUNT(peserta_workshop.id_workshop) as 'peserta', status_kegiatan.nama_status
        FROM workshop
        LEFT JOIN kategori_workshop
                 ON kategori_workshop.id_kategori = workshop.kategori_workshop 
        LEFT JOIN jenis_kelas
                 ON jenis_kelas.id_jenis = workshop.jenis_workshop
        LEFT JOIN harga_workshop
                 ON harga_workshop.id_workshop = workshop.id_workshop
        LEFT JOIN peserta_workshop
                 ON peserta_workshop.id_workshop = workshop.id_workshop
        LEFT JOIN status_kegiatan
            ON status_kegiatan.id_status = workshop.status_workshop
        WHERE kategori_workshop.nama_kategori = '$kategori' AND workshop.tipe_workshop = 1
        GROUP BY workshop.id_workshop";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getClassesbySorting($sorting)
    {
        if ($sorting == "terbaru") {
            $sql = "SELECT workshop.id_workshop, workshop.judul_workshop, workshop.poster_workshop, workshop.deskripsi_workshop, kategori_workshop.nama_kategori, jenis_kelas.nama_jenis, harga_workshop.harga_workshop, COUNT(peserta_workshop.id_workshop) as 'peserta', status_kegiatan.nama_status
        FROM workshop
        LEFT JOIN kategori_workshop
                 ON kategori_workshop.id_kategori = workshop.kategori_workshop 
        LEFT JOIN jenis_kelas
                 ON jenis_kelas.id_jenis = workshop.jenis_workshop
        LEFT JOIN harga_workshop
                 ON harga_workshop.id_workshop = workshop.id_workshop
        LEFT JOIN peserta_workshop
                 ON peserta_workshop.id_workshop = workshop.id_workshop
        LEFT JOIN status_kegiatan
            ON status_kegiatan.id_status = workshop.status_workshop
        WHERE workshop.tipe_workshop = 1
        GROUP BY workshop.id_workshop
        ORDER BY workshop.id_workshop DESC";
            $query = $this->db->query($sql);
            return $query->result_array();
        } else if ($sorting == "terbaik") {
            $sql = "SELECT workshop.id_workshop, workshop.judul_workshop, workshop.poster_workshop, workshop.deskripsi_workshop, kategori_workshop.nama_kategori, jenis_kelas.nama_jenis, harga_workshop.harga_workshop, COUNT(workshop.id_workshop) as 'peserta', status_kegiatan.nama_status
            FROM workshop
            LEFT JOIN kategori_workshop
                    ON kategori_workshop.id_kategori = workshop.kategori_workshop 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = workshop.jenis_workshop
            LEFT JOIN harga_workshop
                    ON harga_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN peserta_workshop
                    ON peserta_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = workshop.status_workshop
            WHERE workshop.tipe_workshop = 1
            GROUP BY workshop.id_workshop
            ORDER BY COUNT(peserta_workshop.id_workshop) DESC
            LIMIT 12";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
    }

    public function getAllClassesDetail($keyword = null){
        if($keyword){
            $sql = "SELECT workshop.id_workshop, workshop.status_workshop, workshop.judul_workshop, workshop.poster_workshop, workshop.deskripsi_workshop, kategori_workshop.nama_kategori, jenis_kelas.nama_jenis, harga_workshop.harga_workshop, COUNT(peserta_workshop.id_workshop) as 'peserta', status_kegiatan.nama_status
            FROM workshop
            LEFT JOIN kategori_workshop
                    ON kategori_workshop.id_kategori = workshop.kategori_workshop 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = workshop.jenis_workshop
            LEFT JOIN harga_workshop
                    ON harga_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN peserta_workshop
                    ON peserta_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = workshop.status_workshop
                WHERE workshop.judul_workshop LIKE '%$keyword%' AND workshop.tipe_workshop = 1
            GROUP BY workshop.id_workshop";
            $query = $this->db->query($sql);
            return $query->result_array();
        } else {
            $sql = "SELECT workshop.id_workshop, workshop.judul_workshop, workshop.poster_workshop, workshop.deskripsi_workshop, kategori_workshop.nama_kategori, jenis_kelas.nama_jenis, harga_workshop.harga_workshop, COUNT(peserta_workshop.id_workshop) as 'peserta', status_kegiatan.nama_status
            FROM workshop
            LEFT JOIN kategori_workshop
                    ON kategori_workshop.id_kategori = workshop.kategori_workshop 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = workshop.jenis_workshop
            LEFT JOIN harga_workshop
                    ON harga_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN peserta_workshop
                    ON peserta_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = workshop.status_workshop
            WHERE workshop.tipe_workshop = 1
            GROUP BY workshop.id_workshop";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
    }

    public function getAllRandomClasses()
    {
        $sql = "SELECT workshop.id_workshop, workshop.judul_workshop, workshop.poster_workshop, workshop.deskripsi_workshop, kategori_workshop.nama_kategori, jenis_kelas.nama_jenis, harga_workshop.harga_workshop, COUNT(peserta_workshop.id_workshop) as 'peserta', status_kegiatan.nama_status
            FROM workshop
            LEFT JOIN kategori_workshop
                    ON kategori_workshop.id_kategori = workshop.kategori_workshop 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = workshop.jenis_workshop
            LEFT JOIN harga_workshop
                    ON harga_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN peserta_workshop
                    ON peserta_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = workshop.status_workshop
            WHERE workshop.tipe_workshop = 1
            GROUP BY workshop.id_workshop
        ORDER BY Rand()";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    
    public function getKegiatan($id)
    {
        $sql = "SELECT *, DATE_FORMAT(tanggal_kegiatan, '%W, %d %M %Y') as tanggal, DATE_FORMAT(tanggal_kegiatan, '%H:%i') as waktu
                FROM jadwal_workshop
                WHERE id_workshop = '$id'";
        return $this->db->query($sql)->result_array();
    }

    public function getTanggalKegiatan($id)
    {
        $data = $this->db->get_where('jadwal_workshop', ['id_workshop' => $id])->result_array();
        if ($data != null) {
            $selesai = true;
            foreach ($data as $key => $value) {
                if ($value['status_kegiatan'] == 1 || $value['status_kegiatan'] == 3) {
                    $selesai = false;
                    break;
                }
            }
        } else {
            $selesai = false;
        }

        $this->updateStatus($id, $selesai);
    }

    public function updateStatus($id, $selesai)
    {
        if ($selesai == true) {
            $data = [
                'status_workshop' => 2
            ];

            $this->db->where('id_workshop', $id);
            $this->db->update('workshop', $data);
        } else if ($selesai == false) {
            $data = [
                'status_workshop' => 1
            ];

            $this->db->where('id_workshop', $id);
            $this->db->update('workshop', $data);
        }
    }

    public function getAllTopClasses()
    {

        $sql = "SELECT workshop.id_workshop, workshop.judul_workshop, workshop.poster_workshop, workshop.deskripsi_workshop, kategori_workshop.nama_kategori, jenis_kelas.nama_jenis, harga_workshop.harga_workshop, COUNT(peserta_workshop.id_workshop) as 'peserta', status_kegiatan.nama_status
            FROM workshop
            LEFT JOIN kategori_workshop
                    ON kategori_workshop.id_kategori = workshop.kategori_workshop 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = workshop.jenis_workshop
            LEFT JOIN harga_workshop
                    ON harga_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN peserta_workshop
                    ON peserta_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = workshop.status_workshop
            GROUP BY workshop.id_workshop
            ORDER BY COUNT(peserta_workshop.id_workshop) DESC
            LIMIT 10";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getMyPrivateClassesDetail($keyword = null){
        if($keyword){
            $user = $this->session->userdata('id_user');
            $sql = "SELECT workshop.id_workshop, workshop.status_workshop, workshop.judul_workshop, workshop.poster_workshop, workshop.deskripsi_workshop, kategori_workshop.nama_kategori, jenis_kelas.nama_jenis, harga_workshop.harga_workshop, COUNT(peserta_workshop.id_workshop) as 'peserta'
            FROM workshop
            LEFT JOIN kategori_workshop
                    ON kategori_workshop.id_kategori = workshop.kategori_workshop 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = workshop.jenis_workshop
            LEFT JOIN harga_workshop
                    ON harga_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN peserta_workshop
                    ON peserta_workshop.id_workshop = workshop.id_workshop
                WHERE workshop.judul_workshop LIKE '%$keyword%' AND workshop.pembuat_workshop LIKE '$user' AND workshop.tipe_workshop = 2
            GROUP BY workshop.id_workshop";
            $query = $this->db->query($sql);
            return $query->result_array();
        } else {
            $user = $this->session->userdata('id_user');
            $sql = "SELECT workshop.id_workshop, workshop.status_workshop, workshop.judul_workshop, workshop.poster_workshop, workshop.deskripsi_workshop, kategori_workshop.nama_kategori, jenis_kelas.nama_jenis, harga_workshop.harga_workshop, COUNT(peserta_workshop.id_workshop) as 'peserta'
            FROM workshop
            LEFT JOIN kategori_workshop
                    ON kategori_workshop.id_kategori = workshop.kategori_workshop 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = workshop.jenis_workshop
            LEFT JOIN harga_workshop
                    ON harga_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN peserta_workshop
                    ON peserta_workshop.id_workshop = workshop.id_workshop
                WHERE workshop.pembuat_workshop LIKE '$user' AND workshop.tipe_workshop = 2
            GROUP BY workshop.id_workshop";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
    }

    public function getMyClassesDetail($keyword = null){
        if($keyword){
            $user = $this->session->userdata('id_user');
            $sql = "SELECT workshop.id_workshop, workshop.status_workshop, workshop.judul_workshop, workshop.poster_workshop, workshop.deskripsi_workshop, kategori_workshop.nama_kategori, jenis_kelas.nama_jenis, harga_workshop.harga_workshop, COUNT(peserta_workshop.id_workshop) as 'peserta'
            FROM workshop
            LEFT JOIN kategori_workshop
                    ON kategori_workshop.id_kategori = workshop.kategori_workshop 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = workshop.jenis_workshop
            LEFT JOIN harga_workshop
                    ON harga_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN peserta_workshop
                    ON peserta_workshop.id_workshop = workshop.id_workshop
                WHERE workshop.judul_workshop LIKE '%$keyword%' AND workshop.pembuat_workshop LIKE '$user' AND workshop.tipe_workshop = 1
            GROUP BY workshop.id_workshop";
            $query = $this->db->query($sql);
            return $query->result_array();
        } else {
            $user = $this->session->userdata('id_user');
            $sql = "SELECT workshop.id_workshop, workshop.status_workshop, workshop.judul_workshop, workshop.poster_workshop, workshop.deskripsi_workshop, kategori_workshop.nama_kategori, jenis_kelas.nama_jenis, harga_workshop.harga_workshop, COUNT(peserta_workshop.id_workshop) as 'peserta'
            FROM workshop
            LEFT JOIN kategori_workshop
                    ON kategori_workshop.id_kategori = workshop.kategori_workshop 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = workshop.jenis_workshop
            LEFT JOIN harga_workshop
                    ON harga_workshop.id_workshop = workshop.id_workshop
            LEFT JOIN peserta_workshop
                    ON peserta_workshop.id_workshop = workshop.id_workshop
                WHERE workshop.pembuat_workshop LIKE '$user' AND workshop.tipe_workshop = 1
            GROUP BY workshop.id_workshop";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
    }

    public function leaveClass($id)
    {
        $this->db->where('id_user',$this->session->userdata('id_user'));
        $this->db->where('id_workshop',$id);
        $this->db->delete('peserta_workshop');
    }
}
