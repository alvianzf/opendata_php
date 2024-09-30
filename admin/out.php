<?php
session_start();

function logUserLogout($employeeId) {
    $currentDateTime = date('Y-m-d H:i:s');
    $logEntry = "[INFO] Employee ID: $employeeId logged out at $currentDateTime";
    $logFilePath = "../admin/controls/user_activity.log";

    if (file_put_contents($logFilePath, $logEntry . PHP_EOL, FILE_APPEND) === false) {
        error_log("Failed to write to user activity log: $logFilePath");
    }
}

if (isset($_SESSION['employeeId'])) {
    logUserLogout($_SESSION['employeeId']);
}

session_destroy();
header('Location: ../login/');
exit();