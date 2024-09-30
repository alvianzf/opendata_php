<?php

$databaseConnection = mysqli_connect("localhost", "root", "");
mysqli_select_db($databaseConnection, "opendatadb");

// if ($databaseConnection)
// {
//     echo "Connected successfully";
// }

// // $insertDatasetQuery = mysqli_query($databaseConnection, "INSERT INTO tb_dataset VALUES (NULL, 'TEST 2', 'TEST DATASET 2', '2')");
// mysqli_query($databaseConnection, "INSERT INTO tb_user VALUES (NULL, '1234567890', 'admin', 1)");
// mysqli_query($databaseConnection, "INSERT INTO tb_peg VALUES ('1234567890', 'Rio Putra', 'SETDAKO', 1)");