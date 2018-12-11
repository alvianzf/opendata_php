<?php
    include '../../config/config.php';
    include '../../functions/sql.php';

    $nama_dataset = @$_POST['nama'];
    $deskripsi    = @$_POST['nip'];
    $jabatan      = @$_POST['jabatan'];
    $opd          = @$_POST['opd'];

    $ins = insert('tb_dataset', "NULL,'$nama_dataset','$deskripsi','$opd'");
    header("location:../index.php?admin=dataset");
?>
