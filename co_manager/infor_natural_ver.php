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

$var_inscrip = "0";
if (isset($_GET['id'])) {
  $var_inscrip = $_GET['id'];
}
mysql_select_db($database_conexion, $conexion);
$query_inscrip = sprintf("SELECT * FROM tblpre_incrip WHERE tblpre_incrip.idPre_inscripcion = %s", GetSQLValueString($var_inscrip, "int"));
$inscrip = mysql_query($query_inscrip, $conexion) or die(mysql_error());
$row_inscrip = mysql_fetch_assoc($inscrip);
$totalRows_inscrip = mysql_num_rows($inscrip);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
.body {
	font-family: "Arial Black", Gadget, sans-serif;
	font-size: 16px;
}
</style>
</head>

<body>

<h1><strong>Llamada de Contacto Inicial.</strong></h1>
<p>Debe darse la impresión de amabilidad, Lo primero que debe hacerse es  dar el mensaje de bienvenida </p>
<p>El mensaje de Saludo Inicial sería:</p>
<p>-Aló, Buenos (días – tardes) podría comunicarme con  (<strong><?php echo ucfirst(strtolower($row_inscrip['strNomb_Respon'])); ?> <?php echo ucfirst(strtolower($row_inscrip['strApellido_Respon'])); ?></strong>)<br />
  (Interlocutor responde)<br />
  -Buenos (días – tardes), le habla (<?php echo  ObtNombAdm($_SESSION['MM_idAdmin']); ?>) de la Academia de Servicios Educativos Integrales  Compañía Anónima,</p>
<p>¿Cómo está?<br />
  <br />
  (Interlocutor responde)<br />
  Le llamo para verificar que hemos recibido una solicitud de información  de su parte por nuestro correo electrónico sobre el curso de (<strong><?php echo ObtNombOferAcade($row_inscrip['intOferta']); ?> <?php echo FecDelCalen($row_inscrip['intCalendario']); ?></strong>) y queremos confirmar su interés en realizarlo.<br />
  (Interlocutor responde)<br />
  Recibimos una solicitud del correo (<strong><?php echo $row_inscrip['strEmaio_Repre']; ?></strong>) ¿es este su  correo electrónico? <br />
  Si es el correo pero no pidió nada:<br />
  Bueno, debe haber sido un error de alguien que solicitó información y  colocaría una letra mal. Perdone usted la molestia. Que tenga buenos (días – tardes)<br />
  Si es positivo:<br />
- Ok, para este curso tenemos disponibles las siguientes fechas (Fechas  del curso) le pregunto ¿Cuál es la fecha más conveniente para usted?</p>
<p><br />
  (Interlocutor elige)</p>
<p> Perfecto. En unos minutos  recibirá un correo electrónico con la información que le estoy proporcionando y  otros detalles de interés, así como también las formas de pago que tenemos  disponibles. ¿Tiene usted alguna pregunta o requiere de otro dato adicional a  lo que le he comentado?<br />
  (Si es positivo, se le responde) <br />
  -¿Desea usted saber algo más?<br />
  (Si es positivo, se le responde y así sucesivamente hasta cubrir  todas las dudas) <br />
  Si es negativo:<br />
- Bien, pronto recibirá nuestro correo electrónico para iniciar el  proceso de preinscripción.   Nuevamente  (Nombre del  solicitante) Muchísimas gracias por elegir a ASEICA como su alternativa de  crecimiento profesional. Que tenga usted Buenos (días – tardes) </p>


<h1>Datos Registrados</h1>
<p><br>
  <strong>Id de la Pre-Incripción: </strong><?php echo $row_inscrip['idPre_inscripcion']; ?><br /><br />
  <strong>Fecha Solicitada: </strong><?php echo $row_inscrip['datFecha_Solici']; ?><br /><br />
  <strong>Hora Solicitada: </strong><?php echo $row_inscrip['timHora']; ?><br /><br />
  <strong>Información Extra: </strong><?php echo $row_inscrip['txtInfo_Extra']; ?><br /><br />
  <strong>Oferta Seleccionada: </strong><?php echo ObtNombOferAcade($row_inscrip['intOferta']); ?> <?php echo FecDelCalen($row_inscrip['intCalendario']); ?><br /><br />
  <strong>Nombre y Apellido Del Solicitante: </strong><?php echo ucfirst(strtolower($row_inscrip['strNomb_Respon'])); ?> <?php echo ucfirst(strtolower($row_inscrip['strApellido_Respon'])); ?><br /><br />
  <strong>Cedula Del Solicitante: </strong><?php echo $row_inscrip['strCI']; ?><br /><br />
  <strong>Email Del Solicitante: </strong><?php echo $row_inscrip['strEmaio_Repre']; ?><br /><br />
  <strong>Teléfono Del Solicitante: </strong><?php echo $row_inscrip['strTelefono_Repre']; ?></p>
<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($inscrip);
?>
