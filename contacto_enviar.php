<?php
	// email a escrito a lápiz
	$to = "info@escritoalapiz.es";
	$subject = "Contacto escrito a lápiz";
	$name_field = $_POST['nombre'];
	$email_field = $_POST['email'];
	$message = $_POST['texto'];
	
	if( isset($_POST['suscribirse']) ){
		$subscribe = "Sí";
	} else {
		$subscribe = "No";
	}
	
	
	$headers = "From: escrito a lapiz <info@escritoalapiz.es>\r\n";
	//$headers .= "Reply-To: escrito a lapiz <info@escritoalapiz.es>\r\n";
	//$headers .= "Return-Path: escrito a lapiz <info@escritoalapiz.es>\r\n";
	$headers .= "CC: chmolano@gmail.com, fguillen.mail@gmail.com\r\n";

	$body = "Nombre: $name_field\n\n";
	$body .= "Email: $email_field\n\n";
	$body .= "Texto:\n $message\n\n";
	$body .= "Quiere suscribirse a nuestras noticias: $subscribe";
	
	// enviar mail admin
	$ok_envio = mail($to, $subject, $body, $headers);

	// email a remitente
	$to = $_POST['email'];
	
	$headers = "From: escrito a lapiz <info@escritoalapiz.es>\r\n";
	//$headers .= "Reply-To: escrito a lapiz <info@escritoalapiz.es>\r\n";
	//$headers .= "Return-Path: escrito a lapiz <info@escritoalapiz.es>\r\n";

	$body ="Hemos recibido un contacto tuyo con esta información:\n\n";
	$body .= "Nombre: $name_field\n\n";
	$body .= "Email: $email_field\n\n";
	$body .= "Texto:\n $message\n\n";
	$body .= "Quieres suscribirse a nuestras noticias: $subscribe\n\n";
	$body .= "Si no nos ponemos en contacto contigo en un par de días, por favor insiste: info@escritoalapiz.es\n\n";
	$body .= "Gracias.";

	// enviar mail remitente
	mail($to, $subject, $body, $headers);
	
	// redirect
	if( $ok_envio ){
		Header ("location: ./contacto_gracias.html"); 	
	} else {
		Header ("location: ./contacto_error.html"); 	
	}
?>
