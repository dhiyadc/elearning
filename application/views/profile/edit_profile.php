<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete My Profile</title>
</head>
<body>
<?php
              if (isset($message_display)) {
              echo "<div class='message'>";
              echo $message_display;
              echo "</div>";
              }
            ?>
            <?php
            echo "<div class='error_msg'>";
            if (isset($error_message)) {
            echo $error_message;
            }
            //echo validation_errors();
            echo "</div>";
          ?>
    <form enctype="multipart/form-data" action="<?= base_url()?>profile/edit_profile_action" method="POST">
        <?php foreach ($profile as $val) : ?>
            Name: <input type="text" name="nama" value="<?= $val['nama']; ?>" required>
            Phone Number: <input type="text" name="no_telp" value="<?= $val['no_telepon']; ?>" required>
            Foto Profil: <input type="file" name="foto" accept=".png, .jpg, .jpeg">
            <input type="hidden" name="old_image" value="<?= $val['foto'] ?>"><br>
            Deskripsi: <textarea name="deskripsi"><?= $val['deskripsi'] ?></textarea>
        <?php endforeach; ?>
        <?php foreach ($account as $val) : ?>
            Email:<?= $val['email']; ?>
            <br>
            <br>
        <?php endforeach; ?>
        <button>Save</button>
    </form>
</body>
</html>