<?php
  if(isset( $_POST['name']))
  $name = $_POST['name'];
  if(isset( $_POST['email']))
  $email = $_POST['email'];
  if(isset( $_POST['message']))
  $message = $_POST['message'];
  if(isset( $_POST['subject']))
  $subject = $_POST['subject'];

    ini_set('SMTP','myserver');
    ini_set('smtp_port',567);
    ini_set('sendmail_from',$email);

  $content="From: $name \n Email: $email \n Message: $message";
  $recipient = "nakarmiriya@gmail.com";
  $mailheader = "From: $email \r\n";
  mail($recipient, $subject, $content, $mailheader) or die("Error!");
  echo "Email sent!";
?>