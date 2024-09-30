<?php

include '../../config/config.php';
include '../../functions/sql.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Form ID is required");
}

function getFieldCount($formId) {
    $query = "SELECT COUNT(*) AS count FROM tb_fields WHERE id_form = $formId";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    return $row['count'];
}

function getFirstFieldId($formId) {
    $query = "SELECT id FROM tb_fields WHERE id_form = $formId LIMIT 1";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    return $row['id'];
}

function insertValue($fieldId, $value) {
    $value = mysql_real_escape_string($value);
    $query = "INSERT INTO tb_values (field_id, value) VALUES ($fieldId, '$value')";
    return mysql_query($query);
}

function logAction($userId, $value, $formId) {
    $date = date('d-m-Y H:i:s');
    $logMessage = "[info] - id_peg: $userId [tambah data] $value dengan id form: $formId di $date\n";
    file_put_contents("log.txt", $logMessage, FILE_APPEND);
}

$fieldCount = getFieldCount($id);
$currentFieldId = getFirstFieldId($id);

foreach ($_POST['form'] ?? [] as $value) {
    if (!empty($value)) {
        if (insertValue($currentFieldId, $value)) {
            logAction($_SESSION['nama'] ?? 'Unknown', $value, $id);
        }
    }
    $currentFieldId++;
}

header("Location: ../index.php?admin=data&id=$id");
exit();

?>