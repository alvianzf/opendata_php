<?php
include '../../config/config.php';
include '../../functions/sql.php';

session_start();

function getPostParameter($key, $default = null) {
    return $_POST[$key] ?? $default;
}

function insertForm($namaForm, $deskripsi, $id) {
    return insert('tb_form', "NULL, '$namaForm', '$deskripsi', '$id'");
}

function getLastInsertedFormId($id) {
    $query = "SELECT id FROM tb_form WHERE id_dataset = ? ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connection, $query);
    return mysqli_fetch_assoc($result)['id'];
}

function logFormCreation($user, $formName, $date) {
    $logMessage = "[info] - id_peg: $user [tambah form] $formName di $date\n";
    file_put_contents("log.txt", $logMessage, FILE_APPEND);
}

function insertFields($id_form, $values) {
    foreach ($values as $value) {
        $query = "INSERT INTO tb_fields VALUES (NULL, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "is", $id_form, $value);
        mysqli_stmt_execute($stmt);
    }
}

$namaForm = getPostParameter('namaForm');
$deskripsi = getPostParameter('deskripsi');
$id = getPostParameter('id');

insertForm($namaForm, $deskripsi, $id);

$id_form = getLastInsertedFormId($id);

$date = date('d-m-Y H:i:s');
logFormCreation($_SESSION['nama'], $namaForm, $date);

$values = getPostParameter('value', []);
insertFields($id_form, $values);

header("Location: ../index.php?admin=forms&id=$id");
exit();
?>