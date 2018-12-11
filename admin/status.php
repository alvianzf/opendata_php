<?php

include "../functions/sql.php";
include "../config/config.php";

$a = @$_GET['r'];
$u = @$_GET['u'];

if ($a != NULL)
{
    session_start();

    $auth = viewdata1('tb_user', 'id_peg', $u, 'auth');

    $_SESSION['nama'] = @$_GET['u'];
    $_SESSION['auth'] = $auth;

    $_SESSION['log'] = 1;

    echo $auth;

    $date = date('d-m-Y H:i:s');


    $myfile = fopen("../admin/controls/log.txt", "a") or die("Unable to open file!");
	$txt = "[info] - login. id_peg: ".$_SESSION['nama']. ' di '.$date;
	fwrite($myfile, "\n". $txt);
	fclose($myfile);


    header("location:../admin");
}