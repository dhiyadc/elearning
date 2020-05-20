<!-- Jumbotron -->
<div class="card-image bannerkelas">
	<div class="text-white text-center rgba-stylish-strong py-5 px-4">
		<div class="py-5">

			<div class="col-lg-6 pb-lg-4 pb-sm-3 ">
				<!-- <h5 class="h5 orange-text"><i class="fa fa-camera-retro"></i>#STAYATHOME</h5> -->
				<h1 class="card-title h2 my-4 py-5">#STAY AT HOME Upgrade Skill</h1>
				<p class="mb-4 pb-2 px-md-5 mx-md-5">Dapatkan Penawaran Kursus terbaik dan pengalaman terbaik disaat
					Pandemi dan
					Upgrade diri Kamu! .</p>
				<?php if(isset($_SESSION['logged_in'])) { ?>
				<a href="<?=base_url()?>classes/new_class" class="btn btn-black"><i class="fa fa-clone left"></i> Buat
					Kelas</a>
				<?php } else { ?>
					<a href="" class="btn btn-black" data-toggle="modal" data-target="#elegantModalForm"><i class="fa fa-clone left"></i> Buat
					Kelas</a>
				<?php } ?>
				<a href="register" class="btn btn-black"><i class="fa fa-clone left"></i> Gabung Kelas</a>

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
		<div class="col-xs-2">
			<div class="col-md-2"><button class="btn btn-primary" style="background-color: dimgrey; border-color: white">Kelas</button>
			</div>
		</div>
		<div class="col-xs-10 no-margin">
			
		
			<div class="row">
                  <a class="item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Kategori
                     
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default"
                      aria-labelledby="navbarDropdownMenuLink-333">
                      <a class="dropdown-item" href="<?= base_url(); ?>profile">Profile</a>
                      <a class="dropdown-item" href="#">Pengaturan</a>
                      <a class="dropdown-item" href="<?= base_url(); ?>login/logout" style="color: cornflowerblue;">Keluar</a>
                    </div>
				</a>

				<a class="item dropdown">
                    <a class="nav-link dropdown-toggle"  data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Filter By
                     
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default"
                      aria-labelledby="navbarDropdownMenuLink-333">
                      <a class="dropdown-item" href="<?= base_url(); ?>profile">Harga</a>
                      <a class="dropdown-item" href="#">Terbaru</a>
                      <a class="dropdown-item" href="#">Terlama </a>
                    </div>
				</a>
				
				<a class="item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-444" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Urutkan
                     
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default"
                      aria-labelledby="navbarDropdownMenuLink-444">
                      <a class="dropdown-item" href="#">Favorite</a>
                      <a class="dropdown-item" href="#">Terbaik</a>
                      <a class="dropdown-item" href="#">Bulan ini</a>
                    </div>
				</a>
				
					
			</div>
		</div>
		<div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu  mr-auto d-none d-lg-block m-0 p-0">
			<a class="btn btn-success" href="" style="background-color: #3333ab ; color: white"><i class="fa fa-plus" style="margin-right: 5px;"></i>Buat Kelas</a>
              </ul>
            </nav>
           
          </div>
	</div>
	</div>
</section>

<section class="isi-menu-kelas">
	<div class="container">
		<div class="row mb-5">
			

			<div class="col-md-12 mt-5">
				<div class="paket position-relative rounded">
					<div class="col-lg-12">
						<!-- <div class="judul-list">

							<!-- <h1 class="text-center" data-aos="fade-up" data-aos-delay="0">Seluruh Kelas</h1> -->
						</div>
					</div>
					<div class="container">
						<div class="row">

							<div class="owl-carousel col-12 nonloop-block-14">

								<?php foreach ($class as $val) : ?>
								<div class="course bg-white h-100 align-self-stretch">
									<figure class="m-0">
										<a href="<?=base_url()?>classes/open_class/<?= $val['id_kelas'] ?>"><img
												src="<?= base_url().'assets/images/'.$val['poster_kelas']?>" alt="Image"
												class="img-fluid"></a>
									</figure>
									<div class="course-inner-text py-4 px-4">
										<span class="course-price"><?php
										if($val['harga_kelas'] == '0'){
											echo "<b>Gratis</b>";
										} else {
											$hasil_rupiah = "Rp." . number_format($val['harga_kelas'],2,',','.');
											echo $hasil_rupiah;
										}
										?></span>
										<div class="meta"><span class="icon-clock-o"></span>4 Pertemuan / 12 Minggu</div>
										<h3><a href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas'] ?>"><?= $val['judul_kelas'] ?></a></h3>
										<p><?php echo substr($val['deskripsi_kelas'],0,100);  ?></p>
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
						
					</div>

				</div>

			</div>

			<div class="col-md-12 mt-5">
				<div class="position-relative rounded">
					<div class="col-lg-12">
						<div class="judul-list">
							<h1 class="text-center">Semua</h1>
						</div>
					</div>
					<div class="container">
						<div class="row">

							<!-- <div class="owl-carousel col-12 nonloop-block-14"> -->

							<?php foreach ($class as $val) : ?>
							<div class="col-lg-4 mt-5 mb-5 classBox moreBox" style="display: none;">
								<div class="course bg-white h-100 align-self-stretch">
									<figure class="m-0">
										<a href="course-single.html"><img
												src="<?= base_url().'assets/images/'.$val['poster_kelas']?>" alt="Image"
												class="img-fluid"></a>
									</figure>
									<div class="course-inner-text py-4 px-4">
										<span class="course-price"><?php
                  if($val['harga_kelas'] == '0'){
                    echo "<b>Gratis</b>";
                  } else {
					$hasil_rupiah = "Rp." . number_format($val['harga_kelas'],2,',','.');
					echo $hasil_rupiah;
                  }
                ?></span>
										<div class="meta"><span class="icon-clock-o"></span>4 Pertemuan / 12 Minggu</div>
										<h3><a href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas'] ?>"><?= $val['judul_kelas'] ?></a></h3>
										<p><?php echo substr($val['deskripsi_kelas'],0,50);  ?></p>
									</div>
									<div class="d-flex border-top stats">
										<div class="py-3 px-4"><span class="icon-users"></span> <?= $val['peserta'] ?>
											peserta</div>
										<div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span>
											2</div>
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

					<?php if($classNum > 4 ):  ?>
					<div id="loadMore">
						<button class="btn d-flex justify-content-center"> Lebih Banyak</button>
					</div>
				</div>
				<?php endif; ?>
				<?php if(($classNum < 4 )) : ?>
				<?= "" ?>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script>
	$(document).ready(function () {
		$(".moreBox").slice(0, 6).show();
		if ($(".classBox:hidden").length != 0) {
			$("#loadMore").show();
		}
		$("#loadMore").on('click', function (e) {
			e.preventDefault();
			$(".moreBox:hidden").slice(0, 6).slideDown();
			if ($(".moreBox:hidden").length == 0) {
				$("#loadMore").fadeOut('slow');
			}
		});
		console.log('start');
	});

</script>
