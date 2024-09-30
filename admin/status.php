<?php

include "../functions/sql.php";
include "../config/config.php";

function logUserLogin($employeeId) {
    $currentDateTime = date('Y-m-d H:i:s');
    $logMessage = "[info] - login. Employee ID: $employeeId at $currentDateTime";
    $logFilePath = "../admin/controls/log.txt";

    if (file_put_contents($logFilePath, $logMessage . PHP_EOL, FILE_APPEND) === false) {
        error_log("Failed to write to log file: $logFilePath");
    }
}

if (isset($_GET['r']) && isset($_GET['u'])) {
    session_start();

    $employeeId = $_GET['u'];
    $userAuthLevel = viewdata1('tb_user', 'id_peg', $employeeId, 'auth');

    $_SESSION['employeeName'] = $employeeId;
    $_SESSION['authLevel'] = $userAuthLevel;
    $_SESSION['isLoggedIn'] = 1;

    logUserLogin($employeeId);

    header("Location: ../admin");
    exit();
}