<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Kelas Baru</title>
</head>
<body>
    <form enctype="multipart/form-data" action="<?= base_url()?>classes/new_class_action" method="post">
        Judul: <input type="text" name="judul" required><br>
        Deskripsi: <input type="text" name="deskripsi" required><br>
        <label>Kategori: </label>
        <select name="kategori">
            <?php foreach ($kategori as $val) : ?>
                <option value="<?= $val['id_kategori']; ?>"><?= $val['nama_kategori']; ?></option>
            <?php endforeach; ?>
        </select><br>
        Poster: <input type="file" name="poster" accept=".png, .jpg, .jpeg" required><br>
        <label>Jenis: </label>
        <select name="jenis">
            <?php foreach ($jenis as $val) : ?>
                <option value="<?= $val['id_jenis']; ?>"><?= $val['nama_jenis']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
</body>
</html>