<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?php
        echo 'Owner ';
        echo $_SESSION['owner_email'];
    ?></h2>
    <br>
    <a href="<?= base_url(); ?>owner/users">Lihat seluruh user</a>
    <br>
    <a href="#">Lihat seluruh kelas(blom)</a>
    <br>
    <br>
    <a href="<?= base_url(); ?>nonuser/logout">Logout</a>
</body>
</html>