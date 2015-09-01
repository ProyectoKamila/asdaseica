<?php require_once('Connections/conexion.php'); if (!function_exists("GetSQLValueString")) { function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") { if (PHP_VERSION < 6) { $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; } $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue); switch ($theType) { case "text":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break; case "long":case "int":$theValue = ($theValue != "") ? intval($theValue) : "NULL"; break;case "double":$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";break;case "date":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL"; break;  case "defined": $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue; break;} return $theValue;}}$pg = 3;

if ($_GET['id'] == '') {
$sel = $row_aleatorio['idCompanias'];
} else {
$sel = $_GET['id'];
}

$var_oferta_compa = "0";
if (isset($sel)) {
  $var_oferta_compa = $sel;
}
mysql_select_db($database_conexion, $conexion);
$query_oferta_compa = sprintf("SELECT * FROM tbloferta_company WHERE tbloferta_company.intEstado = 1 AND tbloferta_company.idCompanias = %s", GetSQLValueString($var_oferta_compa, "int"));
$oferta_compa = mysql_query($query_oferta_compa, $conexion) or die(mysql_error());
$row_oferta_compa = mysql_fetch_assoc($oferta_compa);
$totalRows_oferta_compa = mysql_num_rows($oferta_compa);


$var_elementos = "0";
if (isset($sel)) {
  $var_elementos = $sel;
}
mysql_select_db($database_conexion, $conexion);
$query_elementos = sprintf("SELECT * FROM tbloferta_company_objetivos WHERE tbloferta_company_objetivos.intOferta_Company = %s", GetSQLValueString($var_elementos, "int"));
$elementos = mysql_query($query_elementos, $conexion) or die(mysql_error());
$row_elementos = mysql_fetch_assoc($elementos);
$totalRows_elementos = mysql_num_rows($elementos);

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
    <h1>Oferta Academica Compa&Ntilde;ias</h1></div>                        
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
    
  <div class="side-blog-title">Areas</div>
  <ul>
  <?php include("includes/menu_ofertas_company.php"); ?>
  </ul>
  </div>
    
  </div>
  <!--Sidebar-end-->
    
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    
  <div class="fade tab-pane active in">
    
  <div class="dept-title-tabs"><?php echo $row_oferta_compa['strTitulo']; ?></div>
    
  <img alt="<?php echo $row_oferta_compa['strTitulo']; ?>" class="img-responsive" src="imagenes/oferta_company/<?php echo $row_oferta_compa['txtImagen_01']; ?>" />
    
    
  <div class="dept-subtitle-tabs">
    <h3>CURSOS EN EL &Aacute;REA</h3>
  </div>
    
  <?php do { ?>
  <br><a href="inscribir_empresa-<?php echo RemUrl($row_elementos['strObjetivo']); ?>_<?php echo $row_elementos['intOferta_Company']; ?>_<?php echo $row_elementos['idObjetivo']; ?>" class="inner-page-butt-blue large-but"><?php echo $row_elementos['strObjetivo']; ?></a>
  <br><br>
  <?php } while ($row_elementos = mysql_fetch_assoc($elementos)); if ($row_oferta_compa['txtInf_Adici'] != '') { ?>
  <p><strong>Informacion Adicional: </strong><br>
  <br>
  <?php echo $row_oferta_compa['txtInf_Adici']; ?></p><br>
  <?php } ?>
    
  </div>
    
    
  </div>
    
  </div>
  
  <!-- Blog box -->
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 side-bar-blog-bottom">
    
  <!--Sidebar-item-->
  <div class="catagory-list">
  <div class="side-blog-title">Meses</div>
  <ul>
  <?php include("includes/menu_ofertas_company.php"); ?>
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
<?php mysql_free_result($oferta_compa);mysql_free_result($elementos);mysql_free_result($catego);?>
