<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<!-- <link href="<?= base_url() ?>assets/datetimepicker/bootstrap.min.css" rel="stylesheet" media="screen"> -->
<link href="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
$_SESSION['url_login'] = "open_workshop";
$_SESSION['url_login_open_class'] = $this->uri->segment(3);
$this->session->set_userdata('workshop', true);
?>

<?php if ($this->session->flashdata('message')) : ?>
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
          <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>

<section>

  <div class="intro-section single-cover" id="home-section">

    <div class="slide-1 gambar1" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="row justify-content-center align-items-center text-center">
              <div class="col-lg-6">
                <?php foreach ($kelas as $val) : ?>
                  <h1 data-aos="fade-up" data-aos-delay="0"><?= $val['judul_workshop']; ?></h1>
                  <p data-aos="fade-up" data-aos-delay="100"> &bullet; <?= count($peserta_kelas); ?> Siswa <span class="text-white"># <?= $val['kategori_workshop']; ?></span></p>
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
          <div class="col-lg-8 mb-3">
            <div class="mb-3">

              <?php if ($this->session->flashdata("invalidFile")) { ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $this->session->flashdata("invalidFile"); ?>
                </div>
              <?php } ?>
              <?php if ($this->session->flashdata("success_update")) { ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata("success_update"); ?>
                </div>
              <?php } ?>
              <?php if ($this->session->flashdata("errorAPI")) { ?>
                <div class="alert alert-info" role="alert">
                  <?php echo $this->session->flashdata("errorAPI"); ?>
                </div>
              <?php } ?>
              <?php if ($this->session->flashdata("success")) { ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata("success"); ?>
                </div>
              <?php } ?>
              <?php foreach ($kegiatan as $val2) : ?>
                <?php if ($val['id_workshop'] == $val2['id_workshop']) { ?>
                  <?php if ($val2['status_kegiatan'] == "selesai") { ?>
                    <div class="alert alert-danger" role="alert">
                      Workshop sudah tidak tersedia lagi.
                    </div>
                  <?php } ?>
                <?php } else { ?>
                <?php } ?>
              <?php endforeach ?>


              <ul class="nav nav-tabs" role="tablist" style="font-weight: bolder;">
                <li class="nav-item">
                  <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fa fa-user-circle"></i> Detail Workshop</a>
                </li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade show active" id="profile" style="margin-top: 20px;">

                  <p class="mb-4">
                    <?php if ($harga['harga_workshop'] == '0' || $harga['harga_workshop'] == null) : ?>
                      <p>Gratis</p>
                    <?php else : ?>
                      <?php $hasil_rupiah = "Rp." . number_format($harga['harga_workshop'], 2, ',', '.'); ?>
                      <p><strong class="text-black mr-3">Harga: </strong><?= $hasil_rupiah; ?></p>
                    <?php endif; ?>
                  </p>
                  <div class="row mb-4">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8">
                      <img src="<?= base_url() . 'assets/images/' . $val['poster_workshop'] ?>" alt="Image" class="img-fluid rounded" style="width: 500px">
                    </div>
                    <div class="col-md-2">

                    </div>
                  </div>
                  <p><?= $val['deskripsi_workshop']; ?></p>
                  <br>
                  <?php foreach ($status as $val2) : ?>
                    <?php foreach ($kegiatan as $val3) : ?>
                      <?php if ($val['id_workshop'] == $val3['id_workshop']) : ?>
                        <?php if ($val2['nama_status'] == $val3['status_kegiatan']) : ?>
                          <p>Status: <?= $val2['nama_status']; ?></p>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  <?php endforeach; ?>
                  <?php if (isset($this->session->userdata['logged_in'])) : ?>
                    <?php if ($val['pembuat_workshop'] != $this->session->userdata('id_user')) : ?>
                      <?php if ($val['batas_jumlah'] > count($peserta_kelas) || $val['batas_jumlah'] == 0) : ?>
                        <?php if ($cek == true) : ?>
                          <?php foreach ($kegiatan as $val2) : ?>
                            <?php if ($val2['id_workshop'] == $val2['id_kegiatan']) : ?>
                              <?php if ($val2['status_kegiatan'] != "Selesai") : ?>
                                <?php if ($val['tipe_workshop'] == "Gratis") : ?>
                                  <p class="mt-4"><a href="<?= base_url() ?>workshops/join_workshop/<?= $val['id_workshop']; ?>" class="btn btn-dark mr-1">Gabung Workshop</a></p>
                                <?php else : ?>
                                  <p class="mt-4"><a href="<?= base_url() ?>workshops/pembayaran_workshop/<?= $val['id_workshop']; ?>" class="btn btn-dark mr-1">Gabung Workshop</a></p>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          <?php endforeach ?>
                        <?php elseif ($peserta != null) : ?>
                          <?php if ($val['status_workshop'] != 2) : ?>
                            <div class="alert alert-dark" role="alert">
                              <center><?= $this->session->flashdata('buttonJoin') ?></center>
                            </div>
                          <?php endif; ?>
                        <?php elseif ($cek == false) : ?>
                          <?php if ($val['status_workshop'] != 2) : ?>
                            <?php if ($val['jenis_workshop'] == 1) : ?>
                              <p class="mt-4"><a href="<?= base_url() ?>workshops/join_workshop/<?= $val['id_workshop']; ?>" class="btn btn-dark mr-1">Gabung Workshop</a></p>
                            <?php else : ?>
                              <p class="mt-4"><a href="<?= base_url() ?>workshops/pembayaran_workshop/<?= $val['id_kelas']; ?>" class="btn btn-dark mr-1">Gabung Workshop</a></p>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php endif; ?>
                      <?php else : ?>
                        <div class="alert alert-danger" role="alert">
                          <center><?= $this->session->flashdata('batasPeserta') ?></center>
                        </div>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php else : ?>
                    <p class="mt-4"><a href="" class="btn btn-dark mr-1" data-toggle="modal" data-target="#elegantModalForm"><i class="fa fa-clone left"></i>Gabung Workshop</a></p>
                  <?php endif; ?>
                  <!-- <button onclick="showHideJadwal()" class="btn btn-light">Lihat Jadwal Kegiatan Kelas</button> -->
                  <?php if ($val['pembuat_workshop'] == $this->session->userdata('id_user')) : ?>
                    <a class="btn btn-dark mr-1" href="<?= base_url() ?>workshops/update_workshop/<?= $val['id_workshop'] ?>"><span class="icon-pencil"></span> Edit Workshop</a>
                    <!-- <a class="btn btn-light mr-1" href="<?= base_url() ?>classes/list_assignment/<?= $val['id_kelas'] ?>"><span class="icon-list"></span> Lihat Tugas</a> -->
                  <?php endif; ?>
                </div>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade show active" id="#buzz" style="margin-top: 20px;">

                  </div>
                </div>
              </div>

              <!--  -->
            </div>
          </div>
          <div class="col-lg-4 pl-lg-5">
            <div class="mb-5 text-center border rounded course-instructor">
              <h3 class="mb-5 text-black text-uppercase h6 border-bottom pb-3">Pembicara</h3>
              <div class="mb-4 text-center">
                <?php foreach ($pembuat as $val2) : ?>
                  <?php if ($val2['id_user'] == $val['pembuat_workshop']) : ?>
                    <?php if ($val2['foto'] == null) : ?>
                      <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" class="rounded-circle mb-4" style="width: 100px">
                    <?php else : ?>
                      <img src="<?php echo base_url(); ?>assets/images/<?= $val2['foto']; ?>" alt="Image" class="w-50 rounded-circle mb-4" style="object-fit: cover;">
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

      <section>
        <a href="#jadwalKegiatan" class="jadwalKegiatan"></a>
        <div id="jadwalKegiatan">
        </div>
        <div class="row">
          <div class="col">
            <div class="card card-list">
              <div class="card-body">
                <h2>Jadwal Workshop</h2>
              </div>

              <div class="card-body table-responsive">
                <table class="table">
                  <thead>
                    <?php $countkegiatan = 0;
                    foreach ($kegiatan as $val2) {
                      if ($val2['id_workshop'] == $val['id_workshop']) {
                        $countkegiatan++;
                      }
                    }
                    if ($countkegiatan != 0) : ?>
                      <tr>
                        <th scope="col">Deskripsi</th>
                        <th scope="col" class="text-center">Hari/Tanggal</th>
                        <th scope="col" class="text-center">Waktu</th>
                        <th scope="col" style="text-align: center;">Status</th>
                        <?php foreach ($kegiatan as $val2) :
                          if ($val2['status_kegiatan'] != "Selesai") : ?>
                            <?php if ($val['pembuat_workshop'] != $this->session->userdata('id_user')) : ?>
                              <?php if ($cek == true) : ?>
                              <?php elseif ($peserta != null) : ?>
                                <?php if ($val2['status_kegiatan'] == "Sedang Berlangsung") : ?>
                                  <th scope="col" style="text-align: center;">Aksi</th>
                                <?php endif ?>
                              <?php elseif ($cek == false) : ?>
                              <?php endif; ?>
                            <?php else : ?>
                              <th scope="col" style="text-align: center ;">Aksi</th>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php endforeach ?>


                      <?php endif; ?>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $modalMateri = 0; ?>
                    <?php foreach ($kegiatan as $val2) : ?>
                      <?php if ($val2['id_workshop'] == $val['id_workshop']) : ?>
                        <tr>
                          <td style="padding-top: 30px;"><?= $val2['deskripsi_kegiatan']; ?></td>
                          <?php
                          $temp = explode("T", $val2['tanggal_kegiatan']);
                          $temp2 = strtotime($temp[0]);
                          $date = date("l, d F Y", $temp2);
                          $time = explode("Z", $temp[1]);
                          $time = strtotime($time[0]);
                          $time = date("G:i", $time);
                          ?>
                          <td class="text-center" style="padding-top: 30px;"><?= $date; ?></td>
                          <td class="text-center" style="padding-top: 30px;"><?= $time; ?></td>
                          <?php if ($val2['status_kegiatan'] == "Selesai") : ?>
                            <td style="text-align: center ;padding-top: 30px;"><span class="badge badge-success"><?= $val2['status_kegiatan']; ?></span></td>
                          <?php elseif ($val2['status_kegiatan'] == "Belum Mulai") : ?>
                            <td style="text-align: center ;padding-top: 30px;"><span class="badge badge-danger"><?= $val2['status_kegiatan']; ?></span></td>
                          <?php else : ?>
                            <td style="text-align: center ; padding-top: 30px;"><span class="badge badge-warning"><?= $val2['status_kegiatan']; ?></span></td>
                          <?php endif; ?>
                          <td class="text-center">
                            <?php if ($val['pembuat_workshop'] != $this->session->userdata('id_user')) : ?>
                              <?php if ($cek == true) : ?>
                              <?php elseif ($peserta != null && $val2['status_kegiatan'] == CLASS_STARTED) : ?>
                                <a href="<?= base_url('class/') ?><?= $val['id_workshop'] ?>/<?= $val2['id_kegiatan']; ?>" class="btn btn-dark mr-1">Ikut</a>
                              <?php elseif ($cek == false) : ?>
                              <?php endif; ?>
                            <?php elseif ($val2['status_kegiatan'] != CLASS_FINISHED) : ?>
                              <button type="button" class="btn btn-light btn-block" data-toggle="modal" data-target="#editKegiatan<?= $val2['id_kegiatan']; ?>">Edit</button><br>
                              <a href="<?= base_url('class/') ?><?= $val['id_workshop'] ?>/<?= $val2['id_kegiatan'] ?>" class="btn btn-dark mr-1 btn-block">Mulai</a>
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
                                    <div class="modal-body mx-4">
                                      <!--Body-->
                                      <!--Body-->
                                      <form enctype="multipart/form-data" action="<?= base_url() ?>workshops/edit_kegiatan/<?= $val['id_workshop'] ?>/<?= $val2['id_kegiatan'] ?>" method="POST">
                                        <div class="form-group">
                                          <label>Deskripsi Kegiatan</label>
                                          <input type="hidden" name="tanggal" value=<?= $val2['tanggal_kegiatan'] ?>>
                                          <textarea class="form-control" name="deskripsi" required><?= $val2['deskripsi_kegiatan'] ?></textarea>
                                        </div>

                                        <input type="hidden" name="tanggal" value="<?= $val2['tanggal_kegiatan'] ?>">

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
                      <?php else : ?>
                        <div class="alert alert-danger" role="alert">
                          Tidak ada kegiatan dalam kelas ini.
                        </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </div>


  <div class="site-section courses-title bg-dark" id="courses-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="section-title">Workshop Lain</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section courses-entry-wrap" data-aos="fade" data-aos-delay="100">
    <div class="container">
      <div class="row">

        <div class="owl-carousel col-12 nonloop-block-14">

          <?php foreach ($seluruh_kelas as $val) : ?>
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="<?= base_url() ?>workshops/open_workshop/<?= $val['id_workshop'] ?>"><img src="<?= base_url() . 'assets/images/' . $val['poster_workshop'] ?>" alt="Image" class="img-fluid" style="height: 180px; object-fit: cover;"></a>
              </figure>
              <div class="course-inner-text py-4 px-4" style="height: 200px;">
                <span class="course-price"><?php
                                            if ($val['harga_workshop'] == '0' || $val['harga_workshop'] == null) {
                                              echo "<b>Gratis</b>";
                                            } else {
                                              $hasil_rupiah = "Rp." . number_format($val['harga_workshop'], 2, ',', '.');
                                              echo $hasil_rupiah;
                                            }
                                            ?></span>
                <div class="meta">
                  <div class="meta"># <?= $val['nama_kategori']; ?></div>
                </div>
                <h3><a href="<?= base_url() ?>workshops/open_workshop/<?= $val['id_workshop'] ?>"><?= $val['judul_workshop'] ?></a></h3>
                <?php $temp = strip_tags($val['deskripsi_workshop']); ?>
                <p><?php echo substr($temp, 0, 100);  ?></p>
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
          <span class="customPrevBtn carousel-control-prev-icon" style="margin-left: 140px;"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
          <span class="customNextBtn carousel-control-next-icon" style="margin-right: 140px;"></span>
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
  var rupiah = document.getElementById('rupiah');
  rupiah.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, 'Rp. ');
  });

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>
<?php if ($this->session->flashdata('openModal')) { ?>
  <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    $(function() {
      window.location.href = $('.jadwalKegiatan').attr('href');
    });

    $(window).on('load', function() {
      $('#tambahKegiatan').modal('show');
      console.log('ready');
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('jadwalKegiatan')) { ?>
  <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    $(function() {
      window.location.href = $('.jadwalKegiatan').attr('href');
    });
  </script>
<?php } ?>