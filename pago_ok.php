<?php require_once('Connections/conexion.php'); if (!function_exists("GetSQLValueString")) { function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") { if (PHP_VERSION < 6) { $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; } $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue); switch ($theType) { case "text":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break; case "long":case "int":$theValue = ($theValue != "") ? intval($theValue) : "NULL"; break;case "double":$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";break;case "date":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL"; break;  case "defined": $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue; break;} return $theValue;}} $editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) { $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);}$var_pago = "0";if (isset($_GET['ulo'])) {  $var_pago = $_GET['ulo'];}mysql_select_db($database_conexion, $conexion);$query_pago = sprintf("SELECT * FROM tblpre_incrip_pagos WHERE tblpre_incrip_pagos.idPago = %s", GetSQLValueString($var_pago, "int"));$pago = mysql_query($query_pago, $conexion) or die(mysql_error());$row_pago = mysql_fetch_assoc($pago);$totalRows_pago = mysql_num_rows($pago);$var_registro = "0";if (isset($row_pago['intPre_Inscri'])) {  $var_registro = $row_pago['intPre_Inscri'];}mysql_select_db($database_conexion, $conexion);$query_registro = sprintf("SELECT * FROM tblpre_incrip WHERE tblpre_incrip.idPre_inscripcion = %s", GetSQLValueString($var_registro, "int"));$registro = mysql_query($query_registro, $conexion) or die(mysql_error());$row_registro = mysql_fetch_assoc($registro);$totalRows_registro = mysql_num_rows($registro);?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Academia de Servicios Educativos Integrales</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image/png" href="imagenes/logo/favicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet" />
<link href="css/animate.css" rel="stylesheet" />
<link href="css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/blue.css" id="style-switch" />
<!-- REVOLUTION BANNER CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.min.css" media="screen" />
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="../css/ie9.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" href="css/slides.css" />
<link rel="stylesheet" type="text/css" href="css/inline.min.css" />
<!-- LayerSlider -->
<link rel="stylesheet" href="layerslider/css/layerslider.css" type="text/css">
<link rel="stylesheet" href="layerslider/assets/css/style.css" type="text/css">
<!--JS Inclution-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>  
<script type="text/javascript" src="bootstrap-new/js/bootstrap.min.js"></script>
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/jquery.scrollUp.min.js"></script>
<script type="text/javascript" src="js/jquery.sticky.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.flexisel.min.js"></script>
<script type="text/javascript" src="js/jquery.imedica.min.js"></script>
<script type="text/javascript" src="js/custom-imedicajs.min.js"></script>
<script type='text/javascript'>
$(window).load(function(){
$('#loader-overlay').fadeOut(900);
$("html").css("overflow","visible");
});
</script>

<!-- LayerSlider -->
<script src="layerslider/jQuery/jquery-easing-1.3.js" type="text/javascript"></script>
<script src="layerslider/jQuery/jquery-transit-modified.js" type="text/javascript"></script>
<script src="layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#layerslider').layerSlider({
        skinsPath : 'layerslider/skins/',
        skin : 'borderlessdark3d',
        thumbnailNavigation : 'hover',
        hoverPrevNext : false,
        autoPlayVideos : false
    });
});		
</script>
</head>
<body>
<div id="loader-overlay"><img src="images/loader.gif" alt="Loading" /></div>

<header>
            
<div class="header-bg">

<div id="search-overlay">
<div class="container">
<div id="close">X</div>

<input id="hidden-search" type="text" placeholder="Start Typing..." autofocus autocomplete="off"  /> <!--hidden input the user types into-->
<input id="display-search" type="text" placeholder="Start Typing..." autofocus autocomplete="off" /> <!--mirrored input that shows the actual input value-->
</div></div>


<!--Topbar-->
<div class="topbar-info no-pad fondo_negro">                    
<div class="container">                     
<div class="social-wrap-head col-md-9 no-pad letras_supe">ACADEMIA DE SERVICIOS EDUCATIVOS INTEGRALES</div                          
><div class="top-info-contact pull-right col-md-3">
<ul>
<?php include("includes/redes_sociales.php"); ?>
</ul>
<div id="search" class="fa fa-search search-head"></div>
</div>                      
</div>
</div><!--Topbar-info-close-->

<div id="headerstic">

<div class="top-bar container">
<div class="row fonfo_blanco">
<nav class="navbar navbar-default" role="navigation">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">

<button type="button" class="navbar-toggle icon-list-ul" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
</button>
<button type="button" class="navbar-toggle icon-rocket" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
<span class="sr-only">Toggle navigation</span>
</button>

<a href="inicio"><div class="logo"><img src="imagenes/logo/logo-pequeno-2.png"></div></a>
<div class="clearfix"></div>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
<?php include("includes/menu_supe.php"); ?>
</ul>
</div><!-- /.navbar-collapse -->

<div class="hide-mid collapse navbar-collapse option-drop" id="bs-example-navbar-collapse-2">

<ul class="nav navbar-nav navbar-right other-op">
<?php include("includes/menu_mobil.php"); ?>
</ul>
</div><!-- /.navbar-collapse -->

</div><!-- /.container-fluid -->
</nav>
</div>    
</div><!--Topbar End-->
</div>

</div>

</header>

<div class="complete-content">
<div class="about-intro-wrap pull-left">
  <div class="bread-crumb-wrap ibc-wrap-1">
  <div class="container">
  <!--Title / Beadcrumb-->
  <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
  <div class="bread-heading"><h1>Registros de Pagos en ASEICA</h1></div>                        
  </div>
  </div>
  </div> 
</div>


<div class="call-action-container">
  <div class="container">
  <div class="col-xs-12 col-md-12 col-sm-12 no-pad call-action-title wow pulse animated" data-wow-delay="0.5s" data-wow-offset="150">
  <div id="call-action-title">Formulario de Pago Enviado Satisfactoriamente</div>
  <p>Luego de Verificar el pago nuestra direcci&oacute;n Acad&eacute;mica se comunicar&aacute; con usted a la brevedad posible.</p>
  </div>
    
  </div>
</div>

<?php

$to = explode(',', $_POST['to'] );
$from = $row_registro['strEmaio_Repre'];

$id_Pre_inscrip = $row_registro['idPre_inscripcion'];

$nombre_apellido_Responsable = ucfirst(strtolower(utf8_decode($row_registro['strNomb_Respon']))).' '.ucfirst(strtolower(utf8_decode($row_registro['strApellido_Respon'])));
$cedula_Respons = $row_registro['strCI'];
$email_Respons  = $row_registro['strEmaio_Repre'];
$telefono_responsable = $row_registro['strTelefono_Repre'];
$oferta_Seleccionada = ObtNombOferAcade($row_registro['intOferta'])." ".FecDelCalen($row_registro['intCalendario']);

$asunto = 'PAGO REPORTADO – Curso '.$oferta_Seleccionad.' de ASEICA '.ObtFecha($resu);

$mail2 = 'res_inscrip@aseica.com.ve';
$mail3 = 'finanzas@aseica.com.ve';

//data

$msg = "Hoy ".$resu." a las ".$res2."<strong> ".$nombre_apellido_Responsable." </strong> Reportó un pgo <br><br><br>\n";
$msg .= "<strong>Nombre Y Apellido Solicitante: </strong>".$nombre_apellido_Responsable."<br><br>\n";
$msg .= "<strong>Cedula del Solicitante: </strong>".$cedula_Respons."<br><br>\n";
$msg .= "<strong>EMAIL del Solicitante: </strong>".$email_Respons."<br>\n";
$msg .= "<strong>Teléfono del Solicitante: </strong>".$telefono_responsable."<br>\n";
$msg .= "<strong>Oferta Seleccionada: </strong>".$oferta_Seleccionada."<br>\n";
$msg .= "<strong>Id de Pago: </strong>".$row_pago['idPago']."<br>\n";
$msg .= "<strong>Id Pre-Inscripcion: </strong>".$row_pago['intPre_Inscri']."<br>\n";
$msg .= "<strong>Tipo de Pago: </strong>".ObtTipoPago($row_pago['intTipo_Pago'])."<br>\n";
$msg .= "<strong>Banco desde Donde Realizo la Transferencia: </strong>".$row_pago['strBanco']."<br>\n";
$msg .= "<strong>Monto depositado: </strong>".$row_pago['strMonto']."<br>\n";
$msg .= "<strong>Referencia de la Transferencia o del Bauche: </strong>".$row_pago['strReferencia']."<br>\n";
$msg .= "<strong>Fecha del Reporte: </strong>".ObtFecha($row_pago['datFecha_Pago'])."<br>\n";

//Headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: <".$from. ">" ;

//send for each mail

mail($mail2, $asunto, $msg, $headers);mail($mail3, $asunto, $msg, $headers);  $updateSQL = sprintf("UPDATE tblpre_incrip SET intEstado=%s WHERE idPre_inscripcion=%s",GetSQLValueString(6, "int"), GetSQLValueString($row_registro['idPre_inscripcion'], "int")); mysql_select_db($database_conexion, $conexion); $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error()); $updateSQL = sprintf("UPDATE tblcursos_aseica_participantes SET datFecha=%s, intPago=%s, intEstado=%s WHERE intPaticiapante=%s", GetSQLValueString($row_pago['datFecha_Pago'], "text"),		   GetSQLValueString($row_pago['idPago'], "int"), GetSQLValueString(6, "int"),GetSQLValueString($row_registro['idPre_inscripcion'], "int")); mysql_select_db($database_conexion, $conexion); $Result2 = mysql_query($updateSQL, $conexion) or die(mysql_error());?>
<br>
<br>
<br>
</div>

<div class="complete-footer">
<footer id="footer">

<div class="container">
<div class="row">
	<?php include("includes/footer.php"); ?>
</div>
</div>       

</footer>

<div class="bottom-footer">
<div class="container">

<div class="row">
<!--Foot widget-->
<div class="col-xs-12 col-sm-12 col-md-12 foot-widget-bottom">
<p class="col-xs-12 col-md-5 no-pad">Copyright <?php echo $ano; ?> Aseica | Todos los Derechos Reservados</p>
<ul class="foot-menu col-xs-12 col-md-7 no-pad">                     
	<?php include("includes/menu_footer.php"); ?>
</ul>
</div>
</div>
</div> 
</div>

</div>

</body>
</html>
<?php mysql_free_result($pago); mysql_free_result($registro); ?>
