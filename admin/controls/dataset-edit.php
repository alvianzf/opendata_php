<?php
include '../../config/config.php';
include '../../functions/sql.php';

session_start();

function updateDataset($id, $name, $description, $opdId) {
    $name = mysql_real_escape_string($name);
    $description = mysql_real_escape_string($description);
    $query = "UPDATE tb_dataset SET nama_dataset = '$name', keterangan = '$description', id_opd = $opdId WHERE id = $id";
    return mysql_query($query);
}

function logDatasetEdit($userId, $datasetName, $opdId) {
    $date = date('d-m-Y H:i:s');
    $logMessage = "[info] - id_peg: $userId [edit dataset] $datasetName dengan id opd: $opdId di $date\n";
    file_put_contents("log.txt", $logMessage, FILE_APPEND);
}

$datasetId = $_GET['id'] ?? '';
$datasetName = $_POST['nama'] ?? '';
$description = $_POST['deskripsi'] ?? '';
$opdId = $_POST['opd'] ?? '';

if (updateDataset($datasetId, $datasetName, $description, $opdId)) {
    logDatasetEdit($_SESSION['nama'], $datasetName, $opdId);
    header("Location: ../index.php?admin=dataset");
    exit();
} else {
    // Handle error
    echo "Error updating dataset: " . mysql_error();
}
?>
