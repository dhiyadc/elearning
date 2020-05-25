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
    <form class="form-horizontal" role="form" method="POST" action="">
        <div class="row">
            <div class="col-md-3 mb-3"><h2>Pembayaran</h2><hr></div>
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
                <label for="kelas">Kelas Ingin diikuti</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="form-group">
                        <div class="input-group mb-0 mr-sm-2 mb-sm-0">
                            <label for="">Pemograman Android</label>
                        </div>
                    </div>
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
                <label for="paketkelas">Pilihan Paket</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            </select>
                            <select class="custom-select" id="inputPaket" aria-label="">
                                <option selected>Pilih Paket</option>
                                <option value="1">30 hari - Rp.450.000</option>
                                <option value="2">90 hari - Rp.900.000</option>
                                <option value="3">120 hari - Rp.1.500.000</option>
                                <option value="4">360 hari - Rp.2.000.000</option>
                            </select>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive mb-3">
                <label for="passwordnow">Total Pembayaran</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <label for="">Rp.500.000.00</label>
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
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" id="submit" class="btn btn-primary" style="background-color: red; border-radius: 5px; border-color: white;" required><i class="fa fa-user-plus"></i>Ambil Paket</button>
                <button type="submit" id="submit" class="btn btn-primary" style=" border-radius: 5px; border-color: white;" required><i class="fa fa-user-plus"></i>Kembali</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>
</section>


