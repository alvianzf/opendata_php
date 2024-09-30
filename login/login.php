<?php

include '../config/config.php';
include '../functions/sql.php';

$username = isset($_GET['uname']) ? $_GET['uname'] : '';
$password = isset($_GET['pass']) ? $_GET['pass'] : '';

$loginResult = login($username, $password);

echo $loginResult;
if ($loginResult == 1)
{
    header('Location: ../admin/status.php?r=1&u=' . urlencode($username));
}
else
{
    header('Location: ../login/index.php?r=failed');
}

?>