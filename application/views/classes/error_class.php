<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<!-- <link href="<?= base_url() ?>assets/datetimepicker/bootstrap.min.css" rel="stylesheet" media="screen"> -->
<link href="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
$_SESSION['url_login'] = "error_class";
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
                            <div class="col-lg-10 mt-6">
                                <h2 data-aos="fade-up" data-aos-delay="0" class="text-white" style="line-height: 50px; "><br>Halo! Maaf atas ketidaknyamanan anda <br>tetapi kami tidak dapat menemukan <?= $error_bagian ?> yang anda cari. <br><i class="fa fa-times-circle"></i></h2>
                            </div>
                            <?php if (isset($this->session->userdata['logged_in'])) : ?>
                                <div class="col-lg-3" style="margin-top: 25px;"><a href="<?= base_url() ?>classes/my_classes" data-aos="fade-up" data-aos-delay="200" class="btn btn-primary ">Buka Akademik</a></div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php if ($error_bagian == "kelas") : ?>
        <div class="site-section courses-title bg-light" id="courses-section">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="400">
                        <h2 class="section-title" style="color: #3232aa;">Kelas Lain</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section courses-entry-wrap" data-aos="fade" data-aos-delay="">
            <div class="container">
                <div class="row">

                    <div class="owl-carousel col-12 nonloop-block-14">

                        <?php foreach ($seluruh_kelas as $val) : ?>
                            <div class="course bg-white h-100 align-self-stretch">
                                <figure class="m-0">
                                    <a href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas'] ?>"><img src="<?= base_url() . 'assets/images/' . $val['poster_kelas'] ?>" alt="Image" class="img-fluid" style="height: 180px; object-fit: cover;"></a>
                                </figure>
                                <div class="course-inner-text py-4 px-4" style="height: 200px;">
                                    <span class="course-price"><?php
                                                                if ($val['harga_kelas'] == '0' || $val['harga_kelas'] == null) {
                                                                    echo "<b>Gratis</b>";
                                                                } else {
                                                                    $hasil_rupiah = "Rp." . number_format($val['harga_kelas'], 2, ',', '.');
                                                                    echo $hasil_rupiah;
                                                                }
                                                                ?></span>
                                    <div class="meta">
                                        <div class="meta"># <?= $val['nama_kategori']; ?></div>
                                    </div>
                                    <h3><a href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas'] ?>"><?= $val['judul_kelas'] ?></a></h3>
                                    <?php $temp = strip_tags($val['deskripsi_kelas']); ?>
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
<?php elseif ($error_bagian == 'workshop') : ?>
    <div class="site-section courses-title bg-light" id="courses-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="400">
                    <h2 class="section-title" style="color: #3232aa;">Workshop Lain</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section courses-entry-wrap" data-aos="fade" data-aos-delay="">
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
<?php endif ?>
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