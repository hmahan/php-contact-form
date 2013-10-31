<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

if(empty($name)||empty($email)||empty($message)) {
    echo "Name, email and message are mandatory!";
    exit;
}

if(injected($email))
{
    echo "Bad email value!";
    exit;
}

$formcontent=" From: $name \n Phone: $phone \n Message: $message";
$recipient = "hailey.mahan@gmail.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";

function injected($str) {
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
