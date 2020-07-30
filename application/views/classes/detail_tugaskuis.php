<meta name="viewport" content="width=device-width, initial-scale=1">


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




<section class="user_dashboard">

  <div class="col-lg-12" style="background-color: darkcyan; padding-left: 0px; padding-right: 0px;">
    <div class="card" style="border-radius: 0px; background-color: darkcyan;">
      <div class="container my-5 pt-5 pb-3 px-4 z-depth-1">


        <!--Section: Block Content-->
        <section>

          <!--Grid row-->
          <div class="row">

            <!--Grid column-->
            <div class="col-md-12 mb-4">

            <?php if($kelas != null) : ?>
              <?php foreach ($kelas as $val) : ?>
                <h4 class="text-center font-weight-bold mb-3 pt-5" style="color: white">Tugas kelas <?= $val['judul_kelas']; ?></h4>
              <?php endforeach; ?>
              <?php endif; ?>
              <div class="container my-5">


              </div>
              <!--Grid column-->


            </div>
            <!--Grid row-->

        </section>
        <!--Section: Block Content-->



      </div>
    </div>
  </div>





  <div class="container my-5">

    <?php if ($this->session->flashdata('success_kumpul')) : ?>
      <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('success_kumpul'); ?>
      </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('errorAPI')) : ?>
      <div class="alert alert-info" role="alert">
        <?= $this->session->flashdata('errorAPI'); ?>
      </div>
    <?php endif; ?>


    <!-- Nav tabs -------------- -->
    <ul style="list-style: outside none none;" class="nav nav-tabs" role="tablist">

      <li class="nav-item">
<?php if($tugas != null) : ?>
        <?php foreach ($tugas as $val) : ?>
          <?php if ($val['kategori'] == "Tugas") : ?>
            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true" style="font-size: 22px;">Tugas</a>
          <?php elseif ($val['kategori'] == "Tugas Akhir") : ?>
            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true" style="font-size: 22px;">Tugas Akhir</a>
          <?php else : ?>
            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true" style="font-size: 22px;">Quiz</a>
          <?php endif; ?>
          <?php endforeach; ?>
          <?php endif; ?>
      </li>


    </ul>

    <!-- Tab panes -------------- -->
    <div class="tab-content">
      <div class="tab-pane active" id="tab1" role="tabpanel" aria-expanded="true">

        <section class="projects no-padding-top">
          <div class="container">
            <!-- Project-->
            <?php if($kelas != null) : ?>
            <?php foreach ($kelas as $val) : ?>
              <?php if($tugas != null) : ?>
              <?php foreach ($tugas as $val2) : ?>
                <div class="project">
                  <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                      <div class="project-title d-flex align-items-center">
                        <div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="text">
                          <h3 class="h4" style="font-size: 20px;"><?= $val2['judul_tugas']; ?></h3><small><?= $val['judul_kelas']; ?></small>
                        </div>
                      </div>
                      <!-- <div class="project-date"><span class="hidden-sm-down">Hari Ini pada 4:24 AM</span></div> -->
                    </div>
                    <div class="right-col col-lg-6 d-flex align-items-center">


                      <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
                      <div class="project-progress">
                        <div class="time">
                          <?php if ($cek == null) : ?>
                            <div class="nilai">Belum Kumpul</span></div>
                          <?php else : ?>
                            <?php if($submit != null) : ?>
                            <?php foreach ($submit as $val3) : ?>
                              <?php if ($val2['id_tugas'] == $val3['id_tugas'] && $val3['id_user'] == $this->session->userdata('id_user')) : ?>
                                <?php if ($val3['nilai_tugas'] == "Belum Dinilai") : ?>
                                  <div class="nilai"><?= $val3['nilai_tugas']; ?></span></div>
                                <?php else : ?>
                                  <div class="nilai"><?= $val3['nilai_tugas']; ?>/100</span></div>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="time"><i class="fa fa-clock-o"></i> <?= $val2['deadline']; ?></div>
                    </div>

                    <div class="row d-flex ">
                      <div class="col-12 col-md-12 mb-2 mt-2">
                        <div class="card  h-100 border-light  bg-light shadow">
                          <div class="card-body d-flex-row">
                            <!-- <blockquote class="blockquote mb-4 pb-2">
                        <p class="mb-0 font-weight-bold ">Buatlah Sebuah Percobaan Dengan Menggunakan Hukum Newton</p>
                    </blockquote> -->
                            <?php if ($val2['url_tugas'] != null) : ?>
                              <div class="row">
                                <div class="col">
                                  <div class="col">
                                    <div class="notice notice-info">
                                      <div class="row mb-0" style="padding: 0px;">
                                        <!-- <img src="<?php echo base_url(); ?>assets/images/pdf.png" alt="..." class="img-fluid rounded-circle" style="width: 20px;"> -->
                                        <a href="<?= base_url() ?>classes/download_assignment/<?= $val2['url_tugas']; ?>"><?= $val2['url_tugas']; ?></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php endif; ?>
                            <div class="p-luar" style="margin-top: 25px;">
                              <div class="row">
                                <p class="card-text mb-5" style="margin-top: -25px; width: 980px;"><?= $val2['deskripsi_tugas']; ?></p>
                              </div>
                            </div>
                            <div class="w-100 pb-1">
                              <?php if($user != null) : ?>
                              <?php foreach ($user as $val3) : ?>
                                <footer class="blockquote-footer"><?= $val3['nama']; ?></footer>
                              <?php endforeach; ?>
                              <?php endif?>
                            </div>
                            <div class="d-flex align-items-center align-self-end">
                              <!-- <div class="meta.item mr-auto">
                      <a href="#" data-toggle="modal" data-target="#detailTugas<?= $val2['id_tugas']; ?>"><i class="fa  fa-tasks m-1"></i>Lihat Materi</a>
                      </div>   -->
                              <div class="meta-item ml-auto">
                                <?php if ($cek == null) : ?>
                                  <a href="#" data-toggle="modal" data-target="#detailTugas<?= $val2['id_tugas']; ?>"><i class="fa fa-paper-plane-o m-1"></i>Serahkan Jawaban</a>
                                <?php else : ?>
                                  <?php if($submit != null) : ?>
                                  <?php foreach ($submit as $val3) : ?>
                                    <?php if ($val2['id_tugas'] == $val3['id_tugas'] && $val3['id_user'] == $this->session->userdata('id_user')) : ?>
                                      <?php if ($val3['nilai_tugas'] == "Belum Dinilai") : ?>
                                        <a href="#" data-toggle="modal" data-target="#detailTugas<?= $val2['id_tugas']; ?>"><i class="fa fa-pencil m-1"></i>Ganti Jawaban</a>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                  <?php endforeach; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                                <div class="modal fade" id="detailTugas<?= $val2['id_tugas']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 90px;">
                                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <!--Content-->
                                    <div class="modal-content form-elegant">
                                      <!--Header-->
                                      <div class="modal-header text-center">
                                        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Kumpul Jawaban</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <!--Body-->
                                      <div class="modal-body mx-4">
                                        <!--Body-->
                                        <?php if ($this->session->flashdata('failedInputFile')) : ?>
                                          <div class="alert alert-danger"> <?= $this->session->flashdata('failedInputFile') ?> </div>
                                        <?php endif; ?>
                                        <!-- <p><strong><b>Kumpul Tugas Anda</b></strong></p> -->
                                        <?php if ($cek == null) : ?>
                                          <form enctype="multipart/form-data" action="<?= base_url() ?>classes/collect_assignment/<?= $val2['id_kelas'] ?>/<?= $val2['id_tugas'] ?>" method="POST">
                                            <div class="form-group">
                                              <label>Subjek</label>
                                              <input type="text" class="form-control" name="subjek" required>
                                            </div>
                                            <div class="form-group">
                                              <label>File (hanya pdf/doc/docx)</label>
                                              <input type="file" class="form-control" name="assignment" accept=".pdf, .doc, .docx" required>
                                            </div>
                                            <div class="text-center mb-3">
                                              <input type="submit" class="btn btn-light blue-gradient btn-block btn-rounded z-depth-1a" value="Serahkan Jawaban">
                                            </div>
                                          </form>
                                        <?php else : ?>
                                          <?php if($submit != null) : ?>
                                          <?php foreach ($submit as $val3) : ?>
                                            <?php if ($val2['id_tugas'] == $val3['id_tugas'] && $val3['id_user'] == $this->session->userdata('id_user')) : ?>
                                              <p>Jawaban</p>
                                              <p><a href="<?= base_url() ?>classes/download_assignment/<?= $val3['url_file']; ?>"><?= $val3['url_file']; ?></a></p>
                                              <!-- <form enctype="multipart/form-data" action="<?= base_url() ?>classes/collect_assignment/<?= $val2['id_kelas'] ?>/<?= $val2['id_tugas'] ?>" method="POST">
                                                        <div class="form-group">
                                                          <label>Subjek</label>
                                                            <input type="text" class="form-control" name="subjek" required>
                                                        </div>
                                                        <div class="form-group">
                                                          <label>File (hanya pdf/doc/docx)</label>
                                                            <input type="file" class="form-control" name="assignment" accept=".pdf, .doc, .docx" required>
                                                        </div> -->

                                              <div class="text-center mb-3">
                                                <!-- <input type="submit" class="btn btn-light blue-gradient btn-block btn-rounded z-depth-1a" value="Ganti Jawaban"> -->
                                                <a href="<?= base_url() ?>classes/hapus_jawaban/<?= $val['id_kelas']; ?>/<?= $val3['id_tugas']; ?>/<?= $val3['id_submit']; ?>" class="btn btn-danger blue-gradient btn-block btn-rounded z-depth-1a">Hapus Jawaban</a>
                                              </div>
                                              </form>
                                            <?php endif; ?>
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php if ($this->session->flashdata('failedInputFile')) { ?>
                    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
                    <script type="text/javascript">
                      $(window).on('load', function() {
                        $('#detailTugas<?= $val2['id_tugas']; ?>').modal('show');
                        console.log('ready');
                      });
                    </script>
                  <?php } ?>
                <?php endforeach; ?>
                <?php endif?>
                <?php endforeach; ?>
                <?php endif?>

                </div>
        </section>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>