<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
</head>
<body>
<?php foreach ($kelas as $val) : ?>
    <form enctype="multipart/form-data" action="<?= base_url()?>classes/update_class_action/<?= $val['id_kelas']; ?>" method="post">
        Judul: <input type="text" name="judul" value="<?= $val['judul_kelas']; ?>" required><br>
        Deskripsi: <input type="text" name="deskripsi" value="<?= $val['deskripsi_kelas']; ?>" required><br>
        <label>Kategori: </label>
        <select name="kategori">
            <?php foreach ($kategori as $val2) : ?>
                <?php $selected = ($val['kategori_kelas'] == $val2['id_kategori'])? "selected" : ""; ?>
                <option value="<?= $val2['id_kategori']; ?>" <?= $selected ?>><?= $val2['nama_kategori']; ?></option>
            <?php endforeach; ?>
        </select><br>
        Poster: <input type="file" name="poster" accept=".png, .jpg, .jpeg">
        <input type="hidden" name="old_image" value="<?= $val['poster_kelas'] ?>"><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
<?php endforeach; ?>
</body>
</html>