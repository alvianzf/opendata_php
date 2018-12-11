<?php
    include '../../config/config.php';
    include '../../functions/sql.php';

    session_start();
    
    $id_dataset   = @$_GET['id_dataset'];
    $nama_form    = @$_POST['namaForm'];
    $keterangan   = @$_POST['deskripsi'];
    $nip          = @$_GET['id'];

    $ins = mysql_query("UPDATE tb_form SET nama_form =  '$nama_form', deskripsi='$keterangan' WHERE id= $nip");

    $date = date('d-m-Y H:i:s');

    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [ubah form] " .$nama_form. " di " .$date;
    fwrite($myfile, "\n". $txt);
    fclose($myfile);
    
    header('location:../index.php?admin=forms&id='.$id_dataset);

    echo $nama_form;
    echo $keterangan;
    echo $nip;
    echo $opd;
    echo $id_dataset;
?>