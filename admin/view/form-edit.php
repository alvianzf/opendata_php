<?php
include_once '../../config/config.php';
include_once '../../functions/sql.php';

$id = $_GET['id'] ?? null;
$id_dataset = $_GET['id_dataset'] ?? null;

if (!$id) {
    die("Form ID is required.");
}

$form = getForm($id);
if (!$form) {
    die("Form not found.");
}

function getForm($id) {
    $query = "SELECT * FROM tb_form WHERE id = ?";
    return fetchOne($query, [$id]);
}
?>
<div class="card">
    <div class="card-content">
        <form method="post" class="bootstrap-form-with-validation" action="controls/form-edit.php?id=<?= htmlspecialchars($id); ?>&id_dataset=<?= htmlspecialchars($id_dataset); ?>">
            <h2 class="text-center">Edit Form</h2>
            <p>Masukkan nama-nama kolom yang akan dimasukkan datanya:</p>
            <br>
            <div class="form-group">
                <label class="control-label" for="namaForm">Nama Form</label>
                <input class="form-control" value="<?= htmlspecialchars($form['nama_form']); ?>" type="text" name="namaForm" id="namaForm">
                <label class="control-label" for="deskripsi">Deskripsi Form</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi"><?= htmlspecialchars($form['deskripsi']); ?></textarea>
                <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="OK">Ubah</button>
            </div>
        </form>
    </div>
</div>