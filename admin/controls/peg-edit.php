<?php
    include '../../config/config.php';
    include '../../functions/sql.php';

    session_start();

    $nama_peg     = @$_POST['nama'];
    $nip          = @$_GET['id'];
    $jabatan      = @$_POST['jabatan'];
    $opd          = @$_POST['opd'];

    $date = date('d-m-Y H:i:s');

    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [ubah pegawai] " .$nip. " di " .$date;
    fwrite($myfile, "\n". $txt);
    fclose($myfile);

    $ins = mysql_query("UPDATE tb_peg SET nama= '$nama_peg', jabatan= '$jabatan', id_opd='$opd' WHERE id=$nip");
    
    header("location:../index.php?admin=peg");
?>
