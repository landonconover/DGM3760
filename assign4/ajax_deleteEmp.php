<?php
require 'connect2db.php';


// print_r($_POST);



$query = "DELETE FROM empTable WHERE `id` = '" . $_POST['id'] ."'";
echo $query;

if( mysqli_query($link, $query) ){

    $_POST['id'] = mysqli_insert_id($link);

    echo "[".json_encode($_POST)."]";
}

mysqli_close($link);