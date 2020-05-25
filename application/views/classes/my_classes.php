<meta name="viewport" content="width=device-width, initial-scale=1">


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


  

 
<div class="container my-5">


    <!-- <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contact">Gabung Kelas</h5>
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
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" (click)="openModal()" data-dismiss="modal">Gabung</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div> -->



    
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
                                <th scope="row" style="width: 300px;"><a class="text-primary"><?= $val['judul_kelas']; ?></a></th>
                                <td style="padding-top: 20px;"> 
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
                                <td style="padding-top: 20px;"> 
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
                                <td style="padding-top: 20px;"> 
                                <div class="buttonclass">
                                    <a href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>" class="btn btn-light">Lihat kelas</a>
                                    <a class="btn btn-dark mr-1" href="<?= base_url()?>classes/update_class/<?= $val['id_kelas'] ?>">Edit Kelas</a>
                                </td>
                                </div>
                            </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer white py-3 d-flex justify-content-center">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
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
              <?php foreach ($seluruh_kelas as $val) : ?>
                    <?php foreach ($peserta as $val2) : ?>
                        <?php if ($val2['id_kelas'] == $val['id_kelas'] && $val2['id_user'] == $this->session->userdata('id_user')) : ?>
                            <tr>
                                <th scope="row" style="width: 300px;"><a class="text-primary"><?= $val['judul_kelas']; ?></a></th>
                                <td style="padding-top: 20px;"> 
                                <?php $total = 0; $selesai = 0;
                                foreach ($kegiatan as $val3) {
                                  if ($val2['id_kelas'] == $val3['id_kelas']){
                                    $total++; 
                                    if ($val3['status_kegiatan'] == 2) {
                                      $selesai++; 
                                    } 
                                  }
                                }
                                $proses = ($selesai / $total) * 100; ?>
                                    <div class="progress md-progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $proses; ?>%" aria-valuenow="<?= $proses; ?>" aria-valuemin="0"
                                        aria-valuemax="100"><?= $proses; ?>%</div>
                                    </div>
                                </td>
                                <td style="padding-top:20px">
                                    <?php foreach ($status as $val3) : ?>
                                        <?php if ($val['status_kelas'] == $val3['id_status']) : ?>
                                            <?php if ($val3['nama_status'] == "Selesai") : ?>
                                                <span class="badge badge-success"><?= $val3['nama_status'] ?></span>
                                            <?php else : ?>
                                                <span class="badge badge-warning"><?= $val3['nama_status'] ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                  <div class="buttonclass">
                                    <a href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>" class="btn btn-light">Lihat kelas</a>
                                    <a href="<?= base_url()?>classes/leave_class/<?= $val['id_kelas'] ?>" class="btn btn-danger">Tinggalkan</a>
                                  </div>
                                  </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer white py-3 d-flex justify-content-center">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
          </div>
        </div>
      </div>
    </div>




</div>
</section>

<script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>
