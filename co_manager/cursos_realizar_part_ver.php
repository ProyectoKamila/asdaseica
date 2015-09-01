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

$var_Recordset1 = "0";
if (isset($_GET['id'])) {
  $var_Recordset1 = $_GET['id'];
}
mysql_select_db($database_conexion, $conexion);
$query_Recordset1 = sprintf("SELECT * FROM tblcursos_aseica_participantes WHERE tblcursos_aseica_participantes.idParticipante = %s", GetSQLValueString($var_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$var_inscrip = "0";
if (isset($row_Recordset1['intPaticiapante'])) {
  $var_inscrip = $row_Recordset1['intPaticiapante'];
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

<h1>Llamada de Confirmación de Pago</h1>
<p>-Aló, Buenos (días – tardes) por favor con (<strong><?php echo ucfirst(strtolower($row_inscrip['strNomb_Respon'])); ?> <?php echo ucfirst(strtolower($row_inscrip['strApellido_Respon'])); ?></strong>)
  (Interlocutor responde)</p>
<p>-Buenos (días – tardes), le habla (<?php echo ObtNombAdm($_SESSION['MM_idAdmin']); ?>) de la Academia de Servicios Educativos Integrales - ¿Cómo está?</p>
<p>(Interlocutor responde)</p>
<p>Le llamo para para informarle que hemos confirmado su pago para su inscripción en el curso (<strong><?php echo ObtNombOferAcade($row_inscrip['intOferta']); ?> <?php echo FecDelCalen($row_inscrip['intCalendario']); ?></strong>) y queremos darle la más cordial bienvenida a ASEICA.

(Interlocutor responde)</p>
<p>En unos minutos recibirá un correo electrónico con la información que le estoy proporcionando además del paquete de información Inicial para el Participante: allí recibirá algunas indicaciones de carácter administrativo y verá los enlaces que tiene disponible para descargar la bibliografía relacionada con el curso  ¿Tiene usted alguna pregunta o requiere de otro dato adicional a lo que le he comentado?
  
(Si es positivo, se le responde)</p>
<p>-¿Desea usted saber algo más?</p>
<p>(Si es positivo, se le responde y así sucesivamente hasta cubrir todas las dudas)</p>
<p>Si es negativo:
  
  - Bien, como le mencioné, en los próximos minutos recibirá nuestro correo electrónico con toda la información necesaria para llegar a nuestras aulas sin problemas y para revisar de manera general el tema del curso.</p>
<p>Nuevamente Bienvenido(a)  (<strong><?php echo ucfirst(strtolower($row_inscrip['strNomb_Respon'])); ?> <?php echo ucfirst(strtolower($row_inscrip['strApellido_Respon'])); ?></strong>)</p>
<p>Muchísimas gracias por elegir a ASEICA como su alternativa de crecimiento profesional.</p>
<p>Que tenga usted Buenos (días – tardes) </p>
<p>&nbsp;</p>
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

mysql_free_result($Recordset1);
?>
