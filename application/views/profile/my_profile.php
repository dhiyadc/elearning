<section class="user_dashboard">
<div class="row mt-0">
  <div class="col-lg-12" style="background-color: aquamarine;" >
    <div class="card" style="border-radius: 0px; background-color: darkcyan;"> 
    <div class="container my-5 pt-5 pb-3 px-4 z-depth-1">


<!--Section: Block Content-->
<section>

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-md-12 mb-4">

        <h5 class="text-center font-weight-bold mb-4" style="color: white">Dashboard Saya</h5>


      </div>
      <!--Grid column-->

      
    </div>
    <!--Grid row-->

  </section>
  <!--Section: Block Content-->


</div>
    </div>
  </div>
</div>


  
</div>
 
<div class="container my-5">

<div class="container main-secction">
  <div class="profileuser">
    <?php foreach ($profile as $val) : ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                <img src="<?=base_url()?>/images/17580.jpg">
            </div>
            <div class="row user-left-part">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <?php if ($val['foto'] == null) : ?>
                            <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                                <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" class="rounded-circle">
                            </div>
                        <?php else : ?>
                            <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                                <img src="<?= base_url().'assets/images/'.$val['foto']?>" class="rounded-circle" style="object-fit: cover;">
                            </div>
                        <?php endif; ?>
                        <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                            <!-- <button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="" class="btn btn-primary btn-block follow">Gabung Kelas</button>  -->
                            <a href="<?=base_url()?>profile/edit_profile" class="btn btn-primary btn-block follow" style= "color: white;">Edit Profile</a></button>   
                            <a href="<?=base_url()?>classes/new_class" class="btn btn-block" style="background-color: darkcyan; color: white;">Buat Kelas</a></button>   
                                                        
                        </div>
                     
                       
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                    <h1>User</h1>
                                    <h5>Pengguna</h5>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                        <ul class="nav nav-tabs" role="tablist" style="font-weight: bolder;">
                                                <li class="nav-item">
                                                  <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fa fa-user-circle"></i> Data Pribadi</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fa fa-info-circle"></i> Data Akun</a>
                                                </li>                                                
                                              </ul>
                                              
                                              <!-- Tab panes -->
                                              <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade show active" id="profile" style="margin-top: 20px;">
                                                        <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>ID</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>509230671</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Nama</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= $val['nama']; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Email</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= $val['email']; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Kontak</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= $val['no_telepon']; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Bio</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= $val['deskripsi']; ?></p>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="buzz" style="margin-top: 20px;">
                                                        <div class="row">
                                                            <?php $total_diikuti = 0;
                                                            foreach ($peserta as $val2) {
                                                                if ($val2['id_user'] == $this->session->userdata('id_user')) {
                                                                    $total_diikuti++;
                                                                }
                                                            } ?>
                                                                <div class="col-md-6">
                                                                    <label>Kelas Diikuti</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= $total_diikuti; ?> Kelas</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Total Kelas Dibuat</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= count($kelas); ?> Kelas</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Email Akun</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p class="hidden"><?= $val['email']; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Password</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>******** <span><i class="fa fa-cog"><a href="<?= base_url(); ?>profile/change_password" data-target="#gantipass"> Ganti</a></i></span></p>
                                                                </div>
                                                            </div>
                                                </div>
                                                
                                              </div>
                          
                                </div>
                                <div class="col-md-4 img-main-rightPart">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row image-right-part">
                                                <div class="col-md-6 pull-left image-right-detail">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="http://camaradecomerciozn.com/">
                                            
                                        </a>
                                        <div class="col-md-12 image-right-detail-section2">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
</div>
</section>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>