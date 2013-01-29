<?php 
require 'connect2db.php';

$query = "SELECT * FROM newsletter";
$result = mysqli_query($link, $query);

print_r($_POST);


while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $name = $row['fName'] . " " . $row['lName'];
    $email = $row['email'];

    //email me
    $to = $email;
    $subject = $_POST['subject'];

    $message = "Hello, " . $name . "<br />You have a message from the mailing list!<br /><br />";
    $message .= $_POST['message'];

    $headers = 'From: landon.conover@gmail.com' . "\r\n" .
        'Reply-To: landon.conover@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // only send if the subject contains the code 54321
    if(strpos($_POST['subject'], '54321')){
        $mailReturn = mail( $to, $subject, $message, $headers );
        if ($mailReturn) {
            echo "Message sent. ";
        }
    }

}



//send return for AJAX
// if ( $mailReturn ) {
//     echo 'Sucess';
// } else {
//     echo 'Fail';
// }