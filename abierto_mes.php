<?php require_once('Connections/conexion.php'); if (!function_exists("GetSQLValueString")) { function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") { if (PHP_VERSION < 6) { $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; } $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue); switch ($theType) { case "text":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break; case "long":case "int":$theValue = ($theValue != "") ? intval($theValue) : "NULL"; break;case "double":$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";break;case "date":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL"; break;  case "defined": $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue; break;} return $theValue;}} $pg = 5;$currentPage = $_SERVER["PHP_SELF"];$maxRows_ofer_open = 6;$pageNum_ofer_open = 0;if (isset($_GET['pageNum_ofer_open'])) {  $pageNum_ofer_open = $_GET['pageNum_ofer_open'];}$startRow_ofer_open = $pageNum_ofer_open * $maxRows_ofer_open;$ano_ofer_open = "0";if (isset($ano)) {  $ano_ofer_open = $ano;}$mes_ofer_open = "0";if (isset($mes)) {  $mes_ofer_open = $_GET['mes'];}$resu_ofer_open = "0";if (isset($resu)) {  $resu_ofer_open = $resu;}$resu2_ofer_open = "0";if (isset($resu)) {  $resu2_ofer_open = $resu;}$resu3_ofer_open = "0";if (isset($resu)) {  $resu3_ofer_open = $resu;}$resu4_ofer_open = "0";if (isset($resu)) {  $resu4_ofer_open = $resu;}$resu5_ofer_open = "0";if (isset($resu)) {  $resu5_ofer_open = $resu;}$resu6_ofer_open = "0";if (isset($resu)) {  $resu6_ofer_open = $resu;}mysql_select_db($database_conexion, $conexion);$query_ofer_open = sprintf("SELECT * FROM tbloferta_academica INNER JOIN tbloferta_academica_calendario ON tbloferta_academica.idOferta = tbloferta_academica_calendario.intOfertaAcademica WHERE tbloferta_academica_calendario.intEstado = 1 AND tbloferta_academica_calendario.intMes = %s AND tbloferta_academica_calendario.intAno = %s AND tbloferta_academica_calendario.datFecha_01 != '' AND tbloferta_academica_calendario.datFecha_01 > %s OR tbloferta_academica_calendario.datFecha_02 > %s OR tbloferta_academica_calendario.datFecha_03 > %s OR tbloferta_academica_calendario.datFecha_04 > %s OR tbloferta_academica_calendario.datFecha_05 > %s OR tbloferta_academica_calendario.datFecha_06 > %s", GetSQLValueString($mes_ofer_open, "int"),GetSQLValueString($ano_ofer_open, "int"),GetSQLValueString($resu_ofer_open, "date"),GetSQLValueString($resu2_ofer_open, "date"),GetSQLValueString($resu3_ofer_open, "date"),GetSQLValueString($resu4_ofer_open, "date"),GetSQLValueString($resu5_ofer_open, "date"),GetSQLValueString($resu6_ofer_open, "date"));$query_limit_ofer_open = sprintf("%s LIMIT %d, %d", $query_ofer_open, $startRow_ofer_open, $maxRows_ofer_open);$ofer_open = mysql_query($query_limit_ofer_open, $conexion) or die(mysql_error());$row_ofer_open = mysql_fetch_assoc($ofer_open);if (isset($_GET['totalRows_ofer_open'])) {  $totalRows_ofer_open = $_GET['totalRows_ofer_open'];} else {  $all_ofer_open = mysql_query($query_ofer_open);  $totalRows_ofer_open = mysql_num_rows($all_ofer_open);}$totalPages_ofer_open = ceil($totalRows_ofer_open/$maxRows_ofer_open)-1;?>
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
  <div class="bread-heading"><h1>Oferta Academica Abierta</h1>
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
    
  <div class="side-blog-title">Meses</div>
  <ul>
  <?php // include("includes/menu_ofertas_open.php"); ?>
  </ul>
  </div>
    
  </div>
  <!--Sidebar-end-->
    
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    
  <?php if ($_GET['mes'] == '') { ?>
  <div class="col-md-12 col-xs-12 col-sm-12 pull-left subtitle no-pad ibg-transparent">Ofertas del mes de <?php echo ObtMes($mes); ?></div>
  <?php } else { ?>
  <div class="col-md-12 col-xs-12 col-sm-12 pull-left subtitle no-pad ibg-transparent">Ofertas del mes de <?php echo ObtMes($_GET['mes']); ?></div>
  <?php } $cuen = 0;do { $me_ofert_calen = "0";if (isset($mes)) {  $me_ofert_calen = $mes;}$an_ofert_calen = "0";if (isset($ano)) {  $an_ofert_calen = $ano;}$ofe_ofert_calen = "0";if (isset($row_ofer_open['idOferta'])) {  $ofe_ofert_calen = $row_ofer_open['idOferta'];}$di_ofert_calen = "0";if (isset($resu)) {  $di_ofert_calen = $resu;}mysql_select_db($database_conexion, $conexion);$query_ofert_calen = sprintf("SELECT * FROM tbloferta_academica_calendario WHERE tbloferta_academica_calendario.intMes = %s AND tbloferta_academica_calendario.intAno = %s AND tbloferta_academica_calendario.intOfertaAcademica = %s AND tbloferta_academica_calendario.intCupo < 31 AND tbloferta_academica_calendario.datFecha_01 > %s AND tbloferta_academica_calendario.intEstado = 1 ORDER BY tbloferta_academica_calendario.datFecha_01", GetSQLValueString($me_ofert_calen, "int"),GetSQLValueString($an_ofert_calen, "int"),GetSQLValueString($ofe_ofert_calen, "int"),GetSQLValueString($di_ofert_calen, "date"));$ofert_calen = mysql_query($query_ofert_calen, $conexion) or die(mysql_error());$row_ofert_calen = mysql_fetch_assoc($ofert_calen);$totalRows_ofert_calen = mysql_num_rows($ofert_calen);?>
    
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
  <div class="blog-box wow fadeInUp" data-wow-delay="0.5s" data-wow-offset="150">
  <img alt="<?php echo $row_ofer_open['strTitulo']; ?>" src="imagenes/oferta_academica/<?php echo $row_ofer_open['txtImagen_Peq']; ?>" class="img-responsive" />
  <div class="blog-box-title"><?php echo $row_ofer_open['strTitulo']; ?></div>
  <p><strong>Dirigido a: </strong><?php echo $row_ofer_open['txtDirigido_A']; ?></p>
  <div class="post-meta"><strong>Dictado por: </strong>
  <span class="post-author ipost-author">
  <?php if ($row_ofer_open['intFacilitador'] != '') { echo ObtNombFacili($row_ofer_open['intFacilitador']); } if ($row_ofer_open['intFacilitador2'] != '') { echo ', '.ObtNombFacili($row_ofer_open['intFacilitador2']); }if ($row_ofer_open['intFacilitador3'] != '') { echo ', '.ObtNombFacili($row_ofer_open['intFacilitador3']); } ?>
  </strong></span>
  <div class="clearfix"></div>
  <span class="post-author ipost-author">
  <strong>Fechas disponibles: </strong>
  </span>
    
  <div class="clearfix"></div>
    
    <?php do { ?>
      <span class="post-author ipost-author">
        <?php echo ObtFechaDia($row_ofert_calen['datFecha_01']); if ($row_ofert_calen['datFecha_02'] != '') { echo ', '.ObtFechaDia($row_ofert_calen['datFecha_02']); } if ($row_ofert_calen['datFecha_03'] != '') { echo ', '.ObtFechaDia($row_ofert_calen['datFecha_03']); } if ($row_ofert_calen['datFecha_04'] != '') { echo ', '.ObtFechaDia($row_ofert_calen['datFecha_04']); } if ($row_ofert_calen['datFecha_05'] != '') { echo ', '.ObtFechaDia($row_ofert_calen['datFecha_05']); } if ($row_ofert_calen['datFecha_06'] != '') { echo ', '.ObtFechaDia($row_ofert_calen['datFecha_06']); } ?>
        de  del <?php echo $row_ofert_calen['intAno']; ?>
        </span>
      <div class="clear"></div>
      <?php } while ($row_ofert_calen = mysql_fetch_assoc($ofert_calen)); ?>
    <span class="post-author ipost-author"><?php echo ObtMes($row_ofert_calen['intMes']); ?></span><a href="eleg_oferta-<?php echo RemUrl($row_ofer_open['strTitulo']); ?>_<?php echo $row_ofer_open['idOferta']; ?>">Leer M&aacute;s ></a>
    
    
  <div class="clearfix"></div>
    
  </div>
  </div>
  </div>
  <?php if ($cuen == 1) { ?><div class="clearfix"></div><?php } if ($cuen == 3) { ?><div class="clearfix"></div><?php }if ($cuen == 5) { ?><div class="clearfix"></div><?php } if ($cuen == 7) { ?><div class="clearfix"></div><?php }$cuen = $cuen + 1;} while ($row_ofer_open = mysql_fetch_assoc($ofer_open)); ?>
    
  <div class="clearfix"></div>
    
  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 buttons-elements">
    <table border="0">
      <tr>
        <td><?php if ($pageNum_ofer_open > 0) { ?>
          <a href="<?php printf("%s?pageNum_ofer_open=%d%s", $currentPage, 0, $queryString_ofer_open); ?>" class="dept-details-butt small-but">Primero</a>
          <?php } ?></td>
        <td><?php if ($pageNum_ofer_open > 0) { ?>
          <a href="<?php printf("%s?pageNum_ofer_open=%d%s", $currentPage, max(0, $pageNum_ofer_open - 1), $queryString_ofer_open); ?>" class="dept-details-butt small-but">Anterior</a>
          <?php } // Show if not first page ?></td>
        <td class="dept-details-butt"> Ofertas <?php echo ($startRow_ofer_open + 1) ?> a <?php echo min($startRow_ofer_open + $maxRows_ofer_open, $totalRows_ofer_open) ?> de <?php echo $totalRows_ofer_open ?></td>
        <td><?php if ($pageNum_ofer_open < $totalPages_ofer_open) { ?>
          <a href="<?php printf("%s?pageNum_ofer_open=%d%s", $currentPage, min($totalPages_ofer_open, $pageNum_ofer_open + 1), $queryString_ofer_open); ?>" class="dept-details-butt small-but">Siguiente</a>
          <?php } ?></td>
        <td><?php if ($pageNum_ofer_open < $totalPages_ofer_open) { ?>
          <a href="<?php printf("%s?pageNum_ofer_open=%d%s", $currentPage, $totalPages_ofer_open, $queryString_ofer_open); ?>" class="dept-details-butt small-but">&Uacute;ltimo</a>
          <?php } ?></td>
        </tr>
      </table>
    
  </div> 
  </div>
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
<?php mysql_free_result($ofer_open);mysql_free_result($ofert_calen);mysql_free_result($veri);mysql_free_result($ofert_ele);?>
