
<link href="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<!-- Jumbotron -->
<div class="card-image bannerkelas">
  <div class="text-white text-center rgba-stylish-strong py-5 px-4">
    <div class="py-5">

      <div class="col-lg-6 pb-lg-4 pb-sm-3 ">
      <!-- <h5 class="h5 orange-text"><i class="fa fa-camera-retro"></i>#STAYATHOME</h5> -->
      <h1 class="card-title h2 my-4 py-5">#STAY AT HOME Upgrade Skill</h1>
      <p class="mb-4 pb-2 px-md-5 mx-md-5">Dapatkan Penawaran Kursus terbaik dan pengalaman terbaik disaat Pandemi dan Upgrade diri Kamu! .</p>

      </div>
    </div>
  </div>
</div>
<?php foreach ($tugas as $val) : ?>
<div class="container">
    <form action="<?= base_url()?>classes/edit_assignment_action/<?= $id ?>/<?= $val['id_tugas'] ?>" method="post" class="form-horizontal">
        <div class="row">
            <div class="col-md-3 mb-3 mt-5"><h2>Edit Tugas</h2><hr></div>
            <div class="col-md-6">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="namaclasss">Nama Tugas</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="text" name="judul" class="form-control" value="<?= $val['judul_tugas'] ?>" placeholder="" required autofocus>
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
                    <textarea  class="form-control" name="deskripsi" required style="height: 200px;"><?= $val['deskripsi_tugas']; ?></textarea>
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
                                <?php foreach ($kategori as $val2) : ?>
                                <label class="form-check">
                                    <?php $checked = ($val['kategori_tugas'] == $val2['id'])? "checked" : ""; ?>
                                    <input class="form-check-input" type="radio" name="kategori" value="<?= $val2['id']; ?>" <?= $checked; ?> required>
                                    <span class="form-check-label"><?= $val2['kategori_tugas']; ?></span>
                                </label>
                                <?php endforeach; ?>
                            </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="deadline" value="<?= $val['batas_pengiriman_tugas'] ?>">
        <!-- <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Batas Pengiriman Tugas</label>
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
        </div> -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i>Edit Tugas</button>
                <a href="<?= base_url()?>classes/list_tugas/<?= $id ?>" class="btn btn-blue-gradient"></i>Kembali</a>
            </div>
        </div>
    </form>
</div>
<?php endforeach; ?>
</section>

<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
        $('.form_datetime').datetimepicker({
            language: 'id',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 0
        });
</script>
