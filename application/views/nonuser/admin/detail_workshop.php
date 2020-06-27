<?php $this->load->view('nonuser/admin/header'); ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Detail Workshop</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <?php foreach ($kelas as $val) : ?>
                                        <center><b><?= $val['judul_workshop']; ?></b></center>
                                    <?php endforeach; ?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div id="morris-area-chart">
                                    <?php foreach ($kelas as $val) : ?>
                                        <center><img src="<?= base_url().'assets/images/'.$val['poster_workshop']?>" alt="" height="400px"></center>
                                        <br>
                                        <center><?= $val['deskripsi_workshop']; ?></center>
                                        <br>
                                        <?php foreach ($kategori as $val2) : ?>
                                            <?php if ($val2['id_kategori'] == $val['kategori_workshop']) : ?> 
                                                <p style="margin-left: 15px"><i class="fa fa-fw" aria-hidden="true">&#xf292</i> <?= $val2['nama_kategori']; ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php foreach ($pembuat as $val2) : ?>
                                            <?php if ($val2['id_user'] == $val['pembuat_workshop']) : ?> 
                                                <p style="margin-left: 15px"><i class="fa fa-fw" aria-hidden="true">&#xf183</i> <?= $val2['nama']; ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php foreach ($harga as $val2) : ?>
                                            <?php if ($val2['harga_workshop'] == 'Rp.0,00') : ?> 
                                                <p style="margin-left: 15px"><i class="fa fa-fw" aria-hidden="true">&#xf0d6</i> Gratis</p>
                                            <?php else : ?>
                                                <p style="margin-left: 15px"><i class="fa fa-fw" aria-hidden="true">&#xf0d6</i> <?= $val2['harga_workshop'] ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        
                                        <?php foreach ($status as $val2) : ?>
                                            <?php if ($val2['id_status'] == $val['status_workshop']) : ?> 
                                                <p style="margin-left: 15px"><i class="fa fa-fw" aria-hidden="true">&#xf044</i> <?= $val2['nama_status']; ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <br>
                                        <div class="col-lg-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Tabel Kegiatan
                                                </div>
                                                <!-- /.panel-heading -->
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Deskripsi</th>
                                                                    <th>Hari/Tanggal</th>
                                                                    <th>Waktu</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 1; ?>
                                                                <?php foreach ($kegiatan as $val2) : ?>
                                                                    <tr>
                                                                        <td><?= $i; ?></td>
                                                                        <td><?= $val2['deskripsi_kegiatan']; ?></td>
                                                                        <td><?= $val2['tanggal']; ?></td>
                                                                        <td><?= $val2['waktu']; ?></td>
                                                                        <?php foreach ($status as $val3) : ?>
                                                                            <?php if ($val3['id_status'] == $val2['status_kegiatan']) : ?> 
                                                                                <td><?= $val3['nama_status']; ?></td>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>
                                                                        <?php $i++; ?>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.panel-body -->
                                            </div>
                                            <!-- /.panel -->
                                        </div>
                                        <br>
                                        <center>
                                            <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_workshop/<?= $val['id_workshop']; ?>">Edit</a>
                                            <a class="btn btn-danger" href="<?= base_url() ?>admin/hapus_workshop/<?= $val['id_workshop']; ?>">Hapus</a>
                                        </center>
                                        <br>
                                    <?php endforeach; ?>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
<?php $this->load->view('nonuser/admin/footer'); ?>