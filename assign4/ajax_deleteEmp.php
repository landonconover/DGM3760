<?php
require 'connect2db.php';


// print_r($_POST);

if (strpos($_POST['id'], "|")) {
   $_POST['id'] = explode("|", $_POST['id']);
}

foreach ($_POST['id'] as $key => $value) {
    $query = "DELETE FROM empTable WHERE `id` = '" . $value ."'";
    echo $query;

    if( mysqli_query($link, $query) ){

        $_POST['id'] = mysqli_insert_id($link);

        echo "[".json_encode($_POST)."]";
    }
}





mysqli_close($link);