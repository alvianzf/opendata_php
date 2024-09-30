<?php

$userId = isset($_GET['id']) ? $_GET['id'] : null;

$userQuery = mysql_query("SELECT * FROM tb_user WHERE id_peg = $userId");
$userData = mysql_fetch_assoc($userQuery);

$employeeQuery = mysql_query("SELECT * FROM tb_peg WHERE id = $userId");
$employeeData = mysql_fetch_assoc($employeeQuery);
$opdId = $employeeData['id_opd'];

$opdQuery = mysql_query("SELECT * FROM tb_opd WHERE id = $opdId");
$opdData = mysql_fetch_assoc($opdQuery);

?>

<div class="card">
    <div class="card-content">
        <form method="post" class="bootstrap-form-with-validation" action="controls/user-edit.php?id=<?= $userData['id']; ?>">
            <h2 class="text-center">Ubah Data Pengguna</h2>
            <div class="form-group">
                <label class="control-label" for="nip-input">NIP</label>
                <input class="form-control" type="text" name="nip" id="nip-input" value="<?= $userData['id_peg']; ?>" list="pegawai" disabled>
            </div>

            <datalist id="pegawai">
            <?php
                $employeeList = where('tb_peg');
                while ($employee = mysql_fetch_assoc($employeeList)) {
            ?>
                <option value=<?= $employee['id']; ?>><?= $employee['nama']; ?></option>
            <?php
                }
            ?>
            </datalist>
            <div class="form-group">
                <label class="control-label" for="password-input">Password</label>
                <input class="form-control" type="text" value="<?= $userData['password']; ?>" name="password" id="password-input">
            </div>                    
            <div class="form-group">
                <label class="control-label" for="opd-select">OPD</label>
                <select name="opd" id="opd-select" class="form-control" disabled>
                    <?php
                    $opdList = where('tb_opd');

                    echo '<option value="' . $userData['id_opd'] . '" selected>' . $opdData['singkatan'] . ' - ' . $opdData['nama_opd'] . '</option>';

                    while($opdItem = mysql_fetch_assoc($opdList)) {
                    ?>
                    <option value=<?= $opdItem['id']; ?>><?= $opdItem['singkatan']; ?> - <?= $opdItem['nama_opd']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Pengguna</label>
                <p class="form-static-control">Berisi Pengguna Open Data Tanjungpinang.</p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="OK">Ubah</button>
            </div>
        </form>
    </div>
</div>