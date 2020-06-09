<meta name="viewport" content="width=device-width, initial-scale=1">


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




<section class="user_dashboard">
<div class="row mt-0">
  <div class="col-lg-12" style="background-color: aquamarine;" >
    <div class="card" style="border-radius: 0px; background-color: darkcyan;"> 
    <div class="container my-5 pt-5 pb-3 px-4 z-depth-1">


<!--Section: Block Content-->
<section>

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-md-12 mb-4">

        <h5 class="text-center font-weight-bold mb-4" style="color: white">Tugas Saya</h5>
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
</div>


  

 
<div class="container my-5">



<!-- Nav tabs -------------- -->
<ul style="list-style: outside none none;" class="nav nav-tabs" role="tablist">
    
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true" style="font-size: 22px;">Tugas</a>
    </li>
   
    
</ul>
 
<!-- Tab panes -------------- -->
<div class="tab-content">
    <div class="tab-pane active" id="tab1" role="tabpanel" aria-expanded="true">

    <section class="projects no-padding-top">
    <div class="container">
      <!-- Project-->
    <?php foreach ($kelas as $val) : ?>
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
                  <?php foreach ($submit as $val3) : ?>
                    <?php if ($val2['id_tugas'] == $val3['id_tugas'] && $val3['id_user'] == $this->session->userdata('id_user')) : ?>
                      <div class="nilai"><?= $val3['nilai_tugas']; ?>/100 Poin</span></div>
                    <?php endif; ?>
                  <?php endforeach; ?>
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
                    <p class="card-text mb-5"><?= $val2['deskripsi_tugas']; ?>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo magnam, labore ex qui quidem quos impedit architecto porro officia debitis nobis, veritatis earum delectus amet deleniti doloremque iure dignissimos reprehenderit ab ducimus! Corporis rem non eum quisquam impedit aut in alias laboriosam minima, tempore earum dicta! Quod autem ipsum numquam tempore quis architecto fugiat. Id dolore laboriosam assumenda deleniti officiis ipsa quidem fugit maiores reprehenderit doloribus et in odit cupiditate doloremque reiciendis quasi quam, perspiciatis repellendus excepturi! Dolore architecto aliquam possimus unde praesentium voluptatibus, consequatur et. Aspernatur, id! Ipsa ab ullam consequatur laborum quos voluptatum explicabo nesciunt alias blanditiis repellat.</p>
                    <div class="w-100 pb-1">
                      <?php foreach ($user as $val3) : ?>
                        <footer class="blockquote-footer"><?= $val3['nama']; ?></footer>
                      <?php endforeach; ?>
                      </div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-item ml-auto">
                          <?php if ($cek == null) : ?>
                            <a href="#" data-toggle="modal" data-target="#detailTugas<?= $val2['id_tugas']; ?>"><i class="fa fa-paper-plane-o m-1"></i>Serahkan Jawaban</a>
                          <?php else : ?>
                            <?php foreach ($submit as $val3) : ?>
                              <?php if ($val2['id_tugas'] == $val3['id_tugas'] && $val3['id_user'] == $this->session->userdata('id_user')) : ?>
                                <a href="#" data-toggle="modal" data-target="#detailTugas<?= $val2['id_tugas']; ?>"><i class="fa fa-pencil m-1"></i>Ganti Jawaban</a>
                              <?php endif; ?>
                            <?php endforeach; ?>
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
                                                    <p style="color: red;"><span class="icon-warning"></span> Peringatan!</p>
                                                    <p style="color: red;"><small>Jika Anda menghapus jawaban Anda setelah memperoleh nilai, maka nilai yang Anda peroleh akan ikut terhapus.</small></p>
                                                  <?php endif; ?>
                                                <?php endforeach; ?>
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
      <?php endforeach; ?>  
      <?php endforeach; ?>  
     </div>
    </section>
    
</div>

<div class="tab-pane" id="tab2" role="tabpanel" aria-expanded="false">
                      
<section class="projects no-padding-top">
<div class="container">
  <!-- Project-->
  <div class="project">
    <div class="row bg-white has-shadow">
      <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
        <div class="project-title d-flex align-items-center">
          <div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
          <div class="text">
            <h3 class="h4" style="font-size: 20px;">Quiz 1</h3><small>PTI</small>
          </div>
        </div>
        <!-- <div class="project-date"><span class="hidden-sm-down">Hari Ini pada 4:24 AM</span></div> -->
      </div>
      <div class="right-col col-lg-6 d-flex align-items-center">
        
     
        <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
        <div class="project-progress">
          <div class="time">
            <div class="nilai">0/100</span></div>
           
          </div>
        </div>
        <div class="time"><i class="fa fa-clock-o"></i>Tenggat Jum 12:00  </div>
      </div>
    </div>
  </div>
 
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

<script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>
