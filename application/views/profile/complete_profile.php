<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete My Profile</title>
</head>
<body>
    <form action="<?= base_url()?>profile/complete_profile_action" method="POST">
        Name: <input type="text" name="nama" required>
        Phone Number: <input type="text" name="no_telp" required>
        <button>Save</button>
    </form>
</body>
</html>