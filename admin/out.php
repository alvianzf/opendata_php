<?php
session_start();

function logLogout($userId) {
    $date = date('d-m-Y H:i:s');
    $logMessage = "[info] - id_peg: $userId [logout] di $date";
    $logFile = "../admin/controls/log.txt";

    if (file_put_contents($logFile, $logMessage . PHP_EOL, FILE_APPEND) === false) {
        error_log("Failed to write to log file: $logFile");
    }
}

if (isset($_SESSION['nama'])) {
    logLogout($_SESSION['nama']);
}

session_destroy();
header('Location: ../login/');
exit();