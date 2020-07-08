<?php
$_SESSION['url_login'] = "kelasview";
?>
<!-- Jumbotron -->
<div class="card-image bannerkelas">
    <div class="text-white text-center rgba-stylish-strong py-5 px-4">
        <div class="py-5">

            <div class="col-lg-6 pb-lg-4 pb-sm-3 ">
                <!-- <h5 class="h5 orange-text"><i class="fa fa-camera-retro"></i>#STAYATHOME</h5> -->
                <h1 style="color: black;" class="card-title h2 my-4 py-4"><strong>#Stay at home</strong><br> and <br><strong>#Upgrade your skill</strong></h1>
                <p class="mb-4 pb-2 px-md-5 mx-md-5" style="color: black; text-shadow: floralwhite; text-align: justify;">Temukan Workshop terbaik disini untuk buat kamu tetap <strong>#Produktif</strong> dimasa
                    Pandemi. </p>
                <div class="row">
                    <div class="col-md-12">
                        <?php if (isset($_SESSION['logged_in'])) { ?>
                            <a href="<?= base_url() ?>Workshops/new_workshop" class="btn btn-black mr-1 mt-1"><i class="fa fa-clone left"></i> Buat
                                Workshop</a>

                        <?php } else { ?>
                            <?php $_SESSION['new_class_url_login'] = "newworkshop"; ?>

                            <a href="" class="btn btn-black ml-2 mt-1 " data-toggle="modal" data-target="#elegantModalFormcreateClass"><i class="fa fa-clone left"></i> Buat
                                Workshop</a>
                            <a href="" class="btn btn-black ml-2 mt-1" data-toggle="modal" data-target="#elegantModalFormcreateClass"><i class="fa fa-clone left"></i> Gabung
                                Workshop</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Jumbotron -->
<!-- <div class="col-lg-16">
  <div class="bg-dark">
      <div class="col-md-4">
            <input type="submit">
      </div>
  </div>
</div> -->

<!-- <div class="col">
  <div class="container">
    <div class="row">
    <div class="col-md-12 mt-5">
    <div class="position-relative rounded" ">
    <div class="col-lg-12">
      <div class="judul-list">
      <h1 class="text-center"></h1>
      </div>
    </div>
      <div class="container">
        <div class="row">
        </div>
        </div>
         
        
        </div>
        
      </div>
    </div>
  </div>
</div> -->

<section class="menutop">
    <div class="container">
        <div class="row mt-5" style="padding-bottom :15px; border-bottom: 1px solid #dedfe0;">
            <div class="col-xs-2" style="padding-left: 25px;">
                <div class="col-md-2"><button class="btn btn-primary" style="background-color: dimgrey; border-color: white">Workshop</button>
                </div>
            </div>
            <div class="col-xs-10 no-margin" style="padding-right: 36px;">


                <div class="row">
                    <ul class="item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori

                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <!-- <a class="dropdown-item" href="<?= base_url(); ?>profile">tesT</a>
						<a class="dropdown-item" href="#">Pengaturan</a>
						<a class="dropdown-item" href="<?= base_url(); ?>login/logout" style="color: cornflowerblue;">Keluar</a> -->
                            <?php foreach ($categories as $val) : ?>
                                <a class="dropdown-item" href="<?= base_url(); ?>Workshops/categories/<?= $val['nama_kategori']; ?>"><?= $val['nama_kategori']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </ul>

                    <!--
					<li class="item dropdown" style="list-style: none;">
                    <a class="nav-link dropdown-toggle" id="filterBy" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Filter By
                     
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default"
                      aria-labelledby="filterBy">
                      <a class="dropdown-item" href="<?= base_url(); ?>profile" aria-labelledby="filterBy">Harga</a>
                      <a class="dropdown-item" href="#" aria-labelledby="filterBy">Terbaru</a>
                      <a class="dropdown-item" href="#" aria-labelledby="filterBy">Terlama </a>
                    </div>
				</li> -->

                    <ul class="item dropdown">
                        <a class="nav-link dropdown-toggle" id="kategori2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Urutkan

                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="kategori2">
                            <a class="dropdown-item" href="<?= base_url(); ?>Workshops/sort/terbaik">Terbaik</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>Workshops/sort/terbaru">Terbaru</a>
                        </div>
                    </ul>
                    <!-- <div class="col-5">
				<form class="form-inline active-purple-4">
				<input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
					aria-label="Search">
				<i class="fa fa-search" aria-hidden="true"></i>
				</form>
				</div> -->

                </div>




            </div>
            <div class="ml-auto w-35" style="padding-left: 40px; padding-right: 100px;">

                <!-- <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu  mr-auto d-none d-lg-block m-0 p-0">

			<?php if (isset($_SESSION['logged_in'])) { ?>
				<a href="<?= base_url() ?>classes/new_class" class="btn btn-success" style="background-color: #3333ab ; color: white"><i class="fa fa-plus" style="margin-right: 5px;"></i> Buat
					Kelas</a>
				<?php } else { ?>
					<a href="" class="btn btn-success" data-toggle="modal" data-target="#elegantModalForm" style="background-color: #3333ab ; color: white"><i class="fa fa-plus" style="margin-right: 5px;"></i> Buat
					Kelas</a>
				<?php } ?>


              </ul>
			</nav> -->
                <!-- <div class="row">
					
				<form class="form-inline active-purple-4">
				<div class="col-md-12">
				<input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Cari Kelas"aria-label="Search">
				</div>
				<div class="col-md-3">
				<button class="btn"><i class="fa fa-search" aria-hidden="true" onclick=""></i></button>
				</div>
				</form>
				</div> -->
                <form action="<?= base_url(); ?>Workshops/search" method="post">
                    <div class="input-group mb-3">
                        <input class="form-control form-control-sm mr-0 w-0" type="text" name="keyword" placeholder="Cari Workshop" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true" onclick=""></i></button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</section>

<section class="isi-menu-kelas">
    <div class="container">
        <div class="row mb-5">


            <div class="col-md-12 mt-0">
                <div class="paket position-relative rounded">
                    <div class="col-lg-12">
                        <!-- <div class="judul-list"> -->

                        <!-- <h1 class="text-center" data-aos="fade-up" data-aos-delay="0">Seluruh Kelas</h1> -->
                    </div>
                </div>
                <!-- <div class="container">
						<div class="row">

							<div class="owl-carousel col-12 nonloop-block-14">

								<?php foreach ($class as $val) : ?>
								<div class="course bg-white h-100 align-self-stretch">
									<figure class="m-0">
										<a href="<?= base_url() ?>classes/open_class/<?= $val['id_workshop'] ?>"><img
												src="<?= base_url() . 'assets/images/' . $val['poster_workshop'] ?>" alt="Image"
												class="img-fluid"></a>
									</figure>
									<div class="course-inner-text py-4 px-4">
										<span class="course-price"><?php
                                                                    if ($val['harga_workshop'] == '0' || $val['harga_workshop'] == null) {
                                                                        echo "<b>Gratis</b>";
                                                                    } else {
                                                                        $hasil_rupiah = "Rp." . number_format($val['harga_workshop'], 2, ',', '.');
                                                                        echo $hasil_rupiah;
                                                                    }
                                                                    ?></span>
										<div class="meta"><span class="icon-clock-o"></span>4 Pertemuan / 12 Minggu</div>
										<h3><a href="<?= base_url() ?>classes/open_class/<?= $val['id_workshop'] ?>"><?= $val['judul_workshop'] ?></a></h3>
										<p><?php echo substr($val['deskripsi_kelas'], 0, 100);  ?></p>
									</div>
									<div class="d-flex border-top stats">
										<div class="py-3 px-4"><span class="icon-users"></span> <?= $val['peserta'] ?>
											peserta</div>
										<div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span>
											2</div>
									</div>
								</div>
								<?php endforeach; ?>
				  				
							</div>
							<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#myCarousel" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>

							
						</div>
						
					</div> -->

            </div>

        </div>

        <div class="col-md-12 mt-5">
            <div class="position-relative rounded">
                <!-- <div class="col-lg-12">
						<div class="judul-list">
							<h1 class="text-center">Semua</h1>
						</div>
					</div> -->
                <div class="container">
                    <div class="row">

                        <!-- <div class="owl-carousel col-12 nonloop-block-14"> -->

                        <?php foreach ($class as $val) : ?>
                            <div class="col-lg-4 mt-5 mb-5 classBox moreBox" style="display: none;">
                                <div class="course bg-white h-100 align-self-stretch">
                                    <figure class="m-0">
                                        <a href="<?= base_url() ?>workshops/open_workshop/<?= $val['id_workshop'] ?>"><img src="<?= base_url() . 'assets/images/' . $val['poster_workshop'] ?>" alt="Image" class="img-fluid darkbg" style="height: 180px; width: 330px; object-fit: cover;"></a>
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
                                        <div class="meta"># <?= $val['nama_kategori']; ?></div>
                                        <h3><a href="<?= base_url() ?>workshops/open_workshop/<?= $val['id_workshop'] ?>"><?= $val['judul_workshop'] ?></a></h3>
                                        <p><?php echo substr($val['deskripsi_workshop'], 0, 50);  ?></p>
                                    </div>
                                    <div class="d-flex border-top stats">
                                        <div class="py-3 px-4"><span class="icon-users"></span> <?= $val['peserta'] ?>
                                            peserta</div>
                                        <!-- <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span>
											2</div> -->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!-- </div> -->
                    </div>
                </div>

                <!-- <div class="row justify-content-center">
						<div class="col-7 text-center">
							<button class="customPrevBtn btn btn-primary m-1">Prev</button>
							<button class="customNextBtn btn btn-primary m-1">Next</button>
						</div>
					</div> -->
            </div>
        </div>





    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-5">

            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                <?php if ($classNum > 6) :  ?>
                    <div id="loadMore" style="padding-left: 60px;">
                        <button class="btn d-flex justify-content-center"> Lebih Banyak</button>
                    </div>
            </div>
        <?php endif; ?>
        <?php if (($classNum <= 6)) : ?>
            <?= "" ?>
        <?php endif; ?>

        </div>
    </div>
    </div>
</section>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function() {
        $(".moreBox").slice(0, 6).show();
        if ($(".classBox:hidden").length != 0) {
            $("#loadMore").show();
        }
        $("#loadMore").on('click', function(e) {
            e.preventDefault();
            $(".moreBox:hidden").slice(0, 6).slideDown();
            if ($(".moreBox:hidden").length == 0) {
                $("#loadMore").fadeOut('slow');
            }
        });
        console.log('start');
    });
</script>