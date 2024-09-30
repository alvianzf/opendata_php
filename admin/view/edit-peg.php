<?php
include_once '../../config/config.php';
include_once '../../functions/sql.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Employee ID is required.");
}

$employee = getEmployee($id);
if (!$employee) {
    die("Employee not found.");
}

$currentOPD = getOPD($employee['id_opd']);
if (!$currentOPD) {
    die("OPD not found.");
}

$allOPDs = getAllOPDs();

function getEmployee($id) {
    $query = "SELECT * FROM tb_peg WHERE id = ?";
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
        <form method="post" class="bootstrap-form-with-validation" action="controls/peg-edit.php?id=<?= htmlspecialchars($id); ?>">
            <h2 class="text-center">Edit Pegawai</h2>
            <div class="form-group">
                <label class="control-label" for="nama">Nama Pegawai</label>
                <input class="form-control" value="<?= htmlspecialchars($employee['nama']); ?>" type="text" name="nama" id="nama">
            </div>
            <div class="form-group">
                <label class="control-label" for="nip">NIP</label>
                <input class="form-control" value="<?= htmlspecialchars($employee['id']); ?>" type="text" name="nip" id="nip" disabled>
            </div>
            <div class="form-group">
                <label class="control-label" for="jabatan">Jabatan</label>
                <input class="form-control" value="<?= htmlspecialchars($employee['jabatan']); ?>" type="text" name="jabatan" id="jabatan">
            </div>                    
            <div class="form-group">
                <label class="control-label" for="opd">OPD</label>
                <select name="opd" id="opd" class="form-control">
                    <option value="<?= htmlspecialchars($currentOPD['id']); ?>" selected><?= htmlspecialchars($currentOPD['singkatan'] . ' - ' . $currentOPD['nama_opd']); ?></option>
                    <?php foreach ($allOPDs as $opd): ?>
                        <?php if ($opd['id'] != $currentOPD['id']): ?>
                            <option value="<?= htmlspecialchars($opd['id']); ?>"><?= htmlspecialchars($opd['singkatan'] . ' - ' . $opd['nama_opd']); ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Pegawai</label>
                <p class="form-static-control">Berisi Data inputan Aparatur Sipil Negara di Wilayah Tanjungpinang.</p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="OK">Ubah</button>
            </div>
        </form>
    </div>
</div>