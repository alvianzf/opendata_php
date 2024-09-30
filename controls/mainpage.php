<?php

include '../config/config.php';
include '../functions/sql.php';

$searchTerm = $_POST['search'] ?? '';

$datasets = fetchAll('tb_dataset');

if ($datasets && mysql_num_rows($datasets) > 0) {
    $firstDataset = mysql_fetch_assoc($datasets);
    echo json_encode($firstDataset);
} else {
    echo "No datasets found.";
}