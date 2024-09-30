<?php

include "../functions/sql.php";
include "../config/config.php";

function logLogin($userId) {
    $date = date('d-m-Y H:i:s');
    $logMessage = "[info] - login. id_peg: $userId di $date";
    $logFile = "../admin/controls/log.txt";

    if (file_put_contents($logFile, $logMessage . PHP_EOL, FILE_APPEND) === false) {
        error_log("Failed to write to log file: $logFile");
    }
}

if (isset($_GET['r']) && isset($_GET['u'])) {
    session_start();

    $userId = $_GET['u'];
    $auth = viewdata1('tb_user', 'id_peg', $userId, 'auth');

    $_SESSION['nama'] = $userId;
    $_SESSION['auth'] = $auth;
    $_SESSION['log'] = 1;

    logLogin($userId);

    header("Location: ../admin");
    exit();
}