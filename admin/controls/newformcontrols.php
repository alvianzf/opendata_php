<?php
    include '../../config/config.php';
    include '../../functions/sql.php';

    session_start();

$namaForm   = @$_POST['namaForm'];
$deskripsi  = @$_POST['deskripsi'];
$id = @$_POST['id'];

insert('tb_form', "NULL, '$namaForm ',' $deskripsi ',' $id'");

$form_id = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_form WHERE id_dataset = $id ORDER BY id DESC"));

$id_form = $form_id['id'];

	$date = date('d-m-Y H:i:s');

    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [tambah form] " .$namaForm. " di " .$date;
    fwrite($myfile, "\n". $txt);
    fclose($myfile);

foreach (@$_POST['value'] as $value)
{
   echo mysql_query("INSERT INTO tb_fields VALUES (NULL, '$id_form', '$value')");
   echo $id_form. ' - ' .$value. '<br/>';
   echo $id. '<br/>';
}

header('location: ../index.php?admin=forms&id='.$id);

?>