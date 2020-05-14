<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?php if(isset($_SESSION['owner_logged_in'])){
        echo 'Owner ';
        echo $_SESSION['email'];
    } else {
        echo 'Admin ';
        echo $_SESSION['email'];
    }?></h2>
    <br>
    <a href="<?= base_url(); ?>admin/logout">Logout</a>
</body>
</html>