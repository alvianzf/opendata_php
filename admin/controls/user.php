<?php
    include '../../config/config.php';
    include '../../functions/sql.php';

    session_start();

    $nip        = @$_POST['nip'];
    $password   = @$_POST['password'];
    $opd        = @$_POST['opd'];

    $ins = insert('tb_user', "NULL,'$nip','$password',0");

    $date = date('d-m-Y H:i:s');

    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [tambah pengguna] " .$nip. " di " .$date;
    fwrite($myfile, "\n". $txt);
    fclose($myfile);

    echo $nip;
    echo $password;
    echo $opd;
    header("location:../index.php?admin=user");
?>
