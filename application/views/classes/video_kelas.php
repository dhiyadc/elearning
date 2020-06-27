<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<!-- <link href="<?= base_url() ?>assets/datetimepicker/bootstrap.min.css" rel="stylesheet" media="screen"> -->
<link href="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<?php
$_SESSION['url_login'] = "open_class";
$_SESSION['url_login_open_class'] = $this->uri->segment(3);
$this->session->set_userdata('workshop', null);
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
                                    <?php foreach ($materiKegiatan as $val2) : ?>
                                        <?php foreach ($kegiatan as $val3) : ?>
                                            <h1 data-aos="fade-up" data-aos-delay="0">Video <?= $indexvideo ?> Kegiatan <?= $val3['deskripsi_kegiatan'] ?> <b>(<?= $val['judul_kelas'] ?>)</b> </h1>
                                        <?php endforeach; ?>
                                    <?php endforeach ?>
                                    <?php foreach ($kategori as $val2) : ?>
                                        <?php if ($val['kategori_kelas'] == $val2['id_kategori']) : ?>
                                            <p data-aos="fade-up" data-aos-delay="100"> &bullet; <?= count($peserta_kelas); ?> Siswa <span class="text-white"># <?= $val2['nama_kategori']; ?></span></p>
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
                    <div class="col-lg-8 mb-3">
                        <div class="mb-3">

                            <?php if ($this->session->flashdata("invalidFile")) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $this->session->flashdata("invalidFile"); ?>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata("success")) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata("success"); ?>
                                </div>
                            <?php } ?>


                            <ul class="nav nav-tabs" role="tablist" style="font-weight: bolder;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fa fa-user-circle"></i>Materi Video</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="profile" style="margin-top: 20px;">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <?php foreach ($materiKegiatan as $val2) : ?>
                                                <center><iframe src="<?= $val2['url_materi'] ?>" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 630px; height:420px; border-radius: 12px; "></iframe></center>
                                            <?php endforeach ?>
                                        </div>
                                    </div>

                                    <?php if (!isset($this->session->userdata['logged_in'])) : ?>
                                        <p class="mt-4"><a href="" class="btn btn-dark mr-1" data-toggle="modal" data-target="#elegantModalForm"><i class="fa fa-clone left"></i>Gabung Kelas</a></p>
                                    <?php endif; ?>
                                    <!-- <button onclick="showHideJadwal()" class="btn btn-light">Lihat Jadwal Kegiatan Kelas</button> -->
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
                    <div class="text-right mb-2">
                        <a href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas']; ?>" class="btn btn-danger">Kembali ke kelas</a>
                        </div>
                        <div class="mb-3 text-center border rounded course-instructor">
                            <h3 class="mb-1 text-black text-uppercase h6 border-bottom pb-3">Materi Lain</h3>
                            <div class="mb-2 text-center">

                                <?php
                                if(count($materiLain) > 0) :
                                foreach ($kegiatan as $val2) : ?>
                                    <?php $a = 0; ?>
                                    <?php foreach ($materiLain as $val3) : ?>
                                        <?php if ($val3['kategori_materi'] == 1) : ?>
                                            <small><a href="<?= base_url(); ?>classes/download_materi/<?= $val3['url_materi'] ?>"><i class="fa fa-file"></i> <?= wordwrap($val3['url_materi'], 26, '<br>', true); ?></a></small>
                                            <br><br>
                                        <?php else : ?>
                                            <?php $a++; ?>
                                            <?php if ($a == $indexvideo)
                                                $a++;
                                            ?>
                                            <?php $strvid = "Video " . $a . " Kegiatan " . $val2['deskripsi_kegiatan'] . " <b>(" . $val['judul_kelas'] . ")</b>"; ?>
                                            <small><a href="<?= base_url(); ?>classes/video_class/<?= $val['id_kelas'] ?>/<?= $val2['id_kegiatan'] ?>/<?= $val3['id_materi'] ?>/<?= $a ?>"><i class="fa fa-video-camera"></i> <?= wordwrap($strvid, 26, '<br>', true); ?></a></a></small>
                                            <br><br>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                <?php else : ?>
                                    <br>
                                    <p>Tidak Ada Materi Lain</p>
                                <?php endif;?>
                            </div>
                        </div>
                        
                    </div>
                <?php endforeach; ?>
            </div>

            <section>
               
</section>
</div>
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