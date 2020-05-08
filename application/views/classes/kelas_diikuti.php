<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelasku</title>
</head>
<body>
    <a href="<?= base_url()?>profile">Back</a>
    <table border="1">
        <th>Judul</th>
        <th>Poster</th>
        <?php foreach ($kelas as $val) : ?>
            <?php foreach ($peserta as $val2) : ?>
                <?php if ($val2['id_kelas'] == $val['id_kelas'] && $val2['id_user'] == $this->session->userdata('id_user')) : ?>
                    <tr>
                        <td><a href="<?= base_url()?>classes/open_class/<?= $val['id_kelas'] ?>"><?= $val['judul_kelas']; ?></a></td>
                        <td><img src="<?= base_url().'images/'.$val['poster_kelas']?>" alt="" height="200px"></td>
                        <td><a href="<?= base_url()?>classes/leave_class/<?= $val['id_kelas'] ?>">Leave</a></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>