<?php 
	require("PHPMailer.php");
	$mail = new PHPMailer();

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$user_message = $_POST['message'];
	$user_subject = $_POST['subject'];

	//Luego tenemos que iniciar la validación por SMTP:
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Host = "sub5.mail.dreamhost.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
	$mail->Username = "contacto@cimbrapropieades.cl"; // Correo completo a utilizar
	$mail->Password = "cimbra2018"; // Contraseña
	$mail->Port = 25; // Puerto a utilizar

	//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
	$mail->From = "contacto@cimbrapropieades.cl"; // Desde donde enviamos (Para mostrar)
	$mail->FromName = "Consulta Cimbra";

	//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
	$mail->AddAddress("nettox@gmail.com"); // Esta es la dirección a donde enviamos
	$mail->IsHTML(false); // El correo se envía como HTML
	$mail->Subject = $user_subject; // Este es el titulo del email.
	$body =  "Nombre: " . $name . "\n\n" .
	  "Correo: " . $email . "\n\n" .
	  "Fono: " . $phone . "\n\n" .
	  "Mensaje: " . $user_message ;
	$mail->Body = $body; // Mensaje a enviar
	$exito = $mail->Send(); // Envía el correo.
	echo 
	    '<script type="text/javascript">
	      alert("Mensaje enviado");
	      location.replace("https://www.cimbrapropiedades.cl/");

	    </script>';
?>