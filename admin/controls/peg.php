<?php
    include '../../config/config.php';
    include '../../functions/sql.php';

    session_start();
    
    $nama_peg     = @$_POST['nama'];
    $nip          = @$_POST['nip'];
    $jabatan      = @$_POST['jabatan'];
    $opd          = @$_POST['opd'];

    $ins = insert('tb_peg', "'$nip','$nama_peg','$jabatan',$opd");

	$date = date('d-m-Y H:i:s');

    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [tambah pegawai] " .$nip. " di " .$date;
    fwrite($myfile, "\n". $txt);
    fclose($myfile);

    header("location:../index.php?admin=peg");
?>
