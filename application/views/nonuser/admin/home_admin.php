
<?php if(isset($_SESSION['admin_logged_in'])) : ?>
    <?php $this->load->view('nonuser/admin/header'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Dashboard Admin</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
    <?php $this->load->view('nonuser/admin/footer'); ?>
<?php endif; ?>
