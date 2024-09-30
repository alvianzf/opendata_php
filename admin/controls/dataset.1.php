<?php
include '../../config/config.php';
include '../../functions/sql.php';

function insertDataset($name, $description, $opdId) {
    return insert('tb_dataset', "NULL, '$name', '$description', '$opdId'");
}

function logDatasetCreation($userId, $datasetName, $opdId) {
    $date = date('d-m-Y H:i:s');
    $logMessage = "[info] - id_peg: $userId [create dataset] $datasetName dengan id opd: $opdId di $date\n";
    file_put_contents("log.txt", $logMessage, FILE_APPEND);
}

$nama_dataset = $_POST['nama'] ?? '';
$deskripsi = $_POST['nip'] ?? '';
$opd = $_POST['opd'] ?? '';

if (insertDataset($nama_dataset, $deskripsi, $opd)) {
    logDatasetCreation($_SESSION['nama'] ?? 'Unknown', $nama_dataset, $opd);
    header("Location: ../index.php?admin=dataset");
    exit();
} else {
    // Handle error
    echo "Error creating dataset: " . mysql_error();
}
?>
