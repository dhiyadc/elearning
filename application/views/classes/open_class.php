<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach ($kelas as $val) : ?>
        <title><?= $val['judul_kelas']; ?></title>
    <?php endforeach; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!-- <link href="<?= base_url() ?>assets/datetimepicker/bootstrap.min.css" rel="stylesheet" media="screen"> -->
    <link href="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>
<body>
    <?php foreach ($kelas as $val) : ?>
        <h3><?= $val['judul_kelas']; ?></h3>
        <img src="<?= base_url().'images/'.$val['poster_kelas']?>" alt="" height="400px">
        <p><?= $val['deskripsi_kelas']; ?></p>
        <br>
        <?php foreach ($kategori as $val2) : ?>
            <?php if ($val2['id_kategori'] == $val['kategori_kelas']) : ?> 
                <p>Kategori: <?= $val2['nama_kategori']; ?></p>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach ($pembuat as $val2) : ?>
            <?php if ($val2['id_user'] == $val['pembuat_kelas']) : ?> 
                <p>Pembuat: <?= $val2['nama']; ?></p>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach ($harga as $val2) : ?>
            <?php if ($val2['harga_kelas'] == 'Rp.0,00') : ?> 
                <p>Kelas Gratis</p>
            <?php else : ?>
                <p>Harga Kelas: <?= $val2['harga_kelas'] ?></p>
            <?php endif; ?>
        <?php endforeach; ?>
        
        <?php foreach ($status as $val2) : ?>
            <?php if ($val2['id_status'] == $val['status_kelas']) : ?> 
                <p>Status: <?= $val2['nama_status']; ?></p>
            <?php endif; ?>
        <?php endforeach; ?>

        <table border="1">
                <th>Deskripsi</th>
                <th>Hari/Tanggal</th>
                <th>Waktu</th>
                <th>Status</th>
            <?php foreach ($kegiatan as $val2) : ?>
                <tr>
                    <td><?= $val2['deskripsi_kegiatan']; ?></td>
                    <td><?= $val2['tanggal']; ?></td>
                    <td><?= $val2['waktu']; ?></td>
                    <?php foreach ($status as $val3) : ?>
                        <?php if ($val3['id_status'] == $val2['status_kegiatan']) : ?> 
                            <td><?= $val3['nama_status']; ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td>
                        <?php if ($val['pembuat_kelas'] == $this->session->userdata('id_user')) : ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editKegiatan<?= $val2['id_kegiatan']; ?>">Edit Kegiatan</button>
                            <div class="modal fade" id="editKegiatan<?= $val2['id_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url()?>classes/edit_kegiatan/<?= $val['id_kelas']; ?>/<?= $val2['id_kegiatan']; ?>" method="POST">
                                                Deskripsi Kegiatan: <input type="text" name="deskripsi" value="<?= $val2['deskripsi_kegiatan']; ?>" required >
                                                <br>
                                                <button>Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>

        <?php if ($val['pembuat_kelas'] != $this->session->userdata('id_user')) : ?>
            <?php if ($cek == true) : ?>
                <?php if ($val['jenis_kelas'] == 1) : ?>
                    <a href="<?= base_url()?>classes/join_class/<?= $val['id_kelas']; ?>">Ikut Kelas Ini</a>
                <?php else : ?>
                    <a href="<?= base_url()?>classes/pembayaran_kelas/<?= $val['id_kelas']; ?>">Ikut Kelas Ini</a>
                <?php endif; ?>
            <?php elseif ($peserta != null) : ?>
                <p>Anda telah mengikuti kelas ini</p>
            <?php elseif ($cek == false) : ?>
                <?php if ($val['jenis_kelas'] == 1) : ?>
                    <a href="<?= base_url()?>classes/join_class/<?= $val['id_kelas']; ?>">Ikut Kelas Ini</a>
                <?php else : ?>
                    <a href="<?= base_url()?>classes/pembayaran_kelas/<?= $val['id_kelas']; ?>">Ikut Kelas Ini</a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($val['pembuat_kelas'] == $this->session->userdata('id_user')) : ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKegiatan">Tambah Jadwal Kegiatan</button>
            <div class="modal fade" id="tambahKegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Atur Kegiatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url()?>classes/set_kegiatan/<?= $val['id_kelas'] ?>" method="POST">
                                Deskripsi Kegiatan: <input type="text" name="deskripsi" required><br>
                                <div class="input-group date form_datetime " data-date-format="yyyy/mm/dd hh:ii" data-link-field="dtp_input1">
                                    <input class="form-control" size="16" type="text" name="tanggal" readonly required>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                                <input type="hidden" id="dtp_input1"/>
                                <button>Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <a href="<?= base_url()?>classes/update_class/<?= $val['id_kelas'] ?>">Edit Kelas</a>
            <a href="<?= base_url()?>classes">Back</a>
        <?php else : ?>
            <a href="<?= base_url()?>">Back</a>
        <?php endif; ?>
    <?php endforeach; ?>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 0
    });
	$('.form_date').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</html>