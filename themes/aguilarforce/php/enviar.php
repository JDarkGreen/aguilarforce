<?php

//Incluimos la clase de PHPMailer
require_once('phpmailer/class.phpmailer.php');
 
$correo = new PHPMailer(); //Creamos una instancia en lugar usar mail()
 
//Usamos el SetFrom para decirle al script quien envia el correo
$correo->SetFrom("jgomez.4net@gmail.com", "Mi Codigo PHP");
 
//Usamos el AddReplyTo para decirle al script a quien tiene que responder el correo
$correo->AddReplyTo("jgomez.4net@gmail.com","Mi Codigo PHP");
 
//Usamos el AddAddress para agregar un destinatario
$correo->AddAddress("djgomez.4net@gmail.com", "Robot");
 
//Ponemos el asunto del mensaje
$correo->Subject = "Mi primero correo con PHPMailer";
 
/*
 * Si deseamos enviar un correo con formato HTML utilizaremos MsgHTML:
 * $correo->MsgHTML("<strong>Mi Mensaje en HTML</strong>");
 * Si deseamos enviarlo en texto plano, haremos lo siguiente:
 * $correo->IsHTML(false);
 * $correo->Body = "Mi mensaje en Texto Plano";
 */
$correo->MsgHTML("Mi Mensaje en <strong>HTML</strong>");
 
//Si deseamos agregar un archivo adjunto utilizamos AddAttachment
 
//Enviamos el correo
if(!$correo->Send()) {
  echo "Hubo un error: " . $correo->ErrorInfo;
} else {
  echo "Mensaje enviado con exito.";
}
 
?>