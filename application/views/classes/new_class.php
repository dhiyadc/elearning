<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Kelas Baru</title>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <link href="<?= base_url() ?>assets/datetimepicker/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>

<body>
    <form enctype="multipart/form-data" action="<?= base_url()?>classes/new_class_action" method="post">
        Judul: <input type="text" name="judul" required><br>
        Deskripsi: <input type="text" name="deskripsi" required><br>
        <label>Kategori: </label>
        <select name="kategori">
            <?php foreach ($kategori as $val) : ?>
                <option value="<?= $val['id_kategori']; ?>"><?= $val['nama_kategori']; ?></option>
            <?php endforeach; ?>
        </select><br>
        Poster: <input type="file" name="poster" accept=".png, .jpg, .jpeg" required><br>
        <label>Jenis: </label><br>
        <input type="radio" name="jenis" value="1" onclick="hideHarga()">
        <label for="vehicle1">Gratis</label><br>
        <input type="radio" name="jenis" value="2" onclick="showHarga()">
        <label for="vehicle2">Berbayar</label><br>
        <div id="showHideHarga" style="display: none">
            Harga: <input type="text" name="harga" placeholder="Harga kelas anda...">
        </div>
        <br>
        <p id="formButton" class="btn btn-success">Tambah Kegiatan</p>
        <div id="form1" style="display: none">
            <div id="kegiatan_field">
                <input type="text" name="addmore[][deskripsi_kegiatan]" placeholder="Deskripsi Kegiatan"/>
                <div class="input-group date form_datetime col-md-3" data-date-format="dd MM yyyy - hh:ii" data-link-field="dtp_input1">
                    <input class="form-control" name="addmore[][tanggal_kegiatan]" size="16" type="text" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1"/>
                <br>
                <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
            </div>
        </div>
        <br>
        <input type="submit" name="submit" value="Simpan">
    </form>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datetimepicker/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
    $(document).ready(function(){      
        var i=1;  
        $('#add').click(function(){  
            i++;  
            $('#kegiatan_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="addmore[][deskripsi_kegiatan]" placeholder="Deskripsi Kegiatan"/></td><td><div class="input-group date form_datetime col-md-3" name="addmore[][tanggal_kegiatan]" data-date-format="dd MM yyyy - hh:ii" data-link-field="dtp_input1"><input class="form-control" size="16" type="text"readonly><span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden" id="dtp_input1"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });  
    });  

    $(document).ready(function() {
        $("#formButton").click(function() {
            $("#form1").toggle();
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
</html>