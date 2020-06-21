<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 





<section class="user_dashboard">
	<div class="row mt-0">
		<div class="col-lg-12" style="background-color: aquamarine;">
			<div class="card" style="border-radius: 0px; background-color: darkcyan;">
				<div class="container my-5 pt-5 pb-3 px-4 z-depth-1">


					<!--Section: Block Content-->
					<section>

						<!--Grid row-->
						<div class="row">

							<!--Grid column-->
							<div class="col-md-12 mb-4">

								<h5 class="text-center font-weight-bold mb-4" style="color: white">Tugas Siswa</h5>
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





	<div class="col-md-12">
		<div class="container my-5">
			<div class="row">
				<div class="col-md-6">
					<ul style="list-style: outside none none;" class="nav nav-tabs" role="tablist">

						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#tab3" role="tab" aria-expanded="true"
								style="font-size: 22px;">Daftar Siswa</a>
						</li>

						<!-- <div class="col-md-3 ml-auto">
            <input class="effect-1" type="text" placeholder="0/100 Poin">
              <span class="focus-border"></span>
          </div> -->


						<!-- <li class="nav-item ml-auto">
            
              <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-expanded="true" style="font-size: 22px;">Serahkan</a>
          </li> -->



					</ul>
          <ul style="list-style: outside none none;" id="myTab" class="nav nav-tabs" role="tablist">
          <?php foreach ($tugas as $val) : ?>
            <?php foreach ($submit as $val2) : ?>
              <?php if ($val['id_tugas'] == $val2['id_tugas']) : ?>
                <div class="project" style=" width:700px;">
                  <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                      <div class="project-title d-flex align-items-center">
                        <!-- <div class="widget-content-left mr-2">
                            <div class="custom-checkbox custom-control"> <input class="custom-control-input" id="exampleCustomCheckbox12" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label> </div>
                            </div> -->
                        <div class="text">
                          <li class="nav-item">
                            <h3 class="h4" style="font-size: 20px;"><a data-toggle="tab" href="#tab<?= $val2['id_submit'] ?>" role="tab"
                            aria-controls="tab1" aria-selected="true"><?= $val2['nama'] ?></a></h3>
                          </li>
                        </div>
                      </div>
                      <!-- <div class="project-date"><span class="hidden-sm-down">Hari Ini pada 4:24 AM</span></div> -->
                    </div>
                    <div class="right-col col-lg-6 d-flex align-items-center">


                      <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
                      <div class="project-progress">
                        <div class="time">
                        <?php if ($val2['nilai_tugas'] == "Belum Dinilai") : ?>
                          <div class="nilai"><?= $val2['nilai_tugas']; ?></span></div>
                        <?php else : ?>
                          <div class="nilai"><?= $val2['nilai_tugas']; ?>/100</span></div>
                        <?php endif; ?>


                        </div>
                      </div>
                      <div class="time"><?= $val2['status'] ?></div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endforeach; ?>
					</ul>
				</div>

				<div class="col-md-6">
					<!-- Nav tabs -------------- -->
					<ul style="list-style: outside none none;" class="nav nav-tabs" role="tablist">

						<li class="nav-item">
            <?php foreach ($tugas as $val) : ?>
              <?php if ($val['kategori'] == "Tugas") : ?>
						    <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true"
                style="font-size: 22px;">Tugas</a>
              <?php else : ?>
                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true"
                style="font-size: 22px;">Quiz</a>
              <?php endif; ?>
            <?php endforeach; ?>
						</li>

            <div class="meta-item ml-auto text-right" style="font-size: 12px; padding-top: 20px; padding-right: 20px;">
               <p>*Silahkan Mengisi Poin nilai di Form yang disediakan dibawah ini</p>
            </div>
					</ul>

					<!-- Tab panes -------------- -->
          <div class="tab-content">
          <?php foreach ($tugas as $val) : ?>
            <?php foreach ($submit as $val2) : ?>
              <?php if ($val['id_tugas'] == $val2['id_tugas']) : ?>
                  <div class="tab-pane" id="tab<?= $val2['id_submit']; ?>" role="tabpanel" aria-expanded="true">

                    <section class="projects no-padding-top">
                      <div class="container">
                        <!-- Project-->
                        <div class="project">
                          <div class="row bg-white has-shadow">
                            <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                              <div class="project-title d-flex align-items-center">
                                <div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png"
                                    alt="..." class="img-fluid rounded-circle"></div>
                                <div class="text">
                                  <h3 class="h4" style="font-size: 20px;"><?= $val['judul_tugas']; ?></h3><small>oleh <?= $val2['nama'] ?></small>
                                </div>
                              </div>
                              <!-- <div class="project-date"><span class="hidden-sm-down">Hari Ini pada 4:24 AM</span></div> -->
                            </div>
                            <div class="right-col col-lg-6 d-flex align-items-center">


                              <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
                              <div class="project-progress">
                                <div class="time">
                                <?php if ($val2['nilai_tugas'] == "Belum Dinilai") : ?>
                                  <div class="nilai"><?= $val2['nilai_tugas']; ?></span></div>
                                <?php else : ?>
                                  <div class="nilai"><?= $val2['nilai_tugas']; ?>/100</span></div>
                                <?php endif; ?>

                                </div>
                              </div>
                              <?php 
                              $awal  = strtotime($val['batas_pengiriman_tugas']);
                              $akhir = strtotime($val2['tanggal_submit']);
                              $diff  = $akhir - $awal;
                              $jam   = floor($diff / (60 * 60));
                              $menit = $diff - $jam * (60 * 60);
                              $hari = floor($diff / (60 * 60 * 24));

                              if($val2['status'] == "Terlambat") :
                                if ($hari > 0) : ?>
                                  <div class="time">Terlambat <?= $hari; ?> hari, <?= floor($jam - 24); ?> jam, <?= floor($menit / 60); ?> menit</div>
                                <?php elseif($jam < 24 || $hari < 0) : ?>
                                  <div class="time">Terlambat <?= $jam; ?> jam, <?= floor($menit / 60); ?> menit</div>
                                <?php elseif ($menit > 60 || $jam < 0) : ?>
                                  <div class="time">Terlambat <?= floor($menit / 60); ?> menit</div>
                                <?php elseif ($menit < 60 || $menit == 60) : ?>
                                  <div class="time">Terlambat <?= $menit; ?> detik</div>
                                <?php endif; ?>
                              <?php else : ?>
                                <div class="time"><?= $val2['status']; ?></div>
                              <?php endif; ?>
                            </div>

                            <div class="row d-flex ">
                              <div class="col-12 col-md-12 mb-2 mt-2">
                                <div class="card  h-100 border-light  bg-light shadow" style="width: 480px;">
                                  <div class="card-body d-flex-row">
                                    <blockquote class="blockquote mb-4 pb-2">
                                      <p class="mb-0 font-weight-bold "><?= $val2['subjek_tugas'] ?></p>
                                      <!-- <footer class="blockquote-footer"><?= $val2['nama'] ?></footer> -->
                                    </blockquote>
                                    <div class="row">
                                      <div class="col">
                                        <div class="col">
                                          <div class="notice notice-info">
                                            <div class="row mb-0" style="padding: 0px;">
                                              <!-- <img src="<?php echo base_url(); ?>assets/images/pdf.png" alt="..." class="img-fluid rounded-circle" style="width: 20px;"> -->
                                              <a href="<?= base_url() ?>classes/download_assignment/<?= $val2['url_file']; ?>"><?= $val2['url_file']; ?></a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="w-100 pb-1"></div>
                                    <div class="d-flex align-items-center align-self-end">
                                      <div class="meta-author">
                                        <img src="<?php echo base_url(); ?>assets/images/task.png" alt="..."
                                          class="d-block img-fluid rounded-circle" width="30px">
                                        <!-- <img class="d-block img-fluid rounded-circle" src="" alt="author avatar"> -->
                                      </div>
                                      <form action="<?= base_url() ?>classes/update_nilai/<?= $val['id_kelas']; ?>/<?= $val2['id_tugas']; ?>/<?= $val2['id_submit']; ?>" method="POST">
                                        <div class="m-2">
                                          <div class="col mr-4">
                                            <input class="effect-1" type="text" name="nilai" placeholder="0/100 Poin" style="font-size: 20px;">
                                            <input type="hidden" name="tanggal_submit" value="<?= $val2['tanggal_submit']; ?>">
                                            <span class="focus-border"></span>
                                          </div>
                                        </div>
                                        <div class="meta-item ml-auto text-right" style="margin-right: -110px; margin-top: -50px;">
                                          <button type="submit" class="btn btn-primary" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;"><i class="fa fa-check-square-o"></i> Beri Nilai</button>
                                        </div>
                                      </form>
                                    </div>  
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                    </section>

                  </div>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endforeach; ?>
          </div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script> -->
 
 <script>
 $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  $(this).removeClass('active');
})
 </script>
 
<?php if ($this->session->flashdata('successUpdateNilai')) { ?>
  <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
  <script>
    $(function () {
      $('#myTab a[href="#tab<?= $this->session->flashdata('successUpdateNilai'); ?>"]').tab('show');
    })
  </script>
  <script>
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      $(this).removeClass('active');
    })
  </script>
<?php } ?>