<?php require_once('Connections/conexion.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php

 $email = 'riclond82@gmail.com';
 $asunto = 'Prueba de Envio';
 $mensaje = 'prueba de envio'.$resu;

// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras  = "MIME-Version: 1.0"."\r\n";
	$cabeceras .= "Content-type: text/html; charset=UTF-8\r\n";
	// Cabeceras adicionales
	$cabeceras .= "From: contacto@aseica.com.ve \n";
	
	// Enviarlo

    mail($email, $asunto, $mensaje, $cabeceras);
	
?>
</body>
</html>