<?php
include '../../config/config.php';
include '../../functions/sql.php';

session_start();

function getParameter($method, $key, $default = null) {
    return $method === 'GET' ? ($_GET[$key] ?? $default) : ($_POST[$key] ?? $default);
}

function updateForm($nip, $nama_form, $keterangan) {
    $query = "UPDATE tb_form SET nama_form = ?, deskripsi = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssi", $nama_form, $keterangan, $nip);
    return mysqli_stmt_execute($stmt);
}

function logFormUpdate($user, $form_name, $date) {
    $log_message = "[info] - id_peg: $user [ubah form] $form_name di $date\n";
    file_put_contents("log.txt", $log_message, FILE_APPEND);
}

$id_dataset = getParameter('GET', 'id_dataset');
$nama_form = getParameter('POST', 'namaForm');
$keterangan = getParameter('POST', 'deskripsi');
$nip = getParameter('GET', 'id');

if (updateForm($nip, $nama_form, $keterangan)) {
    $date = date('d-m-Y H:i:s');
    logFormUpdate($_SESSION['nama'], $nama_form, $date);
    header("Location: ../index.php?admin=forms&id=$id_dataset");
    exit();
} else {
    // Handle error
    echo "Error updating form";
}

// Debug information (consider removing in production)
echo $nama_form;
echo $keterangan;
echo $nip;
echo $opd;
echo $id_dataset;
?>