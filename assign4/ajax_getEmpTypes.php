<?php
require 'connect2db.php';

$query = "SELECT * FROM empTypes";
$result = mysqli_query($link, $query);


$rows = array();

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $rows[] = $row;
}

print json_encode($rows);