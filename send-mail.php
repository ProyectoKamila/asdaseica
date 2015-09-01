<meta charset="iso-8859-1" />
<?php
/**
* Author: Luis Zuno
* Email: luis@luiszuno.com
* URL: http://www.luiszuno.com
* Version: 1.0.0 
**/
$res = date('H:i:s', (strtotime ("2 Hours -30 minute")));
$resu = date('Y/m/d', (strtotime ("2 Hours -30 minute")));
$resu2 = date("N", (strtotime ("2 Hours -30 minute")));
function ObtFecha($fecha){return substr($fecha,8,2).substr($fecha,4,4).substr($fecha,0,4); }$subject = $_POST['subject'];$to = explode(',', $_POST['to'] );$from = $_POST['email'];$nombre = $_POST['name'];$email = $_POST['email'];$telefono = $_POST['tel'];$comen = $_POST['comments'];$asunto = 'Envio de mensaje por Contacto Aseica';
$mensaje = '
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ASEICA C.A</title>
</head>

<body>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td><img src="http://www.aseica.com.ve/imagenes/logo/logo-pequeno-2.png" width="400" height="196" /></td>
  </tr>
  <tr>
    <td>
	Hola '.$nombre.', hoy '.ObtFecha($resu).' a las '.$res.' te comunicaste a través de Contacto Aseica.<br /><br />
	El Email de contacto ser&aacute;: '.$email.'<br /><br />
	El teléfono de contacto ser&aacute;: '.$telefono.'<br /><br />
	Tu mensaje fue el siguiente:<br /><br />
	'.$comen.'<br /><br />
	El personal de aseica.com.ve se comunicara con usted en la brevedad posible.
	</td>
  </tr>
  <tr>
    <td>Muchas gracias, también puedes contactarnos a través de nuestro correo electrónico: <a href="mailto:contacto@aseica.com.ve">contacto@aseica.com.ve</a></td>
  </tr>
</table>
</body>
</html>';

// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras  = 'MIME-Version: 1.0' . "\n";
	$cabeceras .= "Content-type: text/html; charset=UTF-8\r\n";
	// Cabeceras adicionales
	$cabeceras .= "From: contacto@aseica.com.ve \n";
	
	// Enviarlo
foreach($to as $mail){
   mail($email, $asunto, $mensaje, $cabeceras);
}

//data
$msg  = "NOMBRE: ".$_POST['name']."<br>\n";
$msg .= "EMAIL: ".$_POST['email']."<br>\n";
$msg .= "TELEFONO: ".$_POST['tel']."<br>\n";
$msg .= "COMENTARIO: ".$_POST['comments']."<br>\n";

//Headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: <".$from. ">" ;


//send for each mail
foreach($to as $mail){
   mail($mail, $subject, $msg, $headers);
}

?>
