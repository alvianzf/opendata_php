<?php

include '../../config/config.php';
include '../../functions/sql.php';

session_start();

function getParameter($method, $key, $default = null) {
    return $method === 'POST' ? ($_POST[$key] ?? $default) : ($_GET[$key] ?? $default);
}

function redirectToForms($id, $q) {
    header("Location: ../index.php?admin=forms&id=$id&q=$q");
    exit();
}

$q = getParameter('POST', 'tables');
$id = getParameter('GET', 'id');

redirectToForms($id, $q);

?>