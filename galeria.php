<?php require_once('Connections/conexion.php'); if (!function_exists("GetSQLValueString")) { function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") { if (PHP_VERSION < 6) { $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; } $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue); switch ($theType) { case "text":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break; case "long":case "int":$theValue = ($theValue != "") ? intval($theValue) : "NULL"; break;case "double":$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";break;case "date":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL"; break;  case "defined": $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue; break;} return $theValue;}}$pg = 6;$currentPage = $_SERVER["PHP_SELF"];mysql_select_db($database_conexion, $conexion);$query_categoria = "SELECT * FROM tblgaleria_categoria";$categoria = mysql_query($query_categoria, $conexion) or die(mysql_error());$row_categoria = mysql_fetch_assoc($categoria);$totalRows_categoria = mysql_num_rows($categoria);$maxRows_imagenes = 12;$pageNum_imagenes = 0;if (isset($_GET['pageNum_imagenes'])) {  $pageNum_imagenes = $_GET['pageNum_imagenes'];}$startRow_imagenes = $pageNum_imagenes * $maxRows_imagenes;mysql_select_db($database_conexion, $conexion);$query_imagenes = "SELECT * FROM tblgaleria WHERE tblgaleria.intEstado = 1 ORDER BY tblgaleria.idGaleria";$query_limit_imagenes = sprintf("%s LIMIT %d, %d", $query_imagenes, $startRow_imagenes, $maxRows_imagenes);$imagenes = mysql_query($query_limit_imagenes, $conexion) or die(mysql_error());$row_imagenes = mysql_fetch_assoc($imagenes);if (isset($_GET['totalRows_imagenes'])) {  $totalRows_imagenes = $_GET['totalRows_imagenes'];} else {  $all_imagenes = mysql_query($query_imagenes);  $totalRows_imagenes = mysql_num_rows($all_imagenes);}$totalPages_imagenes = ceil($totalRows_imagenes/$maxRows_imagenes)-1;$queryString_imagenes = "";if (!empty($_SERVER['QUERY_STRING'])) {  $params = explode("&", $_SERVER['QUERY_STRING']); $newParams = array(); foreach ($params as $param) { if (stristr($param, "pageNum_imagenes") == false && stristr($param, "totalRows_imagenes") == false) { array_push($newParams, $param);}} if (count($newParams) != 0) {$queryString_imagenes = "&" . htmlentities(implode("&", $newParams)); }}$queryString_imagenes = sprintf("&totalRows_imagenes=%d%s", $totalRows_imagenes, $queryString_imagenes); ?>
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
  <div class="bread-heading"><h1>Galeria Aseica</h1></div>
  </div>
  </div>
  </div> 
  
</div>


<div class="container">
  <div class="row">
    
  <div class="col-xs-12 col-sm-12 col-md-12 pull-left doctors-3col-tabs gallery-3col-tabs">
  <div class="content-tabs col-xs-12 col-sm-12">
    
  <!-- Tab panes -->
  <div class="tab-content">
    
  <div class="tab-pane fade fade-slow in active" id="all-doc">
    
  <?php do { ?>
  <!--Doc intro-->
  <div class="doctor-box col-md-4 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-delay="0.5s" data-wow-offset="200">
    
  <div class="zoom-wrap">
  <div class="zoom-icon"></div>
  <img class="img-responsive" src="imagenes/galeria/<?php echo $row_imagenes['txtImagen']; ?>" alt="<?php echo $row_imagenes['strTitulo']; ?>" /> 
  </div>
  <div class="doc-name">
  <div class="doc-name-class"><?php echo $row_imagenes['strTitulo']; ?></div><span class="doc-title"><?php echo $row_imagenes['strSub_Titulo']; ?></span>
  <hr />
  <p><?php echo $row_imagenes['strParrafo_Corto']; ?></p>
  </div>
  </div>
  <?php } while ($row_imagenes = mysql_fetch_assoc($imagenes)); ?>
    
    
  </div>
    
  </div>
    
  </div>
  <!--Mid Services End-->
    
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

<?php mysql_free_result($categoria);mysql_free_result($imagen);mysql_free_result($Recordset1);?>
