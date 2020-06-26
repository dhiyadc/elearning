<meta name="viewport" content="width=device-width, initial-scale=1">


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



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


								<h5 class="text-center font-weight-bold mb-4" style="color: white">Dashboard Saya</h5>
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
			<!-- <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true">To Do List</a>
    	</li> -->
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#tab2" role="tab" aria-expanded="false"> Kelas
					Saya</a>

			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-expanded="false">Kelas Diikuti</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-expanded="false">Tugas</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-expanded="false">Materi</a>
			</li>
		</ul>

		<!-- Tab panes -------------- -->
		<div class="tab-content">
			<!-- <div class="tab-pane active" id="tab1" role="tabpanel" aria-expanded="true"> -->
			<!-- <div class="row mt-5">
      <div class="col">
      	<div class="card card-list">
          <div class="card-body">
            <h2>Progress Belajar</h2>
          </div>
         
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Kelas</th>
                  <th scope="col">Progress</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($seluruh_kelas as $val) : ?>
                    <?php foreach ($peserta as $val2) : ?>
                        <?php if ($val2['id_kelas'] == $val['id_kelas'] && $val2['id_user'] == $this->session->userdata('id_user')) : ?>
                            <tr>
                                <th scope="row" style="width: 300px;"><a class="text-primary"><?= $val['judul_kelas']; ?></a></th>
                                <td style="padding-top: 20px;"> 
                                <?php $total = 0; $selesai = 0;
                                foreach ($kegiatan as $val3) {
                                  if ($val2['id_kelas'] == $val3['id_kelas']){
                                    $total++; 
                                    if ($val3['status_kegiatan'] == 2) {
                                      $selesai++; 
                                    } 
                                  }
                                }
                                if ($total == 0) {
                                  $proses = 0;
                                }
                                else {
                                $proses = ($selesai / $total) * 100; 
                                } ?>
                                    <div class="progress md-progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $proses; ?>%" aria-valuenow="<?= $proses; ?>" aria-valuemin="0"
                                        aria-valuemax="100"><?= $proses; ?>%</div>
                                    </div>
                                </td>
                                <td style="padding-top:20px">
                                    <?php foreach ($status as $val3) : ?>
                                        <?php if ($val['status_kelas'] == $val3['id_status']) : ?>
                                            <?php if ($val3['nama_status'] == "Selesai") : ?>
                                                <span class="badge badge-success"><?= $val3['nama_status'] ?></span>
                                            <?php else : ?>
                                                <span class="badge badge-warning"><?= $val3['nama_status'] ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                  <div class="buttonclass">
                                    <a href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>" class="btn btn-light">Lihat kelas</a>
                                    <a href="<?= base_url()?>classes/leave_class/<?= $val['id_kelas'] ?>" class="btn btn-danger">Tinggalkan</a>
                                  </div>
                                  </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer white py-3 d-flex justify-content-center">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
          </div>
        </div>
      </div>
    </div> -->
			<!-- to do -->
			<!-- <div class="row d-flex justify-content-center container">
    <div class="col-md-12">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;To do List</div>
               
            </div>
            <div class="scroll-area-sm">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-warning"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control"> <input class="custom-control-input" id="exampleCustomCheckbox12" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label> </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Kelas Algoritma Pemograman Sedang Berlangsung <div class="badge badge-success ml-2">Dimulai</div>
                                                </div>
                                                <div class="widget-subheading"><i>By Arya Pradata</i></div>
                                            </div>
                                            <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-times"></i> </button> </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-focus"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox1" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox1">&nbsp;</label></div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Tugas Kelas Big Data Telah Tersedia</div>
                                                <div class="widget-subheading">
                                                    <div>By Dice <div class="badge badge-pill badge-info ml-2">Baru</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-times"></i> </button> </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-primary"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox4" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox4">&nbsp;</label></div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Kelas Kalkulus Sedang Berlangsung <div class="badge badge-warning ml-2">Berakhir</div> 

                                                </div>
                                                <div class="widget-subheading">By Bambang!</div>
                                            </div>
                                            <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-times"></i> </button> </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-info"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox2" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox2">&nbsp;</label></div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Quiz Basis Data Telah Tersedia</div>
                                                <div class="widget-subheading">By Tzamaniyah</div>
                                            </div>
                                            <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-times"></i> </button> </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-success"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox3" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox3">&nbsp;</label></div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading"></div>
                                                <div class="widget-heading">Quiz Basis Data Telah Tersedia</div>
                                                <div class="widget-subheading">By Aereon</div>
                                            </div>
                                            <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-times"></i> </button> </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-success"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox10" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox10">&nbsp;</label></div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Quiz Basis Statistik Telah Tersedia</div>
                                                <div class="widget-subheading">By CEO</div>
                                            </div>
                                            <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-times"></i> </button> </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
            <div class="d-block text-right card-footer"><button class="btn btn-primary">Konfirmasi</button><button class="mr-2 btn btn-link btn-sm">Batal</button></div>
        </div>
    </div>
</div> -->

			<!-- </div> -->

			<div class="tab-pane active" id="tab2" role="tabpanel" aria-expanded="true">

				<div class="row mt-5">
					<div class="col">
						<div class="card card-list">
							<div class="card-body">

								<div class="row">
									<div class="col">
										<h2>Kelas Saya</h2>
									</div>
									<div class="align-self-end">
										<form action="<?= base_url(); ?>Classes/search_kelas_saya" method="post">
											<div class="input-group mb-3">
												<input class="form-control form-control-sm mr-0 w-0" type="text"
													name="keyword" placeholder="Cari Kelas" aria-label="Search">
												<div class="input-group-append">
													<button class="btn" type="submit"><i class="fa fa-search"
															aria-hidden="true" onclick=""></i></button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="card-body table-responsive">
								<table id="pageTable" class="table">
									<thead>
										<tr>
											<th scope="col">Kelas</th>
											<th scope="col" style="padding-left: 60px;"></th>
											<th scope="col" style="padding-left: 40px;">Progress</th>
											<th scope="col" style="padding-left: 60px;">Status</th>
											<th scope="col" style="padding-left: 50px;">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($kelas as $val) : ?>
										<tr>
											<th scope="row" style="width: 300px; padding-top: 23px;" ><a
													class="text-primary" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?= $val['judul_kelas']; ?></a>
													<div id="accordion" role="tablist">
												
													
												
											</th>
											<td style="padding-top: 20px; padding-top: 23px;">
												<span><i class="fa fa-share-alt  fa-clickable" id="epd-dribble"></i></span>
											</td>

											<td style="padding-top: 23px;">
												<?php $total = 0; $selesai = 0;
                                    foreach ($kegiatan as $val2) {
                                        if ($val['id_kelas'] == $val2['id_kelas']){
                                            $total++; 
                                            if ($val2['status_kegiatan'] == 2) {
                                                $selesai++; 
                                            } 
                                        }
                                    }
                                    if ($total == 0) {
                                        $proses = 0;
                                    }
                                    else {
                                        $proses = ($selesai / $total) * 100; 
                                    }?>
												<div class="progress md-progress">

													<div class="progress-bar bg-info" role="progressbar"
														style="width: <?= $proses; ?>%" aria-valuenow="<?= $proses; ?>"
														aria-valuemin="0" aria-valuemax="100"><?= $proses; ?>%</div>
												</div>
											</td>
											<td style="padding-top: 20px;">
												<?php foreach ($status as $val2) : ?>
													<?php if ($val['status_kelas'] == $val2['id_status']) : ?>
														<?php if ($val2['nama_status'] == "Selesai") : ?>
															<span class="badge badge-success" style="padding: 6px;"><?= $val2['nama_status'] ?></span>
														<?php else : ?>
															<span class="badge badge-danger" style="padding: 6px;"><?= $val2['nama_status'] ?></span>
														<?php endif; ?>
													<?php endif; ?>
												<?php endforeach; ?>
											</td>
											<td style="padding-top: 20px;">
												<div class="buttonclass">
													<div class="btn-group">
														<a class="btn btn-outline-dark"
															href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>"
															style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Detail</a>
														<button type="button"
															style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;"
															class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split"
															data-toggle="dropdown" aria-haspopup="true"
															aria-expanded="false">
															<span class="sr-only">Toggle Dropdown</span>
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item btn"
																href="" data-toggle="modal" data-target="#tambahKegiatan">Tambah
																Kegiatan</a>
															<a class="dropdown-item btn"
																href="<?= base_url()?>classes/lihat_kegiatan/<?= $val['id_kelas'] ?>">Lihat
																Kegiatan</a>
															<a class="dropdown-item btn"
																href="<?= base_url()?>classes/list_tugas/<?= $val['id_kelas'] ?>">List
																Tugas</a>
															<a class="dropdown-item btn"
																href="<?= base_url()?>classes/new_assignment/<?= $val['id_kelas'] ?>">Buat
																Tugas</a>
															<a class="dropdown-item btn"
																href="<?= base_url()?>classes/update_class/<?= $val['id_kelas'] ?>">Edit
																Kelas</a>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr class="p">
				            			<td colspan="6" class="hiddenRow">
										<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
													<div class="card-body">
														<!--  -->
														<div class="container my-5">
														<ul style="list-style: outside none none;" class="nav nav-tabs" role="tablist">
															<!-- <li class="nav-item">
														<a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true">To Do List</a>
														</li> -->
															<li class="nav-item">
																<a class="nav-link active" data-toggle="tab" href="#tab2" role="tab" aria-expanded="false">Jadwal</a>

															</li>
															<li class="nav-item">
																<a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-expanded="false">Tugas</a>
															</li>
															
															
															
														</ul>

														<!-- Tab panes -------------- -->
														<div class="tab-content">
															<div class="tab-pane active" id="tab1" role="tabpanel" aria-expanded="true">

															<section class="projects no-padding-top">
															<div class="container">
															<!-- Project-->
														
															<div class="project">
																<div class="row bg-white has-shadow">
																<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
																	<div class="project-title d-flex align-items-center">
																	<div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
																	<div class="text">
																		<h3 class="h4" style="font-size: 20px;">Kelas Satu</h3><small>14 Feb : 14:00 WIB</small>
																	</div>
																	</div>
																</div>
																<div class="right-col col-lg-3 d-flex align-items-center">
																	
																	<div class="time"><i class="fa fa-tasks" aria-hidden="true"></i>2 Tugas</div>
																</div>

																<div class="right-col col-lg-3 d-flex align-items-center">
																	<div class="time"><i class="fa fa-clock-o"></i><a href="">2/50 Siswa</a></div>
																</div>
																
															

																	<div class="row d-flex ">
																	<div class="row">
																		<div class="col"> 
																		<div class="card card-list">
																			<div class="card-body">
																			<h2>Jadwal Kegiatan Kelas</h2>
																			</div>
																		
																			<div class="card-body">
																			<table class="table">
																				<thead>
																				<tr>
																					<th scope="col">Deskripsi</th>
																					<th scope="col">Hari/Tanggal</th>
																					<th scope="col">Waktu</th>
																					<th scope="col" style="text-align: center;">Status</th>
																					
																					<th scope="col" style="text-align: center ;">Aksi</th>
																					<th scope="col">Materi</th>
																				

																					

																				</tr>
																				</thead>
																				<tbody>
																				
																				<tr>
																					<td style="padding-top: 23px;">Kelas Senin</td>
																					<td style="padding-top: 23px;">14 Febuary 2020</td>
																					<td style="padding-top: 23px;">14.00 WIB</td>
																					
																					<td style="text-align: center ; padding-top: 20px;"><span class="badge badge-danger" style="padding: 6px;">Sedang Berlangsung</span></td>
																							
																					<td>
																						<!-- <?php if ($val['pembuat_kelas'] != $this->session->userdata('id_user')) : ?>
																							<?php if ($cek == true) : ?>
																							<?php elseif ($peserta != null && $val2['status_kegiatan'] == CLASS_STARTED) : ?>
																							<a href="<?= base_url('class/') ?><?= $val['id_kelas'] ?>/<?= $val2['id_kegiatan']; ?>" class="btn btn-dark mr-1">Ikut</a>
																							<?php elseif ($cek == false) : ?>
																							<?php endif; ?> -->
																						<!-- <?php elseif ($val2['status_kegiatan'] != CLASS_FINISHED) : ?> -->
																							<!-- <button type="button" class="btn btn-light btn-block" data-toggle="modal" data-target="#editKegiatan1">Edit</button><br>
																							<a href="" class="btn btn-dark mr-1 btn-block">Mulai</a> -->
																							<div class="btn-group">
																								<a class="btn btn-light"
																									href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>"
																									style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Lihat</a>
																								<button type="button"
																									style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;"
																									class="btn btn-light dropdown-toggle dropdown-toggle-split"
																									data-toggle="dropdown" aria-haspopup="true"
																									aria-expanded="false">
																									<span class="sr-only">Toggle Dropdown</span>
																								</button>
																								<div class="dropdown-menu">
																									<a class="dropdown-item btn"
																										href="" data-toggle="modal" data-target="#tambahKegiatan">Edit
																										</a>
																									<a class="dropdown-item btn"
																										href="<?= base_url()?>classes/lihat_kegiatan/<?= $val['id_kelas'] ?>">Mulai
																										</a>
																									<!-- <a class="dropdown-item btn"
																										href="<?= base_url()?>classes/list_tugas/<?= $val['id_kelas'] ?>">
																										Tugas</a> -->
																								</div>
																							</div>
																							<div class="modal fade" id="editKegiatan1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 90px;">

																							


																								<!-- <div class="modal-dialog" role="document">
																								
																								<div class="modal-content form-elegant">
																									
																									<div class="modal-header text-center">
																									<h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Edit Kegiatan</strong></h3>
																									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																										<span aria-hidden="true">&times;</span>
																									</button>
																									</div>
																									
																									<div class="modal-body mx-4">
																									
																									<form enctype="multipart/form-data" action="<?= base_url()?>classes/edit_kegiatan/<?= $val['id_kelas'] ?>/<?= $val2['id_kegiatan'] ?>" method="POST">
																										<div class="form-group">
																										<label>Deskripsi Kegiatan</label>
																											<textarea class="form-control" name="deskripsi" required><?= $val2['deskripsi_kegiatan'] ?></textarea>
																										</div>
																										<label for="materiForm">Tambah Materi</label>
																										<input type="file" name="materi[]" accept=".doc, .docx, .ppt, .pptx, .pdf" class="form-control-file" id="materiForm" multiple> 
																										
																										</div>
																										<input type="hidden" name="tanggal" value="<?= $val2['tanggal_kegiatan'] ?>">

																									<div class="text-center mb-3">
																										<button type="submit" class="btn btn-light blue-gradient btn-block btn-rounded z-depth-1a">Simpan</button>
																									</div>
																									</form>
																								</div>
																								</div> -->
																							</div>
																							</div>
																					
																					</td>
																					
																					
																							<td>
																						
																								
																								
																									<button class="btn btn-light btn-md px-3 my-0 ml-0" type="button" data-toggle="modal" data-target="#lihatMateri1">Lihat Materi</button>
																									
																							
																							</td>
																						
																						
																				

																					<div class="modal fade" id="lihatMateri1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
																					aria-hidden="true" style="padding-right: 90px;">
																				
																					<div class="modal-dialog modal-lg" role="document">
																						<!--Content-->
																						<div class="modal-content form-elegant">
																						<!--Header-->
																						<div class="modal-header text-center">
																							<h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Materi</strong></h3>
																							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																							</button>
																						</div>
																						<!--Body-->
																						<div class="modal-body mx-4">
																							<!--Body-->
																							
																							<div class="container-fluid">
																							<div class="row">
																							
																							<div class="col-md-12 border-bottom pb-3 mt-3"><b>Nama File</b></div>
																								
																								
																								<div class="col-md-12 border-bottom pb-3 mt-3"><a href="<?= base_url(); ?>classes/download_materi/<?= $val4['url_materi'] ?>"><?= $val4['url_materi'] ?></a></div>
																									
																								</div>
																							</div>
																								
																							
																							<div class="container-fluid">
																							<div class="row">
																								
																							<div class="col-md-12 border-bottom pb-3 mt-3"><b>Nama File</b></div>
																						
																								<div class="col-md-10 border-bottom pb-3 mt-3"><a href="">Materi1</a></div>
																								<div class="col-md-2 ml-auto border-bottom"><button type="button" class="btn btn-danger"><a href="">Hapus</a></button></div>
																								
																								
																							</div>
																							</div>
																							
																					
																						</div>
																						</div>
																					</div>
																					</div>

																				</tr>
																			
																				</tbody>
																			</table>
																			</div>
																			
																			<div class="card-footer white py-3 d-flex justify-content-between">
																			<button class="btn btn-light btn-md px-3 my-0 ml-0" type="button" data-toggle="modal" data-target="#tambahKegiatan">Tambah Jadwal Kegiatan</button>
																			</div>
																			<!-- Modal -->
																		<div class="modal fade" id="tambahKegiatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
																		aria-hidden="true" style="padding-right: 90px;">
																		<div class="modal-dialog" role="document">
																			<!--Content-->
																			<div class="modal-content form-elegant">
																			<!--Header-->
																			<div class="modal-header text-center">
																				<h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Atur Kegiatan</strong></h3>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																				</button>
																			</div>

																			

																			<!--Body-->
																			<div class="modal-body mx-4">
																				<!--Body-->
																				<form enctype="multipart/form-data" action="" method="POST">
																				<div class="form-group">
																					<label>Deskripsi Kegiatan</label>
																					<textarea class="form-control" name="deskripsi" required></textarea>
																				</div>
																				<div class="form-group">
																					<label>Jadwal Kegiatan</label>
																					<div class="input-group date form_datetime " data-date-format="yyyy/mm/dd hh:ii" data-link-field="dtp_input1">
																					<input class="form-control" id="inputdatetimepicker" size="16" type="text" name="tanggal" readonly required>
																					<span class="input-group-addon" style="width:40px;"><span class="glyphicon glyphicon-remove"></span></span>
																					<span class="input-group-addon" style="width:40px;"><span class="glyphicon glyphicon-th"></span></span>
																					</div>
																				</div>
																				<input type="hidden" id="dtp_input1"/>
																				<div class="form-group">
																				<label for="materiForm">Materi (Opsional)</label>
																				<input type="file" name="materi[]" accept=".doc, .docx, .ppt, .pptx, .pdf" class="form-control-file" id="materiForm" multiple>
																				</div>
																				<div class="text-center mb-3">
																				<button type="submit" class="btn btn-light blue-gradient btn-block btn-rounded z-depth-1a">Simpan</button>
																				</div>
																				</form>
																			</div>
																			</div>
																		</div>
																		</div>
																			<?php endif; ?>
																		</div>
																		</div>
																	</div>
																</div>
																</div>
																
															</div>
																
															</div>
															<a href="#daftarSiswa" class="daftarSiswa"></a>
															<div id="daftarSiswa"></div>
															</section>
														</div>
														</div>
														</div>
													
														<!--  -->
													</div>
												</div>
				            			</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="card-footer white py-3 d-flex justify-content-center">
								<ul id="pagination" class="pagination">
								</ul>
								</nav>
							</div>
						</div>
														
					</div>
				</div>

				<div class="row mt-5">
					<div class="col">
						<div class="card card-list">
							<div class="card-body">
								<h2>Kelas Saya (Private)</h2>
							</div>

							<div class="card-body table-responsive">
								<table id="pageTable2" class="table">
									<thead>
										<tr>
											<th scope="col">Kelas</th>
											<th scope="col">Progress</th>
											<th scope="col">Status</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($private_kelas as $val) : ?>
										<tr>
											<th scope="row" style="width: 300px;"><a
													class="text-primary"><?= $val['judul_kelas']; ?></a>
											</th>

											
													
											<td style="padding-top: 20px;">
												<?php $total = 0; $selesai = 0;
                                    foreach ($kegiatan as $val2) {
                                        if ($val['id_kelas'] == $val2['id_kelas']){
                                            $total++; 
                                            if ($val2['status_kegiatan'] == 2) {
                                                $selesai++; 
                                            } 
                                        }
                                    }
                                    if ($total == 0) {
                                        $proses = 0;
                                    }
                                    else {
                                        $proses = ($selesai / $total) * 100; 
                                    }?>
												<div class="progress md-progress">
													<div class="progress-bar bg-info" role="progressbar"
														style="width: <?= $proses; ?>%" aria-valuenow="<?= $proses; ?>"
														aria-valuemin="0" aria-valuemax="100"><?= $proses; ?>%</div>
												</div>
											</td>
											<td style="padding-top: 20px;">
												<?php foreach ($status as $val2) : ?>
													<?php if ($val['status_kelas'] == $val2['id_status']) : ?>
														<?php if ($val2['nama_status'] == "Selesai") : ?>
															<span class="badge badge-success"><?= $val2['nama_status'] ?></span>
														<?php else : ?>
															<span class="badge badge-warning"><?= $val2['nama_status'] ?></span>
														<?php endif; ?>
													<?php endif; ?>
												<?php endforeach; ?>
											</td>
											<td style="padding-top: 20px;">
												<div class="buttonclass">
													<div class="btn-group">
														<a class="btn btn-outline-dark"
															href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>"
															style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Detail</a>
														<button type="button"
															style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;"
															class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split"
															data-toggle="dropdown" aria-haspopup="true"
															aria-expanded="false">
															<span class="sr-only">Toggle Dropdown</span>
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item btn"
																href="<?= base_url()?>classes/open_modal_class/<?= $val['id_kelas'] ?>">Tambah
																Kegiatan</a>
															<a class="dropdown-item btn"
																href="<?= base_url()?>classes/lihat_kegiatan/<?= $val['id_kelas'] ?>">Lihat
																Kegiatan</a>
															<a class="dropdown-item btn"
																href="<?= base_url()?>classes/list_tugas/<?= $val['id_kelas'] ?>">List
																Tugas</a>
															<a class="dropdown-item btn"
																href="<?= base_url()?>classes/update_class/<?= $val['id_kelas'] ?>">Edit
																Kelas</a>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr class="p">
											<td colspan="6" class="hiddenRow">
												
											</td> 
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="card-footer white py-3 d-flex justify-content-center">
								<ul id="pagination2" class="pagination">
								</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
					<!--  -->
					<!-- <div id="accordion" role="tablist">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
							<h5 class="mb-0">
								<a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Klik Sini
								</a>
							</h5>
						</div>
						<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body"> -->
								<!--  -->
								<!-- <div class="row d-flex ">
                              <div class="col-12 col-md-12 mb-2 mt-2">
                                <div class="card  h-100 border-light  bg-light shadow" style="width: 480px;">
                                  <div class="card-body d-flex-row">
                                    <blockquote class="blockquote mb-4 pb-2">
                                      <p class="mb-0 font-weight-bold ">Haha</p> -->
                                      <!-- <footer class="blockquote-footer"><?= $val2['nama'] ?></footer> -->
                                    <!-- </blockquote>
                                    <div class="row">
                                      <div class="col">
                                        <div class="col">
                                          <div class="notice notice-info">
                                            <div class="row mb-0" style="padding: 0px;"> -->
                                              <!-- <img src="<?php echo base_url(); ?>assets/images/pdf.png" alt="..." class="img-fluid rounded-circle" style="width: 20px;"> -->
                                              <!-- <a href=""></a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="w-100 pb-1"></div>
                                    <div class="d-flex align-items-center align-self-end">
                                      <div class="meta-author">
                                        <img src="<?php echo base_url(); ?>assets/images/task.png" alt="..."
                                          class="d-block img-fluid rounded-circle" width="30px"> -->
                                        <!-- <img class="d-block img-fluid rounded-circle" src="" alt="author avatar"> -->
                                      <!-- </div>
                                      <form action="" method="POST">
                                        <div class="m-2">
                                          <div class="col mr-4">
                                            <?php $placeholder;
                                           
                                              $placeholder = "Belum Dinilai";
                                          
                                             ?>
                                            <input class="effect-1" type="text" name="nilai" placeholder="<?= $placeholder; ?>">
                                            <input type="hidden" name="tanggal_submit" value="14 Feb">
                                            <span class="focus-border"></span>
                                          </div>
                                        </div>
                                        <div class="meta-item ml-auto text-right" style="margin-right: -150px; margin-top: -50px;">
                                          <button type="submit" class="btn btn-primary" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;"><i class="fa fa-check-square-o"></i> Beri Nilai</button>
                                        </div>
                                      </form>
                                    </div>  
                                  </div>
                                </div>
                              </div>
                            </div> -->
								<!--  -->
							<!-- </div>
						</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingTwo">
							<h5 class="mb-0">
								<a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								Collapsible Group Item #2
								</a>
							</h5>
						</div>
						<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
							<div class="card-body">
								...............................................................................#2
							</div>
						</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingThree">
							<h5 class="mb-0">
								<a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Collapsible Group Item #3
								</a>
							</h5>
						</div>
						<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
							<div class="card-body">
							...............................................................................#3
							</div>
						</div>
						</div>
					</div> -->
															<!--  -->
			</div>

			<div class="tab-pane" id="tab3" role="tabpanel" aria-expanded="false">
				<div class="row mt-5">
					<div class="col">
						<?php if ($notif != null) : ?>
                        <?php foreach ($notif as $val) : ?>
                          <?php foreach ($val as $val2) : ?>
                            <?php if ($val2['status_kegiatan'] == CLASS_STARTED) : ?>
								<div class="alert alert-primary" role="alert">
									<div class="row">
										<div class="col">
											<h4 class="alert-heading">Kelas <?= $val2['judul_kelas']; ?> Sedang Dimulai</a></h4>
										</div>
										<div class="text-right"><?= $val2['tanggal']; ?></div>
									</div>
									<p>oleh <?= $val2['nama']; ?></p>
									<hr>
									<a class="btn btn-outline-dark" href="<?= base_url('class/') ?><?= $val2['id_kelas'] ?>/<?= $val2['id_kegiatan']; ?>" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Ikut</a>
								</div>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        <?php endforeach; ?>
                      <?php endif; ?>
						<div class="card card-list">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h2>Kelas Diikuti</h2>
									</div>
									<div class="align-self-end">
										<form action="<?= base_url(); ?>Classes/search_kelas_diikuti" method="post">
											<div class="input-group mb-3">
												<input class="form-control form-control-sm mr-0 w-0" type="text"
													name="keyword" placeholder="Cari Kelas" aria-label="Search">
												<div class="input-group-append">
													<button class="btn" type="submit"><i class="fa fa-search"
															aria-hidden="true" onclick=""></i></button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="card-body">
								<table id="pageTable3" class="table">
									<thead>
										<tr>
											<th scope="col">Kelas</th>
											<th scope="col" style="padding-left: 100px;"></th>
											<th scope="col" style="padding-left: 60px;">Progress</th>
											<th scope="col" style="padding-left: 100px;">Status</th>
											<!-- <th scope="col">Materi</th> -->
											<th scope="col" style="padding-left: 50px;">Aksi</th>

										</tr>
									</thead>
									<tbody>
										<?php foreach ($seluruh_kelas as $val) : ?>
										<?php foreach ($peserta as $val2) : ?>
										<?php if ($val2['id_kelas'] == $val['id_kelas'] && $val2['id_user'] == $this->session->userdata('id_user')) : ?>
										<tr>
											<th scope="row" style="width: 300px;" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTne"><a
													class="text-primary"><?= $val['judul_kelas']; ?></a></th>
											<td style="padding-top: 20px;">
											<span><i class="fa fa-share-alt  fa-clickable" id="epd-dribble"></i></span>
											</td>
											<td style="padding-top: 20px;">
												<?php $total = 0; $selesai = 0;
													foreach ($kegiatan as $val3) {
													if ($val2['id_kelas'] == $val3['id_kelas']){
														$total++; 
														if ($val3['status_kegiatan'] == 2) {
														$selesai++; 
														} 
													}
													}
													if ($total == 0) {
													$proses = 0;
													}
													else {
													$proses = ($selesai / $total) * 100; 
													} ?>
												<div class="progress md-progress">
													<div class="progress-bar bg-info" role="progressbar"
														style="width: <?= $proses; ?>%" aria-valuenow="<?= $proses; ?>"
														aria-valuemin="0" aria-valuemax="100"><?= $proses; ?>%</div>
												</div>
											</td>
											<td style="padding-top:20px; padding-left: 60px;">
												<?php foreach ($status as $val3) : ?>
													<?php if ($val['status_kelas'] == $val3['id_status']) : ?>
														<?php if ($val3['nama_status'] == "Selesai") : ?>
															<span class="badge badge-success"
															style="margin-left: 50px;"><?= $val3['nama_status'] ?></span>
														<?php else : ?>
															<span class="badge badge-warning"><?= $val3['nama_status'] ?></span>
														<?php endif; ?>
													<?php endif; ?>
												<?php endforeach; ?>
											</td>
											<td>
												<div class="btn-group">
													<a class="btn btn-outline-dark" href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Detail</a>
													<button type="button" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item btn" href="<?= base_url()?>classes/lihat_kegiatan/<?= $val['id_kelas'] ?>">Lihat Kegiatan</a>
														<a class="dropdown-item btn" href="<?= base_url()?>classes/list_tugas/<?= $val['id_kelas'] ?>">List Tugas</a>
														<a class="dropdown-item btn" href="<?= base_url()?>classes/leave_class/<?= $val['id_kelas'] ?>">Tinggalkan</a>
													</div>
												</div>
											</td>
										</tr>
										<tr class="p">
				            			<td colspan="6" class="hiddenRow">
										<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
													<div class="card-body">
														<!--  -->
														<div class="container my-5">
														<ul style="list-style: outside none none;" class="nav nav-tabs" role="tablist">
															<!-- <li class="nav-item">
														<a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true">To Do List</a>
														</li> -->
															<li class="nav-item">
																<a class="nav-link active" data-toggle="tab" href="#tab2" role="tab" aria-expanded="false">Tugas</a>

															</li>
															<li class="nav-item">
																<a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-expanded="false">Quiz</a>
															</li>
															
															
															
														</ul>

														<!-- Tab panes -------------- -->
														<div class="tab-content">
															<div class="tab-pane active" id="tab1" role="tabpanel" aria-expanded="true">

															<section class="projects no-padding-top">
															<div class="container">
															<!-- Project-->
														
															<div class="project">
																<div class="row bg-white has-shadow">
																<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
																	<div class="project-title d-flex align-items-center">
																	<div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
																	<div class="text">
																		<h3 class="h4" style="font-size: 20px;">Tugas Kelas Satu</h3><small>14 Feb : 14:00 WIB</small>
																	</div>
																	</div>
																</div>
																<div class="right-col col-lg-3 d-flex align-items-center">
																	
																	<div class="time"><i class="fa fa-tasks" aria-hidden="true"></i>2 Tugas</div>
																</div>

																<div class="right-col col-lg-3 d-flex align-items-center">
																	<div class="time"><i class="fa fa-clock-o"></i><a href="">Jadwal Kegiatan</a></div>
																</div>
																
															

																<div class="row d-flex ">
																<div class="col-12 col-md-12 mb-2 mt-2">
																	<div class="card  h-100 border-light ">
																		<div class="card-body d-flex-row" style="width: 900px;">
																		<div class="row mb-0" style="padding: 0px;">
																		<!-- <div class="col-md-4">Arya Pradata</div>
																		<div class="col-md-4" style="margin-bottom: -10px;">
																			<div class="notice notice-info">
																				<div class="row mb-0" style="padding: 0px;">
																			
																				
																				<img src="<?php echo base_url(); ?>assets/images/pdf.png" alt="..." class="img-fluid rounded-circle" style="width: 20px;">
																				<a href="">Tugas1</a>
																				
																				
																				</div>
																			</div> -->

																			<!-- 
																				<div class="notice notice-info">
																				<div class="row mb-0" style="padding: 0px;">
																				<div class="col-md-4">Arya Pradata</div>
																				<div class="col-md-4">
																				<img src="<?php echo base_url(); ?>assets/images/pdf.png" alt="..." class="img-fluid rounded-circle" style="width: 20px;">
																				<a href="">Tugas1</a>
																				</div>
																				<div class="col-md-4">
																				<div class="m-2">
																					<div class="col mr-4" style="margin-top: -15px;">
																						<?php $placeholder;
																						
																						$placeholder = "0/100 Poin";
																						
																						
																						?>
																						<input class="effect-1" type="text" name="nilai" placeholder="<?= $placeholder; ?>">
																						<input type="hidden" name="tanggal_submit" value="14 Feb">
																						<span class="focus-border"></span>
																					</div>
																					</div>
																				</div>
																				</div>
																			</div>
																			 -->
																			
																			</div>
																			<!-- <div class="col-md-4">

																			</div> -->

																			<div class="project" style=" width:850px;">
																				<div class="row bg-white has-shadow">
																					<div class="left-col col-lg-5 d-flex align-items-center justify-content-between">
																					<div class="project-title d-flex align-items-center">
																						<!-- <div class="widget-content-left mr-2">
																							<div class="custom-checkbox custom-control"> <input class="custom-control-input" id="exampleCustomCheckbox12" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label> </div>
																							</div> -->
																						<div class="text">
																					
																							<h3 class="h4" style="font-size: 20px;"><a data-toggle="tab" href="#tab3" role="tab"
																							aria-controls="tab1" aria-selected="true">Tugas 1</a></h3>
																						
																						</div>
																					</div>
																					<!-- <div class="project-date"><span class="hidden-sm-down">Hari Ini pada 4:24 AM</span></div> -->
																					</div>
																					
																					<div class="right-col col-lg-7 d-flex align-items-center">
																					<div class="project-date text-right" style="word-wrap: initial; margin-top: 10px;">
																						<span class="hidden-sm-down">
																							<div class="time">
																							<div class="row mt-0">
																							<div class="col-sm-6">
																							<a href="">Kumpul</a>
																							
																							</div>
																							<div class="col-sm-6">
																							<a href="">Detail</a>
																							
																							</div>
																							
																							</div>
																							</div>
																							</span>
																						</div>

																					<!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
																					<div class="project-progress" style="width: 100px;">
																						<div class="time">
																						
																						<div class="nilai">0/100</span></div>
																					

																						</div>
																					</div>
																					<div class="time"><i class="fa fa-clock-o"></i>Hari Ini pada 4:24</div>
																					
																					</div>
																					</div>
																				</div>

																				<div class="project" style=" width:850px;">
																				<div class="row bg-white has-shadow">
																					<div class="left-col col-lg-5 d-flex align-items-center justify-content-between">
																					<div class="project-title d-flex align-items-center">
																						<!-- <div class="widget-content-left mr-2">
																							<div class="custom-checkbox custom-control"> <input class="custom-control-input" id="exampleCustomCheckbox12" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label> </div>
																							</div> -->
																						<div class="text">
																					
																							<h3 class="h4" style="font-size: 20px;"><a data-toggle="tab" href="#tab3" role="tab"
																							aria-controls="tab1" aria-selected="true">Tugas 2</a></h3>
																						
																						</div>
																					</div>
																					<!-- <div class="project-date"><span class="hidden-sm-down">Hari Ini pada 4:24 AM</span></div> -->
																					</div>
																					
																					<div class="right-col col-lg-7 d-flex align-items-center">
																					<div class="project-date text-right" style="word-wrap: initial; margin-top: 10px;">
																						<span class="hidden-sm-down">
																							<div class="time">
																							<div class="row mt-0">
																							<div class="col-sm-6">
																							<a href="">Kumpul</a>
																							
																							</div>
																							<div class="col-sm-6">
																							<a href="">Detail</a>
																							
																							</div>
																							
																							</div>
																							</div>
																							</span>
																						</div>

																					<!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
																					<div class="project-progress" style="width: 100px;">
																						<div class="time">
																						
																						<div class="nilai">0/100</span></div>
																					

																						</div>
																					</div>
																					<div class="time"> <i class="fa fa-clock-o"></i>Hari Ini pada 4:24</div>
																					
																					</div>
																					</div>
																				</div>


																				</div>
																			<!--  -->
																		</div>
																		</div>
																	</div>
																</div>
																</div>
																
															</div>
																
															</div>
															<a href="#daftarSiswa" class="daftarSiswa"></a>
															<div id="daftarSiswa"></div>
															</section>
														</div>
														</div>
														</div>
													
														<!--  -->
													</div>
												</div>
				            			</td>
										</tr>
										<?php endif; ?>
										<?php endforeach; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="card-footer white py-3 d-flex justify-content-center">
								<nav>
									<ul id="pagination3" class="pagination">
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="tab4" role="tabpanel" aria-expanded="false">
				<div class="row mt-5">
					<div class="col">
						<div class="card card-list">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h2>Tugas</h2>
									</div>
									<div class="align-self-end">
										<form action="<?= base_url(); ?>Classes/search_tugas" method="post">
											<div class="input-group mb-3">
												<input class="form-control form-control-sm mr-0 w-0" type="text" name="keyword" placeholder="Cari Kelas"aria-label="Search">
												<div class="input-group-append">
													<button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true" onclick=""></i></button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="card-body table-responsive">
								<table id="pageTable4" class="table">
									<thead>
										<tr>
											<th scope="col">Kelas</th>
											<th scope="col">Nama Tugas</th>
											<th scope="col">Kategori</th>
											<th scope="col" style="text-align: center;">Deadline</th>
											<th scope="col">Nilai</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 0; ?>
										<?php foreach ($kelas_tugas as $val[$i][0]) : ?>
											<?php $j = 0; $k = 0; ?>
											<?php foreach ($tugas as $val2[$i][$j]) : ?>
												<?php foreach ($val2[$i][$j] as $val3) : ?>
													<?php if ($val[$i][0][0]['id_kelas'] == $val3['id_kelas']) : ?>
														<tr>
															<th scope="row" style="width: 300px; "><a
																	class="text-primary"><?= $val[$i][0][0]['judul_kelas']; ?></a></th>
															<td style="padding-top: 20px; ">
																<?= $val3['judul_tugas']; ?>
															</td>
															<td style="padding-top: 20px;">
																<?php if ($val3['kategori'] == "Tugas") : ?>
																	<span class="badge badge-primary"><?= $val3['kategori']; ?></span>
																<?php else : ?>
																	<span class="badge badge-warning"><?= $val3['kategori']; ?></span>
																<?php endif; ?>
															</td>
															<td style="padding-top:20px; text-align: center;">
																<span class="badge"><?= $val3['deadline']; ?></span>
															</td>
															<?php if ($cek[$k] == true) : ?>
																<td style="padding-top:20px; color: red;">
																	<b>Belum Kumpul</b>
																</td>
																<td>
																	<div class="buttonclass">
																		<a href="<?= base_url() ?>classes/detail_tugaskuis/<?= $val[$i][0][0]['id_kelas'] ?>/<?= $val3['id_tugas']; ?>" class="btn btncyan">Lihat Tugas</a>
																	</div>
																</td>
															<?php else : ?>
																<?php foreach ($submit as $val4) : ?>
																	<?php if ($val3['id_tugas'] == $val4['id_tugas'] && $val4['id_user'] == $this->session->userdata('id_user')) : ?>
																		<td style="padding-top:20px; color: black;">
																			<?php if ($val4['nilai_tugas'] == "Belum Dinilai") {
																			echo $val4['nilai_tugas']; 
																			}
																			else { 
																			echo $val4['nilai_tugas'] . "/100";
																			} ?>
																		</td>
																		<td>
																			<div class="buttonclass">
																				<a href="<?= base_url() ?>classes/detail_tugaskuis/<?= $val[$i][0][0]['id_kelas'] ?>/<?= $val3['id_tugas']; ?>" class="btn btncyan"">Lihat Tugas</a>
																			</div>
																		</td>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														</tr>
													<?php endif; ?>
												<?php $k++; ?>
												<?php endforeach; ?>
												<?php $j++; ?>
											<?php endforeach; ?>
											<?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="card-footer white py-3 d-flex justify-content-center">
								<ul id="pagination4" class="pagination">
								</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="tab5" role="tabpanel" aria-expanded="false">
				<div class="row mt-5">
					<div class="col">
						<div class="card card-list">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h2>Materi</h2>
									</div>
									<div class="align-self-end">
										<form action="<?= base_url(); ?>Classes/search_materi" method="post">
											<div class="input-group mb-3">
												<input class="form-control form-control-sm mr-0 w-0" type="text" name="keyword" placeholder="Cari Kelas"aria-label="Search">
												<div class="input-group-append">
													<button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true" onclick=""></i></button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="card-body table-responsive">
								<table id="pageTable5" class="table">
									<thead>
										<tr>
											<th scope="col">Kelas</th>
											<th scope="col" style="text-align: center;">Jumlah Materi</th>
											<th scope="col" style="text-align: center;">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $lihatMateriCount = 0; ?>
										<?php foreach ($materi as $val) : ?>
										<?php
											$countMateri = 0;
									?>
										<?php foreach ($val as $val2) : ?>
										<?php $countMateri++; ?>
										<?php endforeach; ?>
										<tr>
											<th scope="row" style="width: 300px; "><a
													href="<?= base_url(); ?>classes/open_class/<?= $val2['id_kelas']; ?>"
													class="text-primary"><?= $val2['judul_kelas']; ?></a></th>
											<td style="padding-top:20px; text-align: center;">
												<?= $countMateri; ?>
											</td>
											<td>
												<div class="buttonclass text-center">
													<button class="btn btn-info" type="button" data-toggle="modal"
														data-target="#lihatMateri<?= $lihatMateriCount; ?>"
														style="padding: 15px; font-size: 10px;">Lihat Materi</button>
												</div>
											</td>
										</tr>

										<div class="modal fade" id="lihatMateri<?= $lihatMateriCount; ?>" tabindex="-1"
											role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
											style="padding-right: 60px; padding-left: 17px;">

											<div class="modal-dialog modal-lg" role="document">
												<!--Content-->
												<div class="modal-content form-elegant">
													<!--Header-->
													<div class="modal-header text-center">
														<h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3"
															id="myModalLabel">
															<strong>Materi <?= $val2['judul_kelas']; ?></strong></h3>
														<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<!--Body-->
													<div class="modal-body mx-4">
														<!--Body-->
														<div class="container-fluid">
															<div class="row">
																<div class="col-xl-6 border-bottom  mt-3"
																	style="width: 110px;"><b>Kegiatan</b></div>
																<div class="col-xl-6 border-bottom  mt-3"
																	style="width: 110px;"><b>Nama File</b></div>
															</div>
															<div class="row">
																<?php foreach ($val as $val2) : ?>
																<div class="col-xl-6 border-bottom pb-3 mt-3"
																	style="width: 120px;">
																	<?= $val2['deskripsi_kegiatan']; ?></div>
																<div class="col-xl-6 border-bottom pb-3 mt-3"
																	style="width: 120px;"> <img
																		src="<?php echo base_url(); ?>assets/images/pdf.png"
																		alt="..." class="img-fluid rounded-circle"
																		style="width: 10px;"><a
																		href="<?= base_url(); ?>classes/download_materi/"><?= $val2['url_materi']; ?></a>
																</div>
																<?php endforeach; ?>
															</div>

														</div>


													</div>
												</div>
											</div>
										</div>
										<?php $lihatMateriCount++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="card-footer white py-3 d-flex justify-content-center">
								<ul id="pagination5" class="pagination">
								</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

											<td>
												<div class="btn-group">
													<a class="btn btn-outline-dark"
														href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>"
														style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Detail</a>
													<button type="button"
														style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;"
														class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split"
														data-toggle="dropdown" aria-haspopup="true"
														aria-expanded="false">
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item btn"
															href="<?= base_url()?>classes/lihat_kegiatan/<?= $val['id_kelas'] ?>">Lihat
															Kegiatan</a>
														<a class="dropdown-item btn"
															href="<?= base_url()?>classes/list_tugas/<?= $val['id_kelas'] ?>">List
															Tugas</a>
														<a class="dropdown-item btn"
															href="<?= base_url()?>classes/leave_class/<?= $val['id_kelas'] ?>">Tinggalkan</a>
													</div>
												</div>
											</td>

										</tr>
									</tbody>
								</table>
							</div>
							<div class="card-footer white py-3 d-flex justify-content-center">
								<ul id="pagination3" class="pagination">
								</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="tab4" role="tabpanel" aria-expanded="false">
				<div class="row mt-5">
					<div class="col">
						<div class="card card-list">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h2>Tugas</h2>
									</div>
									<div class="align-self-end">
										<form action="<?= base_url(); ?>Classes/search_tugas" method="post">
											<div class="input-group mb-3">
												<input class="form-control form-control-sm mr-0 w-0" type="text"
													name="keyword" placeholder="Cari Kelas" aria-label="Search">
												<div class="input-group-append">
													<button class="btn" type="submit"><i class="fa fa-search"
															aria-hidden="true" onclick=""></i></button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="card-body">
								<table id="pageTable4" class="table">
									<thead>
										<tr>
											<th scope="col">Kelas</th>
											<th scope="col">Nama Tugas</th>
											<th scope="col">Kategori</th>
											<th scope="col">Nilai</th>
											<th scope="col" style="text-align: center;">Deadline</th>
											<th scope="col" style="padding-left: 40px;">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 0; ?>
										<?php foreach ($kelas_tugas as $val[$i][0]) : ?>
										<?php $j = 0; $k = 0; ?>
										<?php foreach ($tugas as $val2[$i][$j]) : ?>
										<?php foreach ($val2[$i][$j] as $val3) : ?>
										<?php if ($val[$i][0][0]['id_kelas'] == $val3['id_kelas']) : ?>
										<tr>
											<th scope="row" style="width: 300px;"><a
													class="text-primary"><?= $val[$i][0][0]['judul_kelas']; ?></a></th>
											<td style="padding-top: 20px;">
												<?= $val3['judul_tugas']; ?>
											</td>
											<td style="padding-top: 20px;">
												<?php if ($val3['kategori'] == "Tugas") : ?>
												<span class="badge badge-primary"><?= $val3['kategori']; ?></span>
												<?php else : ?>
												<span class="badge badge-warning"><?= $val3['kategori']; ?></span>
												<?php endif; ?>
											</td>
											<td style="padding-top:20px">
												<span class="badge"><?= $val3['deadline']; ?></span>
											</td>
											<?php if ($cek[$k] == true) : ?>
											<td style="padding-top:20px">
												Belum Kumpul
											</td>
											<td>
												<div class="buttonclass">
													<a href="<?= base_url() ?>classes/detail_tugaskuis/<?= $val[$i][0][0]['id_kelas'] ?>/<?= $val3['id_tugas']; ?>"
														class="btn btncyan" style="color: white;">Lihat Tugas</a>
												</div>
											</td>
											<?php else : ?>
											<?php foreach ($submit as $val4) : ?>
											<?php if ($val3['id_tugas'] == $val4['id_tugas'] && $val4['id_user'] == $this->session->userdata('id_user')) : ?>
											<td style="padding-top:20px">
												<?php if ($val4['nilai_tugas'] == "Belum Dinilai") {
                                      echo $val4['nilai_tugas']; 
                                    }
                                    else { 
                                      echo $val4['nilai_tugas'] . "/100";
                                    } ?>
											</td>
											<td>
												<div class="buttonclass">
													<a href="<?= base_url() ?>classes/detail_tugaskuis/<?= $val[$i][0][0]['id_kelas'] ?>/<?= $val3['id_tugas']; ?>"
														class="btn btncyan">Lihat Tugas</a>
												</div>
											</td>
											<?php endif; ?>
											<?php endforeach; ?>
											<?php endif; ?>
										</tr>
										<?php endif; ?>
										<?php $k++; ?>
										<?php endforeach; ?>
										<?php $j++; ?>
										<?php endforeach; ?>
										<?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class=" card-footer white py-3 d-flex justify-content-center">
								<ul id="pagination4" class="pagination">
								</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="tab5" role="tabpanel" aria-expanded="false">
				<div class="row mt-5">
					<div class="col">
						<div class="card card-list">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h2>Materi</h2>
									</div>
									<div class="align-self-end">
										<form action="<?= base_url(); ?>Classes/search_materi" method="post">
											<div class="input-group mb-3">
												<input class="form-control form-control-sm mr-0 w-0" type="text"
													name="keyword" placeholder="Cari Kelas" aria-label="Search">
												<div class="input-group-append">
													<button class="btn" type="submit"><i class="fa fa-search"
															aria-hidden="true" onclick=""></i></button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="card-body">
								<table id="pageTable5" class="table">
									<thead>
										<tr>
											<th scope="col">Kelas</th>
											<th scope="col">Jumlah Materi</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $lihatMateriCount = 0; ?>
										<?php foreach ($materi as $val) : ?>
										<?php
												$countMateri = 0;
										?>
										<?php foreach ($val as $val2) : ?>
										<?php $countMateri++; ?>
										<?php endforeach; ?>
										<tr>
											<th scope="row" style="width: 300px;"><a
													href="<?= base_url(); ?>classes/open_class/<?= $val2['id_kelas']; ?>"
													class="text-primary"><?= $val2['judul_kelas']; ?></a></th>
											<td style="padding-top:20px">
												<?= $countMateri; ?>
											</td>
											<td>
												<div class="buttonclass">
													<button class="btn btn-info" type="button" data-toggle="modal"
														data-target="#lihatMateri<?= $lihatMateriCount; ?>">Lihat
														Materi</button>
												</div>
											</td>
										</tr>

										<div class="modal fade" id="lihatMateri<?= $lihatMateriCount; ?>" tabindex="-1"
											role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
											style="padding-right: 90px;">

											<div class="modal-dialog modal-lg" role="document">
												Content-->
		<!-- 
	</div>
	</div>
	<?php $lihatMateriCount++; ?>
	<?php endforeach; ?>
	</tbody>
	</table>
	</div>
	<div class="card-footer white py-3 d-flex justify-content-center">
		<ul id="pagination5" class="pagination">
		</ul>
		</nav>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div> -->
	</div>


	</div>
</section>
<script>
	$('.accordion-toggle').click(function(){
	$('.hiddenRow').hide();
	$(this).next('tr').find('.hiddenRow').show();
});
</script>

<script type="text/javascript" src="<?= base_url(); ?>assets/js/paging.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
	integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
	integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
