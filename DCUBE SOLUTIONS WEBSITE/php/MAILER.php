<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
//Create a new PHPMailer instance

$mail = new PHPMailer;
$mail_admin = new PHPMailer;
try
{
	if(isset($_POST['Email']))
	{
		include "sqlconnec.php";
		
		$firstname=$_POST['username'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		
		echo $username;
		echo $email;
		echo $message;
		
		// mysqli_query($conn,"INSERT into siddhi (firstname,lastname,email,subject,website,message) VALUES('".$firstname."','".$lastname."','".$email."','".$subject."','".$website."','".$message."')");
		
		//$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPAuth = true;
		$mail->Username = "dcubedesignsinfo@gmail.com";
		$mail->Password = "Shiv@2017";
		$mail->setFrom('infodcubesolutionsco@gmail.com', 'D Cube Solution');
		$mail->addAddress($email, $username);
		$mail->Subject = 'Thank you for Contacting Us';
		$mail->AltBody = 'This is a mail from D Cube Solution';

		$mail->Body ='MESSAGE BODY';
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
			header("Location: contact.html");
		// }
		// function save_mail($mail)
		// {
		// 	//You can change 'Sent Mail' to any other folder or tag
		// 	$path = "{imap.asia.secureserver.net:993/imap/ssl}[Gmail]/Sent Mail";
		// 	//Tell your server to open an IMAP connection using the same username and password as you used for SMTP
		// 	$imapStream = imap_open($path, $mail_admin->Username, $mail_admin->Password);
		// 	$result = imap_append($imapStream, $path, $mail_admin->getSentMIMEMessage());
		// 	imap_close($imapStream);
		// 	return $result;
		// }
		//$mail_admin->isSMTP();
		$mail_admin->SMTPDebug = 0;
		$mail_admin->Host = 'smtp.gmail.com';
		$mail_admin->Port = 465;
		$mail_admin->SMTPSecure = 'ssl';
		$mail_admin->SMTPAuth = true;
		$mail_admin->Username = "dcubedesignsinfo@gmail.com";
		$mail_admin->Password = "Shiv@2017";
		$mail_admin->setFrom('infodcubesolutionsco@gmail.com', 'D Cube Solution');
		$mail_admin->addAddress('infodcubesolutionsco@gmail.com', 'Admin');
		$mail_admin->Subject = 'Someone contacted you';
		$mail->AltBody = 'D Cube Solution';

		$mail_admin->Body ="Name: $username  <br>Email: $email<br>Subject: $subject<br>Website: $website<br>Message: $message";
		if (!$mail_admin->send()) {
			echo "Mailer Error: " . $mail_admin->ErrorInfo;
			header("Location: contact.html");
		} else {
			echo "Message sent!";
			header("Location: contact.html");
		// }
		// function save_mail_admin($mail_admin)
		// {
		// 	//You can change 'Sent Mail' to any other folder or tag
		// 	$path = "{imap.asia.secureserver.net:993/imap/ssl}[Gmail]/Sent Mail";
		// 	//Tell your server to open an IMAP connection using the same username and password as you used for SMTP
		// 	$imapStream = imap_open($path, $mail_admin->Username, $mail_admin->Password);
		// 	$result = imap_append($imapStream, $path, $mail_admin->getSentMIMEMessage());
		// 	imap_close($imapStream);
		// 	return $result;
		// }
	}
}
catch(Exception $e) {
 echo 'Message: ' .$e->getMessage();
 }
?>