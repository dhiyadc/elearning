

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Seluruh User</h1>
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
                                                    <th>ID User</th>
                                                    <th>Nama</th>
                                                    <th>Nomor Telepon</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($user as $val) : ?>
                                                <tr>
                                                    <td><?= $val['id_user']; ?></td>
                                                    <td><?= $val['nama'] ?></td>
                                                    <td><?= $val['no_telepon'] ?></td>
                                                    <td><?= $val['email'] ?></td>
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
