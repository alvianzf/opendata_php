<?php
include_once '../../config/config.php';
include_once '../../functions/sql.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("OPD ID is required.");
}

$opd = getOPD($id);
if (!$opd) {
    die("OPD not found.");
}

function getOPD($id) {
    $query = "SELECT * FROM tb_opd WHERE id = ?";
    return fetchOne($query, [$id]);
}
?>
<div class="card">
    <div class="card-content">
        <form method="post" class="bootstrap-form-with-validation" action="controls/opd-edit.php">
            <h2 class="text-center">Ubah Data OPD</h2>
            <div class="form-group">
                <label class="control-label" for="nama-opd">Nama OPD</label>
                <input class="form-control" type="text" name="nama" id="nama-opd" value="<?= htmlspecialchars($opd['nama_opd']); ?>" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="singkatan">Singkatan</label>
                <input class="form-control" type="text" name="singkatan" id="singkatan" value="<?= htmlspecialchars($opd['singkatan']); ?>" required>
            </div>
            <div class="form-group">
                <label class="control-label">OPD</label>
                <p class="form-static-control">OPD adalah Organisasi Perangkat Daerah. Adalah perangkat Dinas yang ada di Kota Tanjungpinang.</p>
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">
                <button class="btn btn-primary" type="submit" name="OK">Ubah</button>
            </div>
        </form>
    </div>
</div>