<?php require_once('Connections/conexion.php'); if (!function_exists("GetSQLValueString")) { function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") { if (PHP_VERSION < 6) { $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; } $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue); switch ($theType) { case "text":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break; case "long":case "int":$theValue = ($theValue != "") ? intval($theValue) : "NULL"; break;case "double":$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";break;case "date":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL"; break;  case "defined": $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue; break;} return $theValue;}}$pg = 2;
mysql_select_db($database_conexion, $conexion);$query_somos = "SELECT * FROM tblsomo_aseica WHERE tblsomo_aseica.intEstado = 1 ORDER BY tblsomo_aseica.idSomos";$somos = mysql_query($query_somos, $conexion) or die(mysql_error());$row_somos = mysql_fetch_assoc($somos);$totalRows_somos = mysql_num_rows($somos);mysql_select_db($database_conexion, $conexion);$query_valores = "SELECT * FROM tblsomos_valores WHERE tblsomos_valores.intEstado = 1";$valores = mysql_query($query_valores, $conexion) or die(mysql_error());$row_valores = mysql_fetch_assoc($valores);$totalRows_valores = mysql_num_rows($valores);mysql_select_db($database_conexion, $conexion);$query_slider = "SELECT * FROM tblslider_somos WHERE tblslider_somos.intEstado = 1";$slider = mysql_query($query_slider, $conexion) or die(mysql_error());$row_slider = mysql_fetch_assoc($slider);$totalRows_slider = mysql_num_rows($slider);

$pg = 3;

$maxRows_servicio = 12;
$pageNum_servicio = 0;
if (isset($_GET['pageNum_servicio'])) {
  $pageNum_servicio = $_GET['pageNum_servicio'];
}
$startRow_servicio = $pageNum_servicio * $maxRows_servicio;

mysql_select_db($database_conexion, $conexion);
$query_servicio = "SELECT * FROM tblservicios WHERE tblservicios.intEstado = 1";
$query_limit_servicio = sprintf("%s LIMIT %d, %d", $query_servicio, $startRow_servicio, $maxRows_servicio);
$servicio = mysql_query($query_limit_servicio, $conexion) or die(mysql_error());
$row_servicio = mysql_fetch_assoc($servicio);

if (isset($_GET['totalRows_servicio'])) {
  $totalRows_servicio = $_GET['totalRows_servicio'];
} else {
  $all_servicio = mysql_query($query_servicio);
  $totalRows_servicio = mysql_num_rows($all_servicio);
}
$totalPages_servicio = ceil($totalRows_servicio/$maxRows_servicio)-1;

mysql_select_db($database_conexion, $conexion);
$query_titulo = "SELECT * FROM tblservicios_titulo WHERE tblservicios_titulo.intEstado = 1 ORDER BY RAND()";
$titulo = mysql_query($query_titulo, $conexion) or die(mysql_error());
$row_titulo = mysql_fetch_assoc($titulo);
$totalRows_titulo = mysql_num_rows($titulo);

?>
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
  <li><a href="https://www.facebook.com/ASEICAdevzla" target="_blank"><i class="icon-facebook head-social-icon" id="face-head" data-original-title="Facebook" title="Facebook"></i></a></li>
    <li><a href="https://twitter.com/aseicadevzla" target="_blank"><i class="icon-social-twitter head-social-icon" id="tweet-head" data-original-title="Twitter" title="Twitter"></i></a></li>
    <li><a href="https://plus.google.com/112510396534094750749/" target="_blank"><i class="icon-google-plus head-social-icon" id="gplus-head" data-original-title="Google+" title="Google+"></i></a></li>
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
<?php include("includes/menu_mobil.php"); ?>on id="searchbt" name="searchbt" class="icon-search search-bt"></button></div>
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
  <div class="bread-heading"><h1>Somos Aseica</h1></div>                        
  </div>
  </div>
  </div> 
</div>

<div class="container">
  <div class="row">
    
  <div class="col-md-12 no-pad col-xs-12 col-sm-12 no-pad-t pull-left heading-content elemnts-wrap wow fadeInLeft animated" data-wow-delay="0.5s" data-wow-offset="200">
  <h2>ACADEMIA DE SERVICIOS EDUCATIVOS INTEGRALES</h2>
  <p>J-29560193-0</p>
  <p>Somos una Instituci&oacute;n, conformada por un grupo de profesionales con experiencia acad&eacute;mica de m&aacute;s de 25 a&ntilde;os, especializados en la facilitaci&oacute;n del aprendizaje y desarrollo de la inteligencia organizacional para lograr niveles de desempe&ntilde;o superior</p>
  </div>
    
  <div class="mid-widgets-serices col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pad pull-left services-page">
    
          <!--service box-->
      <div class="col-sm-5 col-xs-12 col-md-6 col-lg-6 service-box no-pad wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="100">
        <div class="service-title" align="center">
          <div class="zoom-wrap">
            <img class="img-responsive" src="imagenes/somos/1_somos_business-vision.jpg"/>        
            </div>
          <strong>Visión</strong>
          </div>
        <p style="text-align: justify;">Ser la primera opci&oacute;n de crecimiento y desarrollo para personas, sociedades y negocios en Am&eacute;rica Latina.</p>        </div> 
            <!--service box-->
      <div class="col-sm-5 col-xs-12 col-md-6 col-lg-6 service-box no-pad wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="100">
        <div class="service-title" align="center">
          <div class="zoom-wrap">
            <img class="img-responsive" src="imagenes/somos/servicios-educativos.jpg"/>        
            </div>
          <strong>Misión</strong>
          </div>
        <p style="text-align: justify;">Crear valor en la vida de personas y organizaciones para que alcancen el &eacute;xito mediante el impulso estrat&eacute;gico, apoyados en conocimientos y tecnolog&iacute;a de avanzada.</p>        </div> 
            <!--service box-->
      <div class="col-sm-5 col-xs-12 col-md-6 col-lg-6 service-box no-pad wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="100">
        <div class="service-title" align="center">
          <div class="zoom-wrap">
            <img class="img-responsive" src="imagenes/somos/9_somos_mejor-equipo-de-trabajo-claves-para-lograrlo-profesionales-on-580x333.jpg"/>        
            </div>
          <strong>Valores</strong>
          </div>
        <p><strong>Honor</strong></p>
<p>Establece la cualidad moral que nos compromete con nuestro pr&oacute;jimo a satisfacer en forma &iacute;ntegra cada uno de los compromisos establecidos basados en nuestra formaci&oacute;n, virtudes, m&eacute;ritos y profesionalismo.&nbsp;</p>
<p><strong>Innovaci&oacute;n</strong></p>
<p>Cristalizada en nuevos modelos de producci&oacute;n tras el desarrollo de recursos de avanzada y de investigaci&oacute;n que conducen a soluciones gerenciales novedosas.&nbsp;</p>
<p><strong>Trabajo en equipo</strong></p>
<p>La integraci&oacute;n emp&aacute;tica y operativa del talento de ASEICA es uno de sus principales pilares, siendo &eacute;sta orientada a la excelencia de todos los procesos que se dise&ntilde;an y conducen.&nbsp;</p>
<p><strong>Excelencia</strong></p>
<p>Nuestro staff profesional, productos, servicios &nbsp;y actividades que cuentan con un muy alto nivel de calidad originando la satisfacci&oacute;n de todos nuestros clientes y asociados.&nbsp;</p>        </div> 
            <!--service box-->
      <div class="col-sm-5 col-xs-12 col-md-6 col-lg-6 service-box no-pad wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="100">
        <div class="service-title" align="center">
          <div class="zoom-wrap">
            <img class="img-responsive" src="imagenes/somos/12_somos_para-plataforma-4.jpg"/>        
            </div>
          <strong>Mapa Estratégico</strong>
          </div>
        <p>Nuestros objetivos estrat&eacute;gicos est&aacute;n alineados para el logro de un alto nivel de excelencia con miras a la sosteniblidad de la empresa y el crecimiento integral de su talento humano.&nbsp;</p>        </div> 
          
  </div>
    
  <!--Mid Services End-->
    
  </div>  

</div>

  <div class="about-intro-wrap pull-left">
  <div class="bread-crumb-wrap ibc-wrap-1">
  <div class="container">
<!--Title / Beadcrumb-->
<div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
<div class="bread-heading">
  <h1>&iquest;Qu&Eacute; Ofrecemos?</h1></div>                        
</div>
</div>
</div> 
</div>

<div class="container">
<div class="row">

<div class="mid-widgets-serices col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pad pull-left services-page">

<?php
$tie = 0.4;
do { ?>
<!--service box-->
<div class="col-sm-5 col-xs-12 col-md-4 col-lg-4 service-box no-pad wow fadeInLeft animated" data-wow-delay="<?php echo $tie; ?>s" data-wow-offset="100">
<div class="service-title">
<div class="zoom-wrap" align="center">
<img class="img-responsive" src="imagenes/servicios/<?php echo $row_servicio['txtImagen']; ?>"/>        
</div>
<?php echo $row_servicio['strTitulo']; ?></div>
<?php echo $row_servicio['txtTexto']; ?>
<a href="<?php echo $row_servicio['strUrl']; ?>">Leer M&aacute;s >></a>
<div class="clearfix"></div>
</div>
<?php
$tie = $tie + 0.4;
} while ($row_servicio = mysql_fetch_assoc($servicio)); ?>


</div> <!--Mid Services End-->

</div>

</div>
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