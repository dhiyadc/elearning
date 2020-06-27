<?php if(isset($_SESSION['admin_logged_in'])) : ?>
    
    <?php $this->load->view('nonuser/admin/header'); ?>
            <div id="page-wrapper">
                <div class="container-fluid"><div class="row">
                    <div>
                        <div class="col-lg-12">
                            <h1 class="page-header">Workshop</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Data Workshop
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Workshop</th>
                                                    <th>Pembuat Workshop</th>
                                                    <th>Banyak Peserta Yang Join</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($kelas as $val) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $val['judul_workshop']; ?></td>
                                                    <td>
                                                        <?php foreach ($pembuat as $val2) {
                                                            if($val['pembuat_workshop'] == $val2['id_user']) {
                                                                echo $val2['nama'];
                                                            }
                                                        } 
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $x = 0;
                                                        foreach ($peserta as $val2) {
                                                            if($val['id_workshop'] == $val2['id_workshop']) {
                                                                $x++;
                                                            }
                                                        } 
                                                        echo $x;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/detail_workshop/<?= $val['id_workshop']; ?>"><i class="fa fa-fw" aria-hidden="true">&#xf06e</i></a>
                                                        <a href="<?= base_url() ?>admin/edit_workshop/<?= $val['id_workshop']; ?>"><i class="fa fa-fw" aria-hidden="true">&#xf040</i></a>
                                                        <a data-toggle='modal' data-target='#konfirmasi_hapus'data-href="<?= base_url() ?>admin/hapus_workshop/<?= $val['id_workshop']; ?>"><i class="fa fa-fw" aria-hidden="true">&#xf1f8</i></a>
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
            <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                    <center><a class="btn btn-danger btn-ok"><i class="fa fa-trash"></i> Hapus</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button></center>
                </div>
            </div>
        </div>
    </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    <?php $this->load->view('nonuser/admin/footer'); ?>
<?php endif; ?>

<script type="text/javascript">
    //Hapus Data
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
  </script>
