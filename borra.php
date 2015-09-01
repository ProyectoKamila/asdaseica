<?php require_once('Connections/conexion.php'); ?>
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

$re = 5;

$var_elementos = "0";
if (isset($re)) {
  $var_elementos = $re;
}
mysql_select_db($database_conexion, $conexion);
$query_elementos = sprintf("SELECT * FROM tbloferta_company_objetivos WHERE tbloferta_company_objetivos.intOferta_Company = %s", GetSQLValueString($var_elementos, "int"));
$elementos = mysql_query($query_elementos, $conexion) or die(mysql_error());
$row_elementos = mysql_fetch_assoc($elementos);
$totalRows_elementos = mysql_num_rows($elementos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php do { ?>
  <?php echo $row_elementos['strObjetivo']; ?>
  <?php } while ($row_elementos = mysql_fetch_assoc($elementos)); ?>

</body>
</html>
<?php
mysql_free_result($elementos);
?>
