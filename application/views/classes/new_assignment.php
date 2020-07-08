<link href="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<!-- Jumbotron -->
<div class="card-image bannerkelas">
    <div class="text-white text-center rgba-stylish-strong py-5 px-4">
        <div class="py-5">

            <div class="col-lg-6 pb-lg-4 pb-sm-3 ">
                <!-- <h5 class="h5 orange-text"><i class="fa fa-camera-retro"></i>#STAYATHOME</h5> -->
                <h1 style="color: black;" class="card-title h2 my-4 py-4"><strong>#Stay at home</strong><br> and <br><strong>#Upgrade your skill</strong></h1>
                <p class="mb-1 pb-2 px-md-5 mx-md-5" style="color: black; text-shadow: floralwhite; text-align: justify;">Kamu boleh dirumah aja, tapi skill kamu jangan begitu-begitu aja.
                    Ayo gabung dan <strong>#Upgrade</strong> skill kamu sekarang juga.</p>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <form enctype="multipart/form-data" action="<?= base_url() ?>classes/new_assignment_action/<?= $id ?>" method="post" class="form-horizontal">
        <div class="row">
            <div class="col-md-3 mb-3 mt-5">
                <h2>Buat Tugas</h2>
                <hr>
            </div>
            <div class="col-md-6">
            </div>
        </div>
        <?php if ($this->session->flashdata('failedInputFile')) : ?>
            <div class="alert alert-danger"> <?= $this->session->flashdata('failedInputFile') ?> </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="namaclasss">Nama Tugas</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="text" name="judul" class="form-control" placeholder="" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive mb-3">
                <label for="passwordnow">File Tugas (max. 25 MB)</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="file" name="url_tugas" accept=".pdf, .doc, .docx" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Deskripsi Tugas</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <textarea class="form-control ckeditor" id="ckeditor" name="deskripsi" required style="height: 200px;"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="newpassword1">Kategori Tugas</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="col-md-4">
                        <?php foreach ($kategori as $val) : ?>
                            <label class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" value="<?= $val['id']; ?>" required>
                                <span class="form-check-label"><?= $val['kategori_tugas']; ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Batas Pengiriman (Deadline) Tugas</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group date form_datetime " data-date-format="yyyy/mm/dd hh:ii" data-link-field="dtp_input1">
                            <input class="form-control" id="inputdatetimepicker" size="16" type="text" name="deadline" readonly required">
                            <span class="input-group-addon" style="width:40px;"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon" style="width:40px;"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i>Buat Tugas</button>
                <a href="<?= base_url() ?>classes/list_tugas/<?= $id ?>" class="btn btn-blue-gradient"></i>Kembali</a>
            </div>
        </div>
    </form>
</div>
</section>

<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language: 'id',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 0
    });
</script>