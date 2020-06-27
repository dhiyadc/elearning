<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.png">
	  <title>Classico</title>
    
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
    
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    
    <style>
/* .notification {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
} */

/* .notification:hover {
  background: red;
} */

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 10%;
  background-color: red;
  color: white;
}
</style>

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <!-- <div class="modal fade" id="#" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="#">Info Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p for="msj">Info Kelas</p>

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
                    
                    <a href="" class="btn btn-primary">Gabung</a>
                </div>
            </div>
        </div>
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
          <div class="site-logo mr-auto w-20"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" width="150px" height="50px"></a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="<?php echo base_url(); ?>" class="nav-link">Beranda</a></li>
                <li><a href="<?= base_url(); ?>classes" class="nav-link">Kelas</a></li>
                <li><a href="<?= base_url(); ?>workshops" class="nav-link">Workshop</a></li>
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
          
          

          <div class="ml-auto w-20">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-white js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
              
              <li class="nav-item dropdown ">
                <?php if ((count($notif)+count($notif2)) == 0) : ?>
                    <a class="nav-link dropdown-toggle notification" id="notifis" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i>
                    </a>
                <?php else : ?>
                    <a class="nav-link dropdown-toggle notification" id="notifis" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge"><?= count($notif)+count($notif2); ?></span>
                    </a>
                <?php endif; ?>
                  <div class="notif" aria-labelledby="notifis">
                    <ul class="dropdown-menu">
                      <li class="head text-light" style="background-color: forestgreen;">
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-12">
                            <span>Pemberitahuan Workshop (<?= count($notif2)?>)</span>
                          </div>
                      </li>
                      <?php if (count($notif2) != null) : ?>
                      <?php $i = 0; ?>
                      <?php foreach ($notif2 as $val) : ?>
                        <?php if ($val[$i]['status_kegiatan'] == CLASS_STARTED) : ?>
                          <li class="notification-box">
                            <div class="row">
                              <div class="col-md-3 text-center">
                                <img src="<?php echo base_url(); ?>assets/images/<?= $val[$i]['poster_workshop']; ?>" class="rounded-circle" style="object-fit: cover;height: 60px; width: 60px;">
                              </div>
                              <div class="col-md-8" style="text-shadow: 0px 0px white;">
                                <strong class="text-info"><?= $val[$i]['nama']; ?></strong>
                                <div>
                                  <a href="<?= base_url('class/') ?><?= $val[$i]['id_workshop'] ?>/<?= $val[$i]['id_kegiatan']; ?>"><b>Workshop</b> "<?= $val[$i]['judul_workshop']; ?>" Sedang Dimulai</a>
                                </div>
                                <small class="text-warning"><?= $val[$i]['tanggal']; ?></small>
                                <br>
                                <small class="text-error">(Workshop)</small>
                              </div>    
                            </div>
                          </li>
                        <?php endif; ?>
                      <?php $i++; ?>
                      <?php endforeach; ?>

                      <?php else : ?>
                        <li class="notification-box">

                        <p style="text-align: center; margin-top: 10px; text-shadow: 0px 0px white;">Tidak Ada Notifikasi</p>

                        </li>
                      <?php endif; ?>

                      
                      <li class="head text-light" style="background-color: forestgreen;">
                        <div class="row">
                      <div class="col-lg-12 col-sm-12 col-12">
                            <span>Pemberitahuan Kelas (<?=count($notif); ?>)</span>
                          </div>
                          <?php if (count($notif) != null) : ?>
                      <?php $j = 0?>
                      <?php foreach ($notif as $val) : ?>
                        <?php if ($val[$j]['status_kegiatan'] == CLASS_STARTED) : ?>
                          <li class="notification-box">
                            <div class="row">
                              <div class="col-md-3 text-center">
                                <img src="<?php echo base_url(); ?>assets/images/<?= $val[$j]['poster_kelas']; ?>" class="rounded-circle" style="object-fit: cover;height: 60px; width: 60px;">
                              </div>
                              <div class="col-md-8" style="text-shadow: 0px 0px white;">
                                <strong class="text-info"><?= $val[$j]['nama']; ?></strong>
                                <div>
                                  <a href="<?= base_url('class/') ?><?= $val[$j]['id_kelas'] ?>/<?= $val[$j]['id_kegiatan']; ?>"><b>Kelas</b> "<?= $val[$j]['judul_kelas']; ?>" Sedang Dimulai</a>
                                </div>
                                <small class="text-warning"><?= $val[$j]['tanggal']; ?></small>
                                <br>
                                <small class="text-error">(Kelas)</small>
                              </div>    
                            </div>
                          </li>
                        <?php endif; ?>
                      <?php $j++; ?>
                      <?php endforeach; ?>
                      <?php else : ?>
                        <li class="notification-box">

                        <p style="text-align: center; margin-top: 10px; text-shadow: 0px 0px white;">Tidak Ada Notifikasi</p>

                        </li>

                      <?php endif; ?>
                      <li class="footer text-center" style="background-color: forestgreen;">
                        <a href="<?php echo base_url(); ?>classes/my_classes" class="text-light">View All</a>
                      </li>
                    </ul>
                    </div>
                </li> 
            
                
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Hi, <?= $nama[0]; ?> <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default"
                      aria-labelledby="navbarDropdownMenuLink-333" style="text-shadow: 0px 0px white;">
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
