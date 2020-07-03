<?php 
  $_SESSION['url_login'] = "home";
?>

<div class="intro-section" id="home-section">
      
      <div class="slide-1 gambar1" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 mt-5">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mt-5">
                  <h1  data-aos="fade-up" data-aos-delay="100">Pengalaman Adalah Ilmu Terbaik yang semua orang cari</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Segera temukan kelas-kelas yang mampu menginspirasi kamu dan menjadikanmu “from zero to hero” disini.</p>
                  <?php if(isset($_SESSION['logged_in'])) : ?>
                  <div class="row">  
                    <a href="<?= base_url() ?>classes/new_class" class="btn btn text-white py-3 px-5 btn-pill ml-2 mt-1" data-aos="fade-up" data-aos-delay="300" style="background-color: #3232aa;">Buat Kelas</a>
                    <a href="<?= base_url() ?>workshops/new_workshop" class="btn btn text-white py-3 px-5 btn-pill ml-2 mt-1" data-aos="fade-up" data-aos-delay="300" style="background-color: #3232aa">Buat Workshop</a>
                  </div>
                  <?php else : ?>
                  <div class="row">
                   <a data-toggle="modal" data-target="#elegantModalForm" class="btn btn text-white py-3 px-5 btn-pill ml-2 mt-1" data-aos="fade-up" data-aos-delay="300" style="background-color: #3232aa;">Buat Kelas</a>
                   <a data-toggle="modal" data-target="#elegantModalForm" class="btn btn text-white py-3 px-5 btn-pill ml-2 mt-1" data-aos="fade-up" data-aos-delay="300" style="background-color: #3232aa">Buat Workshop</a>
                  </div>
                   <?php endif; ?>  
                    
                    <!-- <div class="row">
                      <a href="<?= base_url() ?>classes/new_class" class="btn btn text-white py-3 px-5 btn-pill ml-2 mt-1" data-aos="fade-up" data-aos-delay="300" style="background-color: #3232aa;">Buat Kelas</a>
                    
                      <a href="<?= base_url() ?>workshops/new_workshop" class="btn btn text-white py-3 px-5 btn-pill ml-2 mt-1" data-aos="fade-up" data-aos-delay="300" style="background-color: #3232aa">Buat Workshop</a>
                  </div> -->

                 </div>
                </div>

               
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    


    <div class="site-section courses-title" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Kelas Terbaik</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14" id="owl-demo">
            
          <!-- FOR FIXED IMAGE 
          style="object-fit: cover; height: 300px" -->
          <?php foreach ($class as $val) : ?>
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="<?=base_url()?>classes/open_class/<?= $val['id_kelas'] ?>"><img src="<?= base_url().'assets/images/'.$val['poster_kelas']?>" alt="Image" class="img-fluid" style="height: 180px; object-fit: cover;"></a>
              </figure>
              <div class="course-inner-text py-4 px-4" style="height: 200px;">
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

          <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
              <span class="customPrevBtn carousel-control-prev-icon" style="background-color: grey;"></span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" data-slide="next">
              <span class="customNextBtn carousel-control-next-icon" style="background-color: grey;"></span>
          </a>
        

            <script>
              var owl = $('.owl-carousel');
              owl.owlCarousel();
              // Go to the next item
              $('.customNextBtn').click(function() {
                  owl.trigger('owl.prev');
              })
              // Go to the previous item
              $('.customPrevBtn').click(function() {
                  owl.trigger('owl.next');
              })
            </script>
           <!--  -->
          </div>
        </div> 
      </div>

<!-- 
      <div class="site-section" id="programs-section" style="padding-bottom: 100px;">

      <section class="ftco-section" id="inputs">
		  
          <div class="bg-light py-5 mt-md-5">
          <div class="back1">
            <div class="container py-md-5">
              <div class="row">
                <h2>Bergabung Gratis Untuk Selamanya</h2> <br>
                
              </div>
              <div class="row">
              <a href="<?= base_url() ?>classes/new_class" class="btn btn-primary">Daftar</a>
              </div>
            </div>
          </div>
          </div>
        </section>
      <div class="container">

       
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title mt-5" style="font-weight: 600;">Free Account</h2><hr>
          
          </div>
        </div>

        <div class="compa">
        <div class="table ">
            <div class="table-cell" style="padding: 50px;"></div>
            <div class="table-cell plattform" style="padding: 50px;">
              <h3>FREE CLASS</h3>
              <a href="<?= base_url() ?>classes/new_class" class="btn">Daftar Sekarang</a>
            </div>
            <div class="table-cell enterprise" style="padding: 50px;">
              <h3>PREMIUM CLASS</h3>
              <a href="<?= base_url() ?>classes/new_class" class="btn">Gabung Sekarang</a>
            </div>
            <div class="table-cell  cell-feature">Kelas Publik</div>
            <div class="table-cell">
              <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell">
              <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell cell-feature">Tanpa Record</div>
            <div class="table-cell">
              <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell">
              <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell cell-feature">Tanpa Preview Materi</div>
            <div class="table-cell">
              <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell">
              <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell cell-feature">Sertifikat Copyright Classic</div>
            <div class="table-cell">
              <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell">
              <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell cell-feature">Potongan dari Kelas Berbayar</div>
            <div class="table-cell"></div>
            <div class="table-cell">
              <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen"/>
              </svg>
            </div>
          
            <div class="table-cell cell-feature">Gratis 2 Kelas</div>
            <div class="table-cell"></div>
            <div class="table-cell">
              <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
          
           
          </div>
        </div>
      </div>
    </div> -->


    <div class="site-section courses-title" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Workshop Terbaik</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14" id="owl-demo">
            
          <!-- FOR FIXED IMAGE 
          style="object-fit: cover; height: 300px" -->
          <?php foreach ($class2 as $val) : ?>
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="<?=base_url()?>workshops/open_workshop/<?= $val['id_workshop'] ?>"><img src="<?= base_url().'assets/images/'.$val['poster_workshop']?>" alt="Image" class="img-fluid" style="height: 180px; object-fit: cover;"></a>
              </figure>
              <div class="course-inner-text py-4 px-4" style="height: 200px;">
                <span class="course-price"><?php
                  if($val['harga_workshop'] == '0' || $val['harga_workshop'] == null){
                    echo "<b>Gratis</b>";
                  } else {
                    $hasil_rupiah = "Rp." . number_format($val['harga_workshop'],2,',','.');
                    echo $hasil_rupiah;
                  }
                ?></span>
                <div class="meta">
                      <div class="meta"># <?= $val['nama_kategori']; ?></div>
                </div>
                <h3><a href="<?=base_url()?>workshops/open_workshop/<?= $val['id_workshop'] ?>"><?= $val['judul_workshop'] ?></a></h3>
                <p><?php echo substr($val['deskripsi_workshop'],0,100);  ?></p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> <?= $val['peserta'] ?> peserta</div>
              </div>
            </div>
          <?php endforeach; ?>
            


          </div>

          <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
              <span class="customPrevBtn carousel-control-prev-icon" style="background-color: grey;"></span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" data-slide="next">
              <span class="customNextBtn carousel-control-next-icon"style="background-color: grey;"></span>
          </a>
        

            <script>
              var owl = $('.owl-carousel');
              owl.owlCarousel();
              // Go to the next item
              $('.customNextBtn').click(function() {
                  owl.trigger('owl.prev');
              })
              // Go to the previous item
              $('.customPrevBtn').click(function() {
                  owl.trigger('owl.next');
              })
            </script>
           <!--  -->
          </div>
        </div> 
      </div>


    <!-- <script>
      

    $(document).ready(function() {
     
     var owl = $("#owl-demo");
    
     owl.owlCarousel({
         items : 10, //10 items above 1000px browser width
         itemsDesktop : [1000,5], //5 items between 1000px and 901px
         itemsDesktopSmall : [900,3], // betweem 900px and 601px
         itemsTablet: [600,2], //2 items between 600 and 0
         itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
     });
    
     // Custom Navigation Events
     $(".next").click(function(){
       owl.trigger('owl.next');
     })
     $(".prev").click(function(){
       owl.trigger('owl.prev');
     })
     $(".play").click(function(){
       owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
     })
     $(".stop").click(function(){
       owl.trigger('owl.stop');
     })
    
   });


    </script> -->

    <!-- <div class="site-section" id="programs-section" style="padding-bottom: 100px;">
    <section class="ftco-section" id="inputs">
		  
      <div class="bg-light py-5 mt-md-5">
      <div class="back2">
        <div class="container py-md-5">
          <div class="row">
            <h2 style="color:white">Upgrade Akun Premium dan Nikmati fitur yang lebih Banyak</h2> <br>
            
          </div>
          <div class="row">
          <a href="<?= base_url() ?>classes/new_class" class="btn btn-primary" style="background-color: white; color: black;">Gabung</a>
          </div>
        </div>
      </div>
      </div>
    </section>
      <div class="container">
       
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title" style="font-weight: 600;">Premium Account</h2><hr>
          
          </div>
        </div>


        <div class="compa">
        <div class="table ">
            <div class="table-cell" style="padding: 50px;"></div>
            <div class="table-cell plattform" style="padding: 50px;">
              <h3>FREE CLASS</h3>
              <a href="<?= base_url() ?>classes/new_class" class="btn">Daftar Sekarang</a>
            </div>
            <div class="table-cell enterprise" style="padding: 50px;">
              <h3>PREMIUM CLASS</h3>
              <a href="<?= base_url() ?>classes/new_class" class="btn">Gabung Sekarang</a>
            </div>
            <div class="table-cell  cell-feature">Record Kelas</div>
            <div class="table-cell">
              <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell">
              <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell cell-feature">Preview Kelas</div>
            <div class="table-cell">
              <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell">
              <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell cell-feature">Sertifikat Copyright Pemateri</div>
            <div class="table-cell">
              <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell">
              <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell cell-feature">Potongan dari Kelas Berbayar</div>
            <div class="table-cell">
             
            </div>
            <div class="table-cell">
              <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
            <div class="table-cell cell-feature">Gratis Kelas Privat</div>
            <div class="table-cell"></div>
            <div class="table-cell">
              <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen"/>
              </svg>
            </div>
          
            <div class="table-cell cell-feature">Rekomendasi Kelas</div>
            <div class="table-cell"></div>
            <div class="table-cell">
              <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <title>check_blue</title>
                <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
              </svg>
            </div>
          
           
          </div>
        </div>
      </div>
    </div> -->



    
    <div class="site-section" id="programs-section" style="padding-top: 180px;">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Program Kami</h2>
            <p>Memberikan ruang belajar online untuk menciptakan interaksi yang baik dan menyenangkan bagi para mentor dan peserta kelas, serta memberikan kesempatan bagi siapapun untuk menjadi mentor terbaik ditiap kelas tanpa ada batasan apapun dengan fasilitas terbaik yang kami tawarkan.</p>
          </div>
        </div>
        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="<?php echo base_url(); ?>assets/images/gambar4.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Kami Memiliki Pengalaman dalam Mengajar</h2>
            <p class="mb-4">Kami Menyiapkan para Mentor yang berpengalaman demi Kualitas dalam Pembelajaran Anda.</p>

            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">Mentor Profesional</h3></div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
              <div><h3 class="m-0">Para Pengajar yang sudah Berpengalaman</h3></div>
            </div>

          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="<?php echo base_url(); ?>assets/images/gambar2.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Konsep Belajar Yang Simple dan Mudah Dipahami</h2>
            <p class="mb-4">Disini Anda akan diajak tentang Bagaimana anda menemukan pola belajar terbaik bagi Anda</p>

            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">Cara Belajar yang Simple</h3></div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
              <div><h3 class="m-0">Konsep Belajar Asik</h3></div>
            </div>

          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="<?php echo base_url(); ?>assets/images/gambar3.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Teknologi dan Pembelajaran yang Efesien</h2>
            <p class="mb-4">Classic Memberikan Pengalaman Anda dalam Penerapan Teknologi Pembelajaran</p>

            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">Belajar Menggunakan IT</h3></div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
              <div><h3 class="m-0">Pembelajaran yang bisa dimana saja</h3></div>
            </div>

          </div>
        </div>

      </div>
    </div>


    <div class="site-section bg-image overlay gambar1">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-8 text-center testimony">
            <img src="<?php echo base_url(); ?>assets/images/original.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
            <h3 class="mb-4">Setsuna F Say Yeah</h3>
            <blockquote>
              <p>&ldquo; Teknologi adalah Harapan bagi Mimpi Para Anak muda di esok hari kelak &rdquo;</p>
            </blockquote>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section pb-0 mb-5">

      <div class="future-blobs">
        <div class="blob_2">
          <img src="<?php echo base_url(); ?>assets/images/blob_2.svg" alt="Image">
        </div>
        <div class="blob_1">
          <img src="<?php echo base_url(); ?>assets/images/blob_1.svg" alt="Image">
        </div>
      </div>
      <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
          <div class="col-lg-7 text-center">
            <h2 class="section-title">Kenapa Memilih Kami</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">

            <div class="p-4 rounded bg-white why-choose-us-box">

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Memberikan mentor terbaik dengan pengalaman mengajar</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Belajar yang mudah dipahami</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Tersedia kelas pembelajaran sesuai minat</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Teknologi yang mendukung pembelajaran</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Harga kursus yang murah dan terjangkau</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Fleksibelitas waktu dan tempat</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Sertifikat online bagi semua mentor dan peserta kelas</h3></div>
              </div>

            </div>


          </div>
          <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
            <img src="<?php echo base_url(); ?>assets/images/gambar1.png" alt="Image" class="img-fluid" height="400px" >
          </div>
        </div>
      </div>
    </div>

    



    