<?php require_once('Connections/conexion.php'); if (!function_exists("GetSQLValueString")) { function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") { if (PHP_VERSION < 6) { $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; } $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue); switch ($theType) { case "text":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break; case "long":case "int":$theValue = ($theValue != "") ? intval($theValue) : "NULL"; break;case "double":$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";break;case "date":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL"; break;  case "defined": $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue; break;} return $theValue;}}$pg = 3;$var_registro = "0";if (isset($_GET['res'])) {  $var_registro = $_GET['res'];}mysql_select_db($database_conexion, $conexion);$query_registro = sprintf("SELECT * FROM tblpre_incrip WHERE tblpre_incrip.idPre_inscripcion = %s", GetSQLValueString($var_registro, "int"));$registro = mysql_query($query_registro, $conexion) or die(mysql_error());$row_registro = mysql_fetch_assoc($registro);$totalRows_registro = mysql_num_rows($registro);$me_oferta = "0";if (isset($_GET['id'])) {  $me_oferta = $_GET['id'];}mysql_select_db($database_conexion, $conexion);$query_oferta = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intEstado = 1 AND tbloferta_academica.idOferta = %s ORDER BY RAND()", GetSQLValueString($me_oferta, "int"));$oferta = mysql_query($query_oferta, $conexion) or die(mysql_error());$row_oferta = mysql_fetch_assoc($oferta);$totalRows_oferta = mysql_num_rows($oferta);$var_calendario = "0";if (isset($_GET['ca'])) {  $var_calendario = $_GET['ca'];}mysql_select_db($database_conexion, $conexion);$query_calendario = sprintf("SELECT * FROM tbloferta_academica_calendario WHERE tbloferta_academica_calendario.idCalendario = %s", GetSQLValueString($var_calendario, "int"));$calendario = mysql_query($query_calendario, $conexion) or die(mysql_error());$row_calendario = mysql_fetch_assoc($calendario);$totalRows_calendario = mysql_num_rows($calendario);?>
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
              <div class="bread-heading">
                  <h1>Oferta Academica Abierta</h1>
              </div>                        
          </div>
      </div>
    </div> 
</div>

<div class="clear"></div>

<div class="call-action-container">
  <div class="container">
  <div class="col-xs-12 col-md-12 col-sm-12 no-pad call-action-title wow pulse animated" data-wow-delay="0.5s" data-wow-offset="150">
  <div id="call-action-title">Formulario Enviado Satisfactoriamente</div>
  <p align="center">Gracias por su pago, una vez confirmada la transacci&oacute;n, nuestra Direcci&oacute;n Acad&eacute;mica le contactar&aacute;  nuevamente.</p>
    
  </div>
    
  </div>
</div>

<div class="container">
  <div class="row">
<?php  $to = explode(',', $_POST['to'] ); $from = $row_registro['strEmaio_Repre'];$id_Pre_inscrip = $row_registro['idPre_inscripcion'];$nombre_apellido_Responsable = ucfirst(strtolower(utf8_decode($row_registro['strNomb_Respon']))).' '.ucfirst(strtolower(utf8_decode($row_registro['strApellido_Respon'])));$cedula_Respons = $row_registro['strCI'];$email_Respons  = $row_registro['strEmaio_Repre'];$telefono_responsable = $row_registro['strTelefono_Repre'];$sexo3 = ObtTitoPerso($row_registro['intSexo_represen']);if (ObtSexTitoPerso($row_registro['intSexo_represen']) == 1 ) { $sexo = 'Estimado '; } else { $sexo = 'Estimada '; }if (ObtSexTitoPerso($row_registro['intSexo_represen']) == 1 ) { $sexo2 = 'Bienvenido'; } else { $sexo2 = 'Bienvenida'; }$fechas = ObtFechaDia($row_calendario['datFecha_01']); if ($row_calendario['datFecha_02'] != ''){ $fechas .= ', '.ObtFechaDia($row_calendario['datFecha_02']); } if ($row_calendario['datFecha_03'] != ''){ $fechas .= ', '.ObtFechaDia($row_calendario['datFecha_03']); } if ($row_calendario['datFecha_04'] != '') { $fechas .= ', '.ObtFechaDia($row_calendario['datFecha_04']); } if ($row_calendario['datFecha_05'] != '') { $fechas .= ', '.ObtFechaDia($row_calendario['datFecha_05']); } if ($row_calendario['datFecha_06'] != "") { $fechas .= ", ".ObtFechaDia($row_calendario['datFecha_06']); }$fechas .= " de ".ObtMes($row_calendario['intMes'])." del ".$row_calendario['intAno'];$oferta_Seleccionada = "<strong>".$row_oferta['strTitulo']."</strong> que se efectuar&aacute; en fecha: <strong>".$fechas."</strong>";$carta_compromiso = $row_registro['intCartaCompromiso'];$boletines = $row_registro['intBoletines'];$informacion_extra = $row_registro['txtInfo_Extra'];$fecha_solicitada = ObtFecha($row_registro['datFecha_Solici']);$hora_solicitada = $row_registro['timHora'];$asunto  = 'PREINSCRIPCIÓN – Curso '.$oferta_Seleccionad.' de ASEICA '.ObtFecha($resu);
$mensaje = '
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ASEICA C.A</title>
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
<td colspan="2" align="left" valign="top" bgcolor="#fff" style="border-bottom-width: 4px; border-bottom-style: solid; border-bottom-color: #000; "><a href="http://aseica.com.ve/"><img src="http://www.aseica.com.ve/imagenes/logo/logo-pequeno-2.png" width="270" height="133" style="margin: 5px; padding: 10px;"></a></td>
</tr>
<tr>
<td align="left" valign="top" style="background-color: #F8F5FC; padding: 10px;" bgcolor="#e4e4e4;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
<td align="left" valign="top" style="font-family: Verdana, Geneva, sans-serif; color: #000000;">
<div style="font-size:24px;"><b>'.$sexo.' '.$sexo3.' '.$nombre_apellido_Responsable.'</b></div>
<div style="font-size:14px;"><br>
<p style="text-align: justify;">Para la Academia de Servicios Educativos Integrales C.A. – ASEICA, es un placer darle la bienvenida y a la vez agradecerle por habernos seleccionado como su plataforma de crecimiento profesional.</p>
<p style="text-align: justify;">Hemos recibido su solicitud de información sobre nuestro Curso de<br>
'.$oferta_Seleccionada.'</p>
<p style="text-align: justify;">Nuestra Direcci&oacute;n Académica establecer&aacute; contacto con usted para los efectos de informarle sobre la disponibilidad de cupo e iniciar el proceso de inscripci&oacute;n.</p>
<br>
<p style="text-align: justify;">Nuevamente gracias por preferirnos.</p>
<br>
<p align="center">Dirección Académica</p>
<p align="center">ASEICA</p>
</div><br>
<br>
<br>

<div style="display: block;	clear: both; float: none; line-height: 0px; font-size: 0px;"></div>

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
</html>';

// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras  = "MIME-Version: 1.0"."\r\n";
	$cabeceras .= "Content-type: text/html; charset=UTF-8\r\n";
	// Cabeceras adicionales
	$cabeceras .= "From: contacto@aseica.com.ve \n";
	
	// Enviarlo
foreach($to as $mail){
   mail($email_Respons, $asunto, $mensaje, $cabeceras);
}

$mail2 = 'res_inscrip@aseica.com.ve';
$mail3 = 'academico@aseica.com.ve';

//data

$msg = "Hoy ".$fecha_solicitada." a las ".$hora_solicitada."<strong> Id Registro de Informacion: </strong>".$id_Pre_inscrip."<br><br><br>\n";
$msg .= "<strong>Nombre Y Apellido Solicitante: </strong>".$sexo3.' '.$nombre_apellido_Responsable."<br><br>\n";
$msg .= "<strong>Cedula del Solicitante: </strong>".$cedula_Respons."<br><br>\n";
$msg .= "<strong>EMAIL del Solicitante: </strong>".$email_Respons."<br><br>\n";
$msg .= "<strong>Teléfono del Solicitante: </strong>".$telefono_responsable."<br><br>\n";
$msg .= "<strong>Oferta Seleccionada: </strong>".$oferta_Seleccionada."<br><br>\n";
$msg .= "<strong>Informaci&oacute;n Extra: </strong>".$informacion_extra."<br><br><br>\n";

//Headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: <".$from. ">" ;

//send for each mail

   mail($mail2, $asunto, $msg, $headers);
   
   mail($mail3, $asunto, $msg, $headers);

?>    
</div>
</div>


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
<?php mysql_free_result($registro);mysql_free_result($oferta);mysql_free_result($calendario);?>
