<?php
    include '../../config/config.php';
    include '../../functions/sql.php';

    session_start();

    $nama_dataset = @$_POST['nama'];
    $deskripsi    = @$_POST['deskripsi'];
    $opd          = @$_POST['opd'];

    $ins = insert('tb_dataset', "NULL,'$nama_dataset','$deskripsi','$opd'");
    $date = date('d-m-Y H:i:s');

    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [tambah dataset] ".$nama_dataset." dengan id opd:" .$opd. " di " .$date;
    fwrite($myfile, "\n". $txt);
    fclose($myfile);

    header("location:../index.php?admin=dataset");
?>
