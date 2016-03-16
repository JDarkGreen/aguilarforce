
<?php
	//Librerías para el envío de mail
	include_once('class.phpmailer.php');
	include_once('class.smtp.php');
	 
	//Recibir todos los parámetros del formulario
	#$asunto = $_POST['asunto'];
	$nombre  = $_POST['input-name'];
	$email   = $_POST['input-email'];
	$mensaje = $_POST['textarea-message'];

	//enviar 
	$para    = "jgomez.4net@gmail.com";
	 
	//Este bloque es importante
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth   = true;
	#$mail->SMTPSecure = "ssl";
	$mail->SMTPSecure = "ssl";
	$mail->Host       = "smtp.gmail.com";
	#$mail->Port       = 465;
	$mail->Port       = 25;
	 
	//Nuestra cuenta
	$mail->Username ='jgomez.4net@gmail.com'; //correo
	$mail->Password = 'ARLAC_RINO5EVER'; //Su password
	 
	//Agregar destinatario
	#$mail->Subject = $asunto;
	$mail->FromName = $nombre;
	$mail->From     = $email;
	$mail->AddAddress($para);
	$mail->Body    = $mensaje;

	//Para adjuntar archivo
	$mail->MsgHTML($mensaje);
 
	if($mail->Send())
	{
	    echo'<script type="text/javascript">
	            alert("Enviado Correctamente");
	         </script>';
	}
	else{
	    echo'<script type="text/javascript">
	            alert("NO ENVIADO, intentar de nuevo");
	         </script>';
	}


?>