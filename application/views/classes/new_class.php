
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  -->
<link href="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<!-- Jumbotron -->
<div class="card-image bannerkelas">
  <div class="text-white text-center rgba-stylish-strong py-5 px-4">
    <div class="py-5">

      <div class="col-lg-6 pb-lg-4 pb-sm-3 ">
      <!-- <h5 class="h5 orange-text"><i class="fa fa-camera-retro"></i>#STAYATHOME</h5> -->
      <h1 class="card-title h2 my-4 py-5">#STAY AT HOME Upgrade Skill</h1>
      <p class="mb-4 pb-2 px-md-5 mx-md-5">Dapatkan Penawaran Kursus terbaik dan pengalaman terbaik disaat Pandemi dan Upgrade diri Kamu! .</p>

      </div>
    </div>
  </div>
</div>
<!-- 
<section class="buatkelas_sec" style="color: black;">
    <div class="row">
        <div class="col">
        <div class="col-lg-12 ml-auto mt-5 mb-4" data-aos="fade-up" data-aos-delay="500">
            <div class="container">
                  <form enctype="multipart/form-data" action="<?= base_url()?>classes/new_class_action" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4 text-center">Buat Kelas</h3>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Kelas</label>
                        <textarea  class="form-control" name="deskripsi" required></textarea>
                    </div>
                    
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Jenis Kelas</label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis" value="1" required onclick="hideHarga()">
                                    <span class="form-check-label">Gratis</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis" value="2" onclick="showHarga()">
                                    <span class="form-check-label">Berbayar</span>
                                </label>
                            </div>
                          
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-md-4">
                                <label>Kategori Kelas</label>
                                <select name="kategori">
                                    <?php foreach ($kategori as $val) : ?>
                                        <option class="col-md-4" value="<?= $val['id_kategori']; ?>"><?= $val['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                    </div>
                    <div class="form-group mb-3">
                        <div id="showHideHarga" style="display: none">
                            <label>Harga Kelas</label>
                            <input type="text" id="rupiah" class="form-control" name="harga" placeholder="Masukkan nominal..." >
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Poster Kelas</label>
                        <input type="file" name="poster" accept=".png, .jpg, .jpeg" class="form-control-file" required id="exampleFormControlFile1">
                    </div>
                    <div id="kegiatan_field">
                        <div class="form-group">
                            <button type="button" name="add" id="add" class="btn btn-primary">Tambah Kegiatan</button>
                        </div>
                    </div>
                    <div class="form-group text-center">
                      <input type="submit" class="btn btn-dark btn-pill" value="Buat Kelas">
                      <input type="submit" class="btn btn-light btn-pill" value="Back">
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</section> -->

<div class="container">
    <form enctype="multipart/form-data" action="<?= base_url()?>classes/new_class_action" method="post" class="form-horizontal">
        <div class="row">
            <div class="col-md-3 mb-3 mt-5"><h2>Buat Kelas</h2><hr></div>
            <div class="col-md-6">
                
            
            </div>
        </div>

        <?php if($this->session->flashdata("invalidImage")){ ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata("invalidImage"); ?>
        </div>
        <?php } ?>
        
        <div class="row">
            <div class="col-md-3 field-label-responsive mb-3">
                <label for="passwordnow">Nama Author</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <label for=""><?= $pembuat['nama']; ?></label>
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
                <label for="passwordnow">Poster Kelas (max. 3 MB)</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input type="file" name="poster" accept=".png, .jpg, .jpeg" class="form-control-file" required id="exampleFormControlFile1">
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
                <label for="namaclasss">Nama Kelas</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                      
                        <input type="text" name="judul" class="form-control" id="nameclass"
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
                <label for="password">Kategori Kelas</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <select name="kategori">
                                    <?php foreach ($kategori as $val) : ?>
                                        <option class="col-md-4" value="<?= $val['id_kategori']; ?>"><?= $val['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                            </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="newpassword1">Jenis Kelas</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                             <div class="col-md-4">
                                
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis" value="1" required onclick="hideHarga()">
                                    <span class="form-check-label">Gratis</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis" value="2" onclick="showHarga()">
                                    <span class="form-check-label">Berbayar</span>
                                </label>
                            </div>
                </div>
            </div>
        </div> -->
        <div id="showHideHarga" style="display: none">
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">Harga Kelas</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <input type="text" id="rupiah" class="form-control" name="harga" placeholder="Masukkan nominal..." >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Deskripsi Kelas</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <textarea  class="form-control" name="deskripsi" required style="height: 200px;"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Jadwal Kelas</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div id="kegiatan_field">
                        <div class="form-group">
                            <button type="button" name="add" id="add" class="btn btn-primary" style="background-color: darkcyan;">Tambah Jadwal</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i>Buat Kelas</button>
                <button type="submit" class="btn btn-blue-gradient"></i>Kembali</button>
            </div>
        </div>
    </form>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
    $(document).ready(function(){      
        var i=1;  
        // $('#add').click(function(){  
        //     i++;  
        //     var txt1 = '<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="addmore[][deskripsi_kegiatan]" placeholder="Deskripsi Kegiatan" /></td><td><div class="input-group date form_datetime col-md-3" data-date-format="dd MM yyyy - hh:ii" data-link-field="dtp_input1"><input class="form-control" name="addmore[][tanggal_kegiatan]" size="16" type="text"readonly><span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden" id="dtp_input1"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>';
    
        //     $('#kegiatan_field2').append(`'<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="addmore[][deskripsi_kegiatan]" placeholder="Deskripsi Kegiatan" /></td>
        //     <td><div class="input-group date form_datetime col-md-3" data-date-format="dd MM yyyy - hh:ii" data-link-field="dtp_input1"><input class="form-control" name="addmore[][tanggal_kegiatan]" size="16" type="text"readonly>
        //     <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span>
        //     </span></div><input type="hidden" id="dtp_input1"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'`);
            
        // });

        $(document).on('click', '#add', function(){
            
            i++;  
            var txt1 = '<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="addmore[][deskripsi_kegiatan]" placeholder="Deskripsi Kegiatan" /></td><td><div class="input-group date form_datetime col-md-3" data-date-format="dd MM yyyy - hh:ii" data-link-field="dtp_input1"><input class="form-control" name="addmore[][tanggal_kegiatan]" size="16" type="text"readonly><span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden" id="dtp_input1"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>';
           
            $('#kegiatan_field').append(`<div id="row`+i+`">
            <div class="form-group">
                <label>Deskripsi Kegiatan</label>
                <textarea class="form-control" name="addmore[][deskripsi_kegiatan]" placeholder="Deskripsi Singkat..." required></textarea>
            </div>
            <div class="form-group">
                <label>Jadwal Kegiatan</label>
                <div class="input-group date form_datetime " data-date-format="yyyy/mm/dd hh:ii" data-link-field="dtp_input1">
                    <input class="form-control" id="inputdatetimepicker" size="16" type="text" name="addmore[][tanggal_kegiatan]" readonly required">
                    <span class="input-group-addon" style="width:40px;"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon" style="width:40px;"><span class="glyphicon glyphicon-th"></span></span>
                </div>
            </div>
            <input type="hidden" id="dtp_input1"/>
            <div class="form-group text-right">
                <button type="button" name="remove" id="`+i+`" class="btn btn-danger btn_remove">X</button>
            </div>

            </div>`);

            $(".form_datetime").datetimepicker({
                language: 'id',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 0
            });
        });

        $(document).ready(function() {
            $("#formButton").click(function() {
                $("#form1").toggle();
            });
        });
        
        $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
            });  
        });  

        function showHarga() {
            var x = document.getElementById("showHideHarga");
            if (x.style.display === "none") {
                x.style.display = "block";
            }
        }

        function hideHarga() {
            var x = document.getElementById("showHideHarga");
            x.style.display = "none";
        }

        $('.form_datetime').datetimepicker({
            language: 'id',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 0
        });

</script>
<script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
