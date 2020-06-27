

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Seluruh Workshop</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>ID Workshop</th>
                                                    <th>Nama Workshop</th>
                                                    <th>Deskripsi Workshop</th>
                                                    <th>Kategori Workshop</th>
                                                    <th>Jenis Workshop</th>
                                                    <th>Harga Workshop</th>
                                                    <th>Jumlah Peserta</th>
                                                    <th>Status Workshop</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($class as $val) : ?>
                                                <tr>
                                                    <td><?= $val['id_workshop']; ?></td>
                                                    <td><?= $val['judul_workshop'] ?></td>
                                                    <td><?= $val['deskripsi_workshop'] ?></td>
                                                    <td><?= $val['nama_kategori'] ?></td>
                                                    <td><?= $val['nama_jenis']; ?></td>
                                                    <td><?= $val['harga_workshop']; ?></td>
                                                    <td><?= $val['peserta']; ?></td>
                                                    <td><?= $val['nama_status']; ?></td>
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
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        

    </body>
</html>
