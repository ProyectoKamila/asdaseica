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

$var_tbladministradores = "0";
if (isset($_GET['id'])) {
  $var_tbladministradores = $_GET['id'];
}
mysql_select_db($database_conexion, $conexion);
$query_tbladministradores = sprintf("SELECT * FROM tbladminis WHERE tbladminis.idAdmin = %s", GetSQLValueString($var_tbladministradores, "int"));
$tbladministradores = mysql_query($query_tbladministradores, $conexion) or die(mysql_error());
$row_tbladministradores = mysql_fetch_assoc($tbladministradores);
$totalRows_tbladministradores = mysql_num_rows($tbladministradores);


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

  $updateSQL = sprintf("UPDATE tbladminis SET strPass=%s WHERE idAdmin=%s",
                       GetSQLValueString(md5(12345), "text"),
                       GetSQLValueString($row_tbladministradores['idAdmin'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

  $updateGoTo = "administrador_lista_edit.php?a=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));

?>
<?php
mysql_free_result($tbladministradores);
?>
