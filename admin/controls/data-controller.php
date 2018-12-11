<?php

include '../../config/config.php';
include '../../functions/sql.php';

$id = @$_GET['id'];


$qry = mysql_query("SELECT COUNT(*) AS hitung FROM tb_fields WHERE id_form = $id");
$hit = mysql_fetch_array($qry);

$l= $hit['hitung'];


$dat = mysql_query("SELECT * FROM tb_fields WHERE id_form = $id");
$abc= mysql_fetch_assoc($dat);

$k = $abc['id'];
$dir = 0;
$newval = '';
for ($i=0; $i<$l; $i++)
{
    foreach (@$_POST['form'] as $value)
    {
        
        if(($dir == $k) AND $value == $newval)
        {
            $k++;            
        }
        else if (($dir != $k) AND $dir < ($k+$l) AND ($value != $newval))
        {
            mysql_query("INSERT INTO tb_values VALUES(NULL, $k, '$value', NULL)");
            echo $dir;
            echo $value;
            $newval = $value;
            $dir = $k;

            $date = date('d-m-Y H:i:s');

            $myfile = fopen("log.txt", "a") or die("Unable to open file!");
            $txt = "[info] - id_peg: ".$_SESSION['nama'].  " [tambah data] ".$value."dengan id form:" .$form. " di " .$date;
            fwrite($myfile, "\n". $txt);
            fclose($myfile);
            
        }
        
    }
}

header('location:../index.php?admin=data&id='.$id);


?>