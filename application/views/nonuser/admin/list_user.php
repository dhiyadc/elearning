<?php $this->load->view('nonuser/admin/header'); ?>
            <div id="page-wrapper">
                <div class="container-fluid"><div class="row">
                    <div>
                        <div class="col-lg-12">
                            <h1 class="page-header">User</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Data User
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>No. Telepon</th>
                                                    <th>Email</th>
                                                    <th>Kelas yg Dibuat</th>
                                                    <th>Kelas yg Diikuti</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($user as $val) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $val['nama']; ?></td>
                                                    <td><?= $val['no_telepon']; ?></td>
                                                    <td><?= $val['email']; ?></td>
                                                    <td><?php 
                                                        $x = 0;
                                                        foreach ($kelas as $val2) {
                                                            if($val['id_user'] == $val2['pembuat_kelas']) {
                                                                $x++;
                                                            }
                                                        }
                                                        echo $x;
                                                        ?>
                                                    </td>
                                                    <td><?php 
                                                        $x = 0;
                                                        foreach ($peserta as $val2) {
                                                            if($val['id_user'] == $val2['id_user']) {
                                                                $x++;
                                                            }
                                                        }
                                                        echo $x;
                                                        ?>
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

