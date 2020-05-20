<section class="user_dashboard">
<div class="row mt-0">
  <div class="col-lg-12" style="background-color: aquamarine;" >
    <div class="card"> 
    <div class="container my-5 pt-5 pb-3 px-4 z-depth-1">


<!--Section: Block Content-->
<section>

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-md-12 mb-4">

        <h5 class="text-center font-weight-bold mb-4">Dashboard Saya</h5>


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
<section>
    
    <div class="row">
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
                                    <div class="progress md-progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100">50%</div>
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
