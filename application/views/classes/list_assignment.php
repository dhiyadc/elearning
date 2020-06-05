<?php foreach ($kelas as $val) : ?>
<?php if ($val['pembuat_kelas'] == $this->session->userdata('id_user')) : ?>
    <a href="<?= base_url() ?>classes/new_assignment/<?= $val['id_kelas']; ?>">Buat Tugas</a>
<?php endif; ?>
<h3>List Tugas Kelas <?= $val['judul_kelas'] ?></h3>
<table border="1">
    <thead>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Kategori</th>
        <th>Deadline</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php foreach ($tugas as $val2) : ?>
        <tr>
            <td><?= $val2['judul_tugas']; ?></td>
            <td><?= $val2['deskripsi_tugas']; ?></td>
            <td><?= $val2['kategori']; ?></td>
            <td><?= $val2['deadline']; ?></td>
            <?php if ($val['pembuat_kelas'] != $this->session->userdata('id_user')) : ?>
                <td>
                    <?php if ($this->session->flashdata('failedInputFile')) : ?>
                        <div class="alert alert-danger"> <?= $this->session->flashdata('failedInputFile') ?> </div>
                    <?php endif; ?>
                    
                    <form enctype="multipart/form-data" action="<?= base_url() ?>classes/collect_assignment/<?= $val2['id_kelas'] ?>/<?= $val2['id_tugas'] ?>" method="POST">
                        <label>Subjek Tugas</label>
                        <input type="text"name="subjek" required>
                        <label>File Tugas</label>
                        <input type="file"name="assignment" accept=".pdf, .doc, .docx" required>
                        <!-- <iframe src="<?= base_url() ?>assets/docs/BAB_II.docx" type="application/docx"></iframe> -->
                        <input type="submit" value="Kumpul">
                    </form>
                </td>
            <?php else : ?>
                <td>
                    <a href="">Edit</a>
                    <a href="">Hapus</a>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    <?php if ($val['pembuat_kelas'] == $this->session->userdata('id_user')) : ?>
        <?php foreach ($tugas as $val2) : ?>
            <h3>List Jawaban Tugas <?= $val2['judul_tugas']; ?></h3>
            <table border="1">
                <thead>
                    <th>Pengirim</th>
                    <th>Subjek</th>
                    <th>Jawaban</th>
                    <th>Status</th>
                    <th>Waktu Pengumpulan</th>
                    <th>Nilai</th>
                </thead>
                <tbody>
                    <?php foreach ($submit as $val3) : ?>
                        <?php if ($val2['id_tugas'] == $val3['id_tugas']) : ?>
                        <tr>
                            <td><?= $val3['nama'] ?></td>
                            <td><?= $val3['subjek_tugas'] ?></td>
                            <td></td>
                            <td><?= $val3['status'] ?></td>
                            <td><?= $val3['tanggal_submit'] ?></td>
                            <td><?= $val3['nilai_tugas'] ?> <a href="">(ubah)</a></td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endforeach; ?>