<?php if(isset($_SESSION['admin_logged_in'])) : ?>
    <?php $this->load->view('nonuser/admin/header'); ?>
            <div id="page-wrapper">
                <div class="container-fluid"><div class="row">
                    <div>
                        <div class="col-lg-12">
                            <h1 class="page-header">Kelas</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Data Kelas
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Pembuat Kelas</th>
                                                    <th>Banyak Peserta Yang Join</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($kelas as $val) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $val['judul_kelas']; ?></td>
                                                    <td>
                                                        <?php foreach ($pembuat as $val2) {
                                                            if($val['pembuat_kelas'] == $val2['id_user']) {
                                                                echo $val2['nama'];
                                                            }
                                                        } 
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $x = 0;
                                                        foreach ($peserta as $val2) {
                                                            if($val['id_kelas'] == $val2['id_kelas']) {
                                                                $x++;
                                                            }
                                                        } 
                                                        echo $x;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/detail_kelas/<?= $val['id_kelas']; ?>"><i class="fa fa-fw" aria-hidden="true">&#xf06e</i></a>
                                                        <a href="<?= base_url() ?>admin/edit_kelas/<?= $val['id_kelas']; ?>"><i class="fa fa-fw" aria-hidden="true">&#xf040</i></a>
                                                        <a href="<?= base_url() ?>admin/hapus_kelas/<?= $val['id_kelas']; ?>"><i class="fa fa-fw" aria-hidden="true">&#xf1f8</i></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
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
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    <?php $this->load->view('nonuser/admin/footer'); ?>
<?php endif; ?>
