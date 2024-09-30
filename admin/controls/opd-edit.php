<?php
include '../../config/config.php';
include '../../functions/sql.php';

session_start();

function getPostParameter($key, $default = null) {
    return $_POST[$key] ?? $default;
}

function getGetParameter($key, $default = null) {
    return $_GET[$key] ?? $default;
}

function logOpdEdit($user, $opdName, $date) {
    $logMessage = "[info] - id_peg: $user [ubah opd] $opdName di $date\n";
    file_put_contents("log.txt", $logMessage, FILE_APPEND);
}

function updateOpd($id, $nama_opd, $singkatan) {
    $query = "UPDATE tb_opd SET nama_opd = ?, singkatan = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssi", $nama_opd, $singkatan, $id);
    return mysqli_stmt_execute($stmt);
}

$nama_opd = getPostParameter('nama');
$singkatan = getPostParameter('singkatan');
$id = getGetParameter('id');

$date = date('d-m-Y H:i:s');

logOpdEdit($_SESSION['nama'], $nama_opd, $date);

if (updateOpd($id, $nama_opd, $singkatan)) {
    header("Location: ../index.php?admin=dinas");
    exit();
} else {
    // Handle error
    echo "Error updating OPD";
}
?>
