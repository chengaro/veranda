<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
header('Content-Type: application/json');
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    print json_encode(array('message' => 'Email is not valid', 'code' => 0));
    exit();
}
$content="Name: $name<br>Email $email<br>Subject: $subject<br>Message: $message";
$recipient = "1cniii@gmail.com";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: Yury <1cniii@gmail>' . "\r\n";
$headers .= 'From: Admin <admin@chengaro.freeopti.ru>';

mail($recipient, "Пришла форма с сайта", $content, $headers) or die("Error!");

print json_encode(array('message' => 'Message successfully sent!', 'code' => 1));
exit();
?>
