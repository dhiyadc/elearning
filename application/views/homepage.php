<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <a href="<?= base_url()?>classes/new_class">Buat Kelas</a>
    <table border="1">
        <th>Judul</th>
        <th>Poster</th>
        <th>Deskripsi</th>
        <?php foreach ($class as $val) : ?>
            <tr>
                <td><a href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>"><?= $val['judul_kelas']; ?></a></td>
                <td><img src="<?= base_url().'images/'.$val['poster_kelas']?>" alt="" height="200px"></td>
                <td><?= $val['deskripsi_kelas']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>