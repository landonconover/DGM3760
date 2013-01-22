<?php
require 'connect2db.php';

$fName = "Jacoby";
$lName = "Conover";
$email = "jacoby@fun.com";
$empType = "2";
$gender = "Male";

foreach ($_POST as $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($link, $value);
}

// print_r($_POST);



$query = "INSERT INTO empTable (fName, lName, email, empTypeFID, gender) VALUES ('".$_POST['fName']."', '".$_POST['lName']."', '".$_POST['email']."', '".$_POST['empType']."', '".$_POST['gender']."')";
// echo $query;

if( mysqli_query($link, $query) ){

    $_POST['id'] = mysqli_insert_id($link);

    echo "[".json_encode($_POST)."]";
}

mysqli_close($link);