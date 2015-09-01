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

$var_pago = "0";
if (isset($_GET['id'])) {
  $var_pago = $_GET['id'];
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
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Administraci&oacute;n Aseica</title>
<link rel="icon" type="image/png" href="../imagenes/logo/favicon.ico" />

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
<link rel="stylesheet" type="text/css" href="assets/css/fonts/linecons/css/linecons.css">
<link rel="stylesheet" type="text/css" href="assets/css/fonts/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/css/xenon-core.css">
<link rel="stylesheet" type="text/css" href="assets/css/xenon-forms.css">
<link rel="stylesheet" type="text/css" href="assets/css/xenon-components.css">
<link rel="stylesheet" type="text/css" href="assets/css/xenon-skins.css">
<link rel="stylesheet" type="text/css" href="assets/css/custom.css">

<script src="assets/js/jquery-1.11.1.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>

<body>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-default">

<div class="panel-heading">
List Groups
</div>

<div class="panel-body">

<div class="row">
<div class="col-sm-6">

<h5>Contacto <?php echo $row_contactos['idContacto']; ?></h5>

<ul class="list-group list-group-minimal">
<li class="list-group-item">
<strong>Nombre:</strong> <?php echo ObtNombreSolicitante($row_pago['intPre_Inscri']); ?>
</li>
<li class="list-group-item">
<strong>Apellido:</strong> <?php echo ObtApellidoSolicitante($row_pago['intPre_Inscri']); ?>
</li>
<li class="list-group-item">
<strong>Tipo de Pago:</strong> <?php echo ObtTipoPago($row_pago['intTipo_Pago']); ?>
</li>
<li class="list-group-item">
<strong>Banco Desde donde Hizo la Transferencia:</strong> <?php echo $row_pago['strBanco']; ?>
</li>
<li class="list-group-item">
<strong>Referencia de Transferencia o Bauche:</strong> <?php echo $row_pago['strReferencia']; ?>
</li>
<li class="list-group-item">
<strong>Monto Depositado:</strong> <?php echo $row_pago['strMonto']; ?> BsF
</li>
<li class="list-group-item">
<strong>Fecha de Registro:</strong> <?php echo ObtFecha($row_pago['datFecha_Pago']); ?>
</li>

</ul>

</div>
</div>

</div>

</div>
</div>
</div>


</body>

<!-- Bottom Scripts -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/TweenMax.min.js"></script>
<script src="assets/js/resizeable.js"></script>
<script src="assets/js/joinable.js"></script>
<script src="assets/js/xenon-api.js"></script>
<script src="assets/js/xenon-toggles.js"></script>

<!-- Imported scripts on this page -->
<script src="assets/js/jquery-ui/jquery-ui.min.js"></script>

<!-- Imported scripts on this page -->
<script src="assets/js/tocify/jquery.tocify.min.js"></script>

<!-- Imported scripts on this page -->
<script src="assets/js/rwd-table/js/rwd-table.min.js"></script>

<!-- JavaScripts initializations and stuff -->
<script src="assets/js/xenon-custom.js"></script>

</html>
<?php
mysql_free_result($pago);
?>
