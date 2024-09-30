<?php
include '../../config/config.php';
include '../../functions/sql.php';

session_start();

function getPostParameter($key, $default = null) {
    return $_POST[$key] ?? $default;
}

function logOpdCreation($user, $opdName, $date) {
    $logMessage = "[info] - id_peg: $user [tambah opd] $opdName di $date\n";
    file_put_contents("log.txt", $logMessage, FILE_APPEND);
}

function insertOpd($nama_opd, $singkatan) {
    return insert('tb_opd', "NULL, '$nama_opd', '$singkatan'");
}

$nama_opd = getPostParameter('nama');
$singkatan = getPostParameter('singkatan');
$date = date('d-m-Y H:i:s');

logOpdCreation($_SESSION['nama'], $nama_opd, $date);

insertOpd($nama_opd, $singkatan);

header("Location: ../index.php?admin=dinas");
exit();
?>
