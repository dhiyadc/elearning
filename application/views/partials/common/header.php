<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Classico">
  <meta name="description" content="Pengalaman Adalah Ilmu Terbaik yang semua orang cari ayo kembangkan skill anda di Classico.">
  <meta name="google-site-verification" content="ITEJvL_D_0UTelIVg3Qb2vDeYSh1s4y_Xix_pONnWKo" />
  <link rel="icon" href="<?php echo base_url(); ?>assets/images/logo.png">
  <title>Classico</title>

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/aos.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">


  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <!-- Modal -->
  <div id="login-page">
    <div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top:90px">
      <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant" >
          <!--Header-->
          <div class="modal-header text-center">
            <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Masuk</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!--Body-->
          <div class="modal-body mx-4">

            <!-- Body -->
            <?php
            if (isset($logout_message)) {
              echo "<div class='message'>";
              echo $logout_message;
              echo "</div>";
            }
            ?>
            <?php
            if (isset($message_display)) {
              echo "<div class='message'>";
              echo $message_display;
              echo "</div>";
            }
            ?>
            <?php
            echo "<div class='error_msg'>";
            if (isset($error_message)) {
              echo $error_message;
            }
            //echo validation_errors();
            echo "</div>";
            ?>
            <?php if ($this->session->flashdata('invalid')) { ?>
              <div class="alert alert-danger"> <?= $this->session->flashdata('invalid') ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('success')) { ?>
              <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
            <?php } ?>
            <!--  -->
            <form class="form-login" action="<?= base_url() ?>login/user_login_process" method="post">
              <div class="md-form mb-3">
                <h5>Email</h5>
                <input type="email" class="form-control validate" name="email" placeholder="Masukkan Email" autofocus required>

                <!-- <label data-error="wrong" data-success="right" for="Form-email1">Masukan email</label> -->
              </div>

              <div class="md-form pb-3">

                <h5>Password</h5>
                <input type="password" class="form-control validate" name="password" placeholder="Masukkan Password" required>
                <!-- <label data-error="wrong" data-success="right" for="Form-pass1">Masukan Password</label> -->
                <p class="font-small blue-text d-flex justify-content-end mt-2">Lupa <a href="<?=base_url()?>Forgot_password" class="blue-text ml-1">
                    Password?</a></p>
              </div>

              <div class="text-center mb-3">


                <button class="btn btn-theme btn-block" value="login" type="submit">Masuk</button>
            </form>


          </div>
          <!--Footer-->
          <div class="modal-footer mx-5 pt-3 mb-1">
            <p class="mr-5 font-small grey-text d-flex justify-content-end">Belum ada Akun? <a href="<?=base_url()?>Register" class="blue-text ml-1">
                Daftar</a></p>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
  </div>
  <div id="login-page">
    <div class="modal fade" id="elegantModalFormcreateClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" >
        <!--Content-->
        <div class="modal-content form-elegant" style="top: 90px;">
          <!--Header-->
          <div class="modal-header text-center">
            <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Masuk</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!--Body-->
          <div class="modal-body mx-4">

            <!-- Body -->
            <?php
            if (isset($logout_message)) {
              echo "<div class='message'>";
              echo $logout_message;
              echo "</div>";
            }
            ?>
            <?php
            if (isset($message_display)) {
              echo "<div class='message'>";
              echo $message_display;
              echo "</div>";
            }
            ?>
            <?php
            echo "<div class='error_msg'>";
            if (isset($error_message)) {
              echo $error_message;
            }
            //echo validation_errors();
            echo "</div>";
            ?>
            <?php if ($this->session->flashdata('invalid')) { ?>
              <div class="alert alert-danger"> <?= $this->session->flashdata('invalid') ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('success')) { ?>
              <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
            <?php } ?>
            <!--  -->
            <form class="form-login" action="<?= base_url() ?>login/user_login_process/create_class" method="post">
              <div class="md-form mb-3">
                <h5>Email</h5>
                <input type="email" class="form-control validate" name="email" placeholder="Masukkan Email" autofocus required>

                <!-- <label data-error="wrong" data-success="right" for="Form-email1">Masukan email</label> -->
              </div>

              <div class="md-form pb-3">

                <h5>Password</h5>
                <input type="password" class="form-control validate" name="password" placeholder="Masukkan Password" required>
                <!-- <label data-error="wrong" data-success="right" for="Form-pass1">Masukan Password</label> -->
                <p class="mt-2 font-small blue-text d-flex justify-content-end">Lupa <a href="<?=base_url()?>Forgot_password" class="blue-text ml-1">
                    Password?</a></p>
              </div>

              <div class="text-center mb-3">


                <button class="btn btn-theme btn-block" value="login" type="submit">Masuk</button>
            </form>


          </div>
          <!--Footer-->
          <div class="modal-footer mx-5 pt-3 mb-1">
            <p class="font-small grey-text d-flex justify-content-end mr-5">Belum ada Akun? <a href="<?= base_url() ?>Register" class="blue-text ml-1">
                Daftar</a></p>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>

  </div>
  <!-- Modal -->

  <!-- <div class="text-center">
  <a href="" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#elegantModalForm">Launch
    modal Login Form</a>
</div> -->




  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center" style=" text-shadow: 2px 2px darkcyan;">
          <div class="site-logo mr-auto w-25"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" width="150px" height="50px"></a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="<?php echo base_url(); ?>" class="nav-link js-scroll-trigger">Beranda</a></li>
                <li><a href="<?= base_url(); ?>classes" class="nav-link js-scroll-trigger">Kelas</a></li>
                <li><a href="<?= base_url(); ?>workshops" class="nav-link js-scroll-trigger">Workshop</a></li>
              </ul>
            </nav>
           
          </div>


          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-white js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li><a class="nav-link" href="" data-toggle="modal" data-target="#elegantModalForm"><span>Masuk</span></a></li>
                <!-- <li class="nav-link"><a href="<?= base_url() ?>register" ><span>Masuk</span></a></li> -->
                <li class="cta"><a id="hiddendaftar" href="<?= base_url() ?>register" class="nav-link js-scroll-trigger"><span style=" text-shadow: none;">Daftar</span></a></li>

              </ul>
              
            </nav>
            <!-- <a href="#" class="d-inline-block d-lg-none text-black mt-2 mr-2">Login</a> -->
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      </div>

              

    </header>
  </div>

  <script>
  $(document).ready(function(){
    $("header").sticky({topSpacing:0});
  });
</script>

    <?php if ($this->session->flashdata('invalid')) { ?>
      <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript">
        $(window).on('load', function() {
          $('#elegantModalForm').modal('show');
          console.log('ready');
        });
      </script>

    <?php } else if ($this->session->flashdata('success')) { ?>
      <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript">
        $(window).on('load', function() {
          $('#elegantModalForm').modal('show');
          console.log('ready');
        });
      </script>
    <?php } ?>

    <!--------------- nutup navbar kalo di klik mobile ------------->

<script type="text/javascript">    
           $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });
      </script>

<!---- Copy and paste it on anchor tag class=”js-scroll-trigger” as show in video ---->
