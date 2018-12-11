<?php

include '../config/config.php';
include '../functions/sql.php';

$u = @$_GET['uname'];
$p = @$_GET['pass'];

$resp = login($u, $p);

echo $resp;
if ($resp == 1)
{
    header('location:../admin/status.php?r=1&u='.$u);

}else{
    header('location:../login/index.php?r=failed');
}

?>