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
    
    public function getAllClassesDetail($keyword = null){
        if($keyword){
            $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
            FROM kelas
            LEFT JOIN kategori_kelas
                    ON kategori_kelas.id_kategori = kelas.kategori_kelas 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = kelas.jenis_kelas
            LEFT JOIN harga_kelas
                    ON harga_kelas.id_kelas = kelas.id_kelas
            LEFT JOIN peserta
                    ON peserta.id_kelas = kelas.id_kelas
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = kelas.status_kelas
                WHERE kelas.judul_kelas LIKE '%$keyword%'
            GROUP BY kelas.id_kelas";
            $query = $this->db->query($sql);
            return $query->result_array();
        } else {
            $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
            FROM kelas
            LEFT JOIN kategori_kelas
                    ON kategori_kelas.id_kategori = kelas.kategori_kelas 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = kelas.jenis_kelas
            LEFT JOIN harga_kelas
                    ON harga_kelas.id_kelas = kelas.id_kelas
            LEFT JOIN peserta
                    ON peserta.id_kelas = kelas.id_kelas
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = kelas.status_kelas
            GROUP BY kelas.id_kelas";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
    }

    public function getAllRandomClasses(){
        $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
        FROM kelas
        LEFT JOIN kategori_kelas
                ON kategori_kelas.id_kategori = kelas.kategori_kelas 
        LEFT JOIN jenis_kelas
                ON jenis_kelas.id_jenis = kelas.jenis_kelas
        LEFT JOIN harga_kelas
                ON harga_kelas.id_kelas = kelas.id_kelas
        LEFT JOIN peserta
                ON peserta.id_kelas = kelas.id_kelas
        LEFT JOIN status_kegiatan
            ON status_kegiatan.id_status = kelas.status_kelas
        GROUP BY kelas.id_kelas
        ORDER BY Rand()";
            $query = $this->db->query($sql);
            return $query->result_array();
    }

    public function getAllTopClasses(){
        
            $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
            FROM kelas
            LEFT JOIN kategori_kelas
                    ON kategori_kelas.id_kategori = kelas.kategori_kelas 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = kelas.jenis_kelas
            LEFT JOIN harga_kelas
                    ON harga_kelas.id_kelas = kelas.id_kelas
            LEFT JOIN peserta
                    ON peserta.id_kelas = kelas.id_kelas
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = kelas.status_kelas
            GROUP BY kelas.id_kelas
            ORDER BY COUNT(peserta.id_kelas) DESC
            LIMIT 10";
            $query = $this->db->query($sql);
            return $query->result_array();
        
    }

    public function getClassesbyCategories($kategori)
    {
        $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
        FROM kelas
        LEFT JOIN kategori_kelas
                 ON kategori_kelas.id_kategori = kelas.kategori_kelas 
        LEFT JOIN jenis_kelas
                 ON jenis_kelas.id_jenis = kelas.jenis_kelas
        LEFT JOIN harga_kelas
                 ON harga_kelas.id_kelas = kelas.id_kelas
        LEFT JOIN peserta
                 ON peserta.id_kelas = kelas.id_kelas
        LEFT JOIN status_kegiatan
            ON status_kegiatan.id_status = kelas.status_kelas
        WHERE kategori_kelas.nama_kategori = '$kategori'
        GROUP BY kelas.id_kelas";
         $query = $this->db->query($sql);
         return $query->result_array();
    }

    public function getClassesbySorting($sorting)
    {
        if($sorting == "terbaru"){
        $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
        FROM kelas
        LEFT JOIN kategori_kelas
                 ON kategori_kelas.id_kategori = kelas.kategori_kelas 
        LEFT JOIN jenis_kelas
                 ON jenis_kelas.id_jenis = kelas.jenis_kelas
        LEFT JOIN harga_kelas
                 ON harga_kelas.id_kelas = kelas.id_kelas
        LEFT JOIN peserta
                 ON peserta.id_kelas = kelas.id_kelas
        LEFT JOIN status_kegiatan
            ON status_kegiatan.id_status = kelas.status_kelas
        GROUP BY kelas.id_kelas
        ORDER BY kelas.id_kelas DESC";
         $query = $this->db->query($sql);
         return $query->result_array();

        } else if ($sorting == "terbaik") {
         $sql = "SELECT kelas.id_kelas, kelas.judul_kelas, kelas.poster_kelas, kelas.deskripsi_kelas, kategori_kelas.nama_kategori, jenis_kelas.nama_jenis, harga_kelas.harga_kelas, COUNT(peserta.id_kelas) as 'peserta', status_kegiatan.nama_status
            FROM kelas
            LEFT JOIN kategori_kelas
                    ON kategori_kelas.id_kategori = kelas.kategori_kelas 
            LEFT JOIN jenis_kelas
                    ON jenis_kelas.id_jenis = kelas.jenis_kelas
            LEFT JOIN harga_kelas
                    ON harga_kelas.id_kelas = kelas.id_kelas
            LEFT JOIN peserta
                    ON peserta.id_kelas = kelas.id_kelas
            LEFT JOIN status_kegiatan
                ON status_kegiatan.id_status = kelas.status_kelas
            GROUP BY kelas.id_kelas
            ORDER BY COUNT(peserta.id_kelas) DESC
            LIMIT 12";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
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

    public function getMyName()
    {
        $this->db->select('nama');
        $this->db->where('id_user',$this->session->userdata('id_user'));
        return $this->db->get('detail_user')->result_array()[0];
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

    public function getUserDetail($userId) {
        $this->db->select('*')
            ->from('user')
            ->join('detail_user', 'user.id_user = detail_user.id_user')
            ->where('user.id_user', $userId);
        return $this->db->get()->result_array();
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

    public function getKegiatanByIdKegiatan($activityId) {
        $this->db->select("*, DATE_FORMAT(tanggal_kegiatan, '%W, %d %M %Y') as tanggal, DATE_FORMAT(tanggal_kegiatan, '%H:%i') as waktu")
            ->from('jadwal_kegiatan')
            ->where('id_kegiatan', $activityId);

        return $this->db->get()->result_array();
    }

    public function getAllKegiatan()
    {
        return $this->db->get('jadwal_kegiatan')->result_array();
    }

    public function getTanggalKegiatan($id)
    {
        $data = $this->db->get_where('jadwal_kegiatan',['id_kelas' => $id])->result_array();
        if ($data != null){
            $selesai = true;
            foreach ($data as $key => $value) {
                if($value['status_kegiatan'] == 1 || $value['status_kegiatan'] == 3){
                    $selesai = false;
                break;
                }
            }
        }
        else {
            $selesai = false;
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
        $config['upload_path'] = './assets/images/';
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
        
        if(!empty($this->input->post('addmore'))){
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
        $config['upload_path'] = './assets/images/';
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
            $harga_str = preg_replace("/[^0-9]/", "", $this->input->post('harga'));
            $data = [
                'id_kelas' => $id,
                'harga_kelas' => $harga_str
            ];
        }
        else {
            $data = [
                'id_kelas' => $id,
                'harga_kelas' => '0'
            ];
        }

        $this->db->insert('harga_kelas',$data);
    }
    
    public function setKegiatanByClass($id)
    {
        $data = [];
        $id_kegiatan_uniq = uniqid();

        if(!empty($_FILES['materi']['name'][0])) {
        $data = [
            'id_kegiatan' => $id_kegiatan_uniq,
            'id_kelas' => $id,
            'deskripsi_kegiatan' => $this->input->post('deskripsi'),
            'tanggal_kegiatan' => $this->input->post('tanggal') . ":00",
            'status_kegiatan' => 3
        ];
        
        $this->db->insert('jadwal_kegiatan',$data);
        $id_keg = $data['id_kegiatan'];
        }

        $count = count($_FILES['materi']['name']);
        for($i=0;$i<$count;$i++){
            if(!empty($_FILES['materi']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['materi']['name'][$i];
                $_FILES['file']['type'] = $_FILES['materi']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['materi']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['materi']['error'][$i];
                $_FILES['file']['size'] = $_FILES['materi']['size'][$i];

                $config['upload_path'] = './assets/docs/';
                $config['allowed_types'] = 'docx|pdf|pptx|doc|ppt';
                $config['max_size'] = '25000';
    
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $file_name = $this->upload->data('file_name');
                    // $data['totalFiles'][] = $file_name;
                    $fileArr[] = $file_name;
                    

                    $data = [
                        'id_materi' => uniqid(),
                        'url_materi' => $file_name,
                        'id_kelas' => $id,
                        'id_kegiatan' => $id_kegiatan_uniq
                    ];
                    $materi_id[] = $data['id_materi'];
                    $this->db->insert('materi',$data);
                } else {
                    $this->db->where('id_kegiatan', $id_keg);
                    $this->db->delete('jadwal_kegiatan');

                    $countFile = count($fileArr);
                    for($j = 0; $j < $countFile; $j++){
                        $this->db->where('id_materi', $materi_id[$j]);
                        $this->db->delete('materi');
                        unlink("assets/docs/".$fileArr[$j]);
                    }

                    return "fail";
                    
                    //return $_FILES['materi']['name'][$i];
                }
            }
            else {
                
                $data = [
                    'id_kegiatan' => $id_kegiatan_uniq,
                    'id_kelas' => $id,
                    'deskripsi_kegiatan' => $this->input->post('deskripsi'),
                    'tanggal_kegiatan' => $this->input->post('tanggal') . ":00",
                    'status_kegiatan' => 3
                ];
                
                $this->db->insert('jadwal_kegiatan',$data);
            }
            
        }
        //return $data['totalFiles'];
        return "success";
        
        
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
                    $id_kegiatan_uniq = uniqid();
                    $tanggal = $value['tanggal_kegiatan'];
                    $data = [
                        'id_kegiatan' => $id_kegiatan_uniq,
                        'id_kelas' => $id,
                        'deskripsi_kegiatan' => $deskripsi,
                        'tanggal_kegiatan' => $tanggal . ":00",
                        'status_kegiatan' => 3
                    ];

                    $this->db->insert('jadwal_kegiatan',$data);
                }

                // if(!empty($this->input->post('addmorefile'))){
                //     $this->setKegiatanFile($id, $id_kegiatan_uniq);
                // }
            }
            
        }
    }

    // public function setKegiatanFile($id, $id_kegiatan)
    // {
    //     if(!empty($this->input->post('addmorefile'))){
    //         foreach ($this->input->post('addmorefile') as $key => $value) {
    //             $data = [];

    //     $count = count($_FILES['materi']['name']);
    //     for($i=0;$i<$count;$i++){
    //         if(!empty($_FILES['materi']['name'][$i])) {
    //             $_FILES['file']['name'] = $_FILES['materi']['name'][$i];
    //             $_FILES['file']['type'] = $_FILES['materi']['type'][$i];
    //             $_FILES['file']['tmp_name'] = $_FILES['materi']['tmp_name'][$i];
    //             $_FILES['file']['error'] = $_FILES['materi']['error'][$i];
    //             $_FILES['file']['size'] = $_FILES['materi']['size'][$i];

    //             $config['upload_path'] = './assets/docs/';
    //             $config['allowed_types'] = 'docx|pdf|pptx|doc|ppt';
    //             $config['max_size'] = '25000';
    
    //             $this->load->library('upload', $config);
    //             if ($this->upload->do_upload('file')) {
    //                 $file_name = $this->upload->data('file_name');
    //                 // $data['totalFiles'][] = $file_name;
    //                 $fileArr[] = $file_name;
                    

    //                 $data = [
    //                     'id_materi' => uniqid(),
    //                     'url_materi' => $file_name,
    //                     'id_kelas' => $id,
    //                     'id_kegiatan' => $id_kegiatan
    //                 ];
    //                 $materi_id[] = $data['id_materi'];
    //                 $this->db->insert('materi',$data);
    //             } else {
    //                 $this->db->where('id_kegiatan', $id_keg);
    //                 $this->db->delete('jadwal_kegiatan');

    //                 $countFile = count($fileArr);
    //                 for($j = 0; $j < $countFile; $j++){
    //                     $this->db->where('id_materi', $materi_id[$j]);
    //                     $this->db->delete('materi');
    //                     unlink("assets/docs/".$fileArr[$j]);
    //                 }

    //                 return "fail";
                    
    //                 //return $_FILES['materi']['name'][$i];
    //             }
    //         }
    //     }
    //     //return $data['totalFiles'];
        
    //         }
    //         return "success";
    //     }
    // }



    public function updateKegiatan($id_kelas, $id_kegiatan)
    {
        

        $data = [];

        if(!empty($_FILES['materi']['name'][0])) {
            $data = [
                'deskripsi_kegiatan' => $this->input->post('deskripsi'),
                
            ];
            
            $this->db->where('id_kegiatan',$id_kegiatan);
            $this->db->update('jadwal_kegiatan',$data);
        }

        $count = count($_FILES['materi']['name']);
        for($i=0;$i<$count;$i++){
            if(!empty($_FILES['materi']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['materi']['name'][$i];
                $_FILES['file']['type'] = $_FILES['materi']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['materi']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['materi']['error'][$i];
                $_FILES['file']['size'] = $_FILES['materi']['size'][$i];

                $config['upload_path'] = './assets/docs/';
                $config['allowed_types'] = 'docx|pdf|pptx|doc|ppt';
                $config['max_size'] = '25000';
    
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $file_name = $this->upload->data('file_name');
                    // $data['totalFiles'][] = $file_name;
                    $fileArr[] = $file_name;
                    

                    $data = [
                        'id_materi' => uniqid(),
                        'url_materi' => $file_name,
                        'id_kelas' => $id_kelas,
                        'id_kegiatan' => $id_kegiatan
                    ];
                    $materi_id[] = $data['id_materi'];
                    $this->db->insert('materi',$data);
                } else {
                  
                    $countFile = count($fileArr);
                    for($j = 0; $j < $countFile; $j++){
                        $this->db->where('id_materi', $materi_id[$j]);
                        $this->db->delete('materi');
                        unlink("assets/docs/".$fileArr[$j]);
                    }

                    return "fail";
                    
                    //return $_FILES['materi']['name'][$i];
                }
            }
            else {
                
                $data = [
                    'deskripsi_kegiatan' => $this->input->post('deskripsi'),
                    
                ];
                
                $this->db->where('id_kegiatan',$id_kegiatan);
                $this->db->update('jadwal_kegiatan',$data);
            }
            
        }
        return "success";

    }

    public function insertFile($id_kelas, $id_kegiatan)
    {
        $id_kegiatan_uniq = $id_kegiatan;
        // Check form submit or not
    if($this->input->post('materi') != NULL ){
 
        $data = array();
  
        // Count total files
        $countfiles = count($_FILES['materi']['name']);
   
        // Looping all files
        for($i=0;$i<$countfiles;$i++){
   
          if(!empty($_FILES['materi']['name'][$i])){
   
            // Define new $_FILES array - $_FILES['file']
            $_FILES['file']['name'] = $_FILES['materi']['name'][$i];
                $_FILES['file']['type'] = $_FILES['materi']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['materi']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['materi']['error'][$i];
                $_FILES['file']['size'] = $_FILES['materi']['size'][$i];
  
            // Set preference
            $config['upload_path'] = './assets/docs/';
                $config['allowed_types'] = 'docx|pdf|pptx|doc|ppt';
                $config['max_size'] = '25000';
                $config['remove_space'] = true;
                $config['file_name'] = $_FILES['materi']['name'][$i];
   
            //Load upload library
            $this->load->library('upload',$config); 
   
            // File upload
            if($this->upload->do_upload('materi')){
              // Get data about the file
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];

              $data = [
                  'id_materi' => uniqid(),
                  'url_materi' => $filename,
                  'id_kelas' => $id_kelas,
                  'id_kegiatan' => $id_kegiatan_uniq
              ];
              
              $this->db->insert('materi',$data);
              // Initialize array
              $data['filenames'][] = $filename;
            } else {
                return "fail";
            }
          }
   
        }
   
        // load view
      }else{
  
        // load view
        return "fail";
      } 

    }

    public function updateKegiatanStatus($activityId, $status) {
        $this->db->set('status_kegiatan', $status)->where('id_kegiatan', $activityId);
        return $this->db->update('jadwal_kegiatan');
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

    public function getMateri($id_kelas)
    {
        $sql = "SELECT * FROM materi WHERE id_kelas = '$id_kelas'";
        return $this->db->query($sql)->result_array();
    }

    public function getMateribyKegiatan()
    {
        $sql = "SELECT materi.id_materi, jadwal_kegiatan.id_kegiatan
        FROM materi 
        LEFT JOIN jadwal_kegiatan
            ON materi.id_kegiatan = jadwal_kegiatan.id_kegiatan";

        return $this->db->query($sql)->result_array();
    }

    public function delMateri($url_materi)
    {
        

        unlink("assets/docs/".$url_materi);

        $sql = "DELETE FROM materi WHERE url_materi = '$url_materi'";

        return $this->db->query($sql);

    }
}