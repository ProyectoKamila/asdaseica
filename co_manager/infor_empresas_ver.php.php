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
</head>

<body>

Datos Registrados - <br>
<br>
<br>

Id: <?php echo $row_inscrip['idPre_inscripcion']; ?><br>
Si es Empresa o Persona <?php echo $row_inscrip['intEmp_Perso']; ?><br>
Nombre: <?php echo $row_inscrip['strNombre']; ?><br>
Apellido: <?php echo $row_inscrip['strApellido']; ?><br>
CI: <?php echo $row_inscrip['strCI_RIF']; ?><br>
Dreccion: <?php echo $row_inscrip['txtDireccion']; ?><br>
Telefono 01: <?php echo $row_inscrip['strTelefono_01']; ?><br>
Telefono 02: <?php echo $row_inscrip['strTelefono_02']; ?><br>
Email 01: <?php echo $row_inscrip['strEmail_01']; ?><br>
Email 02: <?php echo $row_inscrip['strEmail_02']; ?><br>
Oferta: <?php echo ObtNombOferEmpre($row_inscrip['intOferta']); ?><br>
Responsable: <?php echo $row_inscrip['strNomb_Respon']; ?><br>
Ci: Res: <?php echo $row_inscrip['strCI']; ?><br>
Cargo: <?php echo $row_inscrip['strCargo']; ?><br>
Email: <?php echo $row_inscrip['strEmaio_Repre']; ?><br>
Telefono: <?php echo $row_inscrip['strTelefono_Repre']; ?><br>
Sexo: <?php echo $row_inscrip['intSexo_represen']; ?><br>
Actividad: <?php echo ObtActComer($row_inscrip['intActividad_Comer']); ?><br>
Denomina: <?php echo ObtDenoComer($row_inscrip['intDenomina_Comer']); ?><br>
Tamaño empresa: <?php echo ObtTamEmpre($row_inscrip['intTam_Empre']); ?><br>
Participantes: <?php echo $row_inscrip['intNume_Part']; ?><br>
Fecha Solicitada: <?php echo $row_inscrip['datFecha_Solici']; ?><br>
Hora Solicitada: <?php echo $row_inscrip['timHora']; ?><br>
Informa Extra: <?php echo $row_inscrip['txtInfo_Extra']; ?><br>
Estado <?php echo $row_inscrip['intEstado']; ?>

</body>
</html>
<?php
mysql_free_result($inscrip);
?>
