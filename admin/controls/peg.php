<?php
include '../../config/config.php';
include '../../functions/sql.php';

session_start();

function getPostParameter($key, $default = null) {
    return $_POST[$key] ?? $default;
}

function logPegCreation($user, $nip, $date) {
    $logMessage = "[info] - id_peg: $user [tambah pegawai] $nip di $date\n";
    file_put_contents("log.txt", $logMessage, FILE_APPEND);
}

function insertPeg($nip, $nama_peg, $jabatan, $opd) {
    return insert('tb_peg', "'$nip','$nama_peg','$jabatan',$opd");
}

$nama_peg = getPostParameter('nama');
$nip = getPostParameter('nip');
$jabatan = getPostParameter('jabatan');
$opd = getPostParameter('opd');

insertPeg($nip, $nama_peg, $jabatan, $opd);

$date = date('d-m-Y H:i:s');
logPegCreation($_SESSION['nama'], $nip, $date);

header("Location: ../index.php?admin=peg");
exit();
?>
