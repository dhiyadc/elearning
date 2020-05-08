<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete My Profile</title>
</head>
<body>
    <form action="<?= base_url()?>profile/edit_profile_action" method="POST">
        <?php foreach ($profile as $val) : ?>
            Name: <input type="text" name="nama" value="<?= $val['nama']; ?>" required>
            Phone Number: <input type="text" name="no_telp" value="<?= $val['no_telepon']; ?>" required>
        <?php endforeach; ?>
        <?php foreach ($account as $val) : ?>
            Email:<?= $val['email']; ?>
            Password: <input type="password" name="password" required>
        <?php endforeach; ?>
        <button>Save</button>
    </form>
</body>
</html>