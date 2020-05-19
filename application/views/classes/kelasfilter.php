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

				<a href="<?=base_url()?>classes/new_class" class="btn btn-black"><i class="fa fa-clone left"></i> Buat
					Kelas</a>
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
			<div class="col-lg-3 pb-lg-5 pb-sm-3 mt-5" data-aos="fade-up" data-aos-delay="100"
				style="padding-top: 100px">
				<div class="position-relative rounded" style="box-shadow :0px 0px 11px 4px rgba(0,0,0,0.4);">
					<div class="p-lg-3 p-md-3 p-sm-0">
						<h5 class="mb-4 d-lg-block d-md-block d-none">Filter</h5>
						<form action="<?= base_url(); ?>classes/search" method="post">
							<div class="input-group md-form form-sm form-2 pl-0">
								<input class="form-control my-0 py-1 red-border" type="text" name="keyword"
									placeholder="Search" aria-label="Search">
								<div class="input-group-append">
									<span class="input-group-text red lighten-3" id="basic-text1"><i
											class="fa fa-search text-grey" aria-hidden="true"></i></span>
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
												<a
													href="<?= base_url(); ?>classes/categories/<?= $val['nama_kategori']; ?>"><?= $val['nama_kategori']; ?></a>
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

									<button type="button" class="btn btn-light">Sesuaikan</button>
								</div> <!-- card-body.// -->
							</div>
						</article> <!-- card-group-item.// -->


					</div> <!-- card.// -->
					<!--  -->


				</div>
			</div>

			<div class="col-lg-9">
				<div class="col-lg-12">
					<div class="judul-list">
						<h1 class="text-center"><?php if(isset($kategori_text)){ ?> Kelas <?= $kategori_text; ?><?php } else { 
              echo "Hasil pencarian '".$keyword."'";
            } ?></h1>
					</div>
				</div>
				<div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
					<div class="card-group" style="padding-top: 10px;">

						<?php foreach($class as $val) : ?>
						<div class="col-lg-6 mb-5 mt-5 moreBox classBox" style="display: none;">
							<div class="card" style="box-shadow :0px 0px 11px 4px rgba(0,0,0,0.4);">
								<img class="card-img-top" src="<?= base_url().'assets/images/'.$val['poster_kelas']?>"
									alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title"> <?= $val['judul_kelas'] ?></h5>
									<p class="card-text"><?php echo substr($val['deskripsi_kelas'],0,100);  ?></p>
									<center><a class="btn btn-dark mr-1"
											href="<?= base_url() ?>classes/open_class/<?= $val['id_kelas'] ?>">Detail</a>
									</center>
								</div>
								<div class="card-footer">

								</div>
							</div>
						</div>
						<?php endforeach; ?>
						<!-- 

						<div class="col-lg-6 mb-5 mt-5">
							<div class="card" style="box-shadow :0px 0px 11px 4px rgba(0,0,0,0.4);">
								<img class="card-img-top" src="<?php echo base_url(); ?>assets/images/img_1.jpg" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">Belajar JS</h5>
									<p class="card-text">This is a wider card with supporting text below as a natural lead-in to
										additional content. This content is a little bit longer.</p>
									<div class="row">
										<button class="btn btn-dark mr-1"> <a href="Detailkelas">Detail</a></button> <button
											class="btn">Gabung Kelas</button>
									</div>
								</div>
								<div class="card-footer">
									<small class="text-muted">Last updated 3 mins ago</small>
								</div>
							</div>
						</div>

						<div class="col-lg-6 mb-5 mt-5">
							<div class="card" style="box-shadow :0px 0px 11px 4px rgba(0,0,0,0.4);">
								<img class="card-img-top" src="<?php echo base_url(); ?>assets/images/img_1.jpg" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">Pemograman Dasar</h5>
									<p class="card-text">This is a wider card with supporting text below as a natural lead-in to
										additional content. This card has even longer content than the first to show that equal height
										action.</p>
									<div class="row">
										<button class="btn btn-dark mr-1"> <a href="Detailkelas">Detail</a></button> <button
											class="btn">Gabung Kelas</button>
									</div>
								</div>
								<div class="card-footer">
									<small class="text-muted">Last updated 3 mins ago</small>
								</div>
							</div>
						</div>

						<div class="col-lg-6 mb-5 mt-5">
							<div class="card" style="box-shadow :0px 0px 11px 4px rgba(0,0,0,0.4);">
								<img class="card-img-top" src="<?php echo base_url(); ?>assets/images/img_1.jpg" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">Pemograman Dasar</h5>
									<p class="card-text">This is a wider card with supporting text below as a natural lead-in to
										additional content. This card has even longer content than the first to show that equal height
										action.</p>
									<div class="row">
										<button class="btn btn-dark mr-1"> <a href="Detailkelas">Detail</a></button> <button
											class="btn">Gabung Kelas</button>
									</div>
								</div>
								<div class="card-footer">
									<small class="text-muted">Last updated 3 mins ago</small>
								</div>
							</div>
						</div>
					</div> -->


					</div>



				</div>

				<div class="container">
					<div class="row">
						<div class="col-lg-6">

						</div>
						<div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
							<?php if(empty($class)) {
								echo "<p>Pencarian tidak ketemu</p>";
							} else {?>

							<?php if($classNum > 4 ):  ?>
							<div id="loadMore">
								<button class="btn d-flex justify-content-center"> Lebih Banyak</button>
							</div>
						</div>
							<?php endif; ?>
							<?php if(($classNum < 4 )) : ?>
							<?= "" ?>
							<?php endif; ?>
							<?php } ?>
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
