<?php

include '../../config/config.php';
include '../../functions/sql.php';

session_start();

function deleteRecord($table, $id) {
    delete($table, $id);
}

function logDeletion($userId, $table, $id) {
    $date = date('d-m-Y H:i:s');
    $logMessage = "[info] - id_peg: $userId [hapus data] pada tabel:$table dengan id value:$id di $date\n";
    file_put_contents("log.txt", $logMessage, FILE_APPEND);
}

$table = $_GET['table'] ?? '';
$id = $_GET['id'] ?? '';
$source = $_GET['source'] ?? '';

if ($table && $id) {
    deleteRecord($table, $id);
    logDeletion($_SESSION['nama'], $table, $id);
    
    header("Location: ../?admin=$source");
    exit();
} else {
    // Handle error: missing parameters
    echo "Error: Missing table or id parameter";
}

?>