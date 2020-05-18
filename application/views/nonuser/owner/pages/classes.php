

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Seluruh Kelas</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Table
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>ID Kelas</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Deskripsi Kelas</th>
                                                    <th>Kategori Kelas</th>
                                                    <th>Jenis Kelas</th>
                                                    <th>Harga Kelas</th>
                                                    <th>Jumlah Peserta</th>
                                                    <th>Status Kelas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($class as $val) : ?>
                                                <tr>
                                                    <td><?= $val['id_kelas']; ?></td>
                                                    <td><?= $val['judul_kelas'] ?></td>
                                                    <td><?= $val['deskripsi_kelas'] ?></td>
                                                    <td><?= $val['nama_kategori'] ?></td>
                                                    <td><?= $val['nama_jenis']; ?></td>
                                                    <td><?= $val['harga_kelas']; ?></td>
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
