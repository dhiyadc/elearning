<?php $this->load->view('nonuser/admin/header'); ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Forms</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Basic Form Elements
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php foreach ($kelas as $val) : ?>
                                            <form enctype="multipart/form-data" action="<?= base_url()?>admin/edit_kelas_action/<?= $val['id_kelas']; ?>" method="post" role="form">
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input type="text" name="judul" value="<?= $val['judul_kelas']; ?>" required class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <textarea name="deskripsi" required class="form-control" rows="3"><?= $val['deskripsi_kelas']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Poster</label>
                                                    <input type="file" name="poster" accept=".png, .jpg, .jpeg">
                                                    <input type="hidden" name="old_image" value="<?= $val['poster_kelas'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select name="kategori" class="form-control">
                                                        <?php foreach ($kategori as $val2) : ?>
                                                            <?php $selected = ($val['kategori_kelas'] == $val2['id_kategori'])? "selected" : ""; ?>
                                                            <option value="<?= $val2['id_kategori']; ?>" <?= $selected ?>><?= $val2['nama_kategori']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <br>
                                                <!-- <div class="col-lg-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            Tabel Kegiatan
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Deskripsi</th>
                                                                            <th>Hari/Tanggal</th>
                                                                            <th>Waktu</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i = 1; ?>
                                                                        <?php foreach ($kegiatan as $val2) : ?>
                                                                            <tr>
                                                                                <td><?= $i; ?></td>
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <input type="hidden" name="id" value="<?= $val2['id_kegiatan'] ?>">
                                                                                        <textarea name="deskripsi_kegiatan" required class="form-control" rows="3"><?= $val2['deskripsi_kegiatan']; ?></textarea>
                                                                                    </div>
                                                                                </td>
                                                                                <td><?= $val2['tanggal']; ?></td>
                                                                                <td><?= $val2['waktu']; ?></td>
                                                                                <?php $i++; ?>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <center><button type="submit" class="btn btn-primary">Simpan</button></center>
                                            </form>
                                            <?php endforeach; ?>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
<?php $this->load->view('nonuser/admin/header'); ?>