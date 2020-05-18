<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seluruh user</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
</head>
<body>
    <h2><?php
        echo 'Owner ';
        echo $_SESSION['owner_email'];
    ?></h2>
    <h2>All Users</h2>
    <br>
    <input id="search" type="text" placeholder="Search.."> <span></span>
    <table class="table table-striped table-inverse table-responsive" data-order='[[ 1, "asc" ]]' data-page-length='3' id="fordatatable">
        <thead class="thead-inverse">
            <tr>
                <th>ID User</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody id="myTable">
            <?php foreach ($user as $val) : ?>
                <tr id="countUser">
                    <td scope="row"><?= $val['id_user']; ?></td>
                    <td><?= $val['nama'] ?></td>
                    <td><?= $val['no_telepon'] ?></td>
                    <td><?= $val['email'] ?></td>
                </tr>
                <?php endforeach; ?>    
            </tbody>
    </table>
    
    <br>
    <a href="<?= base_url(); ?>owner">Back to home owner</a>
</body>

<script>
    $(document).ready( function () {
    $('#fordatatable').DataTable({
        paging: true;
    });
} );
</script>
</html>