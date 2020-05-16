
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

<section class="buatkelas_sec">
    <div class="row">
        <div class="col">
        <div class="col-lg-12 ml-auto mt-5 mb-4" data-aos="fade-up" data-aos-delay="500">
            <div class="container">
            <?php foreach ($kelas as $val) : ?>
                  <form enctype="multipart/form-data" action="<?= base_url()?>classes/update_class_action/<?= $val['id_kelas']; ?>" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4 text-center">Edit Kelas</h3>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control" name="judul" value="<?= $val['judul_kelas']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Kelas</label>
                        <textarea  class="form-control" name="deskripsi" required><?= $val['deskripsi_kelas']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Poster Kelas</label>
                        <input type="file" name="poster" accept=".png, .jpg, .jpeg" class="form-control-file" id="exampleFormControlFile1">
                        <input type="hidden" name="old_image" value="<?= $val['poster_kelas'] ?>"><br>
                    </div>
                    <div class="form-group">
                        <label>Kategori Kelas</label>
                        <select name="kategori">
                            <?php foreach ($kategori as $val2) : ?>
                                <?php $selected = ($val['kategori_kelas'] == $val2['id_kategori'])? "selected" : ""; ?>
                                <option class="col-md-4" value="<?= $val2['id_kategori']; ?>" <?= $selected; ?>><?= $val2['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group text-center">
                      <input type="submit" class="btn btn-dark btn-pill" value="Edit Kelas">
                      <a class="btn btn-light btn-pill" href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas']; ?>">Back</a>
                    </div>
                  </form>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
