
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<!-- <link href="<?= base_url() ?>assets/datetimepicker/bootstrap.min.css" rel="stylesheet" media="screen"> -->
<link href="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<?php if ($this->session->flashdata('message')): ?>
		<div class="modal fade" id="modalNotif" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Information</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?=$this->session->flashdata('message');?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<?php endif?>

<section>
<div class="intro-section single-cover" id="home-section">
      
      <div class="slide-1 gambar1" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                 <?php foreach ($kelas as $val) : ?>
                  <h1 data-aos="fade-up" data-aos-delay="0"><?= $val['judul_kelas']; ?></h1>
                  <?php foreach ($kategori as $val2) : ?>
                    <?php if ($val['kategori_kelas'] == $val2['id_kategori']) : ?>
                      <p data-aos="fade-up" data-aos-delay="100"> &bullet; <?= count ($peserta_kelas); ?> Siswa <span class="text-white"># <?= $val2['nama_kategori']; ?></span></p>
                    <?php endif; ?>
                  <?php endforeach; ?>
                 <?php endforeach; ?>
                </div>

                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section">
      <div class="container">
        <div class="row">
        <?php foreach ($kelas as $val) : ?>
          <div class="col-lg-8 mb-5">
            <div class="mb-5">
              <h3 class="text-black">Detail Kelas</h3>
              <p class="mb-4">
                <?php foreach ($harga as $val2) : ?>
                <?php if ($val2['harga_kelas'] == '0' || $val2['harga_kelas'] == null) : ?> 
                    <p>Gratis</p>
                <?php else : ?>
                    <?php $hasil_rupiah = "Rp." . number_format($val2['harga_kelas'],2,',','.'); ?>
                    <p><strong class="text-black mr-3">Harga: </strong><?= $hasil_rupiah; ?></p>
                <?php endif; ?>
            <?php endforeach; ?>
              </p>
              <div class="row mb-4">
                <div class="col">
                  <img src="<?= base_url().'assets/images/'.$val['poster_kelas']?>" alt="Image" class="img-fluid rounded" style="width: 500px">
                </div>
              </div>
              <p><?= $val['deskripsi_kelas']; ?></p>
            <br>
            <?php foreach ($status as $val2) : ?>
                <?php if ($val2['id_status'] == $val['status_kelas']) : ?> 
                    <p>Status: <?= $val2['nama_status']; ?></p>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if(isset($this->session->userdata['logged_in'])) : ?>
              <?php if ($val['pembuat_kelas'] != $this->session->userdata('id_user')) : ?>
                <?php if ($cek == true) : ?>
                    <?php if ($val['jenis_kelas'] == 1) : ?>
                        <p class="mt-4"><a href="<?= base_url()?>classes/join_class/<?= $val['id_kelas']; ?>" class="btn btn-dark mr-1">Gabung Kelas</a></p>
                    <?php else : ?>
                        <p class="mt-4"><a href="<?= base_url()?>classes/pembayaran_kelas/<?= $val['id_kelas']; ?>" class="btn btn-dark mr-1">Gabung Kelas</a></p>
                    <?php endif; ?>
                <?php elseif ($peserta != null) : ?>
                    <div class="alert alert-primary" role="alert">
                        <center><?= $this->session->flashdata('buttonJoin') ?></center>
                    </div>
                    <a class="btn btn-dark mr-1" href="<?= base_url()?>classes/list_assignment/<?= $val['id_kelas'] ?>"><span class="icon-list"></span> Lihat Tugas</a>
                <?php elseif ($cek == false) : ?>
                    <?php if ($val['jenis_kelas'] == 1) : ?>
                        <p class="mt-4"><a href="<?= base_url()?>classes/join_class/<?= $val['id_kelas']; ?>" class="btn btn-dark mr-1">Gabung Kelas</a></p>
                    <?php else : ?>
                        <p class="mt-4"><a href="<?= base_url()?>classes/pembayaran_kelas/<?= $val['id_kelas']; ?>" class="btn btn-dark mr-1">Gabung Kelas</a></p>
                    <?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>
            <?php else : ?>
              <p class="mt-4"><a href="" class="btn btn-dark mr-1" data-toggle="modal" data-target="#elegantModalForm"><i class="fa fa-clone left"></i>Gabung Kelas</a></p>
            <?php endif; ?>
            <!-- <button onclick="showHideJadwal()" class="btn btn-light">Lihat Jadwal Kegiatan Kelas</button> -->
            <?php if ($val['pembuat_kelas'] == $this->session->userdata('id_user')) : ?>
              <a class="btn btn-dark mr-1" href="<?= base_url()?>classes/update_class/<?= $val['id_kelas'] ?>"><span class="icon-pencil"></span> Edit Kelas</a>
              <a class="btn btn-light mr-1" href="<?= base_url()?>classes/list_assignment/<?= $val['id_kelas'] ?>"><span class="icon-list"></span> Lihat Tugas</a>
            <?php endif; ?>
            <br><br>
            <section>
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
                            <th scope="col">Status</th>
                            <?php if ($val['pembuat_kelas'] != $this->session->userdata('id_user')) : ?>
                              <?php if ($cek == true) : ?>
                              <?php elseif ($peserta != null) : ?>
                                <th scope="col">Aksi</th>
                              <?php elseif ($cek == false) : ?>
                              <?php endif; ?>
                            <?php else : ?>
                              <th scope="col">Aksi</th>
                            <?php endif; ?>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($kegiatan as $val2) : ?>
                          <tr>
                              <td><?= $val2['deskripsi_kegiatan']; ?></td>
                              <td><?= $val2['tanggal']; ?></td>
                              <td><?= $val2['waktu']; ?></td>
                              <?php foreach ($status as $val3) : ?>
                                  <?php if ($val3['id_status'] == $val2['status_kegiatan']) : ?> 
                                    <?php if ($val3['nama_status'] == "Selesai") : ?>
                                      <td><span class="badge badge-primary"><?= $val3['nama_status']; ?></span></td>
                                    <?php elseif ($val3['nama_status'] == "Belum Mulai") : ?>
                                      <td><span class="badge badge-danger"><?= $val3['nama_status']; ?></span></td>
                                    <?php else : ?>
                                      <td><span class="badge badge-warning"><?= $val3['nama_status']; ?></span></td>
                                    <?php endif; ?>
                                  <?php endif; ?>
                              <?php endforeach; ?>
                              <td>
                                  <?php if ($val['pembuat_kelas'] != $this->session->userdata('id_user')) : ?>
                                    <?php if ($cek == true) : ?>
                                    <?php elseif ($peserta != null && $val2['status_kegiatan'] == CLASS_STARTED) : ?>
                                      <a href="<?= base_url('class/') ?><?= $val['id_kelas'] ?>/<?= $val2['id_kegiatan']; ?>" class="btn btn-dark mr-1">Ikut</a>
                                    <?php elseif ($cek == false) : ?>
                                    <?php endif; ?>
                                  <?php elseif ($val2['status_kegiatan'] != CLASS_FINISHED) : ?>
                                      <button type="button" class="btn btn-light" data-toggle="modal" data-target="#editKegiatan<?= $val2['id_kegiatan']; ?>">Edit</button><br>
                                      <a href="<?= base_url('class/') ?><?= $val['id_kelas'] ?>/<?= $val2['id_kegiatan']; ?>" class="btn btn-dark mr-1">Mulai</a>
                                      <div class="modal fade" id="editKegiatan<?= $val2['id_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 90px;">
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
                                              <form action="<?= base_url()?>classes/edit_kegiatan/<?= $val['id_kelas'] ?>/<?= $val2['id_kegiatan'] ?>" method="POST">
                                                <div class="form-group">
                                                  <label>Deskripsi Kegiatan</label>
                                                    <textarea class="form-control" name="deskripsi" required><?= $val2['deskripsi_kegiatan'] ?></textarea>
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
                              </td>
                          </tr>
                      <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <?php if ($val['pembuat_kelas'] == $this->session->userdata('id_user')) : ?>
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
                        <form enctype="multipart/form-data" action="<?= base_url()?>classes/set_kegiatan/<?= $val['id_kelas'] ?>" method="POST">
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
            </section>

            </div>
          </div>
          <div class="col-lg-4 pl-lg-5">
            <div class="mb-5 text-center border rounded course-instructor">
              <h3 class="mb-5 text-black text-uppercase h6 border-bottom pb-3">Mentor Kelas</h3>
              <div class="mb-4 text-center"> 
                <?php foreach ($pembuat as $val2) : ?>
                    <?php if ($val2['id_user'] == $val['pembuat_kelas']) : ?> 
                      <?php if ($val2['foto'] == null) : ?>
                        <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" class="rounded-circle mb-4" style="width: 100px">
                      <?php else : ?>
                        <img src="<?php echo base_url(); ?>assets/images/<?= $val2['foto']; ?>" alt="Image" class="w-25 rounded-circle mb-4" style="object-fit: cover;">
                      <?php endif; ?>
                        <h3 class="h5 text-black mb-4"><?= $val2['nama']; ?></h3>
                        <p><?= $val2['deskripsi']; ?></p>
                    <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
    </div>

      <div class="site-section courses-title bg-dark" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">More Courses</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14">

          <?php foreach ($seluruh_kelas as $val) : ?>
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="<?=base_url()?>classes/open_class/<?= $val['id_kelas'] ?>"><img src="<?= base_url().'assets/images/'.$val['poster_kelas']?>" alt="Image" class="img-fluid" style="height: 180px; object-fit: cover;"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price"><?php
                  if($val['harga_kelas'] == '0' || $val['harga_kelas'] == null){
                    echo "<b>Gratis</b>";
                  } else {
                    $hasil_rupiah = "Rp." . number_format($val['harga_kelas'],2,',','.');
                    echo $hasil_rupiah;
                  }
                ?></span>
                <div class="meta">
                      <div class="meta"># <?= $val['nama_kategori']; ?></div>
                </div>
                <h3><a href="<?=base_url()?>classes/open_class/<?= $val['id_kelas'] ?>"><?= $val['judul_kelas'] ?></a></h3>
                <p><?php echo substr($val['deskripsi_kelas'],0,100);  ?></p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> <?= $val['peserta'] ?> peserta</div>
              </div>
            </div>
          <?php endforeach; ?>


          </div>

         

        </div>
        <div class="row justify-content-center">
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
              <span class="customPrevBtn carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" data-slide="next">
              <span class="customNextBtn carousel-control-next-icon"></span>
          </a>
          </div>
        </div>
      </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/script.js') ?>"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 0
    });
	$('.form_date').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
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
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
