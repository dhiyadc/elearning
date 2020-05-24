<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.png">
	  <title>El-Learn.</title>
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    
    
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    


  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contact">Info Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <p for="msj">Info Kelas</p> -->

                    </div>
                  <div class="row">
                      <div class="col-md-4">
                          <label>Nama Kelas</label>
                      </div>
                      <div class="col-md-6">
                          <p>Pemograman Dasar</p>
                      </div>
                  </div>
                  
                  <div class="row">
                      <div class="col-md-4">
                          <label>Mulai</label>
                      </div>
                      <div class="col-md-6">
                          <p>14.00-16.00</p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                          <label>Nama Author</label>
                      </div>
                      <div class="col-md-6">
                          <p>Arya Pradata</p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                          <label>Status Kelas</label>
                      </div>
                      <div class="col-md-6">
                      <span class="badge badge-warning">Sedang Berlangsung</span>
                      </div>
                  </div>
                   
                   
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url(); ?>Iframe" class="btn btn-primary">Gabung</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    
                    <!-- <a href="" class="btn btn-primary">Gabung</a> -->
                </div>
            </div>
        </div>
    </div>

  
  
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
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" width="200px"></a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="<?php echo base_url(); ?>" class="nav-link">Beranda</a></li>
                <li><a href="<?= base_url(); ?>classes" class="nav-link">Kelas</a></li>
                <li><a href="<?= base_url(); ?>classes/my_classes" class="nav-link">Akademik</a></li>
               
              </ul>
            </nav>
          </div>

          
          <!-- <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-white js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                
                <li class="cta" ><a href="<?php echo base_url(); ?>login/logout" class="nav-link"><span>Keluar</span></a></li>
              </ul>
            </nav>
           
          </div> -->
          
          


          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-white js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
              
              <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" id="notifis" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i>
                      
                    </a>
                    <div class="notif">
                    <ul class="dropdown-menu">
                      <li class="head text-light" style="background-color: forestgreen;">
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-12">
                            <span>Pemberitahuan (3)</span>
                            <a href="" class="float-right text-light">Tandai Semua sudah Dibaca</a>
                          </div>
                      </li>
                      <li class="notification-box">
                        <div class="row">
                          <div class="col-lg-3 col-sm-3 col-3 text-center">
                            <img src="<?php echo base_url(); ?>assets/images/gambar1.png" class="w-100 rounded-circle">
                          </div>    
                          <div class="col-lg-8 col-sm-8 col-8">
                            <strong class="text-info">David John</strong>
                            <div><a href="#" (click)="clearModal()" data-toggle="modal" data-target="#contact">Kelas Pemograman Android Sedang Dimulai</a>
                          
                            </div>
                            <small class="text-warning">27.11.2015, 15:00</small>
                          </div>    
                        </div>
                      </li>
                      <li class="notification-box bg-gray">
                        <div class="row">
                          <div class="col-lg-3 col-sm-3 col-3 text-center">
                            <img src="<?php echo base_url(); ?>assets/images/gambar1.png" class="w-100 rounded-circle">
                          </div>    
                          <div class="col-lg-8 col-sm-8 col-8">
                            <strong class="text-info">David John</strong>
                            <div>
                            <div><a href="#" (click)="clearModal()" data-toggle="modal" data-target="#contact">Kelas Pemograman Java Sedang Dimulai</a>
                            </div>
                            <small class="text-warning">27.11.2015, 15:00</small>
                          </div>    
                        </div>
                      </li>
                      <li class="notification-box">
                        <div class="row">
                          <div class="col-lg-3 col-sm-3 col-3 text-center">
                            <img src="<?php echo base_url(); ?>assets/images/gambar1.png" class="w-100 rounded-circle">
                          </div>    
                          <div class="col-lg-8 col-sm-8 col-8">
                            <strong class="text-info">David John</strong>
                            <div>
                            <div><a href="#" (click)="clearModal()" data-toggle="modal" data-target="#contact">Kelas Maling Sedang Dimulai</a>
                            </div>
                            <small class="text-warning">27.11.2015, 15:00</small>
                          </div>    
                        </div>
                      </li>
                      <li class="footer text-center" style="background-color: forestgreen;">
                        <a href="" class="text-light">View All</a>
                      </li>
                    </ul>
                    </div>
                </li> 
            
                
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Hi,User
                      <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default"
                      aria-labelledby="navbarDropdownMenuLink-333">
                      <a class="dropdown-item" href="<?= base_url(); ?>profile">Profile</a>
                      <a class="dropdown-item" href="<?= base_url(); ?>profile/change_password">Ubah Password</a>
                      <a class="dropdown-item" href="<?= base_url(); ?>login/logout" style="color: cornflowerblue;">Keluar</a>
                    </div>
                </li>
              </ul>
            </nav>
           
          </div>

        </div>
      </div>

    
      
    </header>
