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

<div class="container">
  <?php foreach ($kelas as $val) : ?>
    <form enctype="multipart/form-data" action="<?= base_url()?>workshops/update_workshop_action/<?= $val['id_workshop']; ?>" method="post" class="form-horizontal">
        <div class="row">
            <div class="col-md-3 mb-3 mt-5"><h2>Edit Workshop</h2><hr></div>
            <div class="col-md-6">
            </div>
        </div>

        <?php if($this->session->flashdata("invalidImage")){ ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata("invalidImage"); ?>
        </div>
        <?php } ?>

        <div class="row">
            <div class="col-md-3 field-label-responsive mb-3">
                <label for="passwordnow">Nama Author</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <label for=""><?= $pembuat['nama']; ?></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive mb-3">
                <label for="passwordnow">Poster Workshop (max. 3 MB)</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input type="file" name="poster" accept=".png, .jpg, .jpeg" class="form-control-file" id="exampleFormControlFile1">
                    <input type="hidden" name="old_image" value="<?= $val['poster_workshop'] ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="namaclasss">Nama Workshop</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                      
                        <input type="text" value="<?= $val['judul_workshop']; ?>" name="judul" class="form-control" id="nameclass"
                               placeholder="" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Kategori Workshop</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <select name="kategori">
                                    <?php foreach ($kategori as $val2) : ?>
                                        <?php $selected = ($val['kategori_workshop'] == $val2['id_kategori'])? "selected" : ""; ?>
                                        <option class="col-md-4" value="<?= $val2['id_kategori']; ?>" <?= $selected; ?>><?= $val2['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                            </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Deskripsi Workshop</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <textarea class="form-control ckeditor" id="ckeditor" name="deskripsi" required style="height: 200px;"><?= $val['deskripsi_workshop']; ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i>Edit Workshop</button>
                <a href="<?= base_url()?>workshops/open_workshop/<?= $val['id_workshop'] ?>" class="btn btn-blue-gradient"></i>Kembali</a>
            </div>
        </div>
    </form>
  <?php endforeach; ?>
</div>
</section>

<script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>