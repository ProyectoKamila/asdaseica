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

$pg = 3;


$var_registro = "0";
if (isset($_GET['res'])) {
  $var_registro = $_GET['res'];
}
mysql_select_db($database_conexion, $conexion);
$query_registro = sprintf("SELECT * FROM tblpre_incrip WHERE tblpre_incrip.idPre_inscripcion = %s", GetSQLValueString($var_registro, "int"));
$registro = mysql_query($query_registro, $conexion) or die(mysql_error());
$row_registro = mysql_fetch_assoc($registro);
$totalRows_registro = mysql_num_rows($registro);

$me_oferta = "0";
if (isset($mes)) {
  $me_oferta = $mes;
}
mysql_select_db($database_conexion, $conexion);
$query_oferta = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intEstado = 1 AND tbloferta_academica.intMes = %s ORDER BY RAND()", GetSQLValueString($me_oferta, "int"));
$oferta = mysql_query($query_oferta, $conexion) or die(mysql_error());
$row_oferta = mysql_fetch_assoc($oferta);
$totalRows_oferta = mysql_num_rows($oferta);
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/Base_Pagina_02.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Academia de Servicios Educativos Integrales</title>
<!-- InstanceEndEditable -->
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
    
<!-- InstanceBeginEditable name="head" -->

<!-- InstanceEndEditable -->

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
<div class="social-wrap-head col-md-9 no-pad letras_supe">ACADEMIA DE SERVICIOS EDUCATIVOS INTEGRALES &nbsp;&nbsp;&nbsp;&nbsp;<span class="let_pqn">J-29560193-0</span></div>                            
<div class="top-info-contact pull-right col-md-3">
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

<!-- InstanceBeginEditable name="Contenido" -->

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
<p>Gracias por Usar nuestros Servicios ....... <br>
  En un periodo no mayor a 24 Horas el Departamento de  Academia se comunicara con usted.</p></div>

</div>
</div>

<div class="container">
<div class="row">


<?php

$to = explode(',', $_POST['to'] );
$from = $row_registro['strEmaio_Repre'];

$id_Pre_inscrip = $row_registro['idPre_inscripcion'];

$nombre_apellido_Responsable = $row_registro['strNomb_Respon'] .' '.$row_registro['strApellido_Respon'];
$cedula_Respons = $row_registro['strCI'];
$email_Respons  = $row_registro['strEmaio_Repre'];
$telefono_responsable = $row_registro['strTelefono_Repre'];
if ($row_registro['intSexo_represen'] == 1 ) { $sexo = 'Sr. '; } else { $sexo = 'Sra. '; }
$oferta_Seleccionada = ObtNombOferAcade($row_registro['intOferta'])." ".ObtFechaOferAcade($row_registro['intOferta']);
$carta_compromiso = $row_registro['intCartaCompromiso'];
$boletines = $row_registro['intBoletines'];
$informacion_extra = $row_registro['txtInfo_Extra'];
$nombre_empresa = ObtNA($row_registro['strNombre']);
$rif_empresa = ObtNA($row_registro['strCI_RIF']);
$direccion_empresa = ObtNA($row_registro['txtDireccion']);
$telefono1_empresa = ObtNA($row_registro['strTelefono_01']);
$telefono2_empresa = ObtNA($row_registro['strTelefono_02']);
$email1_empresa = ObtNA($row_registro['strEmail_01']);
$email2_empresa = ObtNA($row_registro['strEmail_02']);
$fecha_solicitada = ObtFecha($row_registro['datFecha_Solici']);
$hora_solicitada = $row_registro['timHora'];
$cargo_Respons = ObtNA($row_registro['strCargo']);


$asunto   = 'Solicitud de Informacion '.$oferta_Seleccionad.' de Aseica '.ObtFecha($resu);

$mensaje = '
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Cool Design</title>
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
<div style="font-size:24px;"><b>Gracias Por Comunicarte con Nosotros '.$sexo.' '.$nombre_apellido_Responsable.'</b></div>
<div style="font-size:14px;"><br>
<b>consectetur adipiscing elit. Vestibulum magna enim, volutpat nec imperdiet id, tempor venenatis eros.</b>
</div><br>
<br>
<br>

<div style="font-size:24px;"><b>M&aacute;s  Ofertas de Inter&eacute;s</b></div>
';

$cont = 0;
do {
	
$mensaje .= '
<div style="width: 30%; float: left; margin: 5px; border: 2px solid #009; padding: 5px;">
<div style="width: 100%;" align="center"><br>
<img src="http://www.aseica.com.ve/imagenes/oferta_academica/'.$row_oferta['txtImagen_Peq'].'" style="display: block; max-height: 100%; max-width: 100%;"></div><br>
<br>
<div style="font-size:11px; width: 100%;"><br>
<span style="line-height: 1.3em; margin: 17px 0 9px 0; width: 100%; text-align: center;	color: #000000;	font-size: 20px; letter-spacing: 0.5px">'.$row_oferta['strTitulo'].'</span><br><br>
<span style="font-size: 13px; color: #000000; line-height: 1.4em; padding: 0px 15px 10px 15px; text-align: center;">'.$row_oferta['strFec_Inicio'].'</span><br><br>
<a href="http://www.aseica.com.ve/eleg_oferta-'.RemUrl($row_oferta['strTitulo']).'_'.$row_oferta['idOferta'].'" style="	background: #107fc9; border: 1px solid #107fc9; font-size:13px; color:#fff; padding-top: 7px; padding-right: 12px; 	padding-bottom: 7px; padding-left: 12px;margin: 5px;">Leer M&aacute;s</a>
<br>
<br>
</div>
</div>
';
if ($cont == 2) {
$mensaje .= '
<div style="display: block;	clear: both; float: none; line-height: 0px; font-size: 0px;"></div>
';
}
if ($cont == 5) {
$mensaje .= '<div style="display: block; clear: both; float: none; line-height: 0px; font-size: 0px;"></div>';
 }

$cont = $cont + 1;
} while ($row_oferta = mysql_fetch_assoc($oferta));

$mensaje .= '
<div style="display: block;	clear: both; float: none; line-height: 0px; font-size: 0px;"></div>
<br>
<br>
<br>
<div style="font-size:24px;"><b>Nota:</b></div><br>
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
</html>';

// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras  = 'MIME-Version: 1.0'."\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
	$cabeceras .= "Message-ID: <".md5(uniqid(time()))."@aseica.com.ve>\n";
	$cabeceras .= 'Date: '.$resu."\r\n";
	$cabeceras .= "X-Priority: 3\r\nX-MSMail-Priority: Normal"."\r\n";
	$cabeceras .= "X-Mailer: PHP/".phpversion()."\r\n";
	// Cabeceras adicionales
	$cabeceras .= "From: contacto@aseica.com.ve \n";
	
	// Enviarlo
foreach($to as $mail){
   mail($email_Respons, $asunto, $mensaje, $cabeceras);
}

$mail2 = 'res_inscrip@aseica.com.ve';

//data

$msg = "Hoy ".$fecha_solicitada." a las ".$hora_solicitada."<strong> Id Registro de Informacion: </strong>".$id_Pre_inscrip."<br><br><br>\n";
$msg .= "<strong>Nombre Y Apellido Solicitante: </strong>".$nombre_apellido_Responsable."<br><br>\n";
$msg .= "<strong>Cedula del Solicitante: </strong>".$cedula_Respons."<br><br>\n";
$msg .= "<strong>EMAIL del Solicitante: </strong>".$email_Respons."<br><br>\n";
$msg .= "<strong>Teléfono del Solicitante: </strong>".$telefono_responsable."<br><br>\n";
$msg .= "<strong>Oferta Seleccionada: </strong>".$oferta_Seleccionada."<br><br>\n";

$msg .= "<strong>Información Extra: </strong>".$informacion_extra."<br><br><br>\n";

$msg .= "<strong>Nombre de la Empresa: </strong>".$nombre_empresa."<br><br>\n";
$msg .= "<strong>R.I.F de la Empresa: </strong>".$rif_empresa."<br><br>\n";
$msg .= "<strong>Dirección de la Empresa: </strong>".$direccion_empresa."<br><br>\n";
$msg .= "<strong>Teléfono 01 de la Empresa: </strong>".$telefono1_empresa."<br><br>\n";
$msg .= "<strong>Teléfono 02 de la Empresa: </strong>".$telefono2_empresa."<br><br>\n";
$msg .= "<strong>Email 1 de la Empresa:</strong> ".$email1_empresa."<br><br>\n";
$msg .= "<strong>Email 2 de la Empresa: </strong>".$email2_empresa."<br><br>\n";
$msg .= "<strong>Cargo del Responsable: </strong>".$cargo_Respons ."<br><br>\n";


//Headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: <".$from. ">" ;
//$headers .= 'Bcc: academico@aseica.com.ve'."\r\n";

//send for each mail
foreach($to as $mail){
   mail($mail2, $asunto, $msg, $headers);
}

?>
<br>
<br>
<br>

<?php echo $msg; ?>

</div>
</div>


<!-- InstanceEndEditable -->

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
<!-- InstanceEnd --></html>
<?php
mysql_free_result($registro);

mysql_free_result($oferta);
?>
