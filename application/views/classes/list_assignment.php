<?php foreach ($kelas as $val) : ?>
<a href="<?= base_url() ?>classes/new_assignment/<?= $val['id_kelas']; ?>">Buat Tugas</a>
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
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endforeach; ?>