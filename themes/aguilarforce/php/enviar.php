<?php
 
require 'PHPMailerAutoload.php';
require 'class.smtp.php';
require 'class.phpmailer.php';
 
$mail = new PHPMailer();
//indico a la clase que use SMTP
$mail->IsSMTP();
//permite modo debug para ver mensajes de las cosas que van ocurriendo
$mail->SMTPDebug = 4;
//Debo de hacer autenticación SMTP
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
//indico el servidor de Gmail para SMTP
$mail->Host = 'smtp.gmail.com';

//indico el puerto que usa Gmail
$mail->Port = 587;
//indico un usuario / clave de un usuario de gmail
$mail->Username = "jgomez.4net@gmail.com";
$mail->Password = "ARLAC_RINO6EVER";
$mail->SetFrom('jgomez.4net@gmail.com', 'Nombre completo');
$mail->AddReplyTo("jgomez.4net@gmail.com","Nombre completo");
$mail->Subject = "Envío de email usando SMTP de Gmail";
$mail->MsgHTML("Hola que tal, esto es el cuerpo del mensaje!");
//indico destinatario
$address = "jgomez.4net@gmail.com";
$mail->AddAddress($address, "Nombre completo");
if(!$mail->Send()) {
echo "Error al enviar: " . $mail->ErrorInfo;
} else {
echo "Mensaje enviado!";
} 