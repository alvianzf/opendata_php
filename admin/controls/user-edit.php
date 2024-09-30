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

function logUserEdit($user, $nip, $date) {
    $logMessage = "[info] - id_peg: $user [ubah pengguna] $nip di $date\n";
    file_put_contents("log.txt", $logMessage, FILE_APPEND);
}

function updateUserPassword($nip, $password) {
    $query = "UPDATE tb_user SET password = ? WHERE id = ?";
    $stmt = mysqli_prepare($GLOBALS['connection'], $query);
    mysqli_stmt_bind_param($stmt, "ss", $password, $nip);
    return mysqli_stmt_execute($stmt);
}

$password = getPostParameter('password');
$nip = getGetParameter('id');

if (updateUserPassword($nip, $password)) {
    $date = date('d-m-Y H:i:s');
    logUserEdit($_SESSION['nama'], $nip, $date);
    
    header("Location: ../index.php?admin=user");
    exit();
} else {
    // Handle error
    echo "Error updating user password";
}
?>
