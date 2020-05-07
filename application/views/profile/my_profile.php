<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
</head>
<body>
    <table>
        <?php foreach ($profile as $val) : ?>
            <tr>
                <td>Name: <?= $val['nama']; ?></td>
            </tr>
            <tr>
                <td>Phone Number: <?= $val['no_telepon']; ?></td>
            </tr>
        <?php endforeach; ?>
        <?php foreach ($account as $val) : ?>
            <tr>
                <td>Email: <?= $val['email']; ?></td>
            </tr>
            <tr>
                <td>Password: <?= $val['password']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="<?= base_url()?>profile/edit_profile">Edit Profile</a>
    <a href="<?= base_url()?>profile/delete_account">Delete Account</a>
    <a href="<?= base_url(); ?>login/logout">Logout</a>
</body>
</html>