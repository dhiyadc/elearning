<meta name="viewport" content="width=device-width, initial-scale=1">


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<!-- <link href="<?= base_url() ?>assets/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/dataTables/dataTables.responsive.css" rel="stylesheet"> -->

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
				<a class="nav-link" data-toggle="tab" href="#tab6" role="tab" aria-expanded="false">Workshop Saya</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#tab7" role="tab" aria-expanded="false">Workshop Diikuti</a>
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
                                <?php $total = 0;
								$selesai = 0;
								foreach ($kegiatan as $val3) {
									if ($val2['id_kelas'] == $val3['id_kelas']) {
										$total++;
										if ($val3['status_kegiatan'] == 2) {
											$selesai++;
										}
									}
								}
								if ($total == 0) {
									$proses = 0;
								} else {
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
                                    <a href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas'] ?>" class="btn btn-light">Lihat kelas</a>
                                    <a href="<?= base_url() ?>classes/leave_class/<?= $val['id_kelas'] ?>" class="btn btn-danger">Tinggalkan</a>
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
										<!-- <form action="<?= base_url(); ?>Classes/search_kelas_saya" method="post"> -->
										<div class="input-group mb-3">

											<input id="inputSearch" class="form-control form-control-sm mr-0 w-0" id="searchTable" type="text" name="keyword" placeholder="Cari..." aria-label="Search">

											<!-- <div class="input-group-append">
													<button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true" onclick=""></i></button>
												</div> -->
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
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center">Progress</th>
											<th scope="col" class="text-center">Status</th>
											<th scope="col" class="text-center">Tipe</th>
											<th scope="col" class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody id="pageSearch">
										<?php $ctClass = 0; ?>
										<?php foreach ($kelas as $val) : ?>

											<?php $ctClass++; ?>
											<tr>
												<th class="kelasSearch" scope="row" style="width: 300px; padding-top: 23px;"><a class="text-primary"><?= $val['judul_kelas']; ?></a>
													<div id="accordion" role="tablist">

													</div>

												</th>
												<td style="padding-top: 20px; padding-top: 23px;">
													<span><small><small><a id="btnCopy" href="" onclick="return false" data-toggle="tooltip" data-original-title="Click to copy" data-clipboard-text="Hey, saya sudah membuat kelas baru silahkan cek disini: <?= base_url(); ?>classes/open_class/<?= $val['id_kelas'] ?>">Share Link</a></small></small></span>
												</td>

												<td style="padding-top: 23px;">
													<?php $total = 0;
													$selesai = 0;
													foreach ($kegiatan as $val2) {
														if ($val['id_kelas'] == $val2['id_kelas']) {
															$total++;
															if ($val2['status_kegiatan'] == 2) {
																$selesai++;
															}
														}
													}
													if ($total == 0) {
														$proses = 0;
													} else {
														$proses = ($selesai / $total) * 100;
													} ?>
													<div class="progress md-progress">

														<div class="progress-bar bg-info" role="progressbar" style="width: <?= $proses; ?>%" aria-valuenow="<?= $proses; ?>" aria-valuemin="0" aria-valuemax="100"><?= round($proses); ?>%</div>
													</div>
												</td>
												<td style="padding-top: 20px;" class="text-center">
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
												<td style="padding-top: 20px;" class="text-center">
													<?php if ($val['tipe_kelas'] == 1) : ?>
														<span class="badge badge-light">Public</span>
													<?php else : ?>
														<span class="badge badge-dark">Private</span>
													<?php endif; ?>
												</td>
												<td style="padding-top: 20px;" class="text-center">
													<div class="buttonclass">
														<div class="btn-group">
															<a class="btn btn-outline-dark" href="<?= base_url() ?>classes/lihat_kegiatan/<?= $val['id_kelas'] ?>" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Detail</a>
															<button type="button" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																<span class="sr-only">Toggle Dropdown</span>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item btn" data-toggle="collapse" data-target="#collapseOne<?= $val['id_kelas'] ?>" aria-expanded="true" aria-controls="collapseOne" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Lihat
																	Kegiatan</a>
																<a class="dropdown-item btn" type="button" data-toggle="modal" data-target="#tambahKegiatan<?= $ctClass ?>" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Tambah
																	Kegiatan</a>
																<a class="dropdown-item btn" href="<?= base_url() ?>classes/list_tugas/<?= $val['id_kelas'] ?>" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">List
																	Tugas</a>
																<a class="dropdown-item btn" href="<?= base_url() ?>classes/new_assignment/<?= $val['id_kelas'] ?>" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Buat
																	Tugas</a>
																<a class="dropdown-item btn" href="<?= base_url() ?>classes/update_class/<?= $val['id_kelas'] ?>" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Edit
																	Kelas</a>
															</div>
														</div>
													</div>
												</td>
											</tr>

											<tr class="p">
												<td colspan="6" class="hiddenRow" style="border-top: 0px; padding: 0px;">
													<div id="collapseOne<?= $val['id_kelas'] ?>" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionExample">
														<div class="card-body" style="margin-top: -20px;">
															<!--  -->
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
																					<?php $modalMateri = 0; ?>
																					<?php foreach ($kegiatan_saya as $val4) : ?>
																						<?php foreach ($val4 as $val5) : ?>
																							<?php if ($val['id_kelas'] == $val5['id_kelas']) : ?>
																								<tr>
																									<td style="padding-top: 23px;"><?= $val5['deskripsi_kegiatan']; ?></td>
																									<td style="padding-top: 23px;"><?= $val5['tanggal']; ?></td>
																									<td style="padding-top: 23px;"><?= $val5['waktu']; ?></td>

																									<td style="text-align: center ; padding-top: 20px;">
																										<?php if ($val5['status_kegiatan'] == 1) : ?>
																											<span class="badge badge-warning" style="padding: 6px;">Sedang Berlangsung</span>
																										<?php elseif ($val5['status_kegiatan'] == 2) : ?>
																											<span class="badge badge-success" style="padding: 6px;">Selesai</span>
																										<?php else : ?>
																											<span class="badge badge-danger" style="padding: 6px;">Belum Mulai</span>
																										<?php endif; ?>
																									</td>

																									<td>
																										<?php if ($val5['status_kegiatan'] != CLASS_FINISHED) : ?>
																											<div class="btn-group" role="group" aria-label="Basic example">
																												<a class="dropdown-item btn" class="btn btn-secondary" href="" data-toggle="modal" data-target="#editKegiatan<?= $val5['id_kegiatan']; ?>">Edit</a>
																												<a class="dropdown-item btn" class="btn btn-secondary" href="<?= base_url('class/') ?><?= $val['id_kelas'] ?>/<?= $val5['id_kegiatan']; ?>">Mulai</a>
																											</div>
																											<div class="modal fade" id="editKegiatan<?= $val5['id_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 90px;">
																												<div class="modal-dialog" role="document">
																													<!--Content-->
																													<div class="modal-content form-elegant">
																														<!--Header-->
																														<div class="modal-header text-center">
																															<h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Edit Kegiatan</strong></h3>
																															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																																<span aria-hidden="true">&times;</span>
																															</button>
																														</div>
																														<!--Body-->
																														<div class="modal-body mx-4">
																															<!--Body-->
																															<form enctype="multipart/form-data" action="<?= base_url() ?>classes/edit_kegiatan/<?= $val['id_kelas'] ?>/<?= $val5['id_kegiatan'] ?>" method="POST">
																																<div class="form-group">
																																	<label>Deskripsi Kegiatan</label>
																																	<textarea class="form-control" name="deskripsi" required><?= $val5['deskripsi_kegiatan'] ?></textarea>
																																</div>
																																<!--Body-->
																																<div class="modal-body mx-4">
																																	<!--Body-->
																																	<form enctype="multipart/form-data" action="<?= base_url() ?>classes/edit_kegiatan/<?= $val['id_kelas'] ?>/<?= $val5['id_kegiatan'] ?>/akademik" method="POST">
																																		<div class="form-group">
																																			<label>Deskripsi Kegiatan</label>
																																			<textarea class="form-control" name="deskripsi" required><?= $val5['deskripsi_kegiatan'] ?></textarea>
																																		</div>
																																		<div class="form-group">
																																			<label for="materiForm">Video (Opsional)</label>
																																			<div id="kegiatan_field">
																																				<textarea class="form-control" name="video" placeholder="Tambahkan link Youtube Embed. Jika Banyak, pisahkan dengan koma ( , )" style="margin-bottom: 5px;"></textarea>
																																			</div>
																																		</div>
																																		<label for="materiForm">Tambah Materi</label>
																																		<input type="file" name="materi[]" accept=".doc, .docx, .ppt, .pptx, .pdf" class="form-control-file" id="materiForm" multiple>

																																</div>
																																<input type="hidden" name="tanggal" value="<?= $val5['tanggal_kegiatan'] ?>">

																																<div class="text-center mb-3">
																																	<button type="submit" class="btn btn-light blue-gradient btn-block btn-rounded z-depth-1a">Simpan</button>
																																</div>
																															</form>
																														</div>
																													</div>
																												</div>
																											</div>
																										<?php endif; ?>
																									<td>
																										<button class="btn btn-light btn-md px-3 my-0 ml-0" type="button" data-toggle="modal" data-target="#lihatMateri<?= $val5['id_kegiatan']; ?>">Lihat Materi</button>
																									</td>
																								</tr>
																								<div class="modal fade" id="lihatMateri<?= $val5['id_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 60px; padding-left: 17px;">

																									<div class="modal-dialog modal-lg" role="document">
																										<!--Content-->
																										<div class="modal-content form-elegant">
																											<!--Header-->
																											<div class="modal-header text-center">
																												<h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel">
																													<strong>Materi <?= $val['judul_kelas']; ?></strong></h3>
																												<?php $id_kelass = $val['id_kelas']; ?>
																												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																													<span aria-hidden="true">&times;</span>
																												</button>
																											</div>
																											<!--Body-->
																											<div class="modal-body mx-4">
																												<!--Body-->
																												<div class="container-fluid">
																													<div class="row">
																														<div class="col-xl-6 border-bottom  mt-3" style="width: 110px;"><b>Kegiatan</b></div>
																														<div class="col-xl-6 border-bottom  mt-3" style="width: 110px;"><b>Nama File</b></div>
																													</div>
																													<div class="row">


																														<?php foreach ($kegiatan as $val12) : ?>
																															<?php if ($val12['id_kelas'] == $val['id_kelas'] && $val12['id_kegiatan'] == $val5['id_kegiatan']) : ?>
																																<?php $a = 0; ?>

																																<?php foreach ($materi2 as $val13) : ?>
																																	<?php if (
																																		$val5['id_kegiatan'] ==
																																		$val13['id_kegiatan']
																																	) : ?>

																																		<div class="col-xl-6 border-bottom pb-3 mt-3" style="width: 120px;">
																																			<?= $val12['deskripsi_kegiatan']; ?></div>
																																		<?php if ($val13['kategori_materi'] == 1) : ?>
																																			<div class="col-xl-6 border-bottom pb-3 mt-3" style="width: 120px;"><a href="<?= base_url(); ?>classes/download_materi/<?= $val13['url_materi']; ?>"><i class="fa fa-file"></i> <?= wordwrap($val13['url_materi'], 26, '<br>', true); ?></a>
																																			</div>

																																		<?php else : ?>
																																			<?php $a++ ?>
																																			<?php $strvid = "Video " . $a . " Kegiatan " . $val12['deskripsi_kegiatan'] . " <b>(" . $val['judul_kelas'] . ")</b>"; ?>
																																			<div class="col-xl-6 border-bottom pb-3 mt-3" style="width: 120px;"> <a href="<?= base_url(); ?>classes/video_class/<?= $val['id_kelas'] ?>/<?= $val12['id_kegiatan'] ?>/<?= $val13['id_materi'] ?>/<?= $a ?>"><i class="fa fa-video-camera"></i> <?= wordwrap($strvid, 26, '<br>', true); ?> </a>
																																			</div>
																																		<?php endif; ?>
																																	<?php endif; ?>
																																<?php endforeach; ?>
																															<?php endif ?>
																														<?php endforeach; ?>

																													</div>


																												</div>


																											</div>
																										</div>
																									</div>
																								</div>
																							<?php endif; ?>
																						<?php endforeach; ?>
																					<?php endforeach; ?>
																					<?php $modalMateri++; ?>
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<div class="modal fade" id="tambahKegiatan<?= $ctClass ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 90px;">
												<div class="modal-dialog" role="document">
													<!--Content-->
													<div class="modal-content form-elegant">
														<!--Header-->
														<div class="modal-header text-center">
															<h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Kelas <?= $val['judul_kelas']; ?></strong></h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>



														<!--Body-->
														<div class="modal-body mx-4">
															<!--Body-->
															<form enctype="multipart/form-data" action="<?= base_url() ?>classes/set_kegiatan/<?= $val['id_kelas'] ?>/akademik" method="POST">
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
																<div class="form-group">
																	<label for="materiForm">Video (Opsional)</label>
																	<div id="kegiatan_field">
																		<textarea class="form-control" name="video" placeholder="Tambahkan link Youtube Embed. Jika Banyak, pisahkan dengan koma ( , )" style="margin-bottom: 5px;"></textarea>
																	</div>
																</div>
																<input type="hidden" id="dtp_input1" />
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



										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<!-- <div class="card-footer white py-3 d-flex justify-content-center">
								<ul id="pagination" class="pagination">
								</ul>
								</nav>
							</div> -->
						</div>

					</div>
				</div>

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
										<!-- <form action="<?= base_url(); ?>Classes/search_kelas_saya" method="post"> -->
										<div class="input-group mb-3">

											<input id="inputSearch3" class="form-control form-control-sm mr-0 w-0" id="searchTable" type="text" name="keyword" placeholder="Cari..." aria-label="Search">

											<!-- <div class="input-group-append">
													<button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true" onclick=""></i></button>
												</div> -->
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
											<th scope="col" class="text-center">Progress</th>
											<th scope="col" class="text-center">Status</th>
											<th scope="col" class="text-center">Tipe</th>
											<th scope="col" class="text-center">Aksi</th>

										</tr>
									</thead>
									<tbody id="pageSearch3">
										<?php foreach ($seluruh_kelas as $val) : ?>
											<?php foreach ($peserta as $val2) : ?>
												<?php if ($val2['id_kelas'] == $val['id_kelas'] && $val2['id_user'] == $this->session->userdata('id_user')) : ?>
													<tr>
														<?php if ($val['tipe_kelas'] == 2) : ?>
															<th scope="row" style="width: 300px;"><a class="text-primary"><?= $val['judul_kelas']; ?> <i class="fa fa-lock"></a></th>
														<?php else : ?>
															<th scope="row" style="width: 300px;"><a class="text-primary"><?= $val['judul_kelas']; ?></a></th>

														<?php endif; ?>
														<td style="padding-top: 20px;" class="text-center">
															<?php $total = 0;
															$selesai = 0;
															foreach ($kegiatan as $val3) {
																if ($val2['id_kelas'] == $val3['id_kelas']) {
																	$total++;
																	if ($val3['status_kegiatan'] == 2) {
																		$selesai++;
																	}
																}
															}
															if ($total == 0) {
																$proses = 0;
															} else {
																$proses = ($selesai / $total) * 100;
															} ?>
															<div class="progress md-progress">
																<div class="progress-bar bg-info" role="progressbar" style="width: <?= $proses; ?>%" aria-valuenow="<?= round($proses); ?>" aria-valuemin="0" aria-valuemax="100"><?= $proses; ?>%</div>
															</div>
														</td>
														<td style="padding-top:20px;" class="text-center">
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
														<td style="padding-top:20px;" class="text-center">
															<?php if ($val['tipe_kelas'] == 1) : ?>
																<span class="badge badge-light">Public</span>
															<?php else : ?>
																<span class="badge badge-dark">Private</span>
															<?php endif; ?>
														</td>
														<td class="text-center">
															<div class="buttonclass">
																<div class="btn-group">
																	<a class="btn btn-outline-dark" href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas'] ?>" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Detail</a>
																	<button type="button" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																		<span class="sr-only">Toggle Dropdown</span>
																	</button>
																	<div class="dropdown-menu">
																		<a class="dropdown-item btn" data-toggle="collapse" data-target="#collapseTwo<?= $val['id_kelas'] ?>" aria-expanded="false" aria-controls="collapseTwo" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Lihat Tugas</a>
																		<a class="dropdown-item btn" data-toggle="collapse" data-target="#collapseJadwal<?= $val['id_kelas'] ?>" aria-expanded="false" aria-controls="collapseJadwal" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Lihat Kegiatan</a>
																		<a class="dropdown-item btn" data-toggle='modal' data-target='#konfirmasi_hapus' data-href="<?= base_url() ?>classes/leave_class/<?= $val['id_kelas'] ?>" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Tinggalkan</a>
																	</div>
																</div>
															</div>
														</td>
													</tr>


													<tr class="p">
														<td colspan="6" class="hiddenRow" style="border-top: 0px; padding: 0px;">
															<div id="collapseTwo<?= $val['id_kelas'] ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
																<div class="card-body" style="margin-top: -20px;">
																	<!--  -->
																	<div class="container my-5">
																		<ul style="list-style: outside none none;" class="nav nav-tabs" role="tablist">
																			<li class="nav-item">
																				<a class="nav-link active" data-toggle="tab" href="#tabtugas<?= $val['id_kelas'] ?>" role="tab" aria-expanded="false">Tugas</a>
																			</li>
																			<li class="nav-item">
																				<a class="nav-link" data-toggle="tab" href="#tabkuis<?= $val['id_kelas'] ?>" role="tab" aria-expanded="false">Quiz</a>
																			</li>
																			<li class="nav-item">
																				<a class="nav-link" data-toggle="tab" href="#tabakhir<?= $val['id_kelas'] ?>" role="tab" aria-expanded="false">Tugas Akhir</a>
																			</li>



																		</ul>

																		<!-- Tab panes -------------- -->
																		<div class="tab-content">
																			<div class="tab-pane active" id="tabtugas<?= $val['id_kelas'] ?>" role="tabpanel" aria-expanded="true">

																				<section class="projects no-padding-top">
																					<div class="container">
																						<!-- Project-->
																						<div class="project">
																							<div class="row bg-white has-shadow">
																								<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
																									<div class="project-title d-flex align-items-center">
																										<div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
																										<div class="text">
																											<?php foreach ($pembuat as $val4) : ?>
																												<?php if ($val['pembuat_kelas'] == $val4['id_user']) : ?>
																													<h3 class="h4" style="font-size: 20px;">Kelas <?= $val['judul_kelas'] ?></h3><small>oleh <?= $val4['nama']; ?></small>
																												<?php endif; ?>
																											<?php endforeach; ?>
																										</div>
																									</div>
																								</div>
																								<div class="right-col col-lg-3 d-flex align-items-center">
																									<?php $countTugas = 0;
																									foreach ($tugas as $val4) {
																										foreach ($val4 as $val5) {
																											if ($val['id_kelas'] == $val5['id_kelas']) {
																												if ($val5['kategori_tugas'] == 1) {
																													$countTugas++;
																												}
																											}
																										}
																									} ?>
																									<div class="time"><i class="fa fa-tasks" aria-hidden="true"></i><?= $countTugas; ?> Tugas</div>
																								</div>

																								<div class="right-col col-lg-3 d-flex align-items-center">
																									<div class="time"><i class="fa fa-clock-o"></i><a href="" data-toggle="collapse" data-target="#collapseJadwal<?= $val['id_kelas'] ?>" aria-expanded="false" aria-controls="collapseJadwal">Jadwal Kegiatan</a></div>
																								</div>

																								<div class="row d-flex ">
																									<div class="col-12 col-md-12 mb-2 mt-2">
																										<div class="card  h-100 border-light ">
																											<div class="card-body d-flex-row" style="width: 900px;">
																												<div class="row mb-0" style="padding: 0px;">
																													<?php $l = 0; ?>
																													<?php foreach ($tugas as $val4) : ?>
																														<?php foreach ($val4 as $val5) : ?>
																															<?php if ($val['id_kelas'] == $val5['id_kelas']) : ?>
																																<?php if ($val5['kategori_tugas'] == 1) : ?>
																																	<div class="project" style=" width:850px;">
																																		<div class="row bg-white has-shadow">
																																			<div class="left-col col-lg-5 d-flex align-items-center justify-content-between">
																																				<div class="project-title d-flex align-items-center">
																																					<div class="text">
																																						<h3 class="h4" style="font-size: 20px;"><a href="<?= base_url() ?>classes/detail_tugaskuis/<?= $val['id_kelas'] ?>/<?= $val5['id_tugas'] ?>"><?= $val5['judul_tugas'] ?></a></h3>
																																					</div>
																																				</div>
																																			</div>
																																			<div class="right-col col-lg-7 d-flex align-items-center">
																																				<?php if ($cek[$l] == true) : ?>
																																					<div class="project-date text-right" style="word-wrap: initial; margin-top: 10px;">
																																						<span class="hidden-sm-down">
																																							<div class="time">
																																								<div class="row mt-0">
																																									<div class="col-sm-4">
																																										<a href="" data-toggle="modal" data-target="#detailTugas<?= $val5['id_tugas']; ?>">Serahkan Jawaban</a>
																																									</div>
																																								</div>
																																							</div>
																																						</span>
																																					</div>
																																					<div class="project-progress" style="width: 100px;">
																																						<div class="time">
																																							<div class="nilai" style="color: red;"><b>Belum Kumpul</b></span></div>
																																						</div>
																																					</div>
																																				<?php else : ?>
																																					<?php foreach ($submit as $val6) : ?>
																																						<?php if ($val5['id_tugas'] == $val6['id_tugas'] && $val6['id_user'] == $this->session->userdata('id_user')) : ?>
																																							<div class="project-date text-right" style="word-wrap: initial; margin-top: 10px;">
																																								<span class="hidden-sm-down">
																																									<div class="time">
																																										<div class="row mt-0">
																																											<div class="col-sm-4">
																																												<?php if ($val6['nilai_tugas'] == "Belum Dinilai") : ?>
																																													<a href="" data-toggle="modal" data-target="#detailTugas<?= $val5['id_tugas']; ?>">Serahkan Jawaban</a>
																																												<?php endif; ?>
																																											</div>
																																										</div>
																																									</div>
																																								</span>
																																							</div>
																																							<div class="project-progress" style="width: 100px;">
																																								<div class="time">
																																									<?php if ($val6['nilai_tugas'] == "Belum Dinilai") : ?>
																																										<div class="nilai">Belum Dinilai</span></div>
																																									<?php else : ?>
																																										<div class="nilai"><?= $val6['nilai_tugas']; ?>/100</span></div>
																																									<?php endif; ?>
																																								</div>
																																							</div>
																																						<?php endif; ?>
																																					<?php endforeach; ?>
																																				<?php endif; ?>
																																				<div class="time"><i class="fa fa-clock-o"></i><?= $val5['deadline'] ?></div>
																																			</div>
																																		</div>
																																	</div>
																																<?php endif; ?>
																															<?php endif; ?>
																															<?php $l++; ?>
																														<?php endforeach; ?>
																													<?php endforeach; ?>


																												</div>
																												<!--  -->
																											</div>
																										</div>

																									</div>
																								</div>
																							</div>

																						</div>
																					</div>
																				</section>

																			</div>
																			<div class="tab-pane" id="tabkuis<?= $val['id_kelas'] ?>" role="tabpanel" aria-expanded="true">

																				<section class="projects no-padding-top">
																					<div class="container">
																						<!-- Project-->

																						<div class="project">
																							<div class="row bg-white has-shadow">
																								<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
																									<div class="project-title d-flex align-items-center">
																										<div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
																										<div class="text">
																											<?php foreach ($pembuat as $val4) : ?>
																												<?php if ($val['pembuat_kelas'] == $val4['id_user']) : ?>
																													<h3 class="h4" style="font-size: 20px;">Kelas <?= $val['judul_kelas'] ?></h3><small>oleh <?= $val4['nama']; ?></small>
																												<?php endif; ?>
																											<?php endforeach; ?>
																										</div>
																									</div>
																								</div>
																								<div class="right-col col-lg-3 d-flex align-items-center">

																									<?php $countKuis = 0;
																									foreach ($tugas as $val4) {
																										foreach ($val4 as $val5) {
																											if ($val['id_kelas'] == $val5['id_kelas']) {
																												if ($val5['kategori_tugas'] == 2) {
																													$countKuis++;
																												}
																											}
																										}
																									} ?>
																									<div class="time"><i class="fa fa-tasks" aria-hidden="true"></i><?= $countKuis; ?> Quiz</div>
																								</div>

																								<div class="right-col col-lg-3 d-flex align-items-center">
																									<div class="time"><i class="fa fa-clock-o"></i><a href="" data-toggle="collapse" data-target="#collapseJadwal<?= $val['id_kelas'] ?>" aria-expanded="false" aria-controls="collapseJadwal">Jadwal Kegiatan</a></div>
																								</div>



																								<div class="row d-flex ">
																									<div class="col-12 col-md-12 mb-2 mt-2">
																										<div class="card  h-100 border-light ">
																											<div class="card-body d-flex-row" style="width: 900px;">
																												<div class="row mb-0" style="padding: 0px;">
																													<?php $l = 0; ?>
																													<?php foreach ($tugas as $val4) : ?>
																														<?php foreach ($val4 as $val5) : ?>
																															<?php if ($val['id_kelas'] == $val5['id_kelas']) : ?>
																																<?php if ($val5['kategori_tugas'] == 2) : ?>
																																	<div class="project" style=" width:850px;">
																																		<div class="row bg-white has-shadow">
																																			<div class="left-col col-lg-5 d-flex align-items-center justify-content-between">
																																				<div class="project-title d-flex align-items-center">
																																					<div class="text">
																																						<h3 class="h4" style="font-size: 20px;"><a href="<?= base_url() ?>classes/detail_tugaskuis/<?= $val['id_kelas'] ?>/<?= $val5['id_tugas'] ?>"><?= $val5['judul_tugas'] ?></a></h3>
																																					</div>
																																				</div>
																																			</div>
																																			<div class="right-col col-lg-7 d-flex align-items-center">
																																				<?php if ($cek[$l] == true) : ?>
																																					<div class="project-date text-right" style="word-wrap: initial; margin-top: 10px;">
																																						<span class="hidden-sm-down">
																																							<div class="time">
																																								<div class="row mt-0">
																																									<div class="col-sm-4">
																																										<a href="" data-toggle="modal" data-target="#detailTugas<?= $val5['id_tugas']; ?>">Serahkan Jawaban</a>
																																									</div>
																																								</div>
																																							</div>
																																						</span>
																																					</div>
																																					<div class="project-progress" style="width: 100px;">
																																						<div class="time">
																																							<div class="nilai" style="color: red;"><b>Belum Kumpul</b></span></div>
																																						</div>
																																					</div>
																																				<?php else : ?>
																																					<?php foreach ($submit as $val6) : ?>
																																						<?php if ($val5['id_tugas'] == $val6['id_tugas'] && $val6['id_user'] == $this->session->userdata('id_user')) : ?>
																																							<div class="project-date text-right" style="word-wrap: initial; margin-top: 10px;">
																																								<span class="hidden-sm-down">
																																									<div class="time">
																																										<div class="row mt-0">
																																											<div class="col-sm-4">
																																												<?php if ($val6['nilai_tugas'] == "Belum Dinilai") : ?>
																																													<a href="" data-toggle="modal" data-target="#detailTugas<?= $val5['id_tugas']; ?>">Serahkan Jawaban</a>
																																												<?php endif; ?>
																																											</div>
																																										</div>
																																									</div>
																																								</span>
																																							</div>
																																							<div class="project-progress" style="width: 100px;">
																																								<div class="time">
																																									<?php if ($val6['nilai_tugas'] == "Belum Dinilai") : ?>
																																										<div class="nilai">Belum Dinilai</span></div>
																																									<?php else : ?>
																																										<div class="nilai"><?= $val6['nilai_tugas']; ?>/100</span></div>
																																									<?php endif; ?>
																																								</div>
																																							</div>
																																						<?php endif; ?>
																																					<?php endforeach; ?>
																																				<?php endif; ?>
																																				<div class="time"><i class="fa fa-clock-o"></i><?= $val5['deadline'] ?></div>
																																			</div>
																																		</div>
																																	</div>
																																<?php endif; ?>
																															<?php endif; ?>
																															<?php $l++; ?>
																														<?php endforeach; ?>
																													<?php endforeach; ?>

																												</div>
																												<!--  -->
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>

																						</div>

																					</div>
																				</section>

																			</div>

																			<div class="tab-pane" id="tabakhir<?= $val['id_kelas'] ?>" role="tabpanel" aria-expanded="true">

																				<section class="projects no-padding-top">
																					<div class="container">
																						<!-- Project-->

																						<div class="project">
																							<div class="row bg-white has-shadow">
																								<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
																									<div class="project-title d-flex align-items-center">
																										<div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
																										<div class="text">
																											<?php foreach ($pembuat as $val4) : ?>
																												<?php if ($val['pembuat_kelas'] == $val4['id_user']) : ?>
																													<h3 class="h4" style="font-size: 20px;">Kelas <?= $val['judul_kelas'] ?></h3><small>oleh <?= $val4['nama']; ?></small>
																												<?php endif; ?>
																											<?php endforeach; ?>
																										</div>
																									</div>
																								</div>
																								<div class="right-col col-lg-3 d-flex align-items-center">

																									<?php $countTugasAkhir = 0;
																									foreach ($tugas as $val4) {
																										foreach ($val4 as $val5) {
																											if ($val['id_kelas'] == $val5['id_kelas']) {
																												if ($val5['kategori_tugas'] == 3) {
																													$countAkhir++;
																												}
																											}
																										}
																									} ?>
																									<div class="time"><i class="fa fa-tasks" aria-hidden="true"></i><?= $countTugasAkhir; ?> Tugas Akhir</div>
																								</div>

																								<div class="right-col col-lg-3 d-flex align-items-center">
																									<div class="time"><i class="fa fa-clock-o"></i><a href="" data-toggle="collapse" data-target="#collapseJadwal<?= $val['id_kelas'] ?>" aria-expanded="false" aria-controls="collapseJadwal">Jadwal Kegiatan</a></div>
																								</div>



																								<div class="row d-flex ">
																									<div class="col-12 col-md-12 mb-2 mt-2">
																										<div class="card  h-100 border-light ">
																											<div class="card-body d-flex-row" style="width: 900px;">
																												<div class="row mb-0" style="padding: 0px;">
																													<?php $l = 0; ?>
																													<?php foreach ($tugas as $val4) : ?>
																														<?php foreach ($val4 as $val5) : ?>
																															<?php if ($val['id_kelas'] == $val5['id_kelas']) : ?>
																																<?php if ($val5['kategori_tugas'] == 3) : ?>
																																	<div class="project" style=" width:850px;">
																																		<div class="row bg-white has-shadow">
																																			<div class="left-col col-lg-5 d-flex align-items-center justify-content-between">
																																				<div class="project-title d-flex align-items-center">
																																					<div class="text">
																																						<h3 class="h4" style="font-size: 20px;"><a href="<?= base_url() ?>classes/detail_tugaskuis/<?= $val['id_kelas'] ?>/<?= $val5['id_tugas'] ?>"><?= $val5['judul_tugas'] ?></a></h3>
																																					</div>
																																				</div>
																																			</div>
																																			<div class="right-col col-lg-7 d-flex align-items-center">
																																				<?php if ($cek[$l] == true) : ?>
																																					<div class="project-date text-right" style="word-wrap: initial; margin-top: 10px;">
																																						<span class="hidden-sm-down">
																																							<div class="time">
																																								<div class="row mt-0">
																																									<div class="col-sm-4">
																																										<a href="" data-toggle="modal" data-target="#detailTugas<?= $val5['id_tugas']; ?>">Serahkan Jawaban</a>
																																									</div>
																																								</div>
																																							</div>
																																						</span>
																																					</div>
																																					<div class="project-progress" style="width: 100px;">
																																						<div class="time">
																																							<div class="nilai" style="color: red;"><b>Belum Kumpul</b></span></div>
																																						</div>
																																					</div>
																																				<?php else : ?>
																																					<?php foreach ($submit as $val6) : ?>
																																						<?php if ($val5['id_tugas'] == $val6['id_tugas'] && $val6['id_user'] == $this->session->userdata('id_user')) : ?>
																																							<div class="project-date text-right" style="word-wrap: initial; margin-top: 10px;">
																																								<span class="hidden-sm-down">
																																									<div class="time">
																																										<div class="row mt-0">
																																											<?php if ($val6['nilai_tugas'] == "Belum Dinilai") : ?>
																																												<a href="" data-toggle="modal" data-target="#detailTugas<?= $val5['id_tugas']; ?>">Serahkan Jawaban</a>
																																											<?php endif; ?>
																																										</div>
																																									</div>
																																								</span>
																																							</div>
																																							<div class="project-progress" style="width: 100px;">
																																								<div class="time">
																																									<?php if ($val6['nilai_tugas'] == "Belum Dinilai") : ?>
																																										<div class="nilai">Belum Dinilai</span></div>
																																									<?php else : ?>
																																										<div class="nilai"><?= $val6['nilai_tugas']; ?>/100</span></div>
																																									<?php endif; ?>
																																								</div>
																																							</div>
																																						<?php endif; ?>
																																					<?php endforeach; ?>
																																				<?php endif; ?>
																																				<div class="time"><i class="fa fa-clock-o"></i><?= $val5['deadline'] ?></div>
																																			</div>
																																		</div>
																																	</div>
																																<?php endif; ?>
																															<?php endif; ?>
																															<?php $l++; ?>
																														<?php endforeach; ?>
																													<?php endforeach; ?>

																												</div>
																												<!--  -->
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>

																						</div>

																					</div>
																				</section>
																			</div>
																		</div>
																	</div>

																	<!--  -->
																</div>
															</div>
														</td>
													</tr>
													<?php foreach ($tugas as $val4) : ?>
														<?php $l = 0; ?>
														<?php foreach ($val4 as $val5) : ?>
															<?php if ($val['id_kelas'] == $val5['id_kelas']) : ?>
																<div class="modal fade" id="detailTugas<?= $val5['id_tugas']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 90px;">
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
																				<?php if ($cek[$l] == true) : ?>
																					<form enctype="multipart/form-data" action="<?= base_url() ?>classes/collect_assignment/<?= $val['id_kelas'] ?>/<?= $val5['id_tugas'] ?>/akademik" method="POST">
																						<div class="form-group">
																							<label>Subjek</label>
																							<input type="text" class="form-control" name="subjek" required>
																						</div>
																						<div class="form-group">
																							<label>File (hanya pdf/doc/docx)</label>
																							<input type="file" class="form-control" name="assignment" accept=".pdf, .doc, .docx" required>
																						</div>
																						<!--Body-->
																						<div class="modal-body mx-4">
																							<!--Body-->
																							<?php if ($this->session->flashdata('failedInputFile')) : ?>
																								<div class="alert alert-danger"> <?= $this->session->flashdata('failedInputFile') ?> </div>
																							<?php endif; ?>
																							<!-- <p><strong><b>Kumpul Tugas Anda</b></strong></p> -->
																							<?php if ($cek[$l] == true) : ?>
																								<form enctype="multipart/form-data" action="<?= base_url() ?>classes/collect_assignment/<?= $val['id_kelas'] ?>/<?= $val5['id_tugas'] ?>" method="POST">
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
																								<?php foreach ($submit as $val6) : ?>
																									<?php if ($val5['id_tugas'] == $val6['id_tugas'] && $val6['id_user'] == $this->session->userdata('id_user')) : ?>
																										<p>Jawaban</p>
																										<p><a href="<?= base_url() ?>classes/download_assignment/<?= $val6['url_file']; ?>"><?= $val6['url_file']; ?></a></p>
																										<div class="text-center mb-3">
																											<a href="<?= base_url() ?>classes/hapus_jawaban/<?= $val['id_kelas']; ?>/<?= $val5['id_tugas']; ?>/<?= $val6['id_submit']; ?>" class="btn btn-danger blue-gradient btn-block btn-rounded z-depth-1a">Hapus Jawaban</a>
																										</div>
																									<?php endif; ?>
																								<?php endforeach; ?>
																							<?php endif; ?>
																						</div>
																					</form>
																				<?php else : ?>
																					<?php foreach ($submit as $val6) : ?>
																						<?php if ($val5['id_tugas'] == $val6['id_tugas'] && $val6['id_user'] == $this->session->userdata('id_user')) : ?>
																							<p>Jawaban</p>
																							<p><a href="<?= base_url() ?>classes/download_assignment/<?= $val6['url_file']; ?>"><?= $val6['url_file']; ?></a></p>
																							<div class="text-center mb-3">
																								<a href="<?= base_url() ?>classes/hapus_jawaban/<?= $val['id_kelas']; ?>/<?= $val5['id_tugas']; ?>/<?= $val6['id_submit']; ?>/akademik" class="btn btn-danger blue-gradient btn-block btn-rounded z-depth-1a">Hapus Jawaban</a>
																							</div>
																						<?php endif; ?>
																					<?php endforeach; ?>
																				<?php endif; ?>
																			</div>
																		</div>
																	</div>
																<?php endif; ?>
																<?php $l++; ?>
															<?php endforeach; ?>
														<?php endforeach; ?>


														<!-- Jadwal -->
														<tr class="p">
															<td colspan="6" class="hiddenRow" style="padding: 0px; border-top: 0px;">
																<div id="collapseJadwal<?= $val['id_kelas'] ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
																	<div class="card-body" style="padding-top: 0px;">
																		<div class="row" style="margin-bottom: -20px;">
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
																								</tr>
																							</thead>
																							<tbody>
																								<?php foreach ($kegiatan_diikuti as $val4) : ?>
																									<?php foreach ($val4 as $val5) : ?>
																										<?php if ($val['id_kelas'] == $val5['id_kelas']) : ?>
																											<tr>
																												<td><?= $val5['deskripsi_kegiatan']; ?></td>
																												<td><?= $val5['tanggal']; ?></td>
																												<td><?= $val5['waktu']; ?></td>
																												<td style="text-align: center ; padding-top: 20px;">
																													<?php if ($val5['status_kegiatan'] == 1) : ?>
																														<span class="badge badge-warning" style="padding: 6px;">Sedang Berlangsung</span>
																													<?php elseif ($val5['status_kegiatan'] == 2) : ?>
																														<span class="badge badge-success" style="padding: 6px;">Selesai</span>
																													<?php else : ?>
																														<span class="badge badge-danger" style="padding: 6px;">Belum Mulai</span>
																													<?php endif; ?>
																												</td>
																											</tr>
																										<?php endif; ?>
																									<?php endforeach; ?>
																								<?php endforeach; ?>
																							</tbody>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>

																	</div>
																</div>
															</td>
														</tr>

														<!--  -->
													<?php endif; ?>
												<?php endforeach; ?>
											<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<!-- <div class="card-footer white py-3 d-flex justify-content-center">
								<nav>
									<ul id="pagination3" class="pagination">
									</ul>
								</nav>
							</div> -->
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="tab6" role="tabpanel" aria-expanded="true">

				<div class="row mt-5">
					<div class="col">
						<div class="card card-list">
							<div class="card-body">

								<div class="row">
									<div class="col">
										<h2>Workshop Saya</h2>
									</div>
									<div class="align-self-end">
										<!-- <form action="<?= base_url(); ?>Classes/search_kelas_saya" method="post"> -->
										<div class="input-group mb-3">

											<input id="inputSearch4" class="form-control form-control-sm mr-0 w-0" id="searchTable" type="text" name="keyword" placeholder="Cari..." aria-label="Search">

											<!-- <div class="input-group-append">
													<button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true" onclick=""></i></button>
												</div> -->
										</div>
										</form>
									</div>
								</div>
							</div>

							<div class="card-body table-responsive">
								<table id="pageTable6" class="table">
									<thead>
										<tr>

											<th scope="col">Workshop</th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center">Tanggal</th>
											<th scope="col" class="text-center">Status</th>
											<th scope="col" class="text-center">Tipe</th>
											<th scope="col" class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody id="pageSearch4">
										<?php $ctWorkshop = 0; ?>
										<?php foreach ($kelas2 as $val) : ?>
											<?php $ctWorkshop++; ?>
											<tr>
												<th scope="row" style="width: 300px;"><a class="text-primary"><?= $val['judul_workshop']; ?></a></th>


												<td style="padding-top: 20px; padding-top: 23px;">
													<span><small><small><a id="btnCopy" href="" onclick="return false" data-toggle="tooltip" data-original-title="Click to copy" data-clipboard-text="Hey, saya sudah membuat workshop baru silahkan cek disini: <?= base_url(); ?>Workshops/open_workshop/<?= $val['id_workshop'] ?>">Copy Link</a></small></small></span>
												</td>

												<td style="padding-top: 20px;">
													<?php
													foreach ($kegiatan2 as $val2) {
														if ($val['id_workshop'] == $val2['id_workshop']) {
															$dt = new DateTime($val2['tanggal_kegiatan']);
															echo "<center><h6>" . $dt->format('d M Y (H:i)') . "</h6></center>";
														}
													}
													?>

												</td>
												<td style="padding-top: 20px;" class="text-center">
													<?php foreach ($status2 as $val2) : ?>
														<?php if ($val['status_workshop'] == $val2['id_status']) : ?>
															<?php if ($val2['nama_status'] == "Selesai") : ?>
																<span class="badge badge-success"><?= $val2['nama_status'] ?></span>
															<?php else : ?>
																<span class="badge badge-warning"><?= $val2['nama_status'] ?></span>
															<?php endif; ?>
														<?php endif; ?>
													<?php endforeach; ?>
												</td>

												<td style="padding-top: 20px;" class="text-center">
													<?php if ($val['tipe_workshop'] == 1) : ?>
														<span class="badge badge-light">Public</span>
													<?php else : ?>
														<span class="badge badge-dark">Private</span>
													<?php endif; ?>
												</td>

												<td style="padding-top: 20px;">
													<div class="buttonclass">
														<div class="btn-group">
															<a class="btn btn-outline-dark" href="<?= base_url() ?>Workshops/open_workshop/<?= $val['id_workshop'] ?>" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Detail</a>
															<button type="button" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																<span class="sr-only">Toggle Dropdown</span>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item btn" href="<?= base_url() ?>Workshops/lihat_kegiatan/<?= $val['id_workshop'] ?>">Lihat
																	Kegiatan</a>
																<a class="dropdown-item btn" href="<?= base_url() ?>Workshops/update_workshop/<?= $val['id_workshop'] ?>">Edit
																	Workshop</a>
															</div>
														</div>
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<!-- <div class="card-footer white py-3 d-flex justify-content-center">
								<ul id="pagination6" class="pagination">
								</ul>
								</nav>
							</div> -->
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="tab7" role="tabpanel" aria-expanded="false">
				<div class="row mt-5">
					<div class="col">
						<?php if ($notif2 != null) : ?>
							<?php foreach ($notif2 as $val) : ?>
								<?php foreach ($val as $val2) : ?>
									<?php if ($val2['status_kegiatan'] == CLASS_STARTED) : ?>
										<div class="alert alert-primary" role="alert">
											<div class="row">
												<div class="col">
													<h4 class="alert-heading">Workshop <?= $val2['judul_workshop']; ?> Sedang Dimulai</a></h4>
												</div>
												<div class="text-right"><?= $val2['tanggal']; ?></div>
											</div>
											<p>oleh <?= $val2['nama']; ?></p>
											<hr>
											<a class="btn btn-outline-dark" href="<?= base_url('class/') ?><?= $val2['id_workshop'] ?>/<?= $val2['id_kegiatan']; ?>" style="padding-right: 20px; padding-left: 20px; padding-top: 12px; padding-bottom: 12px;">Ikut</a>
										</div>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						<div class="card card-list">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h2>Workshop Diikuti</h2>
									</div>
									<div class="align-self-end">
										<!-- <form action="<?= base_url(); ?>Classes/search_kelas_saya" method="post"> -->
										<div class="input-group mb-3">

											<input id="inputSearch6" class="form-control form-control-sm mr-0 w-0" id="searchTable" type="text" name="keyword" placeholder="Cari..." aria-label="Search">

											<!-- <div class="input-group-append">
													<button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true" onclick=""></i></button>
												</div> -->
										</div>
										</form>
									</div>
								</div>
							</div>

							<div class="card-body">
								<table id="pageTable8" class="table">
									<thead>
										<tr>
											<th scope="col">Workshop</th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center">Tanggal</th>
											<th scope="col" class="text-center">Status</th>
											<!-- <th scope="col">Materi</th> -->
											<th scope="col" class="text-center">Aksi</th>

										</tr>
									</thead>
									<tbody id="pageSearch6">
										<?php foreach ($seluruh_kelas2 as $val) : ?>
											<?php foreach ($peserta2 as $val2) : ?>
												<?php if ($val2['id_workshop'] == $val['id_workshop'] && $val2['id_user'] == $this->session->userdata('id_user')) : ?>
													<tr>
														<?php if ($val['tipe_workshop'] == 2) : ?>
															<th scope="row" style="width: 300px;"><a class="text-primary"><?= $val['judul_workshop']; ?> <i class="fa fa-lock"></a></th>
														<?php else : ?>
															<th scope="row" style="width: 300px;"><a class="text-primary"><?= $val['judul_workshop']; ?></a></th>
														<?php endif; ?>
														<td></td>
														<td style="padding-top: 20px;">
															<?php
															foreach ($kegiatan2 as $val2) {
																if ($val['id_workshop'] == $val2['id_workshop']) {
																	$dt = new DateTime($val2['tanggal_kegiatan']);
																	echo "<center><h6>" . $dt->format('d M Y (H:i)') . "</h6></center>";
																}
															}
															?>
														<td style="padding-top:20px; padding-left: 60px;">
															<?php foreach ($status2 as $val3) : ?>
																<?php if ($val['status_workshop'] == $val3['id_status']) : ?>
																	<?php if ($val3['nama_status'] == "Selesai") : ?>
																		<span class="badge badge-success" style="margin-left: 50px;"><?= $val3['nama_status'] ?></span>
																	<?php else : ?>
																		<span class="badge badge-warning"><?= $val3['nama_status'] ?></span>
																	<?php endif; ?>
																<?php endif; ?>
															<?php endforeach; ?>
														</td>
														<td>
															<div class="buttonclass text-center">
																<a href="<?= base_url() ?>Workshops/open_workshop/<?= $val['id_workshop'] ?>" class="btn btn-light">Lihat</a>
																<a data-toggle='modal' data-target='#konfirmasi_hapus2' data-href="<?= base_url() ?>workshops/leave_workshop/<?= $val['id_workshop'] ?>"><i class="btn btn-danger">Tinggalkan</i></a>
															</div>
														</td>
													</tr>

												<?php endif; ?>
											<?php endforeach; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
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
										<!-- <form action="<?= base_url(); ?>Classes/search_kelas_saya" method="post"> -->
										<div class="input-group mb-3">

											<input id="inputSearch7" class="form-control form-control-sm mr-0 w-0" id="searchTable" type="text" name="keyword" placeholder="Cari..." aria-label="Search">

											<!-- <div class="input-group-append">
													<button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true" onclick=""></i></button>
												</div> -->
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
									<tbody id="pageSearch7">
										<?php $i = 0; ?>
										<?php foreach ($kelas_tugas as $val[$i][0]) : ?>
											<?php $j = 0;
											$k = 0; ?>
											<?php foreach ($tugas as $val2[$i][$j]) : ?>
												<?php foreach ($val2[$i][$j] as $val3) : ?>
													<?php if ($val[$i][0][0]['id_kelas'] == $val3['id_kelas']) : ?>
														<tr>
															<th scope="row" style="width: 300px; "><a class="text-primary"><?= $val[$i][0][0]['judul_kelas']; ?></a></th>
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
																			} else {
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

							<!-- <div class=" card-footer white py-3 d-flex justify-content-center">
																					<ul id="pagination4" class="pagination">
																					</ul>
																					</nav>
																			</div> -->

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
											<!-- <form action="<?= base_url(); ?>Classes/search_kelas_saya" method="post"> -->
											<div class="input-group mb-3">

												<input id="inputSearch8" class="form-control form-control-sm mr-0 w-0" id="searchTable" type="text" name="keyword" placeholder="Cari..." aria-label="Search">

												<!-- <div class="input-group-append">
													<button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true" onclick=""></i></button>
												</div> -->
											</div>
											</form>
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
											<tbody id="pageSearch8">
												<?php $lihatMateriCount = 0; ?>
												<?php foreach ($materi as $val) : ?>
													<?php
													$countMateri = 0;
													?>
													<?php foreach ($val as $val2) : ?>
														<?php $id_kelas = 0; ?>
														<?php $countMateri++; ?>
													<?php endforeach; ?>
													<tr>
														<th scope="row" style="width: 300px; "><a href="<?= base_url(); ?>classes/open_class/<?= $val2['id_kelas']; ?>" class="text-primary"><?= $val2['judul_kelas']; ?></a></th>
														<td style="padding-top:20px; text-align: center;">
															<?= $countMateri; ?>
														</td>
														<td>
															<div class="buttonclass text-center">
																<button class="btn btn-info" type="button" data-toggle="modal" data-target="#lihatMateri<?= $lihatMateriCount; ?>" style="padding: 15px; font-size: 10px;">Lihat Materi</button>
															</div>
														</td>
													</tr>

													<div class="modal fade" id="lihatMateri<?= $lihatMateriCount; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 60px; padding-left: 17px;">

														<div class="modal-dialog modal-lg" role="document">
															<!--Content-->
															<div class="modal-content form-elegant">
																<!--Header-->
																<div class="modal-header text-center">
																	<h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel">
																		<strong>Materi <?= $val2['judul_kelas']; ?></strong></h3>
																	<?php $id_kelass = $val2['id_kelas']; ?>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<!--Body-->
																<div class="modal-body mx-4">
																	<!--Body-->
																	<div class="container-fluid">
																		<div class="row">
																			<div class="col-xl-6 border-bottom  mt-3" style="width: 110px;"><b>Kegiatan</b></div>
																			<div class="col-xl-6 border-bottom  mt-3" style="width: 110px;"><b>Nama File</b></div>
																		</div>
																		<div class="row">


																			<?php foreach ($seluruh_kelas as $val4) : ?>
																				<?php if ($val4['id_kelas'] == $id_kelass) : ?>
																					<?php foreach ($kegiatan as $val2) : ?>
																						<?php if ($val2['id_kelas'] == $val4['id_kelas']) : ?>
																							<?php $a = 0; ?>

																							<?php foreach ($materi2 as $val3) : ?>
																								<?php if (
																									$val2['id_kegiatan'] ==
																									$val3['id_kegiatan']
																								) : ?>

																									<div class="col-xl-6 border-bottom pb-3 mt-3" style="width: 120px;">
																										<?= $val2['deskripsi_kegiatan']; ?></div>
																									<?php if ($val3['kategori_materi'] == 1) : ?>
																										<div class="col-xl-6 border-bottom pb-3 mt-3" style="width: 120px;"><a href="<?= base_url(); ?>classes/download_materi/<?= $val3['url_materi']; ?>"><i class="fa fa-file"></i> <?= wordwrap($val3['url_materi'], 26, '<br>', true); ?></a>
																										</div>

																									<?php else : ?>
																										<?php $a++ ?>
																										<?php $strvid = "Video " . $a . " Kegiatan " . $val2['deskripsi_kegiatan'] . " <b>(" . $val4['judul_kelas'] . ")</b>"; ?>
																										<div class="col-xl-6 border-bottom pb-3 mt-3" style="width: 120px;"> <a href="<?= base_url(); ?>classes/video_class/<?= $val4['id_kelas'] ?>/<?= $val2['id_kegiatan'] ?>/<?= $val3['id_materi'] ?>/<?= $a ?>"><i class="fa fa-video-camera"></i> <?= wordwrap($strvid, 26, '<br>', true); ?> </a>
																										</div>
																									<?php endif; ?>
																								<?php endif; ?>
																							<?php endforeach; ?>
																						<?php endif ?>
																					<?php endforeach; ?>
																				<?php endif ?>
																			<?php endforeach; ?>
																		</div>

																	</div>


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
							<!-- <div class="card-footer white py-3 d-flex justify-content-center">
								<ul id="pagination5" class="pagination">
								</ul>
								</nav>
							</div> -->
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
	</div>
	</div>
	</div>




	<div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<center><b>Anda yakin ingin meninggalkan kelas ini ?</b><br><br>
						<a class="btn btn-danger btn-ok"><i class="fa fa-sign-out"></i> Tinggalkan</a>
						<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button></center>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="konfirmasi_hapus2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<center><b>Anda yakin ingin meninggalkan workshop ini ?</b><br><br>
						<a class="btn btn-danger btn-ok"><i class="fa fa-sign-out"></i> Tinggalkan</a>
						<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button></center>
				</div>
			</div>
		</div>
	</div>



	<!-- <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

											<td>
												<div class="btn-group">
													<a class="btn btn-outline-dark"
														href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas'] ?>"
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
															href="<?= base_url() ?>classes/lihat_kegiatan/<?= $val['id_kelas'] ?>">Lihat
															Kegiatan</a>
														<a class="dropdown-item btn"
															href="<?= base_url() ?>classes/list_tugas/<?= $val['id_kelas'] ?>">List
															Tugas</a>
														<a class="dropdown-item btn"
															href="<?= base_url() ?>classes/leave_class/<?= $val['id_kelas'] ?>">Tinggalkan</a>
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
										<?php $j = 0;
											$k = 0; ?>
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
																	} else {
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



<!-- <script>
	$(document).ready(function(){


		$('#button').click(function(){
			var toAdd = $('input[name=checkListItem]').val();
			$('.list').append($('<div class="item">' + toAdd + ' </div>'));
		});


		$(document).on('click', '.item', function(){
			$(this).remove();
		});
		});
</script> -->

<!-- <script>
$(document).on('click',function(){
$('.collapse').collapse('hide');
})
</script> -->

<!-- <script type="text/javascript">
$(document).ready(function () {
$('.collapse').collapse
});

</script> -->

<!-- <script>
$(document).on('click',function(e){
  if($('#collapseOne').hasClass('in')){
    $('.collapse').collapse('hide'); 
  }
})
</script> -->
<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/paging.js"></script> -->

<script type="text/javascript" src="<?= base_url(); ?>assets/js/clipboard.min.js"></script>

<script type="text/javascript" src="js/bootstrap/bootstrap-dropdown.js"></script>
<script>
	$(document).ready(function() {
		$('.dropdown-toggle').dropdown()
	});
</script>



<script>
	$('.accordion-toggle').click(function() {
		$('.hiddenRow').hide();
		$(this).next('tr').find('.hiddenRow').show();
	});
</script>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/addon.js"></script>
<!-- <script>
$(function () {

  $('[data-toggle="tooltip"]').tooltip();

  $('#btnCopy').tooltip({
  trigger: 'click',
  placement: 'bottom'
});

function setTooltip(btn, message) {
  btn.tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
}

function hideTooltip(btn) {
  setTimeout(function() {
    btn.tooltip('hide');
  }, 1000);
}
var clipboard = new ClipboardJS('#btnCopy');
clipboard.on('success', function(e) {
	console.log(e);
	var btn = $(e.trigger);
  	setTooltip(btn, 'Copied');
  	hideTooltip(btn);
});
});
</script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
	integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>






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
	$('.form_date').datetimepicker({
		language: 'id',
		weekStart: 1,
		todayBtn: 1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
	});
	$('.form_time').datetimepicker({
		language: 'id',
		weekStart: 1,
		todayBtn: 1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
	});

	// function showHideJadwal() {
	//     var x = document.getElementById("showHideJadwal");
	//     if (x.style.display === "none") {
	//         x.style.display = "block";
	//     }
	//     else {
	//         x.style.display = "none";
	//     }
	// }
</script>

<script type="text/javascript">
	//Hapus Data
	$(document).ready(function() {
		$('#konfirmasi_hapus').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	});
</script>

<script type="text/javascript">
	//Hapus Data
	$(document).ready(function() {
		$('#konfirmasi_hapus2').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$("#inputSearch").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#pageSearch tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
	$(document).ready(function() {
		$("#inputSearch2").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#pageSearch2 tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
	$(document).ready(function() {
		$("#inputSearch3").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#pageSearch3 tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
	$(document).ready(function() {
		$("#inputSearch4").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#pageSearch4 tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
	$(document).ready(function() {
		$("#inputSearch5").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#pageSearch5 tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
	$(document).ready(function() {
		$("#inputSearch6").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#pageSearch6 tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
	$(document).ready(function() {
		$("#inputSearch7").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#pageSearch7 tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
	$(document).ready(function() {
		$("#inputSearch8").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#pageSearch8 tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>