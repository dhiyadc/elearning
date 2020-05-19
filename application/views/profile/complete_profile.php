<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" action="<?= base_url()?>profile/complete_profile_action" method="post">
        Foto Profil: <input type="file" name="foto" accept=".png, .jpg, .jpeg" required><br>
        Deskripsi: <textarea name="deskripsi" required></textarea><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
</body>
</html>