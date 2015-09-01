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

$maxRows_oferta = 6;
$pageNum_oferta = 0;
if (isset($_GET['pageNum_oferta'])) {
  $pageNum_oferta = $_GET['pageNum_oferta'];
}
$startRow_oferta = $pageNum_oferta * $maxRows_oferta;

$me_oferta = "0";
if (isset($mes)) {
  $me_oferta = $mes;
}
mysql_select_db($database_conexion, $conexion);
$query_oferta = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intEstado = 1 AND tbloferta_academica.intMes = %s ORDER BY RAND()", GetSQLValueString($me_oferta, "int"));
$query_limit_oferta = sprintf("%s LIMIT %d, %d", $query_oferta, $startRow_oferta, $maxRows_oferta);
$oferta = mysql_query($query_limit_oferta, $conexion) or die(mysql_error());
$row_oferta = mysql_fetch_assoc($oferta);

if (isset($_GET['totalRows_oferta'])) {
  $totalRows_oferta = $_GET['totalRows_oferta'];
} else {
  $all_oferta = mysql_query($query_oferta);
  $totalRows_oferta = mysql_num_rows($all_oferta);
}
$totalPages_oferta = ceil($totalRows_oferta/$maxRows_oferta)-1;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.s {
	padding-top: 7px;
	padding-right: 12px;
	padding-bottom: 7px;
	padding-left: 12px;
	margin: 5px;
	float: left;
	border-radius: 8px;
	box-shadow: 2px 2px 2px 2px #006;
	border-bottom-width: 4px;
	border-bottom-style: solid;
	border-bottom-color: #000;
}
</style>
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
<td colspan="2" align="left" valign="top" bgcolor="#fff" style="border-bottom-width: 4px; border-bottom-style: solid;	border-bottom-color: #000; "><img src="http://www.aseica.com.ve/imagenes/logo/logo-pequeno-2.png" width="270" height="133" style="margin: 5px;" ></td>
</tr>
<tr>
<td align="left" valign="top" style="background-color: #F8F5FC; padding: 10px;" bgcolor="#e4e4e4;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
<td align="left" valign="top" style="font-family: Verdana, Geneva, sans-serif; color: #000000;">
<div style="font-size:24px;"><b>Lorem ipsum dolor sit </b></div>
<div style="font-size:14px;"><br>
<b>consectetur adipiscing elit. Vestibulum magna enim, volutpat nec imperdiet id, tempor venenatis eros.</b></div><br>
<br>
<br>

<div style="font-size:24px;"><b>Ofertas Del Mes </b></div>

<?php
$cont = 0;
do { ?>
<div style="width: 30%; float: left; margin: 5px; border: 2px solid #009; padding: 5px;">
<div style="width: 100%;" align="center"><br>
<img src="http://www.aseica.com.ve/imagenes/oferta_academica/<?php echo $row_oferta['txtImagen_Peq']; ?>" style="display: block; max-height: 100%; max-width: 100%;"></div><br>
<br>
<div style="font-size:11px; width: 100%;"><br>
<span style="line-height: 1.3em; margin: 17px 0 9px 0; width: 100%; text-align: center;	color: #000000;	font-size: 20px;	letter-spacing: 0.5px"><?php echo $row_oferta['strTitulo']; ?></span><br><br>
<span style="font-size: 13px; color: #000000; line-height: 1.4em; padding: 0px 15px 10px 15px; text-align: center;"><?php echo $row_oferta['strFec_Inicio']; ?></span><br><br>
<a href="http://www.aseica.com.ve/eleg_oferta-<?php echo RemUrl($row_oferta['strTitulo']); ?>_<?php echo $row_oferta['idOferta']; ?>" style="	background: #107fc9; border: 1px solid #107fc9; font-size:13px; color:#fff; padding-top: 7px; padding-right: 12px; 	padding-bottom: 7px; padding-left: 12px;margin: 5px;">Leer M&aacute;s</a>
<br>
<br>
</div>
</div>

<?php if ($cont == 2) {?>
<div style="display: block;	clear: both; float: none; line-height: 0px; font-size: 0px;"></div>
<?php } ?>
<?php if ($cont == 5) {?>
<div style="display: block;	clear: both; float: none; line-height: 0px; font-size: 0px;"></div>
<?php } ?>

<?php
$cont = $cont + 1;
} while ($row_oferta = mysql_fetch_assoc($oferta)); ?>


<div style="font-size:16px; color:#0cade3;"><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum magna enim, volutpat nec imperdiet id</b></div>
<br>
<br>

<div>
<a href="https://twitter.com/aseicadevzla"><img src="http://www.aseica.com.ve/imagenes/envio_email/tweet48.png" width="48" height="48"></a> <a href="https://www.facebook.com/ASEICAdevzla"><img src="http://www.aseica.com.ve/imagenes/envio_email/face48.png" width="48" height="48"></a> <a href="#"><img src="http://www.aseica.com.ve/imagenes/envio_email/in48.png" width="48" height="48"></a>
</div>

</td>

</tr>

</table>

</td>
</tr>
</table>
<br>
<br></td>
</tr>
</table>


</body>
</html>
<?php
mysql_free_result($oferta);
?>
