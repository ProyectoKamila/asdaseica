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

$var_contactos = "0";
if (isset($_GET['id'])) {
  $var_contactos = $_GET['id'];
}
mysql_select_db($database_conexion, $conexion);
$query_contactos = sprintf("SELECT * FROM tblcontacto_interno WHERE tblcontacto_interno.idContacto = %s", GetSQLValueString($var_contactos, "int"));
$contactos = mysql_query($query_contactos, $conexion) or die(mysql_error());
$row_contactos = mysql_fetch_assoc($contactos);
$totalRows_contactos = mysql_num_rows($contactos);
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
<strong>Nombre:</strong> <?php echo $row_contactos['strNombre']; ?>
</li>
<li class="list-group-item">
<strong>Apellido:</strong> <?php echo $row_contactos['strApellido']; ?>
</li>
<li class="list-group-item">
<strong> Telèfono 1:</strong> <?php echo $row_contactos['strTelefono_01']; ?>
</li>
<li class="list-group-item">
<strong>Telèfono 2:</strong> <?php echo  ObtNA($row_contactos['strTelefono_02']); ?>
</li>
<li class="list-group-item">
<strong>Email 1:</strong> <?php echo  ObtNA($row_contactos['strEmail_01']); ?>
</li>
<li class="list-group-item">
<strong>Email 2:</strong> <?php echo  ObtNA($row_contactos['strEmail_02']); ?>
</li>
<li class="list-group-item">
<strong>Compañia:</strong> <?php echo  ObtNA($row_contactos['strCompania']); ?>
</li>
<li class="list-group-item">
<strong>Cargo:</strong> <?php echo  ObtNA($row_contactos['strCargo']); ?>
</li>
<li class="list-group-item">
<strong>Facebook:</strong> <?php echo  ObtNA($row_contactos['strFacebook']); ?>
</li>
<li class="list-group-item">
<strong>Twitter:</strong> <?php echo  ObtNA($row_contactos['strTwitter']); ?>
</li>
<li class="list-group-item">
<strong>Linkedin:</strong> <?php echo  ObtNA($row_contactos['strLinkedin']); ?>
</li>
<li class="list-group-item">
<strong>Instagram:</strong> <?php echo  ObtNA($row_contactos['strInstagran']); ?>
</li>
<li class="list-group-item">
<strong>Google +:</strong> <?php echo  ObtNA($row_contactos['strGooglePlus']); ?>
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
mysql_free_result($contactos);
?>
