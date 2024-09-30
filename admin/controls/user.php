<?php
include '../../config/config.php';
include '../../functions/sql.php';

session_start();

function getPostParameter($key, $default = null) {
    return $_POST[$key] ?? $default;
}

function logUserCreation($user, $nip, $date) {
    $logMessage = "[info] - id_peg: $user [tambah pengguna] $nip di $date\n";
    file_put_contents("log.txt", $logMessage, FILE_APPEND);
}

function insertUser($nip, $password) {
    return insert('tb_user', "NULL,'$nip','$password',0");
}

$nip = getPostParameter('nip');
$password = getPostParameter('password');
$opd = getPostParameter('opd');

insertUser($nip, $password);

$date = date('d-m-Y H:i:s');
logUserCreation($_SESSION['nama'], $nip, $date);

header("Location: ../index.php?admin=user");
exit();
?>
