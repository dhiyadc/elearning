<?php 
  $_SESSION['url_login'] = "register_user";
?>
<div class="intro-section" id="daftar-section" >


      
      <div class="slide-1 gambar1 mb-5" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 mt-4 p-4 ">
              <div class="row align-items-center">
                <!--  -->
                    <!-- Modal -->
                      <div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true" style="padding-right: 90px;">
                        <div class="modal-dialog" role="document">
                          <!--Content-->
                          <div class="modal-content form-elegant">
                            <!--Header-->
                            <div class="modal-header text-center">
                              <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Masuk</strong></h3>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <!--Body-->
                            <div class="modal-body mx-4">
                              <!--Body-->
                              <div class="md-form mb-5">
                                <input type="email" id="Form-email1" class="form-control validate" placeholder="Masukkan Email">
                                <!-- <label data-error="wrong" data-success="right" for="Form-email1">Masukan email</label> -->
                              </div>

                              <div class="md-form pb-3">
                                <input type="password" id="Form-pass1" class="form-control validate" placeholder="Masukkan Password">
                                <!-- <label data-error="wrong" data-success="right" for="Form-pass1">Masukan Password</label> -->
                                <p class="font-small blue-text d-flex justify-content-end mt-2">Lupa <a href="#" class="blue-text ml-1">
                                    Password?</a></p>
                              </div>

                              <div class="text-center mb-3">
                                <button type="button" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Masuk</button>
                              </div>
                            

                              
                            </div>
                            <!--Footer-->
                            <div class="modal-footer mx-5 pt-3 mb-1">
                              <p class="mr-5 font-small grey-text d-flex justify-content-end">Belum ada Akun? <a href="" class="blue-text ml-1" data-toggle="modal" data-target="#elegantModalForm">
                                  Daftar</a></p>
                            </div>
                          </div>
                          <!--/.Content-->
                        </div>
                      </div>
                      <!-- Modal -->

                <div class="col-lg-12 ml-auto mt-5 mb-4" data-aos="fade-up" data-aos-delay="500">
                <div id="login-page">
                <form class="form-login form-box" action="<?= base_url() ?>register/register_process" method="post">
                <!--  -->
                
                <!--  -->
                    <h3 class="h4 text-black mb-4 text-center">Formulir Pendaftaran</h3>
                    <?php if ($this->session->flashdata('registered')) { ?>
                        <div class="alert alert-danger" style="text-align: center;"><p></p> <?= $this->session->flashdata('registered') ?> </div>
                    <?php } ?>
                    
                    <div class="form-group">
                      <input type="text" class="form-control" name="nama" placeholder="Fullname" minlength="3" maxlength="50" autofocus required>
                      <small class="form-text text-muted">Nama lengkap Anda.</small>
                    </div>

                   <div class="form-group mb-3">
                      <input type="tel" class="form-control" name="no_telepon" placeholder="Phone Number" required>
                      <small class="form-text text-muted">Nomor Handphone.</small>

                    </div>

                    <div class="form-group mb-3">
                      <input type="email" class="form-control" name="email" placeholder="Email" oninvalid="this.setCustomValidity('Please enter a valid email address')"
                        oninput="this.setCustomValidity('')" required>
                      <small class="form-text text-muted">Alamat Email yang valid.</small>
                    </div>
                    
                    <div class="form-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                      <small class="form-text text-muted">Password menggunakan setidaknya 1 Huruf Kapital dan 1 Simbol.</small>
                    </div>
                    <div class="form-group mb-4">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <small class="form-text text-muted mb-2">Ulangi password diatas.</small>
                        <small>
                        <input type="checkbox" class="form-checkbox" onclick="myFunction()"> Show password
                        </small>
                    </div>
                    
                    <!-- see password -->
                    <script>
                    function myFunction() {
                    var x = document.getElementById("password");
                    var y = document.getElementById("password2");
                    if (x.type === "password"){
                        x.type = "text";
                        y.type = "text";
                    } else {
                        x.type = "password";
                        y.type = "password";
                    }
                    }
                    </script>
                    
                    
                
                    
                <div class="form-grup has-feedback">
                    <div class="col-sm-3 col-sm-9">
                        <div class="checkbox">
                                <label>
                                <input name="term_of_use"type="checkbox" required> Saya Menyetujui aturan pakai yang berlaku
                                </label>
                        </div>
                    </div>
                </div>  
                    
                    <div class="form-group text-center">
                      
                      <button id="submit" class="btn btn-dark btn-pill" value="login" type="submit"> Daftar</button>
                      <input type="submit" class="btn btn-light btn-pill" value="Back">
                    </div>
                        <div class="modal-footer mx-5 pt-3 mb-1">
                          <p class="font-small black-text d-flex justify-content-end" style="color: grey;">Sudah ada Akun?<a href="" class="blue-text ml-1" data-toggle="modal" data-target="#elegantModalForm">
                              Masuk</a></p>
                        </div>
                  </form>
                  <!-- <div id="message">
              <h3>Password must contain the following:</h3>
              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
              <p id="number" class="invalid">A <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
                  <div id="message2">
                  <p id="match" class="invalid">Password doesn't match</p>
                  </div>
                </div>
              </div> -->
              <!-- js placed at the end of the document so the pages load faster -->
              <script src="<?= base_url(); ?>assets/lib/jquery/jquery.min.js"></script>
              <script src="<?= base_url(); ?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
              <!--BACKSTRETCH-->
              <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
              <script type="text/javascript" src="<?= base_url(); ?>assets/lib/jquery.backstretch.min.js"></script>
              <script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>
              <script>
                $.backstretch("<?= base_url(); ?>assets/img/login-bg.jpg", {
                  speed: 500
                });
              </script>
                </div>
                      
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
    <!-- <div class="site-section courses-title" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Kelas</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">
          <div class="owl-carousel col-12 nonloop-block-14">
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="<?php echo base_url(); ?>assets/images/img_1.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$20</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">Study Law of Physics</a></h3>
                <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="<?php echo base_url(); ?>assets/images/img_2.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$99</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">Logo Design Course</a></h3>
                <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="<?php echo base_url(); ?>assets/images/img_3.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$99</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">JS Programming Language</a></h3>
                <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="<?php echo base_url(); ?>assets/images/img_4.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$20</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">Study Law of Physics</a></h3>
                <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="<?php echo base_url(); ?>assets/images/img_5.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$99</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">Logo Design Course</a></h3>
                <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="<?php echo base_url(); ?>assets/images/img_6.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$99</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">JS Programming Language</a></h3>
                <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
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
            <img src="<?php echo base_url(); ?>assets/images/undraw_youtube_tutorial.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Kami Memiliki Pengalaman dalam Mengajar</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.</p>
            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>
            </div>
            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
              <div><h3 class="m-0">150 Universities Worldwide</h3></div>
            </div>
          </div>
        </div>
        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="<?php echo base_url(); ?>assets/images/undraw_teaching.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Strive for Excellent</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.</p>
            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>
            </div>
            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
              <div><h3 class="m-0">150 Universities Worldwide</h3></div>
            </div>
          </div>
        </div>
        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="<?php echo base_url(); ?>assets/images/undraw_teacher.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Teknologi dan Pembelajaran yang Efesien</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.</p>
            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>
            </div>
            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
              <div><h3 class="m-0">150 Universities Worldwide</h3></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section" id="teachers-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 mb-5 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Our Teachers</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam repellat aut neque! Doloribus sunt non aut reiciendis, vel recusandae obcaecati hic dicta repudiandae in quas quibusdam ullam, illum sed veniam!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="teacher text-center">
              <img src="<?php echo base_url(); ?>assets/images/person_1.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
                <h3 class="text-black">Arya Pamungkas</h3>
                <p class="position">Physics Teacher</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro eius suscipit delectus enim iusto tempora, adipisci at provident.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="teacher text-center">
              <img src="<?php echo base_url(); ?>assets/images/person_2.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
                <h3 class="text-black">Zora Inopa</h3>
                <p class="position">Physics Teacher</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro eius suscipit delectus enim iusto tempora, adipisci at provident.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="teacher text-center">
              <img src="<?php echo base_url(); ?>assets/images/person_3.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
                <h3 class="text-black">Dice 4646</h3>
                <p class="position">Physics Teacher</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro eius suscipit delectus enim iusto tempora, adipisci at provident.</p>
              </div>
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
    <div class="site-section pb-0">
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
            <h2 class="section-title">Why Choose Us</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">
            <div class="p-4 rounded bg-white why-choose-us-box">
              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>
              </div>
              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">150 Universities Worldwide</h3></div>
              </div>
              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Top Professionals in The World</h3></div>
              </div>
              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Expand Your Knowledge</h3></div>
              </div>
              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Best Online Teaching Assistant Courses</h3></div>
              </div>
              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Best Teachers</h3></div>
              </div>
            </div>
          </div>
          <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
            <img src="<?php echo base_url(); ?>assets/images/person_transparent.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
     -->

