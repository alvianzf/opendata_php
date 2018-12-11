<?php
    include '../../config/config.php';
    include '../../functions/sql.php';

    session_start();

    $nama_opd     = @$_POST['nama'];
    $singkatan    = @$_POST['singkatan'];
    $nip          = @$_GET['id'];

    $date = date('d-m-Y H:i:s');

    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [ubah opd] " .$nama_opd. " di " .$date;
    fwrite($myfile, "\n". $txt);
    fclose($myfile);

    $ins = mysql_query("UPDATE tb_opd SET nama_opd= '$nama_opd', singkatan='$singkatan' WHERE id= $nip");
    
    header("location:../index.php?admin=dinas");
?>
