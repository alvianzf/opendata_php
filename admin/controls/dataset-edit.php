<?php
    include '../../config/config.php';
    include '../../functions/sql.php';

    session_start();

    $nama_dataset = @$_POST['nama'];
    $keterangan   = @$_POST['deskripsi'];
    $nip          = @$_GET['id'];
    $opd          = @$_POST['opd'];

    $ins = mysql_query("UPDATE tb_dataset SET nama_dataset =  '$nama_dataset', keterangan='$keterangan', id_opd = $opd WHERE id= $nip");

    $date = date('d-m-Y H:i:s');

    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [edit dataset] ".$nama_dataset."dengan id opd:" .$opd. " di " .$date;
    fwrite($myfile, "\n". $txt);
    fclose($myfile);
    header("location:../index.php?admin=dataset");

    echo $nama_dataset;
    echo $keterangan;
    echo $nip;
    echo $opd;
?>
