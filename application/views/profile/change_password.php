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

<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="<?= base_url()?>profile/change_password_action">
        <div class="row">
            <div class="col-md-3 mb-3"><h2>Ganti Password</h2><hr></div>
            <div class="col-md-6">
                
            
            </div>
        </div>
        <?php if($this->session->flashdata('invalid_pass')){ ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('invalid_pass'); ?>
        </div>
        <?php } ?>

        <?php if($this->session->flashdata('pass')){ ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('pass'); ?>
        </div>
        <?php } ?>

        <?php if($this->session->flashdata('same_pass')){ ?>
        <div class="alert alert-warning" role="alert">
            <?= $this->session->flashdata('same_pass'); ?>
        </div>
        <?php } ?>
        
        <div class="row">
            
            <div class="col-md-3 field-label-responsive mb-3">
                <label for="passwordnow">Email User</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <label for=""><?= $_SESSION['email']; ?></label>
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
            <div class="col-md-3 field-label-responsive">
                <label for="newpassword">Password Sekarang</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                      
                        <input type="password" name="old_password" class="form-control" id="newpassword"
                               placeholder="" required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put e-mail validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="newpassword1">Password Baru</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        
                        <input type="password" id="password" name="password" class="form-control" 
                               placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <!-- <span class="text-danger align-middle">
                            <i class="fa fa-close"> Sandi Anda tidak cocok</i>
                        </span> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Konfirmasi Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                      
                        <input id="password2" type="password" name="password2" class="form-control"
                               placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password doesn't match" onkeyup="matchFunc()" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" id="submit" class="btn btn-primary">Ubah Password</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>
</section>


