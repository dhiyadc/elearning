<meta name="viewport" content="width=device-width, initial-scale=1">


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="container">


       
<h1> </i>Quiz 1</h1>
    <!--  <small> - klik untuk melihat detail</small> -->
<hr>
    
<table class="table table-hover">
  <thead>
    <tr>
      
      <th>Nama</th>
      <th>Status</th>
      <th>Detail Tugas</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td> <a href="<?= base_url()?>classes/mentortugas"> Della Okta Ameli Ahh</a></td>
      <td>Siswa</td>
      <td>Belum Diserahkan</td>
      <td><a href="<?= base_url()?>classes/mentortugas">Lihat Tugas</td>
    </tr>
    <tr>
      
      <td>Arya Senyum Manis</td>
      <td>Siswa</td>
      <td>Diserahkan</td>
      <td><a href="<?= base_url()?>classes/mentortugas">Lihat Tugas</td>
    </tr>
    <tr>
     
      <td >Dice Polos Bangets</td>
      <td>Siswa</td>
      <td>Diserahkan</td>
      <td><a href="<?= base_url()?>classes/mentortugas">Lihat Tugas</a></td>
    </tr>
    
            
  </tbody>
</table>  

<div class="col-sm-12 ">
    <div class="result pull-left"><strong>3 Dari 50 Siswa</strong></div>

    <ul class="pagination pull-right">
      <li><a href="#">«</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">»</a></li>
    </ul>       
    
</div>


    
</div>

<!-- Modal -->
      
<!-- fim Modal-->    
    </div>
  </div>
</div>

<!-- Small modal -->


<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>
    <!-- Modal -->


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

        <h5 class="text-center font-weight-bold mb-4" style="color: white">Kelas Saya</h5>
        <div class="container my-5">


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



<!-- Nav tabs -------------- -->
<ul style="list-style: outside none none;" class="nav nav-tabs" role="tablist">
    
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true" style="font-size: 22px;">Tugas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-expanded="false" style="font-size: 22px;">Quiz</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-expanded="false" style="font-size: 22px;">Anggota</a>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-expanded="false" style="font-size: 22px;">Nilai</a>
    </li>   -->
</ul>
 
<!-- Tab panes -------------- -->
<div class="tab-content">
    <div class="tab-pane active" id="tab1" role="tabpanel" aria-expanded="true">

    <section class="projects no-padding-top">
    <div class="container">
      <!-- Project-->
      <div class="project">
        <div class="row bg-white has-shadow">
          <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
            <div class="project-title d-flex align-items-center">
              <div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
              <div class="text">
              <a href="<?= base_url()?>classes/mentortugas"><h3 class="h4" style="font-size: 20px;">Latihan 1</h3><small>PTI</small></a>
              </div>
            </div>
            <!-- <div class="project-date"><span class="hidden-sm-down">Hari Ini pada 4:24 AM</span></div> -->
          </div>
          <div class="right-col col-lg-6 d-flex align-items-center">
            
        
            <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
            <div class="project-progress">
              <div class="time">
                <div class="nilai">1/100 Siswa</span></div>
              
              </div>
            </div>
            <div class="time"><i class="fa fa-clock-o"></i>Tenggat Kam 12:00  </div>
          </div>
        </div>
      </div>
      <!-- Project-->
      <div class="project">
        <div class="row bg-white has-shadow">
          <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
            <div class="project-title d-flex align-items-center">
              <div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
              <div class="text">
                <h3 class="h4" style="font-size: 20px;">Latihan 2</h3><small>PTI</small>
              </div>
            </div>
            <!-- <div class="project-date"><span class="hidden-sm-down">Hari Ini pada 4:24 AM</span></div> -->
          </div>
          <div class="right-col col-lg-6 d-flex align-items-center">
            
        
            <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
            <div class="project-progress">
            <div class="nilai">1/50 Siswa</span></div>
            </div>
            <div class="time"><i class="fa fa-clock-o"></i>Tenggat Kam 12:00  </div>
          </div>
        </div>
      </div>
      <!-- Project-->
      <div class="project">
        <div class="row bg-white has-shadow">
          <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
            <div class="project-title d-flex align-items-center">
              <div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
              <div class="text">
                <h3 class="h4" style="font-size: 20px;">Latihan 3</h3><small>PTI</small>
              </div>
            </div>
            <!-- <div class="project-date"><span class="hidden-sm-down">Hari Ini pada 4:24 AM</span></div> -->
          </div>
          <div class="right-col col-lg-6 d-flex align-items-center">
            
        
            <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
            <div class="project-progress">
            <div class="nilai">0/100 Siswa</span></div>
            </div>
            <div class="time"><i class="fa fa-clock-o"></i>Tenggat Kam 12:00  </div>
          </div>
        </div>
      </div>
      <!-- Project-->
      <div class="project">
        <div class="row bg-white has-shadow">
          <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
            <div class="project-title d-flex align-items-center">
              <div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
              <div class="text">
                <h3 class="h4" style="font-size: 20px;">Latihan 4</h3><small>PTI</small>
              </div>
            </div>
            <!-- <div class="project-date"><span class="hidden-sm-down">Hari Ini pada 4:24 AM</span></div> -->
          </div>
          <div class="right-col col-lg-6 d-flex align-items-center">
            
        
            <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
            <div class="project-progress">
            <div class="nilai">0/100 siswa</span></div>
            </div>
            <div class="time"><i class="fa fa-clock-o"></i>Tenggat Kam 12:00  </div>
          </div>
        </div>
      </div>
    </section>
    
</div>

<div class="tab-pane" id="tab2" role="tabpanel" aria-expanded="false">
                      
<section class="projects no-padding-top">
<div class="container">
  <!-- Project-->
  <div class="project">
    <div class="row bg-white has-shadow">
      <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
        <div class="project-title d-flex align-items-center">
          <div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
          <div class="text">
            <a href=""data-toggle="modal" data-target=".bd-example-modal-lg"><h3 class="h4" style="font-size: 20px;">Quiz 1</h3><small>PTI</small></a>
          </div>
        </div>
        <!-- <div class="project-date"><span class="hidden-sm-down">Hari Ini pada 4:24 AM</span></div> -->
      </div>
      <div class="right-col col-lg-6 d-flex align-items-center">
        
     
        <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
        <div class="project-progress">
          <div class="time">
            <div class="nilai">0/100 Siswa</span></div>
           
          </div>
        </div>
        <div class="time"><i class="fa fa-clock-o"></i>Tenggat Jum 12:00  </div>
      </div>
    </div>
  </div>
 
</section>
</div>

<div class="tab-pane" id="tab3" role="tabpanel" aria-expanded="false">
                      
<section class="projects no-padding-top">
<div class="container">
  <!-- Project-->
  <div class="project">
    <div class="row bg-white has-shadow">
      <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
        <div class="project-title d-flex align-items-center">
          <div class="image has-shadow"><img src="<?php echo base_url(); ?>assets/images/task.png" alt="..." class="img-fluid rounded-circle"></div>
          <div class="text">
            <h3 class="h4" style="font-size: 20px;">Quiz 4</h3><small>PTI</small>
          </div>
        </div>
        <!-- <div class="project-date"><span class="hidden-sm-down">Hari Ini pada 4:24 AM</span></div> -->
      </div>
      <div class="right-col col-lg-6 d-flex align-items-center">
        
     
        <!-- <div class="comments"><i class="fa fa-comment-o"></i>20</div> -->
        <div class="project-progress">
          <div class="time">
            <div class="nilai">0/100 Siswa</span></div>
           
          </div>
        </div>
        <div class="time"><i class="fa fa-clock-o"></i>Tenggat Jum 12:00  </div>
      </div>
    </div>
  </div>
 
</section>
</div>
     
   
    
</div>


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



    
    
    </div>

    




</div>
</section>

<script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>

<script>
    $(function () {
    /* BOOTSNIPP FULLSCREEN FIX */
    if (window.location == window.parent.location) {
        $('#back-to-bootsnipp').removeClass('hide');
        $('.alert').addClass('hide');
    } 
    
    $('#fullscreen').on('click', function(event) {
        event.preventDefault();
        window.parent.location = "http://bootsnipp.com/iframe/Q60Oj";
    });
    
    $('tbody > tr').on('click', function(event) {
        event.preventDefault();
        $('#myModal').modal('show');
    })
    
    $('.btn-mais-info').on('click', function(event) {
        $( '.open_info' ).toggleClass( "hide" );
    })
    
     
});
</script>