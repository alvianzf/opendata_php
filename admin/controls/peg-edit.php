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

function logPegEdit($user, $nip, $date) {
    $logMessage = "[info] - id_peg: $user [ubah pegawai] $nip di $date\n";
    file_put_contents("log.txt", $logMessage, FILE_APPEND);
}

function updatePeg($nip, $data) {
    $setClause = implode(', ', array_map(function ($key, $value) {
        return "$key = '" . mysqli_real_escape_string($GLOBALS['connection'], $value) . "'";
    }, array_keys($data), $data));
    
    $query = "UPDATE tb_peg SET $setClause WHERE id = ?";
    $stmt = mysqli_prepare($GLOBALS['connection'], $query);
    mysqli_stmt_bind_param($stmt, "s", $nip);
    return mysqli_stmt_execute($stmt);
}

$data = [
    'nama' => getPostParameter('nama'),
    'jabatan' => getPostParameter('jabatan'),
    'id_opd' => getPostParameter('opd')
];
$nip = getGetParameter('id');

$date = date('d-m-Y H:i:s');
logPegEdit($_SESSION['nama'], $nip, $date);

if (updatePeg($nip, $data)) {
    header("Location: ../index.php?admin=peg");
    exit();
} else {
    // Handle error
    echo "Error updating employee";
}
?>
