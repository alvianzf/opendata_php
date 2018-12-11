<?php
    include '../../config/config.php';
    include '../../functions/sql.php';

    session_start();
    
    $nama_opd   = @$_POST['nama'];
    $singkatan  = @$_POST['singkatan'];

	$date = date('d-m-Y H:i:s');

    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [tambah opd] " .$nama_opd. " di " .$date;
    fwrite($myfile, "\n". $txt);
    fclose($myfile);


    $ins = insert('tb_opd', "NULL,'$nama_opd','$singkatan'");
    header("location:../index.php?admin=dinas");
?>
