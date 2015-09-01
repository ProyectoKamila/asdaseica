<?php require_once('../Connections/conexion.php'); ?>
<?php 
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


$var_listas2 = "0";
if (isset($_GET['li'])) {
  $var_listas2 = $_GET['li'];
}
mysql_select_db($database_conexion, $conexion);
$query_listas2 = sprintf("SELECT * FROM tblcursos_aseica_participantes WHERE tblcursos_aseica_participantes.intPaticiapante = %s", GetSQLValueString($var_listas2, "int"));
$listas2 = mysql_query($query_listas2, $conexion) or die(mysql_error());
$row_listas2 = mysql_fetch_assoc($listas2);
$totalRows_listas2 = mysql_num_rows($listas2);

$var_registro = "0";
if (isset($row_listas2['intPaticiapante'])) {
  $var_registro = $row_listas2['intPaticiapante'];
}
mysql_select_db($database_conexion, $conexion);
$query_registro = sprintf("SELECT * FROM tblpre_incrip WHERE tblpre_incrip.idPre_inscripcion = %s", GetSQLValueString($var_registro, "int"));
$registro = mysql_query($query_registro, $conexion) or die(mysql_error());
$row_registro = mysql_fetch_assoc($registro);
$totalRows_registro = mysql_num_rows($registro);

$var_pago = "0";
if (isset($row_listas2['intPago'])) {
  $var_pago = $row_listas2['intPago'];
}
mysql_select_db($database_conexion, $conexion);
$query_pago = sprintf("SELECT * FROM tblpre_incrip_pagos WHERE tblpre_incrip_pagos.idPago = %s", GetSQLValueString($var_pago, "int"));
$pago = mysql_query($query_pago, $conexion) or die(mysql_error());
$row_pago = mysql_fetch_assoc($pago);
$totalRows_pago = mysql_num_rows($pago);



$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

  $updateSQL = sprintf("UPDATE tblcursos_aseica_participantes SET intEstado=%s WHERE idParticipante=%s",
                       GetSQLValueString(10, "int"),
                       GetSQLValueString($row_listas2['idParticipante'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  
 
  $updateSQL = sprintf("UPDATE tblpre_incrip SET intEstado=%s WHERE idPre_inscripcion=%s",
                       GetSQLValueString(10, "int"),
                       GetSQLValueString($row_listas2['intPaticiapante'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result2 = mysql_query($updateSQL, $conexion) or die(mysql_error()); 

  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php

$to = explode(',', $_POST['to'] );
$from = $row_registro['strEmaio_Repre'];

$id_Pre_inscrip = $row_registro['idPre_inscripcion'];
$nombre_apellido_Responsable = ucfirst(strtolower(utf8_decode($row_registro['strNomb_Respon']))).' '.ucfirst(strtolower(utf8_decode($row_registro['strApellido_Respon'])));
$cedula_Respons = $row_registro['strCI'];
$email_Respons  = $row_registro['strEmaio_Repre'];
$telefono_responsable = $row_registro['strTelefono_Repre'];
$sexo3 = ObtTitoPerso($row_registro['intSexo_represen']);
if (ObtSexTitoPerso($row_registro['intSexo_represen']) == 1 ) { $sexo = 'Estimado '; } else { $sexo = 'Estimada '; }
if (ObtSexTitoPerso($row_registro['intSexo_represen']) == 1 ) { $sexo2 = 'ienvenido'; } else { $sexo2 = 'ienvenida'; }
$oferta_Seleccionada = '<strong>'.ObtNombOferAcade($row_registro['intOferta'])." a efectuarse el ".FecDelCalen($row_registro['intCalendario']).'</strong>';
$costo = '<strong>'.ObtCostoLetOferAcade($row_registro['intOferta']).' ('.ObtCostoOferAcade($row_registro['intOferta']).') Bolívares </strong>';
$carta_compromiso = $row_registro['intCartaCompromiso'];
$boletines = $row_registro['intBoletines'];
$informacion_extra = $row_registro['txtInfo_Extra'];
$fecha_solicitada = ObtFecha($row_registro['datFecha_Solici']);
$hora_solicitada = $row_registro['timHora'];
$numr =	rand(5, 15);
$numr2 = rand(75, 485);

$asunto   = 'INSCRIPCIÓN – CURSO DE '.$oferta_Seleccionad.ObtFecha($resu);

$mensaje = '
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ASEICA C.A</title>
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="center" valign="top" bgcolor="#797979" style="background-color: #43C1D7;"><br>
<br>
<table width="800" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan="2" align="left" valign="top" bgcolor="#000" style="font-weight: bold; color: #FFF; font-size: 18px; padding: 7px;">
ACADEMIA <span style="color: #00c8d5;">DE SERVICIOS</span> EDUCATIVOS <span style="color: #00c8d5;">INTEGRALES</span>
</td>
</tr>
<tr>
<td colspan="2" align="left" valign="top" bgcolor="#fff" style="border-bottom-width: 4px; border-bottom-style: solid; border-bottom-color: #000; "><a href="http://aseica.com.ve/"><img src="http://www.aseica.com.ve/imagenes/logo/logo-pequeno-2.png" width="270" height="133" style="margin: 5px; padding: 10px;"></a></td>
</tr>
<tr>
<td align="left" valign="top" style="background-color: #F8F5FC; padding: 10px;" bgcolor="#e4e4e4;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
';

$mensaje .= '
<tr>
<td align="left" valign="top" style="font-family: Verdana, Geneva, sans-serif; color: #000000;">
<div style="font-size:24px;"><b>'.$sexo.' '.$sexo3.' '.$nombre_apellido_Responsable.': </b></div>
<div style="font-size:14px;"><br>






<p style="text-align: justify;"></p>






<p style="text-align: justify;">¡Nuevamente gracias y b'.$sexo2.'!</p>

<p style="text-align: justify;">Quedando a sus gratas órdenes</p>
<p align="center">Dirección Académica</p>
<p align="center">ASEICA</p>

</div><br>
<br>
<br>
';

$mensaje .= '
<div style="display: block;	clear: both; float: none; line-height: 0px; font-size: 0px;"></div>
<br>

<div>
<a href="https://twitter.com/aseicadevzla"><img src="http://www.aseica.com.ve/imagenes/envio_email/tweet48.png" width="48" height="48"></a> <a href="https://www.facebook.com/ASEICAdevzla"><img src="http://www.aseica.com.ve/imagenes/envio_email/face48.png" width="48" height="48"></a> <a href="#"><img src="http://www.aseica.com.ve/imagenes/envio_email/in48.png" width="48" height="48"></a>
</div>
</td>
</tr>

</table>

</td>
</tr>
<tr>
<td colspan="2" align="left" valign="top" bgcolor="#000" style="font-weight: bold; color: #FFF; font-size: 18px; padding: 7px;">
Números <span style="color: #00c8d5;">(0212) 794 -12 -42 / (0212) 793 -86 -99</span>
</td>
</tr>
</table>
<br>
<br></td>
</tr>
</table>

</body>
</html>';

// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras  = 'MIME-Version: 1.0'."\r\n";
	$cabeceras .= "Content-type: text/html; charset=UTF-8\r\n";
	// Cabeceras adicionales
	$cabeceras .= "From: contacto@aseica.com.ve \n";
	
	// Enviarlo
foreach($to as $mail){
    mail($email_Respons, $asunto, $mensaje, $cabeceras);
}

$mail2 = 'res_inscrip@aseica.com.ve';
$mail3 = 'inscripciones@aseica.com.ve';

//data

$msg = "Hoy ".$resu." a las ".$res2."<strong> Se Acepto el Cupo del id: </strong>".$id_Pre_inscrip."<br><br><br>\n";
$msg .= "<strong>Nombre Y Apellido Solicitante: </strong>".$nombre_apellido_Responsable."<br><br>\n";
$msg .= "<strong>Cedula del Solicitante: </strong>".$cedula_Respons."<br><br>\n";
$msg .= "<strong>EMAIL del Solicitante: </strong>".$email_Respons."<br><br>\n";
$msg .= "<strong>Teléfono del Solicitante: </strong>".$telefono_responsable."<br><br>\n";
$msg .= "<strong>Oferta Seleccionada: </strong>".$oferta_Seleccionada."<br><br>\n";
$msg .= "<strong>Información Extra: </strong>".$informacion_extra."<br><br><br>\n";

//Headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: <".$from. ">" ;

//send for each mail

   mail($mail2, $asunto, $msg, $headers);
   mail($mail3, $asunto, $msg, $headers);
   
?>

<META HTTP-EQUIV="Refresh" CONTENT="3; URL=cursos_realizar_lista.php?li=<?php echo $row_listas2['intCurso']; ?>">

</body>
</html>