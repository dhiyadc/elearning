<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<section class="user_dashboard">

  <div class="col-lg-12" style="background-color: darkcyan;" >
    <div class="card" style="border-radius: 0px; background-color: darkcyan;"> 
    <div class="container my-5 pt-5 pb-3 px-4 ">



<section>

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-md-12 mb-4">

        
        <?php foreach ($kelas as $val) : ?>
          <h4 class="text-center font-weight-bold mb-4" style="color: white">Tugas kelas <?= $val['judul_kelas']; ?></h4>
        <?php endforeach; ?>
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
<?php foreach ($kelas as $val) : ?>
  <?php if ($val['pembuat_kelas'] == $this->session->userdata('id_user')) : ?>
    <div class="text-right">
      <a href="<?= base_url() ?>classes/new_assignment/<?= $val['id_kelas']; ?>" class="btn btn-info" style="width: 200px;">Buat Tugas / Quiz</a>
      <a href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas']; ?>" class="btn btn-danger" style="width: 200px">Kembali ke kelas</a>
    </div>
  <?php else : ?>
    <div class="text-right">
    <a href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas']; ?>" class="btn btn-danger">Kembali ke kelas</a>
    </div>
  <?php endif; ?>
  
<?php endforeach; ?>

<!-- Nav tabs -------------- -->
<ul style="list-style: outside none none;" class="nav nav-tabs" role="tablist">
    
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true" style="font-size: 22px;">Tugas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-expanded="false" style="font-size: 22px;">Quiz</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-expanded="false" style="font-size: 22px;">Tugas Akhir</a>
    </li>
    
</ul>
<!-- Tab panes -------------- -->
<div class="tab-content">
    <div class="tab-pane active" id="tab1" role="tabpanel" aria-expanded="true">

    <section class="projects no-padding-top">
    <div class="container">
    <?php foreach ($kelas as $val) : ?>
      <?php $i = 0; ?>
        <?php foreach ($tugas as $val2) : ?>
          <?php if ($val2['kategori'] == "Tugas") : ?>
            <!-- Project-->
            <div class="project">
              <div class="row bg-white has-shadow">
                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                  <div class="project-title d-flex align-items-center">
                    <div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="text">
                      <?php if ($val['pembuat_kelas'] != $this->session->userdata('id_user')) : ?>
                        <a href="<?= base_url()?>classes/detail_tugaskuis/<?= $val['id_kelas']; ?>/<?= $val2['id_tugas']; ?>"><h3 class="h4" style="font-size: 20px;"><?= $val2['judul_tugas']; ?></h3><small><?= $val['judul_kelas']; ?></small></a>
                      <?php else: ?>
                        <a href="<?= base_url()?>classes/detail_tugaskuisguru/<?= $val['id_kelas']; ?>/<?= $val2['id_tugas']; ?>"><h3 class="h4" style="font-size: 20px;"><?= $val2['judul_tugas']; ?></h3><small><?= $val['judul_kelas']; ?></small></a>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php if ($val['pembuat_kelas'] == $this->session->userdata('id_user')) : ?>
                  <div class="project-date text-right">
                  <span class="hidden-sm-down">
                    <div class="time">
                    <div class="row mt-3">
                      <div class="col-sm-6">
                      <a href="<?= base_url() ?>classes/edit_assignment/<?= $val2['id_kelas']; ?>/<?= $val2['id_tugas']; ?>">Edit</a><br>
                      </div>
                      <div class="col-sm-6">
                      <a href="<?= base_url() ?>classes/del_assignment/<?= $val2['id_kelas']; ?>/<?= $val2['id_tugas']; ?>">Hapus</a>
                      </div>
                    </div>
                    </div>
                    </span>
                  </div>
                  <?php endif; ?>
                </div>
                <div class="right-col col-lg-6 d-flex align-items-center">
                  
              
                  <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
                  <div class="project-progress">
                    <div class="time">
                    <?php if ($val['pembuat_kelas'] != $this->session->userdata('id_user')) : ?>
                      <?php if ($cek[$i] == null) : ?>
                          <div class="nilai">Belum Kumpul</span></div>
                        <?php else : ?>
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
                      <?php else : ?>
                        <?php $x = 0;
                          foreach ($submit as $val3) {
                            if ($val2['id_tugas'] == $val3['id_tugas']) {
                              $x++;
                            }
                          } ?>
                        <div class="nilai"><?= $x; ?>/<?= count($peserta); ?> Siswa</span></div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="time"><i class="fa fa-clock-o"></i> <?= $val2['deadline']; ?>  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php $i++; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </section>
    
</div>

<div class="tab-pane" id="tab2" role="tabpanel" aria-expanded="false">
                      
<section class="projects no-padding-top">
<div class="container">
    <?php foreach ($kelas as $val) : ?>
      <?php $i = 0; ?>
        <?php foreach ($tugas as $val2) : ?>
          <?php if ($val2['kategori'] == "Kuis") : ?>
            <!-- Project-->
            <div class="project">
              <div class="row bg-white has-shadow">
                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                  <div class="project-title d-flex align-items-center">
                    <div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="text">
                      <?php if ($val['pembuat_kelas'] != $this->session->userdata('id_user')) : ?>
                        <a href="<?= base_url()?>classes/detail_tugaskuis/<?= $val['id_kelas']; ?>/<?= $val2['id_tugas']; ?>"><h3 class="h4" style="font-size: 20px;"><?= $val2['judul_tugas']; ?></h3><small><?= $val['judul_kelas']; ?></small></a>
                      <?php else: ?>
                        <a href="<?= base_url()?>classes/detail_tugaskuisguru/<?= $val['id_kelas']; ?>/<?= $val2['id_tugas']; ?>"><h3 class="h4" style="font-size: 20px;"><?= $val2['judul_tugas']; ?></h3><small><?= $val['judul_kelas']; ?></small></a>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php if ($val['pembuat_kelas'] == $this->session->userdata('id_user')) : ?>
                    <div class="project-date text-right">
                    <span class="hidden-sm-down">
                    <div class="time">
                    <div class="row mt-3">
                      <div class="col-sm-6">
                      <a href="<?= base_url() ?>classes/edit_assignment/<?= $val2['id_kelas']; ?>/<?= $val2['id_tugas']; ?>">Edit</a><br>
                      </div>
                      <div class="col-sm-6">
                      <a href="<?= base_url() ?>classes/del_assignment/<?= $val2['id_kelas']; ?>/<?= $val2['id_tugas']; ?>">Hapus</a>
                      </div>
                    </div>
                    </div>
                    </span>
                  </div>
                  <?php endif; ?>
                </div>
                <div class="right-col col-lg-6 d-flex align-items-center">
                  
              
                  <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
                  <div class="project-progress">
                    <div class="time">
                    <?php if ($val['pembuat_kelas'] != $this->session->userdata('id_user')) : ?>
                      <?php if ($cek[$i] == null) : ?>
                        <div class="nilai">Belum Kumpul</span></div>
                      <?php else : ?>
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
                    <?php else : ?>
                      <?php $x = 0;
                        foreach ($submit as $val3) {
                          if ($val2['id_tugas'] == $val3['id_tugas']) {
                            $x++;
                          }
                        } ?>
                      <div class="nilai"><?= $x; ?>/<?= count($peserta); ?> Siswa</span></div>
                    <?php endif; ?>
                    </div>
                  </div>
                  <div class="time"><i class="fa fa-clock-o"></i> <?= $val2['deadline']; ?></div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php $i++; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
 
</section>
</div>


<div class="tab-pane" id="tab3" role="tabpanel" aria-expanded="false">
                      
<section class="projects no-padding-top">
<div class="container">
    <?php foreach ($kelas as $val) : ?>
      <?php $i = 0; ?>
        <?php foreach ($tugas as $val2) : ?>
          <?php if ($val2['kategori'] == "Tugas Akhir") : ?>
            <!-- Project-->
            <div class="project">
              <div class="row bg-white has-shadow">
                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                  <div class="project-title d-flex align-items-center">
                    <div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="text">
                      <?php if ($val['pembuat_kelas'] != $this->session->userdata('id_user')) : ?>
                        <a href="<?= base_url()?>classes/detail_tugaskuis/<?= $val['id_kelas']; ?>/<?= $val2['id_tugas']; ?>"><h3 class="h4" style="font-size: 20px;"><?= $val2['judul_tugas']; ?></h3><small><?= $val['judul_kelas']; ?></small></a>
                      <?php else: ?>
                        <a href="<?= base_url()?>classes/detail_tugaskuisguru/<?= $val['id_kelas']; ?>/<?= $val2['id_tugas']; ?>"><h3 class="h4" style="font-size: 20px;"><?= $val2['judul_tugas']; ?></h3><small><?= $val['judul_kelas']; ?></small></a>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php if ($val['pembuat_kelas'] == $this->session->userdata('id_user')) : ?>
                    <div class="project-date text-right">
                    <span class="hidden-sm-down">
                    <div class="time">
                    <div class="row mt-3">
                      <div class="col-sm-6">
                      <a href="<?= base_url() ?>classes/edit_assignment/<?= $val2['id_kelas']; ?>/<?= $val2['id_tugas']; ?>">Edit</a><br>
                      </div>
                      <div class="col-sm-6">
                      <a href="<?= base_url() ?>classes/del_assignment/<?= $val2['id_kelas']; ?>/<?= $val2['id_tugas']; ?>">Hapus</a>
                      </div>
                    </div>
                    </div>
                    </span>
                  </div>
                  <?php endif; ?>
                </div>
                <div class="right-col col-lg-6 d-flex align-items-center">
                  
              
                  <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
                  <div class="project-progress">
                    <div class="time">
                    <?php if ($val['pembuat_kelas'] != $this->session->userdata('id_user')) : ?>
                      <?php if ($cek[$i] == null) : ?>
                        <div class="nilai">Belum Kumpul</span></div>
                      <?php else : ?>
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
                    <?php else : ?>
                      <?php $x = 0;
                        foreach ($submit as $val3) {
                          if ($val2['id_tugas'] == $val3['id_tugas']) {
                            $x++;
                          }
                        } ?>
                      <div class="nilai"><?= $x; ?>/<?= count($peserta); ?> Siswa</span></div>
                    <?php endif; ?>
                    </div>
                  </div>
                  <div class="time"><i class="fa fa-clock-o"></i> <?= $val2['deadline']; ?></div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php $i++; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
 
</section>
</div>
     
   
    
</div>


    <!-- <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contact">Gabung Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p for="msj">Silahkan Masukan Kode Kelas</p>
                    </div>
                    <div class="form-group">
                        <label for="txtFullname">Kode Kelas</label>
                        <input type="text" id="txtFullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Password Kelas</label>
                        <input type="text" id="txtEmail" class="form-control">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" (click)="openModal()" data-dismiss="modal">Gabung</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div> -->



    
    
    </div>

    




</div>
</section>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>