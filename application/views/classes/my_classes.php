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
				<a class="nav-link active" data-toggle="tab" href="#tab2" role="tab" aria-expanded="false"> Kelas Saya</a>

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
                                                <span class="badge badge-danger"><?= $val3['nama_status'] ?></span>
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
                                                <div class="widget-heading">Kelas Kalkulus Sedang Berlangsung <div class="badge badge-danger ml-2">Berakhir</div> 

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
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Kelas</th>
											<th scope="col" style="padding-left: 60px;"></th>
											<th scope="col" style="padding-left: 40px;">Progress</th>
											<th scope="col" style="padding-left: 60px;">Status</th>
											<th scope="col" style="padding-left: 130px;">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($kelas as $val) : ?>
										<tr>
											<th scope="row" style="width: 300px;"><a
													class="text-primary"><?= $val['judul_kelas']; ?></a></th>
											<td style="padding-top: 20px;">
												<span><i class="fa fa-share-alt" aria-hidden="true"></i></span>

											</td>

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

												<span class="badge badge-danger"><?= $val2['nama_status'] ?></span>
												<?php endif; ?>
												<?php endif; ?>
												<?php endforeach; ?>
											</td>
											<td style="padding-top: 20px;">
                        
                        
                        
                        
                        
												<div class="buttonclass">
													<a href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>"
														class="btn btn-light">Lihat kelas</a>
													<a class="btn btn-dark mr-1"
														href="<?= base_url()?>classes/update_class/<?= $val['id_kelas'] ?>">Edit Kelas</a>

											</td>
							</div>
							</tr>
							<?php endforeach; ?>
							</tbody>
							</table>
						</div>
						<div class="card-footer white py-3 d-flex justify-content-center">
							<ul id="pagination" class="pagination">
								<!-- <li class="page-item">
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
            </li> -->
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
										<th scope="row" style="width: 300px;"><a class="text-primary"><?= $val['judul_kelas']; ?></a></th>
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
												<div class="progress-bar bg-info" role="progressbar" style="width: <?= $proses; ?>%"
													aria-valuenow="<?= $proses; ?>" aria-valuemin="0" aria-valuemax="100"><?= $proses; ?>%</div>
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
												<a href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>" class="btn btn-light">Lihat
													kelas</a>
												<a class="btn btn-dark mr-1"
													href="<?= base_url()?>classes/update_class/<?= $val['id_kelas'] ?>">Edit Kelas</a>
												<input type="text" value="<?= base_url(); ?>classes/open_class/<?= $val['id_kelas']; ?>"
													id="copy_text" style="display: none;">
												<button class="btn btn-info mr-1" onclick="copylink()">Copy Link</button>
										</td>
						</div>
						</tr>
						<?php endforeach; ?>
						</tbody>
						</table>
					</div>
					<div class="card-footer white py-3 d-flex justify-content-center">
						<ul id="pagination2" class="pagination">
						</ul>
						</nav>

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
											</td>
										</tr>
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
				</div>

			</div>

			<div class="tab-pane" id="tab3" role="tabpanel" aria-expanded="false">
				<div class="row mt-5">
					<div class="col">
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
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Kelas</th>
											<th scope="col" style="padding-left: 100px;"></th>
											<th scope="col" style="padding-left: 60px;">Progress</th>
											<th scope="col" style="padding-left: 100px;">Status</th>
											<!-- <th scope="col">Materi</th> -->
											<th scope="col" style="padding-left: 130px;">Aksi</th>

										</tr>
									</thead>
									<tbody>
										<?php foreach ($seluruh_kelas as $val) : ?>
										<?php foreach ($peserta as $val2) : ?>
										<?php if ($val2['id_kelas'] == $val['id_kelas'] && $val2['id_user'] == $this->session->userdata('id_user')) : ?>
										<tr>
											<th scope="row" style="width: 300px;"><a
													class="text-primary"><?= $val['judul_kelas']; ?></a></th>
											<td style="padding-top: 20px;">
												<span><i class="fa fa-share-alt" aria-hidden="true"></i></span>
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
												<span class="badge badge-danger"><?= $val3['nama_status'] ?></span>
												<?php endif; ?>
												<?php endif; ?>
												<?php endforeach; ?>
											</td>
											<!-- <td>

                                  <?php foreach ($materi as $val3) : ?>
                                    <?php if ($val2['id_kelas'] == $val3[0]['id_kelas']) : ?>
                                      <div class="buttonclass">
                                        <a href="<?= base_url()?>classes/open_class/<?= $val3[0]['id_kelas'] ?>" class="btn btn-white" style="color: darkcyan;">Lihat Materi</a>
                                      </div>
                                    <?php endif; ?>
                                  <?php endforeach; ?>
                                </td> -->

                      
                      
                      
                      
                      
                      
                      
									<td>
										<div class="buttonclass">
											<a href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>" class="btn btn-light">Lihat
												Kelas</a>
											<a href="<?= base_url()?>classes/leave_class/<?= $val['id_kelas'] ?>"
												class="btn btn-danger">Tinggalkan</a>
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
								<!-- <li class="page-item">
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
            </li> -->
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
						<h2>Tugas</h2>
					</div>

					<div class="card-body table-responsive">
						<table id="pageTable4" class="table">
							<thead>
								<tr>
									<th scope="col">Kelas</th>
									<th scope="col">Nama Tugas</th>
									<th scope="col">Kategori</th>
									<th scope="col" style="text-align: center;">Deadline</th>
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
								<?php if ($cek[$k]) : ?>
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
										<span class="badge badge-danger"><?= $val3['kategori']; ?></span>
										<?php endif; ?>
									</td>
									<td style="padding-top:20px; text-align: center;">
										<span class="badge"><?= $val3['deadline']; ?></span>
									</td>
									<td>
										<div class="buttonclass">
											<a href="<?= base_url() ?>classes/detail_tugaskuis/<?= $val[$i][0][0]['id_kelas'] ?>/<?= $val3['id_tugas']; ?>"
												class="btn btncyan">Lihat Tugas</a>
										</div>
									</td>
								</tr>
								<?php endif; ?>
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
							<!-- <li class="page-item">
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
            </li> -->
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
						<h2>Materi</h2>
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

								<div class="modal fade" id="lihatMateri<?= $lihatMateriCount; ?>" tabindex="-1" role="dialog"
									aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 60px; padding-left: 17px;">

									<div class="modal-dialog modal-lg" role="document">
										<!--Content-->
										<div class="modal-content form-elegant">
											<!--Header-->
											<div class="modal-header text-center">
												<h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel">
													<strong>Materi <?= $val2['judul_kelas']; ?></strong></h3>
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
														<?php foreach ($val as $val2) : ?>
														<div class="col-xl-6 border-bottom pb-3 mt-3" style="width: 120px;">
															<?= $val2['deskripsi_kegiatan']; ?></div>
														<div class="col-xl-6 border-bottom pb-3 mt-3" style="width: 120px;"> <img
																src="<?php echo base_url(); ?>assets/images/pdf.png" alt="..."
																class="img-fluid rounded-circle" style="width: 10px;"><a
																href="<?= base_url(); ?>classes/download_materi/"><?= $val2['url_materi']; ?></a></div>
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
								<table class="table">
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
												<span class="badge badge-danger"><?= $val3['kategori']; ?></span>
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
														class="btn btncyan">Lihat Tugas</a>
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
														<ul class="pagination">
															<li class="page-item">
																<a class="page-link" href="#" aria-label="Previous">
																	<span aria-hidden="true">&laquo;</span>
																	<span class="sr-only">Previous</span>
																</a>
															</li>
															<li class="page-item"><a class="page-link" href="#">1</a>
															</li>
															<li class="page-item"><a class="page-link" href="#">2</a>
															</li>
															<li class="page-item"><a class="page-link" href="#">3</a>
															</li>
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
									<table class="table">
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

											<div class="modal fade" id="lihatMateri<?= $lihatMateriCount; ?>"
												tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
												aria-hidden="true" style="padding-right: 90px;">

												<div class="modal-dialog modal-lg" role="document">
													<!--Content-->
													<div class="modal-content form-elegant">
														<!--Header-->
														<div class="modal-header text-center">
															<h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3"
																id="myModalLabel"><strong>Materi
																	<?= $val2['judul_kelas']; ?></strong></h3>
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
																	<div class="col-md-6 border-bottom pb-3 mt-3">
																		<b>Kegiatan</b></div>
																	<div class="col-md-6 border-bottom pb-3 mt-3">
																		<b>Nama File</b></div>
																	<?php foreach ($val as $val2) : ?>
																	<div class="col-md-6 border-bottom pb-3 mt-3">
																		<?= $val2['deskripsi_kegiatan']; ?></div>
																	<div class="col-md-6 border-bottom pb-3 mt-3"><a
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
					</div>
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
