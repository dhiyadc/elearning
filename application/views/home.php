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
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ipsa nulla sed quis rerum amet natus quas necessitatibus.</p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="Register" class="btn btn text-white py-3 px-5 btn-pill" style="background-color: #3232aa">Daftar Kelas</a></p>
                    
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
              <div class="course-inner-text py-4 px-4">
                <span class="course-price"><?php
                  if($val['harga_kelas'] == '0'){
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
              <span class="customPrevBtn carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" data-slide="next">
              <span class="customNextBtn carousel-control-next-icon"></span>
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


    <div class="site-section" id="programs-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Program Kami</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam repellat aut neque! Doloribus sunt non aut reiciendis, vel recusandae obcaecati hic dicta repudiandae in quas quibusdam ullam, illum sed veniam!</p>
          </div>
        </div>
        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="<?php echo base_url(); ?>assets/images/gambar4.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Kami Memiliki Pengalaman dalam Mengajar</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.</p>

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
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.</p>

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
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.</p>

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
            <img src="<?php echo base_url(); ?>assets/images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
            <h3 class="mb-4">Jerome Jensen</h3>
            <blockquote>
              <p>&ldquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum rem soluta sit eius necessitatibus voluptate excepturi beatae ad eveniet sapiente impedit quae modi quo provident odit molestias! Rem reprehenderit assumenda &rdquo;</p>
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
                <div><h3 class="m-0">Mentor Terbaik dengan Pengalaman Mengajar</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Belajar yang mudah dipahami</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Konsep Belajar yang Simple</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Kelas Belajar yang Banyak</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Harga Kursus yang murah dan Terjangkau</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Belajar yang fleksibel dan bisa dimana saja</h3></div>
              </div>

            </div>


          </div>
          <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
            <img src="<?php echo base_url(); ?>assets/images/gambar1.png" alt="Image" class="img-fluid" height="400px" >
          </div>
        </div>
      </div>
    </div>

    



    