 <?php $data = [];
        $id_kegiatan_uniq = uniqid();
        $fileArr[] = "";
        if (!empty($_FILES['materi']['name'][0])) {
            $data = [
                'id_kegiatan' => $id_kegiatan_uniq,
                'id_kelas' => $id,
                'deskripsi_kegiatan' => $this->input->post('deskripsi'),
                'tanggal_kegiatan' => $this->input->post('tanggal') . ":00",
                'status_kegiatan' => 3
            ];

            if ($this->http_request_post($data, "classes/open_class/kegiatan/class") == null)
                return 'server_error';

            $id_keg = $data['id_kegiatan'];

            $video = $this->input->post('video');
            if ($video != 0 || $video != null) {

                $str_arr = explode(",", $video);
                $countvideo = count($str_arr);
                for ($j = 0; $j < $countvideo; $j++) {
                    $data = [
                        'id_materi' => uniqid(),
                        'url_materi' => $str_arr[$j],
                        'id_kelas' => $id,
                        'id_kegiatan' => $id_kegiatan_uniq,
                        'kategori_materi' => 2
                    ];
                    $materi_id[] = $data['id_materi'];
                    if ($this->http_request_post($data, "classes/open_class/materi") == null)
                        return 'server_error';
                }
            }
        }

        $count = count($_FILES['materi']['name']);
        for ($i = 0; $i < $count; $i++) {
            if (!empty($_FILES['materi']['name'][$i])) {
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
                    $fileArr = $file_name;


                    $data = [
                        'id_materi' => uniqid(),
                        'url_materi' => $file_name,
                        'id_kelas' => $id,
                        'id_kegiatan' => $id_kegiatan_uniq,
                        'kategori_materi' => 1
                    ];
                    $materi_id[] = $data['id_materi'];
                    if ($this->http_request_post($data, "classes/open_class/materi") == null)
                        return 'server_error';
                } else {
                    if ($this->http_request_delete("classes/open_class/kegiatan/$id_keg") == null)
                        return 'server_error';
                    $countFile = count($fileArr);
                    for ($j = 0; $j < $countFile; $j++) {
                        if ($this->http_request_delete("classes/open_class/materi/$materi_id[$j]") == null)
                            return 'server_error';
                        unlink("assets/docs/" . $fileArr[$j]);
                    }
                    return "error";

                    //return $_FILES['materi']['name'][$i];
                }
            } else {
                $data = [
                    'id_kegiatan' => $id_kegiatan_uniq,
                    'id_kelas' => $id,
                    'deskripsi_kegiatan' => $this->input->post('deskripsi'),
                    'tanggal_kegiatan' => $this->input->post('tanggal') . ":00",
                    'status_kegiatan' => 3
                ];

                if ($this->http_request_post($data, "classes/open_class/kegiatan/class") == null)
                    return 'server_error';

                $video = $this->input->post('video');
                if ($video != 0 || $video != null) {

                    $str_arr = explode(",", $video);
                    $countvideo = count($str_arr);
                    for ($j = 0; $j < $countvideo; $j++) {
                        $data = [
                            'id_materi' => uniqid(),
                            'url_materi' => $str_arr[$j],
                            'id_kelas' => $id,
                            'id_kegiatan' => $id_kegiatan_uniq,
                            'kategori_materi' => 2
                        ];
                        $materi_id[] = $data['id_materi'];
                        if ($this->http_request_post($data, "classes/open_class/materi") == null)
                            return 'server_error';
                    }
                }
            }
        }
        //return $data['totalFiles'];
        return "success";
    }