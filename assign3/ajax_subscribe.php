<?php
require 'connect2db.php';

foreach ($_POST as $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($link, $value);
}

// print_r($_POST);



$query = "INSERT INTO newsletter (fName, lName, email) VALUES ('".$_POST['fName']."', '".$_POST['lName']."', '".$_POST['email']."')";
// echo $query;

if( mysqli_query($link, $query) ){

    echo "Sucess";
}

mysqli_close($link);