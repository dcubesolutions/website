<?php
  
  if(isset($_POST['submit']))
  {
    require 'php/PHPMailerAutoload.php';
  
    function sendmail($to, $from, $fromName, $body)
    {
      $mail = new PHPMailer;
      $mail->setFrom($from, $fromName);
      $mail->addAddress($to);
      $mail->Subject='Message from the D Cube Solution website.';
      $mail->Body=$body;
      $mail->isHTML(isHTML: false);

      return $mail->send();
    
    }

    $name = $_POST['username'];
    $email = $_POST['email'];
    $body = $_POST['message'];

    if(sendemail($to:'dcubedesignsinfo@gmail.com', $email, $name, $ody))
    {
      header("Location: http://192.168.1.12:7500/successcontact.html");  
    }
  } 
?>