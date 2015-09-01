<?php require_once('Connections/conexion.php'); if (!function_exists("GetSQLValueString")) { function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") { if (PHP_VERSION < 6) { $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; } $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue); switch ($theType) { case "text":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break; case "long":case "int":$theValue = ($theValue != "") ? intval($theValue) : "NULL"; break;case "double":$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";break;case "date":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL"; break;  case "defined": $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue; break;} return $theValue;}}$pg = 3;$var_oferta = "0";if (isset($_GET['id'])) { $var_oferta = $_GET['id'];}mysql_select_db($database_conexion, $conexion);$query_oferta = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.idOferta = %s", GetSQLValueString($var_oferta, "int"));$oferta = mysql_query($query_oferta, $conexion) or die(mysql_error());$row_oferta = mysql_fetch_assoc($oferta);$totalRows_oferta = mysql_num_rows($oferta);?>
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
    <h1>Oferta Acad&Eacute;mica Abierta</h1></div>                        
  </div>
  </div>
  </div> 
</div>

<div class="container">
  
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left blgo-full-wrap no-pad">
    
  <!-- Blog box -->
  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 side-bar-blog">
    
  <!--Sidebar-item-->
  <div class="catagory-list wow fadeInLeft" data-wow-delay="0.5s" data-wow-offset="0">
    <ul>
      <?php include("includes/menu_ofertas_open.php"); ?>
  </ul>
  </div>
    
  </div>
  <!--Sidebar-end-->
    
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    
  <div class="fade tab-pane active in">
  <div class="dept-title-tabs"><?php echo $row_oferta['strTitulo']; ?></div>
  <img alt="<?php echo $row_oferta['strTitulo']; ?>" class="img-responsive" src="imagenes/oferta_academica/<?php echo $row_oferta['txtImagen_01']; ?>" />
    
  <div class="dept-subtitle-tabs"><strong>Duraci&oacute;n:</strong> <?php echo $row_oferta['strDuracion']; ?></div>
    
  <div class="dept-subtitle-tabs"><strong>Horario:</strong> <?php echo $row_oferta['strHorario']; ?></div>
    
  <div class="dept-subtitle-tabs"><strong>Dirigido a:</strong>
  <p><?php echo $row_oferta['txtDirigido_A']; ?></p></div>
    
  <p><strong>Objetivo General: </strong> <?php echo $row_oferta['txtObj_Gene']; ?></p>
    
  <p><strong>Contenido Espec&iacute;fico: </strong> <?php echo $row_oferta['txtObj_Espc_Cont']; ?></p>
    
  <div class="dept-subtitle-tabs"><strong>Area:</strong> <?php echo ObtAreaAcade($row_oferta['intArea']); ?></div>
    
  <div class="dept-subtitle-tabs"><strong>Tipo:</strong> <?php echo ObtTipoAcade($row_oferta['intTipo_Ofer']); ?></div>
    
  <div class="dept-subtitle-tabs"><strong>Modalidad:</strong> <?php echo ObtModaliAcade($row_oferta['intModalidad']); ?></div>
    
  <div class="dept-subtitle-tabs"><strong>Costo:</strong> <strong><?php echo $row_oferta['strCosto_Letras']; ?> (<?php echo ObtPrecioAcomo($row_oferta['strCosto']); ?>)</strong>. (IVA Incluido)</div>
    
  <div class="dept-subtitle-tabs"><strong>Acreditaci&oacute;n:</strong> <?php echo $row_oferta['txtBeneficios']; ?></div>
    
  <div class="dept-subtitle-tabs"><strong>Facilitador:</strong> <?php echo ObtNombFacili($row_oferta['intFacilitador']); ?></div>
    
  <p><?php echo ObtInfoFacili($row_oferta['intFacilitador']); ?></p>
    
  <p><strong>Incluye: </strong><?php echo $row_oferta['txtIncluye']; ?></p>
    
  <div class="dept-subtitle-tabs2">
    
  <strong>Fechas Disponibles: </strong><br><br>
    
    
  <div class="clearfix"></div>
    
<?php $me_ofert_calen = "0";if (isset($_GET['mes'])) {  $me_ofert_calen = $_GET['mes'];}$an_ofert_calen = "0";if (isset($ano)) {  $an_ofert_calen = $ano;}$ofe_ofert_calen = "0";if (isset($row_oferta['idOferta'])) {  $ofe_ofert_calen = $row_oferta['idOferta'];}$di_ofert_calen = "0";if (isset($resu)) {  $di_ofert_calen = $resu;}mysql_select_db($database_conexion, $conexion);$query_ofert_calen = sprintf("SELECT * FROM tbloferta_academica_calendario WHERE tbloferta_academica_calendario.intMes = %s AND tbloferta_academica_calendario.intAno = %s AND tbloferta_academica_calendario.intOfertaAcademica = %s AND tbloferta_academica_calendario.intCupo < 31 AND tbloferta_academica_calendario.datFecha_01 > %s AND tbloferta_academica_calendario.intEstado = 1 ORDER BY tbloferta_academica_calendario.datFecha_01", GetSQLValueString($me_ofert_calen, "int"),GetSQLValueString($an_ofert_calen, "int"),GetSQLValueString($ofe_ofert_calen, "int"),GetSQLValueString($di_ofert_calen, "date"));$ofert_calen = mysql_query($query_ofert_calen, $conexion) or die(mysql_error());$row_ofert_calen = mysql_fetch_assoc($ofert_calen);$totalRows_ofert_calen = mysql_num_rows($ofert_calen);
 do { ?>
    <a href="inscripcion_abierta-<?php echo RemUrl($row_oferta['strTitulo']); ?>_<?php echo $row_oferta['idOferta']; ?>_<?php echo $row_ofert_calen['idCalendario']; ?>" class="inner-page-butt-blue large-but">Preinscripci&Oacute;n &nbsp;&nbsp;
<?php echo ObtFechaDia($row_ofert_calen['datFecha_01']); if ($row_ofert_calen['datFecha_02'] != '') { echo ', '.ObtFechaDia($row_ofert_calen['datFecha_02']); } if ($row_ofert_calen['datFecha_03'] != '') { echo ', '.ObtFechaDia($row_ofert_calen['datFecha_03']); }if ($row_ofert_calen['datFecha_04'] != '') { echo ', '.ObtFechaDia($row_ofert_calen['datFecha_04']); } if ($row_ofert_calen['datFecha_05'] != '') { echo ', '.ObtFechaDia($row_ofert_calen['datFecha_05']); } if ($row_ofert_calen['datFecha_06'] != '') { echo ', '.ObtFechaDia($row_ofert_calen['datFecha_06']); } ?> &nbsp;de <?php echo ObtMes($row_ofert_calen['intMes']); ?> del <?php echo $row_ofert_calen['intAno']; ?>
      </a><br>
  <br>
    <div class="clear"></div>
    <?php } while ($row_ofert_calen = mysql_fetch_assoc($ofert_calen)); ?>  
  </div>
    
  <p><strong>Preinscripci&oacute;n: </strong><br>
  <?php echo $row_oferta['txtInf_Adici']; ?></p><br>
  <br>
  <br>
  <br>    
  </div>    
  </div>
    
  </div>
  
  <!-- Blog box -->
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 side-bar-blog-bottom">
    
  <!--Sidebar-item-->
  <div class="catagory-list">
  <div class="side-blog-title">Meses</div>
  <ul>
  <?php include("includes/menu_ofertas_open.php"); ?>
  </ul>
  </div>
  </div>
  <!--Sidebar-end-->  
  
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
<?php mysql_free_result($oferta);?>
