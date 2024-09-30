<?php
include_once '../../config/config.php';
include_once '../../functions/sql.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Dataset ID is required.");
}

$dataset = getDataset($id);
if (!$dataset) {
    die("Dataset not found.");
}

$opd = getOPD($dataset['id_opd']);
if (!$opd) {
    die("OPD not found.");
}

$allOPDs = getAllOPDs();

function getDataset($id) {
    $query = "SELECT * FROM tb_dataset WHERE id = ?";
    return fetchOne($query, [$id]);
}

function getOPD($id) {
    $query = "SELECT * FROM tb_opd WHERE id = ?";
    return fetchOne($query, [$id]);
}

function getAllOPDs() {
    return fetchAll("SELECT * FROM tb_opd");
}

?>
<div class="card">
    <div class="card-content">
        <form method="post" class="bootstrap-form-with-validation" action="controls/dataset-edit.php?id=<?= htmlspecialchars($id); ?>">
            <h2 class="text-center">Ubah Dataset</h2>
            <div class="form-group">
                <label class="control-label" for="text-input">Nama Dataset</label>
                <input class="form-control" type="text" name="nama" id="text-input" value="<?= htmlspecialchars($dataset['nama_dataset']); ?>">
            </div>
            <div class="form-group">
                <label class="control-label" for="textarea-input">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="textarea-input"><?= htmlspecialchars($dataset['keterangan']); ?></textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="OPD">OPD</label>
                <select name="opd" id="OPD" class="form-control">
                    <option value="<?= htmlspecialchars($opd['id']); ?>" selected><?= htmlspecialchars($opd['singkatan'] . ' - ' . $opd['nama_opd']); ?></option>
                    <?php foreach ($allOPDs as $opdItem): ?>
                        <?php if ($opdItem['id'] != $opd['id']): ?>
                            <option value="<?= htmlspecialchars($opdItem['id']); ?>"><?= htmlspecialchars($opdItem['singkatan'] . ' - ' . $opdItem['nama_opd']); ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Dataset</label>
                <p class="form-static-control">Sebuah dataset adalah kumpulan data yang telah dikategorikan.</p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="OK">Ubah</button>
            </div>
        </form>
    </div>
</div>