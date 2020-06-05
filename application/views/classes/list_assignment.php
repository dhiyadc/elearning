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
    <div class="row mt-5">
      <div class="col">
      	<div class="card card-list">
          <div class="card-body">
            <h2>Tugas Kelas</h2>
          </div>
         
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Judul</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Deadline</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tugas as $val) : ?>
                            <tr>
                                <th scope="row" style="width: 300px;"><a class="text-primary"><?= $val['judul_tugas']; ?></a></th>
                                <th scope="row" style="width: 300px;"><?= $val['deskripsi_tugas']; ?></th>
                                <td style="padding-top: 20px;"> 
                                    <?php if ($val['kategori'] == "Tugas") : ?>
                                        <span class="badge badge-success"><?= $val['kategori'] ?></span>
                                    <?php else : ?>
                                        <span class="badge badge-primary"><?= $val['kategori'] ?></span>
                                    <?php endif; ?>
                                </td>
                                <td scope="row" style="width: 300px;"><?= $val['deadline']; ?></td>
                                <td style="padding-top: 20px;"> 
                                    <div class="buttonclass">
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#editKegiatan<?= $val['id_tugas']; ?>">Kumpul</button>
                                        <div class="modal fade" id="editKegiatan<?= $val['id_tugas']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 90px;">
                                            <div class="modal-dialog" role="document">
                                            <!--Content-->
                                            <div class="modal-content form-elegant">
                                                <!--Header-->
                                                <div class="modal-header text-center">
                                                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Kumpul Tugas</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <!--Body-->
                                                <div class="modal-body mx-4">
                                                <!--Body-->
                                                <?php if ($this->session->flashdata('failedInputFile')) : ?>
                                                    <div class="alert alert-danger"> <?= $this->session->flashdata('failedInputFile') ?> </div>
                                                <?php endif; ?>
                                                <form enctype="multipart/form-data" action="<?= base_url() ?>classes/collect_assignment/<?= $val['id_kelas'] ?>/<?= $val['id_tugas'] ?>" method="POST">
                                                    <div class="form-group">
                                                        <label>Subjek Tugas</label>
                                                        <input type="text" class="form-control" name="subjek" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>File Tugas</label>
                                                        <input type="file" class="form-control" name="assignment" accept=".pdf, .doc, .docx" required>
                                                    </div>
                                                        <!-- <iframe src="<?= base_url() ?>assets/docs/BAB_II.docx" type="application/docx"></iframe> -->
                                                <div class="text-center mb-3">
                                                    <input type="submit" class="btn btn-light blue-gradient btn-block btn-rounded z-depth-1a" value="Kumpul">
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
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