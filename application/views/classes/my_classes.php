<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




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
                <img src="<?=base_url()?>/assets/images/17580.jpg">
            </div>
            <div class="row user-left-part">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                            <img src="<?= base_url().'assets/images/'.$val['foto']?>" class="rounded-circle" style="object-fit: cover;">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                            <button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-primary btn-block follow">Gabung Kelas</button> 
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
                                    <h5>Developer</h5>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                    <!-- <a href="/search" class="btn btn-primary btn-block">Buat Kelas</a> -->
                                    <!-- <ul class="list-group">
                                      <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                                      <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                                      <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                                      <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                                      <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
                                    </ul>  -->
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
                                                                    <label>Nama</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= $val['nama']; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>No Telepon</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= $val['no_telepon']; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Deskripsi</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= $val['deskripsi']; ?></p>
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
                                                                    <p>******** <span><i class="fa fa-cog"><a href="#" (click)="clearModal()" data-toggle="modal" data-target="#gantipass"> Ganti</a></i></span></p>
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

    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contact">Kontak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p for="msj">Silahkan Masukan Kode Kelas</p>
                    </div>
                    <div class="form-group">
                        <label for="txtFullname">Kode Kelas</label>
                        <input type="text" id="txtFullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Password Kelas</label>
                        <input type="text" id="txtEmail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtPhone">Konfirmasi Password</label>
                        <input type="text" id="txtPhone" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" (click)="openModal()" data-dismiss="modal">Gabung</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="gantipass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url()?>profile/change_password_action" method="POST">
                        <div class="form-group">
                            <p for="msj">Silahkan Masukan Password Baru Anda</p>
                        </div>
                        <div class="form-group">
                            <label for="txtFullname">Password Lama</label>
                            <input type="password" id="txtFullname" name="old_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="txtEmail">Password Baru</label>
                            <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>
                        <div class="form-group">
                            <label for="txtPhone">Konfirmasi Password</label>
                            <input type="password" id="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" (click)="openModal()" data-dismiss="modal">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<section>
    
    <div class="row mt-5">
      <div class="col">
      	<div class="card card-list">
          <div class="card-body">
            <h2>Kelas Saya</h2>
          </div>
         
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Kelas</th>
                  <th scope="col">Progress</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($kelas as $val) : ?>
                            <tr>
                                <th scope="row"><a class="text-primary"><?= $val['judul_kelas']; ?></a></th>
                                <td> 
                                    <?php $total = 0; $selesai = 0;
                                    foreach ($kegiatan as $val2) {
                                        if ($val['id_kelas'] == $val2['id_kelas']){
                                            $total++; 
                                            if ($val2['status_kegiatan'] == 2) {
                                                $selesai++; 
                                            } 
                                        }
                                    }
                                    if ($total == 0) {
                                        $proses = 0;
                                    }
                                    else {
                                        $proses = ($selesai / $total) * 100; 
                                    }?>
                                    <div class="progress md-progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $proses; ?>%" aria-valuenow="<?= $proses; ?>" aria-valuemin="0"
                                        aria-valuemax="100"><?= $proses; ?>%</div>
                                    </div>
                                </td>
                                <td>
                                    <?php foreach ($status as $val2) : ?>
                                        <?php if ($val['status_kelas'] == $val2['id_status']) : ?>
                                            <?php if ($val2['nama_status'] == "Selesai") : ?>
                                                <span class="badge badge-success"><?= $val2['nama_status'] ?></span>
                                            <?php else : ?>
                                                <span class="badge badge-warning"><?= $val2['nama_status'] ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>" class="btn btn-light">Lihat kelas</a>
                                    <a class="btn btn-dark mr-1" href="<?= base_url()?>classes/update_class/<?= $val['id_kelas'] ?>">Edit Kelas</a>
                                </td>
                            </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer white py-3 d-flex justify-content-between">
            
          </div>
        </div>
      </div>
    </div>



  </section>
</div>
</section>

<script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>
