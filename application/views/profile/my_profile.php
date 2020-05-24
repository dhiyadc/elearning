<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
</head>
<body>
<?php if($this->session->flashdata('invalid_pass')) { ?>
<?=  $this->session->flashdata('invalid_pass') ?>
<?php } ?>
<?php if($this->session->flashdata('pass')) { ?>
<?=  $this->session->flashdata('pass') ?>
<?php } ?>

    <table>
        <?php foreach ($profile as $val) : ?>
            <tr>
                <td>Nama: <?= $val['nama']; ?></td>
            </tr>
            <tr>
                <td>No. Telepon: <?= $val['no_telepon']; ?></td>
            </tr>
            <tr>
                <td>Foto Profil: <img src="<?= base_url().'assets/images/'.$val['foto']?>" alt="No Image" height="200px" class="img-fluid rounded"></td>
            </tr>
            <?php if ($val['deskripsi'] != null) : ?>
                <tr>
                    <td>Deskripsi Singkat: <?= $val['deskripsi']; ?></td>
                </tr>
            <?php else : ?> 
                <tr>
                    <td>Deskripsi Singkat: No Desc</td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php foreach ($account as $val) : ?>
            <tr>
                <td>Email: <?= $val['email']; ?></td>
            </tr>
            <tr>
                <td>Password: ******</td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="<?= base_url()?>classes/my_classes">My Classes</a>
    <a href="<?= base_url()?>classes/kelas_diikuti">Kelas yang Diikuti</a>
    <a href="<?= base_url()?>profile/edit_profile">Edit Profile</a>
    <a href="<?= base_url()?>profile/delete_account">Delete Account</a>
    <a href="<?= base_url(); ?>profile/change_password"><button>Change Password</button></a>
    <a href="<?= base_url(); ?>login/logout">Logout</a>
</body>
</html>