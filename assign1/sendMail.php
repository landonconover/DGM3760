<?php 

// print_r($_POST);

$name = $_POST['name'];
$email = $_POST['email'];
$reason = $_POST['reason'];
$comments = $_POST['comments'];
$bouns = $_POST['bouns'];

$to = 'landon.conover@gmail.com';
$subject = 'Comment Form';
$message = 'You have a new comment!<br><br> Their name is: '. $name . '<br> And their Email is: '. $email .'<br>Reason for contacting you: '. $reason . '<br>Comments:<br>'. $comments .'<br><br>Here is their joke!<br>' . $bouns;
$headers = 'From: landon.conover@gmail.com' . "\r\n" .
    'Reply-To: landon.conover@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


$mailReturn = mail( $to, $subject, $message, $headers );

if ( $mailReturn ) {
    echo 'Sucess';
} else {
    echo 'Fail';
}