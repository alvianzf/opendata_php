<?php

include '../config/config.php';

$item = @$_POST['search'];

$qry = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_dataset"));

echo  $qry;