<?php

$q = @$_POST['tables'];
$id = @$_GET['id'];

header('location: ../index.php?admin=forms&id='.$id.'&q='.$q);

echo $id;

?>