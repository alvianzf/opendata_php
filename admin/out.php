<?php
session_start();

	$date = date('d-m-Y H:i:s');

    $myfile = fopen("../admin/controls/log.txt", "a") or die("Unable to open file!");
    $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [logout] di " .$date;
    fwrite($myfile, "\n". $txt);
    fclose($myfile);

session_destroy();

header('location:../login/');