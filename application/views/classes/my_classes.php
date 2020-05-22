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

    <div class="row mt-5">
      <div class="col">
      	<div class="card card-list">
          <div class="card-body">
            <h2>Progress Belajar</h2>
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
