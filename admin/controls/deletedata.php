<?php

    include '../../config/config.php';
    include '../../functions/sql.php';

    session_start();

    $tbname = @$_GET['table'];
    $id     = @$_GET['id'];
    $src    = @$_GET['source'];
    $idd    = @$_GET['idd'];

    delete($tbname, $id);

    deletedata('tb_fields', 'id_form', $id);

    $date = date('d-m-Y H:i:s');

    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [hapus data] pada tabel:".$tbname." dengan id value:" .$id. " di " .$date;
    fwrite($myfile, "\n". $txt);
    fclose($myfile);

    header('location:../?admin='.$src.'&id='.$idd);

    echo $tbname;
    echo $id;
    echo $src;
?>