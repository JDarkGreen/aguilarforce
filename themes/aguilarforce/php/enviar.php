<?php

	include("phpmailer/class.phpmailer.php");
 	include("phpmailer/class.smtp.php");

	$mail = new PHPMailer();
	$mail->IsSMTP(); // send via SMTP
	 $mail->SMTPSecure = 'ssl';
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
 	$mail->Port = 465;
	$mail->SMTPAuth = true; // turn on SMTP authentication
	$mail->Username = "jgomez.4net@gmail.com"; // Enter your SMTP username
	$mail->Password = "ARLAC_RINO6EVER"; // SMTP password
	$webmaster_email = "jgomez.4net@gmail.com"; //Add reply-to email address
	$email="jgomez.4net@gmail.com"; // Add recipients email address
	$name="name"; // Add Your Recipient’s name
	$mail->From = $webmaster_email;
	$mail->FromName = "Webmaster";
	$mail->AddAddress($email,$name);
	$mail->AddReplyTo($webmaster_email,"Webmaster");
	$mail->WordWrap = 50; // set word wrap
#	$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment
#	$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
	$mail->IsHTML(true); // send as HTML

	$mail->Subject = "This is your subject";

	$mail->Body = "Hi, this is your email body, etc, etc" ;      //HTML Body

	$mail->AltBody = "Hi, this is your email body, etc, etc";     //Plain Text Body

	if(!$mail->Send()){
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message has been sent";
	}

?>