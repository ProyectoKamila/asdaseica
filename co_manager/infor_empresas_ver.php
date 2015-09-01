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

<h1>Datos Registrados</h1>
<br>
<?php
echo '<strong>Id de la Pre-Incripción: </strong>'.$row_inscrip['idPre_inscripcion'].'<br /><br />';
echo '<strong>Nombre de la Empresa: </strong>'.$row_inscrip['strNombre'].'<br /><br />';
echo '<strong>Rif de la Empresa: </strong>'.$row_inscrip['strCI_RIF'].'<br /><br />';
echo '<strong>Dirección de la Empresa: </strong>'.$row_inscrip['txtDireccion'].'<br /><br />';
echo '<strong>Teléfono 1 de la Empresa: </strong>'.$row_inscrip['strTelefono_01'].'<br /><br />';
echo '<strong>Teléfono 2 de la Empresa: </strong>'.$row_inscrip['strTelefono_02'].'<br /><br />';
echo '<strong>Email 1 de la Empresa: </strong>'.$row_inscrip['strEmail_01'].'<br /><br />';
echo '<strong>Email 2 de la Empresa: </strong>'.$row_inscrip['strEmail_02'].'<br /><br />';
echo '<strong>Actividad Comercial de la Empresa: </strong>'.ObtActComer($row_inscrip['intActividad_Comer']).'<br /><br />';
echo '<strong>Denominación Comercial de la Empresa: </strong>'.ObtDenoComer($row_inscrip['intDenomina_Comer']).'<br /><br />';
echo '<strong>Tamaño de la Empresa: </strong>'.ObtTamEmpre($row_inscrip['intTam_Empre']).'<br /><br />';
echo '<strong>Número Participantes: </strong>'.$row_inscrip['intNume_Part'].'<br /><br />';
echo '<strong>Fecha Solicitada: </strong>'.$row_inscrip['datFecha_Solici'].'<br /><br />';
echo '<strong>Hora Solicitada: </strong>'.$row_inscrip['timHora'].'<br /><br />';
echo '<strong>Información Extra: </strong>'.$row_inscrip['txtInfo_Extra'].'<br /><br />';

echo '<strong>Oferta Seleccionada: </strong>'.ObtNombOferEmpre($row_inscrip['intOferta']).'<br /><br />';

echo '<strong>Nombre y Apellido Del Solicitante: </strong>'.$row_inscrip['strNomb_Respon'] .' '.$row_inscrip['strApellido_Respon'].'<br /><br />';
echo '<strong>Cedula Del Solicitante: </strong>'.$row_inscrip['strCI_RIF'].'<br /><br />';
echo '<strong>Email Del Solicitante: </strong>'.$row_inscrip['strEmaio_Repre'].'<br /><br />';
echo '<strong>Cargo Del Solicitante: </strong>'.$row_inscrip['strCargo'].'<br /><br />';
echo '<strong>Teléfono Del Solicitante: </strong>'.$row_inscrip['strTelefono_Repre'].'<br /><br />';
 ?>

</body>
</html>
<?php
mysql_free_result($inscrip);
?>
