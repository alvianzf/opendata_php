<?php
    include '../../config/config.php';
    include '../../functions/sql.php';

    session_start();

    $password     = @$_POST['password'];
    $nip          = @$_GET['id'];

    $ins = mysql_query("UPDATE tb_user SET password= '$password' WHERE id= $nip");

    $date = date('d-m-Y H:i:s');

    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [ubah pengguna] " .$nip. " di " .$date;
    fwrite($myfile, "\n". $txt);
    fclose($myfile);
    
    header("location:../index.php?admin=user");
?>
