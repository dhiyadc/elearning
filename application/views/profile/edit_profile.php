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

        <h5 class="text-center font-weight-bold mb-4" style="color: white">Pengaturan Akun</h5>


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
<?php foreach ($profile as $val) : ?>
<div class="container">
    <form enctype="multipart/form-data" action="<?= base_url()?>profile/edit_profile_action" method="POST" class="form-horizontal">
        <div class="row">
            <div class="col-md-3 mb-3"><h2>Edit Profile</h2><hr></div>
            <div class="col-md-6">
                
            
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive mb-3">
                <label for="passwordnow">Email User</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <label for=""><?= $val['email']; ?></label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put name validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive mb-3">
                <label for="passwordnow">Foto Profile</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input type="file" name="foto" accept=".png, .jpg, .jpeg" class="form-control-file">
                    <input type="hidden" name="old_image" value="<?= $val['foto'] ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="newpassword">Nama</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                      
                        <input type="text" name="nama" value="<?= $val['nama']; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="newpassword">No. Telepon</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                      
                        <input type="text" name="no_telp" value="<?= $val['no_telepon']; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="newpassword">Bio</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                      <textarea name="deskripsi"cols="30" rows="5" class="form-control"><?= $val['deskripsi']; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <input type="submit" class="btn btn-primary" value="Edit Profile">
            </div>
        </div>
    </form>
</div>
<?php endforeach; ?>
</div>
</section>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>