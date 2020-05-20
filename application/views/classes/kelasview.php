<!-- Jumbotron -->
<div class="card-image bannerkelas">
	<div class="text-white text-center rgba-stylish-strong py-5 px-4">
		<div class="py-5">

			<div class="col-lg-6 pb-lg-4 pb-sm-3 ">
				<!-- <h5 class="h5 orange-text"><i class="fa fa-camera-retro"></i>#STAYATHOME</h5> -->
				<h1 class="card-title h2 my-4 py-5">#STAY AT HOME Upgrade Skill</h1>
				<p class="mb-4 pb-2 px-md-5 mx-md-5">Dapatkan Penawaran Kursus terbaik dan pengalaman terbaik disaat Pandemi dan
					Upgrade diri Kamu! .</p>

				<a href="<?=base_url()?>classes/new_class" class="btn btn-black"><i class="fa fa-clone left"></i> Buat Kelas</a>
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


<section class="isi-menu-kelas">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-3 pb-lg-5 pb-sm-3 mt-5" data-aos="fade-up" data-aos-delay="100" style="padding-top: 100px">
				<div class="position-relative rounded">
					<div class="p-lg-3 p-md-3 p-sm-0">
            <h5 class="mb-4 d-lg-block d-md-block d-none">Filter</h5>
            <form action="<?= base_url(); ?>classes/search" method="post">
						<div class="input-group md-form form-sm form-2 pl-0">
              <input class="form-control my-0 py-1 red-border" type="text" name="keyword" placeholder="Search" aria-label="Search">
							<div class="input-group-append">
								<span class="input-group-text red lighten-3" id="basic-text1"><i class="fa fa-search text-grey"
										aria-hidden="true"></i></span>
							</div>
            </div>
            </form>
					</div>

					<div class="card">
						<article class="card-group-item">
							<header class="card-header">
								<h6 class="title">Berdasarkan Kategori </h6>
							</header>
							<div class="filter-content">
								<div class="card-body">
									<form>
                    <?php foreach($categories as $val) : ?>
										<label class="form-check">
											<!-- <input class="form-check-input" type="checkbox" value=""> -->
											<span class="form-check-label">
											<a href="<?= base_url(); ?>classes/categories/<?= $val['nama_kategori']; ?>"><?= $val['nama_kategori']; ?></a>	
											</span>
										</label> <!-- form-check.// -->
                    <?php endforeach; ?>
                  </form>
            
                    

								</div> <!-- card-body.// -->
							</div>
						</article> <!-- card-group-item.// -->

						<article class="card-group-item">
							<header class="card-header">
								<h6 class="title">Berdasarkan Kategori </h6>
							</header>
							<div class="filter-content">
								<div class="card-body">
									<form>
										<label class="form-check">
											<input class="form-check-input" type="checkbox" value="">
											<span class="form-check-label">
												Harga
											</span>
										</label> <!-- form-check.// -->
										<label class="form-check">
											<input class="form-check-input" type="checkbox" value="">
											<span class="form-check-label">
												Terbaik
											</span>
										</label> <!-- form-check.// -->
										<label class="form-check">
											<input class="form-check-input" type="checkbox" value="">
											<span class="form-check-label">
												Promo
											</span>
										</label> <!-- form-check.// -->
									</form>

									<a href="KelasFilter" class="btn btn-light"><i class="fa fa-clone left"></i>Sesuaikan</a>
								</div> <!-- card-body.// -->
							</div>
						</article> <!-- card-group-item.// -->


					</div> <!-- card.// -->
					<!--  -->
				</div>
			</div>

			<div class="col-md-8 mt-5">
				<div class="paket position-relative rounded">
					<div class="col-lg-12">
						<div class="judul-list">

							<h1 class="text-center" data-aos="fade-up" data-aos-delay="0">Seluruh Kelas</h1>
						</div>
					</div>
					<div class="container">
						<div class="row">

							<div class="owl-carousel col-12 nonloop-block-14">

								<?php foreach ($class as $val) : ?>
								<div class="course bg-white h-100 align-self-stretch">
									<figure class="m-0">
										<a href="<?=base_url()?>classes/open_class/<?= $val['id_kelas'] ?>"><img src="<?= base_url().'assets/images/'.$val['poster_kelas']?>"
												alt="Image" class="img-fluid"></a>
									</figure>
									<div class="course-inner-text py-4 px-4">
										<span class="course-price"><?php
                  if($val['harga_kelas'] == 'Rp.0,00'){
                    echo "<b>Gratis</b>";
                  } else {
                    echo "Rp.";
                    echo $val['harga_kelas'];
                  }
                ?></span>
										<div class="meta"><span class="icon-clock-o"></span>4 Pertemuan / 12 Minggu</div>
										<h3><a href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas'] ?>"><?= $val['judul_kelas'] ?></a></h3>
										<p><?php echo substr($val['deskripsi_kelas'],0,100);  ?></p>
									</div>
									<div class="d-flex border-top stats">
										<div class="py-3 px-4"><span class="icon-users"></span> <?= $val['peserta'] ?> peserta</div>
										<div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
									</div>
								</div>
								<?php endforeach; ?>

							</div>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-7 text-center">
							<button class="customPrevBtn btn btn-primary m-1">Prev</button>
							<button class="customNextBtn btn btn-primary m-1">Next</button>
						</div>
					</div>
				</div>

			</div>

<?php foreach($categories as $vall) : ?>
			<div class="col-md-12 mt-5">
				<div class="position-relative rounded">
					<div class="col-lg-12">
						<div class="judul-list">
							<h1 class="text-center"><?= $vall['nama_kategori'] ?></h1>
						</div>
					</div>
					<div class="container">
						<div class="row">

							<div class="owl-carousel col-12 nonloop-block-14">

                <?php foreach ($class as $val) : 
                  if($vall['nama_kategori'] == $val['nama_kategori']){
                  ?>
								<div class="course bg-white h-100 align-self-stretch">
									<figure class="m-0">
										<a href="course-single.html"><img src="<?= base_url().'assets/images/'.$val['poster_kelas']?>"
												alt="Image" class="img-fluid"></a>
									</figure>
									<div class="course-inner-text py-4 px-4">
										<span class="course-price"><?php
                  if($val['harga_kelas'] == 'Rp.0,00'){
                    echo "<b>Gratis</b>";
                  } else {
                    echo "Rp.";
                    echo $val['harga_kelas'];
                  }
                ?></span>
										<div class="meta"><span class="icon-clock-o"></span>4 Pertemuan / 12 Minggu</div>
										<h3><a href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas'] ?>"><?= $val['judul_kelas'] ?></a></h3>
										<p><?php echo substr($val['deskripsi_kelas'],0,50);  ?></p>
									</div>
									<div class="d-flex border-top stats">
										<div class="py-3 px-4"><span class="icon-users"></span> <?= $val['peserta'] ?> peserta</div>
										<div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
									</div>
								</div>
                <?php } ?>
                <?php endforeach; ?>

							</div>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-7 text-center">
							<button class="customPrevBtn btn btn-primary m-1">Prev</button>
							<button class="customNextBtn btn btn-primary m-1">Next</button>
						</div>
					</div>
				</div>
      </div>
      
      <?php endforeach; ?>




		</div>

		<div class="container">
			<div class="row">
				<div class="col-lg-5">

				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          
          <button class="btn d-flex justify-content-center"> Lebih Banyak</button>
				</div>
			</div>
		</div>
	</div>
</section>
